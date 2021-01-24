<?php
include 'vue_Acceuil.php';
if (!defined('CONST_INCLUDE')){
    die('Accès direct interdit');
}

class ContAcceuil {
    
    protected $vue;
    
    public function __construct() {
        $this->vue = new VueAcceuil();
    }
    
    function acceuil() {
        $this->vue->acceuil();
    }
}
?>