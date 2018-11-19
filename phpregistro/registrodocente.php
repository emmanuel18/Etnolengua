<?php
$conexion = mysqli_connect("localhost", "etnoleng_emmanue", "estrada_18", "etnoleng_mixe");
$Target_dir='bdimagen/';
$Target_file=$Target_dir.basename($_FILES['foto'] ['name']);
$Nombre=$_POST ['nombre'];
$Correo=$_POST ['correo'];
$Pass1=$_POST ['pass'];
$Pass2=$_POST ['pass2'];
$Fecha=$_POST ['fecha'];
$Profesion=$_POST ['profesion'];
$Cedula=$_POST ['cedula'];
$Dialecto=$_POST ['dialecto'];
$Experiencia=$_POST ['experiencia'];

$uploadid=1;
$imageFileType=strtolower(pathinfo($Target_file, PATHINFO_EXTENSION));

echo($Target_dir);
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
		if ($imageFileType!="jpg" && $imageFileType!="png" && $imageFileType!="gif" && $imageFileType!="jpeg" && $imageFileType!=null) {
		# code...
		echo '<script languaje="javascript">alert("El archivo no es una imagen");
			window.location.href="../registrodocente.html";
			</script>';
		} else {
			if (move_uploaded_file($_FILES['foto'] ['tmp_name'], $Target_file)) {
				# code...
				$arch=$_FILES['foto']['name'];
				echo "El archivo ".basename($_FILES['foto'] ['name'])."Se subio correctamente";
				$query="INSERT INTO userprofe (Nombre, Correo, Password, Fecnac, Profesion, Cedula, Dialecto, Experiencia, FotoPerfil) VALUES ('$Nombre', '$Correo', MD5('$Pass1'), '$Fecha', '$Profesion', '$Cedula','$Dialecto', '$Experiencia', '$arch')";
				$resultado=mysqli_query($conexion, $query);
				if (!$resultado) {

       				echo 'Error ';
       				echo($resultado);

       			}else{
					echo '<script languaje="javascript">alert("Registro exitoso, inicia sesión");
					window.location.href="../default.php";
					</script>';
        		}
			} else {
				$arch=null;
				$query="INSERT INTO userprofe (Nombre, Correo, Password, Fecnac, Profesion, Cedula, Dialecto, Experiencia, FotoPerfil) VALUES ('$Nombre', '$Correo', MD5('$Pass1'), '$Fecha', $Profesion', '$Cedula','$Dialecto', '$Experiencia', '$arch')";
				$resultado=mysqli_query($conexion, $query);
				echo '<script languaje="javascript">alert("Registro exitoso, inicia sesión");
					window.location.href="../default.php";
					</script>';
			}
	
		}
		

	}
	
} else {
	echo '<script>alert("Las contraseñas no coinciden"); 
	//window.location.href="../registrodocente.html";
	</script>';
}

?>
