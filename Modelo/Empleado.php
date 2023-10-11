<?php
    include_once '../Controlador/Conexion.php';

    function registrarEmpleado($id, $nombre, $foto, $hojavida, $telefono, $email, $direccion, $x, $y, $idjefe, $idarea){
        $con = ConectarBD();
        $query = "INSERT INTO empleado(IDEMPLEADO, NOMBRE, FOTO, HOJAVIDA, TELEFONO, EMAIL, DIRECCION, X, Y, fkEMPLE_JEFE, fkAREA) VALUES ('".$id."','".$nombre."','".$foto."','".$hojavida."','".$telefono."','".$email."','".$direccion."','".$x."','".$y."','".$idjefe."','".$idarea."')";
        try {
            $sql = mysqli_query($con, $query);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
        
    }

    function buscarEmpleado($id){
        $con = ConectarBD();
        $query = "SELECT * FROM empleado WHERE IDEMPLEADO = '".$id."'";
        $sql = mysqli_query($con, $query);
        $data = mysqli_fetch_array($sql);
        return $data; 
    }

    function buscarAllEmpleado(){
        $con = ConectarBD();
        $query = "SELECT * FROM empleado";
        $sql = mysqli_query($con, $query);
        return $sql; 
    }

    function actualizarEmpleado($id, $nombre, $foto, $hojavida, $telefono, $email, $direccion, $x, $y, $idjefe, $idarea){
        $con = ConectarBD();
        $query = "UPDATE empleado SET IDEMPLEADO = '".$id."', NOMBRE = '".$nombre."', FOTO = '".$foto."', HOJAVIDA = '".$hojavida."', TELEFONO = '".$telefono."', EMAIL = '".$email."', DIRECCION = '".$direccion."', X = '".$x."' , Y = '".$y."', fkEMPLE_JEFE = '".$idjefe."', fkAREA = '".$idarea."' WHERE IDEMPLEADO = '".$id."'";
        try {
            $sql = mysqli_query($con, $query);
            return true;
        } catch (\Throwable $th) {
            echo 'Errrrr';
            return false;
        }
    }

    function eliminarEmpleado($id){
        $con = ConectarBD();
        $query = "DELETE FROM empleado WHERE IDEMPLEADO = '".$id."'";
        try {
            $sql = mysqli_query($con, $query);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
?>