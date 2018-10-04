<?php
$n1=$_POST['n1'];
$n2=$_POST['n2'];
$n3=$_POST['n3'];
$n4=$_POST['n4'];
$n5=$_POST['n5'];
$n6=$_POST['n6'];
$cal=0;
if ($n1==1){
	$cal=$cal+10;
}
if ($n2==1){
	$cal=$cal+10;
}
if ($n3==1){
	$cal=$cal+10;
}
if ($n4==1){
	$cal=$cal+10;
}
if ($n5==1){
	$cal=$cal+10;
}
if ($n6==1){
	$cal=$cal+10;
}
$prom=$cal/6*10;
function porcentaje($cantidad,$decimales){
return number_format($cantidad,$decimales);
}
$porciento =  porcentaje($prom,2);
echo ($porciento);
?>