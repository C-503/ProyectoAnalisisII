<?php


$id_usuario_get = $_GET['id'];

 $sql_usuarios = "SELECT * FROM tb_usuarios where id_usuario = '$id_usuario_get'";
 $query_usuarios = $pdo->prepare($sql_usuarios);
 $query_usuarios->execute();
 $datos_usuarios = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);

 foreach ($datos_usuarios as $usuarios_dato) {
    $nombres = $usuarios_dato['nombres'];
    $email = $usuarios_dato['email'];

 }

