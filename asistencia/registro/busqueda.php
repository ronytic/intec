<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	include_once '../../class/alumno.php';
	include_once '../../class/curso.php';
	include_once '../../class/rude.php';
	include_once '../../class/asistencia.php';
	extract($_POST);
	
	$alumno=new alumno;
	$curso=new curso;
	$rude=new rude;
	$asistencia=new asistencia;
	if($codcurso==""){
		echo "Seleccione un Curso Porfavor";	
		exit();
	}
	
	$codcurso=$codcurso?"codcurso='$codcurso'":"codcurso LIKE '%'";
	$sexo=$sexo!=""?"sexo='$sexo'":"sexo LIKE '%'";
	$asis=$asistencia->mostrarTodo("$codcurso and fechaasistencia='$fechaasistencia'");
	if(count($asis)){
		echo "Asistencia ya se encuentra Registrada para esta fecha ".fecha2Str($fechaasistencia)." y el curso seleccionado";
		?><br><a href="ver.php?codcurso=<?php echo $_POST['codcurso'];?>&fechaasistencia=<?php echo $fechaasistencia?>" target="_blank" class="botoninfo">Ver Reporte</a><?php
		
	}else{
	$al=$alumno->mostrarTodo("$codcurso","paterno,materno,nombres,codcurso");
	$i=0;
	foreach($al as $a){$i++;
		$cur=array_shift($curso->mostrar($a['codcurso']));
		$r=$rude->mostrarTodo("codalumno=".$a['codalumno']);
		$d[$i]['codalumno']=$a['codalumno'];
		$d[$i]['paterno']=capitalizar($a['paterno']);
		$d[$i]['materno']=capitalizar($a['materno']);
		$d[$i]['nombres']=capitalizar($a['nombres']);
		$d[$i]['curso']=$cur['nombre'];
		$d[$i]['sexo']=$a['sexo']?'Masculino':'Femenino';
		$d[$i]['rude']=$a['rude'];
		$d[$i]['telefonocasa']=$a['telefonocasa'];
		$d[$i]['celular']=$a['celular'];
		$d[$i]['falta']='<input type="hidden" name="n['.$i.'][codalumno]" value="'.$a['codalumno'].'"><center><input type="radio" name="n['.$i.'][v]" value="falta" required align="middle"></center>';
		$d[$i]['asistencia']='<center><input type="radio" name="n['.$i.'][v]" value="asistencia" required></center>';
		$d[$i]['licencia']='<center><input type="radio" name="n['.$i.'][v]" value="licencia" required></center>';
	}
	$titulo=array("paterno"=>"Paterno","materno"=>"Materno","nombres"=>"Nombres","sexo"=>"Sexo","curso"=>"Curso","asistencia"=>"Asistencia","falta"=>"Falta","licencia"=>"Licencia");
	?>
    <form action="guardar.php" method="post">
    <input type="hidden" name="codcurso" value="<?php echo $_POST['codcurso'];?>">
    <input type="hidden" name="fechaasistencia" value="<?php echo $_POST['fechaasistencia'];?>">
    <?php
	listadoTablaregistro($titulo,$d,0,$modi,$elimi,$ver);
	?>
    <div class="rojoC">TENGA CUIDADO, REGISTRE TODOS LOS DATOS POR QUE NO SE PODRÁ MODIFICAR POSTERIORMENTE</div>
    <input type="submit" value="Guardar Asistencia">
    </form>
    <?php
	}
}
?>