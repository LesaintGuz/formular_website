<?php
session_start();
//echo " <div style=\"color:#ff00ff;\"> GET<pre>", print_r ( $_GET ), "</pre></div>";

if(!isset($_SESSION['Id']) || empty($_SESSION['Id'])) {
    //include 'login.php' ;
    header("Location: login.php");
    die();
}
require_once ('../mysql/ControleurConnexion.php');
$Id = $_SESSION["Id"];
$Admin = $_SESSION["Admin"];
$con = new ControleurConnexion();
$datas = $con->consulter('Nom,Prenom,Adresse,Birthdate,Phone,NumSecu', 'userInfos', '', 'Id=' . $Id, '', '', '', '');
$result = NULL;
if(isset($_GET['modif'])){
    $result = $_GET['modif'];
}

$adminDemandResult = NULL;
if(isset($_GET['askAdmin'])){
    $adminDemandResult = $_GET['askAdmin'];
}

//TODO Check to implemant try to be admin
/*function hasAlreadyDoneAdminDemand(){
    $hasDoneDemand = false;
    $con = new ControleurConnexion();
    $waitingIds = $con->consulter('Id', 'waitingAdmin', '', '', '', '', '', '', '');
    foreach($waitingIds as $waitingId){
        if($_SESSION["Id"] == $waitingId[0]){
            $hasDoneDemand = true;
        }
    }
    return $hasDoneDemand;
}*/

echo <<<EOF
 <!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8" />
<title>Test SI</title>
</head>
<body>
<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f1/Procyon_lotor_qtl2.jpg/800px-Procyon_lotor_qtl2.jpg">
<div>Clément GOMEZ & Ulysse HAV֤E</div>
<a href="paramForm.php">Paramètres</a>
<a href="login.php">Deconnexion</a>
EOF;
if($result != NULL){
    if($result='succeed'){
        echo <<<EOF
        <div>Modifications enregistrées avec succès</div>
        EOF;
    }
}

//TODO Check to implemant try to be admin
/*if($adminDemandResult != NULL){
    if($adminDemandResult == 'succeed'){
        echo <<<EOF
        <div>Demande de changement de rôle réussie</div>
        EOF;
    }
}*/

if($Admin == 1){
    echo <<<EOF
        <form action="validUserForm.php" method="POST" enctype="application/x-www-form-urlencoded">
        <input type="submit" name="admin" value="Admin">
        </form>
    EOF;
}else{
//TODO Check to implemant try to be admin
/*
echo $_SESSION["Admin"];
echo <<<EOF
<form action="askForAdmin.php" method="POST" enctype="application/x-www-form-urlencoded">
<input type="input" name="send" value="Devenir Admin"
EOF;
if(hasAlreadyDoneAdminDemand()){
    echo <<<EOF
     disabled
    EOF;
}

echo <<<EOF
>
</form>
EOF;*/
}

echo <<<EOF
<div>Raccoon Kingdom</div>
<div><img src="https://i.gifer.com/2rGa.gif"></div>
<div>
<form action="addToDtb.php" method="POST" enctype="application/x-www-form-urlencoded">
<div>
    <input type="reset" value="Supprimer les modifications">
</div>
<div>
	<p>Nom</p>
	<p><input type="text" name="Nom" class="obligatoire" required maxLength="45" value="
EOF;
echo $datas[0][0];
echo <<<EOF
"/></p>
</div>
<div>
	<p>Prenom</p>
	<p><input type="text" name="Prenom" class="obligatoire" required maxLength="45" value="
EOF;
echo $datas[0][1];
echo <<<EOF
"/></p>
</div>
<div>
	<p>Adresse</p>
	<p><input type="text" name="Adresse" class="obligatoire" required maxLength="255" value="
EOF;
echo $datas[0][2];
echo <<<EOF
"/></p></div>
    <div>
	<p>Date de naissance</p>
	<p><input type="date" name="Birthdate" class="obligatoire" required value="
EOF;
echo $datas[0][3];
echo <<<EOF
"/></p>
    </div>
    <div>
	<p>Numéro de téléphone</p>
	<p><input type="tel" name="Phone" class="obligatoire" required
    pattern="^0[0-9]{9}$"
    value="
EOF;
echo $datas[0][4];
echo <<<EOF
"/></p></div>
    <div>
	<p>Numéros de sécurité sociale</p>
	<p><input type="text" name="NumSecu" class="obligatoire" required minlength="16" maxLength="16" value="
EOF;
echo $datas[0][5];
echo <<<EOF
"/></p></div>
    <div>
	<p><input name="bouton_valider" type="submit" value="Modifier les données" /></p>
    </div>
    <img src="https://media.tenor.com/NnvNNOXwE6cAAAAM/raccoon-gossip.gif">
    </form>
    </div>
    </body>
EOF;
