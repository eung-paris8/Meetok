<?php 

	class ProfilVue{

		private $info;
			
		function __construct(){
			
		}
		

		function recoitNom($data){
			$this->info=$data;
		}

		function afficherVue(){
			?>

			<!DOCTYPE html>
			<html>
			<head>
				<title>Profil</title>

				<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
				<link rel="stylesheet" type="text/css" href="style.css">

				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

				<script type="text/javascript">
			
					function deco() {
						if (window.confirm('Voulez-vous vous déconnecter?')) {
  							window.location.href="accueil.php";
						} 
					}
					
					$(document).ready(function(){

						$(".formmodif").hide();

						$("#modif").click(function(){
    						$(".formmodif").slideDown();
  						});
  						$("#cancel").click(function(){
    						$(".formmodif").slideUp();
 						});
 						
					});
					
				</script>
			</head>
			<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="accueil.html">
                <img src="logo.png" class="img-fluid" alt="Logo du Site">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="boutonConnexion ms-auto mt-auto ">
                    <a class="text-center" href="connexion.html">Connexion/Inscription</a>
                </div>
            </div>
        </div>
    </nav>
</header>

<!-- Section principale -->

<div class="container_fluid sectionPrincipale">
    <div class="container-xxl">
        <div class="containerProfil mx-auto">
            <div class="profilBox mx-auto">
                <div class="row gx-0">
                    <div class="sectionInformationsPerso">
                        <div class="row gx-0">
                            <div class="imgProfil col-xxl-5 col-xl-6 col-lg-8 me-auto">
                                <img class="mx-auto my-auto d-block" alt="photo de profil" src=<?php
                                if ($this->info["photo"]==NULL || $this->info["photo"]=="") {
                                	echo "https://journalmetro.com/wp-content/uploads/2017/04/default_profile_400x400.png?w=860";
                                }
                                else{
                                	echo($this->info["photo"]);
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
                                        <p><?php echo $this->info['nom_Centres_d_Interets']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button class='btn btn-primary' id="modif">
						Modifier
					</button>

					<div class="formmodif">
						<form method='POST' action='profil.php?action=modif'>
                            <div class="form-group">
                                <label>Localisation</label>
                                <input type='text' class="form-control" name='localisation' value=<?php echo($this->info["localisation"])?> >
                            </div>
							
							<div class="form-group">
                                <label>Description</label>
                                <input type='text' class="form-control" name='description' value=<?php echo($this->info["description"])?> >                       
                            </div>
							

							<input class='btn btn-primary' type='submit' name='envoi' value='Envoyer'>

						</form>

						<button class='btn btn-primary' id="cancel">
							Annuler
						</button>
					</div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->

<footer>
    <p>Meetok © Copyright 2020, Tous droits réservés</p>
</footer>

<!-- JavaScript Bootstrap -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

	</body>
</html>

			<?php
		}
		
	}

?>

