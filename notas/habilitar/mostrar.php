<?php
include_once("../../class/usuarios.php");
$usuarios=new usuarios;
include_once("../../class/grupo.php");
$grupo=new grupo;
$gru=array_shift($grupo->mostrarTodo("codgrupo=".$_POST['codgrupo']));
$doc=$usuarios->mostrarTodos("codusuarios=".$gru['coddocente']);
$doc=array_shift($doc);

include_once("../../class/notas.php");
$notas=new notas;

$n=$notas->mostrarTodos("codgrupo=".$_POST['codgrupo']);

?>
<table class="borde">
<tr class="resaltar">
    <td>Docente:</td>
    <td><?php echo $doc['nombre']?> <?php echo $doc['paterno']?> <?php echo $doc['materno']?></td>
</tr>
<?php    
?>
</table>
<?php if(count($n)>0){?>
<div class="rojoC">
<strong>YA SE ENCUENTRA HABILITADO LAS NOTAS PARA ESE GRUPO</strong>
</div>
<?php }else{
    ?>
<div class="verdeC">
ESTE GRUPO SE ENCUENTRA DISPONIBLE PARA SU HABILITACIÓN
</div>
<?php    
}?>