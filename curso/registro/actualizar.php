<?php
include_once("../../login/check.php");
if(!empty($_POST)):
include_once("../../class/curso.php");
$curso=new curso;
extract($_POST);
//empieza la copia de archivos
$valores=array(	"nombre"=>"'$nombre'",
				"abreviado"=>"'$abreviado'",
				);
				$curso->actualizar($valores,$id);
				$mensaje[]="SUS DATOS SE GUARDARON CORRECTAMENTE";


$titulo="Mensaje de Respuesta";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>