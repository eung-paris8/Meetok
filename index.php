
<?php session_start();
require_once('VueGenerique.php');
define('CONST_INCLUDE',NULL);
if (!defined('CONST_INCLUDE')){
    die('Accès direct interdit');
}

//$_SESSION['id_Utilisateur']=7;
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
                case "Rencontre":
                case "Administrateur":
                case "Notification" :
                case "Connexion":
                    include 'modules/mod_'.$module.'/mod_'.$module.'.php';
                    break;
                default :
                    die("Erreur Index : Module inacessible.");
            }

    $module = $tampon->getAffichage();//on recupere l'affichage des modules
    require('template.php');

?>