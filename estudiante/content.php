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

$ncurso=$_POST['ncurso'];
$idcurso=$_POST['idcurso'];
$narchivo=$_POST['nomarch'];
$nleccion=$_POST['nleccion'];
$tipo=$_POST['tipo'];
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

    <title>Perfil || Estudiante</title>
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

      <a class="navbar-brand mr-1 logo" href="index.php"><img src="../images/logo.png" width="150" height="auto" alt=""/></a>
      

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>
	  
       
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
            <span class="badge badge-danger">9+</span>
          </a>
			<!--
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
           -->
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <span class="badge badge-danger">7</span>
          </a>
			<!--
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
          -->
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
				echo "<img src='../phpregistro/bdimagen/$ft' width='auto' height='32' class='rounded-circle'>";
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

      <!-- Sidebar -->
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
		
        <!--<li class="nav-item">
          <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Avance</span>
          </a>
        </li>-->
      </ul>

      <div id="content-wrapper">
		  <div class="container-fluid text-center">
			  <h2 class="btn-info btn-block btn-lg" style="font-size: 25px;"><i class="fas fa-chalkboard-teacher" style="color: #1B1E49;"></i> Curso: "<?php echo($ncurso); ?>" Unidad: <?php echo($unidad); ?></h2>
		  </div>

          <div class="bg-white">
			
			<?php
				
				$consultvid="SELECT Nombre From archivo where IdCurso='$idcurso' AND Tipo='video'";
				$vid=mysqli_query($conexion, $consultvid);
			?>
		   
			  <div class="text-center">
				  <h3>Leccion: <?php echo($nleccion); ?></h3>
				  <?php 
				  if($tipo=='video'){
					  echo("<video class='img-fluid' width='720' height='auto' controls>
						<source src='../profesor/uploadvideo/uploads/$narchivo' type=video/mp4>
				  		</video>");					  
				  }elseif($tipo=='documento'){
					  echo("<iframe class='embed-responsive w-75 mx-auto' height='500' src='../profesor/uploaddoc/uploads/$narchivo'></iframe>");
				  }
				  elseif($tipo=='audio'){
					  echo("<audio controls>
					  <source src='../profesor/uploadaudio/uploads/$narchivo' type='audio/mp3'>
				  		</audio>");
				  }else{
					  echo("<p>:( No hay mas contenido en el curso</p><p>Si ya haz visto todas las lecciones realiza las actividades y no la evaluación</p>");
				  }
				  ?>
				   
			  </div>
			    
			 </div>
			
		
		<div class="container-fluid text-center">
			<h2 class="btn-info btn-block btn-lg" style="font-size: 25px;"><i class="fas fa-play-circle" style="color: #1B1E49;"></i>  Contenido</h2>
		</div>
		  <br>
		<div class="container row text-center">
			  <table class="mx-auto text-center">
				  <thead>
					  <tr>
						  <th class="btn btn-success w-100">
							  <i class='fas fa-video'> </i>
							  Videos								  
						  </th>

					  </tr>
				  </thead>
				  <tbody>
					  <tr>
						  <?php 
						  $consultvid="SELECT Nombre From archivo where IdCurso='$idcurso' AND Tipo='video'";
						  $vid=mysqli_query($conexion, $consultvid);
						  $leccion=0;
						  while ($arrayvid=mysqli_fetch_array($vid)){
							  $leccion++;								 
							  echo("<tr>");
							  echo("<th>");
							  echo("<form action='content.php' method='post'>");
							  echo("<input type='hidden' name='idcurso' value='$idcurso'><input type='hidden' name='nomarch' value='");
							  echo($arrayvid['Nombre']);
							  echo("'><input type='hidden' name='ncurso' value='$ncurso'>");
							  echo("<input type='hidden' name='nleccion' value='$leccion'>");
							  echo("<input type='hidden' name='unidad' value='$unidad'>");
							  echo("<input type='hidden' name='tipo' value='video'>");
							  echo("<button type='submit' class='btn btn-outline-success'>");
							  echo("<i class='fas fa-video'> </i>");
							  echo("  Lección: ");
							  echo($leccion);
							  echo("</button></form>");
							  echo("</th>");
							  echo("</tr>");

						  }
						  ?>
						 
					 </tr>
				  </tbody>
				</table>
			  <table class="mx-auto">
				  <thead>
					  <tr>
						  <th class="btn-danger btn w-100">
							  <i class='fas fa-volume-up'></i>
							  Audios								  
						  </th>

					  </tr>
				  </thead>
				  <tbody>
					  <tr>
						 <?php 
						  $consultvid="SELECT Nombre From archivo where IdCurso='$idcurso' AND Tipo='audio'";
						  $vid=mysqli_query($conexion, $consultvid);
						  $leccion=0;
						  while ($arrayvid=mysqli_fetch_array($vid)){
							  $leccion++;								 
							  echo("<tr>");
							  echo("<th>");
							  echo("<form action='content.php' method='post'>");
							  echo("<input type='hidden' name='idcurso' value='$idcurso'><input type='hidden' name='nomarch' value='");
							  echo($arrayvid['Nombre']);
							  echo("'><input type='hidden' name='ncurso' value='$ncurso'>");
							  echo("<input type='hidden' name='nleccion' value='$leccion'>");
							  echo("<input type='hidden' name='unidad' value='$unidad'>");
							  echo("<input type='hidden' name='tipo' value='audio'>");
							  echo("<button type='submit' class='btn btn-outline-danger'>");
							  echo("<i class='fas fa-volume-up'> </i>");
							  echo("  Lección: ");
							  echo($leccion);
							  echo("</button></form>");
							  echo("</th>");
							  echo("</tr>");

						  }
						  ?>
					 </tr>
				  </tbody>
				</table>	
			  <table class="mx-auto">
				  <thead >
					  <tr>
						  <th class="btn btn-primary">
							  <i class='fas fa-file-word'></i>
							  Documentos								  
						  </th>

					  </tr>
				  </thead>
				  <tbody>
					  <tr>
						  <?php 
						  $consultvid="SELECT Nombre From archivo where IdCurso='$idcurso' AND Tipo='documento'";
						  $vid=mysqli_query($conexion, $consultvid);
						  $leccion=0;
						  while ($arrayvid=mysqli_fetch_array($vid)){
							  $leccion++;								 
							  echo("<tr>");
							  echo("<th>");
							  echo("<form action='content.php' method='post'>");
							  echo("<input type='hidden' name='idcurso' value='$idcurso'><input type='hidden' name='nomarch' value='");
							  echo($arrayvid['Nombre']);
							  echo("'><input type='hidden' name='ncurso' value='$ncurso'>");
							  echo("<input type='hidden' name='nleccion' value='$leccion'>");
							  echo("<input type='hidden' name='unidad' value='$unidad'>");
							  echo("<input type='hidden' name='tipo' value='documento'>");
							  echo("<button type='submit' class='btn btn-outline-primary w-100'>");
							  echo("<i class='fas fa-file-word'> </i>");
							  echo("  Lección: ");
							  echo($leccion);
							  echo("</button></form>");
							  echo("</th>");
							  echo("</tr>");

						  }
						  ?>
					 </tr>
				  </tbody>
				</table>	
		  </div>  
		  <br>
        <div class="container-fluid text-center">
			<h2  class="btn-info btn-block btn-lg" style="font-size: 25px;"><i class="fas fa-edit" style="color: #1B1E49;"></i>Actividades</h2>
		</div>
		  <br>
		<div class="form-group container row text-center">
            <div class="col-xl-4 col-sm-8 mx-auto" style="margin-bottom: 10px;">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-book-reader"></i>
                  </div>
                  <h4>Lectura</h4>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#" data-toggle="modal" data-target="#Lectura">
                  <h6 class="float-left">Ir a actividad</h6>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-4 col-sm-8 mx-auto" style="margin-bottom: 10px;">
              <div class="card text-white bg-dark o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-question-circle"></i>
                  </div>
                  <h4>Cuestionario</h4>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#" data-toggle="modal" data-target="#Cuestionario">
                  <h6 class="float-left">Ir a actividad</h6>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
			
            
				<div class="col-xl-4 col-sm-8 mx-auto" style="margin-bottom: 10px;">
					<form action="examen.php" method="post">
				
				<input type='hidden' name='idcurso' value='<?php echo($idcurso);?>'>
				<input type='hidden' name='ncurso' value='<?php echo($ncurso);?>'>
				<input type="hidden" name="unidad" value='<?php echo($unidad);?>'>
					<div class="card text-white bg-danger o-hidden h-100">
						<div class="card-body">
							<div class="card-body-icon">
								<i class="fas fa-fw fa-pencil-ruler"></i>
							</div>
							<h4>Evaluación</h4>
						</div>
						<button class=" btn card-footer text-white clearfix small z-1" type="submit">
							<h6 class="float-left">Resolver evaluación</h6>
							<span class="float-right">
								<i class="fas fa-angle-right"></i>
							</span>
                		</button>
                    </div>
						</form>
                </div>
			
          </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
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
	<!-- Lectura Modal-->
	<div class="modal fade bd-example-modal-lg" id="Lectura" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Lectura</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
			  <div class="row">
			  
					  <div class="col-lg-6 mb-6 mt-6 bg-light text-justify">
						  
							  <h5 class="text-center"><?php echo($ncurso); ?></h5>
							  <p class="text-justify">

								<?php
								$lecturaleng="SELECT TextLngInd from lectura where IdCurso='$idcurso' AND Unidad='$unidad'";
								
								$lecturalengcon=mysqli_query($conexion, $lecturaleng);
								if($reslec=mysqli_fetch_row($lecturalengcon)){
									$rslec1=trim($reslec[0]);	
								}
								echo(utf8_encode ($rslec1));
								?>
							  </p>
					  	 
					  </div>
					  <div class="col-lg-6 mb-6 mt-6 bg-light text-justify">
					 
						  <h5 class="text-center">Español</h5>
						  <p class="text-justify">
							<?php
							$lecturaleng="SELECT TextEsp from lectura where IdCurso='$idcurso' AND Unidad='$unidad'";
							$lecturalengcon=mysqli_query($conexion, $lecturaleng);
							if($reslec=mysqli_fetch_row($lecturalengcon)){
								$rslec2=trim($reslec[0]);	
							}
							echo(utf8_encode ($rslec2));
							?>
					      </p>						  
					  
					  </div>
					  
				 
		  </div>
          <div class="modal-footer">            
			  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
          </div>
			</div>
        </div>
      </div>
    </div>
	<div class="modal fade bd-example-modal-lg" id="Cuestionario" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cuestionario</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
			 <div class="container-fluid">
				 <form action="contentvid.php" method="post" >					 
					 <input type='hidden' name='idcurso' value='<?php echo($idcurso);?>'>
					 <input type='hidden' name='ncurso' value='<?php echo($ncurso);?>'>
					 <input type="hidden" name="unidad" value='<?php echo($unidad);?>'>
					 
				 	
				 <?php 
				 $pregunta="SELECT Nombre, Pregunta1, Pregunta2, Pregunta3, Pregunta4, Pregunta5, Pregunta6, Pregunta7, Pregunta8 FROM cuestionario WHERE IdCurso='$idcurso' AND Unidad='$unidad'";
				 $consulpreg=mysqli_query($conexion, $pregunta);
				 if($arraypreg=mysqli_fetch_array($consulpreg)){
					 $npreg=1;
					 echo("<h5 class='text-center'><b>");
					 echo($arraypreg['Nombre']);
					 echo("</h5></b>");
					 while($npreg<=8){
						 $pregunta="Pregunta".$npreg;
						 echo("<div class='form-group'>
						 <label class='form-check-label'>");
						 echo(utf8_encode( $arraypreg[$pregunta]));
						 echo("</label>
							 <input class='form-control' type='text' name='Respuesta$npreg' placeholder='Respuesta' required>
						 </div>");
						 $npreg++;
					 }
				 }
				 ?>
					 <input type="submit" class="btn btn-primary" value="Enviar Respuestas">
				</form>
			  </div>
          <div class="modal-footer">            
			  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
          </div>
			</div>
        </div>
      </div>
    </div>
	  
	    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
	
  </body>

</html>
