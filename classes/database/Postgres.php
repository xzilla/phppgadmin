<?php

/**
 * A class that implements the DB interface for Postgres
 * Note: This class uses ADODB and returns RecordSets.
 *
 * $Id: Postgres.php,v 1.1.1.1 2002/02/11 09:32:47 chriskl Exp $
 */

include_once('ADODB_base.pclass');

class Postgres extends BaseDB {

	function Postgres() {
		$this->User = 'auadmin';
		$this->Password = 'bfd12hutz';

		$this->BaseDB();
	}

	// Flag functions

	/**
	 * Retrieves the flags of the specified user
	 * @param $user_id The ID of the user
	 * @param $values (optional) Return array as values, rather than keys
	 * @return An array containing the flag names as it keys with values of true
	 */
	function &getUserFlags($user_id, $values = false) {
		$this->clean($meal_id);
		$sql = "SELECT fl.name FROM users_flags uf, medidiets_flags fl WHERE uf.flag_id = fl.flag_id AND uf.user_id = '{$user_id}'";
		$rs = $this->selectSet($sql);

		$flags = array();
		while (!$rs->EOF) {
			if ($values)
				$flags[] = $rs->f['name'];
			else
				$flags[$rs->f['name']] = true;
			$rs->moveNext();
		}

		return $flags;
	}

	/**
	 * Retrieves a user's profile and plan joined
	 * @param $user_id The ID of the user whose data is to be returned
	 * @return A recordset
	 */
	function &getProfileAndPlan($user_id) {
		$this->clean($user_id);

		$sql = "SELECT * FROM users_profiles_tmp up, medidiets_plans mp WHERE up.user_id='$user_id' AND up.plan_id=mp.plan_id";

		return $this->selectSet($sql);
	}

	// Plan functions

	/**
	 * Returns all existing plans
	 * @return A recordset
	 */
	function &getPlans() {
		$sql = "SELECT * FROM medidiets_plans ORDER BY calories";
		return $this->selectSet($sql);
	}

	/*
	 * Finds a meal plan that matches the given number of calories most closely
	 * @param $cals The number of calories the plan should be
	 * @return (array) The ID of the plan found, and the actual cals
	 */
	function &findPlan($cals) {
		$this->clean($cals);

		$sql = "SELECT plan_id, calories, ABS(calories::numeric - '$cals') AS diff FROM medidiets_plans ORDER BY diff LIMIT 1";
		$rs = $this->selectSet($sql);

		return array($rs->f['plan_id'], $rs->f['calories']);
	}

	/*
	 * Finds all meals that adhere to the given options, randomly ordered
	 * @param $cals The number of calories the plan should be
	 * @param $when_id The meal of the day to find meals for
	 * @param $flags An array of flag names to be excluded
	 * @param $names (optional) Specify whether to return names as well, sorted
	 * @return A recordset
	 */
	function &findMeals($cals, $when_id, $flags, $names = false) {
		$this->clean($cals);
		$this->clean($when_id);
		$flag_str = implode("','", $flags);

		if ($names) {
			$params = 'meal_id, name';
			$order = 'name';
		}
		else {
			$params = 'meal_id';
			$order = 'RANDOM()';
		}

		$sql = "
			SELECT 
				{$params}
			FROM 
				medidiets_meals mm
			WHERE 
				mm.calories='{$cals}'
				AND mm.when_id='{$when_id}'
				AND mm.visible
				AND NOT mm.pending
				AND mm.meal_id NOT IN (
					SELECT 
						DISTINCT (meal_id)
					FROM 
						medidiets_flags_map mfp, medidiets_flags mf 
					WHERE
						mfp.flag_id=mf.flag_id
						AND mf.name IN ('{$flag_str}')
				)
			ORDER BY {$order}
		";

		return $this->selectSet($sql);
	}

