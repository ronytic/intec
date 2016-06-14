<?php
include_once("../../login/check.php");
$titulo="Listado de Asistencia";
$folder="../../";

include_once("../../class/carrera.php");
$carrera=new carrera;
$cur=todolista($carrera->mostrarTodo("","nombre"),"codcarrera","nombre","");

include_once("../../funciones/funciones.php");
include_once "../../cabecerahtml.php";
?>
<script language="javascript">
$(document).on("ready",function(){
    $("#codcarrera").change(function(e) {
        $.post("grupo.php",{"codcarrera":($("#codcarrera").val())},function(data){
            $("#codgrupo").html(data);
        })
    });
})
</script>
<?php include_once "../../cabecera.php";?>
<div class="grid_12">
	<div class="contenido imagenfondo">
    	<div class="grid_8 prefix_1 alpha">
        	<fieldset>
        	<div class="titulo"><?php echo $titulo?> - Criterio de Búsqueda</div>
            <form id="busqueda" action="busqueda.php" method="post" >
                <table class="tablabus">
                    <tr>
                        <td width="250"><?php campos("Carrera","codcarrera","select",$cur,0,array("required"=>"required"));?></td>
                        <td><?php campos("Fecha de Asistencia","fechaasistencia","date",date("Y-m-d"));?></td>
                    </tr>
                    <tr>
                        <td><?php campos("Grupo","codgrupo","select","",0,array("required"=>"required"));?></td>
                        
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
