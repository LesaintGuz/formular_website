
<?php
    session_start();
    $_SESSION['Id'] = NULL;

    $result = NULL;
    if(isset($_GET['result'])){
        $result = $_GET['result'];
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../../CSS/Style.css">
        <link rel="stylesheet" href="../../CSS/PopUp.css">
        <link rel="icon" href="../../CSS/logo/favicon.ico" type="image/ico">
    </head>

    <body>
        <div class="BackIMG"></div>
        <div class="imgTopLeft"></div>
        <div class="WhiteBack">
        <?php
        if($result != NULL){
            if($result == 'failed'){
                echo <<<EOF
                <div class="ErrorBoxParam">
                    <span class="closeBtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    Échec de la connexion, la combinaison email mot de passe est inconnue
                </div>
                EOF;
            }else if($result == "succeed"){
                echo <<<EOF
                <div class="SucessBoxParam">
                    <span class="closeBtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    Demande d'inscription validée
                </div>
                EOF;
            }
        }
        ?>

        <h1>Connexion</h1>
                
            <form action="DoLoogin.php" method="post">
                <div>
                    <p>E-mail</p>
                    <p><input type="email" name="Username" class="obligatoire" required maxLength="45"/></p>
                </div>
                <div>
                    <p>Mot de passe</p>
                    <p><input type="password" name="Password" class="obligatoire" required/></p>
                </div>
                <p><input type="submit" name="btn_valider" value="Login"></p>
            </form>
            <div>
            <a href="../register/registerForm.php">Créer un compte</a>
            </div>
        </div>
        
    </body>
</html>
