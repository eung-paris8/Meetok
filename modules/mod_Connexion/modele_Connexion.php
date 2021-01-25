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
            $array = $bd->fetchAll();
            
            
            if(count($array) == 0) {
                $reqA = self::$bdd->prepare('SELECT * FROM administrateur where login_Admin like ? and mot_de_passe_Admin like ?');
                $reqA->execute(array($_POST['login'], $mdp));
                $responseA = $reqA->fetch();
                if ($responseA) {
                    $_SESSION['id_Administrateur'] = $responseA['id_Administrateur'];
                    $_SESSION['login'] = $responseA['login_Admin'];
                    header('Location:index.php?module=Administrateur&action=admin');
                }
                else {
                    die("login ou mot de passe incorect");
                }
            }
            
            else {
                $reqB = self::$bdd->prepare('SELECT banni.id_Utilisateur, utilisateur.id_Utilisateur FROM banni INNER JOIN utilisateur where banni.id_Utilisateur = utilisateur.id_Utilisateur AND utilisateur.login like ?');
                $reqB->execute(array($_POST['login']));
                $listeBan = $reqB->fetchAll();
                if (count($listeBan) != 0){
                    die('vous avez été  banni');
                }
                else {
                    $reqU = self::$bdd->prepare('SELECT * FROM Utilisateur where login like ? and mot_de_passe like ?');
                    $reqU->execute(array($_POST['login'], $mdp));
                    $responseU = $reqU->fetch();
                    if ($responseU) {
                        $_SESSION['id_Utilisateur'] = $responseU['id_Utilisateur'];
                        $_SESSION['login'] = $responseU['login'];
                        header('Location:index.php?module=Profil&user='.$_SESSION['id_Utilisateur']);
                    }
                    else {
                        die("login ou mot de passe incorect");
                    }
                }
                
            }
            
        }
    }
    
    public function deconnexion(){
        session_unset();
        header('Location:index.php');
    }
    
    public function inscription(){
        $req = self::$bdd->prepare("INSERT INTO utilisateur VALUES (default,?,?,?,?,?,?,?,?,?)");
        
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $login = $prenom[0].$nom;
        
        if (strcmp($_POST['mdp1'], $_POST['mdp2']) !=0){
            die("Les mots de passe sont differents.");
        }
        else {
            $mdp = hash('sha512', $_POST['mdp1']);
        }
        
        if (!empty($_POST['avatar'])){
            $avatar = $_POST['avatar'];
             if(!empty($_FILES['avatar'])){
                $path = "include/img_Profil/";
                $path = $path . basename( $_FILES['avatar']['name']);
                if(move_uploaded_file($_FILES['avatar'][$login], $path)) {
                    $info = pathinfo($path);
                }
             }
        }
        else {
            $avatar = NULL;
        }
        $age = $_POST['age'];
        $age = (int)$age;
        $localisation = $_POST['localisation'];
        $sexe = $_POST['sexe'];
        $description = $_POST['description'];
        if (isset($_POST['interet'])) {
            $interet = $_POST['interet'];
        }
        else {
            die("Veiullez choisir au moins un centre d'interet");
        }
        
        
        $res=$req->execute(array($nom,$prenom,$sexe,$description,$age,$localisation,$avatar,$mdp,$login));
        $res2=self::insertInteret($interet, $login);
        $res3=self::insertList($login,$sexe);
        
        
        echo "Votre login est ".$login." .";
        
        return $res;
        
    }
    
    public function getInteret(){
        $req = self::$bdd->prepare('SELECT * FROM centres_d_interets');
        $req->execute();
        return $req->fetchAll();
    }
    
    public function insertInteret($interet, $login){
        $req1 = self::$bdd->prepare("SELECT * FROM utilisateur where login like ?");
    	$res1 = $req1->execute(array($login));
        foreach ($req1 as $key) {
             $idU = $key['id_Utilisateur'];
        }
        
        $req2=self::$bdd->prepare("SELECT * FROM centres_d_interets where nom_Centres_d_Interets like ?");
        $res2=$req2->execute(array($interet));
        foreach ($req2 as $key) {
             $idCI = $key['id_Centres_d_Interets'];
        }
        
        $insertCI=self::$bdd->prepare("INSERT INTO aime VALUES (?,?)");
        $insertCI->execute(array($idU,$idCI));
        
        return $insertCI;
    }
    
    public function insertList($login,$sexe) {
        $req1 = self::$bdd->prepare("SELECT * FROM utilisateur where login like ?");
        $res1 = $req1->execute(array($login));
        foreach ($req1 as $key) {
             $idU1 = $key['id_Utilisateur'];
        }
        
        $req2 = self::$bdd->prepare("SELECT * FROM utilisateur where login not like ? and sexe not like ?");
        $res2 = $req2->execute(array($login,$sexe));
        
        foreach ($req2 as $key) {
            $idU2 = $key['id_Utilisateur'];
            $insertL=self::$bdd->prepare("INSERT INTO liste VALUES (0,0,?,?)");
            $insertL->execute(array($idU1,$idU2));
        }
        return $res2;
    }

}
?>