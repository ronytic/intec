<?php
include_once("../../login/check.php");
$titulo="Registro de Notas";
$folder="../../";


$idusuario=$_SESSION['idusuario'];
include_once("../../class/grupo.php");
$grupo=new grupo;
include_once("../../class/carrera.php");
$carrera=new carrera;

foreach($grupo->mostrarTodo("coddocente=".$idusuario) as $g){
	$car=array_shift($carrera->mostrar($g['codcarrera']));
	//$mate=array_shift($materia->mostrar($dmc['codmateria']));
	$c[$g['codcarrera']]=$car['nombre'];
}
//print_r($c);

include_once("../../funciones/funciones.php");
include_once "../../cabecerahtml.php";
?>
<script language="javascript" type="text/javascript">
$(document).on("ready",function(){
    $(document).on("change",".notas,.turno",function(){
        var n=$(this).attr("rel");
        var sn=0;
        $(".notas[rel="+n+"]").each(function(index, element) {
           sn+=parseInt($(this).val());
           
        });
        //var nf=Math.round(parseInt(sn/4));
        var nf=sn;
        $(".nota"+n).val(nf);
        var turno=parseInt($(".turno[rel="+n+"]").val());
        if(turno>0){
            var nff=parseInt((nf+turno)/2);
        }else{
            var nff=nf;    
        }
        $(".t"+n).val(nff);
        if(nff<51){
            $(".t"+n).addClass("rojo");
        }else{
            $(".t"+n).removeClass("rojo");
        }
        
    });
});
</script>
<script language="javascript">
$(document).on("ready",function(){
    $("#codcarrera").change(function(e) {
        $.post("grupo.php",{"codcarrera":($("#codcarrera").val())},function(data){
            $("#codgrupo").html(data);
        })
    });
})
</script>
<?php include_once "../../cabecera.php";?>
<div class="grid_12">
	<div class="contenido imagenfondo">
    	<div class="grid_8 prefix_2 alpha">
        	<fieldset>
        	<div class="titulo">Módulo de Docente - <?php echo $titulo?> - Criterio de Búsqueda</div>
            <form id="busqueda" action="busqueda.php" method="post" >
                <table class="tablabus">
                    <tr>
                        <td width="400"><?php campos("Carrera","codcarrera","select",$c);?></td>
                        <td><?php campos("Grupo","codgrupo","select","");?></td>
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
