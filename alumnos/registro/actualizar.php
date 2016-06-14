<?php
include_once("../../login/check.php");
if(!empty($_POST)):
include_once("../../class/alumno.php");
$alumno=new alumno;
extract($_POST);

if( $_FILES['foto']['size']<="500000000"){
	@$foto=$_FILES['foto']['name'];
	@copy($_FILES['foto']['tmp_name'],"../foto/".$_FILES['foto']['name']);
}else{
	//mensaje que no es valido el tipo de archivo	
	$mensaje[]="Archivo no válido. Verifique e intente nuevamente";
}
//empieza la copia de archivos
$valores=array(	"materno"=>"'$materno'",
				"paterno"=>"'$paterno'",
				"nombres"=>"'$nombres'",
				"fechanac"=>"'$fechanac'",
				"ci"=>"'$ci'",
				"sexo"=>"'$sexo'",
				"zona"=>"'$zona'",
				"calle"=>"'$calle'",
				"numero"=>"'$numero'",
				"telefonocasa"=>"'$telefonocasa'",
				"celular"=>"'$celular'",
				"codcarrera"=>"'$codcarrera'",
				"codgrupo"=>"'$codgrupo'",
				"matricula"=>"'$matricula'",
                "mensualidad"=>"'$mensualidad'",
				
				"dialunes"=>"'$dialunes'",
				"diamartes"=>"'$diamartes'",
				"diamiercoles"=>"'$diamiercoles'",
				
				"diajueves"=>"'$diajueves'",
				"diaviernes"=>"'$diaviernes'",
				"diasabado"=>"'$diasabado'",

				);
if($_FILES['foto']['name']!=""){				
	$valores=array_merge($valores,array("foto"=>"'$foto'"));
}
				$alumno->actualizar($valores,$id);
				$mensaje[]="SUS DATOS SE GUARDARON CORRECTAMENTE";


$titulo="Mensaje de Respuesta";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>