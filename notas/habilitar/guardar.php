<?php
include_once("../../login/check.php");
if(!empty($_POST)):

extract($_POST);
include_once("../../class/docentemateriacurso.php");
include_once("../../class/alumno.php");
include_once("../../class/notas.php");
$docentemateriacurso=new docentemateriacurso;
$alumno=new alumno;
$notas=new notas;
$codcurso=$_POST['codcurso'];
//echo "<pre>";print_r($_POST);echo "</pre>";
//$notas->vaciar();
$docmatcur=$docentemateriacurso->mostrarTodo("codcurso=".$codcurso);
foreach($docmatcur as $dmc){
    $notas->updateRow(array("activo"=>0),"coddocentemateriacurso=".$dmc['coddocentemateriacurso']);
	foreach($alumno->mostrarTodo("codcurso=".$dmc['codcurso']) as $al){
			$valores=array(	"coddocentemateriacurso"=>"'".$dmc['coddocentemateriacurso']."'",
							"codalumno"=>"'".$al['codalumno']."'",
							"bimestre1"=>"0",
                            "bimestre2"=>"0",
                            "bimestre3"=>"0",
                            "bimestre4"=>"0",
							"notafinal"=>"'0'",
							);
							/*echo "<pre>";	
							print_r($valores);
							echo "</pre>";*/
			$notas->insertar($valores);
	}
}

$mensaje[]="SUS DATOS SE GUARDARON CORRECTAMENTE";
$textonuevo="Habilitar Nuevo Curso";
$nuevo=0;
$listar=1;
$titulo="Mensaje de Respuesta";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>