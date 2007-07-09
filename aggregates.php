<?php

	/**
	 * Manage aggregates in a database
	 *
	 * $Id: aggregates.php,v 1.15.2.2 2007/07/09 14:55:21 xzilla Exp $
	 */

	// Include application functions
	include_once('./libraries/lib.inc.php');
	
	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	if (!isset($msg)) $msg = '';

	/**
	 * Actually creates the new aggregate in the database
	 */
	function doSaveCreate() {
		global $data, $lang, $_reload_browser;

		// Check inputs
		if (trim($_REQUEST['name']) == '') {
			doCreate($lang['straggrneedsname']);
			return;
		}
		else if (trim($_REQUEST['basetype']) == '') {
			doCreate($lang['straggrneedsbasetype']);
			return;
		}
		else if (trim($_REQUEST['sfunc']) == '') {
			doCreate($lang['straggrneedssfunc']);
			return;
		}
		else if (trim($_REQUEST['stype']) == '') {
			doCreate($lang['straggrneedsstype']);
			return;
		}

		$status = $data->createAggregate($_REQUEST['name'], $_REQUEST['basetype'], $_REQUEST['sfunc'], $_REQUEST['stype'], 
		$_REQUEST['ffunc'], $_REQUEST['initcond'], $_REQUEST['sortop'], $_REQUEST['aggrcomment']);
			
		if ($status == 0) {
			$_reload_browser = true;
			doDefault($lang['straggrcreated']);
		}
		else {
			doCreate($lang['straggrcreatedbad']);
		}
	}	

	/**
	 * Displays a screen for create a new aggregate function
	 */
	function doCreate($msg = '') {
		global $data, $misc;
		global $lang;

		if (!isset($_REQUEST['name'])) $_REQUEST['name'] = '';
		if (!isset($_REQUEST['basetype'])) $_REQUEST['basetype'] = '';
		if (!isset($_REQUEST['sfunc'])) $_REQUEST['sfunc'] = '';
		if (!isset($_REQUEST['stype'])) $_REQUEST['stype'] = '';
		if (!isset($_REQUEST['ffunc'])) $_REQUEST['ffunc'] = '';
		if (!isset($_REQUEST['initcond'])) $_REQUEST['initcond'] = '';
		if (!isset($_REQUEST['sortop'])) $_REQUEST['sortop'] = '';
		if (!isset($_REQUEST['aggrcomment'])) $_REQUEST['aggrcomment'] = '';

		$misc->printTrail('schema');
		$misc->printTitle($lang['strcreateaggregate'], 'pg.aggregate.create');
		$misc->printMsg($msg);
				
		echo "<form action=\"aggregates.php\" method=\"post\">\n";
		echo "<table>\n";
		echo "\t<tr>\n\t\t<th class=\"data left required\">{$lang['strname']}</th>\n";
		echo "\t\t<td class=\"data\"><input name=\"name\" size=\"32\" maxlength=\"{$data->_maxNameLen}\" value=\"", 
			htmlspecialchars($_REQUEST['name']), "\" /></td>\n\t</tr>\n";
		echo "\t<tr>\n\t\t<th class=\"data left required\">{$lang['straggrbasetype']}</th>\n";
		echo "\t\t<td class=\"data\"><input name=\"basetype\" size=\"32\" maxlength=\"{$data->_maxNameLen}\" value=\"", 
			htmlspecialchars($_REQUEST['basetype']), "\" /></td>\n\t</tr>\n";
		echo "\t<tr>\n\t\t<th class=\"data left required\">{$lang['straggrsfunc']}</th>\n";
		echo "\t\t<td class=\"data\"><input name=\"sfunc\" size=\"32\" maxlength=\"{$data->_maxNameLen}\" value=\"", 
			htmlspecialchars($_REQUEST['sfunc']), "\" /></td>\n\t</tr>\n";
		echo "\t<tr>\n\t\t<th class=\"data left required\">{$lang['straggrstype']}</th>\n";
		echo "\t\t<td class=\"data\"><input name=\"stype\" size=\"32\" maxlength=\"{$data->_maxNameLen}\" value=\"", 
			htmlspecialchars($_REQUEST['stype']), "\" /></td>\n\t</tr>\n";
		echo "\t<tr>\n\t\t<th class=\"data left\">{$lang['straggrffunc']}</th>\n";
		echo "\t\t<td class=\"data\"><input name=\"ffunc\" size=\"32\" maxlength=\"{$data->_maxNameLen}\" value=\"", 
			htmlspecialchars($_REQUEST['ffunc']), "\" /></td>\n\t</tr>\n";
		echo "\t<tr>\n\t\t<th class=\"data left\">{$lang['straggrinitcond']}</th>\n";
		echo "\t\t<td class=\"data\"><input name=\"initcond\" size=\"32\" maxlength=\"{$data->_maxNameLen}\" value=\"", 
			htmlspecialchars($_REQUEST['initcond']), "\" /></td>\n\t</tr>\n";
		echo "\t<tr>\n\t\t<th class=\"data left\">{$lang['straggrsortop']}</th>\n";
		echo "\t\t<td class=\"data\"><input name=\"sortop\" size=\"32\" maxlength=\"{$data->_maxNameLen}\" value=\"", 
			htmlspecialchars($_REQUEST['sortop']), "\" /></td>\n\t</tr>\n";
		echo "\t<tr>\n\t\t<th class=\"data left\">{$lang['strcomment']}</th>\n";
		echo "\t\t<td><textarea name=\"aggrcomment\" rows=\"3\" cols=\"32\" wrap=\"virtual\">", 
			htmlspecialchars($_REQUEST['aggrcomment']), "</textarea></td>\n\t</tr>\n";

		echo "</table>\n";
		echo "<p><input type=\"hidden\" name=\"action\" value=\"save_create\" />\n";
		echo $misc->form;
		echo "<input type=\"submit\" value=\"{$lang['strcreate']}\" />\n";
		echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" /></p>\n";
		echo "</form>\n";
	}

	/** 
	 * Function to save after altering an aggregate 
	 */
	function doSaveAlter() {
		global $data, $lang;

		// Check inputs
 		if (trim($_REQUEST['aggrname']) == '') {
 			doAlter($lang['straggrneedsname']);
 			return;
 		}
 
		$status = $data->alterAggregate($_REQUEST['aggrname'], $_REQUEST['aggrtype'], $_REQUEST['aggrowner'], 
			$_REQUEST['aggrschema'], $_REQUEST['aggrcomment'], $_REQUEST['newaggrname'], $_REQUEST['newaggrowner'], 
			$_REQUEST['newaggrschema'], $_REQUEST['newaggrcomment']);
		if ($status == 0)
			doDefault($lang['straggraltered']);
		else {
			doAlter($lang['straggralteredbad']);
			return;
		}
	}


	/**
	 * Function to allow editing an aggregate function
	 */
	function doAlter($msg = '') {
		global $data, $misc;
		global $lang;

		$misc->printTrail('aggregate');
		$misc->printTitle($lang['stralteraggregate'], 'pg.aggregate.alter');
		$misc->printMsg($msg);

		echo "<form action=\"aggregates.php\" method=\"post\">\n";
		$aggrdata = $data->getAggregate($_REQUEST['aggrname'], $_REQUEST['aggrtype']);
		if($aggrdata->recordCount() > 0 ) {
			// Output table header
			echo "<table>\n";
			echo "\t<tr>\n\t\t<th class=\"data required\">{$lang['strname']}</th>";
			echo "<th class=\"data required\">{$lang['strowner']}</th>";
			echo "<th class=\"data required\">{$lang['strschema']}</th>\n\t</tr>\n";

			// Display aggregate's name, owner and schema
			echo "\t<tr>\n\t\t<td><input name=\"newaggrname\" size=\"32\" maxlength=\"32\" value=\"", htmlspecialchars($_REQUEST['aggrname']), "\" /></td>";
			echo "<td><input name=\"newaggrowner\" size=\"32\" maxlength=\"32\" value=\"", htmlspecialchars($aggrdata->f['usename']), "\" /></td>";
			echo "<td><input name=\"newaggrschema\" size=\"32\" maxlength=\"32\" value=\"", htmlspecialchars($_REQUEST['schema']), "\" /></td>\n\t</tr>\n";
			echo "\t<tr>\n\t\t<th class=\"data left\">{$lang['strcomment']}</th>\n";
			echo "\t\t<td><textarea name=\"newaggrcomment\" rows=\"3\" cols=\"32\" wrap=\"virtual\">", 
				htmlspecialchars($aggrdata->f['aggrcomment']), "</textarea></td>\n\t</tr>\n";
			echo "</table>\n";
			echo "<p><input type=\"hidden\" name=\"action\" value=\"save_alter\" />\n";
			echo $misc->form;
			echo "<input type=\"hidden\" name=\"aggrname\" value=\"", htmlspecialchars($_REQUEST['aggrname']), "\" />\n";
			echo "<input type=\"hidden\" name=\"aggrtype\" value=\"", htmlspecialchars($_REQUEST['aggrtype']), "\" />\n";
			echo "<input type=\"hidden\" name=\"aggrowner\" value=\"", htmlspecialchars($aggrdata->f['usename']), "\" />\n";
			echo "<input type=\"hidden\" name=\"aggrschema\" value=\"", htmlspecialchars($_REQUEST['schema']), "\" />\n";
			echo "<input type=\"hidden\" name=\"aggrcomment\" value=\"", htmlspecialchars($aggrdata->f['aggrcomment']), "\" />\n";
			echo "<input type=\"submit\" name=\"alter\" value=\"{$lang['stralter']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" /></p>\n";
		} else {
			echo "<p>{$lang['strnodata']}</p>\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strback']}\" /></p>\n";
		}	
		echo "</form>\n";						
	}

	/**
	 * Show confirmation of drop and perform actual drop of the aggregate function selected
	 */
	function doDrop($confirm) {
		global $data, $misc;
		global $lang, $_reload_browser;

		if ($confirm) {
			$misc->printTrail('aggregate');
			$misc->printTitle($lang['strdrop'], 'pg.aggregate.drop');

			echo "<p>", sprintf($lang['strconfdropaggregate'], htmlspecialchars($_REQUEST['aggrname'])), "</p>\n";

			echo "<form action=\"aggregates.php\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"drop\" />\n";
			echo "<input type=\"hidden\" name=\"aggrname\" value=\"", htmlspecialchars($_REQUEST['aggrname']), "\" />\n";
			echo "<input type=\"hidden\" name=\"aggrtype\" value=\"", htmlspecialchars($_REQUEST['aggrtype']), "\" />\n";
			echo $misc->form;
			// Show cascade drop option if supportd
			if ($data->hasDropBehavior()) {
				echo "<p><input type=\"checkbox\" id=\"cascade\" name=\"cascade\" /> <label for=\"cascade\">{$lang['strcascade']}</label></p>\n";
			}
			echo "<input type=\"submit\" name=\"drop\" value=\"{$lang['strdrop']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" />\n";
			echo "</form>\n";
		}
		else {
			$status = $data->dropAggregate($_POST['aggrname'], $_POST['aggrtype'], isset($_POST['cascade']));
			if ($status == 0) {
				$_reload_browser = true;
				doDefault($lang['straggregatedropped']);
			}
			else
				doDefault($lang['straggregatedroppedbad']);
		}
	}

	/**
	 * Show the properties of an aggregate
	 */
	function doProperties($msg = '') {
		global $data, $misc;
		global $lang;

		$misc->printTrail('aggregate');
		$misc->printTitle($lang['strproperties'],'pg.aggregate');
		$misc->printMsg($msg);

		$aggrdata = $data->getAggregate($_REQUEST['aggrname'], $_REQUEST['aggrtype']);

		if($aggrdata->recordCount() > 0 ) {
			// Display aggregate's info
			echo "<table>\n";
			echo "<tr>\n\t<th class=\"data\">Description</th>\n\t<th class=\"data\">Value</th>\n</tr>\n";
			echo "<tr>\n\t<td class=\"data1\" width=\"160\">{$lang['strname']}</td>\n";
			echo "\t<td class=\"data1\" width=\"120\">", htmlspecialchars($_REQUEST['aggrname']), "</td>\n</tr>\n";
			echo "<tr>\n\t<td class=\"data2\">{$lang['straggrbasetype']}</td>\n";
			echo "\t<td class=\"data2\">", htmlspecialchars($_REQUEST['aggrtype']), "</td>\n</tr>\n";
			echo "<tr>\n\t<td class=\"data1\">{$lang['straggrsfunc']}</td>\n";
			echo "\t<td class=\"data1\">", htmlspecialchars($aggrdata->f['aggtransfn']), "</td>\n</tr>\n";
			echo "<tr>\n\t<td class=\"data2\">{$lang['straggrstype']}</td>\n";
			echo "\t<td class=\"data2\">", htmlspecialchars($aggrdata->f['aggstype']), "</td>\n</tr>\n";
			echo "<tr>\n\t<td class=\"data1\">{$lang['straggrffunc']}</td>\n";
			echo "\t<td class=\"data1\">", htmlspecialchars($aggrdata->f['aggfinalfn']), "</td>\n</tr>\n";
			echo "<tr>\n\t<td class=\"data2\">{$lang['straggrinitcond']}</td>\n";
			echo "\t<td class=\"data2\">", htmlspecialchars($aggrdata->f['agginitval']), "</td>\n</tr>\n";
			echo "<tr>\n\t<td class=\"data1\">{$lang['straggrsortop']}</td>\n";
			echo "\t<td class=\"data1\">", htmlspecialchars($aggrdata->f['aggsortop']), "</td>\n</tr>\n";
			echo "<tr>\n\t<td class=\"data2\">{$lang['strowner']}</td>\n";
			echo "\t<td class=\"data2\">", htmlspecialchars($aggrdata->f['usename']), "</td>\n</tr>\n";
			echo "<tr>\n\t<td class=\"data1\">{$lang['strcomment']}</td>\n";
			echo "\t<td class=\"data1\">", $misc->printVal($aggrdata->f['aggrcomment']), "</td>\n</tr>\n";
			echo "</table>\n";
		}
		else echo "<p>{$lang['strnodata']}</p>\n";

		echo "<p><a class=\"navlink\" href=\"aggregates.php?{$misc->href}\">{$lang['straggrshowall']}</a> |\n";
		if ($data->hasAlterAggregate()) {
		echo "<a class=\"navlink\" href=\"aggregates.php?action=alter&amp;{$misc->href}&amp;aggrname=", 
			urlencode($_REQUEST['aggrname']), "&amp;aggrtype=", urlencode($_REQUEST['aggrtype']), "\">{$lang['stralter']}</a> |\n";
		}
		echo "<a class=\"navlink\" href=\"aggregates.php?action=confirm_drop&amp;{$misc->href}&amp;aggrname=",
			urlencode($_REQUEST['aggrname']), "&amp;aggrtype=", urlencode($_REQUEST['aggrtype']), "\">{$lang['strdrop']}</a>\n";
	}


	/**
	 * Show default list of aggregate functions in the database
	 */
	function doDefault($msg = '') {
		global $data, $conf, $misc;	
		global $lang;

		$misc->printTrail('schema');
		$misc->printTabs('schema', 'aggregates');
		$misc->printMsg($msg);
		
		$aggregates = $data->getAggregates();

		$columns = array(
			'aggrname' => array(
				'title' => $lang['strname'],
				'field' => 'proname',
			),
			'aggrtype' => array(
				'title' => $lang['strtype'],
				'field' => 'proargtypes',
			),
			'aggrtransfn' => array(
				'title' => $lang['straggrtransfn'],
				'field' => 'aggtransfn',
			),			
			'owner' => array(
				'title' => $lang['strowner'],
				'field' => 'usename',
			),			
			'actions' => array(
				'title' => $lang['stractions'],
			),			
			'comment' => array(
				'title' => $lang['strcomment'],
				'field' => 'aggrcomment',
			),
		);
		
		$actions = array(
			'properties' => array(
				'title' => $lang['strproperties'],
				'url'   => "redirect.php?subject=aggregate&amp;action=properties&amp;{$misc->href}&amp;",
				'vars'  => array('aggrname' => 'proname', 'aggrtype' => 'proargtypes'),
			),		
			'alter' => array(
				'title' => $lang['stralter'],
				'url'   => "aggregates.php?action=alter&amp;{$misc->href}&amp;",
				'vars'  => array('aggrname' => 'proname', 'aggrtype' => 'proargtypes'),
			),
			'drop' => array(
				'title' => $lang['strdrop'],
				'url'   => "aggregates.php?action=confirm_drop&amp;{$misc->href}&amp;",
				'vars'  => array('aggrname' => 'proname', 'aggrtype' => 'proargtypes'),
			)
		);

		if (!$data->hasAlterAggregate()) unset($actions['alter']);
		$misc->printTable($aggregates, $columns, $actions, $lang['strnoaggregates']);
		
		echo "<p><a class=\"navlink\" href=\"aggregates.php?action=create&amp;{$misc->href}\">{$lang['strcreateaggregate']}</a></p>\n";
	}

	/**
	 * Generate XML for the browser tree.
	 */
	function doTree() {
		global $misc, $data;
		
		$aggregates = $data->getAggregates();

                $proto = concat(field('proname'), ' (', field('proargtypes'), ')');
                $reqvars = $misc->getRequestVars('aggregate');
		
		$attrs = array(
			'text'    => $proto,
			'icon'    => 'Aggregate',
			'toolTip' => field('aggcomment'),

                        'action'  => url('redirect.php',
                                                        $reqvars,
                                                        array(
                                                            'action' => 'properties',
                                                            'aggrname' => field('proname'),
                                                            'aggrtype' => field('proargtypes')
                                                            )
                                        )

		);
		
		$misc->printTreeXML($aggregates, $attrs);
		exit;
	}
	
	if ($action == 'tree') doTree();
	
	$misc->printHeader($lang['straggregates']);
	$misc->printBody();

	switch ($action) {
		case 'create':
			doCreate();
			break;
		case 'save_create':
			if (isset($_POST['cancel'])) doDefault();
			else doSaveCreate();
			break;
		case 'alter':
			doAlter();
			break;
		case 'save_alter':
			if (isset($_POST['alter'])) doSaveAlter();
			else doProperties();
			break;
		case 'drop':
			if (isset($_POST['drop'])) doDrop(false);
			else doDefault();
			break;
		case 'confirm_drop':
			doDrop(true);
			break;
		default:
			doDefault();
			break;
		case 'properties':
			doProperties();
			break;
	}

	$misc->printFooter();

?>
