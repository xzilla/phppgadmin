/**
 * Function for updating browser frame and topbar frame so that sqledit window 
 * pops up with properly selected database.
 *
 * $Id: links.js,v 1.3 2003/12/28 08:15:34 chriskl Exp $
 */
function updateLinks(getVars) {
	var topbarLink = 'topbar.php' + getVars;
	var browserLink = 'browser.php' + getVars;
	var detailLink = 'database.php' + getVars;
		
	parent.frames.topbar.location = topbarLink;
	parent.frames.detail.location = detailLink;
	parent.frames.browser.location = browserLink;
}

