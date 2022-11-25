<?php
    session_start();
    if(isset($_SESSION['name'])){
        header("location: Frontend/cooperativa.php");
    }
    else{
        header("location: Frontend/login.php");
    }
?>