<?php
include_once("../../impresion/pdf.php");
$titulo="Registro de Asistencia";
$codcarrera=$_GET['codcarrera'];
$codgrupo=$_GET['codgrupo'];
$fechaasistencia=$_GET['fechaasistencia'];
class PDF extends PPDF{
	function Cabecera(){
		global $car,$gru,$fechaasistencia;
		$this->CuadroCabecera(15,"Carrera:",30,$car['nombre']);
        $this->CuadroCabecera(15,"Grupo:",30,$gru['nombregrupo']);
        $this->CuadroCabecera(10,"Hora:",30,$gru['horainicio']."-".$gru['horafinal']);
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

include_once("../../class/carrera.php");
$carrera=new carrera;
$car=array_shift($carrera->mostrar($codcarrera));

include_once("../../class/grupo.php");
$grupo=new grupo;
$gru=array_shift($grupo->mostrar($codgrupo));

include_once("../../class/asistencia.php");
$asistencia=new asistencia;

$pdf=new PDF("P","mm",array(216, 330));
$pdf->AddPage();
$i=0;
$ta=0;
$tf=0;
$tl=0;
foreach($alumno->mostrarTodo("codgrupo=".$codgrupo) as $a){$i++;
	$asis=$asistencia->mostrarTodo("codgrupo=".$codgrupo." and codalumno=".$a['codalumno']." and fechaasistencia='".$fechaasistencia."'");
	$asis=array_shift($asis);
	
    if($asis['estado']=='asistencia'){$ta++;}
    if($asis['estado']=='falta'){$tf++;}
    if($asis['estado']=='licencia'){$tl++;}
    
	$pdf->CuadroCuerpo(10,$i,0,"R",1);
	$pdf->CuadroCuerpo(30,$a['paterno'],0,"",1);
	$pdf->CuadroCuerpo(30,$a['materno'],0,"",1);
	$pdf->CuadroCuerpo(40,$a['nombres'],0,"",1);
	$pdf->CuadroCuerpo(25,$asis['estado']=='asistencia'?'SI':'',0,"C",1);
	$pdf->CuadroCuerpo(25,$asis['estado']=='falta'?'SI':'',0,"C",1);
	$pdf->CuadroCuerpo(25,$asis['estado']=='licencia'?'SI':'',0,"C",1);
	$pdf->Ln();
}
$pdf->CuadroCuerpoPersonalizado(110,"Total",1,"R",1,"B");
$pdf->CuadroCuerpoPersonalizado(25,"$ta",1,"C",1,"B");
$pdf->CuadroCuerpoPersonalizado(25,"$tf",1,"C",1,"B");
$pdf->CuadroCuerpoPersonalizado(25,"$tl",1,"C",1,"B");
$pdf->Output();
?>