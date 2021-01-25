<?php 

if (!defined('CONST_INCLUDE')){
    die('Accès direct interdit');
}


	class RencontreVue {

		
		private $info;

		function afficherVue($data,$countList){
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

        <div class="containerRencontre  mx-auto">
            <div class="rencontreBox  mx-auto my-auto">
                <div class="row">
                    <?php 
                    if ($countList > 0) {
                    ?>
                    <div class="photoProfil position-relative mt-5 col-24">
                        <div class="containerImg position-relative mx-auto">
                            <div class="imgProfil">
                                
                                <img class="position-absolute top-0 start-50 translate-middle-x mt-4" src="<?php
                                    if ($data["photo"]==NULL || $data["photo"]=="") {
                                        if ($data["sexe"]=="F") {
                                            echo 'include/img_Profil/imgProfileFemme.png';
                                        }
                                	   else {
                                            echo 'include/img_Profil/imgProfileHomme.png';
                                        }
                                    }
                                    else{
                                	   echo 'include/img_Profil/'.$data["photo"];
                                    }
                                ?>" alt="">
                                
                            </div>
                            
                            <div class="nomPrenomPorfil offset-5 position-absolute top-50">
                                <h2> <?php echo $data['prenom_Utilisateur'].' '.$data['nom_Utilisateur'];
                            ?> </h2>
                            </div>
                            
                            <div class="descriptionProfil position-absolute bottom-0 start-50 translate-middle mb-2 ">
                                <p><?php echo $data['description'];
                            ?></p>
                            </div>
                        </div>
                    </div>
                      <div class="fleches mt-3">
                        <div class="row">
                            <div class="d-flex justify-content-evenly">
                            <div>
                                <a href="index.php?module=Rencontre&action=insertP&personne=<?php echo $data['id_Utilisateur_1']; ?>" 

                             class="btn btn-outline-primary btn-lg">Passe</a>
                            </div>
                                
                                                <button class='btn btn-primary' id="slidebutton">
                        Signaler
                    </button>
                                
                            <div>
                                <a href="index.php?module=Rencontre&action=insertM&personne=<?php echo $data['id_Utilisateur_1']; ?>"

                             class="btn btn-outline-primary btn-lg">Match</a>
                                
                                
                            </div>
                        </div>
                          </div>
                    </div>
                </div>
                <?php
                    }
            else {
                ?>
                <div class="text-center"><?php
                echo '
                Vous n\'avez plus de suggestion par rapport a votre profil';
                ?>
                    </div>
                <?php
            }
                        ?>


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


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>




			<?php
		}
	}

?>

