<?php
session_start();
$id = $_SESSION[ 'id' ];
$cr = $_SESSION[ 'Correo' ];
$ps = $_SESSION[ 'Password' ];
$sesion = $_SESSION[ 'IdSesion' ];
$Query = "SELECT Nombre FROM userprofe WHERE Correo='$cr'";
$conexion = mysqli_connect( "localhost", "etnoleng_emmanue", "estrada_18", "etnoleng_mixe" );
$qr = mysqli_query( $conexion, $Query );
if ( $rw = mysqli_fetch_row( $qr ) ) {
	$rs = trim( $rw[ 0 ] );
}

if ( $_SESSION[ 'id' ] == null ) {
	header( 'location: ../default.php' );
}
$numpreg = $_POST[ 'num' ];
$idcurso = $_POST[ 'idcurso' ];
$introd = $_POST[ 'introd' ];
$unidad = $_POST[ 'unidad' ];

?>
<!DOCTYPE html>
<html lang="es">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Perfil || Profesor</title>
	<link rel="icon" type="image/png" href="../images/favicon.png" alt="Etnolengua Favicon">

	<!-- Bootstrap core CSS-->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom fonts for this template-->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

	<!-- Page level plugin CSS-->
	<link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

	<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

		<a class="navbar-brand mr-1" href="index.php"><img src="../images/logo.png" width="150" height="auto" alt=""/></a>

		<button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>
	

		<!-- Navbar Search -->
		<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
			<div class="input-group">
				<input type="hidden" class="form-control" placeholder="Buscar Herramientas" aria-label="Search" aria-describedby="basic-addon2">
				<div class="input-group-append">
					<button class="btn btn-primary" type="button" hidden="">
              <i class="fal fa-search"></i>
            </button>
				
				</div>
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
					<a class="dropdown-item" href="#">Bandeja vacía</a>
					<!-- <a class="dropdown-item" href="#">Another action</a>
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
					<a class="dropdown-item" href="#">No tienes mensajes</a>
					<!-- <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a> -->
				</div>
			</li>
			<li class="nav-item dropdown no-arrow">
				<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas">
				<?php
				$query2="SELECT Fotoperfil FROM Userprofe WHERE Correo='$cr'";
				$Foto=mysqli_query($conexion, $query2);
				if($row2=mysqli_fetch_array($Foto)){
					$ft=trim($row2[0]);
				}
				echo("<img src='../phpregistro/bdimagen/$ft' width='35' height='35' class='rounded-circle'>");
				?>  
			</i>
          </a>
			
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
					<!-- <a class="dropdown-item" href="#">Configuración</a>
            <a class="dropdown-item" href="#">Editar perfil</a>
            <div class="dropdown-divider"></div> -->
					<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Cerrar sesión</a>
				</div>
			</li>
			<li class="navbar-text mr-1">
				<?php
				$Token = strtok( $rs, " \n\t" );
				if ( $Token !== false ) {
					echo( "$Token<br>" );
				}
				?>

			</li>
		</ul>

	</nav>

	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="sidebar navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="Cursos.php">
            <i class="fas fa-fw fa-book"></i>
            <span>Mis cursos</span>
          </a>
			
			</li>
			<li class="nav-item">
				<a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-book-open"></i>
            <span>Crear nuevo curso</span>
          </a>
			
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Archivos</span>
          </a>
			

			</li>
			<!-- <li class="nav-item">
          <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Estadisticas</span></a>
        </li>-->
		</ul>

		<div id="content-wrapper">

			<div class="container-fluid">


				<!-- Page Content -->
				<div class="container-fluid align-content-center">
					<h2 class="breadcrumb justify-content-center text-dark"><b>Quizz de Escuchar de la
			   <?php 
				  $Ncurso="SELECT Nombre From Cursos Where IdCurso=$idcurso";
				  $Nc=mysqli_query($conexion, $Ncurso);
				  if($rw3=mysqli_fetch_row($Nc)){
					$rs3=trim($rw3[0]);	
				  }
				  
				  ?>lección: </b>
				  <?php echo($unidad); ?>
			  </h2>
					<div class="alert alert-success">
						<i class="fas fa-info-circle"></i> Escribe una pregunta e inserta la respuesta correcta. <br>
						<i class="fas fa-info-circle"></i> Puedes agregar imágenes para ilustrar mejor la pregunta. <br>
						<i class="fas fa-info-circle"></i> Agrerga un archivo de audio (Obligatorio).
					</div>
				</div>

			</div>
			<div class="container">
				<div class="row">
					<div class="col-12 col-md-8 mx-auto">
						<div class="form-group  jumbotron">
							<form action="QuizzPronunciacion.php" method="post" enctype="multipart/form-data">
								<center><label class="col-form-label-lg font-weight-bold">Pregunta <?php echo($introd); ?></label>
								</center>
								<div class="input-group mb-3">

									<label for="imagen">Carga una imagen (Opcional)</label>
									<input class="btn btn-block btn-info" type="file" name="imagen" id="imagen" accept="image/*">

								</div>
								<div class="dropdown-divider"></div>
								<input class="form-control" type="text" name="Pregunta" placeholder="Introduce la pregunta" required>
								<br>
								<div class="form-row">
									<div class="col">
										<input type="text" class="form-control" name="respc" placeholder="Respuesta Correcta" required>
									</div>
								</div>
								<div class="dropdown-divider"></div>
								<div class="input-group mb-3">
									<label for="audio">Cargar audio (Obligatorio)</label>
									<input class="btn btn-block btn-info" type="file" name="audio" id="audio" accept="audio/*">
								</div>
								<br>
								<input type="hidden" value="<?php echo($idcurso); ?>" name="idcurso">
								<input type="hidden" value="<?php echo($introd+1);?>" name="introd">
								<input type="hidden" value="<?php echo($numpreg); ?>" name="num">
								<input type="hidden" value="<?php echo($unidad); ?>" name="unidad">

								<div class="modal-footer">
									<?php 
						if($introd<$numpreg){
			  				echo("<input type='submit' class='btn btn-success' value='Siguiente'>");
			  			}
		  				else{
			  				echo("<input type='submit' class='btn btn-danger' value='Finalizar'>"); 
		  				}
					?>


								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /.container-fluid -->
			<?php

			error_reporting( 0 );
			$dir_upload = 'files/';
			$file_upload = $dir_upload . basename( $_FILES[ 'imagen' ][ 'name' ] );
			$Pregunta = $_POST[ 'Pregunta' ];
			$RespC = $_POST[ 'respc' ];
			$RespC=addslashes($RespC);
			$Audio = $dir_upload . basename( $_FILES['audio']['name']);

			if ( $introd <= $numpreg ) {
				if (move_uploaded_file( $_FILES[ 'audio' ][ 'tmp_name' ], $Audio )) {
					if(move_uploaded_file( $_FILES[ 'imagen' ][ 'tmp_name' ], $file_upload )) {
						$Qr = "insert into quizzpron(IdCurso, NumLec, Imagen, Pregunta, Respuesta, Audio) VALUES('$idcurso', '$unidad', '$file_upload', '$Pregunta', '$RespC', '$Audio')";
						echo("1");
					}else{
						$Qr = "insert into quizzpron(IdCurso, NumLec, Pregunta, Respuesta, Audio) VALUES('$idcurso', '$unidad', '$Pregunta', '$RespC', '$Audio')";
						echo("2");
					}					
					$ct = mysqli_query( $conexion, $Qr );
					echo("3");
				} 
			} else {
				if (move_uploaded_file( $_FILES[ 'audio' ][ 'tmp_name' ], $Audio )) {
					if(move_uploaded_file( $_FILES[ 'imagen' ][ 'tmp_name' ], $file_upload )) {
						$Qr = "insert into quizzpron(IdCurso, NumLec, Imagen, Pregunta, Respuesta, Audio) VALUES('$idcurso', '$unidad', '$file_upload', '$Pregunta', '$RespC', '$Audio')";
						echo("4");
					}else{
						$Qr = "insert into quizzpron(IdCurso, NumLec, Pregunta, Respuesta, Audio) VALUES('$idcurso', '$unidad', '$Pregunta', '$RespC', '$Audio')";
						echo("5");
					}					
					$ct = mysqli_query( $conexion, $Qr );
					echo("6");
				} 
				echo '<script languaje="javascript">alert("Quizz creado exitosamente.");
				window.location.href="Cursos.php";
			</script>';
			}
			?>
			<!-- Sticky Footer -->
			<footer class="sticky-footer">
				<div class="container my-auto">
					<div class="copyright text-center my-auto">
						<span>Copyright © Etnolengua 2019</span>
					</div>
				</div>
			</footer>

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>


	<!-- Logout Modal-->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">¿Está seguro que desea cerrar sesión?</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
				
				</div>
				<div class="modal-body">Selecciona "cerrar sesión" para salir.</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
					<a class="btn btn-primary" href="../phpsesioncontrol/cerrarsesion.php">Cerrar Sesión</a>
				</div>
			</div>
		</div>
	</div>


	<!-- Bootstrap core JavaScript-->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="js/sb-admin.min.js"></script>

</body>

</html>