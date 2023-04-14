<?php

function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

$mail = isset ( $_POST ['Username'] ) ? $_POST ['Username'] : NULL;
$pass = isset ( $_POST ['Password'] ) ? $_POST ['Password'] : NULL;

if($mail == NULL || $pass == NULL){
    echo <<<EOF
        <div>No mail or passWord</div>
    EOF;
}

require_once ('../mysql/ControleurConnexion.php');
$con = new ControleurConnexion();

$where = 'Mail ="' . $mail  . '" & Mdp= "' . $pass . '"';
$datas = $con->consulter('*', 'userInfos', '', $where , '', '', '', '');

if($datas[0] != NULL){
    $_SESSION["Id"] = $datas[0] ;
    echo <<<EOF
        <div>win</div>
    EOF;
    //header("Location : modifUserData.php");
    debug_to_console('Sucess ! ID = ' . $datas[0] );
}
else{
    debug_to_console("FAIL 2");
    echo $mail;
    echo <<<EOF
        <div>lose</div>
    EOF;
    echo $pass;
    //header("Location: login.php");
    die();
}


