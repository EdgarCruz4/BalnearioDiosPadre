<?php
    require("../conexion.php");
    $id=$_POST['id'];
    $query = "DELETE FROM `camionetas` 
    WHERE `camionetas`.`id` = '$id'";
    $result=mysqli_query($conexion, $query);
    if (isset($result)) {
        echo json_encode(array("response"=>"SUCCESS", "detail"=>"El sregistro ha sido eliminado"));
    } else {
        echo json_encode(array("response"=>"ERROR", "detail"=>"No se registro"));
    }
    
    
?>
