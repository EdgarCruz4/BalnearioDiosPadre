<?php
    include 'conexion.php';
    include_once 'post.php';
    session_start();

    echo $usuario_actual = $_SESSION['name'];
    echo $nombre = $_POST['name'].' '.$_POST['apellido'];

    $query = "UPDATE `almacenista` SET `nombre` = '$nombre' WHERE `nombre` = '$usuario_actual';";
    $result = mysqli_query($conexion,$query);

    if(isset($result)){
        session_destroy();
        header("location:../index.php");
        exit();
    }else{
        echo 'error';
    }

?>