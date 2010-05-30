$(document).ready(function() {

	var timeid = null;
	var controlLink = $('#control');

	function refreshLocksTable() {
		if (Database.ajax_time_refresh > 0) {
			$.ajax({
				type: 'GET',
				dataType: 'html',
				url: 'database.php?action=refresh_locks&' + Database.server,
				timeout: Database.ajax_timeout - 100,
				cache: false,
				contentType: 'application/x-www-form-urlencoded',
				success: function(html) {
					$('#locks_block').html(html);
					timeid = window.setTimeout(refreshLocksTable, Database.ajax_time_refresh)
				}
			});
		}
	}

	controlLink.toggle(
		function() {
			timeid = window.setTimeout(refreshLocksTable, Database.ajax_time_refresh);
			controlLink.html('<img src="'+ Database.str_stop.icon +'" alt="" />&nbsp;'
				+ Database.str_stop.text);
		},
		function() {
			window.clearInterval(timeid);
			controlLink.html('<img src="'+ Database.str_start.icon +'" alt="" />&nbsp;'
				+ Database.str_start.text
			);
		}
	);

	controlLink.click();
});
