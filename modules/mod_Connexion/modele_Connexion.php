<?php
if (!defined('CONST_INCLUDE')){
    die('Accès direct interdit');
}
require_once('./include/connexion.php');

class ModeleConnexion extends Connexion {
    public function __construct() {
        parent::initConnexion();
    }
    
    public function connexion(){
        $mdp = hash('sha512', $_POST['mdp']);
        if (!isset($_POST['login']) || !isset($_POST['mdp'])) {
            die("il manque le mot de passe ou le login");
        }
        else{
            $bd = self::$bdd->prepare('SELECT * FROM Utilisateur where login like ? and mot_de_passe like ?');
            $bd->execute(array($_POST['login'], $mdp));
            $response = $bd->fetch();
            if ($response) {
                $_SESSION['id_Utilisateur'] = $response['id_Utilisateur'];
                $_SESSION['login'] = $response['login'];
                header('Location:index.php');
            }
            else {
                die("login ou mot de passe incorect");
            }
        }
    }
    
    public function deconnexion(){
        session_unset();
        header('Location:index.php');
    }
    
    public function inscription(){
        
    }
    
    public function getInteret(){
        $req = self::$bdd->prepare('SELECT * FROM centres_d_interets');
        $req->execute();
        return $req->fetchAll();
    }
}
?>