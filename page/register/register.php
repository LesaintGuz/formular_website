<?php 
if(!isset($_POST['Mail'])){
    header("Location: ../login/loginForm.php");
    die();
}
$mail = isset ( $_POST ['Mail'] ) ? $_POST ['Mail'] : NULL;
$pass = isset ( $_POST ['Password'] ) ? $_POST ['Password'] : NULL;

if($mail == NULL || $pass == NULL){
    header("Location: ../login/loginForm.php?result=succeed");
    die();
}

require_once ('../../mysql/ControleurConnexion.php');
$con = new ControleurConnexion();
$where = 'Mail ="' . $mail  . '"';
$waitingUsers = $con->consulter('Mail', 'waitingUser', '', $where , '', '', '', '');
$users = $con->consulter('Mail', 'userInfos', '', $where , '', '', '', '');
$mailAlreadyUsed = $waitingUsers != NULL || $users != NULL;
$pass = password_hash($pass, $PASSWORD_DEFAULT);

if($mailAlreadyUsed){
    header("Location: registerForm.php?result=fail");
    die();
}

$con->inserer ( "waitingUser", "Id,Mail,Mdp", " '','$mail','$pass'");

header("Location: ../login/loginForm.php?result=succeed");
die();
// sucess mess

