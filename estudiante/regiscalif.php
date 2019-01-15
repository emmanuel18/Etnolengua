<?php
$iduser=$_POST['user'];
$idcurso=$_POST['idcurso'];
$calif=$_POST['calif'];
$unidad=$_POST['unidad'];

$conexion = mysqli_connect("localhost", "etnoleng_emmanue", "estrada_18", "etnoleng_mixe");

$insertar="INSERT INTO calificacion (IdCurso, IdEstudiante, Calificacion, Unidad) VALUES ('$idcurso','$iduser','$calif','$unidad')";

$registrar=mysqli_query($conexion, $insertar);

if($registrar){
	header('Location: index.php');
}

?>