<?php
$conexion = mysqli_connect("localhost", "etnoleng_emmanue", "estrada_18", "etnoleng_mixe");
$Nombre=$_POST ['nombre'];
$Correo=$_POST ['correo'];
$Pass1=$_POST ['pass'];
$Pass2=$_POST ['pass2'];
$Fecha=$_POST ['fecha'];
$Profesion=$_POST ['profesion'];
$Cedula=$_POST ['cedula'];
$Dialecto=$_POST ['dialecto'];
$Experiencia=$_POST ['experiencia'];


$query="INSERT INTO userprofe (Nombre, Correo, Password, Fecnac, Profesion, Dialecto, Experiencia, Cedula) VALUES ('$Nombre', '$Correo', MD5('$Pass1'), '$Fecha', '$Profesion', '$Dialecto', '$Experiencia', '$Cedula')";
$query2="SELECT Correo From userprofe where Correo='$Correo'";
$resultado2=mysqli_query($conexion, $query2);
if($row=mysqli_fetch_row($resultado2)){

	$correo2=trim($row[0]);
}else{
	$correo2=null; 
}
if($Pass1==$Pass2){
	
	if($correo2==$Correo){
		echo '<script languaje="javascript">alert("El correo ya existe, por favor introduce otro o inicia sesión");
			window.location.href="../registrodocente.html";
			</script>';
	}else{
		$resultado=mysqli_query($conexion, $query);
		if (!$resultado) {

       	echo 'Error ';
       	echo($resultado);

       	}else{





			echo '<script languaje="javascript">alert("Registro exitoso, inicia sesión");
			window.location.href="../index.php";
			</script>';
        }

	}
	
} 

else {
	echo '<script>alert("Las contraseñas no coinciden"); </script>';
}


?>
