<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Modificar datos de Alumno";
$id=$_GET['id'];
include_once '../../class/alumno.php';
$alumno=new alumno;
$al=array_shift($alumno->mostrar($id));

include_once("../../class/carrera.php");
$carrera=new carrera;
$cur=todolista($carrera->mostrarTodo(),"codcarrera","nombre","");

$foto="../foto/".$al['foto'];
if(!file_exists($foto) && $al['foto']!=""){
	$foto="../foto/0.jpg";
}
include_once '../../funciones/funciones.php';
include_once '../../cabecerahtml.php';
?>
<script language="javascript">
$(document).on("ready",function(){
    $("#codcarrera").change(actualizar);
    actualizar();
    function actualizar() {
        $.post("grupo.php",{"codcarrera":($("#codcarrera").val())},function(data){
            $("#codgrupo").html(data);
        })
    }
})
</script>
<?php include_once '../../cabecera.php';?>
<div class="grid_12">
	<div class="contenido imagenfondo">
    	<form action="actualizar.php" method="post" enctype="multipart/form-data">
        <?php campos("","id","hidden",$id);?>
    	<div class="prefix_0 grid_6 alpha">
			<fieldset>
				<div class="titulo"><?php echo $titulo?></div>
                
				<table class="tablareg">
                	<tr>
                    	<td><?php campos("Apellido Paterno","paterno","text",$al['paterno'],1,array("required"=>"required"));?></td>
						<td><?php campos("Apellido Materno","materno","text",$al['materno'],0,array("required"=>"required"));?></td>
					</tr>
                    <tr>
						<td><?php campos("Nombres","nombres","text",$al['nombres'],0,array("required"=>"required"));?></td>
						<td><?php campos("Fecha Nacimiento","fechanac","date",$al['fechanac'],0,array("required"=>"required"));?></td>
					</tr>
                    <tr>
						<td><?php campos("C.I.","ci","text",$al['ci'],0,array("required"=>"required"));?></td>
                    	<td><?php campos("Sexo","sexo","select",array("0"=>"Femenino","1"=>"Masculino"),0,"",$al['sexo']);?></td>
                    </tr>
                    <tr>
						<td><?php campos("Zona","zona","text",$al['zona'],0,array("required"=>"required"));?></td>
						<td><?php campos("Calle","calle","text",$al['calle'],0,array("required"=>"required"));?></td>
					</tr>
                    <tr>
						<td><?php campos("Número","numero","text",$al['numero'],0,array("required"=>"required"));?></td>
					</tr>
                    <tr>
						<td><?php campos("Teléfono Casa","telefonocasa","text",$al['telefonocasa'],0,array("required"=>"required"));?></td>
						<td><?php campos("Celular","celular","text",$al['celular'],0,array("required"=>"required"));?></td>
					</tr>
				</table>
			</fieldset>
		</div>
        <div class="prefix_0 grid_5">
			<fieldset>
				<div class="titulo">Datos Secundarios</div>
                <table class="tablareg">
                    <tr>
						<td colspan="2"><?php campos("Carrera","codcarrera","select",$cur,"","",$al['codcarrera']);?></td>
						
					</tr>
                    <tr>
                    <td colspan="2"><?php campos("Grupo","codgrupo","select","");?></td>
                    </tr>
                	<tr>
                    	<td><?php campos("Matricula","matricula","text",$al['matricula']);?></td>
                        <td><?php campos("Mensualidad","mensualidad","text",$al['mensualidad']);?></td>
                    </tr>
                     
                    <tr>
						<td colspan="2"><?php campos("Foto","foto","file","",0,array(""=>""));?>
                        <?php if($al['foto']!=""){?>
                        <hr class="separador">
                        <a href="<?php echo $foto?>" target="_blank">
                            <img src="<?php echo $foto?>" width="100" height="100">
                            <br>
                            Abrir en otra Ventana
                        </a>
                        <?php }?>
                        </td>
					</tr>
                    
                </table>
        	</fieldset>
            <fieldset>
            <div class="titulo">Dias de Clases</div>
                 <table class="tablareg">
                	<tr>
                    	<td><?php campos("Lunes","dialunes","checkbox","1",0,$al['dialunes']?array("checked"=>"checked"):"");?></td>
                        <td><?php campos("Martes","diamartes","checkbox","1",0,$al['diamartes']?array("checked"=>"checked"):"");?></td>
                        <td><?php campos("Miercoles","diamiercoles","checkbox","1",0,$al['diamiercoles']?array("checked"=>"checked"):"");?></td>
                        <td><?php campos("Jueves","diajueves","checkbox","1",0,$al['diajueves']?array("checked"=>"checked"):"");?></td>
                        <td><?php campos("Viernes","diaviernes","checkbox","1",0,$al['diaviernes']?array("checked"=>"checked"):"");?></td>
                        <td><?php campos("Sábado","diasabado","checkbox","1",0,$al['diasabado']?array("checked"=>"checked"):"");?></td>
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