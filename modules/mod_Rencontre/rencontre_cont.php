<?php
if (!defined('CONST_INCLUDE')){
    die('Accès direct interdit');
}
	include 'rencontre_vue.php';
	include 'rencontre_modele.php';
	class RencontreCont {

		private $modele;
		private $vue;

		
		function __construct(){
			$this->modele = new RencontreModele();
			$this->vue = new RencontreVue();
			$this->vue->afficherVue($this->modele->getNomPrenomPhoto());
			
		}

		function getModele(){
			return $this->modele;
		}

		function insererMatch($personne){	

			$this->modele->insererMatch($personne);
					
		}
		
		function insererPasse($personne){	

			$this->modele->insererPasse($personne);
					
		}	

		function form_report($personne, $titre, $message){
			$this->modele->form_report($personne, $titre, $message);
			


		}

		

		}

?>