<?php
include_once("../../impresion/pdf.php");
$titulo="Datos de Materia";
$id=$_GET['id'];
class PDF extends PPDF{
	
}
include_once("../../class/materia.php");
$materia=new materia;
$mat=array_shift($materia->mostrar($id));




$pdf=new PDF("P","mm","letter");
$pdf->AddPage();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(35,"Nombre de Materia:",0,"",0,"B");
$pdf->CuadroCuerpoPersonalizado(120,$mat['nombre'],0,"",0,"");
$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(35,"Abreviado:",0,"",0,"B");
$pdf->CuadroCuerpoPersonalizado(50,$mat['abreviado'],0,"",0,"");
$pdf->Ln();
/*$foto="../foto/".$emp['foto'];
if(!empty($emp['foto']) && file_exists($foto)){
	$pdf->Image($foto,140,50,40,40);	
}
*/
$pdf->Output();
?>
