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
	$mensaje[]="Archivo no válido del curriculum. Verifique e intente nuevamente";
}
//empieza la copia de archivos
$valores=array(	"materno"=>"'$materno'",
				"paterno"=>"'$paterno'",
				"nombres"=>"'$nombres'",
				"lugarnac"=>"'$lugarnac'",
				"fechanac"=>"'$fechanac'",
				"ci"=>"'$ci'",
				"sexo"=>"'$sexo'",
				"zona"=>"'$zona'",
				"calle"=>"'$calle'",
				"numero"=>"'$numero'",
				"telefonocasa"=>"'$telefonocasa'",
				"celular"=>"'$celular'",
				"codcurso"=>"'$codcurso'",
				"rude"=>"'$rude'",
				"observacion"=>"'$observacion'",
				
				
				"apellidospadre"=>"'$apellidospadre'",
				"nombrespadre"=>"'$nombrespadre'",
				"cipadre"=>"'$cipadre'",
				
				"apellidosmadre"=>"'$apellidosmadre'",
				"nombresmadre"=>"'$nombresmadre'",
				"cimadre"=>"'$cimadre'",
				
				"fotocopiaci"=>"'$fotocopiaci'",
				"fotocopianacimiento"=>"'$fotocopianacimiento'",
                "formulariorude"=>"'$formulariorude'",
                "fotocopiapadre"=>"'$fotocopiapadre'",
                "compromiso"=>"'$compromiso'",
				);
if($foto!=""){				
	$valores=array_merge($valores,array("foto"=>"'$foto'"));
}
				$alumno->actualizar($valores,$id);
				$mensaje[]="SUS DATOS SE GUARDARON CORRECTAMENTE";


$titulo="Mensaje de Respuesta";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>