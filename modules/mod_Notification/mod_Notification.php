<?php
if (!isset($_SESSION['id_Utilisateur'])) {
	die('Connectez vous');
}

if (!defined('CONST_INCLUDE')){
    	die('Accès direct interdit');
}

include_once 'notification_cont.php';

$cont = new NotifCont();


?>