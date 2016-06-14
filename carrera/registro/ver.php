<?php
include_once("../../impresion/pdf.php");
$titulo="Datos de Curso";
$id=$_GET['id'];
class PDF extends PPDF{
	
}
include_once("../../class/carrera.php");
$carrera=new carrera;
$car=array_shift($carrera->mostrar($id));




$pdf=new PDF("P","mm","letter");
$pdf->AddPage();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(40,"Nombre de la Carrera:",0,"",0,"B");
$pdf->CuadroCuerpoPersonalizado(120,$car['nombre'],0,"",0,"");
$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(40,"Detalle:",0,"",0,"B");
$pdf->CuadroCuerpoPersonalizado(50,$car['detalle'],0,"",0,"");
$pdf->Ln();
/*$foto="../foto/".$emp['foto'];
if(!empty($emp['foto']) && file_exists($foto)){
	$pdf->Image($foto,140,50,40,40);	
}
*/
$pdf->Output();
?>
