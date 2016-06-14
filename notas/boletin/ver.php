<?php
include_once("../../impresion/pdf.php");
$titulo="Boletín de Notas";
$id=$_GET['id'];

include_once("../../class/alumno.php");
$alumno=new alumno;
$a=array_shift($alumno->mostrar($id));

include_once("../../class/carrera.php");
$carrera=new carrera;
$car=array_shift($carrera->mostrar($a['codcarrera']));

include_once("../../class/grupo.php");
$grupo=new grupo;
$gru=array_shift($grupo->mostrar($a['codgrupo']));
include_once("../../class/notas.php");
$notas=new notas;

class PDF extends PPDF{
	function Cabecera(){
		global $a,$car,$gru;
		$this->Ln();
		$this->CuadroCabecera(20,"Nombre:",45,capitalizar($a['paterno']." ".$a['materno']." ".$a['nombres']),0);
		$this->CuadroCabecera(15,"Carrera:",50,capitalizar($car['nombre']),0);
        $this->CuadroCabecera(15,"Grupo:",50,capitalizar($gru['nombregrupo']),0);
		$this->Ln();
		$this->Ln();
		//$this->TituloCabecera(5,"N");
		//$this->TituloCabecera(50,"Área");
        
        
		/*$this->TituloCabecera(20,"Asis - 10");
        $this->TituloCabecera(20,"Práct. - 40");
        $this->TituloCabecera(20,"Inves. - 20");
        $this->TituloCabecera(20,"Ctrl Lec - 10");
        $this->TituloCabecera(20,"Eval. - 20");
        $this->TituloCabecera(20,"Nota");
        $this->TituloCabecera(20,"2 Turno");
        $this->TituloCabecera(20,"N Final");
        $this->TituloCabecera(20,"Nota Final");*/
        $this->TituloCabecera(35,"Area");
        $this->TituloCabecera(25,"Nota");
	}	
}

$pdf=new PDF("P","mm","letter");
$pdf->AddPage();
$i=0;
$pdf->ln(5);
	//$pdf->CuadroCuerpo(10,$i,"","R",1);
	//$pdf->CuadroCuerpo(50,$mat['nombre'],"","",1);

	$n=array_shift($notas->mostrarTodo("codgrupo=".$a['codgrupo']."  and codalumno=".$id));
    $pdf->CuadroCuerpo(35,'Asistencia',"","",1);
    $pdf->CuadroCuerpo(25,$n['asistencia'],"","R",1);$pdf->ln();
	
    $pdf->CuadroCuerpo(35,'Práctica',"","",1);
    $pdf->CuadroCuerpo(25,$n['practica'],"","R",1);$pdf->ln();
    
    $pdf->CuadroCuerpo(35,'Investigación',"","",1);
    $pdf->CuadroCuerpo(25,$n['investigacion'],"","R",1);$pdf->ln();
    
    $pdf->CuadroCuerpo(35,'Contrl de Lectura',"","",1);
    $pdf->CuadroCuerpo(25,$n['controllectura'],"","R",1);$pdf->ln();
    
    $pdf->CuadroCuerpo(35,'Evaluación',"","",1);
    $pdf->CuadroCuerpo(25,$n['evaluacion'],"","R",1);$pdf->ln();
    
    $pdf->CuadroCuerpo(35,'Nota',1,"",1);
    $pdf->CuadroCuerpo(25,$n['nota'],1,"R",1);$pdf->ln();
    
    $pdf->CuadroCuerpo(35,'Segundo Turno',"","",1);
    $pdf->CuadroCuerpo(25,$n['turno2'],"","R",1);$pdf->ln();
    
    $pdf->CuadroCuerpo(35,'Nota Final',1,"",1);
	$pdf->CuadroCuerpo(25,$n['notafinal'],($n['notafinal']<51?1:0),"R",1);
	$pdf->Ln();



$pdf->Output();
?>