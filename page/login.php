
<?php
session_abort();
$result = NULL;
if(isset($_GET['result'])){
    $result = $_GET['result'];
}
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../CSS/Style.css">
        <link rel="icon" href="../CSS/logo/favicon.ico" type="image/ico">
    </head>

    <body>
        <div class="BackIMG"></div>
        <div class="imgTopLeft"></div>
        <div class="WhiteBack">
            <h1>Connexion</h1>
                <?php
                if($result != NULL){
                    if($result == 'failed'){
                        echo <<<EOF
                        <div>La combinaison e mail mot de passe est inconnue</div>
                        EOF;
                    }
                }
                ?>
            <form action="DoLoogin.php" method="post">
                <div>
                    <p>Username</p>
                    <p><input type="text" name="Username" class="obligatoire" required maxLength="45"/></p>
                </div>
                <div>
                    <p>Password</p>
                    <p><input type="password" name="Password" class="obligatoire" required maxLength="45"/></p>
                </div>
                <p><input type="submit" name="btn_valider" value="Login"></p>
            </form>
            <div>
            <a href="registerForm.php">Register</a>
            </div>
        </div>
    </body>
</html>
