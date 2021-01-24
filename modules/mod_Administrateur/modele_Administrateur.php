<?php
if (!defined('CONST_INCLUDE')){
    die('Accès direct interdit');
}
require_once('./include/connexion.php');

class ModeleAdministrateur extends Connexion {
    public function __construct() {
        parent::initConnexion();
    }
    
    public function listeMembre(){
        $req = self::$bdd->prepare('select * from utilisateur');
        $req->execute();
        $array = $req->fetchAll();
        return $array;
    }
    
    public function listeMembreSignaler(){
        $req = self::$bdd->prepare('select * from signalement inner join utilisateur on signalement.id_Signale = utilisateur.id_Utilisateur');
        $req->execute();
        $array = $req->fetchAll();
        return $array;
    }
    
    public function countMembre(){
        $req = self::$bdd->prepare('select count(*) as total from utilisateur');
        $req->execute();
        $res = $req->fetch();
        $count = intval($res['total']);
        return $count+1;
    }
    
        public function countMembreS(){
        $req = self::$bdd->prepare('select count(*) as total from signalement');
        $req->execute();
        $res = $req->fetch();
        $count = intval($res['total']);
        return $count+1;
    }
    
    public function signale(){
        if (isset($_POST['annule'])) {
            $req=self::annuleSignalement();
        }
        else {
            $req1 = self::$bdd->prepare('insert into bannissement (id_Bannissement, id_Utilisateur_Banni) values (default, ?)');
            $req1->execute(array($_POST['membreS']));
            
            $req3 = self::$bdd->prepare('select * from bannissement where id_Utilisateur_Banni = ?');
            $res3 = $req3->execute(array($_POST['membreS']));
            foreach($req3 as $key) {
                $id = $key['id_Bannissement'];
            }
            
            $req2 = self::$bdd->prepare('insert into banni values (?,?,?)');
            $req2->execute(array($_POST['membre'],$id,$_SESSION['id_Utilisateur']));
            
            $req=self::annuleSignalement();
        }
        header('Location:index.php?module=Administrateur&action=admin');
    }
    
    public function annuleSignalement(){
        $req = self::$bdd->prepare('select id_Signalement from signalement WHERE id_Signale = ?');
        $req->execute(array($_POST['membreS']));
        foreach ($req as $key) {
            $idS = $key['id_Signalement'];
        }

        $req1 = self::$bdd->prepare('DELETE FROM creer_signalement WHERE id_Signalement = ?');
        $res1 = $req1->execute(array($idS));
            
        $req3 = self::$bdd->prepare('select id_Notification from declenche where id_Signalement = ?');
        $res3 = $req3->execute(array($idS));
        foreach($req3 as $key) {
            $idN = $key['id_Notification'];
        }
        
        $req2 = self::$bdd->prepare('DELETE FROM declenche WHERE id_Signalement = ?');
        $res2 = $req2->execute(array($idS));
            
        $req5 = self::$bdd->prepare('delete from notification where id_Notification = ?');
        $res5 = $req5->execute(array($idN));

        $req4 = self::$bdd->prepare('DELETE FROM signalement WHERE id_Signalement = ?');
        $res4 = $req4->execute(array($idS));
    }
    
    public function voirProfil(){
        header('Location:index.php?module=Profil&user='.$_POST['selectM']);
    }
}
?>