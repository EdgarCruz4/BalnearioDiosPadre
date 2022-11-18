<?php
    require("../conexion.php");
    $query = "SELECT *, 
    DATE_FORMAT(fecha, '%d / %m / %Y') as fechaF 
    FROM cooperativa";
    $result = $conexion->query($query);
    $ar = array();
    foreach ($result as $key) {
        array_push($ar,[
            'id'=>$key['id'],
            'fecha'=>$key['fechaF'],
            'concepto'=>$key['concepto'],
            'solicitante'=>$key['solicitante'],
            'area'=>$key['area'],
            'estatus'=>$key['id_estatus']
        ]);
    }
    echo json_encode(array("response"=>"SUCCESS", "detail"=>$ar));
?>