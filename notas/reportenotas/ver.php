<?php
include_once("../../impresion/pdf.php");
$titulo="Reporte de Notas";
$codcarrera=$_GET['codcarrera'];
$codgrupo=$_GET['codgrupo'];

include_once("../../class/alumno.php");
$alumno=new alumno;

include_once("../../class/carrera.php");
$carrera=new carrera;
$car=array_shift($carrera->mostrar($codcarrera));

include_once("../../class/grupo.php");
$grupo=new grupo;
$gru=array_shift($grupo->mostrar($codgrupo));

include_once("../../class/notas.php");
$notas=new notas;

include_once("../../class/usuarios.php");
$usuarios=new usuarios;
$usu=array_shift($usuarios->mostrarTodo("codusuarios=".$gru['coddocente']));

class PDF extends PPDF{
	function Cabecera(){
		global $gru,$car,$usu;
		$this->Ln();
		$this->CuadroCabecera(20,"Carrera:",50,capitalizar($car['nombre']),0);
	    $this->CuadroCabecera(15,"Grupo:",50,capitalizar($gru['nombregrupo']),0);
        $this->CuadroCabecera(18,"Docente:",50,capitalizar($usu['paterno']." ".$usu['materno']." ".$usu['nombre']),0);
		$this->Ln();
		$this->Ln();
		$this->TituloCabecera(10,"N");
		$this->TituloCabecera(20,"Paterno");
		$this->TituloCabecera(20,"Materno");
		$this->TituloCabecera(30,"Nombres");
		$this->TituloCabecera(20,"Asis - 10");
        $this->TituloCabecera(20,"Práct. - 40");
        $this->TituloCabecera(20,"Inves. - 20");
        $this->TituloCabecera(20,"Ctrl Lec - 10");
        $this->TituloCabecera(20,"Eval. - 20");
        $this->TituloCabecera(20,"Nota");
        $this->TituloCabecera(20,"2 Turno");
        $this->TituloCabecera(20,"N Final");
	}	 
}

$pdf=new PDF("L","mm","letter");
$pdf->AddPage();
$i=0;
foreach($alumno->mostrarTodo("codgrupo=".$codgrupo,"paterno,materno,nombres") as $al){$i++;
	$pdf->CuadroCuerpo(10,$i,"","R",1);
	$pdf->CuadroCuerpo(20,capitalizar($al['paterno']),"","",1);
	$pdf->CuadroCuerpo(20,capitalizar($al['materno']),"","",1);
	$pdf->CuadroCuerpo(30,capitalizar($al['nombres']),"","",1);
	
		
	//$pdf->CuadroCuerpo(15,$mat['nombre'],"","",1);
	$n=array_shift($notas->mostrarTodo("codgrupo=".$codgrupo." and codalumno=".$al['codalumno']));
	$pdf->CuadroCuerpo(20,$n['asistencia'],"","R",1);
    $pdf->CuadroCuerpo(20,$n['practica'],"","R",1);
    $pdf->CuadroCuerpo(20,$n['investigacion'],"","R",1);
    $pdf->CuadroCuerpo(20,$n['controllectura'],"","R",1);
    $pdf->CuadroCuerpo(20,$n['evaluacion'],"","R",1);
    $pdf->CuadroCuerpoPersonalizado(20,$n['nota'],1,"R",1,"B");
    $pdf->CuadroCuerpo(20,$n['turno2'],"","R",1);
    $pdf->CuadroCuerpoPersonalizado(20,$n['notafinal'],1,"R",1,"B");
		
	$pdf->Ln();
}

$pdf->Output("Reporte de Notas.pdf","I");
?>