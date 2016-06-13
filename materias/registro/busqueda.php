<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	include_once '../../class/materia.php';
	extract($_POST);
	$materia=new materia;
	$mat=$materia->mostrarTodo("nombre LIKE '%$nombre%' and abreviado LIKE '%$abreviado%'","nombre");
	foreach($mat as $m){$i++;
		$datos[$i]['codmateria']=$m['codmateria'];
		$datos[$i]['nombre']=$m['nombre'];
		$datos[$i]['abreviado']=$m['abreviado'];
	}
	
	$titulo=array("nombre"=>"Nombre","abreviado"=>"Abreviado");
	listadoTabla($titulo,$datos,1,"modificar.php","eliminar.php","ver.php");
}
?>