<?php
require('./fpdf/fpdf.php');
Class PDF extends FPDF
{

    function Header(){
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(60);
        $this->Cell(70,10,'Informe de Empleados',0,0,'C');
        $this->Ln(20);
    
        $this->Cell(70,10,'Nombre de empleado',1,0,'C',0);
        $this->Cell(60,10,'Nombre de encargado',1,0,'C',0);
        $this->Cell(60,10,'Numero de area',1,1,'C',0);
    }
}
include_once '../Controlador/Conexion.php';
$mysqli = new mysqli("localhost","root", "", "mesa.ayuda");
$consulta = "SELECT e.NOMBRE as NOMBRE_EMPLEADO, (SELECT NOMBRE FROM empleado WHERE IDEMPLEADO = e.fkEMPLE_JEFE) as NOMBRE_JEFE, a.NOMBRE as NOMBRE_AREA FROM empleado e LEFT JOIN area a
ON e.fkAREA = a.IDAREA;";
$resultado = $mysqli->query($consulta);



$pdf = new PDF();
$pdf -> AddPage();
$pdf -> SetFont('Arial', 'B', 16);
while($row = $resultado->fetch_assoc()){
    $pdf->Cell(70,10,utf8_decode($row['NOMBRE_EMPLEADO']), 1, 0, 'C',0);
    $pdf->Cell(60,10, $row['NOMBRE_JEFE'], 1, 0, 'C',0);
    $pdf->Cell(60,10, utf8_decode($row['NOMBRE_AREA']), 1, 1, 'C',0);
}
$pdf -> Output();

?>

