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
				</li>
				<li class="nav-item dropdown no-arrow mx-1">
					<a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-envelope fa-fw"></i>
						<span class="badge badge-danger"></span>
					</a>
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
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Cursos</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Lenguas</h6>
            <a class="dropdown-item" data-toggle="modal" data-target="#act" href="">Mixe</a>
			  <a class="dropdown-item" data-toggle="modal" data-target="#act2" href="">Nahuatl</a>
          </div>
        </li>
		  <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="MisCursos.php" id="pagesDropdown" role="button" >
            <i class="fas fa-fw fa-folder-open"></i>
            <span>Mis Cursos</span>
          </a>
          
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="pagesDropdown" href="charts.html" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-list a-li"></i>
            <span>Traductor</span>
			</a>
			<div class="dropdown-menu" aria-labelledby="pagesDropdown">
				<h6 class="dropdown-header">Lenguas</h6>
				<a class="dropdown-item" href="traslatormixe.php">Mixe</a>
				<a class="dropdown-item" href="traslatornahuatl.php">Nahuatl</a>
				
			</div>
        </li>
		
        <li class="nav-item">
          <a class="nav-link" href="botvoice/index.php">
            <i class="fas fa-fw fa-robot"></i>
            <span>Bot (Beta)</span>
          </a>
        </li>
      </ul>
			<div id="content-wrapper" class="container-fluid align-content-center jumbotron">
				<div class="container mx-auto w-75">
					
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
				<!-- footer -->
				
			</div>
			<iframe
    allow="microphone;"
    width="50%"
    height="530"
    src="https://console.dialogflow.com/api-client/demo/embedded/3e98889a-84c3-4e5a-8f7a-dbeefff12b29">
</iframe>
			
		</div>
		
   

    <script src="script.js"></script>
  </body>
</html>