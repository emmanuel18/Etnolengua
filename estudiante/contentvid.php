<?php
session_start();
$id = $_SESSION[ 'id' ];
$cr = $_SESSION[ 'Correo' ];
$ps = $_SESSION[ 'Password' ];
$iduser = $_SESSION[ 'IdSesion' ];
$Query = "SELECT Nombre FROM userestudiante WHERE Correo='$cr'";
$conexion = mysqli_connect( "localhost", "etnoleng_emmanue", "estrada_18", "etnoleng_mixe" );
$qr = mysqli_query( $conexion, $Query );
if ( $rw = mysqli_fetch_row( $qr ) ) {
	$rs = trim( $rw[ 0 ] );

}
if ( $_SESSION[ 'id' ] == null ) {
	header( 'location: ../index.php' );
}

$ncurso = $_POST[ 'ncurso' ];
$idcurso = $_POST[ 'idcurso' ];
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

	<title>Perfil || Estudiante</title>
	<link rel="icon" type="image/png" href="../images/favicon.png" alt="Etnolengua Favicon">
	<!-- Bootstrap core CSS-->
	<link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

	<!-- Custom fonts for this template-->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

	<!-- Page level plugin CSS-->
	<link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

	<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

		<a class="navbar-brand mr-1 logo" href="index.php"><img src="../images/logo.png" width="150" height="auto" alt=""/></a>


		<a class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle">
        <i class="fas fa-bars"></i>
      </a>
	




		<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
			<div class="input-group">
				<!--<input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search"></i>
            </button>
          </div>-->
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
				echo "<img class='rounded-circle' src='../phpregistro/bdimagen/$ft' width='auto' height='32'>";
				?>  
			</i>
          </a>
			


				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
					<!-- <a class="dropdown-item" href="#">Configuración</a>
            <a class="dropdown-item" href="#">Editar perfil</a> -->
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Cerrar sesión</a>
				</div>
			</li>
			<div class="navbar-text mr-1">
				<?php
				$token = strtok( $rs, " \n\t" );
				if ( $token !== false ) {
					echo( "$token" );
				}
				?>
			</div>
		</ul>

	</nav>

	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="sidebar navbar-nav">
			<li class="nav-item dropdown">
				<a class="nav-link " href="index.php" role="button">
            <i class="fas fa-fw fa-folder"></i>
            <span>Cursos</span>
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
			<!--<li class="nav-item">
          <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Avance</span>
          </a>
        </li>-->
		</ul>

		<div id="content-wrapper">
			<div class="container-fluid text-center">
				<h2 class="btn-info btn-block btn-lg" style="font-size: 25px;"><i class="fas fa-chalkboard-teacher" style="color: #1B1E49;"></i> Curso: "<?php echo($ncurso); ?>" Lección: <?php echo($unidad); ?></h2>
			</div>

			<div class="bg-white">
				<div class="text-center">
					<?php
					/*

					$consultvid = "SELECT Nombre, Tipo From archivo where IdCurso='$idcurso' AND Unidad='$unidad'";
					$vid = mysqli_query( $conexion, $consultvid );
					?>


					<?php
					while ( $arrayvid = mysqli_fetch_array( $vid ) ) {
						if ( $arrayvid[ 'Tipo' ] == "video" ) {
							echo "<video class='embed-responsive-item' width='720' height='auto' controls>";
							echo "<source src='../profesor/";
							echo( $arrayvid[ 'Nombre' ] );
							echo "'></video>";
						} elseif ( $arrayvid[ 'Tipo' ] == "documento" ) {
							echo "<iframe src='../profesor/";
							echo( $arrayvid[ 'Nombre' ] );
							echo "' class='embed-responsive-item' width='720' height='420' style='border: none; outline: none;'></iframe>";
						}
					} */

					$galeria = "SELECT IdGaleria FROM galeria WHERE NumLec=$unidad AND IdCurso=$idcurso LIMIT 1";
					$galeria1 = mysqli_query( $conexion, $galeria );
					if ( $galeria2 = mysqli_fetch_array( $galeria1 ) ) {
						include 'gallery.php';
					} 



					?>
					
				</div>
			</div>


			<div class="container-fluid text-center">
				<form action="actividad.php" method="post">
					<input type='hidden' name='idcurso' value='<?php echo($idcurso);?>'>
					<input type='hidden' name='unidad' value='<?php echo($unidad);?>'>
					<input type='hidden' name='ncurso' value='<?php echo($ncurso);?>'>
					<input type='hidden' name='aciertos' value=0>
					<input type='hidden' name='contador' value=0>

					<button class="btn btn-success btn-lg" style="font-size: 25px;" type="submit"><i class="fas fa-edit" style="color: #1B1E49;"></i>Resolver actividad</button>
				</form>
			</div>
			<br>

			<!-- /.container-fluid -->
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
	<!-- Lectura Modal-->
	


	<!-- Bootstrap core JavaScript-->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
	<!-- Custom scripts for all pages-->
	<script src="js/sb-admin.min.js"></script>


</body>

</html>