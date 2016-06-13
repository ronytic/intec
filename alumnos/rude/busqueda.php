<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	include_once '../../class/alumno.php';
	include_once '../../class/curso.php';
	include_once '../../class/rude.php';
	extract($_POST);
	$codcurso=$codcurso?"codcurso='$codcurso'":"codcurso LIKE '%'";
	$sexo=$sexo!=""?"sexo='$sexo'":"sexo LIKE '%'";
	$alumno=new alumno;
	$curso=new curso;
	$rude=new rude;
	$al=$alumno->mostrarTodo("paterno LIKE '%$paterno%' and materno LIKE '%$materno%' and nombres LIKE '%$nombres%' and $sexo and $codcurso","paterno,materno,nombres,codcurso");
	$i=0;
	foreach($al as $a){$i++;
		$cur=array_shift($curso->mostrar($a['codcurso']));
		$r=$rude->mostrarTodo("codalumno=".$a['codalumno']);
		if(count($r)==0){
			$modi="";
			$elimi="";
			$ver="";
			$boton=array("Registrar Rude"=>"nuevo.php");	
		}else{
			$modi="modificar.php";
			$elimi="eliminar.php";
			$ver="ver.php";
			$boton=array();
		}
		$d[$i]['codalumno']=$a['codalumno'];
		$d[$i]['paterno']=capitalizar($a['paterno']);
		$d[$i]['materno']=capitalizar($a['materno']);
		$d[$i]['nombres']=capitalizar($a['nombres']);
		$d[$i]['curso']=$cur['nombre'];
		$d[$i]['sexo']=$a['sexo']?'Masculino':'Femenino';
		$d[$i]['rude']=$a['rude'];
		$d[$i]['telefonocasa']=$a['telefonocasa'];
		$d[$i]['celular']=$a['celular'];
		$d[$i]["modifica"]=$modi;
		$d[$i]["elimina"]=$elimi;
		$d[$i]["ver"]=$ver;
		$d[$i]["botones"]=$boton;
	}
	$titulo=array("paterno"=>"Paterno","materno"=>"Materno","nombres"=>"Nombres","sexo"=>"Sexo","curso"=>"Curso","rude"=>"Rude","telefonocasa"=>"Teléfono","celular"=>"Celular");
	listadoTablaregistro($titulo,$d,1,$modi,$elimi,$ver,$boton);
}
?>