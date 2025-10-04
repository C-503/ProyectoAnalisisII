<?php

    $sql_ventas = "SELECT * FROM tb_ventas";
                   
    $query_ventas = $pdo->prepare($sql_ventas);
    $query_ventas->execute();
    $datos_ventas = $query_ventas->fetchAll(PDO::FETCH_ASSOC);