<?php
	include_once('./libraries/lib.inc.php');

	if(isset($_POST['offset']))
		$offset = " OFFSET {$_POST['offset']}";
	else {
		$_POST['offset'] = 0;
		$offset = " OFFSET 0";
	}
	$keyspos = array_combine($_POST['fkeynames'], $_POST['keys']);
	$keysnames = array_combine($_POST['fkeynames'], $_POST['keynames']);

	$q = "SELECT *
		FROM \"{$_POST['f_schema']}\".\"{$_POST['f_table']}\"
		WHERE \"{$_POST['fkeynames'][$_POST['fattpos']]}\"::text LIKE '{$_POST['fvalue']}%'
		ORDER BY \"{$_POST['fkeynames'][$_POST['fattpos']]}\" LIMIT 12 {$offset};";

	$res = $data->selectSet($q);

	if (!$res->EOF) {
		echo "<table class=\"ac_values\">";
		echo '<tr>';
		foreach (array_keys($res->fields) as $h) {
			echo '<th>';

			if (in_array($h,$_POST['fkeynames']))
				echo '<img src="'. $misc->icon('ForeignKey') .'" alt="[referenced key]" />';

			echo htmlentities($h), '</th>';
			
		}
		echo "</tr>\n";
		$i=0;
		while ((!$res->EOF) && ($i < 11)) {
			echo "<tr class=\"acline\">";
			foreach ($res->fields as $n => $v) {
				if (in_array($n,$_POST['fkeynames']))
					echo "<td><a href=\"javascript:void(0)\" class=\"fkval\" name=\"{$keyspos[$n]}\">",htmlentities($v), "</a></td>";
				else
					echo "<td><a href=\"javascript:void(0)\">", htmlentities($v), "</a></td>";
			}
			echo "</tr>\n";
			$i++;
			$res->moveNext();
		}		
		echo "</table>\n";

		$page_tests='';

		$js = "<script type=\"text/javascript\">\n";
		
		if ($_POST['offset']) {
			echo "<a href=\"javascript:void(0)\" id=\"fkprev\">&lt;&lt; Prev</a>";
			$js.= "fkl_hasprev=true;\n";
		}
		else
			$js.= "fkl_hasprev=false;\n";

		if ($res->recordCount() == 12) {
			$js.= "fkl_hasnext=true;\n";
			echo "&nbsp;&nbsp;&nbsp;<a href=\"javascript:void(0)\" id=\"fknext\">Next &gt;&gt;</a>";
		}
		else
			$js.= "fkl_hasnext=false;\n";
		
		echo $js ."</script>";
	}
	else {
		printf("<p>{$lang['strnofkref']}</p>", "\"{$_POST['f_schema']}\".\"{$_POST['f_table']}\".\"{$_POST['fkeynames'][$_POST['fattpos']]}\"");

		if ($_POST['offset'])
			echo "<a href=\"javascript:void(0)\" class=\"fkprev\">Prev &lt;&lt;</a>";
	}
?>
