<?php
    include 'conexion.php';

    echo $fecha  = $_POST['fecha'];
    echo $material  = $_POST['material'];
    echo $nombre  = $_POST['nombre'];
    echo $entrega  = $_POST['entrega']; //falta agregar variable
    echo $area  = $_POST['area'];

    $query = "INSERT INTO `prestamos_rentas` (`fecha`, `material-obserbaciones`, `solicitante`, `almacenista_entrega`, `area`, `id_estatus`) 
    VALUES ( '$fecha', '$material', '$nombre', '$entrega', '$area', '1');";

    $result = mysqli_query($conexion,$query);
?>