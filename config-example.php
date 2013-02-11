<?php
/* Mandatory: config.php MUST implement Config::fix_database($username=null)
 * where $username is set from command line (but it is optional)
 *
 * You can make username on command line mandatory, just throw an
 * exception in fix_database with a relevant message.
 *
 * Config::fix_database() MUST return an object compatible with MySQLi
 * (you may want to subclass MySQLi if you need something special).
 *
 * If you want PHP migrations to work, you need to include all relevant
 * environment here.
 *
 */

// require "/path/to/relevant/includes.php";

class Config {
	private static $db_host = "127.0.0.1";
	private static $db_name = "mushrooms_and_tomatoes";
	private static $db_user = "mushroom_eater";
	private static $db_password = "mushrooms_are_tasty";
	// Note: you don't need to save the password here!
	// If you run update_database.php with the username as the
	// first argument, it will ask for the password interactively.

	public static function fix_database($username=null) {
		if(is_null($username)) {
			$username = self::$db_user;
			$password = self::$db_password;
		} else {
			$password = ask_for_password();
		}
		$db = new MySQLi(self::$db_host, $username, $password, self::$db_name);
		return $db;
	}

	/**
	 * Return an array of RE patterns of files to ignore.
	 */
	public static function ignored(){
		return array();
	}
}
