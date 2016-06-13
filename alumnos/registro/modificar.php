<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Modificar datos de Alumno";
$id=$_GET['id'];
include_once '../../class/alumno.php';
$alumno=new alumno;
$al=array_shift($alumno->mostrar($id));

include_once("../../class/curso.php");
$curso=new curso;
$cur=todolista($curso->mostrarTodo(),"codcurso","nombre","");

$foto="../foto/".$al['foto'];
if(!file_exists($foto) && $al['foto']!=""){
	$foto="../foto/0.jpg";
}
include_once '../../funciones/funciones.php';
include_once '../../cabecerahtml.php';
?>
<?php include_once '../../cabecera.php';?>
<div class="grid_12">
	<div class="contenido imagenfondo">
    	<form action="actualizar.php" method="post" enctype="multipart/form-data">
        <?php campos("","id","hidden",$id);?>
    	<div class="prefix_0 grid_6 alpha">
			<fieldset>
				<div class="titulo"><?php echo $titulo?></div>
                
				<table class="tablareg">
                	<tr>
                    	<td><?php campos("Apellido Paterno","paterno","text",$al['paterno'],0,array("required"=>"required"));?></td>
						<td><?php campos("Apellido Materno","materno","text",$al['materno'],1,array("required"=>"required"));?></td>
					</tr>
                    <tr>
						<td><?php campos("Nombres","nombres","text",$al['nombres'],0,array("required"=>"required"));?></td>
					</tr>
                    <tr>
						<td><?php campos("Lugar de Nacimiento","lugarnac","text",$al['lugarnac'],0,array("required"=>"required"));?></td>
						<td><?php campos("Fecha Nacimiento","fechanac","date",$al['fechanac'],0,array("required"=>"required"));?></td>
					</tr>
                    <tr>
						<td><?php campos("C.I.","ci","text",$al['ci'],0,array("required"=>"required"));?></td>
                    	<td><?php campos("Sexo","sexo","select",array("0"=>"Femenino","1"=>"Masculino"),0,"",$al['sexo']);?></td>
                    </tr>
                    <tr>
						<td><?php campos("Zona","zona","text",$al['zona'],0,array("required"=>"required"));?></td>
						<td><?php campos("Calle","calle","text",$al['calle'],0,array("required"=>"required"));?></td>
					</tr>
                    <tr>
						<td><?php campos("Número","numero","text",$al['numero'],0,array("required"=>"required"));?></td>
					</tr>
                    <tr>
						<td><?php campos("Teléfono Casa","telefonocasa","text",$al['telefonocasa'],0,array("required"=>"required"));?></td>
						<td><?php campos("Celular","celular","text",$al['celular'],0,array("required"=>"required"));?></td>
					</tr>
                    <tr>
						<td><?php campos("Curso","codcurso","select",$cur,0,"",$al['codcurso']);?></td>
						<td><?php campos("Rude","rude","text",$al['rude'],0,array("required"=>"required"));?></td>
					</tr>
                    <tr>
						<td colspan="2"><?php campos("Observación","observacion","textarea",$al['observacion']);?></td>
					</tr>
                    <tr>
						<td colspan="2"><?php campos("Foto","foto","file","",0,array());?>
                        <hr class="separador">
                        <a href="<?php echo $foto?>" target="_blank">
                            <img src="<?php echo $foto?>" width="100" height="100">
                            <br>
                            Abrir en otra Ventana
                        </a>
                        </td>
					</tr>
					
				</table>
			</fieldset>
		</div>
        <div class="prefix_0 grid_5">
			<fieldset>
				<div class="titulo">Datos de Padre de Familia</div>
                <table class="tablareg">
                	<tr>
                    	<td><?php campos("Apellidos Padre","apellidospadre","text",$al['apellidospadre']);?></td>
                        <td><?php campos("Nombres Padre","nombrespadre","text",$al['nombrespadre']);?></td>
                    </tr>
                    <tr>
                    	<td><?php campos("C.I. Padre","cipadre","text",$al['cipadre']);?></td>
                        
                    </tr>
                    <tr>
                    	<td><?php campos("Apellidos Madre","apellidosmadre","text",$al['apellidosmadre']);?></td>
                        <td><?php campos("Nombres Madre","nombresmadre","text",$al['nombresmadre']);?></td>
                    </tr>
                    <tr>
                    	<td><?php campos("C.I. Madre","cimadre","text",$al['cimadre']);?></td>
                        
                    </tr>
                    
                </table>
        	</fieldset>
            <fieldset>
            <div class="titulo">Datos de Padre de Familia</div>
                 <table class="tablareg">
                	<tr>
                    	<td><?php campos("Fotocopia de CI","fotocopiaci","checkbox","1",0,$al['fotocopiaci']?array("checked"=>"checked"):"");?></td>
                        <td><?php campos("Fotocopia Cert.Nac.","fotocopianacimiento","checkbox","1",0,$al['fotocopianacimiento']?array("checked"=>"checked"):"");?></td>
                        <td><?php campos("Formulario Rude","formulariorude","checkbox","1",0,$al['formulariorude']?array("checked"=>"checked"):"");?></td>
                        <td><?php campos("Fotocopia CI Padre/Tutor","fotocopiapadre","checkbox","1",0,$al['fotocopiapadre']?array("checked"=>"checked"):"");?></td>
                        <td><?php campos("Compromiso","compromiso","checkbox","1",0,$al['compromiso']?array("checked"=>"checked"):"");?></td>
                    </tr>
                    <tr><td colspan="5"><?php campos("Guardar","guardar","submit");?></td></tr>
                </table>
            </fieldset>
		</div>     
        </form>
    	<div class="clear"></div>
    </div>
</div>
<?php include_once '../../piepagina.php';?>