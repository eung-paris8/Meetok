<?php
	if (!defined('CONST_INCLUDE')){
    	die('Accès direct interdit');
	}


	require_once('./include/connexion.php');

	class ProfilModele extends Connexion{

		private $idUser;
		
		function __construct($user){
			$this->idUser = $user;
			self::initConnexion();
			//$this->idUser = 3;

		}

		/*function verif_profil($user){
			$this->idUser = $user;
		}*/

		/*function verifAcces(){
			$sql="Select * from liste where id_Utilisateur = ? and id_Utilisateur_1=?;";
			$result=self::$bdd->prepare($sql);
			$result->execute(array($this->idUser,));
			$data=$result->fetch();

		}*/

		function getInfo(){
			//$sql="SELECT * From utilisateur where id_Utilisateur=(?)";
			$sql="SELECT id_Utilisateur ,nom_Utilisateur ,prenom_Utilisateur, age ,localisation ,sexe ,nom_Centres_d_Interets, description, photo FROM utilisateur NATURAL JOIN aime NATURAL JOIN centres_d_interets WHERE id_Utilisateur=(?);";
			$result=self::$bdd->prepare($sql);
			$result->execute(array($this->idUser));
			$data=$result->fetch();
			if($data['id_Utilisateur']==null){
				die('Utilisateur inexistant');
			}
			//$data=$result->fetchAll();
			return $data;
		}

		function getCentresInteret(){
			$sql="SELECT nom_Centres_d_Interets FROM utilisateur NATURAL JOIN aime NATURAL JOIN centres_d_interets WHERE id_Utilisateur=(?);";
			$result=self::$bdd->prepare($sql);
			$result->execute(array($this->idUser));
			$data=$result->fetchAll();
			return $data;

		}

		function modif(){

			

			if ($_POST['localisation']!="" && $_POST['description']!="") {
				$sql="UPDATE utilisateur SET localisation = (?), description = (?) where id_Utilisateur=(?)";
				$result=self::$bdd->prepare($sql);
				$result->execute(array(htmlspecialchars($_POST['localisation']), htmlspecialchars($_POST['description']), $this->idUser));
			}

			elseif ($_POST['localisation']=="") {
				$sql="UPDATE utilisateur SET description = (?) where id_Utilisateur=(?)";
				$result=self::$bdd->prepare($sql);
				$result->execute(array(htmlspecialchars($_POST['description']), $this->idUser));
			}

			elseif ($_POST['description']=="") {
				$sql="UPDATE utilisateur SET localisation = (?) where id_Utilisateur=(?)";
				$result=self::$bdd->prepare($sql);
				$result->execute(array(htmlspecialchars($_POST['localisation']), $this->idUser));
			}

			else /*($_POST['localisation']=="" && $_POST['description']=="")*/ {
				# code...
			}
			
		}

		function report(){

			$sql="INSERT into signalement values(null, (?), (?), (?), (?))";
			$result=self::$bdd->prepare($sql);
			$result->execute(array($_SESSION['id_Utilisateur'], $this->idUser, htmlspecialchars($_POST['titre']), htmlspecialchars($_POST['message'])));
			$sql="INSERT into creer_signalement values((?), null)";
			$result=self::$bdd->prepare($sql);
			$result->execute(array($this->idUser));

		}
	}

?>