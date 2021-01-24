<?php
if (!defined('CONST_INCLUDE')){
    die('Accès direct interdit');
}
include "cont_Acceuil.php";

$controleur = new ContAcceuil();
$action = !isset($_GET['action'])?"":$_GET['action'];

switch($action) {
    case 'acceuil':
        $controleur->acceuil();
        break;
}
?>