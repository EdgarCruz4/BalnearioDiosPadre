<?php
    include_once 'post.php';
    include 'conexion.php';

    $fecha  = $_POST['fecha'];
    $material  = $_POST['material'];
    $nombre  = $_POST['nombre'];
    $entrega  = $_POST['entrega']; //falta agregar variable
    $area  = $_POST['area'];

    $query = "INSERT INTO `prestamos_rentas` (`fecha`, `material-obserbaciones`, `solicitante`, `id_almacenista_entrega`, `area`, `id_estatus`) 
    VALUES ( '$fecha', '$material', '$nombre', '1', '$area', '1');";

    $result = mysqli_query($conexion,$query);
    
    if(isset($result)){
        header("location:../Frontend/prst_hrram.php");
    }  
    else{
        echo 'Error';
    }
?>