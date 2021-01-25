<?php
if (!defined('CONST_INCLUDE')){
    die('Accès direct interdit');
}
include "cont_Connexion.php";

$controleur = new ContConnexion();
$action = !isset($_GET['action'])?"":$_GET['action'];

switch($action) {
    case 'formulaire':
        $controleur->formulaire();
        break;
    case 'connexion':
        $controleur->connexion();
        break;
    case 'deconnexion':
        $controleur->deconnexion();
        break;
    case 'form_Inscription':
        $controleur->formulaire_Inscription();
        break;
    case 'inscription':
        $controleur->inscription();
        break;
    
}
?>