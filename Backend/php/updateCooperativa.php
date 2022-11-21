<?php
    require("../conexion.php");
    $id=$_POST['id'];
    $id_estatus=2;
    $query = "UPDATE `cooperativa` 
    SET `id_estatus` = '$id_estatus' 
    WHERE `id` = '$id'";
    $result=mysqli_query($conexion, $query);
    if (isset($result)) {
        echo json_encode(array("response"=>"SUCCESS", "detail"=>"Se actualizó correctamente"));
    } else {
        echo json_encode(array("response"=>"ERROR", "detail"=>"No se registro"));
    }
    
    
?>
