<?php
session_start();
if(!isset($_SESSION['Id']) || empty($_SESSION['Id'])) {
    //include 'login.php' ;
    header("Location: login.php");
    die();
}
$Id = $_SESSION['Id'];
require_once ('../mysql/ControleurConnexion.php');
$connexion = new ControleurConnexion ();
$connexion->supprimer("userInfos", "Id='" . $Id . "'", "", "");

//include 'validUserForm.php';
header("Location: accountDeleteForm.php");