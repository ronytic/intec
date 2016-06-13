<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Habilitar Registro de Notas";

$garantia=array(1=>"Si",0=>"No");
include_once("../../class/curso.php");
$curso=new curso;
$cur=todolista($curso->mostrarTodo("","nombre"),"codcurso","nombre","");
include_once '../../funciones/funciones.php';
include_once '../../cabecerahtml.php';
?>
<script language="javascript" type="text/javascript">
$(document).on("ready",function(){
    $("#codcurso").change(function(e) {
        var codcurso=$("#codcurso").val();
        $.post("mostrar.php",{"codcurso":codcurso},function(data){
            $(".mensajelista").html(data)
        });
    });    
})
</script>
<?php include_once '../../cabecera.php';?>
<div class="grid_12">
	<div class="contenido imagenfondo">
    	<div class="prefix_4 grid_4 alpha">
			<fieldset>
				<div class="titulo"><?php echo $titulo?></div>
                <form action="guardar.php" method="post" enctype="multipart/form-data">
				<table class="tablareg">
                    <tr>
                        <td><?php campos("Curso","codcurso","select",$cur,0);?></td>
                    </tr>
                    <tr>
                        <td class="mensajelista"></td>
                    </tr>
                    <tr>
						<td><div class="rojoC">
                        <strong>REVISE MUY BIEN LA LISTA DE DOCENTE ASIGNADOS ANTES DE HABILTIAR LAS NOTAS POR CURSO</strong>
                        <strong>SELECCIONE UN CURSO PARA QUE SEA GENERADO EL REGISTRO DE NOTAS PARA LOS 4 BIMESTRES.</strong><br><br>
                         TENGA EN CUENTA QUE SE SI YA SE GENERÓ CON ANTERIORIDAD SERAN REEMPLAZADOS Y ESTARAN SIN REGISTROS</div></td>
					</tr>
                 
					<tr><td><?php campos("Habilitar Notas ","guardar","submit");?></td></tr>
				</table>
                </form>
			</fieldset>
		</div>
    	<div class="clear"></div>
    </div>
</div>
<?php include_once '../../piepagina.php';?>