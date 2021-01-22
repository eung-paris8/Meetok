<?php 

if (!defined('CONST_INCLUDE')){
    die('Accès direct interdit');
}


	class RencontreVue {

		
		private $info;

		
		//function recoitNomPrenomPhoto($data){
		//	$this->info=$data;
		//	echo "reçu";

		//}

		function afficherVue($data){
			?>



<!DOCTYPE html>
<html lang="fr">
<head> <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"> </script>

            <script type="text/javascript">

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
            </head>
<body>

<!-- Haut de Page -->

<!-- Section principale -->

<div class="container_fluid sectionPrincipale">
    <div class="container-xxl">
        <div class="containerRencontre  mx-auto">
            <div class="rencontreBox  mx-auto my-auto">
                <div class="row">
                    <div class="photoProfil position-relative mt-5 col-24">
                        <div class="containerImg position-relative mx-auto">
                            <div class="imgProfil">
                                <img class="position-absolute top-0 start-50 translate-middle-x mt-4" src="./include/image/logo.png" alt="">
                            </div>
                            <div class="descriptionProfil position-absolute bottom-0 start-50 translate-middle mb-2 ">
                                <p><?php echo $data['description'];
                            ?></p>
                            </div>
                            <div class="nomPrenomPorfil position-absolute bottom-0 start-50 translate-middle-x ">
                                <h2> <?php echo $data['prenom_Utilisateur'];
                            ?> </h2>
                                <h2> <?php echo $data['nom_Utilisateur'];
                            ?></h2>
                            </div>
                        </div>
                    </div>
                      <div class="fleches mt-3">
                        <div class="row">
                            <div class="flechePasse col-12">
                                <a href="index.php?module=Rencontre&action=insertP&personne=<?php echo $data['id_Utilisateur_1']; ?>" 

                             class="btn btn-outline-primary btn-lg">Passe</a>
                                

                            </div>
                            <div class="flecheMatch col-12">
                                <a href="index.php?module=Rencontre&action=insertM&personne=<?php echo $data['id_Utilisateur_1']; ?>"

                             class="btn btn-outline-primary btn-lg">Match</a>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
                <button class='btn btn-primary' id="slidebutton">
                        Signaler
                    </button>

                    <div class="slideform">

                        <form method="POST" action="index.php?module=Rencontre&action=report&personne=<?php echo $data['id_Utilisateur_1'] ?>">

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
                              
                            </div>
        </div>
    </div>
</div>

<!-- Footer -->


<!-- JavaScript Bootstrap -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>



					


			</body>
			</html>

			<?php
		}
	}

?>

