<?php
include_once("../../impresion/pdf.php");
$titulo="Datos de Alumno";
$id=$_GET['id'];
class PDF extends PPDF{
	
}

include_once("../../class/alumno.php");
$alumno=new alumno;
$al=array_shift($alumno->mostrar($id));

include_once("../../class/curso.php");
$curso=new curso;
$cur=array_shift($curso->mostrar($al['codcurso']));

$pdf=new PDF("P","mm","letter");

$pdf->AddPage();
mostrarI(array("Apellido Paterno"=>capitalizar($al['paterno']),
				"Apellido Materno"=>capitalizar($al['materno']),
				"Nombres"=>capitalizar($al['nombres']),
				"Lugar de Nacimiento"=>$al['lugarnac'],
				"Fecha de Nacimiento"=>fecha2Str($al['fechanac']),
				"Cédula de Identidad"=>$al['ci'],
				"Sexo"=>$al['sexo']?'Masculino':'Femenino',
				"Zona"=>$al['zona'],
				"Calle"=>$al['calle'],
				"Número de casa"=>$al['numero'],
				"Teléfono de Casa"=>$al['telefonocasa'],
				"Celular"=>$al['celular'],
				"Curso"=>$cur['nombre'],
				"Rude"=>$al['rude'],
				"Observaciones"=>$prod['observaciones'],
			));
$pdf->Linea();
mostrarI(array(	"Apellidos de Padre"=>capitalizar($al['apellidospadre']),
				"Nombres de Padre"=>capitalizar($al['nombrespadre']),
				"C.I. Padre"=>$al['cipadre'],
				"Ocupación de Padre"=>$al['ocupacionpadre'],
				"Apellidos de Madre"=>capitalizar($al['apellidosmadre']),
				"Nombres de Madre"=>capitalizar($al['nombresmadre']),
				"C.I. Madre"=>$al['cimadre'],
				"Ocupación de Madre"=>$al['ocupacionmadre'],
			));
$foto="../foto/".$al['foto'];
if(!empty($al['foto']) && file_exists($foto)){
	$pdf->Image($foto,140,50,40,40);	
}

$pdf->Output();
?>