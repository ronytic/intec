<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Datos de Alumno";
$id=$_GET['id'];
include_once '../../class/alumno.php';
$alumno=new alumno;
$al=array_shift($alumno->mostrar($id));

include_once("../../class/carrera.php");
$carrera=new carrera;
$cur=array_shift($carrera->mostrarTodo("codcarrera=".$al['codcarrera']));

include_once("../../class/grupo.php");
$grupo=new grupo;
$gr=array_shift($grupo->mostrarTodo("codgrupo=".$al['codgrupo']));
include_once("../../class/cuota.php");
$cuota=new cuota;
$cu=array_shift($cuota->mostrarTodo("codalumno=".$id));

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
                    	<td class="der resaltar">Paterno:</td>
                        <td><?php echo $al['paterno'];?></td>
					</tr>
                    <tr>
                        <td class="der resaltar">Materno:</td>
                        <td><?php echo $al['materno'];?></td>
                    </tr>
                    <tr>
                        <td class="der resaltar">Nombres:</td>
   						<td><?php echo $al['nombres'];?></td>
                    </tr>
                    <tr>
                        <td class="der resaltar">C.I.:</td>
						<td><?php echo $al['ci'];?></td>
                    </tr>
                    <tr>
                        <td class="der resaltar">Carrera:</td>
						<td><?php echo $cur['nombre'];?></td>
                    </tr>
                    <tr>
                        <td class="der resaltar">Grupo:</td>
						<td><?php echo $gr['nombregrupo'];?></td>
                    </tr>
                    <tr>
                        <td class="der resaltar">Mensualidad:</td>
						<td><?php echo $al['mensualidad'];?></td>
                    </tr>
				</table>
			</fieldset>
		</div>
        <div class="prefix_0 grid_5">
			<fieldset>
				<div class="titulo">Cuotas</div>
                 <table class="tablareg">
                    <?php for($i=1;$i<=9;$i++){?>
                	<tr>
                    	<td><?php campos("$i Cuota","cuota$i","checkbox","1",0,$cu['cuota'.$i]?array("checked"=>"checked"):"");?></td>
                        <td><?php campos(($i+9)." Cuota","cuota".($i+9),"checkbox","1",0,$cu['cuota'.($i+9)]?array("checked"=>"checked"):"");?></td>
                        <td><?php campos(($i+18)." Cuota","cuota".($i+18),"checkbox","1",0,$cu['cuota'.($i+18)]?array("checked"=>"checked"):"");?></td>
                        <td><?php campos(($i+27)." Cuota","cuota".($i+27),"checkbox","1",0,$cu['cuota'.($i+27)]?array("checked"=>"checked"):"");?></td>
                    </tr>
                    <?php }?>
                    <tr><td colspan="5"><?php campos("Guardar","guardar","submit");?></td></tr>
                </table>
            </fieldset>
		</div>     
        </form>
    	<div class="clear"></div>
    </div>
</div>
<?php include_once '../../piepagina.php';?>