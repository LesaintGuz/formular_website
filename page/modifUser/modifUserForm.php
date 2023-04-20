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
        <link rel="stylesheet" href="../../CSS/Style.css">
        <link rel="icon" href="../../CSS/logo/favicon.ico" type="image/ico"><link rel="stylesheet" href="../../CSS/Style.css">
        <link rel="stylesheet" href="../../CSS/ModifStyle.css">
        <meta charset="utf-8" />
        <title> Modifications </title>
    </head>

    

    <body>
        <header>
            <div class="headBarImg"></div>
            <div class="HeadBar">
               
                
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
                            <a href="../admin/validUser/validUserForm.php">Admin</a>
                        EOF;
                    }
                ?>
                <a href="../modifParam/paramForm.php">Paramètres</a>
                <a href="../login/loginForm.php">Deconnexion</a>
            </div>
        </header>
        <div class="wallPaper"></div>
            <div class="DataVisualizer">
                <form action="modifUser.php" method="POST" enctype="application/x-www-form-urlencoded">
                    <div><!-- info personne -->
                        <div>
                            <p>Nom</p>
                            <p><input type="text" name="Nom" class="obligatoire" required maxLength="45" value="<?php echo $datas[0][0]; ?>" pattern="^[^0-9]+$"/></p>  
                        </div>
                        <div>
                            <p>Prenom</p>
                            <p><input type="text" name="Prenom" class="obligatoire" required maxLength="45" value="<?php echo $datas[0][1]; ?>" pattern="^[^0-9]+$"/></p>
                        </div>

                        <div>
                            <p>Date de naissance</p>
                            <p><input type="date" name="Birthdate" class="obligatoire" required value="<?php echo $datas[0][3]; ?>" min='1899-01-01' max='2007-12-12'/></p>
                        </div>

                        <div>
                            <p>Numéro de téléphone</p>
                            <p><input type="tel" name="Phone" class="obligatoire" required  value="<?php echo $datas[0][4]; ?>" maxLength="10" pattern="^[0-9]{10}$"/></p>
                        </div>

                        <div>
                            <p>Numéros de sécurité sociale</p>
                            <p><input type="text" name="NumSecu" class="obligatoire" required maxLength="15" pattern="^[0-9]{15}$" value="<?php echo $datas[0][5]; ?>"/></p>
                        </div>

                    </div>

                    <div> <!-- location --> 
                        <div>
                            <p>Adresse</p>
                            <p><input type="text" name="Adresse1" class="obligatoire" required maxLength="255" value="<?php if(isset($adress[0])){echo $adress[0];} ?>"/></p>
                        </div> 

                        <div>
                            <p>Code Postal</p>
                            <p><input type="text" name="Adresse2" class="obligatoire" required pattern="^[0-9]{5}$" value="<?php if(isset($adress[1])){echo $adress[1];}?>"/></p>
                        </div>

                        <div>
                            <p>Ville</p>
                            <p><input type="text" name="Adresse3" class="obligatoire" required value="<?php if(isset($adress[2])){echo $adress[2];} ?>" pattern="^[^0-9]+$"/></p>
                        </div>
                    <div>

                    <div> <!-- BTN -->
                        <div>
                            <input type="reset" value="Supprimer les modifications">
                        </div>

                        <div>
                            <p><input name="bouton_valider" type="submit" value="Modifier les données" /></p>
                        </div> 

                        <div> <!-- nuke_btn --> 
                            <a href="deleteAccount.php">Supprimer ses données</a>
                        </div>
                    </div>  
                </form>
            </div>
        </body>