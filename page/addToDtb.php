<?php

//echo " <div style=\"color:#ff00ff;\"> GET<pre>", print_r ( $_GET ), "</pre></div>";

$Nom = isset ( $_POST ['Nom'] ) ? $_POST ['Nom'] : NULL;
$Prenom = isset ( $_POST ['Prenom'] ) ? $_POST ['Prenom'] : NULL;
$Adresse = isset ( $_POST ['Adresse'] ) ? $_POST ['Adresse'] : NULL;
$Phone = isset ( $_POST ['Phone'] ) ? $_POST ['Phone'] : NULL;
$Birthdate = isset ( $_POST ['Birthdate'] ) ? $_POST ['Birthdate'] : NULL;
$Mail = isset ( $_POST ['Mail'] ) ? $_POST ['Mail'] : NULL;
$NumSecu = isset ( $_POST ['NumSecu'] ) ? $_POST ['NumSecu'] : NULL;
//include ('./mysql/ControleurConnexion.php');
require_once ('../mysql/ControleurConnexion.php');
$connexion = new ControleurConnexion ();
$connexion->inserer ( "userInfos", "Id,Nom,Prenom,Adresse,Birthdate,Phone,Mail,NumSecu", "NULL,'$Nom','$Prenom','$Adresse','$Birthdate', '$Phone','$Mail','$NumSecu'" );

include 'header.php';