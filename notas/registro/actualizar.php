<?php
include_once("../../login/check.php");
if(!empty($_POST)):
include_once("../../class/notas.php");
$notas=new notas;
extract($_POST);
/*echo "<pre>";
print_r($n);
echo "</pre>";*/
    
foreach($n as $no){
	$valores=array(	"bimestre1"=>"'".$no['bimestre1']."'",
				"bimestre2"=>"'".$no['bimestre2']."'",
                "bimestre3"=>"'".$no['bimestre3']."'",
                "bimestre4"=>"'".$no['bimestre4']."'",
				"notafinal"=>"'".$no['notafinal']."'",
				);	
	/*echo "<pre>";
	print_r($valores);
	echo "</pre>";*/
	
	$notas->actualizar($valores,$no['codnotas']);
}

$mensaje[]="SUS NOTAS SE GUARDARON CORRECTAMENTE";


$nuevo=1;
$titulo="Mensaje de Respuesta";
$folder="../../";
//include_once '../../mensajeresultado.php';

endif;?>
<script>
history.back();
</script>