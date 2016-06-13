<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Nuevo Registro de Rude";
$id=$_GET['id'];
include_once '../../class/alumno.php';
$alumno=new alumno;
$al=array_shift($alumno->mostrar($id));

include_once("../../class/curso.php");
$curso=new curso;
$cur=todolista($curso->mostrarTodo(),"codcurso","nombre","");

$foto="../foto/".$al['foto'];
if(!file_exists($foto) && $foto!=""){
	$foto="../foto/0.jpg";
}
include_once '../../funciones/funciones.php';
include_once '../../cabecerahtml.php';
?>
<?php include_once '../../cabecera.php';?>
<div class="grid_12">
	<div class="contenido imagenfondo">
    	<form action="guardar.php" method="post" enctype="multipart/form-data">
        <?php campos("","id","hidden",$id);?>
    	<div class="prefix_0 grid_6 alpha">
			<fieldset>
				<div class="titulo"><?php echo $titulo?></div>
                
				<table class="tablareg">
                	<tr>
                    	<td><?php campos("Apellido Paterno","paterno","text",$al['paterno'],0,array("required"=>"required","readonly"=>"readonly"));?></td>
						<td><?php campos("Apellido Materno","materno","text",$al['materno'],0,array("required"=>"required","readonly"=>"readonly"));?></td>
					</tr>
                    <tr>
						<td><?php campos("Nombres","nombres","text",$al['nombres'],0,array("required"=>"required","readonly"=>"readonly"));?></td>
					</tr>
                    
                    <tr>
						<td><?php campos("C.I.","ci","text",$al['ci'],0,array("required"=>"required","readonly"=>"readonly"));?></td>
                    	<td><?php campos("Sexo","sexo","select",array("0"=>"Femenino","1"=>"Masculino"),0,array("readonly"=>"readonly","disabled"=>"disabled"),$al['sexo']);?></td>
                    </tr>
                    <tr>
						<td><?php campos("Curso","codcurso","select",$cur,0,array("disabled"=>"disabled"),$al['codcurso']);?></td>
						<td><?php campos("Rude","rude","text",$al['rude'],0,array("required"=>"required","readonly"=>"readonly"));?></td>
					</tr>
                    <tr>
						<td colspan="2">
                        	<img src="<?php echo $foto?>" width="100" height="100">
                        </td>
					</tr>
					
				</table>
			</fieldset>
		</div>
        <div class="prefix_0 grid_5">
			<fieldset>
				<div class="titulo">Datos del RUDE</div>
                <table class="tablareg">
                	<tr>
                    	<td><?php campos("Pais de Nacimiento","paisn","text",$al['n']);?></td>
                        <td><?php campos("Provincia de Nacimiento","provincian","text",$al['n']);?></td>
                        
                    </tr>
                    <tr>
                    	<td><?php campos("Localidad de Nacimiento","localidadn","text",$al['n']);?></td>
                    </tr>
                    <tr>
                    	<td><?php campos("Certificado Nac. Oficialia","certofi","text",$al['n']);?></td>
                        <td><?php campos("Certificado Nac. Libro","certlibro","text",$al['n']);?></td>
                    </tr>
                    <tr>
                    	<td><?php campos("Certificado Nac. Partida","certpartida","text",$al['n']);?></td>
                        <td><?php campos("Certificado NacFolio","certfolio","text",$al['n']);?></td>
                    </tr>
                    <tr>
                    	<td><?php campos("Código Sie Procedencia","codigosie","text",$al['n']);?></td>
                        <td><?php campos("Nombre Unidad Procedencia","nombreunidad","text",$al['n']);?></td>
                    </tr>
                    <tr>
                    	<td colspan="2"><strong>Dirección Actual</strong></td>
                    </tr>
                    <tr>
                        <td><?php campos("Provincia Actual","provinciae","text",$al['n']);?></td>
                        <td><?php campos("Municipio Actual","municipioe","text",$al['n']);?></td>
                    </tr>
                    <tr>
                        <td><?php campos("Comunidad Actual","comunidade","text",$al['n']);?></td>
                    </tr>
                    <tr>
                    	<td><?php campos("Lengua Materna","lenguamater","select",array("CASTELLANO"=>"CASTELLANO","AYMARA"=>"AYMARA","INGLES"=>"INGLES"),$al['n']);?></td>
                        <td><?php campos("Castellano","castellanoi","select",array("1"=>"SI","0"=>"NO"),$al['n']);?></td>
                    </tr>
                    <tr>
                    	<td><?php campos("Ingles","inglesi","select",array("1"=>"SI","0"=>"NO"),$al['n']);?></td>
                        <td><?php campos("Aymara","aymarai","select",array("1"=>"SI","0"=>"NO"),$al['n']);?></td>
                    </tr>
                    <tr>
                    	<td><?php campos("Se Identifica como","pertenecea","select",array("MESTIZO"=>"MESTIZO","AYMARA"=>"AYMARA"),$al['n']);?></td>
                        <td><?php campos("¿Tiene un Centro de Salud a su Alrededor?","centrosalud","select",array("1"=>"SI","0"=>"NO"),$al['n']);?></td>
                    </tr>
                    <tr>
                    	<td><?php campos("¿Cuantas veces acudió el año pasado?","vecescentro","select",array("1a2"=>"1 a 2 veces","3a5"=>"3 a 5 veces","6a+"=>"6 o más veces","ninguna"=>"NINGUNA"),$al['n']);?></td>
                        <td><?php campos("Discapacidad o Deficiencia Mental","discapacidad","select",array("1"=>"SI","0"=>"NO"),$al['n']);?></td>
                    </tr>
                    <tr><td colspan="2"><strong>Acceso de Servicios Basicos</strong></td></tr>
					<tr>
                    	<td><?php campos("Agua Potable a Domicilio","aguadomicilio","select",array("1"=>"SI","0"=>"NO"),$al['n']);?></td>
                        <td><?php campos("Electricidad Red Publica","electricidad","select",array("1"=>"SI","0"=>"NO"),$al['n']);?></td>
                    </tr>
                    <tr>
                    	<td><?php campos("Alcantarillado","alcantarillado","select",array("1"=>"SI","0"=>"NO"),$al['n']);?></td>
                        <td><?php campos("¿El estudiante trabaja?","trabaja","select",array("NOTRABAJA"=>"NO TRABAJA","EMPLEADO"=>"EMPLEADO"),$al['n']);?></td>
                    </tr>
                    <tr>
                    	<td><?php campos("¿El estudiante tiene acceso a INTERNET?","internetcasa","select",array("1"=>"SI","0"=>"NO"),$al['n']);?></td>
                        <td><?php campos("¿El estudiante se traslada en?","transporte","select",array("APIE"=>"A PIE","MINIBUS"=>"MINIBUS"),$al['n']);?></td>
                    </tr>
                    <tr>
                    	<td colspan="2"><?php campos("Tiempo que tarda el Estudiante","tiempollegada","text","Menos de media Hora",0,array("readonly"=>"readonly"),$al['n']);?></td>
                    </tr>
                    <tr><td colspan="2"><strong>Instruccion del Padre</strong></td></tr>
                    <tr>
                    	<td><?php campos("Mayor Grado de Instrucción - TUTOR","instruccionp","select",array("NINGUNA"=>"NINGUNA","PRIMARIA"=>"PRIMARIA","SECUNDARIA"=>"SECUNDARIA","TECNICO MEDIO"=>"TECNICO MEDIO","TECNICO SUPERIOR"=>"TECNICO SUPERIOR","NORMALISTA"=>"NORMALISTA","LICENCIATURA"=>"LICENCIATURA","CARRERA MILITAR"=>"CARRERA MILITAR","POSTGRADO"=>"POSTGRADO","BACHILLER"=>"BACHILLER","UNIVERSITARIO"=>"UNIVERSITARIO","NO SABE/NO RESPONDE"=>"NO SABE/NO RESPONDE"),$al['n']);?></td>
                        <td><?php campos("Grado de Parentesco","parentescop","select",array("---"=>"---","PADRE"=>"PADRE","ABUELO"=>"ABUELO","ABUELA"=>"ABUELA","TIO"=>"TIO","TIA"=>"TIA","HERMANO"=>"HERMANO","TUTOR"=>"TUTOR"),$al['n']);?></td>
                    </tr>
                    <tr>
                    	<td colspan="2"><?php campos("Idioma del TUTOR","idiomap","text","CASTELLANO",0,array("readonly"=>"readonly"),$al['n']);?></td>
                    </tr>
                    <tr>
                    	<td><?php campos("Mayor Grado de Instrucción - MADRE","instruccionm","select",array("NINGUNA"=>"NINGUNA","PRIMARIA"=>"PRIMARIA","SECUNDARIA"=>"SECUNDARIA","TECNICO MEDIO"=>"TECNICO MEDIO","TECNICO SUPERIOR"=>"TECNICO SUPERIOR","NORMALISTA"=>"NORMALISTA","LICENCIATURA"=>"LICENCIATURA","CARRERA MILITAR"=>"CARRERA MILITAR","POSTGRADO"=>"POSTGRADO","BACHILLER"=>"BACHILLER","UNIVERSITARIO"=>"UNIVERSITARIO","NO SABE/NO RESPONDE"=>"NO SABE/NO RESPONDE"),$al['n']);?></td>
                        <td colspan="2"><?php campos("Idioma de la Madre","idiomam","text","CASTELLANO",0,array("readonly"=>"readonly"),$al['n']);?></td>
                    </tr>
                    <tr><td colspan="2"><?php campos("Guardar","guardar","submit");?></td></tr>
                </table>
        	</fieldset>
		</div>     
        </form>
    	<div class="clear"></div>
    </div>
</div>
<?php include_once '../../piepagina.php';?>