<?php
include_once("../../class/grupo.php");
$grupo=new grupo;
$gr=$grupo->mostrarTodo("codcarrera=".$_POST['codcarrera'],"nombregrupo");
?>
<?php foreach($gr as $g){?>
<option value="<?php echo $g['codgrupo'];?>"><?php echo $g['nombregrupo'];?> - <?php echo $g['horainicio'];?> - <?php echo $g['horafinal'];?></option>
<?php }?>