<?php
    include_once '../Controlador/Conexion.php';

    function registrarRequerimiento($observacion, $idArea, $idEmpleado){
        $con = ConectarBD();
        $idArea =str_replace(' ', '', $idArea);
        $idEmpleado =str_replace(' ', '', $idEmpleado);
        $query = "INSERT INTO `requerimiento` (`IDREQ`, `FKAREA`) VALUES (NULL,'$idArea')";
        try {
            $sql = mysqli_query($con, $query);
            try {
                $fechaActual = date('Y-m-d H:i:s');
                $idRequerimiento =  buscarRequerimiento($idArea);
                $query = "INSERT INTO `detallereq` (`IDDETALLE`, `FECHA`, `OBSERVACION`, `FKREQ`, `FKESTADO`, `FKEMPLE`, `FKEMPLEASIGNADO`) VALUES (NULL, '$fechaActual', '$observacion', '$idRequerimiento[0]','1','$idEmpleado',NULL)";
                $sql = mysqli_query($con, $query);
            } catch (\Throwable $th) {
                return false;
            }
            return true;
        } catch (\Throwable $th) {
            return false;
        }
        
    }


    function actualizarRequerimiento($id, $fecha, $idEs, $empleado){
        $con = ConectarBD();
        $idEs =str_replace(' ', '', $idEs);
        $empleado = str_replace(' ', '', $empleado);
        $query = "UPDATE detallereq SET FECHA = '".$fecha."', FKESTADO = '".$idEs."',FKEMPLEASIGNADO = '".$empleado."' WHERE IDDETALLE = '".$id."'";
        echo $query;
        try {
            $sql = mysqli_query($con, $query);
            return true;
        } catch (\Throwable $th) {
            return false;
        }

    }


    function buscarRequerimiento($idArea){
        $con = ConectarBD();
        $query = "SELECT * FROM requerimiento WHERE FKAREA = '".$idArea."'";
        $sql = mysqli_query($con, $query);
        $data = mysqli_fetch_array($sql);
        return $data; 
    }

    function buscarDetalleRequerimiento($id){
        $con = ConectarBD();
        $query = "SELECT * FROM detallereq WHERE IDDETALLE = '".$id."'";
        $sql = mysqli_query($con, $query);
        $data = mysqli_fetch_array($sql);
        return $data; 
    }

    function buscarAllEstdos(){
        $con = ConectarBD();
        $query = "SELECT * FROM estado";
        $sql = mysqli_query($con, $query);
        return $sql; 
    }

    function buscarRequerimientoId($id){
        $con = ConectarBD();
        $query = "SELECT * FROM requerimiento WHERE IDREQ = '".$id."'";
        $sql = mysqli_query($con, $query);
        $data = mysqli_fetch_array($sql);
        return $data;
    }

    function buscarEstadoId($id){
        $con = ConectarBD();
        $query = "SELECT * FROM estado WHERE IDESTADO = '".$id."'";
        $sql = mysqli_query($con, $query);
        $data = mysqli_fetch_array($sql);
        return $data;
    }

    function buscarEmpleadoId($id){
        $con = ConectarBD();
        $query = "SELECT * FROM empleado WHERE IDEMPLEADO = '".$id."'";
        $sql = mysqli_query($con, $query);
        $data = mysqli_fetch_array($sql);
        return $data;
    }
?>