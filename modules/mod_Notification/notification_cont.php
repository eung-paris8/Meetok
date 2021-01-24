<?php

if (!defined('CONST_INCLUDE')){
    	die('Accès direct interdit');
}

include_once 'notification_modele.php';
include_once 'notification_vue.php';

class NotifCont{
	private $modele;
	private $vue;
	
	function __construct(){
		$this->modele= new NotifModele();
		$this->vue = new NotifVue();
		$this->transfert();
		$this->vue->afficherVue();
	}

	function transfert(){
		$data=$this->modele->getNotifs();
		$this->vue->recoitNotifs($data);
		$data=$this->modele->getMatches();
		$this->vue->recoitMatches($data);

	}
}

?>