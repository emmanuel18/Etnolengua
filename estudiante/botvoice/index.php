<?php
session_start();
$id=$_SESSION['id'];
$cr=$_SESSION['Correo'];
$ps=$_SESSION['Password'];
$Query="SELECT Nombre FROM userestudiante WHERE Correo='$cr'";
$conexion = mysqli_connect("localhost", "etnoleng_emmanue", "estrada_18", "etnoleng_mixe");
$qr=mysqli_query($conexion,$Query);
if($rw=mysqli_fetch_row($qr)){
	$rs=trim($rw[0]);	
}
if ($_SESSION['id']==null){
	header('location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width">
		<link href="../vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
		<link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
		<link href="../css/sb-admin.css" rel="stylesheet">
		<title>Fonética</title>
		<link rel="icon" type="image/png" href="../../images/favicon.png" alt="Etnolengua Favicon">
	</head>
	
	<body>
		
		<nav class="navbar navbar-expand navbar-dark bg-dark static-top">
			<a class="navbar-brand mr-1 logo" href="../index.php"><img src="../../images/logo.png" width="150" height="auto" alt=""/></a>
			
			<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
				<div class="input-group">
				</div>
			</form>
			<!-- Navbar -->
			<ul class="navbar-nav ml-auto ml-md-0">
				<li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <span class="badge badge-danger"></span>
          </a>
			
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
            <a class="dropdown-item" href="#">Sin notificaciones</a>
            <!--<a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a> -->
          </div>
          
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <span class="badge badge-danger"></span>
          </a>
			
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
            <a class="dropdown-item" href="#">No hay mensajes</a>
            <!--<a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>-->
          </div>
          
        </li>
				<li class="nav-item dropdown no-arrow">
					<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas">
							<?php
							$query2="SELECT Fotoperfil FROM userestudiante WHERE Correo='$cr'";
							$Foto=mysqli_query($conexion, $query2);
							if($row2=mysqli_fetch_row($Foto)){
								$ft=trim($row2[0]);
							}
							echo "<img class='rounded-circle' src='../../phpregistro/bdimagen/$ft' width='auto' height='32'>";
							?>
						</i>
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
						<a class="dropdown-item" href="#">Configuración</a>
						<a class="dropdown-item" href="#">Editar perfil</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Cerrar sesión</a>
					</div>
				</li>
				<div class="navbar-text mr-1">
					<?php
					$token=strtok($rs, " \n\t");
					if($token!==false){
						echo("$token");
					}
					?>
				</div>
			</ul>
		</nav>
		<div id="wrapper">
			
			<ul class="sidebar navbar-nav">
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="../index.php" >
            <i class="fas fa-fw fa-folder"></i>
            <span>Cursos</span>
          </a>
          
        </li>
		  
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="pagesDropdown" href="../traslatormixe.php" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-list a-li"></i>
            <span>Traductor</span>
			</a>
			<div class="dropdown-menu" aria-labelledby="pagesDropdown">
				<h6 class="dropdown-header">Lenguas</h6>
				<a class="dropdown-item" href="../traslatormixe.php">Mixe</a>
				<a class="dropdown-item" href="../traslatornahuatl.php">Nahuatl</a>
				
			</div>
        </li>
		
        
      </ul>
			<div id="content-wrapper">
				<div class="container-fluid align-content-center">
					<div class="row">
						<div class="container w-50">
					<div class="jumbotron">
						<h1 class="text-center btn btn-info btn-block btn-lg active">Pronuncia la frase</h1>
					<div class="form-group text-center">
						<button class="btn btn-primary">Iniciar Prueba <i class="fa fa-microphone-alt"></i></button>
					</div>
					
					<div class="form-group">
						<textarea class="phrase form-control" rows="1">frase...</textarea>
					</div>
					<div class="form-group">
						<textarea class="result form-control" rows="1">¿Correcto o incorrecto?</textarea>
					</div>
					<div class="form-group">
						<textarea class="output form-control" rows="1">...diagnosticando</textarea>
					</div>
					
					</div>
					
					
				</div>
						<div class="jumbotron w-auto">
						<iframe
    allow="microphone;"
    width="auto"
    height="450px"
    src="https://console.dialogflow.com/api-client/demo/embedded/3e98889a-84c3-4e5a-8f7a-dbeefff12b29">
</iframe>
					</div>
					</div>
				
				
				
				<!-- footer -->
				</div>
			</div>
			
			
			<footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Etnolengua 2018</span>
            </div>
          </div>
        </footer>
		</div>
		
   

    <script src="script.js"></script>
	<!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin.min.js"></script>
  </body>
</html>