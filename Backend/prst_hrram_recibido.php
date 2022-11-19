<?php
    include 'conexion.php';
    session_start();
    echo $name_id = $_SESSION['name_id'];
    echo $id = $_POST['id'];

    $query = "UPDATE `prestamos_rentas` SET `id_almacenista_recibe` = '$name_id' WHERE `id` = '$id';";

    $result = mysqli_query($conexion,$query);

    if(isset($result))
    {
        header("location:../Frontend/prst_hrram.php");
    }
    else{
        echo 'mal';
    }
?>