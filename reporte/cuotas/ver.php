<?php
include_once("../../impresion/pdf.php");
$titulo="Reporte General de Cuotas";
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

include_once("../../class/cuota.php");
$cuota=new cuota;

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
		$this->TituloCabecera(5,"N");
		$this->TituloCabecera(20,"Paterno");
		$this->TituloCabecera(20,"Materno");
		$this->TituloCabecera(25,"Nombres");
        for($i=1;$i<=36;$i++){
             $this->TituloCabecera(5,"".$i,8);   
        }
	}	 
}

$pdf=new PDF("L","mm","letter");
$pdf->AddPage();
$i=0;
foreach($alumno->mostrarTodo("paterno LIKE '%$paterno%' and materno LIKE '%$materno%' and nombres LIKE '%$nombres%' and $sexo and $codcarrera and $codgrupo","paterno,materno,nombres,codcarrera,codgrupo") as $al){$i++;
    $c=$cuota->mostrarTodo("codalumno=".$al['codalumno'],"");
    $c=array_shift($c);
	$pdf->CuadroCuerpo(5,$i,"","R",1);
	$pdf->CuadroCuerpo(20,capitalizar($al['paterno']),"","",1);
	$pdf->CuadroCuerpo(20,capitalizar($al['materno']),"","",1);
	$pdf->CuadroCuerpo(25,capitalizar($al['nombres']),"","",1);


    for($j=1;$j<=36;$j++){
	$pdf->CuadroCuerpo(5,$c['cuota'.$j]?'Si':'',"","C",1);    
    }
		
	$pdf->Ln();
}

$pdf->Output("Reporte de Notas.pdf","I");
?>