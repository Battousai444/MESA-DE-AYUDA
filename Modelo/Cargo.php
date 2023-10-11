<?php
    include_once '../Controlador/Conexion.php';

    function registrarCargo($id, $nombre){
        $con = ConectarBD();
        $query = "INSERT INTO cargo(IDCARGO, NOMBRE) VALUES ('".$id."','".$nombre."')";
        try {
            $sql = mysqli_query($con, $query);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
        
    }

    function buscarCargo($id){
        $con = ConectarBD();
        $query = "SELECT * FROM cargo WHERE IDCARGO = '".$id."'";
        $sql = mysqli_query($con, $query);
        $data = mysqli_fetch_array($sql);
        return $data; 
    }

    function actualizarCargo($id, $nombre){
        $con = ConectarBD();
        $query = "UPDATE cargo SET IDCARGO = '".$id."', NOMBRE = '".$nombre."' WHERE IDCARGO = '".$id."'";
        try {
            $sql = mysqli_query($con, $query);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    function eliminarCargo($id){
        $con = ConectarBD();
        $query = "DELETE FROM cargo WHERE IDCARGO = '".$id."'";
        try {
            $sql = mysqli_query($con, $query);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
?>