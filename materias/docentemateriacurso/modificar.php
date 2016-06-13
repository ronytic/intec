<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Modificar Materia";
$id=$_GET['id'];
include_once '../../class/docentemateriacurso.php';
$docentemateriacurso=new docentemateriacurso;
$dmc=array_shift($docentemateriacurso->mostrar($id));

include_once("../../class/usuarios.php");
include_once("../../class/materia.php");
include_once("../../class/curso.php");
$usuarios=new usuarios;
$materia=new materia;
$curso=new curso;
$cur=todolista($curso->mostrarTodo("","nombre"),"codcurso","nombre","");
$mat=todolista($materia->mostrarTodo("","nombre"),"codmateria","nombre","");
$usua=todolista($usuarios->mostrarTodo("nivel=3","paterno,materno,nombre"),"codusuarios","paterno,materno,nombre","");
include_once '../../funciones/funciones.php';
include_once '../../cabecerahtml.php';
?>
<script language="javascript">
$(document).ready(function(e) {
    
});
</script>
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
						<td><?php campos("Curso","codcurso","select",$cur,0,"",$dmc['codcurso']);?></td>
					</tr>
                    <tr>
						<td><?php campos("Materia","codmateria","select",$mat,0,"",$dmc['codmateria']);?></td>
					</tr>
                    <tr>
						<td><?php campos("Docente","coddocente","select",$usua,0,"",$dmc['coddocente']);?></td>
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