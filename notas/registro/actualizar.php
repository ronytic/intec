<?php
include_once("../../login/check.php");
if(!empty($_POST)):
include_once("../../class/notas.php");
$notas=new notas;
extract($_POST);
/*echo "<pre>";
print_r($n);
echo "</pre>";*/
  //exit();  
foreach($n as $no){
	$valores=array(	"asistencia"=>"'".$no['asistencia']."'",
				"practica"=>"'".$no['practica']."'",
                "investigacion"=>"'".$no['investigacion']."'",
                "controllectura"=>"'".$no['controllectura']."'",
                "evaluacion"=>"'".$no['evaluacion']."'",
                "nota"=>"'".$no['nota']."'",
                "turno2"=>"'".$no['turno2']."'",
				"notafinal"=>"'".$no['notafinal']."'",
				);	
	/*echo "<pre>";
	print_r($valores);
	echo "</pre>";*/
	
	$notas->actualizar($valores,$no['codnotas']);
}
//exit();
$mensaje[]="SUS NOTAS SE GUARDARON CORRECTAMENTE";


$nuevo=1;
$titulo="Mensaje de Respuesta";
$folder="../../";
//include_once '../../mensajeresultado.php';

endif;?>
<script>
history.back();
</script>