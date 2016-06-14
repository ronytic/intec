<?php
include_once("../../login/check.php");
if(!empty($_POST)):
include_once("../../class/grupo.php");
$grupo=new grupo;
extract($_POST);
//empieza la copia de archivos
$valores=array(	"codcarrera"=>"'$codcarrera'",
				"coddocente"=>"'$coddocente'",
                "nombregrupo"=>"'$nombregrupo'",
                "detallegrupo"=>"'$detallegrupo'",
                "horainicio"=>"'$horainicio'",
                "horafinal"=>"'$horafinal'",
				);
				$grupo->actualizar($valores,$id);
				$mensaje[]="SUS DATOS SE GUARDARON CORRECTAMENTE";


$titulo="Mensaje de Respuesta";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>