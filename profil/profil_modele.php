<?php

	include_once 'connexion.php';

	class ProfilModele extends Connexion{

		private $idUser;
		
		function __construct(){
			self::initConnexion();
			$this->idUser = 2;

		}

		function getNom(){

			
			
			//$sql="SELECT * From utilisateur where id_Utilisateur=(?)";
			$sql="SELECT nom_Utilisateur ,prenom_Utilisateur, age ,localisation ,sexe ,nom_Centres_d_Interets, description, photo FROM utilisateur NATURAL JOIN aime NATURAL JOIN centres_d_interets WHERE id_Utilisateur=(?);";
			$result=self::$bdd->prepare($sql);
			$result->execute(array($this->idUser));
			$data=$result->fetch();
			//$data=$result->fetchAll();
			return $data;
		}

		function modif($data){
			$sql="UPDATE utilisateur SET localisation = (?), description = (?) where id_Utilisateur=(?)";
			$result=self::$bdd->prepare($sql);
			$result->execute(array($data['localisation'], $data['description'], $this->idUser));
		}
	}

?>