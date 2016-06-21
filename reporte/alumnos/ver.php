<?php
include_once("../../impresion/pdf.php");
$titulo="Reporte de Alumnos";
$codcarrera=$_GET['codcarrera'];
$codgrupo=$_GET['codgrupo'];
extract($_GET);
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

/*include_once("../../class/usuarios.php");
$usuarios=new usuarios;
$usu=array_shift($usuarios->mostrarTodo("codusuarios=".$gru['coddocente']));*/
$codcarrera=$codcarrera?"codcarrera='$codcarrera'":"codcarrera LIKE '%'";
    $codgrupo=$codgrupo?"codgrupo='$codgrupo'":"codgrupo LIKE '%'";
	$sexo=$sexo!=""?"sexo LIKE '$sexo'":"sexo LIKE '%'";
class PDF extends PPDF{
	function Cabecera(){
		global $gru,$car,$usu;
		$this->Ln();
		$this->CuadroCabecera(20,"Carrera:",50,capitalizar($car['nombre']),0);
	    $this->CuadroCabecera(15,"Grupo:",50,capitalizar($gru['nombregrupo']),0);
        
		$this->Ln();
		$this->Ln();
		$this->TituloCabecera(10,"N");
		$this->TituloCabecera(20,"Paterno");
		$this->TituloCabecera(20,"Materno");
		$this->TituloCabecera(30,"Nombres");
		$this->TituloCabecera(20,"FechaNac");
        $this->TituloCabecera(15,"C.I.");
        $this->TituloCabecera(10,"Sexo");
        $this->TituloCabecera(20,"Celular");
        $this->TituloCabecera(20,"Teléfono");
        $this->TituloCabecera(20,"Matricula");
        $this->TituloCabecera(20,"Mensualidad",9);
        $this->TituloCabecera(40,"Dirección");
	}	 
}

$pdf=new PDF("L","mm","letter");
$pdf->AddPage();
$i=0;
foreach($alumno->mostrarTodo("paterno LIKE '%$paterno%' and materno LIKE '%$materno%' and nombres LIKE '%$nombres%' and $sexo and $codcarrera and $codgrupo","paterno,materno,nombres,codcarrera,codgrupo") as $al){$i++;
	$pdf->CuadroCuerpo(10,$i,"","R",1);
	$pdf->CuadroCuerpo(20,capitalizar($al['paterno']),"","",1);
	$pdf->CuadroCuerpo(20,capitalizar($al['materno']),"","",1);
	$pdf->CuadroCuerpo(30,capitalizar($al['nombres']),"","",1);

	$pdf->CuadroCuerpo(20,$al['fechanac'],"","R",1);
    $pdf->CuadroCuerpo(15,$al['ci'],"","R",1);
    $pdf->CuadroCuerpo(10,$al['sexo']?'M':'F',"","C",1);
    $pdf->CuadroCuerpo(20,$al['celular'],"","R",1);
    $pdf->CuadroCuerpo(20,$al['telefonocasa'],"","R",1);
    $pdf->CuadroCuerpoPersonalizado(20,$al['matricula'],1,"R",1,"B");
    $pdf->CuadroCuerpo(20,$al['mensualidad'],"","R",1);
    $pdf->CuadroCuerpo(40,$al['zona']." ".$al['calle']." ".$al['numero'],1,"L",1,"B");
		
	$pdf->Ln();
}

$pdf->Output("Reporte de Notas.pdf","I");
?>