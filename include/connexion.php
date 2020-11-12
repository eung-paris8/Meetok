<?php

class Connexion {

	protected static $bdd;

	public function __construct () {
		
	}

	public static function initConnexion() {
        $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
		$dns = "mysql:host=localhost;dbname=meetok";
		$login = "root";
		$mdp = "root";
		try {
			self::$bdd = new PDO($dns,$login,$mdp,$option);
		} catch(PDOException $pdoe){
			echo 'Erreur de Connexion a la BD';
		}
	}
}

?>