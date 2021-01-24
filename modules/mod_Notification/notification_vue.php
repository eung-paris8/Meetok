<?php

if (!defined('CONST_INCLUDE')){
    	die('Accès direct interdit');
}

class NotifVue{

	private $mes;
	private $matches;
	
	function __construct(){
		# code...
	}

	function recoitNotifs($data){
		$this->mes=$data;
	}
	function recoitMatches($data){
		$this->matches=$data;

	}

	function afficherVue(){
		?>
		<!DOCTYPE html>
		<html>
			<head>
				<title>Notifications</title>
			</head>
			<body>

				<div class="container_fluid sectionPrincipale">
				    <div class="container-xxl">
				        <div class="containerProfil mx-auto">
				            <div class="profilBox mx-auto">
				                <div class="row gx-0">

				                	<h1>Messages</h1>



				                	<?php
				                	

				                		if($this->mes==NULL){
				                			echo "Vous n'avez pas de nouveau message pour l'instant, essayez d'être plus actif.";
				                		}
				                		else{
				                			foreach ($this->mes as $key) {
				                				
				                				?> <div>
				                					<p> Nouveau message de <?php echo $key['prenom_Utilisateur']; ?></p>
				                						
				                					</div>
				                				<?php
				                				
				                			}
				                		}
				                	?>

				                	<h1>Matches</h1>

				                	<?php				                	

				                		if($this->matches==NULL){
				                			echo "Vous n'avez pas de nouveau matche pour l'instant, likez plus de profils pour augmenter vos chances.";
				                		}
				                		else{
				                			foreach ($this->matches as $key) {
				                				
				                				?> <div>
				                					<p> Nouveau match: <?php echo $key; ?> </p>
				                						
				                					</div>
				                				<?php
				                				
				                			}
				                		}
				                	?>

				                </div>
				            </div>
				        </div>
				    </div>
				</div>

			</body>
		</html>


		<?php
	}
}

?>