	/*
	 * Inserts meals into a range of dates for a user
	 * @param $user_id The ID of the user we're inserting for
	 * @param $start_date The date at which to start the insertion
	 * @param $no_days The number of days to insert
	 * @return 0 success
	 * @return -1 transaction error
	 * @return -2 profile/plan retrieval error
	 * @return -3 meal list retrieval error
	 * @return -4 insertion failure
	 * @@ What happens if no breakfasts could be found?!?!?
	 */
	function createMealPlan($user_id, $start_date, $no_days)  {
		global $defaultCountryCode;

		// begin transaction
		$status = $this->beginTransaction();
		if ($status != 0) return -1;

		// Get user data, joined with plan data?
		$data = &$this->getProfileAndPlan($user_id);
		$data->f['seasonal'] = $this->phpBool($data->f['seasonal']);
		$flags = &$this->getUserFlags($user_id, true);
		
		// Seasonal menus
		if ($data->f['seasonal']) {
			if ($defaultCountryCode == 'AU')
				$is_summer = in_array(date('m'), array(10, 11, 12, 1, 2, 3));
			else
				$is_summer = in_array(date('m'), array(4, 5, 6, 7, 8, 9));

			if ($is_summer) $flags[] = 'NOT_SUMMER';
			else $flags[] = 'NOT_WINTER';
		}

		// Convenience
		$b_flags = $flags;
		if ($data->f['mp_breakfast'] == 'C') $b_flags[] = 'NOT_CONVENIENT';
		$l_flags = $flags;
		if ($data->f['mp_lunch'] == 'C') $l_flags[] = 'NOT_CONVENIENT';
		$d_flags = $flags;
		if ($data->f['mp_dinner'] == 'C') $d_flags[] = 'NOT_CONVENIENT';

		// Get lists of breakfasts, lunches, dinners and snacks, ordered
		// randomly.
		if ($data->f['breakfast'] > 0) {
			$breakfasts = &$this->findMeals($data->f['breakfast'], 1, $b_flags);
			if (!$breakfasts) {
				$this->rollbackTransaction();
				return -3;
			}
			if ($breakfasts->recordCount() == 0) reportError("User {$user_id} could not find a {$data->f['breakfast']} cal breakfast for " . 
				implode(',', $b_flags) . " flags.");
		}
		if ($data->f['lunch'] > 0) {
			$lunches = &$this->findMeals($data->f['lunch'], 2, $l_flags);
			if (!$lunches) {
				$this->rollbackTransaction();
				return -3;
			}
			if ($lunches->recordCount() == 0) reportError("User {$user_id} could not find a {$data->f['lunch']} cal lunch for " . 
				implode(',', $l_flags) . " flags.");
		}
		if ($data->f['dinner'] > 0) {
			$dinners = &$this->findMeals($data->f['dinner'], 3, $d_flags);
			if (!$dinners) {
				$this->rollbackTransaction();
				return -3;
			}
			if ($dinners->recordCount() == 0) reportError("User {$user_id} could not find a {$data->f['dinner']} cal dinner for " . 
				implode(',', $d_flags) . " flags.");
		}
		if ($data->f['snack'] > 0) {
			$snacks = &$this->findMeals($data->f['snack'], 4, $flags);		
			if (!$snacks) {
				$this->rollbackTransaction();
				return -3;
			}
			if ($snacks->recordCount() == 0) reportError("User {$user_id} could not find a {$data->f['snack']} cal snack for " . 
				implode(',', $flags) . " flags.");
		}

		// For each day, insert a breakfast, lunch, dinner and snack
		list($sy, $sm, $sd) = explode('-', $start_date);
		for ($i = 0; $i < $no_days; $i++) {
			$temp = array();
			$temp['user_id'] = $user_id;
			$temp['date'] = date('Y-m-d', mktime(0, 0, 0, $sm, $sd + $i, $sy));
			// Breakfast
			if ($data->f['breakfast'] > 0 && $breakfasts->recordCount() > 0) {
				$temp['breakfast_id'] = $breakfasts->f['meal_id'];
				$breakfasts->moveNext();
				if ($breakfasts->EOF) $breakfasts->moveFirst();
			}
			// Lunch
			if ($data->f['lunch'] > 0 && $lunches->recordCount() > 0) {
				$temp['lunch_id'] = $lunches->f['meal_id'];
				$lunches->moveNext();
				if ($lunches->EOF) $lunches->moveFirst();
		   }
			// Dinner
			if ($data->f['dinner'] > 0 && $dinners->recordCount() > 0) {
				$temp['dinner_id'] = $dinners->f['meal_id'];
				$dinners->moveNext();
				if ($dinners->EOF) $dinners->moveFirst();
			}
			// Snack
			if ($data->f['snack'] > 0 && $snacks->recordCount() > 0) {
				$temp['snack_id'] = $snacks->f['meal_id'];
				$snacks->moveNext();
				if ($snacks->EOF) $snacks->moveFirst();
			}

			$status = $this->insert('users_mealplans', $temp);
			if ($status != 0) {
				$this->rollbackTransaction();
				return -4;
			}
			unset($temp);
		}

		// @@ Take care of overriding preferences

		return $this->endTransaction();
	}

