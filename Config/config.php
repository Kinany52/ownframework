<?php

if (!function_exists("config")) {
	function config(): void 
	{
		$timezone = date_default_timezone_set("Europe/Berlin");

		define('DB_HOST', 'localhost');
		define('DB_NAME', 'mvc');
		define('DB_USER', 'root');
		define('DB_PASS', '');
		define('DB_CHAR', 'utf8');
	}
}

if (!function_exists("bootstrap")) {
	function bootstrap(): void 
	{
		session_start();
		ob_start();
	}
}