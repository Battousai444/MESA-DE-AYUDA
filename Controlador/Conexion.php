<?php
    function ConectarBD(){
        $host="localhost";
        $user="root";
        $pass="";

        $bd="mesa.ayuda";

        $con=mysqli_connect($host, $user, $pass);
        mysqli_select_db($con, $bd);

        return $con;
    }
?>