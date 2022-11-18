<?php
    require("../conexion.php");
    $fecha=date("Y-m-d");//date("Y-m-d H:i:s");
    $material="Elemento de bodega";//$_POST['material'];
    $solicitante="Harry Potter";//$_POST['solicitante'];
    $area="Recursos humanos";//$_POST['area'];
    $id_estatus=1;
    $query = "INSERT INTO `bodega` 
    (`fecha`, `material`, `solicitante`, `area`, `id_estatus`) 
    VALUES ('$fecha', '$material', '$solicitante', '$area', '$id_estatus')";
    $result=mysqli_query($conexion, $query);
    if (isset($result)) {
        echo json_encode(array("response"=>"SUCCESS", "detail"=>"Se registro correctamente"));
    } else {
        echo json_encode(array("response"=>"ERROR", "detail"=>"No se registro"));
    }
    
    
?>
