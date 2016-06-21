<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	include_once '../../class/alumno.php';
	include_once '../../class/carrera.php';
	include_once '../../class/grupo.php';
	include_once '../../class/notas.php';
	extract($_POST);
	
	$alumno=new alumno;
	$carrera=new carrera;
	$notas=new notas;
    $grupo=new grupo;
	if($codgrupo==""){
		echo "Seleccione una Carrera y un Grupo Por favor";	
		exit();
	}

	$car=array_shift($carrera->mostrar($codcarrera));
    $gru=array_shift($grupo->mostrar($codgrupo));
	
	
	$al=$alumno->mostrarTodo("codgrupo=".$codgrupo,"paterno,materno,nombres");
	$i=0;
	foreach($al as $a){$i++;
		$d[$i]['codalumno']=$a['codalumno'];
		$d[$i]['paterno']=capitalizar($a['paterno']);
		$d[$i]['materno']=capitalizar($a['materno']);
		$d[$i]['nombres']=capitalizar($a['nombres']);
		$d[$i]['curso']=$cur['nombre'];

        $n=array_shift($notas->mostrarTodo("codcarrera=".$codcarrera." and codgrupo=".$codgrupo." and codalumno=".$a['codalumno']));
		
		$d[$i]['asistencia']='<input type="hidden" name="n['.$i.'][codnotas]" value="'.$n['codnotas'].'"><input type="number" name="n['.$i.'][asistencia]" value="'.$n['asistencia'].'" required max="10" min="0" style="width:35px;"  class="der notas n'.$n['codnotas'].'" rel="'.$n['codnotas'].'" >';
        $d[$i]['practica']='<input type="number" name="n['.$i.'][practica]" value="'.$n['practica'].'" required max="40" min="0" style="width:35px;"  class="der notas n'.$n['codnotas'].'" rel="'.$n['codnotas'].'" >';
        $d[$i]['investigacion']='<input type="number" name="n['.$i.'][investigacion]" value="'.$n['investigacion'].'" required max="20" min="0" style="width:35px;"  class="der notas n'.$n['codnotas'].'" rel="'.$n['codnotas'].'">';
        $d[$i]['controllectura']='<input type="number" name="n['.$i.'][controllectura]" value="'.$n['controllectura'].'" required max="10" min="0" style="width:35px;"  class="der notas n'.$n['codnotas'].'" rel="'.$n['codnotas'].'" >';
        $d[$i]['evaluacion']='<input type="number" name="n['.$i.'][evaluacion]" value="'.$n['evaluacion'].'" required max="20" min="0" style="width:35px;"  class="der notas n'.$n['codnotas'].'" rel="'.$n['codnotas'].'" >';
        $d[$i]['nota']='<input type="number" name="n['.$i.'][nota]" value="'.$n['nota'].'" required max="100" min="0" style="width:35px;"  class="der n'.$n['codnotas'].' nota'.$n['codnotas'].'" rel="'.$n['codnotas'].'" readonly>';
        $d[$i]['turno2']='<input type="number" name="n['.$i.'][turno2]" value="'.$n['turno2'].'" required max="100" min="0" style="width:35px;"  class="der turno turno'.$n['codnotas'].'" rel="'.$n['codnotas'].'">';
             
        
		$d[$i]['notafinal']='<input type="number" name="n['.$i.'][notafinal]" value="'.$n['notafinal'].'" required max="100" min="0" style="width:35px;" readonly class="der total t'.$n['codnotas'].' '.($n['notafinal']<51?'rojo':'').'">';
	}
	$titulo=array("paterno"=>"Paterno","materno"=>"Materno","nombres"=>"Nombres","asistencia"=>"Asistencia","practica"=>"Práctica","investigacion"=>"Investigación","controllectura"=>"Ctrl. Lectura","evaluacion"=>"Evaluación","nota"=>"Nota Final","turno2"=>"2º Turno","notafinal"=>"Nota Final");
	?>
    <form action="actualizar.php" method="post">
    
	<strong>Carrera: </strong><?php echo $car['nombre']?> <strong>Grupo: </strong><?php echo $gru['nombregrupo']?></strong> <strong>Horario: </strong> <?php echo $gru['horainicio']?> - <?php echo $gru['horafinal']?>
    <?php
	listadoTablaregistro($titulo,$d,0,$modi,$elimi,$ver);
	?>
    <input type="submit" value="Guardar Nota">
    </form>
    <?php
	
}
?>