<?php

use sarassoroberto\usm\entity\Interessi;

require "./__autoload.php";
$action = './add_interesse.php';
$submit = 'aggiungi nuovo interesse';

if($_SERVER['REQUEST_METHOD']==='GET'){

    $nomeInteresse = '';
    $interesseMessage = '';

}

if($_SERVER['REQUEST_METHOD']==='POST'){

    $interesse = new Interessi($_POST['interesse']);
    
    
}