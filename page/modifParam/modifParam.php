<?php
session_start();
if(!isset($_SESSION['Id']) || empty($_SESSION['Id'])) {
    //include 'login.php' ;
    header("Location: ../login/loginForm.php");
    die();
}
$Mail = isset ( $_POST ['Mail'] ) ? $_POST ['Mail'] : NULL;
$Mdp = isset ( $_POST ['Mdp'] ) ? $_POST ['Mdp'] : NULL;
require_once ('../../mysql/ControleurConnexion.php');
$connexion = new ControleurConnexion ();
$datas = $connexion->consulter('Mail', 'waitingUser', '', '', '', '', '', '');
foreach($datas as $data){
    if($Mail == $data[0]){
        header("Location: paramForm.php?modif=fail");
        die();
    }
}

$savedDatas = $connexion->consulter('Mail', 'userInfos', '', '', '', '', '', '');
foreach($savedDatas as $data){
    if($Mail == $data[0]){
        header("Location: paramForm.php?modif=fail");
        die();
    }
}

if($Mdp != 'xxxx'){
$Mdp = password_hash($Mdp, $PASSWORD_DEFAULT);
$connexion->modifier ( "userInfos", 'Mail="' . $Mail . '" , Mdp="' . $Mdp . '"', "Id='" . $_SESSION['Id'] . "'", NULL , NULL );
}else{
    $connexion->modifier ( "userInfos", 'Mail="' . $Mail . '"', "Id='" . $_SESSION['Id'] . "'", NULL , NULL );
}


//include 'validUserForm.php';
header("Location: paramForm.php?modif=succeed");