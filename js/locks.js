$(document).ready(function() {

	var timeid = query = null;
	var controlLink = $('#control');
	var errmsg = $('<p class="errmsg">'+Database.errmsg+'</p>')
		.insertBefore(controlLink)
		.hide();
	var loading = $('<img class="loading" alt="[loading]" src="'+ Database.load_icon +'" />')
		.insertAfter(controlLink)
		.hide();

	function refreshLocksTable() {
		if (Database.ajax_time_refresh > 0) {
			loading.show();
			query = $.ajax({
				type: 'GET',
				dataType: 'html',
				url: 'database.php?action=refresh_locks&' + Database.server,
				cache: false,
				contentType: 'application/x-www-form-urlencoded',
				success: function(html) {
					$('#locks_block').html(html);
					timeid = window.setTimeout(refreshLocksTable, Database.ajax_time_refresh)
				},
				error: function() {
					controlLink.click();
					errmsg.show();
				},
				complete: function () {
					loading.hide();
				}
			});
		}
	}

	controlLink.toggle(
		function() {
			$(errmsg).hide();
			timeid = window.setTimeout(refreshLocksTable, Database.ajax_time_refresh);
			controlLink.html('<img src="'+ Database.str_stop.icon +'" alt="" />&nbsp;'
				+ Database.str_stop.text + '&nbsp;&nbsp;&nbsp;'
			);
		},
		function() {
			$(errmsg).hide();
			$(loading).hide();
			window.clearInterval(timeid);
			query.abort();
			controlLink.html('<img src="'+ Database.str_start.icon +'" alt="" />&nbsp;'
				+ Database.str_start.text
			);
		}
	);

	/* preload images */
	$('#control img').hide()
		.attr('src', Database.str_start.icon)
		.attr('src', Database.str_stop.icon)
		.show();
	
	/* start refreshing */
	controlLink.click();
});
