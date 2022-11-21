<?php
    require("../conexion.php");
    $id=$_POST['id'];
    $id_estatus=2;
    $hora_entrega=date("H:i:s");
    $query = "UPDATE `camionetas` 
    SET `id_estatus` = '$id_estatus', `hora_entrega` = '$hora_entrega'
    WHERE `id` = '$id'";
    $result=mysqli_query($conexion, $query);
    if (isset($result)) {
        echo json_encode(array("response"=>"SUCCESS", "detail"=>"Se actualizó correctamente"));
    } else {
        echo json_encode(array("response"=>"ERROR", "detail"=>"No se registro"));
    }
    
    
?>
