<?php
$mail = isset ( $_POST ['Username'] ) ? $_POST ['Username'] : NULL;
$pass = isset ( $_POST ['Password'] ) ? $_POST ['Password'] : NULL;

if($mail == NULL || $pass == NULL){
    include  'login.php' ;
    die();
}

require_once ('../mysql/ControleurConnexion.php');
$con = new ControleurConnexion();

$where = 'Mail ="' . $mail  . '"'; //AND Mdp= "' . password_hash($pass,  PASSWORD_DEFAULT) . ' "';


$datas = $con->consulter('Id, Ad, Mdp', 'userInfos', '', $where , '', '', '', '');

if($datas == NULL){
    header("Location: login.php?result=failed");
    die();
}


if(password_verify($pass, explode('?', $datas[0][2])[1]) ){
    session_start();
    $_SESSION["Id"] = $datas[0][0] ;
    $_SESSION["Admin"] = $datas[0][1] ;
    header("Location: modifUserData.php");
    die();
}else{
    header("Location: login.php?result=failed");
    die();
}
