<?php
$iduser=$_POST['user'];
$idcurso=$_POST['idcurso'];
$calif=$_POST['calif'];
$unidad=$_POST['unidad'];

$conexion = mysqli_connect("localhost", "etnoleng_emmanue", "estrada_18", "etnoleng_mixe");

$insertar="INSERT INTO avance (IdCurso, IdEstudiante, Unidad, Calificacion1) VALUES ('$idcurso','$iduser','$unidad', '$calif')";

$registrar=mysqli_query($conexion, $insertar);

//if($registrar){
	header('Location: index.php');
//}

?>