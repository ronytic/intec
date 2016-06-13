<?php
include_once("../../login/check.php");
$titulo="Estadística de Notas";
$folder="../../";

include_once("../../class/curso.php");
$curso=new curso;
$cur=todolista($curso->mostrarTodo(),"codcurso","nombre","");

include_once("../../class/materia.php");
$materia=new materia;
$mat=todolista($materia->mostrarTodo("","nombre"),"codmateria","nombre","");

include_once("../../funciones/funciones.php");
include_once "../../cabecerahtml.php";
?>
<script language="javascript" src="../../js/highcharts.js"></script>
<?php include_once "../../cabecera.php";?>
<div class="grid_12">
	<div class="contenido imagenfondo">
    	<div class="grid_8 prefix_2 alpha">
        	<fieldset>
        	<div class="titulo"><?php echo $titulo?> - Criterio de Búsqueda</div>
            <form id="busqueda" action="busqueda.php" method="post" >
                <table class="tablabus">
                    <tr>
                        <td width="250" colspan="2"><?php campos("Curso","codcurso","select",$cur);?></td>
                        <td width="250" colspan="2"><?php campos("Materia","codmateria","select",$mat);?></td>
                        <td><?php campos("Trimestre","trimestre","select",array("1"=>"1","2"=>"2","3"=>"3","4"=>"4"));?></td>
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