	/**
	 * Records a user's meal substitution to the database
	 * @param $user_id The ID of the user to be updated
	 * @param $date The date to update
	 * @param $when_id The meal to replace
	 * @param $meal_id The new meal to substitute
	 * @return 0 success
	 */
	function setUserMeal($user_id, $date, $when_id, $meal_id) {
		$fields = array('', 'breakfast_id', 'lunch_id', 'dinner_id', 'snack_id');
		return $this->update('users_mealplans',
			array($fields[$when_id] => $meal_id),
			array('user_id' => $user_id, 'date' => $date));
	}

	/**
	 * Retrieves a user's shopping list
	 * @param $user_id The ID fo the user to retrieve
	 * @param $date The date from which to retrieve
	 * @param $num_days The number of days from the date forward to retrieve
	 */
	function &getShoppingList($user_id, $from, $to) {
		$this->clean($user_id);
		$this->clean($date);

		$sql = "
			SELECT description, food_id, name, measurement, base, type, name_pl, measurement_pl, qty, SUM(quantity) AS quantity FROM (
				(SELECT 
					mcf.description, mf.food_id, mf.name, mf.measurement, mf.base, mf.type, mf.name_pl, mf.measurement_pl, mf.quantity AS qty, mfm.quantity AS quantity 
				FROM 
					medidiets_categories_foods mcf, medidiets_foods mf, medidiets_foods_map mfm, users_mealplans um 
				WHERE 
					mcf.category_id=mf.category_id
					AND mf.food_id=mfm.food_id 
					AND mfm.meal_id IN (um.breakfast_id, um.lunch_id, um.dinner_id, um.snack_id)
					AND um.date BETWEEN '$from' AND '$to'
					AND user_id='$user_id')
				UNION ALL
				(SELECT 
					mcf.description, mf.food_id, mf.name, mf.measurement, mf.base, mf.type, mf.name_pl, mf.measurement_pl, mf.quantity AS qty, mi.quantity AS quantity 
				FROM 
					medidiets_categories_foods mcf, medidiets_foods mf, medidiets_ingredients mi, medidiets_recipes_map mrm, users_mealplans um 
				WHERE 
					mcf.category_id=mf.category_id
					AND mf.food_id=mi.food_id 
					AND mi.recipe_id=mrm.recipe_id 
					AND mrm.meal_id IN (um.breakfast_id, um.lunch_id, um.dinner_id, um.snack_id) 
					AND um.date BETWEEN '$from' AND '$to'
					AND user_id='$user_id')
			) AS subselect
			GROUP BY description, food_id, name, measurement, base, type, name_pl, measurement_pl, qty
		";

	   return $this->selectSet($sql);
	}

	// Miscellaneous functions

	/*
	 * Returns an array with the correct imperial or metric units
	 * @return Array containing measurements
	 */
	function getDefaultUnits() {
		global $defaultMeasurements;

		if ($defaultMeasurement == 'imperial') {
			$units = array('M' => 'oz', 'V' => 'fl.oz');
		}
		else {
			$units = array('M' => 'g', 'V' => 'mL');
		}

		return $units;
	}

	/*
	 * A helper function to convert decimals to fractions
	 * @param A decimal number to convert
	 * @return The formatted version of the number
	 */
	function _fracConvert($num) {
		$decpart = $num - floor($num);

		switch ($decpart * 4) {
			case 0:
				return number_format($num, 0);
				break;
			case 1:
				if (floor($num) != 0)
					return number_format(floor($num), 0) . ' 1/4';
				else
					return '1/4';
				break;
			case 2:
				if (floor($num) != 0)
					return number_format(floor($num), 0) . ' 1/2';
				else
					return '1/2';
				break;
			case 3:
				if (floor($num) != 0)
					return number_format(floor($num), 0) . ' 3/4';
				else
					return '3/4';
				break;
			default:
				if ($decpart == 0.33) {
					if (floor($num) != 0)
						return number_format(floor($num), 0) . ' 1/3';
					else
						return '1/3';
				}
				elseif ($decpart == 0.66 || $decpart == 0.67) {
					if (floor($num) != 0)
						return number_format(floor($num), 0) . ' 2/3';
					else
						return '2/3';
				}
				else return number_format($num, 2);

				break;
		}
	}

