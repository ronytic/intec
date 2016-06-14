<?php
include_once("../../impresion/pdf.php");
$titulo="Datos de Alumno";
$id=$_GET['id'];
class PDF extends PPDF{
	
}

include_once("../../class/alumno.php");
$alumno=new alumno;
$al=array_shift($alumno->mostrar($id));

include_once("../../class/carrera.php");
$carrera=new carrera;
$car=array_shift($carrera->mostrar($al['codcarrera']));
include_once("../../class/grupo.php");
$grupo=new grupo;
$gr=array_shift($grupo->mostrar($al['codgrupo']));
$pdf=new PDF("P","mm","letter");

$pdf->AddPage();
mostrarI(array("Apellido Paterno"=>capitalizar($al['paterno']),
				"Apellido Materno"=>capitalizar($al['materno']),
				"Nombres"=>capitalizar($al['nombres']),

				"Fecha de Nacimiento"=>fecha2Str($al['fechanac']),
				"Cédula de Identidad"=>$al['ci'],
				"Sexo"=>$al['sexo']?'Masculino':'Femenino',
				"Zona"=>$al['zona'],
				"Calle"=>$al['calle'],
				"Número de casa"=>$al['numero'],
				"Teléfono de Casa"=>$al['telefonocasa'],
				"Celular"=>$al['celular'],
				
			));
$pdf->Linea();
mostrarI(array("Carrera"=>$car['nombre'],
				"Grupo"=>$gr['nombregrupo'],
                "Matricula"=>$al['matricula'],
                "Mensualidad"=>$al['mensualidad'],
			));
$pdf->Linea();
$pdf->CuadroCuerpoResaltar(170,"Dias de Clases",1,"","",1);
$pdf->ln();
mostrarI(array(	"Día Lunes"=>($al['dialunes']?'Si':'No'),
				"Día Martes"=>($al['diamartes']?'Si':'No'),
                "Día Miercoles"=>($al['diamiercoles']?'Si':'No'),
                "Día Jueves"=>($al['diajueves']?'Si':'No'),
                "Día Viernes"=>($al['diaviernes']?'Si':'No'),
                "Día Sábado"=>($al['diasabado']?'Si':'No'),
			));
$foto="../foto/".$al['foto'];
if(!empty($al['foto']) && file_exists($foto)){
	$pdf->Image($foto,140,55,40,40);	
}

$pdf->Output();
?>