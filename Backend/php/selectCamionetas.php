<?php
    require("../conexion.php");
    $query = "SELECT id, conductor, camioneta, gasolina_cargada, id_estatus, actividad, 
    DATE_FORMAT(fecha, '%d / %m / %Y') as fecha,
    DATE_FORMAT(hora_salida, '  %r') as hora_salida,
    DATE_FORMAT(hora_entrega, '  %r') as hora_entrega  
    FROM `camionetas`;";
    $result = $conexion->query($query);
    $ar = array();
    foreach ($result as $key) {
        array_push($ar,[
            'id'=>$key['id'],
            'conductor'=>$key['conductor'],
            'camioneta'=>$key['camioneta'],
            'fecha'=>$key['fecha'],
            'hora_salida'=>$key['hora_salida'],
            'actividad'=>$key['actividad'],
            'hora_entrega'=>$key['hora_entrega'],
            'gasolina_cargada'=>$key['gasolina_cargada'],
            'estatus'=>$key['id_estatus'],
        ]);
    }
    echo json_encode(array("response"=>"SUCCESS", "detail"=>$ar));
?>

