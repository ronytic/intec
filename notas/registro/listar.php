<?php
include_once("../../login/check.php");
$titulo="Registro de Notas";
$folder="../../";


$idusuario=$_SESSION['idusuario'];
include_once("../../class/docentemateriacurso.php");
$docentemateriacurso=new docentemateriacurso;
include_once("../../class/materia.php");
$materia=new materia;
include_once("../../class/curso.php");
$curso=new curso;
foreach($docentemateriacurso->mostrarTodo("coddocente=".$idusuario) as $dmc){
	$cur=array_shift($curso->mostrar($dmc['codcurso']));
	$mate=array_shift($materia->mostrar($dmc['codmateria']));
	$mat['coddocentemateriacurso']=$mate['nombre']." - ".$cur['nombre'];
}

include_once("../../funciones/funciones.php");
include_once "../../cabecerahtml.php";
?>
<script language="javascript" type="text/javascript">
$(document).on("ready",function(){
    $(document).on("change",".notas",function(){
        var n=$(this).attr("rel");
        var sn=0;
        $(".notas[rel="+n+"]").each(function(index, element) {
           sn+=parseInt($(this).val());
           
        });
        var nf=Math.round(parseInt(sn/4));
        $(".t"+n).val(nf);
        if(nf<51){
            $(".t"+n).addClass("rojo");
        }else{
            $(".t"+n).removeClass("rojo");
        }
        
    });
});
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
                        <td width="400"><?php campos("Curso - Materia","coddocentemateriacurso","select",$mat);?></td>
                        <td><?php campos("Bimestre","bimestre","select",array("1"=>"1","2"=>"2","3"=>"3","3"=>"3","4"=>"4"));?></td>
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
