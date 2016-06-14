<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Registro de Nuevo Grupo";
include_once("../../class/carrera.php");
$carrera=new carrera;
$car=todolista($carrera->mostrarTodo("","nombre"),"codcarrera","nombre");





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
                <form action="guardar.php" method="post" enctype="multipart/form-data">
				<table class="tablareg">
                    <tr>
						<td><?php campos("Carrera","codcarrera","select",$car,0,array("required"=>"required"));?></td>
					</tr>
                    <tr>
						<td><?php campos("Docente","coddocente","select",$us,0,array("required"=>"required"));?></td>
					</tr>
                    <tr>
						<td><?php campos("Nombre de Grupo","nombregrupo","text","",0,array("size"=>"40"));?></td>
					</tr>
                    <tr>
						<td><?php campos("Detalle del Grupo","detallegrupo","text","",0,array("size"=>"40"));?></td>
					</tr>
                    <tr>
						<td><?php campos("Hora de Inicio","horainicio","time","00:00",0,array("required"=>"required"));?></td>
					</tr>
                    <tr>
						<td><?php campos("Hora Final","horafinal","time","00:00",0,array("required"=>"required"));?></td>
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