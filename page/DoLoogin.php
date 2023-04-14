<?php


$mail = isset ( $_POST ['Username'] ) ? $_POST ['Username'] : NULL;
$pass = isset ( $_POST ['Password'] ) ? $_POST ['Password'] : NULL;

if($mail == NULL || $pass == NULL){
    header("Location: login.php");
    die();
}

require_once ('../mysql/ControleurConnexion.php');
$con = new ControleurConnexion();

$datas = $con->consulter('*', 'userInfos', '', 'Mail='+$mail+'Mdp='+$pass, '', '', '', '');

if($datas != NULL){
    $_SESSION["Id"] = $datas[0] ;
    header("modifUserData.php");
    die();
}
else{
    header("Location: login.php");
    die();
}


