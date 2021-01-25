<?php
if (!defined('CONST_INCLUDE')){
    die('Accès direct interdit');
}
include 'messagerie_cont.php';	
	

		$cont;
		$modele;
		
			$cont= new MessagerieCont();

			if (isset($_GET['action'])) {
          
				switch ($_GET['action']) {


						case 'menu':

							$cont->afficherMatch();

							break;
						case 'envoyermessage':
						
						$Send = htmlspecialchars($_POST['send']); 
						if (isset($_GET['idReceveur']) && isset($_GET['idExpediteur'])) {
								$idReceveur=$_GET['idReceveur'];
								$idExpediteur=$_GET['idExpediteur'];

								$cont->insererMessage($idExpediteur, $idReceveur, $Send);
								
								echo "string";
							}
						break;
						case 'afficherMessagerie':
						if (isset($_GET['id_Correspondant'])){
						$id_Correspondant=$_GET['id_Correspondant'];
						$id_Utilisateur=$_SESSION['id_Utilisateur'];
						$cont->afficherVue($id_Utilisateur, $id_Correspondant);
					}
						break;


					}
			}
 ?> 
