<?php
/**
 * created by PhpStorm.
 * User: Yefferson
 * Date: 18/08/2025
 * Time: 01:30
 */

include ("../../config.php");

$email = $_POST['email'];
$password_user = $_POST['password_user'];

$contador = 0;
$sql = "SELECT * FROM tb_usuarios WHERE email = '$email' AND password_user = '$password_user'";
$query = $pdo->prepare($sql);
$query->execute();
$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($usuarios as $usuario){
    $contador = $contador +1;
    $email_table = $usuario['email'];
    $nombres = $usuario['nombres'];

}

if($contador == 0){

    echo "Datos incorrectos, intente de nuevo";
    session_start();
    $_SESSION['mensaje'] = "Error al iniciar sesión, verifique sus datos";
    header('Location: '.$URL.'/login');

}else{

    echo "Datos correctos, bienvenido $nombres";
    session_start();
    $_SESSION['sesion_email'] = $email;
    header('Location: '.$URL.'/index.php');

}



