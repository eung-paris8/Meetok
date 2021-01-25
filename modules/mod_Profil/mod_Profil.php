<?php

	if (!defined('CONST_INCLUDE')){
    	die('Accès direct interdit');
	}
	include 'profil_cont.php';

	if(!isset($_GET['action'])){
		$action="visite";
	}
	else{
		$action =  htmlspecialchars($_GET['action']);
	}

	if(!isset($_GET['user'])){
		die('Utilisateur non existant');
	}
	else{
		$user = htmlspecialchars($_GET['user']);
	}

	$cont= new ProfilCont($user);
			

	switch ($action) {
		case 'modif':
			$cont->form_modif();
			break;

		case 'report':
			$cont->form_report();
			break;
		
		default:		
			break;
	}
		
?>