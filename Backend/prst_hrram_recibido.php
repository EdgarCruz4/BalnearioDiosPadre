<?php
    include 'conexion.php';
    session_start();
    echo $name = $_SESSION['name'];
    echo $id = $_POST['id'];

    $query = "UPDATE `prestamos_rentas` SET `almacenista_recibe` = '$name', id_estatus = 2 WHERE `id` = '$id';";

    $result = mysqli_query($conexion,$query);

    if(isset($result))
    {
        header("location:../Frontend/prst_hrram.php");
    }
    else{
        echo 'error';
    }
?>