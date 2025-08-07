<?php

// conexion a la base de datos C503
define('SERVIDOR','localhost');
define('USUARIO','root');
define('PASSWORD','');
define('BD','sistema_ventas');


$servidor = "mysql:dbname=".BD.";host=".SERVIDOR;

try {

    $pdo = new PDO($servidor, USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    echo "Conexión exitosa a la base de datos C-503";

} catch (PDOException $e) {

    //print_r($e);
    echo "Error de conexión a la base de datos C-503 ";

}
