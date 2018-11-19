<?php
		
	$ind=$_POST['txtind'];
	$esp=$_POST['esp'];
	$idcurso=$_POST['idcurso'];
	if ($ind=='' || $esp=='' || $idcurso==''){
		echo("nel");
	}
	else{
		$Lectura="INSERT INTO lectura (IdCurso, TextLngInd, TextEsp) VALUES ('$idcurso', '$ind', '$esp')";
		$insertar=mysqli_query($conexion, $Lectura);
		
		echo '<script languaje="javascript">alert("Lectura creada");
			
			</script>';
		
	}
?>