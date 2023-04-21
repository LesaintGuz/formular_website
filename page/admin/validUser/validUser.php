<?php
session_start();
#redirection si utilisateur non connecté ou non administrateur
if(!isset($_SESSION['Id']) || empty($_SESSION['Id'] || $_SESSION["Admin"] != 1)) {
    header("Location: ../../login/loginForm.php");
    die();
}

$Id = isset ( $_POST ['Id'] ) ? $_POST ['Id'] : NULL;
$Mail = isset ( $_POST ['Mail'] ) ? $_POST ['Mail'] : NULL;
$Mdp = isset ( $_POST ['Mdp'] ) ? $_POST ['Mdp'] : NULL;
$isAdmin = isset ( $_POST ['isAdmin'] ) ? $_POST ['isAdmin'] : NULL;
require_once ('../../../mysql/ControleurConnexion.php');
$connexion = new ControleurConnexion ();
$connexion->inserer("userInfos", "Id, Mail, Mdp, Ad", "'', '" . $Mail . "', '" . $Mdp ."', '" . $isAdmin . "'");

$connexion->supprimer("waitingUser", "Id='" . $Id . "'", "", "");

//include 'validUserForm.php';
header("Location: validUserForm.php?add=succeed");