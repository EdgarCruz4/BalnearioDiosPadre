<?php
    class consultas
    {
        public function get_prestamos_renta($route)
        {
            require $route.'Backend/conexion.php';
            $today = date('Y-m-d');
            $days_ago = date("Y-m-d", strtotime($today."- 30 days"));
            $query = "SELECT * FROM prestamos_rentas WHERE fecha >'$days_ago';";
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
                header("location:../index.php");
            }
        }
    }
?>