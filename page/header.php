<?php

//echo " <div style=\"color:#ff00ff;\"> GET<pre>", print_r ( $_GET ), "</pre></div>";

$Nom = isset ( $_GET ['Nom'] ) ? $_GET ['Nom'] : NULL;
$Prenom = isset ( $_GET ['Prenom'] ) ? $_GET ['Prenom'] : NULL;
$Adresse = isset ( $_GET ['Adresse'] ) ? $_GET ['Adresse'] : NULL;
$Phone = isset ( $_GET ['Phone'] ) ? $_GET ['Phone'] : NULL;
$Birthdate = isset ( $_GET ['Birthdate'] ) ? $_GET ['Birthdate'] : NULL;
$Mail = isset ( $_GET ['Mail'] ) ? $_GET ['Mail'] : NULL;
$NumSecu = isset ( $_GET ['NumSecu'] ) ? $_GET ['NumSecu'] : NULL;
if (!empty($Nom)){
//include ('./mysql/ControleurConnexion.php');
require_once ('../mysql/ControleurConnexion.php');
$connexion = new ControleurConnexion ();
$connexion->inserer ( "userInfos", "Id,Nom,Prenom,Adresse,Birthdate,Phone,Mail,NumSecu", "NULL,'$Nom','$Prenom','$Adresse','$Birthdate', '$Phone','$Mail','$NumSecu'" );
}


require_once ('../mysql/ControleurConnexion.php');
$con = new ControleurConnexion();
$datas = $con->consulter('*', 'userInfos', '', '', '', '', '', '');

echo <<<EOF
 <!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8" />
<title>Test SI</title>
</head>
<body>
<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f1/Procyon_lotor_qtl2.jpg/800px-Procyon_lotor_qtl2.jpg">
<div>Clément GOMEZ & Ulysse HAV֤E</div>
<div>Raccoon Kingdom</div>
<div><img src="https://i.gifer.com/2rGa.gif"></div>
<div>
<form action="updateDtb.php" method="POST">
<table name="personalDataTable" id="personalDataTable">
<thead><tr><td>Nom</td><td>Prenom</td><td>Adresse</td><td>Date de Naissance</td><td>Téléphone</td><td>Mail</td><td>Numéros de Sécurité Sociale</td>
</tr></thead><tbody>
EOF;
foreach ($datas as $data){
	echo <<<EOF
	<tr><td>
	<input type="hidden" name="id" value="
	EOF;
	echo $data[0];
	echo <<<EOF
	">
	<input type="text" name="Nom" value="
	EOF;
	echo $data[1];
	echo <<<EOF
	"></td><td>
	<input type="text" name="Prenom" value="
	EOF;
	echo $data[2];
	echo <<<EOF
	"></td><td>
	<input type="text" name="Adresse" value="
	EOF;
	echo $data[3];
	echo <<<EOF
	"></td><td>
	<input type="date" name="Birthdate" value="
	EOF;
	echo $data[4];
	echo <<<EOF
	"></td><td>
	<input type="tel" name="Phone" value="
	EOF;
	echo $data[5];
	echo <<<EOF
	"></td><td>
	<input type="email" name="Mail" value="
	EOF;
	echo $data[6];
	echo <<<EOF
	"></td><td>
	<input type="text" name="NumSecu" value="
	EOF;
	echo $data[7];
	echo <<<EOF
	"></td>
	</tr>
	EOF;
}
echo <<<EOF
</tbody>
</table>
</form>
</div>

<button type="button" onclick="changeAddFormVisibility();">+</button>
<div id='addBtn' hidden>
<form action="p1.php" method="GET" enctype="application/x-www-form-urlencoded">
<div>
		<p>Nom</p>
		<p><input type="text" name="Nom" class="obligatoire" required maxLength="45"/></p>
</div>
<div>
		<p>Prenom</p>
		<p><input type="text" name="Prenom" class="obligatoire" required maxLength="45"/></p>
</div>
<div>
		<p>Adresse</p>
		<p><input type="text" name="Adresse" class="obligatoire" required maxLength="255"/></p>
</div>
<div>
		<p>Date de naissance</p>
		<p><input type="date" name="Birthdate" class="obligatoire" required/></p>
</div>
<div>
		<p>Numéro de téléphone</p>
		<p><input type="tel" name="Phone" class="obligatoire" required/></p>
</div>
<div>
		<p>Mail</p>
		<p><input type="email" name="Mail" class="obligatoire" required maxLength="89"/></p>
</div>
<div>
		<p>Numéros de sécurité sociale</p>
		<p><input type="text" name="NumSecu" class="obligatoire" required maxLength="16"/></p>
</div>
<div>
		<p><input name="bouton_valider" type="submit" value="Raccooner" /></p>
</div>
<img src="https://media.tenor.com/NnvNNOXwE6cAAAAM/raccoon-gossip.gif">
</form>
</div>
<script>
function changeAddFormVisibility(){
	var formDiv = document.getElementById('addBtn');
	formDiv.hidden= !formDiv.hidden;
}
</script>
</body>

EOF;
