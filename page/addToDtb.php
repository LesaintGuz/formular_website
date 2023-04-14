<?php

//echo " <div style=\"color:#ff00ff;\"> GET<pre>", print_r ( $_GET ), "</pre></div>";

$Nom = isset ( $_POST ['Nom'] ) ? $_POST ['Nom'] : NULL;
$Prenom = isset ( $_POST ['Prenom'] ) ? $_POST ['Prenom'] : NULL;
$Adresse = isset ( $_POST ['Adresse'] ) ? $_POST ['Adresse'] : NULL;
$Phone = isset ( $_POST ['Phone'] ) ? $_POST ['Phone'] : NULL;
$Birthdate = isset ( $_POST ['Birthdate'] ) ? $_POST ['Birthdate'] : NULL;
$NumSecu = isset ( $_POST ['NumSecu'] ) ? $_POST ['NumSecu'] : NULL;
//$Id = $_SESSION["Id"][0];
$Id = isset ( $_POST ['Id'] ) ? $_POST ['Id'] : NULL;
//include ('./mysql/ControleurConnexion.php');
require_once ('../mysql/ControleurConnexion.php');
$connexion = new ControleurConnexion ();
$connexion->modifier ( "userInfos", "'$Id', $Nom','$Prenom','$Adresse','$Birthdate', '$Phone', 'ad@min.fr', '$NumSecu', '123'", "Id=" . $Id, "", "" );

include 'modifUserData.php';