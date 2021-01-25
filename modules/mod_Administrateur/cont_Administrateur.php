<?php
include 'vue_Administrateur.php';
include 'modele_Administrateur.php';
if (!defined('CONST_INCLUDE')){
    die('Accès direct interdit');
}

class ContAdministrateur {
    
    protected $modele;
    protected $vue;
    
    public function __construct() {
        $this->modele = new ModeleAdministrateur();
        $this->vue = new VueAdministrateur();
    }
    
    function admin() {
        $this->vue->panneau($this->modele->listeMembre(), $this->modele->listeMembreSignaler(), $this->modele->countMembre(), $this->modele->countMembreS());
    }
    
    function signale(){
        $this->modele->signale();
    }
    
    function profil(){
        $this->modele->voirProfil();
    }
    
}
?>