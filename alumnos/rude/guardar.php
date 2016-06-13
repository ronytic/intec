<?php
include_once("../../login/check.php");
if(!empty($_POST)):
include_once("../../class/rude.php");
$rude1=new rude;

extract($_POST);
//empieza la copia de archivos

/*if(($_FILES['foto']['type']=="application/pdf" || $_FILES['foto']['type']=="application/msword" || $_FILES['foto']['type']=="application/vnd.openxmlformats-officedocument.wordprocessingml.document") && $_FILES['foto']['size']<="500000000"){
	@$foto=$_FILES['foto']['name'];
	@copy($_FILES['foto']['tmp_name'],"../foto/".$_FILES['foto']['name']);
}else{
	//mensaje que no es valido el tipo de archivo	
	$mensaje[]="Archivo no válido del curriculum. Verifique e intente nuevamente";
}*/

$valores=array(	"codalumno"=>"'$id'",
				"paisn"=>"'$paisn'",
				"provincian"=>"'$provincian'",
				"localidadn"=>"'$localidadn'",
				"certofi"=>"'$certofi'",
				"certlibro"=>"'$certlibro'",
				"certpartida"=>"'$certpartida'",
				"certfolio"=>"'$certfolio'",
				"codigosie"=>"'$codigosie'",
				"nombreunidad"=>"'$nombreunidad'",
				"provinciae"=>"'$provinciae'",
				"municipioe"=>"'$municipioe'",
				"comunidade"=>"'$comunidade'",
				"lenguamater"=>"'$lenguamater'",
				"castellanoi"=>"'$castellanoi'",
				"inglesi"=>"'$inglesi'",
				"aymarai"=>"'$aymarai'",
				"pertenecea"=>"'$pertenecea'",
				"centrosalud"=>"'$centrosalud'",
				"vecescentro"=>"'$vecescentro'",
				"discapacidad"=>"'$discapacidad'",
				"aguadomicilio"=>"'$aguadomicilio'",
				"electricidad"=>"'$electricidad'",
				"alcantarillado"=>"'$alcantarillado'",
				"trabaja"=>"'$trabaja'",
				"internetcasa"=>"'$internetcasa'",
				"transporte"=>"'$transporte'",
				"tiempollegada"=>"'$tiempollegada'",
				"instruccionp"=>"'$instruccionp'",
				"idiomap"=>"'$idiomap'",
				"instruccionm"=>"'$instruccionm'",
				"idiomam"=>"'$idiomam'",
                "parentescop"=>"'$parentescop'"
				);
				$rude1->insertar($valores);
				$mensaje[]="SUS DATOS SE GUARDARON CORRECTAMENTE";



$titulo="Mensaje de Respuesta";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>