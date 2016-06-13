<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	include_once '../../class/docentemateriacurso.php';
	extract($_POST);
	$docentemateriacurso=new docentemateriacurso;
	include_once("../../class/usuarios.php");
	include_once("../../class/materia.php");
	include_once("../../class/curso.php");
	$usuarios=new usuarios;
	$materia=new materia;
	$curso=new curso;
	$codcurso=$codcurso!=""?"codcurso='$codcurso'":"codcurso LIKE '%'";
	$codmateria=$codmateria!=""?"codmateria='$codmateria'":"codcurso LIKE '%'";
	$coddocente=$coddocente!=""?"coddocente='$coddocente'":"coddocente LIKE '%'";
	$dmc=$docentemateriacurso->mostrarTodo("$codcurso and $codmateria and $coddocente","coddocentemateriacurso");
	foreach($dmc as $m){$i++;
		$cur=array_shift($curso->mostrar($m['codcurso']));
		$mat=array_shift($materia->mostrar($m['codmateria']));
		$usu=array_shift($usuarios->mostrar($m['coddocente']));
		$datos[$i]['coddocentemateriacurso']=$m['coddocentemateriacurso'];
		$datos[$i]['curso']=$cur['nombre'];
		$datos[$i]['materia']=$mat['nombre'];
		$datos[$i]['docente']=$usu['nombre']." ".$usu['paterno']." ".$usu['materno'];
	}
	
	$titulo=array("curso"=>"Curso","materia"=>"Materia","docente"=>"Docente");
	listadoTabla($titulo,$datos,1,"modificar.php","eliminar.php","ver.php");
}
?>