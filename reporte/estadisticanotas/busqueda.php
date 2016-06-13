<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	include_once '../../class/docentemateriacurso.php';
	include_once '../../class/curso.php';
	include_once '../../class/notas.php';
	extract($_POST);
	
	$docentemateriacurso=new docentemateriacurso;
	$curso=new curso;
	$notas=new notas;
	if($codcurso==""){
		echo "Seleccione un Curso Por favor";	
		exit();
	}
	if($codmateria==""){
		echo "Seleccione una Materia Por favor";	
		exit();
	}
	
	$dmc=array_shift($docentemateriacurso->mostrarTodo("codcurso=$codcurso and codmateria=$codmateria"));
	
	$total=count($notas->mostrarTodo("coddocentemateriacurso=".$dmc['coddocentemateriacurso']." and trimestre=$trimestre"));
	$aprobados=count($notas->mostrarTodo("coddocentemateriacurso=".$dmc['coddocentemateriacurso']." and trimestre=$trimestre and notafinal>=36"));
	$reprobados=count($notas->mostrarTodo("coddocentemateriacurso=".$dmc['coddocentemateriacurso']." and trimestre=$trimestre and notafinal<36"));

	
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
                text: 'Estadísticas de Notas'
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
                name: 'Porcentajes de Estudiantes',
                data: [
                    ['Aprobados',   <?php echo porcentaje($total,$aprobados);?>],
                    ['Reprobados',       <?php echo porcentaje($total,$reprobados);?>],

                ]
            }]
        });
    });
    
});
		</script>