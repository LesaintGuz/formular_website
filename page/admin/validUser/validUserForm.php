<?php

session_start();
#redirection si utilisateur non connecté ou non administrateur
if(!isset($_SESSION['Id']) || empty($_SESSION['Id'] || $_SESSION["Admin"] != 1)) {
    header("Location: ../../login/loginForm.php");
    die();
}
require_once ('../../../mysql/ControleurConnexion.php');
$con = new ControleurConnexion();
$datas = $con->consulter('*', 'waitingUser', '', '', '', '', '', '');
$delResult = NULL;
if(isset($_GET['delete'])){
    $delResult = $_GET['delete'];
}

$addResult = NULL;
if(isset($_GET['add'])){
    $addResult = $_GET['add'];
}
?>

 <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin</title>
    <link rel="stylesheet" href="../../../CSS/Style.css">
    <link rel="icon" href="../../../CSS/logo/favicon.ico" type="image/ico">
    <link rel="stylesheet" href="../../../CSS/ModifStyle.css">
    <link rel="stylesheet" href="../../../CSS/PopUp.css">
    <meta charset="utf-8" />
</head>
<body>
    <header>
        <div class="headBarImg"></div>
    </header>
    <div class="WallpaperTank"></div>
    <div class="HeadBar">
        <a href="../../modifUser/modifUserForm.php">Mes données</a>                
        <a href="../../modifParam/paramForm.php">Paramètres</a>
        <a href="../../login/loginForm.php">Deconnexion</a>
    </div>
    <div class="Datavisualizer">
<?php
if($addResult != NULL){
    if($addResult='succeed'){
        echo <<<EOF
        <div class="SucessBoxParam">
        <span class="closeBtn" onclick="this.parentElement.style.display='none';">&times;</span>
        Utilisateur accepté
        </div>
        EOF;
    }
}

if($delResult != NULL){
    if($delResult='succeed'){
        echo <<<EOF
        <div class="SucessBoxParam">
        <span class="closeBtn" onclick="this.parentElement.style.display='none';">&times;</span>
        Utilisateur refusé
        </div>
        EOF;
    }
}
?>
<div><p class="Title">Utilisateurs en attente de validation</p></div>
<table name="waitingUsers" id="waitingUsersTable">
<thead><tr><td>Refuser</td><td>Mail</td><td>Admin</td><td>Valider</td>
</tr></thead><tbody>

<?php
foreach ($datas as $data){
echo <<<EOF
    <tr>
        <td><form action="../deleteWaitingUser.php" method="POST" enctype="application/x-www-form-urlencoded">
        <input type="hidden" name="Id" value="
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
    echo $data[1];
    echo <<<EOF
        </Label>
        <input type="hidden" name="Mail" value="
    EOF;
    echo $data[1];
    echo <<<EOF
    ">
    <input type="hidden" name="Mdp" value="
    EOF;
    echo $data[2];
    echo <<<EOF
    "></td><td>
        <input type="checkBox" name="isAdmin">
        </td><td>
        <input type="submit" value="valider">
        </td></form></tr>
    EOF;
}
?>
</tbody>
</table>
</body>
