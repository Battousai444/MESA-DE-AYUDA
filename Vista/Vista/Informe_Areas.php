<?php
require('./fpdf/fpdf.php');
Class PDF extends FPDF
{

    function Header(){
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(60);
        $this->Cell(70,10,'Informe de Areas',0,0,'C');
        $this->Ln(20);
    
        $this->Cell(70,10,'Nombre de area',1,0,'C',0);
        $this->Cell(60,10,'Nombre de encargado',1,0,'C',0);
        $this->Cell(60,10,'Numero de empleados',1,1,'C',0);
    }
}
include_once '../Controlador/Conexion.php';
$mysqli = new mysqli("localhost","root", "", "mesa.ayuda");
$consulta = "SELECT a.NOMBRE as NOMBRE_AREA, e.NOMBRE as NOMBRE_ENCARGADO, (SELECT COUNT(*) FROM empleado WHERE fkArea = a.IDAREA) as NUMERO_EMPLEADOS  FROM area a LEFT JOIN empleado e ON a.FKEMPLE = e.IDEMPLEADO";
$resultado = $mysqli->query($consulta);



$pdf = new PDF();
$pdf -> AddPage();
$pdf -> SetFont('Arial', 'B', 16);
while($row = $resultado->fetch_assoc()){
    $pdf->Cell(70,10,utf8_decode($row['NOMBRE_AREA']), 1, 0, 'C',0);
    $pdf->Cell(60,10, $row['NOMBRE_ENCARGADO'], 1, 0, 'C',0);
    $pdf->Cell(60,10, $row['NUMERO_EMPLEADOS'], 1, 1, 'C',0);
}
$pdf -> Output();

?>

