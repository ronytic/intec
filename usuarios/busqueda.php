<?php 
include_once '../login/check.php';
if (!empty($_POST)) {
	$folder="../";
	$narchivo="usuarios";
	include_once("../class/".$narchivo.".php");
	${$narchivo}=new $narchivo;
	extract($_POST);
	$nivel=$nivel?" nivel='$nivel' ":" nivel LIKE '%' ";
	$usu=${$narchivo}->mostrarTodo("nombre LIKE '%$nombre%' and paterno LIKE '%$paterno%' and materno LIKE '%$materno%' and nivel!=1 and $nivel");
	$titulo=array("usuario"=>"Usuario","nombre"=>"Nombre","paterno"=>"Paterno","materno"=>"Materno","nivel"=>"Nivel de Usuario");
    $datos=array();
    foreach($usu as $d){$i++;
        $datos[$i]['codusuarios']=$d['codusuarios'];
        $datos[$i]['nombre']=$d['nombre'];
        $datos[$i]['paterno']=$d['paterno'];
        $datos[$i]['materno']=$d['materno'];
        $datos[$i]['usuario']=$d['usuario'];
        switch($d['nivel']){
            case '2':{$Nivel="Dirección";}break;   
            case '3':{$Nivel="Docente";}break;   
            case '4':{$Nivel="Secretaria";}break;    
        }
        $datos[$i]['nivel']=$Nivel;
    }
	listadoTabla($titulo,$datos,1,"modificar.php","eliminar.php","ver.php");
}
?>