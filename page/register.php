<?php 

$mail = isset ( $_POST ['Mail'] ) ? $_POST ['Mail'] : NULL;
$pass = isset ( $_POST ['Password'] ) ? $_POST ['Password'] : NULL;

if($mail == NULL || $pass == NULL){
    include 'login.php';
    die();
}

require_once ('../mysql/ControleurConnexion.php');
$con = new ControleurConnexion();

$con->inserer ( "waitingUser", "Id,Mail,Mdp", " '','$mail','$pass'");

include 'login.php';
die();
// sucess mess