	/**
	 * Return the string to be used to as the display for the ingredient
	 *
	 * The string is to be formatted depending upon the values of the measurement
	 * and base variables.  The string will also use the $defaultMeasurement
	 * specified in the network config files.
	 *
	 * @param $name The name of the food of the ingredient
	 * @param $name The pluralised form of the name
	 * @param $quantity The amount of ingredient
	 * @param $measurement The measurement of the food of the ingredient ('' if none)
	 * @param $measurement The pluralised form of the measurement ('' if none)
	 * @param $base The base size of the food of the ingredient ('' if none)
	 * @param $type The base type of the food of the ingredient ('M' - mass, 'V' - volume)
	 * @param $show_qty (optional) If false, only gives the name, not the quantity
	 * @param $how How the ingredient is prepared.
	 *
	 */
	function getIngredientDisplay($name, $name_pl, $quantity, $measurement, $measurement_pl, $base, $type, $how, $show_qty = true) {
		global $defaultMeasurement;

		// set display units depending on defaultMeasurement
		$units = $this->getDefaultUnits();

		// if quantity is an integer value show only the integer
		if ($quantity == (int)$quantity) $quantity = (int)$quantity;

		// discard fractional part of base size, cos who can measure half a gram?
		if ($base != '') {
			$base = round($base);
			if ($base == 0) $base = 1;
		}

		if ($measurement != '' && $base != '') {
			// both measurement and base are set
			// eg. "2 1/2 375mL cans of Tomato Soup"
			$display_qty = $this->_fracConvert($quantity) . ' ';
		 	$display_nam = $base . $units[$type] . ' ';
			$display_nam .= ($quantity > 1) ? $measurement_pl : $measurement;
			$display_nam .= ' of ' . $name;
		}
		elseif ($measurement != '') {
			// measurement is set but base is not
			// eg. "4 2/3 slices of Bread"
			$display_qty = $this->_fracConvert($quantity) . ' ';
			$display_nam = ($quantity > 1) ? $measurement_pl : $measurement;
			$display_nam .= ' of ' . $name;
		}
		elseif ($base != '') {
			// base is set but measurement is not
			// eg. "500g of Beef"
			$display_qty = ceil($quantity * $base);
		 	$display_nam = $units[$type] . ' of ' . $name;
		}
		else {
			// neither measurement nor base is set
			// eg. "1 1/2 Apples"
			$display_qty = $this->_fracConvert($quantity) . ' ';
			$display_nam = ($quantity > 1) ? $name_pl : $name;
		}
		// Add 'crumbed', etc.
		if ($how != '') $display_nam .= ", {$how}";

		if ($show_qty)
			return $display_qty . $display_nam;
		else
			return $display_nam;

	}

	// Meal Manipulation Functions

	/**
	 * Retrieve the Nutritional Data for a Food associated with a given meal
	 * @param $meal_id The ID of the meal
	 * @param $food_id The ID of the food
	 * @return The set of nutritional data and food information
	 */
	function &getMealFood($meal_id, $food_id) {
		$this->clean($meal_id);
		$this->clean($food_id);
		$sql = "SELECT f.*, fm.* FROM medidiets_foods_map fm, medidiets_foods f WHERE fm.food_id = f.food_id AND fm.meal_id = '{$meal_id}' AND fm.food_id = '{$food_id}'";
		return $this->selectSet($sql);
	}

	/**
	 * Retrieves all categories in the database, with all fields, sorted
	 * alphabetically.  This userland function excludes all categories with id's
	 * less than zero!
	 * @return A recordset
	 */
	function &getRecipeCategories() {
		$sql = "SELECT * FROM medidiets_categories_rec WHERE category_id >= 0 ORDER BY description";
		return $this->selectSet($sql);
	}

	/**
	 * Retrieve the Nutritional Data for a Food associated with a given recipe
	 * @param $recipe_id The ID of the recipe
	 * @param $food_id The ID of the food
	 * @return The set of nutritional data and food information
	 */
	function &getRecipeIngredient($recipe_id, $food_id) {
		$this->clean($recipe_id);
		$this->clean($food_id);
		$sql = "SELECT f.*, fm.* FROM medidiets_ingredients fm, medidiets_foods f WHERE fm.food_id = f.food_id AND fm.recipe_id = '{$recipe_id}' AND fm.food_id = '{$food_id}'";
		return $this->selectSet($sql);
	}

