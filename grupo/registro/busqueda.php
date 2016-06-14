<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	include_once '../../class/grupo.php';
	extract($_POST);
    include_once("../../class/carrera.php");
    $carrera=new carrera;
    
    include_once("../../class/usuarios.php");
    $usuarios=new usuarios;
    
    $codcarrera=$codcarrera==""?"%":"$codcarrera";
    $coddocente=$coddocente==""?"%":"$coddocente";
	$grupo=new grupo;
	$gr=$grupo->mostrarTodo("nombregrupo LIKE '%$nombregrupo%' and codcarrera LIKE '$codcarrera' and coddocente LIKE '$coddocente'","nombregrupo,horainicio,horafinal");
	foreach($gr as $g){$i++;
        $car=array_shift($carrera->mostrarTodo("codcarrera=".$g['codcarrera'],"nombre"));
        $us=array_shift($usuarios->mostrarTodo("nivel=3 and codusuarios=".$g['coddocente'],"nombre"));
		$datos[$i]['codgrupo']=$g['codgrupo'];
		$datos[$i]['nombregrupo']=$g['nombregrupo'];
		$datos[$i]['detallegrupo']=$g['detallegrupo'];
        $datos[$i]['carrera']=$car['nombre'];
        $datos[$i]['docente']=$us['paterno']." ".$us['materno']." ".$us['nombre'];
        $datos[$i]['horainicio']=$g['horainicio'];
        $datos[$i]['horafinal']=$g['horafinal'];
	}
	
	$titulo=array("nombregrupo"=>"Nombre del Grupo","detallegrupo"=>"Detalle del Grupo","carrera"=>"Carrera","docente"=>"Docente","horainicio"=>"Hora Inicio","horafinal"=>"Hora Final");
	listadoTabla($titulo,$datos,1,"modificar.php","eliminar.php","ver.php");
}
?>