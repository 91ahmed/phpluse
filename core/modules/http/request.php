<?php
	
	namespace Core\Modules\Http;

	class Request 
	{
		public static function method () 
		{
			return $_SERVER['REQUEST_METHOD'];
		}

		public static function isMethod (String $requestMethod)
		{
			$currentMethod = $_SERVER['REQUEST_METHOD'];

			if ($currentMethod === strtoupper($requestMethod)) 
			{
				return true;
			} else {
				return false;
			}
		}

		public static function has (String $requestName) 
		{
			if (isset($_REQUEST[$requestName])) {
				return true;
			} else {
				return false;
			}
		}

		public static function data (String $requestName) 
		{
			return trim($_REQUEST[$requestName]);
		}

		public static function get (String $requestName) 
		{
			return trim($_GET[$requestName]);
		}

		public static function post (String $requestName) 
		{
			return trim($_POST[$requestName]);
		}
	}
?>