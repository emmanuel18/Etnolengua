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

$idcurso=$_POST['idcurso'];
$unidad=$_POST['unidad'];

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
	<link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

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
                <a class="dropdown-item" href="#">Configuración</a>
            <a class="dropdown-item" href="#">Editar perfil</a>
            <div class="dropdown-divider"></div>
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
			  <h2 class="breadcrumb justify-content-center text-dark"><b>Curso:</b>
			   <?php 
				  $Ncurso="SELECT Nombre From Cursos Where IdCurso=$idcurso";
				  $Nc=mysqli_query($conexion, $Ncurso);
				  if($rw3=mysqli_fetch_row($Nc)){
					$rs3=trim($rw3[0]);	
				  }
				  echo utf8_encode($rs3." ");
				  ?><b>&nbsp;Unidad: </b>
				  <?php echo($unidad); ?>
			  </h2> 
			     
		</div>
		<h2 class="h2 text-center text-secondary"><p class="fa fa-chalkboard"></p> Crear Actividades</h2>
		<div class="row container justify-content-center">	
			
			<p>&nbsp; &nbsp; &nbsp;</p>
			
			<button class="dropdown-item bg-primary radius" href="#" data-toggle="modal" data-target="#reading" style="width: 14rem;"
					<?php 
					$validlectura="SELECT IdLectura FROM lectura where IdCurso='$idcurso' AND Unidad='$unidad'";
					$validar=mysqli_query($conexion, $validlectura);
					if($v=mysqli_fetch_row($validar)){
						echo("disabled");
						$check1=1;
					}
					
					?>
					> 
				<div class="card-body">
					
					<h5 class="card-title text-center text-light">Lectura
						<?php
						error_reporting(0);
						if($check1==1){
							echo("<br>Creada");
						}
						?>					
					</h5>
					<p class="card-img fa 
							 <?php
								error_reporting(0);
								if($check1==1){
									echo("fa-check-circle");
								}else{
									echo("fa-book-reader");
								}
							?>
							  
							  fa-6x text-center text-light"></p>
					
				</div> 
			</button>
			
			<p>&nbsp; &nbsp; &nbsp;</p>
			<Button class="dropdown-item radius bg-dark" href="#" data-toggle="modal" data-target="#quest" style="width: 14rem;"
					<?php 
					$validcues="SELECT IdCuestionario FROM cuestionario where IdCurso='$idcurso' AND Unidad='$unidad'";
					$validarcues=mysqli_query($conexion, $validcues);
					if($v2=mysqli_fetch_row($validarcues)){
						echo("disabled");
						$check2=1;
					}
					
					?>
					> 
				<div class="card-body">
					<h5 class="card-title text-center text-light">Cuestionario
						<?php
						error_reporting(0);
						if($check2==1){
							echo("<br>Creado");
						}
						?>
					</h5>
					<p class="card-img fa fa-6x text-center text-light 
							  <?php
								error_reporting(0);
								if($check2==1){
									echo("fa-check-circle");
								}else{
									echo("fa-question-circle");
								}
							?>
							  "></p>
				</div> 
			</Button>
			<p>&nbsp; &nbsp; &nbsp;</p>
			<button class="dropdown-item radius bg-danger" href="#" data-toggle="modal" data-target="#test" style="width: 14rem;"
					<?php 
					$validtest="SELECT IdExamen FROM examen where IdCurso='$idcurso' AND Unidad='$unidad'";
					$validartest=mysqli_query($conexion, $validtest);
					if($v3=mysqli_fetch_row($validartest)){
						echo("disabled");
						$check3=1;
					}
					
					?>
					> 
				<div class="card-body">
					<h5 class="card-title text-center text-light">Evaluación
					<?php
						error_reporting(0);
						if($check3==1){
							echo("<br>Creada");
						}
					?>
					</h5>
					<p class="card-img fa fa-6x text-light text-center 
							  <?php
								error_reporting(0);
								if($check3==1){
									echo("fa-check-circle");
								}else{
									echo("fa-pencil-ruler");
								}
							 ?>
							  "></p>
				</div> 
			</button>
			<p>&nbsp; &nbsp; &nbsp;</p>
			<button class="dropdown-item radius bg-success" href="#" data-toggle="modal" data-target="#" style="width: 14rem;"> 
				<div class="card-body">
					<h5 class="card-title text-center text-light">Juego(beta)</h5>
					<p class="card-img fa fa-gamepad fa-6x text-center text-light"></p>
				</div> 
			</button>
			    
		 </div>
			<p> </p>
			<h2 class="h2 text-center text-secondary"><p class="fa fa-upload"></p> Subir Archivos</h2>
		<div class="row container justify-content-center">	
			<p>&nbsp; &nbsp; &nbsp;</p>
			<form action="uploadimg/index.php" method="post">
				<input type="hidden" name="idcurso" value="<?php echo($idcurso); ?>">
				<input type="hidden" value="<?php echo($unidad); ?>" name="unidad">
				<input type="hidden" name="tipo" value="imagen">
				<button class="dropdown-item bg-secondary radius" type="submit" href="#" data-toggle="modal" data-target="#reading" style="width: 14rem;"
						<?php 
							$validimg="SELECT IdFile FROM archivo where IdCurso='$idcurso' AND Unidad='$unidad' AND Tipo='imagen'";
							$validarimg=mysqli_query($conexion, $validimg);
							if($v4=mysqli_fetch_row($validarimg)){
								echo("disabled");
								$check4=1;
							}					
						?>
						> 
					<div class="card-body">
						<h5 class="card-title text-center text-light">Imagen
						<?php
						error_reporting(0);
						if($check4==1){
							echo("Cargada");
						}
					?>
						</h5>
						<p class="card-img fa fa-6x text-center text-light 
								  <?php
								error_reporting(0);
								if($check4==1){
									echo("fa-check-circle");
								}else{
									echo("fa-camera");
								}
							 ?>
								  "></p>
					</div> 
				</button>	
			</form>
			<p>&nbsp; &nbsp; &nbsp;</p>
			<form action="uploadaudio/index.php" method="post">
				<input type="hidden" name="idcurso" value="<?php echo($idcurso); ?>">
				<input type="hidden" value="<?php echo($unidad); ?>" name="unidad">
				<input type="hidden" name="tipo" value="audio">
				<button class="dropdown-item radius bg-info" type="submit" href="#" data-toggle="modal" data-target="#quest" style="width: 14rem;"
						<?php 
							$validaud="SELECT IdFile FROM archivo where IdCurso='$idcurso' AND Unidad='$unidad' AND Tipo='audio'";
							$validaraud=mysqli_query($conexion, $validaud);
							if($v5=mysqli_fetch_row($validaraud)){
								echo("disabled");
								$check5=1;
							}					
						?>
						> 
					<div class="card-body">
						<h5 class="card-title text-center text-light">Audio
						<?php
						error_reporting(0);
						if($check5==1){
							echo(" Cargado");
						}
					?>
						</h5>
						<p class="card-img fa fa-6x text-center text-light
								  <?php
								error_reporting(0);
								if($check5==1){
									echo("fa-check-circle");
								}else{
									echo("fa-volume-up");
								}
							 ?>
								  "></p>
					</div> 
				</button>
			</form>
			<p>&nbsp; &nbsp; &nbsp;</p>
			<form action="uploadvideo/index.php" method="post">
				<input type="hidden" name="idcurso" value="<?php echo($idcurso); ?>">
				<input type="hidden" value="<?php echo($unidad); ?>" name="unidad">
				<input type="hidden" name="tipo" value="video">
				<button class="dropdown-item radius bg-warning" type="submit" href="#" data-toggle="modal" data-target="#test" style="width: 14rem;"
						<?php 
							$validvid="SELECT IdFile FROM archivo where IdCurso='$idcurso' AND Unidad='$unidad' AND Tipo='video'";
							$validarvid=mysqli_query($conexion, $validvid);
							if($v6=mysqli_fetch_row($validarvid)){
								echo("disabled");
								$check6=1;
							}					
						?>
						> 
					<div class="card-body">
						<h5 class="card-title text-center text-light">Video
						<?php
						error_reporting(0);
						if($check6==1){
							echo(" Cargado");
						}
						?>
						</h5>
						<p class="card-img fa fa-6x text-light text-center
								 <?php
								error_reporting(0);
								if($check6==1){
									echo("fa-check-circle");
								}else{
									echo("fa-video");
								}
							 ?>"></p>
					</div> 
				</button>
			</form>
			<p>&nbsp; &nbsp; &nbsp;</p>
			<form action="uploaddoc/index.php" method="post">
				<input type="hidden" name="idcurso" value="<?php echo($idcurso); ?>">
				<input type="hidden" value="<?php echo($unidad); ?>" name="unidad">
				<input type="hidden" name="tipo" value="documento">
				<button class="dropdown-item radius bg-primary" type="submit" href="#" data-toggle="modal" data-target="#" style="width: 14rem;"
						<?php 
							$validdoc="SELECT IdFile FROM archivo where IdCurso='$idcurso' AND Unidad='$unidad' AND Tipo='documento'";
							$validardoc=mysqli_query($conexion, $validdoc);
							if($v7=mysqli_fetch_row($validardoc)){
								echo("disabled");
								$check7=1;
							}					
						?>
						> 
					<div class="card-body">
						<h5 class="card-title text-center text-light">Documentos
						<?php
						error_reporting(0);
						if($check7==1){
							echo("Carg...");
						}
						?>
						</h5>
						<p class="card-img fa fa-6x text-center text-light
								  <?php
								error_reporting(0);
								if($check7==1){
									echo("fa-check-circle");
								}else{
									echo("fa-file-word");
								}
							 ?>
								  "></p>
					</div> 
				</button>
			</form>    
		 </div>
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
		  <br>
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Etnolengua 2018</span>
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
	  
	<div class="modal fade" id="quest" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
	 <div class="modal-dialog" role="document">
		 <div class="modal-content">
			 <div class="modal-header">
			 <h5 class="modal-title" id="exampleModalLabel">Crea un cuestionario</h5>
				 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
				 <span aria-hidden="true">X</span> 
				 </button>
			 </div> 
		<div class="modal-body"> 
		<form action="act.php" method="post" id="cuestionario">
	  		<div class="form-group">
				<center>
				<label for="exampleInputTittle"><b>Título del Cuestionario</b></label></center>
				<input class="form-control" type="text" name="Titulo" placeholder="Insertar Título" required>
			</div>
			<div class="form-group">
				<label for="exampleInputQuestion">Pregunta 1</label>
				<input class="form-control" type="text" name="Pregunta1" placeholder="Escribe la primer pregunta" required>
				</div>
			
					<div class="form-group">
				<label for="exampleInputQuestion">Pregunta 2</label>
				<input class="form-control" type="text" name="Pregunta2" placeholder="Escribe la segunda pregunta" required>
				</div>
			
					<div class="form-group">
				<label for="exampleInputQuestion">Pregunta 3</label>
				<input class="form-control" type="text" name="Pregunta3" placeholder="Escribe la tercer pregunta" required>
				</div>
			
					<div class="form-group">
				<label for="exampleInputQuestion">Pregunta 4</label>
				<input class="form-control" type="text" name="Pregunta4" placeholder="Escribe la cuarta pregunta" required>
				</div>
			
					<div class="form-group">
				<label for="exampleInputQuestion">Pregunta 5</label>
				<input class="form-control" type="text" name="Pregunta5" placeholder="Escribe la quinta pregunta" required>
				</div>
			
					<div class="form-group">
				<label for="exampleInputQuestion">Pregunta 6</label>
				<input class="form-control" type="text" name="Pregunta6" placeholder="Escribe la sexta pregunta" required>
				</div>
			
					<div class="form-group">
				<label for="exampleInputQuestion">Pregunta 7</label>
				<input class="form-control" type="text" name="Pregunta7" placeholder="Escribe la septima pregunta" required>
				</div>
			
					<div class="form-group">
				<label for="exampleInputQuestion">Pregunta 8</label>
				<input class="form-control" type="text" name="Pregunta8" placeholder="Escribe la octava pregunta" required>
			    </div>
			</div>
			<input type="hidden" value="<?php echo($idcurso); ?>" name="idcurso">
			<input type="hidden" value="<?php echo($unidad); ?>" name="unidad">
			<div class="modal-footer">
            	<button class="btn btn-primary" type="submit">Enviar</button>
            	
          </div>
	  	</form>
		 </div>
		</div>
		<?php
		error_reporting(0);
		$Titulo=$_POST['Titulo'];
		$Pregunta1=$_POST['Pregunta1'];
		$Pregunta2=$_POST['Pregunta2'];
		$Pregunta3=$_POST['Pregunta3'];
		$Pregunta4=$_POST['Pregunta4'];
		$Pregunta5=$_POST['Pregunta5'];
		$Pregunta6=$_POST['Pregunta6'];
		$Pregunta7=$_POST['Pregunta7'];
		$Pregunta8=$_POST['Pregunta8'];
		
		if($Titulo==''){
			
		}
		else{
		$Cuestionario="INSERT INTO cuestionario (IdCurso, Nombre, Pregunta1, Pregunta2, Pregunta3, Pregunta4, Pregunta5, Pregunta6, Pregunta7, Pregunta8, Unidad ) VALUES ('$idcurso', '$Titulo', '$Pregunta1', '$Pregunta2', '$Pregunta3', '$Pregunta4', '$Pregunta5', '$Pregunta6', '$Pregunta7', '$Pregunta8', '$unidad')";
		$insertar=mysqli_query($conexion, $Cuestionario);
		echo '<script languaje="javascript">alert("Cuestionario creado");
			window.location.href="Cursos.php";
			</script>';
		}
		?>
		</div>
	<div class="modal fade" id="reading" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
	 <div class="modal-dialog" role="document">
		 <div class="modal-content">
			 <div class="modal-header">
			 <h5 class="modal-title" id="exampleModalLabel">Crear una lectura para tus estudiantes</h5>
				 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
				 <span aria-hidden="true">X</span> 
				 </button>
			 </div> 
		<div class="modal-body"> 
		<form action="act.php" method="post" id="lec">
	  		<div class="form-group">
				<center>
				<label for="exampleInputTittle"><b>Inserta Texto en Lengua Indígena</b></label></center>
				<textarea class="form-control" type="text" name="txtind" placeholder="Lengua Indígena" rows="5" required></textarea>
				
			</div>
			<div class="form-group">
				<center>
				<label for="exampleInputTittle"><b>Inserta Texto en Español</b></label></center>
				<textarea class="form-control" type="text" name="esp" placeholder="Español" rows="5" required></textarea>
				
			</div>
				<input type="hidden" value="<?php echo($idcurso); ?>" name="idcurso">	
				<input type="hidden" value="<?php echo($unidad); ?>" name="unidad">
			<div class="modal-footer">
            	<button class="btn btn-primary" type="submit" >Enviar</button>
            	
          </div>
	  	</form>
		</div>
		</div>
		</div>
		<?php
	error_reporting(0);	
	$ind=$_POST['txtind'];
	$esp=$_POST['esp'];
	//$idcurso=$_POST['idcurso'];
	if (($ind=='' && $esp=='')||($ind=='0' && $esp=='0')){
		
	}
	else{
		$Lectura="INSERT INTO lectura (IdCurso, TextLngInd, TextEsp, Unidad) VALUES ('$idcurso', '$ind', '$esp', '$unidad')";
		$insertar=mysqli_query($conexion, $Lectura);
		echo '<script languaje="javascript">alert("Lectura creada");
			window.location.href="Cursos.php";
			</script>';
		
	}
?>
	  </div>
	  
	<div class="modal fade" id="test" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
	 <div class="modal-dialog" role="document">
		 <div class="modal-content">
			 <div class="modal-header">
			 <h5 class="modal-title" id="exampleModalLabel">Crea una evaluación para la unidad</h5>
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
					<input type="hidden" value="<?php echo($unidad); ?>" name="unidad">
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
