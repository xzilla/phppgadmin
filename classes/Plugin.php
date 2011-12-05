<?php
abstract class Plugin {

	/**
	 * Constructor
	 * Register the plugin's functions in hooks of PPA.
	 * @param $language Current phpPgAdmin language.
	 */
	function __construct($language) {
		// Set the plugin's language
		$plugin_directory = "plugins/". $this->get_name();
		require_once("{$plugin_directory}/lang/recoded/english.php");
		if (file_exists("{$plugin_directory}/lang/recoded/{$language}.php")) {
			include_once("{$plugin_directory}/lang/recoded/{$language}.php");
		}
		$this->lang = $plugin_lang;

		if (file_exists("{$plugin_directory}/conf/config.inc.php")) {
			include_once("{$plugin_directory}/conf/config.inc.php");
			$this->conf = $plugin_conf;
		}
	}

	abstract function get_hooks();

	abstract function get_actions();

	/**
	 * Get the plugin name, that will be used as identification
	 * @return $name
	 */
	function get_name() {
		return $this->name;
	}
}
?>
