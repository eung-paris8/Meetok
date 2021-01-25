<?php
if (!defined('CONST_INCLUDE')){
    die('Accès direct interdit');
}
	include 'messagerie_vue.php';
	include 'messagerie_modele.php';

	class MessagerieCont {

		private $modele;
		private $vue;
		private $infomess;


		function __construct(){
			$this->modele = new MessagerieModele();
			$this->vue = new MessagerieVue();
			
		}

		function afficherMatch(){
			$data=$this->modele->getMatches();
			$this->vue->afficherMatch($data);
		}

		function afficherVue($idClient, $idClientbis){
			$data=$this->modele->getNomPhoto($idClientbis);
			$messageEnvoyer=$this->modele->getMessageEnvoyer($idClient, $idClientbis);
			$messageRecu=$this->modele->getMessageRecu($idClient, $idClientbis);
			$this->vue->afficherVue($data, $messageEnvoyer, $messageRecu);

		}

		function getModele(){
			return $this->modele;
		}

		function insererMessage($idExpediteur, $idReceveur, $Send){
			$this->modele->insererMessage($idExpediteur, $idReceveur, $Send);
		}

	}
?>