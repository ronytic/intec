<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	include_once '../../class/grupo.php';
    include_once '../../class/carrera.php';
	include_once '../../class/alumno.php';
	include_once '../../class/notas.php';
	extract($_POST);
	
	$grupo=new grupo;
	$alumno=new alumno;
	$notas=new notas;
    $carrera=new carrera;
	if($codcarrera==""){
		echo "Seleccione una Carrera Por favor";	
		exit();
	}
	if($codgrupo==""){
		echo "Seleccione un Grupo Por favor";	
		exit();
	}
	
	$alu=$alumno->mostrarTodo("codcarrera=$codcarrera and codgrupo=$codgrupo and sexo LIKE '$sexo'");
	$datos=array();
    foreach($alu as $al){
        $n=$notas->mostrarTodo("codgrupo=$codgrupo and codcarrera=$codcarrera and codalumno=".$al['codalumno']);
        $n=array_shift($n);
        $datos[$al['paterno'].' '.$al['materno'].''.$al['nombres']]=$n['notafinal'];
    }
	$car=array_shift($carrera->mostrarTodo("codcarrera=".$codcarrera));
    $gru=array_shift($grupo->mostrarTodo("codgrupo=".$codgrupo));
    //print_r($datos);
}
?>
<a href="#" class="botoninfo corner-all imprimir noimprimir">Imprimir</a>
<div id="container"></div>
		<script type="text/javascript">
		$(function () {
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Reporte Estadístico de Notas'
        },
        subtitle: {
            text: 'Carrera: <b><?php echo $car['nombre']?></b> - Grupo: <b><?php echo $gru['nombregrupo']?></b>'
        },
        xAxis: {
            type: 'category',
            labels: {
                rotation: -45,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Nota'
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: 'Nota Final: <b>{point.y:.0f} </b>'
        },
        series: [{
            name: 'Population',
            data: [
                <?php foreach($datos as $k=>$v){?>
                ['<?php echo $k?>', <?php echo $v?>],
                <?php }?>
            ],
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: '#FFFFFF',
                align: 'right',
                format: '{point.y:.0f}', // one decimal
                y: 10, // 10 pixels down from the top
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        }]
    });
});
		</script>