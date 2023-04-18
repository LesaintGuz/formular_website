
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
                        <div id="popup1" class="overlay">
                            <div class="popup">
                                <h2>Here i am</h2>
                                <a class="close" href="#">&times;</a>
                                <div class="content">
                                    Thank to pop me out of that button, but now i'm done so you can close this window.
                                </div>
                            </div>
                        </div>
                        EOF;
                    }
                }
                ?>
            <form action="DoLoogin.php" method="post">
                <div>
                    <p>E-mail</p>
                    <p><input type="email" name="Username" class="obligatoire" required maxLength="45"/></p>
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
