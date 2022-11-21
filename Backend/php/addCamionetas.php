<?php
    require("../conexion.php");
    $fecha=date("Y-m-d");//date("Y-m-d H:i:s");
    $conductor=$_POST['conductor'];
    $camioneta=$_POST['camioneta'];
    $hora_salida=date("H:i:s");
    $actividad=$_POST['actividad'];
    $gasolina_cargada=$_POST['gasolina_cargada'];
    $id_estatus=1;
    session_start();
    $id_almacenista = $_SESSION['name_id'];
    $query = "INSERT INTO `camionetas` 
    (`fecha`, `conductor`, `camioneta`, `hora_salida`, `actividad`, `gasolina_cargada`, `id_estatus`, `id_almacenista`) 
    VALUES ('$fecha', '$conductor', '$camioneta', '$hora_salida', '$actividad', '$gasolina_cargada', '$id_estatus', '$id_almacenista')";
    $result=mysqli_query($conexion, $query);
    if (isset($result)) {
        echo json_encode(array("response"=>"SUCCESS", "detail"=>"Se registro correctamente"));
    } else {
        echo json_encode(array("response"=>"ERROR", "detail"=>"No se registro"));
    }
?>
