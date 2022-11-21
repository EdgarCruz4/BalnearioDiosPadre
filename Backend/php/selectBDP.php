<?php
    require("../conexion.php");
    $query = "SELECT *, 
    DATE_FORMAT(fecha, '%d / %m / %Y') as fechaF 
    FROM bodega";
    $result = $conexion->query($query);
    $ar = array();
    foreach ($result as $key) {
        array_push($ar,[
            'fecha'=>$key['fechaF'],
            'material'=>$key['material'],
            'solicitante'=>$key['solicitante'],
            'area'=>$key['area']
        ]);
    }
    echo json_encode(array("response"=>"SUCCESS", "detail"=>$ar));
?>