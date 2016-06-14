<?php
include_once("../../login/check.php");
if(!empty($_POST)):
include_once("../../class/asistencia.php");
$asistencia=new asistencia;

extract($_POST);

/*echo "<pre>";
print_r($_POST);
echo "</pre>";*/
foreach($n as $d){
	$valores=array(	"codalumno"=>"'".$d['codalumno']."'",
					"estado"=>"'".$d['v']."'",
					"codcarrera"=>"'".$codcarrera."'",
                    "codgrupo"=>"'".$codgrupo."'",
					"fechaasistencia"=>"'".$fechaasistencia."'",
	);	
	//$asistencia->insertar($valores);
}
				$mensaje[]="SUS DATOS SE GUARDARON CORRECTAMENTE";


$nuevo=1;
$titulo="Mensaje de Respuesta";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>