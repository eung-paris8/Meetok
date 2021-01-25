<?php
	if (!defined('CONST_INCLUDE')){
    	die('Accès direct interdit');
	}
	include 'profil_vue.php';
	include 'profil_modele.php';
	class ProfilCont {

		private $modele;
		private $vue;
		
		function __construct($user){
			$this->modele = new ProfilModele($user);
			$this->vue = new ProfilVue();
			$this->transfert();
			$this->vue->afficherVue();

		}

		function getModele(){
			return $this->modele;
		}

		/*public function verif_profil($user){
			$this->modele->verif_profil($user);
		}*/

		function form_report(){
			$this->modele->report();
		}

		function getVue(){
			return $this->vue;
		}

		function form_modif(){
			$this->modele->modif();
		}

		function transfert(){
			$data=$this->modele->getInfo();
			$ci = $this->modele->getCentresInteret();
			$this->vue->recoitInfo($data);
			$this->vue->recoitCentresInteret($ci);
		}
	}

?>