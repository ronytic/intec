<?php
include_once("../../login/check.php");
if(!empty($_POST)):
include_once("../../class/alumno.php");
$alumno=new alumno;
include_once("../../class/cuota.php");
$cuota=new cuota;

extract($_POST);
//empieza la copia de archivos

if( $_FILES['foto']['size']<="500000000"){
	@$foto=$_FILES['foto']['name'];
	@copy($_FILES['foto']['tmp_name'],"../foto/".$_FILES['foto']['name']);
}else{
	//mensaje que no es valido el tipo de archivo	
	$mensaje[]="Archivo no válido. Verifique e intente nuevamente";
}

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
				"foto"=>"'$foto'",
				
				"dialunes"=>"'$dialunes'",
				"diamartes"=>"'$diamartes'",
				"diamiercoles"=>"'$diamiercoles'",
				
				"diajueves"=>"'$diajueves'",
				"diaviernes"=>"'$diaviernes'",
				"diasabado"=>"'$diasabado'",

				);
				$alumno->insertar($valores);
				$mensaje[]="SUS DATOS SE GUARDARON CORRECTAMENTE";

$id=$alumno->last_id();
$val=array("codalumno"=>$id);
$cuota->insertar($val);
$titulo="Mensaje de Respuesta";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>