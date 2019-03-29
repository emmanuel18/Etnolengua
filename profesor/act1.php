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
            <!-- <a class="dropdown-item" href="#">Configuración</a>
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
				  ?><b>&nbsp;Lección: </b>
				  <?php echo($unidad); ?>
			  </h2> 
			     
		</div>
		<div class="alert alert-success"><i class="fas fa-info-circle"></i> Crea una Quizz de Aprendizaje</div>
		<div class="row container justify-content-center">	
			
			 
			
			<p>&nbsp; &nbsp; &nbsp;</p>
			<Button class="dropdown-item radius bg-warning" href="#" data-toggle="modal" data-target="#quest" style="width: 14rem;"
					<?php 
					$validcues="SELECT IdCuestionario FROM cuestionario where IdCurso='$idcurso' AND Unidad='$unidad'";
					$validgram="SELECT IdQuizz FROM quizzgram where IdCurso='$idcurso' AND NumLec='$unidad'";
					$validpron="SELECT IdQuizz FROM quizzpron where IdCurso='$idcurso' AND NumLec='$unidad'";
					$validsimb="SELECT IdQuizz FROM quizzsimb where IdCurso='$idcurso' AND NumLec='$unidad'";
					$validargram=mysqli_query($conexion, $validgram);
					$validarpron=mysqli_query($conexion, $validpron);
					$validarsimb=mysqli_query($conexion, $validsimb);
					$validarcues=mysqli_query($conexion, $validcues);
					if($v2=mysqli_fetch_row($validarcues)){
						echo("disabled");
						$check2=1;
					}
					elseif($v2=mysqli_fetch_row($validargram)){
						echo("disabled");
						$check2=1;
					}
					elseif($v2=mysqli_fetch_row($validarpron)){
						echo("disabled");
						$check2=1;
					}
					elseif($v2=mysqli_fetch_row($validarsimb)){
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
			<button class="dropdown-item radius bg-success" href="#" data-toggle="modal" data-target="#Pronunciación" style="width: 14rem;" 
					<?php
					if($check2==1){
						echo("disabled");
					}					
					
					?>
					> 
				<div class="card-body">
					<h5 class="card-title text-center text-light">Escucha la<br>Pronunciación</h5>
					<p class="card-img fa 
							  <?php
							     error_reporting(0);
								if($check2==1){
									echo("fa-check-circle");
								}else{
									echo("fa-headphones-alt");
								}
							  ?>
							  fa-6x text-center text-light"></p>					
				</div> 
			</button>
			<p>&nbsp; &nbsp; &nbsp;</p>
			<button class="dropdown-item radius bg-primary" href="#" data-toggle="modal" data-target="#Gramática" style="width: 14rem;"
					<?php
					if($check2==1){
						echo("disabled");
					}					
					
					?>
			   > 
				<div class="card-body">
					<h5 class="card-title text-center text-light"><br>Escritura</h5>
					<p class="card-img fa 
							  <?php
							     error_reporting(0);
								if($check2==1){
									echo("fa-check-circle");
								}else{
									echo("fa-pencil-alt");
								}
							  ?>
							  fa-6x text-center text-light"></p>
					
				</div> 
			</button>
			 <p>&nbsp; &nbsp; &nbsp;</p>
			<button class="dropdown-item radius bg-danger" href="#" data-toggle="modal" data-target="#Palabra" style="width: 14rem;"
			   <?php
					if($check2==1){
						echo("disabled");
					}					
					
					?>
			   > 
				<div class="card-body">
					<h5 class="card-title text-center text-light">Pronuncia</h5>
					<p class="card-img fa 
							  <?php
							     error_reporting(0);
								if($check2==1){
									echo("fa-check-circle");
								}else{
									echo("fa-microphone-alt");
								}
							  ?>
							   fa-6x text-center text-light"></p>
				</div> 
			</button>
			
			 
			
		 </div><div class="dropdown-divider"></div>
			<!--<div class="d-flex justify-content-center">
				<form action="act1.php" method="post">
					<input type='hidden' name='idcurso' value=$idcurso>
					<input type='hidden' name='unidad' value=2> 
					<button type="submit" class="btn btn-danger btn-lg">Crear Actividad</button>
				</form>
			</div>-->
		  
			
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
		  <br>
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
		<form action="act1.php" method="post" id="cuestionario">
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
		
		</div>
	<div class="modal fade" id="Palabra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
	 <div class="modal-dialog" role="document">
		 <div class="modal-content">
			 <div class="modal-header">
			 <h5 class="modal-title" id="exampleModalLabel">Crea un Quizz de Pronunciación</h5>
				 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
				 <span aria-hidden="true">X</span> 
				 </button>
			 </div> 
			<div class="modal-body"> 
				<form action="Quizzpalabra.php" method="post" id="cuestionario">
	  		
					<div class="form-group">
						<center><label for="exampleInputQuestion" class="font-weight-bold">Número de preguntas</label></center>
						<input class="form-control" type="number" name="num" value="5" required>
					</div>
					
					
				    <input type="hidden" value="<?php echo($idcurso); ?>" name="idcurso">
					<input type="hidden" value="<?php echo(1); ?>" name="introd">
					<input type="hidden" value="<?php echo($unidad); ?>" name="unidad">
					<div class="modal-footer">
            			<button class="btn btn-primary" type="submit">Crear</button>
          			</div>
	  			</form>
		 </div>
		</div>
		</div>
	  </div>
	  
	<div class="modal fade" id="Gramática" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
	 <div class="modal-dialog" role="document">
		 <div class="modal-content">
			 <div class="modal-header">
			 <h5 class="modal-title" id="exampleModalLabel">Crea un Quizz de Gramática</h5>
				 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
				 <span aria-hidden="true">X</span> 
				 </button>
			 </div> 
			<div class="modal-body"> 
				<form action="QuizzGramatica.php" method="post" id="cuestionario">
	  		
					<div class="form-group">
						<center><label for="exampleInputQuestion" class="font-weight-bold">Número de preguntas</label></center>
						<input class="form-control" type="number" name="num" value="5" required>
					</div>
					
					
				    <input type="hidden" value="<?php echo($idcurso); ?>" name="idcurso">
					<input type="hidden" value="<?php echo(1); ?>" name="introd">
					<input type="hidden" value="<?php echo($unidad); ?>" name="unidad">
					<div class="modal-footer">
            			<button class="btn btn-primary" type="submit">Crear</button>
          			</div>
	  			</form>
		 </div>
		</div>
		</div>
	  </div>
	  
	  <div class="modal fade" id="Pronunciación" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
	 <div class="modal-dialog" role="document">
		 <div class="modal-content">
			 <div class="modal-header">
			 <h5 class="modal-title" id="exampleModalLabel">Crea un Quizz para identificar palabras</h5>
				 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
				 <span aria-hidden="true">X</span> 
				 </button>
			 </div> 
			<div class="modal-body"> 
				<form action="QuizzPronunciacion.php" method="post" id="cuestionario">
	  		
					<div class="form-group">
						<center><label for="exampleInputQuestion" class="font-weight-bold">Número de preguntas</label></center>
						<input class="form-control" type="number" name="num" value="5" required>
					</div>
					
					
				    <input type="hidden" value="<?php echo($idcurso); ?>" name="idcurso">
					<input type="hidden" value="<?php echo(1); ?>" name="introd">
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