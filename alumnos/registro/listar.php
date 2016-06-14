<?php
include_once("../../login/check.php");
$titulo="Listado de Alumnos";
$folder="../../";

include_once("../../class/carrera.php");
$carrera=new carrera;
$cur=todolista($carrera->mostrarTodo(),"codcarrera","nombre","");


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
                    	<td><?php campos("Apellido Paterno","paterno","text","",1,array("size"=>15));?></td>
                        <td><?php campos("Apellido Materno","materno","text","",0,array("size"=>15));?></td>
                        <td><?php campos("Nombres","nombres","text","",0,array("size"=>15));?></td>
                        <td width="250" colspan="2"><?php campos("Carrera","codcarrera","select",$cur);?></td>
                    </tr>
                    <tr>
                        
                        <td colspan="2"><?php campos("Grupo","codgrupo","select",$cur);?></td>
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
