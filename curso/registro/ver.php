<?php
include_once("../../impresion/pdf.php");
$titulo="Datos de Curso";
$id=$_GET['id'];
class PDF extends PPDF{
	
}
include_once("../../class/curso.php");
$curso=new curso;
$cur=array_shift($curso->mostrar($id));




$pdf=new PDF("P","mm","letter");
$pdf->AddPage();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(35,"Nombre de Curso:",0,"",0,"B");
$pdf->CuadroCuerpoPersonalizado(120,$cur['nombre'],0,"",0,"");
$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(35,"Abreviado:",0,"",0,"B");
$pdf->CuadroCuerpoPersonalizado(50,$cur['abreviado'],0,"",0,"");
$pdf->Ln();
/*$foto="../foto/".$emp['foto'];
if(!empty($emp['foto']) && file_exists($foto)){
	$pdf->Image($foto,140,50,40,40);	
}
*/
$pdf->Output();
?>
