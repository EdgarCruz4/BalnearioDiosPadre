<?php
    require("../conexion.php");
    $fecha=date("Y-m-d");//date("Y-m-d H:i:s");
    $conductor="Harry Potter";//$_POST['conductor'];
    $camioneta="Elemento de camionetas";//$_POST['camioneta'];
    $hora_salida=date("H:i:s");
    $actividad="Conducir";//$_POST['actividad'];
    $gasolina_cargada="60 litros";//$_POST['gasolina_cargada'];
    $id_estatus=1;
    $query = "INSERT INTO `camionetas` 
    (`fecha`, `conductor`, `camioneta`, `hora_salida`, `actividad`, `gasolina_cargada`, `id_estatus`) 
    VALUES ('', '', '', '', '', '', '')";
    $result=mysqli_query($conexion, $query);
    if (isset($result)) {
        $query2 = "INSERT INTO `camionetas` 
        (`fecha`, `conductor`, `camioneta`, `hora_salida`, `actividad`, `gasolina_cargada`, `id_estatus`) 
        VALUES ('', '', '', '', '', '', '')";
        $result2=mysqli_query($conexion, $query2);
        if (isset($result2)) {
            echo json_encode(array("response"=>"SUCCESS", "detail"=>"Se registro correctamente"));
        } else {
            echo json_encode(array("response"=>"ERROR", "detail"=>"No se registro"));
        }
    } else {
        echo json_encode(array("response"=>"ERROR", "detail"=>"No se registro"));
    }
    
    
?>
