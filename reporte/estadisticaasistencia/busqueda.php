<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	include_once '../../class/alumno.php';
	include_once '../../class/curso.php';
	include_once '../../class/asistencia.php';
	extract($_POST);
	
	$alumno=new alumno;
	$curso=new curso;
	$asistencia=new asistencia;
	if($codcurso==""){
		echo "Seleccione un Curso Porfavor";	
		exit();
	}
	
	$codcurso=$codcurso?"codcurso='$codcurso'":"codcurso LIKE '%'";
	$total=count($asistencia->mostrarTodo("$codcurso and fechaasistencia='$fechaasistencia'"));
	$asis=count($asistencia->mostrarTodo("$codcurso and fechaasistencia='$fechaasistencia' and estado='asistencia'"));
	$falta=count($asistencia->mostrarTodo("$codcurso and fechaasistencia='$fechaasistencia' and estado='falta'"));
	$licencia=count($asistencia->mostrarTodo("$codcurso and fechaasistencia='$fechaasistencia' and estado='licencia'"));
	//echo $asis;
	
}
?>
<a href="#" class="botoninfo corner-all imprimir noimprimir">Imprimir</a>
<div id="container"></div>
		<script type="text/javascript">
		$(document).ready(function(e) {
            $(".imprimir").click(function(e) {
                window.print() ;
            });
        });
$(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Estadística de Asistencia'
            },
            tooltip: {
        	    pointFormat: '{series.name}: <b>{point.percentage}%</b>',
            	percentageDecimals: 1
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        color: '#000000',
                        connectorColor: '#000000',
                        formatter: function() {
                            return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
                        }
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'Cantidad de Asistentes',
                data: [
                    ['Asistencia',   <?php echo porcentaje($total,$asis);?>],
                    ['Falta',       <?php echo porcentaje($total,$falta);?>],
					['Licencia',       <?php echo porcentaje($total,$licencia);?>]
                ]
            }]
        });
    });
    
});
		</script>