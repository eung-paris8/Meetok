<?php
if (!defined('CONST_INCLUDE')){
    die('Accès direct interdit');
}

	include_once './include/connexion.php';

	
	class MessagerieModele extends Connexion{
		
		function __construct(){
			self::initConnexion();

			
		}

		function getMatches(){
		$matches= array();
		$sql="select id_Utilisateur, id_Utilisateur_1, matche, passe from utilisateur natural join liste where id_Utilisateur=? and matche = 1;";
		$result=self::$bdd->prepare($sql);
		$result->execute(array($_SESSION['id_Utilisateur']));
		$likes=$result->fetchAll();
		foreach ($likes as $key) {
			$sql="select * from utilisateur natural join liste where id_Utilisateur=? and id_Utilisateur_1=?;";
			$result=self::$bdd->prepare($sql);
			$result->execute(array($key['id_Utilisateur_1'], $_SESSION['id_Utilisateur']));
			
			$testlike=$result->fetch();
			if ($testlike) {
				array_push($matches, $testlike);
			}
		}
		return $matches;

		}

		function getNomPhoto($idClientbis){

			$sql="Select * From utilisateur where id_Utilisateur LIKE :idClientbis ;";
			$result=self::$bdd->prepare($sql);
			$result->bindParam(':idClientbis', $idClientbis);
			$result->execute();
			$nomPhoto=$result->fetch(); 
			return $nomPhoto;
			
		}


		function insererMessage($idExpediteur, $idReceveur, $Send){
			$sql="Insert into messagerie(id_Message, textMessage, id_Receveur, id_Expediteur, tpsmessage) values (default, :send, :idReceveur, :idExpediteur, default);";
			$result=self::$bdd->prepare($sql);
			$result->bindParam(':idReceveur', $idReceveur);
			$result->bindParam(':idExpediteur', $idExpediteur);
			$result->bindParam(':send', $Send);
			$result->execute();

			$sql="Insert into notification(id_Notification,titre_Notification, texte_Notification) values (default, 'message', :send);";
			$result=self::$bdd->prepare($sql);	
			$result->bindParam(':send', $Send);
			$result->execute();

			$sql="Select max(id_Message) from messagerie;";
			$result=self::$bdd->prepare($sql);	
			$result->execute();
			$idMes=$result->fetch();

			$sql="Select max(id_Notification) from notification;";
			$result=self::$bdd->prepare($sql);	
			$result->execute();
			$idNot=$result->fetch();


			$sql="Insert into declenche(id_Message, id_Notification, id_Signalement) values (:id_Message, :id_Notification, 41);";
			$result=self::$bdd->prepare($sql);	
			$result->bindParam(':id_Message', $idMes);
			$result->bindParam(':id_Notification', $idNot);
			$result->execute();


			

			header('Location:index.php?module=Messagerie&action=afficherMessagerie&id_Correspondant='.$idReceveur);

		}

		function getMessageEnvoyer($idClient, $idClientbis){
			$sql="Select * From messagerie where id_Receveur Like :idClientbis and id_Expediteur Like :idClient Order by tpsmessage;";
			$result=self::$bdd->prepare($sql);
			$result->bindParam(':idClient', $idClient);
			$result->bindParam(':idClientbis', $idClientbis);
			$result->execute();
			$mess=$result->fetchAll();
			return $mess; 
			
		}

		function getMessageRecu($idClient, $idClientbis){
			$sql="Select * From messagerie where id_Receveur Like :idClient and id_Expediteur Like :idClientbis Order by tpsmessage;";
			$result=self::$bdd->prepare($sql);
			$result->bindParam(':idClient', $idClient);
			$result->bindParam(':idClientbis', $idClientbis);
			$result->execute();
			$mess=$result->fetchAll();
			return $mess; 
			


		}



	}

			

			
			
	

?>