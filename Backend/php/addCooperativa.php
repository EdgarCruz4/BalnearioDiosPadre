<?php
    require("../conexion.php");
    $fecha=date("Y-m-d");//date("Y-m-d H:i:s");
    $concepto=$_POST['concepto'];
    $solicitante=$_POST['solicitante'];
    $area=$_POST['area'];
    $id_estatus=1;
    $query = "INSERT INTO cooperativa 
    (fecha, concepto, solicitante, area, id_estatus) 
    VALUES ('$fecha', '$concepto', '$solicitante', '$area', '$id_estatus')";
    $result=mysqli_query($conexion, $query);
    if (isset($result)) {
        echo json_encode(array("response"=>"SUCCESS", "detail"=>"Se registro correctamente"));
    } else {
        echo json_encode(array("response"=>"ERROR", "detail"=>"No se registro"));
    }
    
    
?>
