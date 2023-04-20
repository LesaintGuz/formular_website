<?php
session_start();
//echo " <div style=\"color:#ff00ff;\"> GET<pre>", print_r ( $_GET ), "</pre></div>";
if(!isset($_SESSION['Id']) || empty($_SESSION['Id'])) {
    //include 'login.php' ;
    header("Location: ../login/loginForm.php");
    die();
}
$Nom = isset ( $_POST ['Nom'] ) ? $_POST ['Nom'] : NULL;
$Prenom = isset ( $_POST ['Prenom'] ) ? $_POST ['Prenom'] : NULL;
$Adresse1 = isset ( $_POST ['Adresse1'] ) ? $_POST ['Adresse1'] : NULL;
$Adresse2 = isset ( $_POST ['Adresse2'] ) ? $_POST ['Adresse2'] : NULL;
$Adresse3 = isset ( $_POST ['Adresse3'] ) ? $_POST ['Adresse3'] : NULL;
$Adresse = $Adresse1 . ";" . $Adresse2 . ";" . $Adresse3;
$Phone = isset ( $_POST ['Phone'] ) ? $_POST ['Phone'] : NULL;
$Birthdate = isset ( $_POST ['Birthdate'] ) ? $_POST ['Birthdate'] : NULL;
$NumSecu = isset ( $_POST ['NumSecu'] ) ? $_POST ['NumSecu'] : NULL;
$Id = $_SESSION["Id"];
//$Id = isset ( $_POST ['Id'] ) ? $_POST ['Id'] : NULL;
//include ('./mysql/ControleurConnexion.php');
require_once ('../../mysql/ControleurConnexion.php');
$connexion = new ControleurConnexion ();
$connexion->modifier ( "userInfos", 'Nom="' . $Nom . '" , Prenom="' . $Prenom . '" , Adresse="' . $Adresse . '" , Birthdate="' . $Birthdate . '" , Phone="' . $Phone . '" , NumSecu="' . $NumSecu . '"', "Id='" . $Id . "'", NULL , NULL );
//include 'modifUserData.php';
//include '../dbSaver.php';
header("Location: modifUserForm.php?modif=succeed");