<?php
if (!defined('CONST_INCLUDE')){
    die('Accès direct interdit');
}
include_once('./VueGenerique.php');

class VueAcceuil extends VueGenerique {
    public function __construct(){
        parent::__construct();
    }
    
    public function acceuil() {
        echo '
        <div id="intro" class="view">
                <span>Trouver votre âme soeur en ligne.</span>
            </div>
        ';
    }
}
?>