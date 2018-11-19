<?php
session_start();
$id=$_SESSION['id'];
$conexion = mysqli_connect("localhost", "etnoleng_emmanue", "estrada_18", "etnoleng_mixe");
$IdProfesor=$id;
$Nombre=$_POST['Titulo'];
$Pregunta1=$_POST['Pregunta1'];
$Pregunta2=$_POST['Pregunta2'];
$Pregunta3=$_POST['Pregunta3'];
$Pregunta4=$_POST['Pregunta4'];
$Pregunta5=$_POST['Pregunta5'];
$Pregunta6=$_POST['Pregunta6'];
$Pregunta7=$_POST['Pregunta7'];
$Pregunta8=$_POST['Pregunta8'];
$Query="INSERT INTO IdCurso, Nombre, Pregunta1, Pregunta2, Pregunta3, Pregunta4, Pregunta5, Pregunta6, Pregunta7, Pregunta8 FROM cursos VALUES '$IdCurso', '$Nombre', '$Pregunta1', '$Pregunta2', '$Pregunta3', '$Pregunta4', '$Pregunta5', '$Pregunta6', '$Pregunta7', '$Pregunta8';
$consulta=mysqli_query($conexion, $Query);
?>