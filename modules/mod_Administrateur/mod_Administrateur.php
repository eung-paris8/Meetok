<?php
if (!defined('CONST_INCLUDE')){
    die('Accès direct interdit');
}
include "cont_Administrateur.php";

$controleur = new ContAdministrateur();
$action = !isset($_GET['action'])?"":$_GET['action'];

switch($action) {
    case 'admin':
        $controleur->admin();
        break;
    case 'signale':
        $controleur->signale();
        break;
    case 'profil':
        $controleur->profil();
        break;
}
?>