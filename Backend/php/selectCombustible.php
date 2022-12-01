<?php
    require("../conexion.php");
    $query = "SELECT *, 
    DATE_FORMAT(fecha, '%d / %m / %Y') as fechaF 
    FROM combustible";
    $result = $conexion->query($query);
    $ar = array();
    foreach ($result as $key) {
        array_push($ar,[
            'id'=>$key['id'],
            'fecha'=>$key['fechaF'],
            'combustible'=>$key['combustible'],
            'solicitante'=>$key['solicitante'],
            'concepto'=>$key['concepto']
        ]);
    }
    echo json_encode(array("response"=>"SUCCESS", "detail"=>$ar));
?>