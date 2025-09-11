<?php

    $sql_compras = "SELECT *, 
                    pro.codigo as codigo, pro.nombre as nombre_producto, 
                    pro.descripcion as descripcion_producto, pro.stock as stock_producto,
                    pro.stock_minimo as stock_minimo_producto, pro.stock_maxino as stock_maxino_producto, 
                    pro.precio_compra as precio_compra, pro.precio_venta as precio_venta, pro.fecha_ingreso as fecha_ingreso,
                    pro.imagen as imagen_producto
                    FROM tb_compras as co INNER JOIN tb_almacen as pro 
    ON co.id_producto = pro.id_producto ";
    $query_compras = $pdo->prepare($sql_compras);
    $query_compras->execute();
    $datos_compras = $query_compras->fetchAll(PDO::FETCH_ASSOC);