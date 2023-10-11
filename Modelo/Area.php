<?php
    include_once '../Controlador/Conexion.php';

    function registrarArea($id, $nombre, $idEmpleado){
        $con = ConectarBD();
        $query = "INSERT INTO area(IDAREA, NOMBRE, FKEMPLE) VALUES ('".$id."','".$nombre."','".$idEmpleado."')";
        try {
            $sql = mysqli_query($con, $query);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    function buscarArea($idArea){
        $con = ConectarBD();
        $query = "SELECT * FROM area WHERE IDAREA = '".$idArea."'";
        $sql = mysqli_query($con, $query);
        $data = mysqli_fetch_array($sql);
        return $data; 
    }

    function buscarAllArea(){
        $con = ConectarBD();
        $query = "SELECT * FROM area";
        $sql = mysqli_query($con, $query);
        return $sql; 
    }

    function actualizarArea($idArea, $nombre, $idEmpleado){
        $con = ConectarBD();
        $query = "UPDATE area SET IDAREA = '".$idArea."', NOMBRE = '".$nombre."', FKEMPLE = '".$idEmpleado."' WHERE IDAREA = '".$idArea."'";
        try {
            $sql = mysqli_query($con, $query);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    function eliminarArea($idArea){
        $con = ConectarBD();
        $query = "DELETE FROM area WHERE IDAREA = '".$idArea."'";
        try {
            $sql = mysqli_query($con, $query);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
?>