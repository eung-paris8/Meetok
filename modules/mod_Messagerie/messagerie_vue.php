<?php 

if (!defined('CONST_INCLUDE')){
    die('Accès direct interdit');
}


	class MessagerieVue {

		
		
		

        function afficherMatch($info){
         ?>
<div class="containerProfil mx-auto">
				            <div class="profilBox mx-auto">
               
               <?php   
                    $i=0;
                 foreach($info as $key => $value){ 
                    ?>
                               
                              <a href="index.php?module=Messagerie&action=afficherMessagerie&id_Correspondant=<?php echo $info[$i]['id_Utilisateur']; ?> ">
                           <?php   echo $info[$i]['prenom_Utilisateur']; ?> </a>
                       <br/>
    </div>
               <?php
                    $i++;
                }  


     
        } 
		
       
		function afficherVue($data, $messageEnvoyer, $messageRecu){

		?>


<!-- Haut de Page -->


<!-- Section principale -->

<div class="container_fluid sectionPrincipale">
    <div class="container-xxl">
        <div class="containerMessagerie mx-auto">
            <div class="messagerieBox mx-auto">
                <h2 class="text-center"> <?php echo $data['prenom_Utilisateur'];
                            ?></h2>
                <div class="messagerie">
                        <?php 
                        $i=0;
                        foreach($messageEnvoyer as $key => $value){ ?>
                        
                    <div class="messageRecu">
                        <div class="profilMsgRecu">
                            <img src="/include/image/default.png" class="image-fluid" alt="">
                        </div>
                        <div class="message-chat">
                            <p  class="mb-0 mx-3"> <?php echo $messageEnvoyer[$i]['textMessage']; ?></p>
                            
                        </div>
                        </div> 
                        <br>
                        <?php 
                        $i++; 
                    }
                        ?>
                    
                    <br>
                   
                        <?php 
                        $j=0;
                        foreach($messageRecu as $key => $value){ ?>
                             <div class="messageEnvoye">
                       
                        <div class="message-chat">
                            <p  class="mb-0 mx-3"> <?php echo $messageRecu[$j]['textMessage']; ?></p>
                            
                        </div> <br>
                         <div class="profilMsgEnvoye">
                            <img src="img/imgProfileHomme.png" class="image-fluid" alt="">
                        </div>
                    </div>
                   
                    
                        <?php 
                        $j++; 
                    }
                        ?>
                     </div>
                       
                </div>
                        <form method="post" action="index.php?module=Messagerie&action=envoyermessage&idExpediteur=<?php echo $_SESSION['id_Utilisateur']?>&idReceveur=<?php echo $data['id_Utilisateur']?>" class="mx-5">
                            <div class="envoiMsg">
                                <input type="text" name="send" id="idClient" class="w-75" required>
                                <input type="submit" class="btn-message" value='Envoyer'>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

<!-- Footer -->



<!-- JavaScript Bootstrap -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


			<?php
		}
	}

?>