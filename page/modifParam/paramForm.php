<?php
session_start();
//echo " <div style=\"color:#ff00ff;\"> GET<pre>", print_r ( $_GET ), "</pre></div>";

if(!isset($_SESSION['Id']) || empty($_SESSION['Id'])) {
    //include 'login.php' ;
    header("Location: ../login/loginForm.php");
    die();
}
require_once ('../../mysql/ControleurConnexion.php');
$Id = $_SESSION["Id"];
$Admin = $_SESSION["Admin"];
$con = new ControleurConnexion();
$datas = $con->consulter('Mail,Mdp', 'userInfos', '', 'Id=' . $Id, '', '', '', '');
$result = NULL;
if(isset($_GET['modif'])){
    $result = $_GET['modif'];
}

echo <<<EOF
 <!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8" />
<title>Paramètres</title>
</head>
<body>
<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f1/Procyon_lotor_qtl2.jpg/800px-Procyon_lotor_qtl2.jpg">
<div>Clément GOMEZ & Ulysse HAV֤E</div>
<a href="../modifUser/modifUserForm.php">formulaire</a>
<a href="../login/loginForm.php">Deconnexion</a>
EOF;
if($result != NULL){
    if($result='succeed'){
        echo <<<EOF
        <div>Modifications enregistrées avec succès</div>
        EOF;
    }
}

if($Admin == 1){
    echo <<<EOF
        <a href="../admin/validUser/validuserForm.php">Admin</a>
    EOF;
}

echo <<<EOF
<form action="modifParam.php" method="POST" enctype="application/x-www-form-urlencoded">
<div>
    <input type="reset" value="Supprimer les modifications">
</div>
<div>
	<p>E-Mail</p>
	<p><input type="email" name="Mail" class="obligatoire" required maxLength="45" value="
EOF;
echo $datas[0][0];
echo <<<EOF
"/></p>
</div>
<div>
	<p>Mot de passe</p>
	<p><input type="text" name="Mdp" class="obligatoire" required maxLength="45" value="xxxx"/></p>
</div>
<div>
	<p><input name="validate" type="submit" value="Modifier les paramètres" /></p>
    </div>
    </form>
    </div>
    </body>
EOF;
