<?php
if(!isset($_SESSION['Id']) || empty($_SESSION['Id'] || $_SESSION["Admin"] != 1)) {
    //include 'login.php' ;
    header("Location: login.php");
    die();
}
$Id = isset ( $_POST ['Id'] ) ? $_POST ['Id'] : NULL;
$Mdp = isset ( $_POST ['Mdp'] ) ? $_POST ['Mdp'] : NULL;

$connexion->supprimer("waitingUser", "Id='" . $Id . "'");

//include 'validUserForm.php';
header("Location: validUserForm.php?delete=succeed");