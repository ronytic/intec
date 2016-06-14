<?php
include_once("../../login/check.php");
if(!empty($_POST)):
include_once("../../class/carrera.php");
$carrera=new carrera;
extract($_POST);
//empieza la copia de archivos
$valores=array(	"nombre"=>"'$nombre'",
				"detalle"=>"'$detalle'",
				);
				$carrera->actualizar($valores,$id);
				$mensaje[]="SUS DATOS SE GUARDARON CORRECTAMENTE";


$titulo="Mensaje de Respuesta";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>