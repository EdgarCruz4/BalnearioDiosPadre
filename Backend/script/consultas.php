<?php
    class consultas
    {
        public function get_prestamos_renta($route)
        {
            require $route.'Backend/conexion.php';
            $query = "SELECT * FROM prestamos_rentas;";
            $result = $conexion->query($query);
            return $result;
        }
        public function session_star_menu(){
            session_start();
            $name = $_SESSION['name'];
            if(isset($name)){
                return $name;
            }
            else{
                header("location:../../index.php");
            }
        }
    }
?>