<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Registro de Nuevo Alumno";

include_once("../../class/carrera.php");
$carrera=new carrera;
$cur=todolista($carrera->mostrarTodo("","nombre"),"codcarrera","nombre","");

include_once '../../funciones/funciones.php';
include_once '../../cabecerahtml.php';
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
<?php include_once '../../cabecera.php';?>
<div class="grid_12">
	<div class="contenido imagenfondo">
    	<form action="guardar.php" method="post" enctype="multipart/form-data">
    	<div class="prefix_0 grid_6 alpha">
			<fieldset>
				<div class="titulo"><?php echo $titulo?>Datos Personales</div>
                
				<table class="tablareg">
                	<tr>
						<td><?php campos("Apellido Paterno","paterno","text","",1,array("required"=>"required"));?></td>
                        <td><?php campos("Apellido Materno","materno","text","",0,array("required"=>"required"));?></td>
					</tr>
                    <tr>
						<td><?php campos("Nombres","nombres","text","",0,array("required"=>"required"));?></td>
						<td><?php campos("Fecha Nacimiento","fechanac","date","",0,array("required"=>"required"));?></td>
					</tr>
                    <tr>
						<td><?php campos("C.I.","ci","text","",0,array("required"=>"required"));?></td>
                    	<td><?php campos("Sexo","sexo","select",array("0"=>"Femenino","1"=>"Masculino"));?></td>
                    </tr>
                    <tr>
						<td><?php campos("Zona","zona","text","",0,array("required"=>"required"));?></td>
						<td><?php campos("Calle","calle","text","",0,array("required"=>"required"));?></td>
					</tr>
                    <tr>
						<td><?php campos("Número","numero","text","",0,array("required"=>"required"));?></td>
					</tr>
                    <tr>
						<td><?php campos("Teléfono Casa","telefonocasa","text","",0,array("required"=>"required"));?></td>
						<td><?php campos("Celular","celular","text","",0,array("required"=>"required"));?></td>
					</tr>
                   

				</table>
			</fieldset>
		</div>
        <div class="grid_5 ">
			<fieldset>
				<div class="titulo">Datos Secundarios</div>
                <table class="tablareg">
                    <tr>
						<td colspan="2"><?php campos("Carrera","codcarrera","select",$cur);?></td>
						
					</tr>
                    <tr>
                    <td colspan="2"><?php campos("Grupo","codgrupo","select",$cur);?></td>
                    </tr>
                	<tr>
                    	<td><?php campos("Matricula","matricula","text","");?></td>
                        <td><?php campos("Mensualidad","mensualidad","text","");?></td>
                    </tr>
                     
                    <tr>
						<td colspan="2"><?php campos("Foto","foto","file","",0,array(""=>""));?></td>
					</tr>
                    
                </table>
        	</fieldset>
            <fieldset>
            <div class="titulo">Dias de Clases</div>
                 <table class="tablareg">
                	<tr>
                    	<td><?php campos("Lunes","dialunes","checkbox","1");?></td>
                        <td><?php campos("Martes.","diamartes","checkbox","1");?></td>
                        <td><?php campos("Miercoles","diamiercoles","checkbox","1");?></td>
                        <td><?php campos("Jueves","diajueves","checkbox","1");?></td>
                        <td><?php campos("Viernes","diaviernes","checkbox","1");?></td>
                        <td><?php campos("Sábado","diasabado","checkbox","1");?></td>
                    </tr>
                    <tr><td colspan="5"><?php campos("Guardar","guardar","submit");?></td></tr>
                </table>
            </fieldset>
		</div>     
        </form>
    	<div class="clear"></div>
    </div>
</div>
<?php include_once '../../piepagina.php';?>