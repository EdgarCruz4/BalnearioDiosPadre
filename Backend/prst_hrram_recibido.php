<?php
    include 'conexion.php';
    session_start();
    $name = $_SESSION['name'];
    $id = $_POST['id'];

    $query = "UPDATE `prestamos_rentas` SET `almacenista_recibe` = '$name', id_estatus = 2 WHERE `id` = '$id';";

    $result = mysqli_query($conexion,$query);
?>