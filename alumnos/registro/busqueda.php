<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	include_once '../../class/alumno.php';
	include_once '../../class/curso.php';
	extract($_POST);
	$codcurso=$codcurso?"codcurso='$codcurso'":"codcurso LIKE '%'";
	$sexo=$sexo!=""?"sexo LIKE '$sexo'":"sexo LIKE '%'";
	$alumno=new alumno;
	$curso=new curso;
	$al=$alumno->mostrarTodo("paterno LIKE '%$paterno%' and materno LIKE '%$materno%' and nombres LIKE '%$nombres%' and $sexo and $codcurso","paterno,materno,nombres,codcurso");
	$i=0;
	foreach($al as $a){$i++;
		$cur=array_shift($curso->mostrar($a['codcurso']));
		$d[$i]['codalumno']=$a['codalumno'];
		$d[$i]['paterno']=capitalizar($a['paterno']);
		$d[$i]['materno']=capitalizar($a['materno']);
		$d[$i]['nombres']=capitalizar($a['nombres']);
		$d[$i]['curso']=$cur['nombre'];
		$d[$i]['sexo']=$a['sexo']?'Masculino':'Femenino';
		$d[$i]['rude']=$a['rude'];
		$d[$i]['telefonocasa']=$a['telefonocasa'];
		$d[$i]['celular']=$a['celular'];
	}
	$titulo=array("paterno"=>"Paterno","materno"=>"Materno","nombres"=>"Nombres","sexo"=>"Sexo","curso"=>"Curso","rude"=>"Rude","telefonocasa"=>"Teléfono","celular"=>"Celular");
	listadoTabla($titulo,$d,1,"modificar.php","eliminar.php","ver.php");
}
?>