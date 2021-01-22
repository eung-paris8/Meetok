<?php
if (!defined('CONST_INCLUDE')){
    die('Accès direct interdit');
}

	include_once './include/connexion.php';

	
	class RencontreModele extends Connexion{
		
		function __construct(){
			self::initConnexion();

			
		}

		function getNomPrenomPhoto(){

			$sql="Select * From utilisateur inner join liste on liste.id_Utilisateur_1=utilisateur.id_Utilisateur where matche = 0 And  passe = 0 And liste.id_Utilisateur=?;";
			$result=self::$bdd->prepare($sql);
			$result->execute(array($_SESSION['id_Utilisateur']));
			$nomPrenomPhoto=$result->fetch(); 
			return $nomPrenomPhoto;
			

		}

		function insererMatch($personne){

			$sql="Update liste Set matche = 1 and passe = 0 where id_Utilisateur LIKE :utilisateur  AND id_Utilisateur_1 LIKE :personne;";
			$result=self::$bdd->prepare($sql);
			$result -> bindParam(':personne', $personne);
			$result -> bindParam(':utilisateur', $_SESSION['id_Utilisateur']);
			$result->execute();
			header('Location:index.php?module=Rencontre');
		}

		function insererPasse($personne){

			$sql="Update liste Set passe = 1 and matche = 0 where id_Utilisateur LIKE :utilisateur  AND id_Utilisateur_1 LIKE :personne;";
			$result=self::$bdd->prepare($sql);
			$result -> bindParam(':personne', $personne);
			$result -> bindParam(':utilisateur', $_SESSION['id_Utilisateur']);
			$result->execute();
			header('Location:index.php?module=Rencontre');
		}



		function form_report($personne, $titre, $message){
			$sql="Insert into signalement(id_Signalement, id_Signaleur, id_Signale, titre_Signalement, description_Signalement) values (default, :utilisateur, :personne, :titre, :message );";
			$result=self::$bdd->prepare($sql);
			$result -> bindParam(':personne', $personne);
			$result -> bindParam(':utilisateur', $_SESSION['id_Utilisateur']);
			$result -> bindParam(':titre', $titre);
			$result -> bindParam(':message', $message);
			$result->execute();

			
		//	header('Location:index.php?module=Rencontre');
		}


	//	function form_report1($personne){
	//		$sql="Select id_Signalement From signalement where id_Signalement = max(id_Signalement);";
	//		$result=self::$bdd->prepare($sql);
	//		$result->execute();
	//		$res=$result->fetch();
	//		return $res[0];

	//	}	

	//	function form_report2($personne, $rsul){

	//		$sql2="Insert into creer_signalement(id_Utilisateur, id_Signalement) values (:personne, :rsul)";
	//		$result=self::$bdd->prepare($sql2);
	//		$result -> bindParam(':personne', $personne);
	//		$result -> bindParam(':rsul', $rsul);
	//		$result->execute();


	//	}
			

		}

			

			
			
	

?>