<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Modificar Datos del Grupo";
$id=$_GET['id'];
include_once '../../class/grupo.php';
$grupo=new grupo;
$g=array_shift($grupo->mostrar($id));
include_once("../../class/carrera.php");
$carrera=new carrera;
$car=todolista($carrera->mostrarTodo("","nombre"),"codcarrera","nombre");
$garantia=array(1=>"Si",0=>"No");

include_once '../../funciones/funciones.php';
include_once '../../cabecerahtml.php';
?>
<?php include_once '../../cabecera.php';
$us=todolista($usuarios->mostrarTodo("nivel=3","nombre"),"codusuarios","paterno,materno,nombre");
?>
<div class="grid_12">
	<div class="contenido imagenfondo">
    	<div class="prefix_4 grid_4 alpha">
			<fieldset>
				<div class="titulo"><?php echo $titulo?></div>
                <form action="actualizar.php" method="post" enctype="multipart/form-data">
                <?php campos("","id","hidden",$id);?>
				<table class="tablareg">
                    <tr>
						<td><?php campos("Carrera","codcarrera","select",$car,0,array("required"=>"required"),$g['codcarrera']);?></td>
					</tr>
                    <tr>
						<td><?php campos("Docente","coddocente","select",$us,0,array("required"=>"required"),$g['coddocente']);?></td>
					</tr>
                    <tr>
						<td><?php campos("Nombre de Grupo","nombregrupo","text",$g['nombregrupo'],0,array("size"=>"40"));?></td>
					</tr>
                    <tr>
						<td><?php campos("Detalle del Grupo","detallegrupo","text",$g['detallegrupo'],0,array("size"=>"40"));?></td>
					</tr>
                    <tr>
						<td><?php campos("Hora de Inicio","horainicio","time",$g['horainicio'],0,array("required"=>"required"));?></td>
					</tr>
                    <tr>
						<td><?php campos("Hora Final","horafinal","time",$g['horafinal'],0,array("required"=>"required"));?></td>
					</tr>
                  
					<tr><td><?php campos("Guardar","guardar","submit");?></td></tr>
				</table>
                </form>
			</fieldset>
		</div>
    	<div class="clear"></div>
    </div>
</div>
<?php include_once '../../piepagina.php';?>