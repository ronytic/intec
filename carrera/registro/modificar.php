<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Modificar Carrera";
$id=$_GET['id'];
include_once '../../class/carrera.php';
$carrera=new carrera;
$car=array_shift($carrera->mostrar($id));


include_once '../../funciones/funciones.php';
include_once '../../cabecerahtml.php';
?>
<?php include_once '../../cabecera.php';?>
<div class="grid_12">
	<div class="contenido imagenfondo">
    	<div class="prefix_4 grid_4 alpha">
			<fieldset>
				<div class="titulo"><?php echo $titulo?></div>
                <form action="actualizar.php" method="post" enctype="multipart/form-data">
                <?php campos("","id","hidden",$id);?>
				<table class="tablareg">
                    <tr>
						<td><?php campos("Nombre de la Carrera","nombre","text",$car['nombre'],0,array("size"=>"40"));?></td>
					</tr>
                    <tr>
						<td><?php campos("Detalle","detalle","text",$car['detalle'],0,array("size"=>"40"));?></td>
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