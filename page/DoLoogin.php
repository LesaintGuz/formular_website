<?php

$mail = isset ( $_POST ['Username'] ) ? $_POST ['Username'] : NULL;
$pass = isset ( $_POST ['Password'] ) ? $_POST ['Password'] : NULL;

if($mail == NULL || $pass == NULL){
    include  'login.php' ;
    die();
}

require_once ('../mysql/ControleurConnexion.php');
$con = new ControleurConnexion();

<<<<<<< HEAD
$where = 'Mail ="' . $mail  . '" AND Mdp= "' . $pass . ' "';
$datas = $con->consulter('*', 'userInfos', '', $where , '', '', '', '');

if($datas != NULL){
    $_SESSION["Id"] = $datas[0] ;
    include  'modifUserData.php' ;
    die();
}
else{
    include  'login.php' ;
=======
$where = 'Mail="' . $mail  . '" AND Mdp="' . $pass . '"';
$datas = $con->consulter('*', 'userInfos', '', $where , '', '', '', '');

if($datas != NULL){
    session_start();
    $_SESSION["Id"] = $datas[0] ;
    include "modifUserData.php";
}
else{
    header("Location: login.php");
>>>>>>> 560f68b17b99b5f85b8cdd18fbfbda3cb92c940e
    die();
}


