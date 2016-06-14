<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	include_once '../../class/carrera.php';
	extract($_POST);
	$carrera=new carrera;
	$car=$carrera->mostrarTodo("nombre LIKE '%$nombre%'","nombre");
	foreach($car as $c){$i++;
		$datos[$i]['codcarrera']=$c['codcarrera'];
		$datos[$i]['nombre']=$c['nombre'];
		$datos[$i]['detalle']=$c['detalle'];
	}
	
	$titulo=array("nombre"=>"Nombre","detalle"=>"Detalle");
	listadoTabla($titulo,$datos,1,"modificar.php","eliminar.php","ver.php");
}
?>