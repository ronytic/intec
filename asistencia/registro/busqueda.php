<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	include_once '../../class/alumno.php';
	include_once '../../class/carrera.php';
	include_once '../../class/grupo.php';
	include_once '../../class/asistencia.php';
	extract($_POST);
	
	$alumno=new alumno;
	$carrera=new carrera;
    $grupo=new grupo;
	$asistencia=new asistencia;
	if($codcarrera==""){
		echo "Seleccione una Carrera Porfavor";	
		exit();
	}
    if($codgrupo==""){
		echo "Seleccione un Grupo de Estudio Porfavor";	
		exit();
	}
	$gru=array_shift($grupo->mostrar($codgrupo));
	$car=array_shift($carrera->mostrar($codcarrera));
        
	$codgrupo=$codgrupo?"codgrupo='$codgrupo'":"codgrupo LIKE '%'";
	
    
    $sexo=$sexo!=""?"sexo='$sexo'":"sexo LIKE '%'";
	$asis=$asistencia->mostrarTodo("$codgrupo and fechaasistencia='$fechaasistencia'");
    
    ?>
    <span class="resaltar">Carrera:</span> <?php echo $car['nombre']?> <span class="resaltar">Grupo:</span> <?php echo $gru['nombregrupo']?> <span class="resaltar">Horario:</span> <?php echo $gru['horainicio']?> - <?php echo $gru['horafinal']?> <span class="resaltar">Fecha de Asistencia:</span> <?php echo fecha2Str($fechaasistencia)?><br>
    <?php
	if(count($asis)){
        ?>
		<div class="rojoC">La Asistencia ya se encuentra Registrada para esta fecha</div>
        <br><a href="ver.php?codcarrera=<?php echo $_POST['codcarrera'];?>&codgrupo=<?php echo $_POST['codgrupo'];?>&fechaasistencia=<?php echo $fechaasistencia?>" target="_blank" class="botoninfo">Ver Reporte</a><?php
		
	}else{
	$al=$alumno->mostrarTodo("$codgrupo","paterno,materno,nombres,codgrupo");
	$i=0;
	foreach($al as $a){$i++;
		
		$d[$i]['codalumno']=$a['codalumno'];
		$d[$i]['paterno']=capitalizar($a['paterno']);
		$d[$i]['materno']=capitalizar($a['materno']);
		$d[$i]['nombres']=capitalizar($a['nombres']);
		$d[$i]['curso']=$cur['nombre'];


		$d[$i]['falta']='<input type="hidden" name="n['.$i.'][codalumno]" value="'.$a['codalumno'].'"><center><input type="radio" name="n['.$i.'][v]" value="falta" required align="middle"></center>';
		$d[$i]['asistencia']='<center><input type="radio" name="n['.$i.'][v]" value="asistencia" required></center>';
		$d[$i]['licencia']='<center><input type="radio" name="n['.$i.'][v]" value="licencia" required></center>';
	}
	$titulo=array("paterno"=>"Paterno","materno"=>"Materno","nombres"=>"Nombres","asistencia"=>"Asistencia","falta"=>"Falta","licencia"=>"Licencia");
	?>
    <form action="guardar.php" method="post">
    <input type="hidden" name="codcarrera" value="<?php echo $_POST['codcarrera'];?>">
    <input type="hidden" name="codgrupo" value="<?php echo $_POST['codgrupo'];?>">
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