<?php 
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
        <h1>Création de compte</h1>
        <form action="register.php"  method="post">
            <div>
                <p>E-Mail</p>
                <p><input type="email" name="Mail" class="obligatoire" required maxLength="45"/></p>
            </div>
            <div>
                <p>Mot de passe</p>
                <p><input type="password" name="Password" class="obligatoire" required maxLength="45"/></p>
            </div>
            <p><input type="submit" name="btn_valider" value="Register"></p>
        </form>
        <div>
            <a href="../login/loginForm.php">J'ai déjà un compte</a>
        </div>
    </div>
   
    </body>
    
</html>
<?php
        if($result != NULL){
            if($result == "succeed"){
                
                echo <<<EOF
                <div class="SucessBox">
                    <span class="closeBtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    Demande d'inscription validée
                </div>
                EOF;
            }else if ($result == "fail"){
                echo <<<EOF
                <div class="AlertBox">
                    <span class="closeBtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    Ce mail est déjà utilisé
                </div>
                EOF;
            }
        }
    ?>