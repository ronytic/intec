<?php
include_once("../../login/check.php");
$titulo="Listado de Asignación de Docente Materias y Curso";
$folder="../../";

include_once("../../class/usuarios.php");
include_once("../../class/materia.php");
include_once("../../class/curso.php");
$usuarios=new usuarios;
$materia=new materia;
$curso=new curso;
$cur=todolista($curso->mostrarTodo("","nombre"),"codcurso","nombre","");
$mat=todolista($materia->mostrarTodo("","nombre"),"codmateria","nombre","");
$usua=todolista($usuarios->mostrarTodo("nivel=3","paterno,materno,nombre"),"codusuarios","paterno,materno,nombre","");

include_once("../../funciones/funciones.php");
include_once "../../cabecerahtml.php";
?>
<?php include_once "../../cabecera.php";?>
<div class="grid_12">
	<div class="contenido imagenfondo">
    	<div class="grid_9 prefix_1 alpha">
        	<fieldset>
        	<div class="titulo"><?php echo $titulo?> - Criterio de Búsqueda</div>
            <form id="busqueda" action="busqueda.php" method="post" >
                <table class="tablabus">
                	<tr>
						<td width="200"><?php campos("Curso","codcurso","select",$cur,0);?></td>
						<td width="200"><?php campos("Materia","codmateria","select",$mat,0);?></td>
						<td width="200"><?php campos("Docente","coddocente","select",$usua,0);?></td>
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
