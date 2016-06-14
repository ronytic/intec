<?php
include_once("../../class/usuarios.php");
$usuarios=new usuarios;
include_once("../../class/grupo.php");
$grupo=new grupo;
$gru=array_shift($grupo->mostrarTodo("codgrupo=".$_POST['codgrupo']));
$doc=$usuarios->mostrarTodos("codusuarios=".$gru['coddocente']);
$doc=array_shift($doc);
?>
<table class="borde">
<tr class="resaltar">
    <td>Docente</td>
    <td><?php echo $doc['nombre']?> <?php echo $doc['paterno']?> <?php echo $doc['materno']?></td>
</tr>
<?php    
?>
</table>