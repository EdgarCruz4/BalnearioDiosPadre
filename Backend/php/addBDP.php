<?php 
    require("../conexion.php");
    $fecha=date("Y-m-d");//date("Y-m-d H:i:s");
    $material=$_POST['material'];
    $solicitante=$_POST['solicitante'];
    $area=$_POST['area'];    
    $id_estatus=1;
    session_start();
    $id_almacenista = $_SESSION['id_almacenista'];
    $query2 = "INSERT INTO `bodega` 
    (`fecha`, `material`, `solicitante`, `area`, `id_estatus`, `id_almacenista`) 
    VALUES ('$fecha', '$material', '$solicitante', '$area', '$id_almacenista', '$id_estatus')";
    $result2=mysqli_query($conexion, $query2);
    if (isset($result2)) {
        echo json_encode(array("response"=>"SUCCESS", "detail"=>"Se registro correctamente"));
    } else {
        echo json_encode(array("response"=>"ERROR", "detail"=>"No se registro"));
    }
?>