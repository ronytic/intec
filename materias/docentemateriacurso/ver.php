<?php
include_once("../../impresion/pdf.php");
$titulo="Datos de Asignación Docente, Materia y Curso";
$id=$_GET['id'];
class PDF extends PPDF{
	
}
include_once("../../class/docentemateriacurso.php");
$docentemateriacurso=new docentemateriacurso;
$dmc=array_shift($docentemateriacurso->mostrar($id));

include_once("../../class/usuarios.php");
include_once("../../class/materia.php");
include_once("../../class/curso.php");
$usuarios=new usuarios;
$materia=new materia;
$curso=new curso;

$cur=array_shift($curso->mostrar($dmc['codcurso']));
$mat=array_shift($materia->mostrar($dmc['codmateria']));
$usu=array_shift($usuarios->mostrar($dmc['coddocente']));


$pdf=new PDF("P","mm","letter");
$pdf->AddPage();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(35,"Materia:",0,"",0,"B");
$pdf->CuadroCuerpoPersonalizado(120,$mat['nombre'],0,"",0,"");
$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(35,"Curso:",0,"",0,"B");
$pdf->CuadroCuerpoPersonalizado(120,$cur['nombre'],0,"",0,"");
$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(35,"Docente:",0,"",0,"B");
$pdf->CuadroCuerpoPersonalizado(120,$usu['nombre']." ".$usu['paterno']." ".$usu['materno'],0,"",0,"");
$pdf->Ln();
/*$foto="../foto/".$emp['foto'];
if(!empty($emp['foto']) && file_exists($foto)){
	$pdf->Image($foto,140,50,40,40);	
}
*/
$pdf->Output();
?>
