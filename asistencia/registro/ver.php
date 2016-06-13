<?php
include_once("../../impresion/pdf.php");
$titulo="Registro de Asistencia";
$codcurso=$_GET['codcurso'];
$fechaasistencia=$_GET['fechaasistencia'];
class PDF extends PPDF{
	function Cabecera(){
		global $cur,$fechaasistencia;
		$this->CuadroCabecera(15,"Curso:",30,$cur['nombre']);
		$this->CuadroCabecera(38,"Fecha de Asistencia:",15,fecha2Str($fechaasistencia));
		$this->Ln();
		$this->TituloCabecera(10,"N");
		$this->TituloCabecera(30,"Paterno");
		$this->TituloCabecera(30,"Materno");
		$this->TituloCabecera(40,"Nombres");
		$this->TituloCabecera(25,"Asistencia");
		$this->TituloCabecera(25,"Falta");
		$this->TituloCabecera(25,"Licencia");
	}	
}

include_once("../../class/alumno.php");
$alumno=new alumno;
$a=array_shift($alumno->mostrar($id));

include_once("../../class/curso.php");
$curso=new curso;
$cur=array_shift($curso->mostrar($codcurso));

include_once("../../class/asistencia.php");
$asistencia=new asistencia;

$pdf=new PDF("P","mm",array(216, 330));
$pdf->AddPage();
$i=0;
foreach($alumno->mostrarTodo("codcurso=".$codcurso) as $a){$i++;
	$asis=$asistencia->mostrarTodo("codcurso=".$codcurso." and codalumno=".$a['codalumno']." and fechaasistencia='".$fechaasistencia."'");
	$asis=array_shift($asis);
	
	$pdf->CuadroCuerpo(10,$i,0,"R",1);
	$pdf->CuadroCuerpo(30,$a['paterno'],0,"",1);
	$pdf->CuadroCuerpo(30,$a['materno'],0,"",1);
	$pdf->CuadroCuerpo(40,$a['nombres'],0,"",1);
	$pdf->CuadroCuerpo(25,$asis['estado']=='asistencia'?'SI':'',0,"C",1);
	$pdf->CuadroCuerpo(25,$asis['estado']=='falta'?'SI':'',0,"C",1);
	$pdf->CuadroCuerpo(25,$asis['estado']=='licencia'?'SI':'',0,"C",1);
	$pdf->Ln();
}
$pdf->Output();
?>