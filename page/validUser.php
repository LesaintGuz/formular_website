<?php

$Id = isset ( $_POST ['Id'] ) ? $_POST ['Id'] : NULL;
$Mail = isset ( $_POST ['Mail'] ) ? $_POST ['Mail'] : NULL;
$Mdp = isset ( $_POST ['Mdp'] ) ? $_POST ['Mdp'] : NULL;

require_once ('../mysql/ControleurConnexion.php');
$connexion = new ControleurConnexion ();
$connexion->inserer("waitingUser", "Id, Mail, Mdp", $Id . ", " $Mail . ", " . $Mdp);

$connexion->supprimer("waitingUser", "Id='" . $Id . "'");

//include 'validUserForm.php';
header("Location: validUserForm.php");