<?php

// Conexión a la base de datos en Railway usando variables de entorno
define('SERVIDOR', getenv("MYSQLHOST"));
define('USUARIO', getenv("MYSQLUSER"));
define('PASSWORD', getenv("MYSQLPASSWORD"));
define('BD', getenv("MYSQLDATABASE"));
define('PUERTO', getenv("MYSQLPORT"));

$servidor = "mysql:dbname=" . BD . ";host=" . SERVIDOR . ";port=" . PUERTO;

try {
    $pdo = new PDO($servidor, USUARIO, PASSWORD, array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
    ));
    // echo "Conexión exitosa a la base de datos en Railway";
} catch (PDOException $e) {
    echo "❌ Error de conexión a la base de datos: " . $e->getMessage();
}

$URL = "https://tu-proyecto-production.up.railway.app"; // cambia por la URL de Railway

date_default_timezone_set("America/Guatemala");
$fechaHora = date("Y-m-d h:i:s");

