<?php

if (!defined('CONST_INCLUDE')){
    	die('Accès direct interdit');
}

require_once('./include/connexion.php');
class NotifModele Extends connexion{
	
	function __construct(){
		self::initConnexion();
	}

	function getNotifs(){
		$sql="SELECT prenom_Utilisateur, textMessage, titre_Notification, id_Expediteur FROM notification natural join declenche natural join messagerie LEFT JOIN utilisateur ON id_Expediteur=id_Utilisateur where id_Receveur= ?;";
		$result=self::$bdd->prepare($sql);
		$result->execute(array($_SESSION['id_Utilisateur']));
		$data=$result->fetchAll();

		return $data;
	}

	function getMatches(){
		$matches= array();
		$sql="select id_Utilisateur, id_Utilisateur_1, matche, passe from utilisateur natural join liste where id_Utilisateur=? and matche = 1;";
		$result=self::$bdd->prepare($sql);
		$result->execute(array($_SESSION['id_Utilisateur']));
		$likes=$result->fetchAll();
		foreach ($likes as $key) {
			$sql="select nom_Utilisateur, prenom_Utilisateur, id_Utilisateur, id_Utilisateur_1, matche, passe from utilisateur natural join liste where id_Utilisateur=? and id_Utilisateur_1=?;";
			$result=self::$bdd->prepare($sql);
			$result->execute(array($key['id_Utilisateur_1'], $_SESSION['id_Utilisateur']));
			
			$testlike=$result->fetch();
			if ($testlike) {
				array_push($matches, $testlike['prenom_Utilisateur']);
			}
		}
		return $matches;

	}
}

?>