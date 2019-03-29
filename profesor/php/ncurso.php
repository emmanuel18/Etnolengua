<?php
header('Content-Type: text/html;charset=utf-8');
session_start();
$sesion=$_SESSION['IdSesion'];
$id=$_SESSION['id'];
$conexion = mysqli_connect("localhost", "etnoleng_emmanue", "estrada_18", "etnoleng_mixe");
$Target_dir='bdfiles/';
$IdProfesor=$sesion;
$Nombre=$_POST['Curso'];
$Descripcion=$_POST['Descripcion'];
$Target_file=$Target_dir.basename($_FILES['foto'] ['name']);
$Target_file2=$Target_dir.basename($_FILES['video'] ['name']);
$Lengua=$_POST['Lenguas'];
$Variante=$_POST['Variante'];
$Nivel=$_POST['Nivel'];

if (move_uploaded_file($_FILES['foto'] ['tmp_name'], $Target_file) && move_uploaded_file($_FILES['video'] ['tmp_name'], $Target_file)) {
	
		$Presentacion=$_FILES['foto']['name'];
		$Presentacion2=$_FILES['video']['name'];
		$Query=utf8_decode("INSERT INTO  cursos (IdProfesor, Nombre, Descripcion, Presentacion, VideoInt, Lengua, Variante, Nivel) VALUES ('$IdProfesor', '$Nombre', '$Descripcion', '$Presentacion', '$Presentacion2', '$Lengua', '$Variante', '$Nivel')");
		$consulta=mysqli_query($conexion, $Query);
		if (!$consulta) {
    		echo 'Error ';
       		echo($consulta);
       	}else{
			echo '<script languaje="javascript">alert("Curso creado exitosamente... Entrar a la sección ´Mis cursos´ para agregar contenido a tu curso. El curso será publicado hasta que hayas creado por lo menos una actividad por Unidad.");
			window.location.href="../Cursos.php";
			</script>';
		}
		

	
	
} else {
	echo '<script languaje="javascript">alert("La imagen es demasiado grande, el límite máximo es 750x750.");
			
			</script>';
}


?>
