<?php
include_once("../../login/check.php");
if(!empty($_POST)):
include_once("../../class/cuota.php");
$cuota=new cuota;
extract($_POST);


        for($i=1;$i<=36;$i++){
            $valores["cuota".$i]=$_POST['cuota'.$i]==""?0:1;
        }
        //print_r($valores);
        $cuota->updateRow($valores,"codalumno=".$id);
        $mensaje[]="SUS CUOTAS SE GUARDARON CORRECTAMENTE";


$titulo="Mensaje de Respuesta";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>