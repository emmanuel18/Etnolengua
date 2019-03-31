<?php
session_start();
$id=$_SESSION['id'];
$cr=$_SESSION['Correo'];
$ps=$_SESSION['Password'];
$sesion=$_SESSION['IdSesion'];
$Query="SELECT Nombre FROM userprofe WHERE Correo='$cr'";
$conexion = mysqli_connect("localhost", "etnoleng_emmanue", "estrada_18", "etnoleng_mixe");
$qr=mysqli_query($conexion,$Query);
if($rw=mysqli_fetch_row($qr)){
	$rs=trim($rw[0]);	
}

if ($_SESSION['id']==null){
	header('location: ../default.php');
}

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
	 <!-- <script>
	  $('.btn-fl').hover(function(){
		  $('.btn').addClass('animacionVer');
	  })
		$('.container2').mouseleave(function(){
			$('.btn').removeClass('animacionVer');
		})	
		  
	  </script> -->
    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="index.php"><img src="../images/logo.png" width="150" height="auto" alt=""/></a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
         <!-- <input type="text" class="form-control" placeholder="Buscar Herramientas" aria-label="Search" aria-describedby="basic-addon2">
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
            <a class="dropdown-item" href="#">Sin Notificaciones</a>
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
            <a class="dropdown-item" href="#">No hay mensajes</a>
            <!-- <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a> -->
          </div>
        </li>
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas">
				<?php
				$query2="SELECT Fotoperfil FROM userprofe WHERE id='$sesion'";
				$Foto=mysqli_query($conexion, $query2);
				if($row2=mysqli_fetch_array($Foto)){
					$ft=trim($row2[0]);
				}
				echo("<img src='../phpregistro/bdimagen/$ft' width='35' height='35' class='rounded-circle'>");
				?>  
			</i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <!--<a class="dropdown-item" href="#">Configuración</a>
            <a class="dropdown-item" href="#">Editar perfil</a>
            <div class="dropdown-divider"></div> -->
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Cerrar sesión</a>
          </div>
        </li>
		<li class="navbar-text mr-1">
		   	<?php
			  $Token=strtok($rs, " \n\t");
			  if($Token!==false){
				  echo("$Token<br>");
			  }
			 ?>
		  
		</li>
      </ul>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
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
          
          <div class="form-group">
			  <h1 class="h1 text-center">Mis cursos</h1>
			  <div class="row container justify-content-center clearfix">
				  
				  <?php
					$cursos="SELECT * From cursos Where $sesion=IdProfesor";
					
				    if($nomcur=mysqli_query($conexion, $cursos)){
						 while($arrayres=mysqli_fetch_array($nomcur)){
							$idcurso=$arrayres["IdCurso"];						
							echo "<div class='card text-center mx-2' style=' width: 18rem; '>";				
							echo "<img class='card-img-top align-middle' src='php/bdfiles/"; 
							echo $arrayres["Presentacion"];
							echo "' height='160' width='286px'>";
							echo "<div class='card-body bg-light' >";
							echo "<h5 class='card-title'><b>";
							echo utf8_encode ($arrayres["Nombre"]);
							echo "</b></h5>";
							echo "<p class='card-text'>";
							echo utf8_encode ($arrayres["Descripcion"]);
							echo "<br><div class='dropdown-divider'></div><h6><b>Crear actividades</b></h6>";
							echo "<form action='act.php' method='post' class='mx-auto'>
									<input type='hidden' name='idcurso' value=$idcurso>
									<input type='hidden' name='unidad' value=1>
									<input type='submit' class='btn btn-primary btn-block' name='enviar' value='Lección 1'>
								  </form>

								  <form action='act.php' method='post' style=' margin-top: 7px;'>
									<input type='hidden' name='idcurso' value=$idcurso>
									<input type='hidden' name='unidad' value=2>
									<input type='submit' class='btn btn-success btn-block' name='enviar' value='Lección 2'>
								  </form>

								  <form action='act.php' method='post'  style=' margin-top: 7px;'>
									<input type='hidden' name='idcurso' value=$idcurso>
									<input type='hidden' name='unidad' value=3>
									<input type='submit' class='btn btn-info btn-block' name='enviar' value='Lección 3'>
								  </form>

								";
							echo "</p> </div>
							<div class='card-footer' style='background-color: #EFEFEF'>
								<a class='btn btn-secondary btn-block' href='#' data-toggle='modal' data-target='#test'>Crear Evaluación</a>
								
							</div>
							</div> ";						
					}
						
					}
				    $validcurso=mysqli_query($conexion, $cursos);
				    $valid=mysqli_num_rows($validcurso);
				    if($valid==0){
						echo("
						<div class='card text-center bg-gris' style='width: 18rem;'>  
						<div class='card-body'> <h5 class='card-title text-center'>Aún no tienes cursos resgistrados.</h5>
						<a class='btn btn-primary' href='index.php'>Crea tu primer curso aquí <i class='fas fa-arrow-circle-down'></i></a>
						</div>
						</div>
						 ");
					}
				    
				    
					
				  ?>

				
			  </div>
		</div>
		
			
        </div>
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
	<!-- evaluacion modal --> 
	<div class="modal fade" id="test" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
	 <div class="modal-dialog" role="document">
		 <div class="modal-content">
			 <div class="modal-header">
			 <h5 class="modal-title" id="exampleModalLabel">Crea una evaluación general del curso</h5>
				 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
				 <span aria-hidden="true">X</span> 
				 </button>
			 </div> 
			<div class="modal-body"> 
				<form action="test.php" method="post" id="cuestionario">
	  		
					<div class="form-group">
						<center><label for="exampleInputQuestion" class="font-weight-bold">Número de preguntas</label></center>
						<input class="form-control" type="number" name="num" value="5" required>
					</div>
					
					
				    <input type="hidden" value="<?php echo($idcurso); ?>" name="idcurso">
					<input type="hidden" value="<?php echo(0); ?>" name="introd">
					<input type="hidden" value="4" name="unidad">
					<div class="modal-footer">
            			<button class="btn btn-primary" type="submit">Crear</button>
          			</div>
	  			</form>
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
