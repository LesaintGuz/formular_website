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
?>

 <!DOCTYPE html>
<html lang="fr">
<head>
        <link rel="stylesheet" href="../../CSS/Style.css">
        <link rel="icon" href="../../CSS/logo/favicon.ico" type="image/ico"><link rel="stylesheet" href="../../CSS/Style.css">
        <link rel="stylesheet" href="../../CSS/ModifStyle.css">
        <meta charset="utf-8" />
        <title> Paramètres </title>
</head>
<body>
    <div class="WallpaperTank"></div>

    <header>
        <div class="headBarImg"></div>
        <div class="HeadBar">
               
                
            <?php
                # into 
                if($result != NULL){
                    if($result='succeed'){
                        echo <<<EOF
                        div>Modifications enregistrées avec succès</div>
                        EOF;
                    }
                }

                if($Admin == 1){
                    echo <<<EOF
                        <a href="../admin/validUser/validUserForm.php">Admin</a>
                    EOF;
                }
            ?>
            <a href="../modifUser/modifUserForm.php">Mes données</a>
            <a href="../login/loginForm.php">Deconnexion</a>
        </div>
    </header>
    <div class="Datavisualizer">
    <form action="modifParam.php" method="POST" enctype="application/x-www-form-urlencoded">
        <div>
	        <p>E-Mail</p>
	        <p><input type="email" name="Mail" class="obligatoire" required maxLength="45" value="<?php echo $datas[0][0]; ?>"/></p>
        </div>
        <div>
	        <p>Mot de passe</p>
	        <p><input type="text" name="Mdp" class="obligatoire" required value="xxxx"/></p>
        </div>
        <div class="AlignLeft">
            <p><input type="reset" value="Supprimer les modifications"></p>
	        <p><input name="validate" type="submit" value="Modifier les paramètres" /></p>
        </div>
    </form>
    </div>
</body>
