<?php
include_once("../../login/check.php");
$titulo="Estadística de Asistencia";
$folder="../../";

include_once("../../class/curso.php");
$curso=new curso;
$cur=todolista($curso->mostrarTodo(),"codcurso","nombre","");

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
                        <td><?php campos("Fecha de Asistencia","fechaasistencia","date",date("Y-m-d"));?></td>
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
