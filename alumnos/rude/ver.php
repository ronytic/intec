<?php
include_once("../../impresion/fpdf/fpdf.php");
$titulo="Datos de Alumno";
$id=$_GET['id'];

include_once("../../class/alumno.php");
$alumno=new alumno;
$a=array_shift($alumno->mostrar($id));

include_once("../../class/curso.php");
$curso=new curso;
$cur=array_shift($curso->mostrar($a['codcurso']));

include_once("../../class/rude.php");
$rude=new rude;
$al=array_shift($rude->mostrarTodo("codalumno=".$a['codalumno']));

function escribe($x,$y,$t,$tam=12){
	global $pdf;
	$pdf->SetFont('Arial','',$tam);
	$pdf->SetXY($x,$y);
	$pdf->Cell(5,4,utf8_decode(mb_strtoupper($t,"utf8")),0,0,"C");
}

$pdf=new FPDF("P","mm",array(216, 330));
$pdf->SetMargins(0,0,0);
$pdf->SetAutoPageBreak(true,0);

$pdf->SetFont('Arial','B',12);
$pdf->AddPage();
$pdf->Image("rude.jpg",0,0,216, 330);
escribe(75.2,38.1,"x",10);
	escribe(140,38,mb_strtoupper(""));
	escribe(56,43.3,"");
	escribe(110,43.5,mb_strtoupper(""));
	escribe(70,58,mb_strtoupper($a['paterno'],"utf8"));
	escribe(70,64,mb_strtoupper($a['materno'],"utf8"));
	escribe(70,70,mb_strtoupper($a['nombres'],"utf8"));
	
	escribe(72,79,mb_strtoupper($al['paisn'],"utf8"));
	escribe(72,84.5,mb_strtoupper($a['lugarnac'],"utf8"));
	escribe(72,90.5,mb_strtoupper($al['provincian'],"utf8"));
	escribe(72,96,mb_strtoupper($al['localidadn'],"utf8"));
	
	escribe(150,59,$a['rude']);
	if($al['documento']!=""){
	escribe(180.4,63.3,"x",10);}
	escribe(185,68,$a['ci'],10);
	
	escribe(130,78,date('d',strtotime($a['fechanac'])));
	escribe(142,78,date('m',strtotime($a['fechanac'])));
	escribe(158,78,date('Y',strtotime($a['fechanac'])));
	
	if(!$a['Sexo'])escribe(197.5,77.2,"x",10);
	if($a['Sexo'])escribe(197.5,81.5,"x",10);
	
	escribe(131,95.5,$al['certofi'],10);
	escribe(155,95.5,$al['certlibro'],10);
	escribe(179.5,95.5,$al['certpartida']);
	escribe(196,95.5,$al['certfolio']);
	
	escribe(50,104,$al['codigosie']);//SIE
	escribe(155,104.5,$al['nombreunidad'],10);
	
	if($a['codcurso']==1)escribe(14,119.5,"x",10);//kinder
	if($a['codcurso']==2)escribe(23.5,119.5,"x",10);//1
	if($a['codcurso']==3)escribe(28.5,119.5,"x",10);//2
	if($a['codcurso']==4)escribe(33,119.5,"x",10);//3
	if($a['codcurso']==5)escribe(38,119.5,"x",10);//4
	if($a['codcurso']==6)escribe(43,119.5,"x",10);//5
	if($a['codcurso']==7)escribe(47.8,119.5,"x",10);//6
	if($a['codcurso']==8)escribe(56.3,119.5,"x",10);//1
	if($a['codcurso']==9)escribe(61,119.5,"x",10);//2
	if($a['codcurso']==10)escribe(66,119.5,"x",10);//3
	if($a['codcurso']==11)escribe(70.6,119.5,"x",10);//4
	if($a['codcurso']==12)escribe(75.5,119.5,"x",10);//5
	if($a['codcurso']==13)escribe(80.5,119.5,"x",10);//6
	
	escribe(123.8,121.5,"x",10);//paralelo
	
	escribe(186.2,120,"x",10);//turno
	
	escribe(60,134,$al['provinciae']);
	escribe(60,140,$al['municipioe']);
	escribe(60,145.5,$al['comunidade']);
	
	escribe(160,134.5,$a['zona']);
	escribe(160,140.5,$a['calle']);
	escribe(195,146,$a['numero']);
	escribe(132,146,$a['telefonocasa']);
	
	
	escribe(23,169,$al['lenguamater'],10);
	
	if($al['castellanoi'])escribe(23,180,"CASTELLANO",10);
	if($al['inglesi'])escribe(23,184,"INGLES",10);
	if($al['aymarai'])escribe(23,188.5,"AYMARA",10);
	
	escribe(61,166,"x",10);
	//escribe(61,170,"x",10);
	escribe(120,189.3,$al['pertenecea'],8);
	
	escribe(191,163.5,"x",10);//centro salud

	if($al['vecescentro']=="1a2")escribe(147.3,170,"x",10);
	if($al['vecescentro']=="3a5")escribe(164.5,170,"x",10);
	if($al['vecescentro']=="6a+")escribe(185,170,"x",10);
	if($al['vecescentro']=="niguna")escribe(198,170,"x",10);
	
	escribe(170,179.5,"x",10);//no
	escribe(170,182.5,"x",10);//no
	escribe(170,185,"x",10);//no
	
	escribe(42.5,200,"x",10);
	
	escribe(35.5,224.5,"x",10);
	
	escribe(34.5,233.5,"x",10);
	
	escribe(112.5,227.5,"x",10);
	
	escribe(88,237.5,"NO TRABAJO",10);
	escribe(89.5,245.5,"x",10);
	
	if($al['internetcasa'])escribe(149,204,"x",10);
	escribe(149,207,"x",10);
	escribe(149,210,"x",10);
	
	escribe(145,233.5,"x",10);
	
	if($al['transporte']=="APIE")escribe(196.5,204,"x",10);
	if($al['transporte']=="MINIBUS")escribe(196.5,207,"x",10);
	
	escribe(192.5,234,"x",10);
	
	escribe(54,259.8,$a['cipadre'],10);
	escribe(72,264,$a['apellidospadre'],10);
	escribe(72,268.3,$a['nombrespadre'],10);
	escribe(72,272.5,$al['idiomap'],10);
	escribe(72,277,$a['ocupacionpadre'],10);
	escribe(72,281,$al['instruccionp'],10);
	escribe(72,285,$al['parentescop'],10);
	
	escribe(161,260.5,$a['cimadre'],10);
	escribe(175,265,$a['apellidosmadre'],10);
	escribe(175,269.7,$a['nombresmadre'],10);
	escribe(175,274.2,$al['idiomam'],10);
	escribe(175,278.5,$a['ocupacionmadre'],10);
	escribe(175,282.7,$al['instruccionm'],10);
	
	escribe(54-28,290.5,"E",10);//E
	escribe(58-28,290.5,"L",10);//E
	escribe(67.5-28,290.5,"A",10);//E
	escribe(72-28,290.5,"L",10);//E
	escribe(76.5-28,290.5,"T",10);//E
	escribe(81-28,290.5,"O",10);//E
	
	$dia=date("d",strtotime($a['fecha']));
	$mes=date("m",strtotime($a['fecha']));
	$anio=date("Y",strtotime($a['fecha']));
	escribe(81+38.5,290.5,$dia[0],10);//E
	escribe(81+43,290.5,$dia[1],10);//E
	
	escribe(81+60,290.5,$mes[0],10);//E
	escribe(81+64,290.5,$mes[1],10);//E
	
	escribe(81+80,290.5,$anio[0],10);//E
	escribe(81+84.5,290.5,$anio[1],10);//E
	escribe(81+89.5,290.5,$anio[2],10);//E
	escribe(81+94,290.5,$anio[3],10);//E

$pdf->Output();
?>