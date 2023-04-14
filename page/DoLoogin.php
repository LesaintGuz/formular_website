<?php

$mail = isset ( $_POST ['Username'] ) ? $_POST ['Username'] : NULL;
$pass = isset ( $_POST ['Password'] ) ? $_POST ['Password'] : NULL;

if($mail == NULL || $pass == NULL){
    echo <<<EOF
        <div>No mail or passWord</div>
    EOF;
}

require_once ('../mysql/ControleurConnexion.php');
$con = new ControleurConnexion();

$where = 'Mail="' . $mail  . '" AND Mdp="' . $pass . '"';
$datas = $con->consulter('*', 'userInfos', '', $where , '', '', '', '');

if($datas != NULL){
    session_start();
    $_SESSION["Id"] = $datas[0] ;
    include "modifUserData.php";
}
else{
    header("Location: login.php");
    die();
}


