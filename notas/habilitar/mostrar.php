<?php
include_once("../../class/docentemateriacurso.php");
$docentemateriacurso=new docentemateriacurso;
include_once("../../class/usuarios.php");
$usuarios=new usuarios;
include_once("../../class/materia.php");
$materia=new materia;
$docmatcur=$docentemateriacurso->mostrarTodo("codcurso=".$_POST['codcurso']);
?>
<table class="borde">
<tr class="resaltar"><td>N</td><td>Materia</td><td>Docente</td></tr>

<?php
foreach($docmatcur as $dmc){$i++;

$doc=$usuarios->mostrarTodos("codusuarios=".$dmc['coddocente']);
$doc=array_shift($doc);
$mat=$materia->mostrarTodos("codmateria=".$dmc['codmateria']);
//print_r($doc);
$mat=array_shift($mat);
?>
<tr>
    <td><?php echo $i?></td>
    
    <td><?php echo $mat['nombre']?></td>
    <td><?php echo $doc['nombre']?> <?php echo $doc['paterno']?> <?php echo $doc['materno']?></td>
</tr>
<?php    
}
?>
</table>