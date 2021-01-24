<?php 
    if (!defined('CONST_INCLUDE')){
        die('Accès direct interdit');
    }


	class ProfilVue{

		private $info;
        private $ci;
			
		function __construct(){
			
		}
		

		function recoitInfo($data){
			$this->info=$data;
		}

        function recoitCentresInteret($data){
            $this->ci=$data;
        }

		function afficherVue(){
			?>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

				<script type="text/javascript">
			
					function deconnexion() {
						if (window.confirm('Voulez-vous vous déconnecter?')) {
  							window.location.href="index.php?module=Connexion&action=deconnexion";

						} 
					}
					
					$(document).ready(function(){

						$(".slideform").hide();

						$("#slidebutton").click(function(){
    						$(".slideform").slideDown();
  						});
  						$("#cancel").click(function(){
    						$(".slideform").slideUp();
 						});
 						
					});
					
				</script>


<!-- Section principale -->
        <div class="containerProfil mx-5">
            <div class="profilBox mx-5 py-5">
                <div class="row gx-0">
                    <div class="sectionInformationsPerso">
                        <div class="row gx-0">
                            <div class="imgProfil col-xxl-5 col-xl-6 col-lg-8 me-auto">
                                <img class="mx-auto my-auto d-block" alt="photo de profil" src=<?php
                                if ($this->info["photo"]==NULL || $this->info["photo"]=="") {
                                    if ($this->info["sexe"]=="F") {
                                        echo 'include/img_Profil/imgProfileFemme.png';
                                    }
                                	else {
                                        echo 'include/img_Profil/imgProfileHomme.png';
                                    }
                                }
                                else{
                                	echo 'include/img_Profil/'.$this->info["photo"];
                                }
                                ?> >
                            </div>
                            <div class="infoPerso col-xxl-18 col-xl-17 col-lg-15 ms-auto my-auto">
                                <p class="nom"> Nom: <?php
                                    echo $this->info['nom_Utilisateur'];	
								?> </p>
                                <p class="prenom"> Prénom: <?php							
									echo $this->info['prenom_Utilisateur'];		
								?> </p>
                                <p class="age"> Age: <?php							
									echo $this->info['age'];		
								?> </p>
                                <p class="localisation"> Localisation: <?php							
									echo $this->info['localisation'];		
								?> </p>
                                <p class="sexe"> Sexe: <?php							
									echo $this->info['sexe'];		
								?> </p>
                            </div>
                        </div>

                    </div>
                    <div class="sectionDescription mt-2">
                        <p class="titre">Description:</p>
                        <div class="containerDesc">
                            <p>
                                <?php							
									echo $this->info['description'];		
								?> 
                            </p>
                        </div>
                    </div>
                    <div class="sectionCentreInteret mt-2">
                        <p class="titre">Centres d'intérêt:</p>
                            <div class="CI">
                                <div class="row row-cols-xxl-6 row-cols-xl-6 row-cols-lg-6 row-cols-md-3 row-cols-sm-2">
                                    <div class="CI_1">
                                        <p><?php
                                        foreach ($this->ci as $ci) {
                                            echo $ci['nom_Centres_d_Interets'].'<br>'; 
                                        }
                                         
                                         ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <?php  

                        if (isset($_SESSION['id_Utilisateur']) && $_SESSION['id_Utilisateur']==$this->info['id_Utilisateur']) {
                            
                    ?>

                    <button class='btn btn-primary' id="slidebutton">
						Modifier
					</button>

					<div class="slideform">
						<form method='POST' action="index.php?module=Profil&user=<?php echo($this->info['id_Utilisateur']) ?>&action=modif">
                            <div class="form-group">
                                <label>Localisation</label>
                                <input type='text' class="form-control" name='localisation'>
                            </div>
							
							<div class="form-group">
                                <label>Description</label>
                                <input type='text' class="form-control" name='description' >                       
                            </div>

                            


							<input class='btn btn-primary' type='submit' name='envoi' value='Envoyer'>

						</form>

                        <br>

                        <button class='btn btn-primary' id="cancel">
                            Annuler
                        </button>

                    </div>

                    <?php 

                        }

                        else{
                            if (isset($_SESSION['id_Administrateur'])){ ?>
                                <button type="submit" class="btn btn-primary" style="display: block;" name="bannir">Bannir</button>
                <?php
                            }
                            else {
                    ?>

                    <button class='btn btn-primary' id="slidebutton">
                        Signaler
                    </button>

                    <div class="slideform">

                        <form method="POST" action="index.php?module=Profil&user=<?php echo($this->info['id_Utilisateur']) ?>&action=report">

                            <div class="form-group">
                                <label>Raison</label>
                                <input type='text' class="form-control" name='titre' required>
                            </div>
                            <div class="form-group">
                                <label>Message (facultatif)</label>
                                <input type='text' class="form-control" name='message'>
                            </div>

                            <input class='btn btn-primary' type='submit' name='envoi' value='Envoyer'> 
                               

                        </form>

                        <br>

                        <button class='btn btn-primary' id="cancel">
                            Annuler
                        </button>

                    </div>   

                        <?php
                            }
                        }

                        ?>


						
					

                </div>
            </div>

			<?php
		}
		
	}

?>

