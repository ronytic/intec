<?php
include_once("../../impresion/pdf.php");
$titulo="Boletín de Notas";
$id=$_GET['id'];

include_once("../../class/alumno.php");
$alumno=new alumno;
$a=array_shift($alumno->mostrar($id));

include_once("../../class/curso.php");
$curso=new curso;
$cur=array_shift($curso->mostrar($a['codcurso']));

include_once("../../class/docentemateriacurso.php");
$docentemateriacurso=new docentemateriacurso;

include_once("../../class/materia.php");
$materia=new materia;

include_once("../../class/notas.php");
$notas=new notas;

class PDF extends PPDF{
	function Cabecera(){
		global $a,$cur;
		$this->Ln();
		$this->CuadroCabecera(25,"Nombre:",60,capitalizar($a['paterno']." ".$a['materno']." ".$a['nombres']),0);
		$this->CuadroCabecera(25,"Curso:",50,capitalizar($cur['nombre']),0);
		$this->Ln();
		$this->Ln();
		$this->TituloCabecera(10,"N");
		$this->TituloCabecera(50,"Materia");
		for($j=1;$j<=4;$j++){
			$this->TituloCabecera(25,$j."º Bimestre");
    	}
        $this->TituloCabecera(20,"Nota Final");
	}	
}

$pdf=new PDF("P","mm","letter");
$pdf->AddPage();
$i=0;
foreach($docentemateriacurso->mostrarTodo("codcurso=".$a['codcurso']) as $dmc){$i++;
	$mat=array_shift($materia->mostrar($dmc['codmateria']));
	$pdf->CuadroCuerpo(10,$i,"","R",1);
	$pdf->CuadroCuerpo(50,$mat['nombre'],"","",1);
	    $n=array_shift($notas->mostrarTodo("coddocentemateriacurso=".$dmc['coddocentemateriacurso']."  and codalumno=".$id));
	$pdf->CuadroCuerpo(25,$n['bimestre1'],"","C",1);
    $pdf->CuadroCuerpo(25,$n['bimestre2'],"","C",1);
    $pdf->CuadroCuerpo(25,$n['bimestre3'],"","C",1);
    $pdf->CuadroCuerpo(25,$n['bimestre4'],"","C",1);
	$pdf->CuadroCuerpo(20,$n['notafinal'],($n['notafinal']<51?1:0),"C",1);
	$pdf->Ln();
}


$pdf->Output();
?>