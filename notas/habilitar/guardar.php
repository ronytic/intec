<?php
include_once("../../login/check.php");
if(!empty($_POST)):

include_once("../../class/grupo.php");
include_once("../../class/alumno.php");
include_once("../../class/notas.php");
$grupo=new grupo;
$alumno=new alumno;
$notas=new notas;
$codgrupo=$_POST['codgrupo'];
$codcarrera=$_POST['codcarrera'];
//echo "<pre>";print_r($_POST);echo "</pre>";
//exit();
//$notas->vaciar();

foreach($alumno->mostrarTodo("codgrupo=".$codgrupo) as $al){
        $valores=array(	"codgrupo"=>"'".$codgrupo."'",
                        "codcarrera"=>"'".$codcarrera."'",
                        "codalumno"=>"'".$al['codalumno']."'",
                        "asistencia"=>"0",
                        "practica"=>"0",
                        "investigacion"=>"0",
                        "controllectura"=>"0",
                        "evaluacion"=>"'0'",
                        "nota"=>"'0'",
                        "turno2"=>"'0'",
                        "notafinal"=>"'0'",
                        );
                        /*echo "<pre>";	
                        print_r($valores);
                        echo "</pre>";*/
        $notas->insertar($valores);
}


$mensaje[]="SUS DATOS SE GUARDARON CORRECTAMENTE";
$textonuevo="Habilitar Nuevo Curso";
$nuevo=0;
$listar=1;
$titulo="Mensaje de Respuesta";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>