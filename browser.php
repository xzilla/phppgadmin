<?php

	/**
	 * Main object browser.  This page first shows a list of databases and then
	 * if you click on a database it shows a list of database objects in that
	 * database.
	 *
	 * $Id: browser.php,v 1.42.2.1 2005/03/11 04:41:05 chriskl Exp $
	 */

	// Include application functions
	include_once('./libraries/lib.inc.php');
	
	// Include tree classe
	include_once('./classes/HTML_TreeMenu/TreeMenu.php');

	// Output header
	$misc->printHeader('', "<script src=\"classes/HTML_TreeMenu/TreeMenu.js\" type=\"text/javascript\"></script>\n<script src=\"links.js\" type=\"text/javascript\"></script>");
	$misc->printBody('browser');
	echo "<div dir=\"ltr\">\n";
	
	// Construct expanding tree
	$menu  = new HTML_TreeMenu(null, array('usePersistence' => false));
	$root = new HTML_TreeNode(array(
						'text' => $misc->printVal(($conf['servers'][$_SESSION['webdbServerID']]['desc'])), 
						'link' => addslashes('redirect.php?section=server&amp;' . SID), 
						'icon' => 'folder.gif', 
						'expandedIcon' => 'folder-expanded.gif',
						'expanded' => true,
						'linkTarget' => 'detail'));

	// Add root node to menu
	$menu->addItem($root);

	/**
	 * Helper function for adding nodes
	 * @param $schemanode Node onto which to add
	 */
	function addNodes(&$schemanode, $querystr) {
		global $data, $misc, $lang, $conf;
		
		// Tables
		$table_node = &new HTML_TreeNode(array(
						'text' => $lang['strtables'], 
						'link' => addslashes(htmlspecialchars("tables.php?{$querystr}")), 
						'icon' => "../../../images/themes/{$conf['theme']}/tables.png", 
						'expandedIcon' => "../../../images/themes/{$conf['theme']}/tables.png",
						'expanded' => false,
						'linkTarget' => 'detail'));
		// Add table folder to schema
		$schemanode->addItem($table_node);

		$tables = &$data->getTables();
		while (!$tables->EOF) {
			$return_url = urlencode("tblproperties.php?table=" . urlencode($tables->f['relname']) . "&{$querystr}");
			$item_node = &new HTML_TreeNode(array(
							'text' => $misc->printVal($tables->f['relname']), 
							'link' => addslashes(htmlspecialchars("redirect.php?section=table&{$querystr}&table=" . urlencode($tables->f['relname']))), 
							'icon' => "../../../images/themes/{$conf['theme']}/tables.png", 
							'expandedIcon' => "../../../images/themes/{$conf['theme']}/tables.png",
							'expanded' => false,
							'linkTarget' => 'detail',
							'iconLink' => addslashes(htmlspecialchars('display.php?table=' . urlencode($tables->f['relname']) . '&subject=table&' . $querystr . "&return_url={$return_url}&return_desc=" . urlencode($lang['strback'])))
							));
			// Add table folder to schema
			$table_node->addItem($item_node);

			$tables->moveNext();
		}

		// Views
		$view_node = &new HTML_TreeNode(array(
						'text' => $lang['strviews'], 
						'link' => addslashes(htmlspecialchars("views.php?{$querystr}")), 
						'icon' => "../../../images/themes/{$conf['theme']}/views.png", 
						'expandedIcon' => "../../../images/themes/{$conf['theme']}/views.png",
						'expanded' => false,
						'linkTarget' => 'detail'));
		// Add view folder to schema
		$schemanode->addItem($view_node);

		$views = &$data->getViews();
		while (!$views->EOF) {
			$return_url = urlencode("viewproperties.php?view=" . urlencode($views->f['relname']) . "&{$querystr}");
			$item_node = &new HTML_TreeNode(array(
							'text' => $misc->printVal($views->f['relname']), 
							'link' => addslashes(htmlspecialchars("redirect.php?section=view&{$querystr}&view=" .
								urlencode($views->f['relname']))), 
							'icon' => "../../../images/themes/{$conf['theme']}/views.png", 
							'expandedIcon' => "../../../images/themes/{$conf['theme']}/views.png",
							'expanded' => false,
							'linkTarget' => 'detail',
							// XXX: FIX BROWSE
							'iconLink' => addslashes(htmlspecialchars('display.php?view='.urlencode($views->f['relname']).'&subject=view&'.$querystr.
								"&return_url={$return_url}&return_desc=" . urlencode($lang['strback'])))
							));
			// Add view folder to schema
			$view_node->addItem($item_node);

			$views->moveNext();
		}

		// Sequences
		$seq_node = &new HTML_TreeNode(array(
						'text' => $lang['strsequences'], 
						'link' => addslashes(htmlspecialchars("sequences.php?{$querystr}")), 
						'icon' => "../../../images/themes/{$conf['theme']}/sequences.png", 
						'expandedIcon' => "../../../images/themes/{$conf['theme']}/sequences.png",
						'expanded' => false,
						'linkTarget' => 'detail'));
		// Add folder to schema
		$schemanode->addItem($seq_node);

		// Functions
		$func_node = &new HTML_TreeNode(array(
						'text' => $lang['strfunctions'], 
						'link' => addslashes(htmlspecialchars("functions.php?{$querystr}")), 
						'icon' => "../../../images/themes/{$conf['theme']}/functions.png", 
						'expandedIcon' => "../../../images/themes/{$conf['theme']}/functions.png",
						'expanded' => false,
						'linkTarget' => 'detail'));
		// Add folder to schema
		$schemanode->addItem($func_node);

		// Domains
		if ($data->hasDomains()) {
			$dom_node = &new HTML_TreeNode(array(
							'text' => $lang['strdomains'], 
							'link' => addslashes(htmlspecialchars("domains.php?{$querystr}")), 
							'icon' => "../../../images/themes/{$conf['theme']}/domains.png", 
							'expandedIcon' => "../../../images/themes/{$conf['theme']}/domains.png",
							'expanded' => false,
							'linkTarget' => 'detail'));

			// Add folder to schema
			$schemanode->addItem($dom_node);
		}

		// Advanced
		if ($conf['show_advanced']) {
			$adv_node = &new HTML_TreeNode(array(
							'text' => $lang['stradvanced'], 
#							'link' => ($data->hasSchemas()) ? addslashes(htmlspecialchars("schema.php?{$querystr}&" . SID)) : null, 
							'icon' => 'folder.gif', 
							'expandedIcon' => 'folder-expanded.gif',
							'linkTarget' => 'detail'));
			// Add folder to schema
			$schemanode->addItem($adv_node);			

			// Aggregates
			$agg_node = &new HTML_TreeNode(array(
							'text' => $lang['straggregates'], 
							'link' => addslashes(htmlspecialchars("aggregates.php?{$querystr}")), 
							'icon' => "../../../images/themes/{$conf['theme']}/types.png", 
							'expandedIcon' => "../../../images/themes/{$conf['theme']}/types.png",
							'expanded' => false,
							'linkTarget' => 'detail'));
			// Add folder to schema
			$adv_node->addItem($agg_node);

			// Types
			$type_node = &new HTML_TreeNode(array(
							'text' => $lang['strtypes'], 
							'link' => addslashes(htmlspecialchars("types.php?{$querystr}")), 
							'icon' => "../../../images/themes/{$conf['theme']}/types.png", 
							'expandedIcon' => "../../../images/themes/{$conf['theme']}/types.png",
							'expanded' => false,
							'linkTarget' => 'detail'));
			// Add folder to schema
			$adv_node->addItem($type_node);

			// Operators
			$opr_node = &new HTML_TreeNode(array(
							'text' => $lang['stroperators'], 
							'link' => addslashes(htmlspecialchars("operators.php?{$querystr}")), 
							'icon' => "../../../images/themes/{$conf['theme']}/operators.png", 
							'expandedIcon' => "../../../images/themes/{$conf['theme']}/operators.png",
							'expanded' => false,
							'linkTarget' => 'detail'));
			// Add folder to schema
			$adv_node->addItem($opr_node);

			// Operator Classes
			$opc_node = &new HTML_TreeNode(array(
							'text' => $lang['stropclasses'], 
							'link' => addslashes(htmlspecialchars("opclasses.php?{$querystr}")), 
							'icon' => "../../../images/themes/{$conf['theme']}/operators.png", 
							'expandedIcon' => "../../../images/themes/{$conf['theme']}/operators.png",
							'expanded' => false,
							'linkTarget' => 'detail'));
			// Add folder to schema
			$adv_node->addItem($opc_node);

			// Conversions
			if ($data->hasConversions()) {
				$con_node = &new HTML_TreeNode(array(
								'text' => $lang['strconversions'], 
								'link' => addslashes(htmlspecialchars("conversions.php?{$querystr}")), 
								'icon' => "../../../images/themes/{$conf['theme']}/types.png", 
								'expandedIcon' => "../../../images/themes/{$conf['theme']}/types.png",
								'expanded' => false,
								'linkTarget' => 'detail'));

				// Add folder to schema
				$adv_node->addItem($con_node);
			}
		}
	}	

	$databases = &$data->getDatabases();
	while (!$databases->EOF) {
		// If database is selected, show folder, otherwise show document
		if (isset($_REQUEST['database']) && $_REQUEST['database'] == $databases->f['datname']) {
			// Very ugly hack to work around the fact that the PEAR HTML_Tree can't have links with embedded
			// apostrophes create the get string we need to append
			$querystr = 'database=' . urlencode($databases->f['datname']) . '&' . SID;
			$db_node = &new HTML_TreeNode(array(
								'text' => $misc->printVal($databases->f['datname']), 
								'link' => addslashes(htmlspecialchars("redirect.php?section=database&{$querystr}")),
								'icon' => "../../../images/themes/{$conf['theme']}/database.png", 
								'expandedIcon' => "../../../images/themes/{$conf['theme']}/database.png",
								'expanded' => true,
								'linkTarget' => 'detail'));
		
			// If database supports schemas, add the extra level of hierarchy
			if ($data->hasSchemas()) {
				$schemas = &$data->getSchemas();
				while (!$schemas->EOF) {
					$data->setSchema($schemas->f['nspname']);
					// Construct database & schema query string
					$querystr = 'database=' . urlencode($databases->f['datname']). '&schema=' .
							urlencode($schemas->f['nspname']) . '&' . SID;
					$schemanode = &new HTML_TreeNode(array(
									'text' => $misc->printVal($schemas->f['nspname']), 
									'link' => addslashes(htmlspecialchars("redirect.php?section=schema&{$querystr}")), 
									'icon' => 'folder.gif', 
									'expandedIcon' => 'folder-expanded.gif',
									// Auto-expand your personal schema, if it exists.  Also expand schema if there is
									// only one schema in the database.
									'expanded' => ($schemas->f['nspname'] == $_SESSION['webdbUsername']
															|| $schemas->recordCount() == 1),
									'linkTarget' => 'detail'));

					addNodes($schemanode, $querystr);

					// Add schema to database
					$db_node->addItem($schemanode);

					$schemas->moveNext();
				}
			}
			// Database doesn't support schemas
			else {
				// Construct database query string
				$querystr = 'database=' . urlencode($databases->f['datname']) . '&' . SID;

				addNodes($db_node, $querystr);
			}
			
			// Reset database query string
			$querystr = 'database=' . urlencode($databases->f['datname']) . '&' . SID;

			// Languages
			if ($conf['show_advanced']) {
				$lang_node = &new HTML_TreeNode(array(
								'text' => $lang['strlanguages'], 
								'link' => addslashes(htmlspecialchars("languages.php?{$querystr}")), 
								'icon' => "../../../images/themes/{$conf['theme']}/types.png", 
								'expandedIcon' => "../../../images/themes/{$conf['theme']}/types.png",
								'expanded' => false,
								'linkTarget' => 'detail'));
				// Add folder to database
				$db_node->addItem($lang_node);
			
				// Casts
				if ($data->hasCasts()) {		
					$cast_node = &new HTML_TreeNode(array(
									'text' => $lang['strcasts'], 
									'link' => addslashes(htmlspecialchars("casts.php?{$querystr}")), 
									'icon' => "../../../images/themes/{$conf['theme']}/types.png", 
									'expandedIcon' => "../../../images/themes/{$conf['theme']}/types.png",
									'expanded' => false,
									'linkTarget' => 'detail'));

					// Add folder to database
					$db_node->addItem($cast_node);
				}
			}
		
			// Add node to menu
			$root->addItem($db_node);

		} else {
			// Very ugly hack to work around the fact that the PEAR HTML_Tree can't have links with embedded
			// apostrophes create the get string we need to append
			$jsLink = '?database=' . addslashes(htmlspecialchars(urlencode($databases->f['datname']) . '&' . SID));
			$jsLink = "javascript:updateLinks(' + \"'{$jsLink}'\" + ')";
			$db_node = &new HTML_TreeNode(array(
									'text' => $misc->printVal($databases->f['datname']), 
									'link' => $jsLink,
									'icon' => "../../../images/themes/{$conf['theme']}/database.png", 
									'expandedIcon' => "../../../images/themes/{$conf['theme']}/database.png",
									'expanded' => false,
									'linkTarget' => '_self'));
		
			// Add node to menu
			$root->addItem($db_node);
		}
		
		$databases->moveNext();
	}		
	// Create the presentation class
	$treeMenu = &new HTML_TreeMenu_DHTML($menu, array('images' => 'classes/HTML_TreeMenu/images', 'defaultClass' => 'treeMenuDefault'));
	
	// Actually display the menu
	$treeMenu->printMenu();

   // Output footer
   echo "</div>\n";
   $misc->printFooter();

?>
