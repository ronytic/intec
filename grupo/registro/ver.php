<?php
include_once("../../impresion/pdf.php");
$titulo="Datos del Grupo";
$id=$_GET['id'];
class PDF extends PPDF{
	
}
include_once("../../class/grupo.php");
$grupo=new grupo;
$gr=array_shift($grupo->mostrar($id));

include_once("../../class/carrera.php");
    $carrera=new carrera;
    
    include_once("../../class/usuarios.php");
    $usuarios=new usuarios;

$car=array_shift($carrera->mostrarTodo("codcarrera=".$gr['codcarrera'],"nombre"));
$us=array_shift($usuarios->mostrarTodo("nivel=3 and codusuarios=".$gr['coddocente'],"nombre"));
$pdf=new PDF("P","mm","letter");
$pdf->AddPage();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(35,"Nombre del Grupo:",0,"",0,"B");
$pdf->CuadroCuerpoPersonalizado(120,$gr['nombregrupo'],0,"",0,"");
$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(35,"Detalle del grupo:",0,"",0,"B");
$pdf->CuadroCuerpoPersonalizado(50,$gr['detallegrupo'],0,"",0,"");
$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(35,"Hora Inicio:",0,"",0,"B");
$pdf->CuadroCuerpoPersonalizado(50,$gr['horainicio'],0,"",0,"");
$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(35,"Hora Final:",0,"",0,"B");
$pdf->CuadroCuerpoPersonalizado(50,$gr['horafinal'],0,"",0,"");
$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(35,"Carrera:",0,"",0,"B");
$pdf->CuadroCuerpoPersonalizado(50,$car['nombre'],0,"",0,"");
$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(35,"Docente:",0,"",0,"B");
$pdf->CuadroCuerpoPersonalizado(50,$us['paterno']." ".$us['materno']." ".$us['nombre'],0,"",0,"");
$pdf->Ln();
/*$foto="../foto/".$emp['foto'];
if(!empty($emp['foto']) && file_exists($foto)){
	$pdf->Image($foto,140,50,40,40);	
}
*/
$pdf->Output();
?>
