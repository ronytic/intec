<?php
include_once("../../login/check.php");
if(!empty($_POST)):
include_once("../../class/docentemateriacurso.php");
$docentemateriacurso=new docentemateriacurso;
extract($_POST);
//empieza la copia de archivos
$dmc=$docentemateriacurso->mostrarTodo("coddocente=$coddocente and codcurso=$codcurso and codmateria=$codmateria");
if(count($dmc)){
	$mensaje[]="YA SE ENCUENTRA ASIGNADO MATERIA, CURSO Y EL DOCENTE";
}else{
$valores=array(	"coddocente"=>"'$coddocente'",
				"codcurso"=>"'$codcurso'",
				"codmateria"=>"'$codmateria'",
				);
				$docentemateriacurso->actualizar($valores,$id);
				$mensaje[]="SUS DATOS SE GUARDARON CORRECTAMENTE";

}
$titulo="Mensaje de Respuesta";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>