<?php
if (!defined('CONST_INCLUDE')){
    die('Accès direct interdit');
}
include_once('./VueGenerique.php');

class VueAdministrateur extends VueGenerique {
    public function __construct(){
        parent::__construct();
        echo '<link rel="stylesheet" type="text/css" href="include/administrateur.css"/>';
    }
    
    public function panneau($arrayMember, $arrayMemberSignale,$countMember,$countMemberS) {
        echo '
        <div class="sectionMembre">
            <div class="row">
                <div class="sectionGauche position-relative col-xxl-10 col-xl-10 col-lg-10 col-md-24 col-sm-24 mx-auto p-5 mb-5">
                    <div class="row">
                        <div class="sectionEspaceMembre col-10 px-0">
                        <form action="index.php?module=Administrateur&action=profil" method="post">
                            <h3 class="text-center pb-2">Membre</h3>
                                <div class="h-100">
                                <select name="selectM" size="'.$countMember.'" class="w-100 h-100">';
        foreach ($arrayMember as $key) {
            echo '<option value="'.$key['id_Utilisateur'].'">'.$key['login'].'</option><br/>';
        }
                                
        echo'                   </select>
                                </div>
                        </div>
                        <div class="boutonProfil col-10 mx-auto">
                            <button name="profil" type="submit" class="btn btn-primary btn-lg position-absolute bottom-0 end-0 mx-5 my-5">Voir profil</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="sectionDroite col-xxl-10 col-xl-10 col-lg-10 col-md-24 col-sm-24 mx-auto p-5 mb-5">
                    <div class="row">
                        <div class="sectionMembreSignale col-10 px-0">
                        <form action="index.php?module=Administrateur&action=signale" method="post">
                            <h3 class="text-center pb-2">Membre signalé</h3>
                            <div class="h-100">    
                                <select id="select" name="membreS" size="'.$countMemberS.'" class="w-100 h-100">';
                                    foreach ($arrayMemberSignale as $key) {
                                            echo '<option value="'.$key['id_Utilisateur'].'">'.$key['login'].'</option><br/>';
                                    }
        echo'                   </select>
                            </div>
                        </div>
                        <div class="sectionMotif col-10 mx-auto px-0">
                            <textarea readonly="readonly" name="motif" id="motif" rows="10">';
                                foreach ($arrayMemberSignale as $key) {
                                    echo $key['description_Signalement'];
                                }
        echo'               </textarea>
                            <input type="submit" class="btn btn-outline-success mx-auto my-4" style="display: block;" name="annule" value="Annuler signal"/>
                            <button type="submit" class="btn btn-outline-danger mx-auto my-4" style="display: block;" name="bannir">Bannir</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        ';
    }
}
?>