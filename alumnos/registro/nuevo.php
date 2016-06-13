<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Registro de Nuevo Alumno";

include_once("../../class/curso.php");
$curso=new curso;
$cur=todolista($curso->mostrarTodo(),"codcurso","nombre","");

include_once '../../funciones/funciones.php';
include_once '../../cabecerahtml.php';
?>
<?php include_once '../../cabecera.php';?>
<div class="grid_12">
	<div class="contenido imagenfondo">
    	<form action="guardar.php" method="post" enctype="multipart/form-data">
    	<div class="prefix_0 grid_6 alpha">
			<fieldset>
				<div class="titulo"><?php echo $titulo?></div>
                
				<table class="tablareg">
                	<tr>
						<td><?php campos("Apellido Paterno","paterno","text","",1,array("required"=>"required"));?></td>
                        <td><?php campos("Apellido Materno","materno","text","",0,array("required"=>"required"));?></td>
					</tr>
                    <tr>
						<td><?php campos("Nombres","nombres","text","",0,array("required"=>"required"));?></td>
					</tr>
                    <tr>
						<td><?php campos("Lugar de Nacimiento","lugarnac","text","",0,array("required"=>"required"));?></td>
						<td><?php campos("Fecha Nacimiento","fechanac","date","",0,array("required"=>"required"));?></td>
					</tr>
                    <tr>
						<td><?php campos("C.I.","ci","text","",0,array("required"=>"required"));?></td>
                    	<td><?php campos("Sexo","sexo","select",array("0"=>"Femenino","1"=>"Masculino"));?></td>
                    </tr>
                    <tr>
						<td><?php campos("Zona","zona","text","",0,array("required"=>"required"));?></td>
						<td><?php campos("Calle","calle","text","",0,array("required"=>"required"));?></td>
					</tr>
                    <tr>
						<td><?php campos("Número","numero","text","",0,array("required"=>"required"));?></td>
					</tr>
                    <tr>
						<td><?php campos("Teléfono Casa","telefonocasa","text","",0,array("required"=>"required"));?></td>
						<td><?php campos("Celular","celular","text","",0,array("required"=>"required"));?></td>
					</tr>
                    <tr>
						<td><?php campos("Curso","codcurso","select",$cur);?></td>
						<td><?php campos("Rude","rude","text","",0,array("required"=>"required"));?></td>
					</tr>
                    <tr>
						<td colspan="2"><?php campos("Observación","observacion","textarea");?></td>
					</tr>
                    <tr>
						<td colspan="2"><?php campos("Foto","foto","file","",0,array(""=>""));?></td>
					</tr>
					
				</table>
			</fieldset>
		</div>
        <div class="grid_5 ">
			<fieldset>
				<div class="titulo">Datos de Padre de Familia</div>
                <table class="tablareg">
                	<tr>
                    	<td><?php campos("Apellidos Padre","apellidospadre","text","");?></td>
                        <td><?php campos("Nombres Padre","nombrespadre","text","");?></td>
                    </tr>
                    <tr>
                    	<td><?php campos("C.I. Padre","cipadre","text","");?></td>
                        
                    </tr>
                    <tr>
                    	<td><?php campos("Apellidos Madre","apellidosmadre","text","");?></td>
                        <td><?php campos("Nombres Madre","nombresmadre","text","");?></td>
                    </tr>
                    <tr>
                    	<td><?php campos("C.I. Madre","cimadre","text","");?></td>
                        
                    </tr>
                    
                </table>
        	</fieldset>
            <fieldset>
            <div class="titulo">Datos de Padre de Familia</div>
                 <table class="tablareg">
                	<tr>
                    	<td><?php campos("Fotocopia de CI","fotocopiaci","checkbox","1");?></td>
                        <td><?php campos("Fotocopia Cert.Nac.","fotocopianacimiento","checkbox","1");?></td>
                        <td><?php campos("Formulario Rude","formulariorude","checkbox","1");?></td>
                        <td><?php campos("Fotocopia CI Padre/Tutor","fotocopiapadre","checkbox","1");?></td>
                        <td><?php campos("Compromiso","compromiso","checkbox","1");?></td>
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