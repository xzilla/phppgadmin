<?php
/*
 * This class help building a selenium HTML test file for PPA.
**/
	class TestBuilder {
		private $fd; /* the file descriptor to the test file to write */
		private $file; /* the test file name where the tests will be written*/

		/**
		 * Constructor
		 * @param $file The file name that will be created
		 * @param $serverDesc The server['desc'] conf param to which we are writing this test file for.
		 * @param $title The title of the HTML test page
		 * @param $desc The top description on the HTML test page
		 */
		public function __construct($file, $serverDesc, $title, $desc) {
			$this->file = $file;
			$this->title = $title;
			$this->servDesc = $serverDesc;

			$this->fd = fopen($this->file, 'w');

			fprintf($this->fd, '%s', "<html>\n<head>
				<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
				<title>$title</title>
				</head>
				<body>
				<table cellpadding=\"1\" cellspacing=\"1\" border=\"1\">
				<thead>
				<tr><td rowspan=\"1\" colspan=\"3\">$desc</td></tr>
				</thead><tbody>"
			);
		}

		/**
		 * Add steps to login on PPA using the given credentials
		 * @param $u The username to use
		 * @param $p The password to use
		 */
		public function login($u, $p) {
			global $webUrl;
			$this->test('open', "$webUrl/servers.php");
			$this->test('clickAndWait', "link={$this->servDesc}");
			$this->test('type', "//input[@name='loginUsername']", $u);
			$this->test('type', "//input[@id='loginPassword']", $p);
			$this->test('clickAndWait', 'loginSubmit');
			$this->test('assertText', "//div[@class='topbar']/descendant::span[@class='username']", $u);
		}

		/**
		 * Add steps to logout from the server
		 */
		public function logout() {
			global $lang;

			$this->test('clickAndWait', "//div[@class='trail']/descendant::tr/td[1]/a/span[@class='label' and text()='phpPgAdmin']");
			$this->test('clickAndWait', "link={$lang['strservers']}");
			$this->test('clickAndWait', "//tr/td/a[text()='{$this->servDesc}']/../../td/a[text()='{$lang['strlogout']}']");

			$this->test('assertText', "//p[@class='message']",
				sprintf($lang['strlogoutmsg'], $this->servDesc)
			);
		}

		/**
		 * Write the test file, close it,
		 * append the test file to the TestSuite.html file and destroy itself
		 */
		public function writeTests($testsuite_file) {
			fprintf($this->fd, '%s', "\n</tbody></table></body></html>");
			fclose($this->fd);

			$fd = fopen($testsuite_file, 'a');
			fprintf($fd, "<tr>\n<td><a href=\"%s/%s\">[%s] %s</a></td>\n</tr>\n", $this->servDesc, basename($this->file), $this->servDesc, $this->title);
			fclose($fd);
		}

		/**
		 * Add a selenium test to the file
		 * @param $action the selenium action (first column)
		 * @param $selector the selector to select the object to work on (second column)
		 * @param $value (optional) the expected (or not) value (third column)
		 */
		public function test($action, $selector, $value='') {
			fprintf($this->fd, '%s',
				"<tr>\n<td>$action</td>\n<td>$selector</td>\n<td>$value</td>\n</tr>\n"
			);
		}

		/**
		 * Add a selenium type test to the file
		 * @param $selector the selector to select the object to work on (second column)
		 * @param $value (optional) the expected (or not) value (third column)
		 */
		public function type($selector, $value) {
			$this->test('type', $selector, $value);
		}

		/**
		 * Add a selenium select test to the file
		 * @param $selector the selector to select the object to work on (second column)
		 * @param $value (optional) the expected (or not) value (third column)
		 */
		public function select($selector, $value) {
			$this->test('select', $selector, $value);
		}

		/**
		 * Add a selenium click test to the file
		 * @param $selector the selector to select the object to work on (second column)
		 */
		public function click($selector) {
			$this->test('click', $selector);
		}

		/**
		 * Add a selenium clickAndWait est to the file
		 * @param $selector the selector to select the object to work on (second column)
		 */
		public function clickAndWait($selector) {
			$this->test('clickAndWait', $selector);
		}

		/**
		 * Add a selenium assertText test to the file
		 * @param $selector the selector to select the object to work on (second column)
		 * @param $value (optional) the expected (or not) value (third column)
		 */
		public function assertText($selector, $value) {
			$this->test('assertText', $selector, $value);
		}
	}
?>
