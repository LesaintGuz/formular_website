<?php
session_abort();
echo <<< EOF
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../CSS/Style.css">
        <link rel="icon" href="../CSS/logo/favicon.ico" type="image/ico">
    </head>

    <body>
        <div class="BackIMG"></div>
        <div class="WhiteBack">
            <h1>Connexion</h1>
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
                <a href="register.html">Register</a>
            </div>
        </div>
    </body>
</html>
EOF;
