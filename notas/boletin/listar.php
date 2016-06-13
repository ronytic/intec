<?php
include_once("../../login/check.php");
$titulo="Listado de Alumnos - Búsqueda para Boletín";
$folder="../../";

include_once("../../class/curso.php");
$curso=new curso;
$cur=todolista($curso->mostrarTodo(),"codcurso","nombre","");

$dest=array("Procesado"=>"Procesado","Directo"=>"Directo");
include_once("../../funciones/funciones.php");
include_once "../../cabecerahtml.php";
?>
<?php include_once "../../cabecera.php";?>
<div class="grid_12">
	<div class="contenido imagenfondo">
    	<div class="grid_8 prefix_2 alpha">
        	<fieldset>
        	<div class="titulo"><?php echo $titulo?> - Criterio de Búsqueda</div>
            <form id="busqueda" action="busqueda.php" method="post" >
                <table class="tablabus">
                    <tr>
                    	<td><?php campos("Apellido Paterno","paterno","text","",1,array("size"=>15));?></td>
                        <td><?php campos("Apellido Materno","materno","text","",0,array("size"=>15));?></td>
                        <td><?php campos("Nombres","nombres","text","",0,array("size"=>15));?></td>
                    </tr>
                    <tr>
                        <td width="250" colspan="2"><?php campos("Curso","codcurso","select",$cur);?></td>
                        <td><?php campos("Sexo","sexo","select",array("0"=>"Femenino","1"=>"Masculino","%"=>"Todos"),0,"","%");?></td>
                        <td><?php campos("Buscar","enviar","submit","",0,array("size"=>15));?></td>
                    </tr>
                </table>
            </form>
            </fieldset>
        </div>
        <div class="clear"></div>
        <div id="respuesta"></div>
    </div>
</div>
<?php include_once "../../piepagina.php";?>
