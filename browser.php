<?php

	/**
	 * Main object browser.  This page first shows a list of databases and then
	 * if you click on a database it shows a list of database objects in that
	 * database.
	 *
	 * $Id: browser.php,v 1.46 2005/05/02 15:47:23 chriskl Exp $
	 */

	// Include application functions
	$_no_db_connection = true;
	include_once('./libraries/lib.inc.php');
	
	// Output header
	$misc->printHeader('', "<script src=\"xloadtree/xmlextras.js\" type=\"text/javascript\"></script>\n<script src=\"xloadtree/xtree2.js\" type=\"text/javascript\"></script>\n<script src=\"xloadtree/xloadtree2.js\" type=\"text/javascript\"></script>");
	$misc->printBody('browser');
	echo "<div dir=\"ltr\">\n";
?>

	<div class="logo"><a href="intro.php" target="detail"><img src="<?php echo $misc->icon('title') ?>" width="200" height="50" alt="<?php echo htmlspecialchars($appName) ?>" title="<?php echo htmlspecialchars($appName) ?>" /></a></div>

<style type="text/css">
.webfx-tree-children {
	background-image:	url("<?php echo $misc->icon('I') ?>");
}
</style>
<script type="text/javascript">

webFXTreeConfig.rootIcon		= "<?php echo $misc->icon('root') ?>";
webFXTreeConfig.openRootIcon	= "<?php echo $misc->icon('root') ?>";
webFXTreeConfig.folderIcon		= "<?php echo $misc->icon('folder') ?>";
webFXTreeConfig.openFolderIcon	= "<?php echo $misc->icon('folderOpen') ?>";
webFXTreeConfig.fileIcon		= "<?php echo $misc->icon('file') ?>";
webFXTreeConfig.iIcon			= "<?php echo $misc->icon('I') ?>";
webFXTreeConfig.lIcon			= "<?php echo $misc->icon('L') ?>";
webFXTreeConfig.lMinusIcon		= "<?php echo $misc->icon('Lminus') ?>";
webFXTreeConfig.lPlusIcon		= "<?php echo $misc->icon('Lplus') ?>";
webFXTreeConfig.tIcon			= "<?php echo $misc->icon('T') ?>";
webFXTreeConfig.tMinusIcon		= "<?php echo $misc->icon('Tminus') ?>";
webFXTreeConfig.tPlusIcon		= "<?php echo $misc->icon('Tplus') ?>";
webFXTreeConfig.blankIcon		= "<?php echo $misc->icon('blank') ?>";
webFXTreeConfig.loadingIcon		= "<?php echo $misc->icon('loading') ?>";
webFXTreeConfig.loadingText		= "<?php echo $lang['strloading'] ?>";
webFXTreeConfig.errorIcon		= "<?php echo $misc->icon('error') ?>";
webFXTreeConfig.errorLoadingText = "<?php echo $lang['strerrorloading'] ?>";
webFXTreeConfig.reloadText		= "<?php echo $lang['strclicktoreload'] ?>";

// Set default target frame:
WebFXTreeAbstractNode.prototype.target = 'detail';

// Disable double click:
WebFXTreeAbstractNode.prototype._onDblClick = function(){}

// Show tree XML on double click - for debugging purposes only
// TODO: REMOVE THIS BEFORE RELEASE
WebFXTreeAbstractNode.prototype._onDblClick = function(e){
	var el = e.target || e.srcElement;

	if (this.src != null)
		window.open(this.src, this.target || "_self");
	return false;
};

var tree = new WebFXLoadTree("<?php echo $lang['strservers']; ?>", "servers.php?action=tree", "servers.php");

tree.write();
tree.setExpanded(true);

</script>

<?php
   // Output footer
   echo "</div>\n";
   $misc->printFooter();

?>
