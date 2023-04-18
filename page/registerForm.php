<?php 
$result = NULL;
if(isset($_GET['result'])){
    $result = $_GET['result'];
}
echo <<<EOF
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../CSS/Style.css">
        <h1>Register</h1>
    </head>
    <body>
EOF;
if($result != NULL){
    if($result == "succeed"){
    echo <<<EOF
    <div>Demande d'inscription validée</div>
    EOF;
    }else if ($result == "fail"){
        echo <<<EOF
        <div>Ce mail est déjà utilisé</div>
        EOF;
    }
}
echo <<<EOF
        <form action="register.php"  method="post">
            <div>
                <p>E-Mail</p>
                <p><input type="text" name="Mail" class="obligatoire" required maxLength="45"/></p>
            </div>
            <div>
                <p>Password</p>
                <p><input type="password" name="Password" class="obligatoire" required maxLength="45"/></p>
            </div>
            <p><input type="submit" name="btn_valider" value="Register"></p>
        </form>
        <div>
            <a href="login.php">Login</a>
        </div>
    </body>
</html>
EOF;