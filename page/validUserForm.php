<?php

session_start();
//echo " <div style=\"color:#ff00ff;\"> GET<pre>", print_r ( $_GET ), "</pre></div>";

if(!isset($_SESSION['Id']) || empty($_SESSION['Id'] || $_SESSION["Admin"] != 1)) {
    include 'login.php' ;
    die();
}
require_once ('../mysql/ControleurConnexion.php');
$con = new ControleurConnexion();
$datas = $con->consulter('*', 'waitingUser', '', '', '', '', '', '');

echo <<<EOF
 <!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8" />
<title>Admin</title>
</head>
<body>
<div>Clément GOMEZ & Ulysse HAV֤E</div>
<div>Admin Kingdom</div>
<form action="modifUserData.php" method="POST" enctype="application/x-www-form-urlencoded">
<input type="submit" name="myDatas" value="Mes données">
</form>
<table name="waitingUsers" id="waitingUsersTable">
<thead><tr><td>Refuser</td><td>Id</td><td>Mail</td><td>Admin</td><td>Valider</td>
</tr></thead><tbody>
EOF;
foreach ($datas as $data){
echo <<<EOF
    <tr>
            <td><form action="deleteWaitingUser.php" method="POST" enctype="application/x-www-form-urlencoded">
        <input type="hidden" name="id" value="
EOF;
echo $data[0];
echo <<<EOF
        ">
        <input type="submit" value="Supprimer">
        </form>
        </td>
        <form action="validUser.php" method="POST" enctype="application/x-www-form-urlencoded">
        <td>
        <input type="hidden" name="Id" value="
    EOF;
    echo $data[0];
    echo <<<EOF
        ">
        <Label>
    EOF;
    echo $data[0];
    echo <<<EOF
        </Label>
        </td><td>
        <Label>
    EOF;
    echo $data[1];
    echo <<<EOF
        </Label>
        <input type="hidden" name="Mail" value="
    EOF;
    echo $data[1];
    echo <<<EOF
        ">"
        <input type="hidden" name="Mdp" value="
    EOF;
    echo $data[2];
    echo <<<EOF
        ">"
        <input type="submit" value="valider">
        </td></form></tr>
    EOF;
}
echo <<<EOF
</tbody>
</table>
</body>
EOF;
