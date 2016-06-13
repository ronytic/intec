<?php
include_once("../../login/check.php");
if(!empty($_POST)):
include_once("../../class/asistencia.php");
$asistencia=new asistencia;

extract($_POST);
//empieza la copia de archivos

/*if(($_FILES['foto']['type']=="application/pdf" || $_FILES['foto']['type']=="application/msword" || $_FILES['foto']['type']=="application/vnd.openxmlformats-officedocument.wordprocessingml.document") && $_FILES['foto']['size']<="500000000"){
	@$foto=$_FILES['foto']['name'];
	@copy($_FILES['foto']['tmp_name'],"../foto/".$_FILES['foto']['name']);
}else{
	//mensaje que no es valido el tipo de archivo	
	$mensaje[]="Archivo no válido del curriculum. Verifique e intente nuevamente";
}*/
/*echo "<pre>";
print_r($_POST);
echo "</pre>";*/
foreach($n as $d){
	$valores=array(	"codalumno"=>"'".$d['codalumno']."'",
					"estado"=>"'".$d['v']."'",
					"codcurso"=>"'".$codcurso."'",
					"fechaasistencia"=>"'".$fechaasistencia."'",
	);	
	$asistencia->insertar($valores);
}
				$mensaje[]="SUS DATOS SE GUARDARON CORRECTAMENTE";



$titulo="Mensaje de Respuesta";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>