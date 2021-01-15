<?php
	include 'profil_cont.php';


	class ModProfil {


		private $cont;

		function __construct(){

			if(!isset($_GET['action'])){
				$action="visite";
			}
			else{
				$action = $_GET['action'];
			}

			$this->cont= new ProfilCont();

			switch ($action) {
				case 'modif':
					$this->cont->form_modif($_POST);
					break;
		
				default:
					
					break;
			}
		}

		public function getCont(){
			return $this->cont;
		}
	}

?>