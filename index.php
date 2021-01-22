<<<<<<< Updated upstream
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<title>Meetok</title>
        <link rel="icon" type="image/png" href="include/image/logo.png"/>
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"/>
        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
	</head>
    
    <body>
        <header>
            <nav></nav>
        </header>
        
        <footer>
        </footer>
    </body>
</html>
=======

<?php session_start();
require_once('VueGenerique.php');
define('CONST_INCLUDE',NULL);
if (!defined('CONST_INCLUDE')){
    die('Accès direct interdit');
}
$tampon = new VueGenerique();

            if (!isset($_GET['module'])) {
                $module="Acceuil";
                $_GET['action'] = "acceuil_non_co";
            }
            else {
                $module=htmlspecialchars($_GET['module']);
            }
            switch($module){
                case "Acceuil":
                case "Profil":
                case "Messagerie":
                    include 'modules/mod_'.$module.'/mod_'.$module.'.php';
                    break;
                case "Rencontre":
                
                     include 'modules/mod_'.$module.'/mod_'.$module.'.php';
                    break;
                case "Administrateur":
                case "Connexion":
                    include 'modules/mod_'.$module.'/mod_'.$module.'.php';
                    break;
                default :
                    die("Erreur Index : Module inacessible.");
            }

    $module = $tampon->getAffichage();//on recupere l'affichage des modules
    require('template.php');
?>
>>>>>>> Stashed changes
