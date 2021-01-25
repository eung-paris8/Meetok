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
		}
        
        function getCountList(){
            $sql="Select count(*) as total From liste where matche = 0 AND passe = 0 And id_Utilisateur=?;";
            $req=self::$bdd->prepare($sql);
			$req->execute(array($_SESSION['id_Utilisateur']));
            $res = $req->fetch();
            $count = intval($res['total']);
            return $count;
            
        }
			

		}

			

			
			
	

?>