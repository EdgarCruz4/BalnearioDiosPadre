<?php 
    require("../conexion.php");
    $fecha=date("Y-m-d");
    $gasolina_cargada=$_POST['gasolina_cargada'];
    $conductor=$_POST['conductor'];
    $actividad=$_POST['actividad'];
    $query2 = "INSERT INTO `combustible` 
    (`fecha`, `combustible`, `solicitante`, `concepto`) 
    VALUES ('$fecha', '$gasolina_cargada', '$conductor', '$actividad')";
    $result2=mysqli_query($conexion, $query2);
    if (isset($result2)) {
        echo json_encode(array("response"=>"SUCCESS", "detail"=>"Se registro correctamente"));
    } else {
        echo json_encode(array("response"=>"ERROR", "detail"=>"No se registro"));
    }
?>