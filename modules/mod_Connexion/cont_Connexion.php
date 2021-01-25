<?php
include 'vue_Connexion.php';
include 'modele_Connexion.php';
if (!defined('CONST_INCLUDE')){
    die('Accès direct interdit');
}

class ContConnexion {
    
    protected $modele;
    protected $vue;
    
    public function __construct() {
        $this->modele = new ModeleConnexion();
        $this->vue = new VueConnexion();
    }
    
    function formulaire() {
        $this->vue->formulaire();
    }
    
    function connexion() {
        $this->modele->connexion();
    }
    
    function deconnexion() {
        $this->modele->deconnexion();
    }
    
    function formulaire_Inscription() {
        $this->vue->form_Inscription($this->modele->getInteret());
    }
    
    function inscription() {
        $this->modele->inscription();
    }
}
?>