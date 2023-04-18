<?php
    session_start();
    //echo " <div style=\"color:#ff00ff;\"> GET<pre>", print_r ( $_GET ), "</pre></div>";

    if(!isset($_SESSION['Id']) || empty($_SESSION['Id'])) {
        //include 'login.php' ;
        header("Location: login.php");
        die();
    }
    require_once ('../mysql/ControleurConnexion.php');
    $Id = $_SESSION["Id"];
    $Admin = $_SESSION["Admin"];
    $con = new ControleurConnexion();
    $datas = $con->consulter('Nom,Prenom,Adresse,Birthdate,Phone,NumSecu', 'userInfos', '', 'Id=' . $Id, '', '', '', '');
    $result = NULL;
    $adress = explode(';', $datas[0][2]);
    if(isset($_GET['modif'])){
        $result = $_GET['modif'];
    }

    $adminDemandResult = NULL;
    if(isset($_GET['askAdmin'])){
        $adminDemandResult = $_GET['askAdmin'];
    }
?>


<!DOCTYPE html>
<html lang="fr">

    <head>
        <link rel="icon" href="../CSS/logo/favicon.ico" type="image/ico">
        <link rel="stylesheet" href="../CSS/Style.css">
        <meta charset="utf-8" />
        <title>Test SI</title>
    </head>
    <body>
        <!-- Head bar  -->
            <div>
                <a href="paramForm.php">Paramètres</a>
                <a href="login.php">Deconnexion</a>
                
                
                <?php
                    # into 
                    if($result != NULL){
                        if($result='succeed'){
                            echo <<<EOF
                            <div>Modifications enregistrées avec succès</div>
                            EOF;
                        }
                    }

                    if($Admin == 1){
                        echo <<<EOF
                            <a href="validUserForm.php">Admin</a>
                        EOF;
                    }
                ?>
            </div>
            <div>
                <form action="addToDtb.php" method="POST" enctype="application/x-www-form-urlencoded">

                    <div>
                        <input type="reset" value="Supprimer les modifications">
                    </div>
                    <div>
                        <p>Nom</p>
                        <p><input type="text" name="Nom" class="obligatoire" required maxLength="45" value=" <?php echo $datas[0][0]; ?> "/></p>  
                    </div>
                    <div>
                        <p>Prenom</p>
                        <p><input type="text" name="Prenom" class="obligatoire" required maxLength="45" value=" <?php echo $datas[0][1]; ?> "/></p>
                    </div>
                    <div>
                        <p>Adresse</p>
                        <p><input type="text" name="Adresse1" class="obligatoire" required maxLength="255" value=" <?php if(isset($adress[0])){ echo $adress[0];} ?>"/></p>
                    </div> 

                    <div>
                        <p>Code Postal</p>
                        <p><input type="text" name="Adresse2" class="obligatoire" required pattern="^[0-9]{5}$" value=" <?php if(isset($adress[1])){  echo $adress[1];}?> "/></p>
                    </div>

                    <div>
                        <p>Ville</p>
                        <p><input type="text" name="Adresse3" class="obligatoire" required value=" <?php if(isset($adress[2])){ echo $adress[2];} ?> "/></p>
                    </div>

                    <div>
                        <p>Date de naissance</p>
                        <p><input type="date" name="Birthdate" class="obligatoire" required value="<?php echo $datas[0][3]; ?>" min='1899-01-01' max='2007-12-12'/></p>
                    </div>

                    <div>
                        <p>Numéro de téléphone</p>
                        <p><input type="tel" name="Phone" class="obligatoire" required  value=" <?php echo $datas[0][4]; ?>"/></p>
                    </div>

                    <div>
                        <p>Numéros de sécurité sociale</p>
                        <p><input type="text" name="NumSecu" class="obligatoire" required minlength="16" maxLength="16" value=" <?php echo $datas[0][5]; ?> "/></p>
                    </div>

                    <div>
                        <p><input name="bouton_valider" type="submit" value="Modifier les données" /></p>
                    </div>
                            
                </form>
            </div>
        </body>