	/**
	 * Retrieve a particular recipe
	 * @param $recipe_id The ID of the recipe to retrieve
	 * @return a recordset
	 */
	function &getRecipe($recipe_id) {
		$this->clean($recipe_id);
		$sql = "SELECT * FROM medidiets_recipes WHERE recipe_id='{$recipe_id}'";
		return $this->selectSet($sql);
	}

	/**
	 * Retrieve all recipes in a particular category, sorted alphabetically
	 * This userland version of the function doesn't show magic recipes.
	 * @param $category_id The ID of the category in which to search
	 * @param $data A boolean switch to retrieve the nutritional data for the recipe (default false)
	 * @return a recordset
	 */
	function &getRecipes($category_id, $data = false) {
		$this->clean($category_id);
		if ($data) {
			$sql = "SELECT * FROM
								medidiets_recipes r LEFT JOIN
								(SELECT i.recipe_id,
									sum(i.quantity * f.calories) AS calories,
									sum(i.quantity * f.kilojoules) AS kilojoules,
									sum(i.quantity * f.protein) AS protein,
									sum(i.quantity * f.fat) AS fat,
									sum(i.quantity * f.saturated_fat) AS saturated_fat,
									sum(i.quantity * f.carbohydrate) AS carbohydrate,
									sum(i.quantity * f.sugar) AS sugar,
									sum(i.quantity * f.fiber) AS fiber,
									sum(i.quantity * f.cholesterol) AS cholesterol,
									sum(i.quantity * f.sodium) AS sodium,
									sum(i.quantity * f.potassium) AS potassium,
									sum(i.quantity * f.calcium) AS calcium,
									sum(i.quantity * f.iron) AS iron,
									sum(i.quantity * f.zinc) AS zinc
								FROM
									medidiets_ingredients i,
									medidiets_foods f
								WHERE i.food_id = f.food_id
								GROUP BY i.recipe_id
								) AS sub
							ON r.recipe_id = sub.recipe_id
							AND r.category_id = '{$category_id}'
							AND r.recipe_id >= 0
							ORDER BY r.name";
		}
		else {
			$sql = "SELECT * FROM medidiets_recipes WHERE category_id='{$category_id}' AND recipe_id >= 0 ORDER BY name";
		}

		return $this->selectSet($sql);
	}

	/**
	 * Retrieve the nutritional data for the specified recipe
	 * @param $recipe_id The ID of the recipe to retrieve
	 * @return a recordset
	 */
	function &getRecipeData($recipe_id) {
		$this->clean($recipe_id);
		$sql = "SELECT * FROM
							medidiets_recipes r LEFT JOIN
							(SELECT i.recipe_id,
								sum(i.quantity * f.calories) AS total_calories,
								sum(i.quantity * f.kilojoules) AS total_kilojoules,
								sum(i.quantity * f.protein) AS total_protein,
								sum(i.quantity * f.fat) AS total_fat,
								sum(i.quantity * f.saturated_fat) AS total_saturated_fat,
								sum(i.quantity * f.carbohydrate) AS total_carbohydrate,
								sum(i.quantity * f.sugar) AS total_sugar,
								sum(i.quantity * f.fiber) AS total_fiber,
								sum(i.quantity * f.cholesterol) AS total_cholesterol,
								sum(i.quantity * f.sodium) AS total_sodium,
								sum(i.quantity * f.potassium) AS total_potassium,
								sum(i.quantity * f.calcium) AS total_calcium,
								sum(i.quantity * f.iron) AS total_iron,
								sum(i.quantity * f.zinc) AS total_zinc
							FROM
								medidiets_ingredients i,
								medidiets_foods f
							WHERE i.food_id = f.food_id
							GROUP BY i.recipe_id
							) AS sub
						ON r.recipe_id = sub.recipe_id
						WHERE r.recipe_id = '{$recipe_id}'";
		return $this->selectSet($sql);
	}

	/**
	 * Retrieve all ingredients for a recipe, sorted by their oid
	 * @param $recipe_id The ID of the recipe to which the ingredients are needed
	 * @return a recordset
	 */
	function &getRecipeIngredients($recipe_id) {
		$this->clean($recipe_id);
		// @@ i.quantity must be after the f.* in the select until f.quantity removed...
		$sql = "SELECT f.*, i.quantity, i.how FROM medidiets_foods f, medidiets_ingredients i
						WHERE f.food_id = i.food_id
						AND i.recipe_id = '{$recipe_id}'
						ORDER BY i.oid";

		return $this->selectSet($sql);
	}

}

?>