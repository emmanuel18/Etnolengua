<?php
session_start();
$id=$_SESSION['id'];
$cr=$_SESSION['Correo'];
$ps=$_SESSION['Password'];
$IdSesion=$_SESSION['IdSesion'];
echo($id);
if ($_SESSION['id']==1){
	header('location: ../estudiante/index.php');
}
elseif ($_SESSION['id']==2){
	header('location:../profesor/index.php');
	# code...
}
elseif ($_SESSION['id']==3) {
	# code...
	header('location:../hablante/index.php');
}
?>