<?php
session_start();
$conexion = mysqli_connect("localhost", "etnoleng_emmanue", "estrada_18", "etnoleng_mixe");

$Correo=$_POST['correo'];
$Password=$_POST['Password'];

$query="SELECT IdSesion from userprofe where Correo='$Correo' and Password=MD5('$Password')";
$query2="SELECT IdSesion from userestudiante where Correo='$Correo' and Password=MD5('$Password')";
$query3="SELECT IdSesion from userhablante where Correo='$Correo' and Password=MD5('$Password')";
$query4="SELECT id from userprofe where Correo='$Correo' and Password=MD5('$Password')";
$query5="SELECT id from userestudiante where Correo='$Correo' and Password=MD5('$Password')";
$query6="SELECT id from userhablante where Correo='$Correo' and Password=MD5('$Password')";

$resultado1=mysqli_query($conexion, $query);
$resultado2=mysqli_query($conexion, $query2); 
$resultado3=mysqli_query($conexion, $query3);
$resultado4=mysqli_query($conexion, $query4);
$resultado5=mysqli_query($conexion, $query5); 
$resultado6=mysqli_query($conexion, $query6);

if($r=mysqli_fetch_row($resultado4)){
	$rs4=trim($r[0]);
}
if($r=mysqli_fetch_row($resultado5)){
	$rs5=trim($r[0]);
}
if($r=mysqli_fetch_row($resultado6)){
	$rs6=trim($r[0]);
}
if($row=mysqli_fetch_row($resultado1)){
	$rs=trim($row[0]);
}else{
	$rs=null;
}
if($row=mysqli_fetch_row($resultado2)){
	$rs2=trim($row[0]);
}else{
	$rs2=null;
}
if($row=mysqli_fetch_row($resultado3)){
	$rs3=trim($row[0]);
}else{
	$rs3=null;
}
if($rs!=null){
	
	$_SESSION ['id']=$rs;
	$_SESSION ['Correo']=$Correo;
	$_SESSION ['Password']=$Password;
	$_SESSION ['IdSesion']=$rs4;
	echo '<script languaje="javascript">
			window.location.href="../profesor/index.php";
			</script>';
} 
else{
	if ($rs2!=null) {
		
		$_SESSION ['id']=$rs2;
		$_SESSION ['Correo']=$Correo;
		$_SESSION ['Password']=$Password;
		$_SESSION ['IdSesion']=$rs5;
		echo '<script languaje="javascript">
			window.location.href="../estudiante/index.php";
			</script>';
	}
	else{

		if ($rs3!=null){
			
			$_SESSION ['id']=$rs3;
			$_SESSION ['Correo']=$Correo;
			$_SESSION ['Password']=$Password;
			$_SESSION ['IdSesion']=$rs6;
			echo '<script languaje="javascript">
			window.location.href="../hablante/index.php";
			</script>';
		}
		
		else{
			echo '<script languaje="javascript">alert("Usuario y/o Contraseña Incorrectos ");
	        window.location.href="../index.php";
			</script>';
		}
	}
}

?>