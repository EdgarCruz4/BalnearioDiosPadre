<?php
    require("../conexion.php");
    $query = "SELECT * FROM estatus";
    $result = $conexion->query($query);
    $ar = array();
    foreach ($result as $key) {
        array_push($ar,[
            'id'=>$key['id'],
            'estatus'=>$key['estatus']
        ]);
    }
    echo json_encode($ar);
?>
