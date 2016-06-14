<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	include_once '../../class/alumno.php';
	include_once '../../class/carrera.php';
    include_once '../../class/grupo.php';
	extract($_POST);
	$codcarrera=$codcarrera?"codcarrera='$codcarrera'":"codcarrera LIKE '%'";
    $codgrupo=$codgrupo?"codgrupo='$codgrupo'":"codgrupo LIKE '%'";
	$sexo=$sexo!=""?"sexo LIKE '$sexo'":"sexo LIKE '%'";
	$alumno=new alumno;
	$carrera=new carrera;
    $grupo=new grupo;
	$al=$alumno->mostrarTodo("paterno LIKE '%$paterno%' and materno LIKE '%$materno%' and nombres LIKE '%$nombres%' and $sexo and $codcarrera and $codgrupo","paterno,materno,nombres,codcarrera,codgrupo");
	$i=0;
	foreach($al as $a){$i++;
		$car=array_shift($carrera->mostrar($a['codcarrera']));
        $gr=array_shift($grupo->mostrar($a['codgrupo']));
		$d[$i]['codalumno']=$a['codalumno'];
		$d[$i]['paterno']=capitalizar($a['paterno']);
		$d[$i]['materno']=capitalizar($a['materno']);
		$d[$i]['nombres']=capitalizar($a['nombres']);
		$d[$i]['carrera']=$car['nombre'];
        $d[$i]['grupo']=$gr['nombregrupo'];
		$d[$i]['sexo']=$a['sexo']?'Masculino':'Femenino';
		$d[$i]['matricula']=$a['matricula'];
        $d[$i]['mensualidad']=$a['mensualidad'];
		$d[$i]['telefonocasa']=$a['telefonocasa'];
		$d[$i]['celular']=$a['celular'];
	}
	$titulo=array("paterno"=>"Paterno","materno"=>"Materno","nombres"=>"Nombres","sexo"=>"Sexo","carrera"=>"Carrera","grupo"=>"Grupo","telefonocasa"=>"Teléfono","celular"=>"Celular","matricula"=>"Matricula","mensualidad"=>"Mensualidad");
	listadoTabla($titulo,$d,1,"","","",array("Registrar "=>"pago.php"));
}
?>