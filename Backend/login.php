<?php
    include_once 'post.php';
    include '../Backend/conexion.php';
    error_reporting(0);
    session_start();
    
    $correo = $_POST['correo'];    
    $contraseña = $_POST['password'];

    //$has = md5($contraseña);

    $query = "SELECT * FROM almacenista WHERE contraseña = '$contraseña' AND correo = '$correo'";
    $result = mysqli_query($conexion,$query);

    if($result->num_rows > 0)
    {
        $user = $result->fetch_assoc();
        $user_id = $user['id'];
        $user_name = $user['nombre'];
        $_SESSION['name'] = $user_name;
        $_SESSION['name_id'] = $user_id;
        header("location:../Frontend/cooperativa.php");
    }
    else
    {
        header("location:../Frontend/login.php");
    }


?>