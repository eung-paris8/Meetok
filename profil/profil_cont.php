<?php
	include 'profil_vue.php';
	include 'profil_modele.php';
	class ProfilCont {

		private $modele;
		private $vue;
		
		function __construct(){
			$this->modele = new ProfilModele();
			$this->vue = new ProfilVue();
			$this->transfert();
			$this->vue->afficherVue();
		}

		function getModele(){
			return $this->modele;
		}

		function getVue(){
			return $this->vue;
		}

		function form_modif($data){
			$this->modele->modif($data);
		}

		function transfert(){
			$data=$this->modele->getNom();
			$this->vue->recoitNom($data);	
		}
	}

?>