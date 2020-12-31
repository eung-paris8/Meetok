<?php
if (!defined('CONST_INCLUDE')){
    die('Accès direct interdit');
}
include_once('./VueGenerique.php');

class VueConnexion extends VueGenerique {
    public function __construct(){
        parent::__construct();
        echo '<link rel="stylesheet" href="module/mod_Connexion/connexion.css">';
    }
    
    public function formulaire() {
        echo '
        <center class="py-5">
            <form action="index.php?module=Connexion&action=connexion" method="post" class="bg-secondary rounded w-50 py-5">
                <div>
                    <h1>Connexion</h1>
                    <label>Login :</label></br>
                    <input type="text" name="login" required></br>
                    <label>Mot de passe :</label></br>
                    <input type="password" name="mdp" required></br>
                </div>
                <input class="button-center" type="submit" value="Connexion">
            </form>
        </center>
        ';
    }
    
    public function form_Inscription($arrayInteret){
        echo '
        <center class="py-5">
            <form action="index.php?module=Connexion&action=inscription" method="post" class="bg-secondary rounded w-50 py-5">
                <div>
                    <h1>Inscription</h1>
                    <label>Nom :</label></br>
                    <input type="text" name="nom" required></br>
                    
                    <label>Prénom :</label></br>
                    <input type="text" name="prenom" required></br>
                    
                    <label>Mot de passe :</label></br>
                    <input type="password" name="mdp1" required></br>
                    
                    <label>Confirmer mot de passe :</label></br>
                    <input type="password" name="mdp2" required></br>
                    
                    <label>Photo de profil : (Format png)</label></br>
                    <input type="file" id="avatar" name="avatar" accept="image/png"></br>
                    
                    <label>Age :</label></br>
                    <input type="number" name="age" required></br>
                    
                    <label>Localisation :</label></br>
                    <input type="text" name="localisation" required></br>
                    
                    <label>Sexe :</label></br>
                    <input type="radio" name="sexe" value="H"/><label for="Homme">Homme</label>
                    <input type="radio" name="sexe" value="F"/><label for="Femme">Femme</label></br>
                    
                    <label>Desciption :</label></br>
                    <textarea name="description" required></textarea></br>
                    
                    <label>Centres d\'interets : </label></br>';
        foreach ($arrayInteret as $key) {
            echo '<input type="radio" name="interet" value="'.$key['nom_Centres_d_Interets'].'"/><label for="'.$key['nom_Centres_d_Interets'].'">'.$key['nom_Centres_d_Interets'].'</label>';
        }
        echo'
                </div>
                <input class="button-center" type="submit" value="Connexion">
            </form>
        </center>
        ';
    }
}
?>