<?php
if (!defined('CONST_INCLUDE')){
    die('Accès direct interdit');
}
	include 'rencontre_cont.php';
	

		$cont;
		
			$cont= new RencontreCont();


			
			if (isset($_GET['action'])) {
          
				switch ($_GET['action']) {
						case 'insertP':
						if (isset($_GET['personne'])) {
								$idPersonne=$_GET['personne'];
								$cont->insererPasse($idPersonne);
							}
						case 'insertM':
						
							if (isset($_GET['personne'])) {
								$idPersonne=$_GET['personne'];
								$cont->insererMatch($idPersonne);
							}
     					break;

     					case 'report':
							$titre = htmlspecialchars($_POST['titre']); 
							$message = htmlspecialchars($_POST['message']);

								if (isset($_GET['personne'])) {
								$idPersonne=$_GET['personne'];
												
								
				          					  $cont->form_report($idPersonne, $titre, $message);
				          					  
				          					  $cont->insererPasse($idPersonne);

				          		}
				          					  break;
								

					}

			
		}
?>