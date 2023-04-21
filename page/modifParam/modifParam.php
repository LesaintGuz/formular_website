<?php
/*
Modification des paramètres de connexion de l'utilisateur
*/
session_start();
//Si l'utilisateur n'est pas connecté, on le redirige sur la page de login
if(!isset($_SESSION['Id']) || empty($_SESSION['Id'])) {
    header("Location: ../login/loginForm.php");
    die();
}
$Mail = isset ( $_POST ['Mail'] ) ? $_POST ['Mail'] : NULL;
$Mdp = isset ( $_POST ['Mdp'] ) ? $_POST ['Mdp'] : NULL;
require_once ('../../mysql/ControleurConnexion.php');
$connexion = new ControleurConnexion ();

#Test if new mail is already used
$where = 'Mail ="' . $Mail  . '"';
$waitingUsers = $connexion->consulter('Mail', 'waitingUser', '', $where , '', '', '', '');
$users = $connexion->consulter('Mail', 'userInfos', '', $where , '', '', '', '');
$mailAlreadyUsed = $waitingUsers != NULL || $users != NULL;
if($mailAlreadyUsed){
    header("Location: paramForm.php?modif=fail");
    die();
}

//si le mot de passe n'a pas été modifié, on ne l'envoie pas dans la bdd
if($Mdp != 'xxxx'){
$Mdp = password_hash($Mdp, $PASSWORD_DEFAULT);
$connexion->modifier ( "userInfos", 'Mail="' . $Mail . '" , Mdp="' . $Mdp . '"', "Id='" . $_SESSION['Id'] . "'", NULL , NULL );
}else{
    $connexion->modifier ( "userInfos", 'Mail="' . $Mail . '"', "Id='" . $_SESSION['Id'] . "'", NULL , NULL );
}


//include 'validUserForm.php';
header("Location: paramForm.php?modif=succeed");