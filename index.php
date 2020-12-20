
<?php session_start();
require_once('VueGenerique.php');
define('CONST_INCLUDE',NULL);
if (!defined('CONST_INCLUDE')){
    die('Accès direct interdit');
}
$tampon = new VueGenerique();

            if (!isset($_GET['module'])) {
                $module="acceuil";
                $_GET['action'] = "test";
            }
            else {
                $module=htmlspecialchars($_GET['module']);
            }
            switch($module){
                case "acceuil":
                case "Profil":
                case "Rencontre":
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