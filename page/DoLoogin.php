<?php

$mail = isset ( $_POST ['Username'] ) ? $_POST ['Username'] : NULL;
$pass = isset ( $_POST ['Password'] ) ? $_POST ['Password'] : NULL;

if($mail == NULL || $pass == NULL){
    include  'login.php' ;
    die();
}

require_once ('../mysql/ControleurConnexion.php');
$con = new ControleurConnexion();

$where = 'Mail ="' . $mail  . '" AND Mdp= "' . $pass . ' "';
$datas = $con->consulter('Id, Ad', 'userInfos', '', $where , '', '', '', '');

if($datas != NULL){
    session_start();
    $_SESSION["Id"] = $datas[0][0] ;
    $_SESSION["Admin"] = $datas[0][1] ;
    include  'modifUserData.php' ;
    die();
}else{
    include  'login.php' ;
    echo $datas;
    die();
}


