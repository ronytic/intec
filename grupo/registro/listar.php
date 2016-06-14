<?php
include_once("../../login/check.php");
$titulo="Listado de Grupos";
$folder="../../";

include_once("../../class/carrera.php");
$carrera=new carrera;
$car=todolista($carrera->mostrarTodo("","nombre"),"codcarrera","nombre");

$garantia=array(1=>"Si",0=>"No");
include_once("../../funciones/funciones.php");
include_once "../../cabecerahtml.php";
?>
<?php include_once "../../cabecera.php";
$us=todolista($usuarios->mostrarTodo("nivel=3","nombre"),"codusuarios","paterno,materno,nombre");
?>
<div class="grid_12">
	<div class="contenido imagenfondo">
    	<div class="grid_6 prefix_3 alpha">
        	<fieldset>
        	<div class="titulo"><?php echo $titulo?> - Criterio de Búsqueda</div>
            <form id="busqueda" action="busqueda.php" method="post" >
                <table class="tablabus">
                    <tr>
                        <td><?php campos("Carrera","codcarrera","select",$car,0,array(""=>""));?></td>
                        <td><?php campos("Docente","coddocente","select",$us,0,array(""=>""));?></td>
                        <td><?php campos("Nombre de Grupo","nombregrupo","text","",1,array("size"=>15));?></td>
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
