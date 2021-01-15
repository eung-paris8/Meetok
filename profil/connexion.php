<?php

	class Connexion{

		protected static $bdd;

		public function __construct(){


		}

		public static function initConnexion(){
         	
        	$db_host = "localhost";
        	$user = "root";
        	$password = "";
        	$db_name = "meetok";
       		$dns = 'mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=utf8';
        	self::$bdd = new PDO($dns,  $user,$password);

      	}
	}

?>