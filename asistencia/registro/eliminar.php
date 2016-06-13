<?php  
include_once("../../login/check.php");
if (!empty($_GET)) {
	$nombre="rude";
	include_once '../../class/'.$nombre.'.php';
	${$nombre}=new $nombre;
	$id=$_GET['id'];

	$r=$rude->mostrarTodo("codalumno=".$id);
	$r=array_shift($r);
	${$nombre}->eliminar($r['codrude']);
}
?>