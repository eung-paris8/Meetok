<?php
    
    function motif() {
        $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        );
        $dns="mysql:host=localhost;dbname=meetok";
        $login="root";
        $mdp="root";
        try{
            $bdd = new PDO($dns,$login,$mdp,$options);
        }catch(PDOException $pdoe){
            echo 'Erreur de Connexion a la BD';
        }
        
        $idU=$_POST['membre'];
        $request='select description_Signalement from signalement where id_Signale = ?';
        $prepareRequest=$bdd->prepare($request);
        $result=$prepareRequest->execute(array($idU));
        
        return $result;
    }
    
    header('Content-Type: application/json');
    echo json_encode(motif());
?>