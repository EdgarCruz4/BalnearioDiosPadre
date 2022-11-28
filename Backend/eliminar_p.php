<?php
    include 'conexion.php';
    include_once 'post.php';
    $id = $_POST['id']; 

    $query = "DELETE FROM `prestamos_rentas` WHERE `id` = '$id'";
    $result = mysqli_query($conexion,$query);
?>