<?php
include_once("../../impresion/pdf.php");
$titulo="Reporte de Notas";
$bimestre=$_GET['bimestre'];
$codcurso=$_GET['codcurso'];

include_once("../../class/alumno.php");
$alumno=new alumno;

include_once("../../class/curso.php");
$curso=new curso;
$cur=array_shift($curso->mostrar($codcurso));

include_once("../../class/docentemateriacurso.php");
$docentemateriacurso=new docentemateriacurso;

include_once("../../class/materia.php");
$materia=new materia;

include_once("../../class/notas.php");
$notas=new notas;

class PDF extends PPDF{
	function Cabecera(){
		global $bimestre,$cur,$docentemateriacurso,$materia,$codcurso;
		$this->Ln();
		$this->CuadroCabecera(25,"Curso:",50,capitalizar($cur['nombre']),0);
	    $this->CuadroCabecera(25,"Bimestre:",50,capitalizar($bimestre),0);
		$this->Ln();
		$this->Ln();
		$this->TituloCabecera(10,"N");
		$this->TituloCabecera(20,"Paterno");
		$this->TituloCabecera(20,"Materno");
		$this->TituloCabecera(30,"Nombres");
		foreach($docentemateriacurso->mostrarTodo("codcurso=".$codcurso) as $dmc){
			$mat=array_shift($materia->mostrar($dmc['codmateria']));
			//$this->TituloCabecera(10,"Nota".$j);
			//$this->TituloCabecera(10,"DPS".$j);
			$this->TituloCabecera(10,$mat['abreviado']);
		}
	}	 
}

$pdf=new PDF("L","mm","letter");
$pdf->AddPage();
$i=0;
foreach($alumno->mostrarTodo("codcurso=".$codcurso,"paterno,materno,nombres") as $al){$i++;
	$pdf->CuadroCuerpo(10,$i,"","R",1);
	$pdf->CuadroCuerpo(20,capitalizar($al['paterno']),"","",1);
	$pdf->CuadroCuerpo(20,capitalizar($al['materno']),"","",1);
	$pdf->CuadroCuerpo(30,capitalizar($al['nombres']),"","",1);
	foreach($docentemateriacurso->mostrarTodo("codcurso=".$codcurso) as $dmc){
		$mat=array_shift($materia->mostrar($dmc['codmateria']));
		
		//$pdf->CuadroCuerpo(15,$mat['nombre'],"","",1);
		$n=array_shift($notas->mostrarTodo("coddocentemateriacurso=".$dmc['coddocentemateriacurso']." and codalumno=".$al['codalumno']));
			//$pdf->CuadroCuerpo(10,$n['nota'],"","R",1);
			//$pdf->CuadroCuerpo(10,$n['dps'],"","R",1);
			$pdf->CuadroCuerpo(10,$n['bimestre'.$bimestre],"","R",1);
		
	}
	$pdf->Ln();
}

$pdf->Output("Reporte de Notas.pdf","I");
?>