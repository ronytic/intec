<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	include_once '../../class/curso.php';
	extract($_POST);
	$curso=new curso;
	$cur=$curso->mostrarTodo("nombre LIKE '%$nombre%' and abreviado LIKE '%$abreviado%'","nombre");
	foreach($cur as $c){$i++;
		$datos[$i]['codcurso']=$c['codcurso'];
		$datos[$i]['nombre']=$c['nombre'];
		$datos[$i]['abreviado']=$c['abreviado'];
	}
	
	$titulo=array("nombre"=>"Nombre","abreviado"=>"Abreviado");
	listadoTabla($titulo,$datos,1,"modificar.php","eliminar.php","ver.php");
}
?>