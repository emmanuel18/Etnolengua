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
			   <div class="alert alert-success"><i class="fas fa-info-circle"></i> Explica la lección a traves de un video, documento o una galería de imágenes</div>  
		</div>
		
		<div class="row container justify-content-center">	
			
			<p>&nbsp; &nbsp; &nbsp;</p>
		
			
				<button class="dropdown-item radius bg-primary" href="#" data-toggle="modal" data-target="#video" style="width: 14rem;"
						<?php 
						$validvid="SELECT IdFile FROM archivo where IdCurso='$idcurso' AND Unidad='$unidad' AND Tipo='video' OR Tipo='documento' AND Unidad='$unidad'";
						$validarvid=mysqli_query($conexion, $validvid);
						$validgal="SELECT IdGaleria FROM galeria where IdCurso='$idcurso' AND NumLec='$unidad'";
						$validargal=mysqli_query($conexion, $validgal);
						
						
						if($v6=mysqli_fetch_row($validarvid)){
								echo("disabled");
								$check6=1;							
						}
						elseif($v8=mysqli_fetch_row($validargal)){
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
			
			<p>&nbsp; &nbsp; &nbsp;</p>
			
				<button class="dropdown-item radius bg-warning" href="#" data-toggle="modal" data-target="#documento" style="width: 14rem;"
						<?php 
							
						if($check6==1){
							echo("disabled");							
						}
						
						?>
						> 
					<div class="card-body">
						<h5 class="card-title text-center text-light">Documentos
						<?php
						error_reporting(0);
						if($check6==1){
							echo("Carg...");
						}
						?>
						</h5>
						<p class="card-img fa fa-6x text-center text-light
								  <?php
								error_reporting(0);
								if($check6==1){
									echo("fa-check-circle");
								}else{
									echo("fa-file-word");
								}
							 ?>
								  "></p>
					</div> 
				</button>
			
			<p>&nbsp; &nbsp; &nbsp;</p>
			
				<button class="dropdown-item radius bg-info" href="#galeria" data-toggle="modal" data-target="#" style="width: 14rem;"
						<?php 
							
						    
							if($check6==1){
								echo("disabled");						
							}					
						?>
						> 
					<div class="card-body">
						
						<h5 class="card-title text-center text-light">Galeria
						<?php
						error_reporting(0);
						if($check6==1){
							echo("Carg...");
						}
						?>
						</h5>
						<p class="card-img fa fa-6x text-center text-light
								  <?php
								error_reporting(0);
								if($check6==1){
									echo("fa-check-circle");
								}else{
									echo("fa-camera-retro");
								}
							 ?>
								  "></p>
					</div> 
				</button>
			  
			
		 </div><div class="dropdown-divider"></div>
			<?php
			if ($check6==1){
				echo("<div class='d-flex justify-content-center'>
				<form action='act1.php' method='post'>
					<input type='hidden' name='idcurso' value=$idcurso>
					<input type='hidden' name='unidad' value=$unidad> 
					<button type='submit' class='btn btn-success btn-lg'>Crear Actividad</button>
				</form>
			</div>");
			}
			
			?>
			
		  
			
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
	  
	  <!-- Video -->
	  <div class="modal fade bd-example-modal-lg" id="video" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
			  <div class="modal-content">
				  <div class="modal-header">
					  <h5 class="modal-title" id="exampleModalCenterTitle">Cargar vídeo</h5>
					  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
					  </button>
				  </div>
				  <div class="modal-body">
					  <div class="alert alert-success"><i class="fas fa-info-circle"></i> Sube un vídeo ilustrativo sobre la lección que no exceda los 500 MB.</div>  
					  <form action="act.php" method="post" enctype="multipart/form-data">
						  <div class="form-group alert alert-info">							
							  <label for="video"><i class="fas fa-video"></i> Elige el archivo del vídeo</label>
							  <input class="form-control-file text-center btn btn-info" type="file" name="archivo" id="video" accept="video/*" required>		
						  </div>
						  <input type="hidden" name="idcurso" value="<?php echo($idcurso); ?>">
						  <input type="hidden" value="<?php echo($unidad); ?>" name="unidad">
						  <input type="hidden" value="video" name="tipo">
						  <div class="mx-auto text-center">
							  <button type="submit" class="btn btn-primary"><i class="fas fa-upload"></i> Subir</button>
							  <button class="btn btn-danger" data-dismiss="modal"> Cancelar</button>						  
						  </div>
						  
					  </form>
				  </div>   
					  
				  <div class="modal-footer">
				  </div>
    
			  </div>
  
		  </div>

	  </div>
	  
	  <!-- Documento -->
	  <div class="modal fade bd-example-modal-lg" id="documento" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
			  <div class="modal-content">
				  <div class="modal-header">
					  <h5 class="modal-title" id="exampleModalCenterTitle">Cargar documento</h5>
					  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
					  </button>
				  </div>
				  <div class="modal-body">
					  <div class="alert alert-success"><i class="fas fa-file"></i> Sube un documento ilustrativo sobre la lección que no exceda los 500 MB.</div>  
					  <form action="act.php" method="post" enctype="multipart/form-data">
						  <div class="form-group alert alert-info">							
							  <label for="video"><i class="fas fa-video"></i> Elige el archivo</label>
							  <input class="form-control-file text-center btn btn-info" type="file" name="archivo" id="video" accept=".pdf, .doc" required>		
						  </div>
						  <input type="hidden" name="idcurso" value="<?php echo($idcurso); ?>">
						  <input type="hidden" value="<?php echo($unidad); ?>" name="unidad">
						  <input type="hidden" value="documento" name="tipo">
						  <div class="mx-auto text-center">
							  <button type="submit" class="btn btn-primary"><i class="fas fa-upload"></i> Subir</button>
							  <button class="btn btn-danger" data-dismiss="modal"> Cancelar</button>						  
						  </div>
						  
					  </form>
				  </div>   
					  
				  <div class="modal-footer">
				  </div>
    
			  </div>
  
		  </div>

	  </div>
	  
	<!-- Galeria -->
	<div class="modal fade" id="galeria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
	 <div class="modal-dialog" role="document">
		 <div class="modal-content">
			 <div class="modal-header">
			 <h5 class="modal-title" id="exampleModalLabel">Crear galería</h5>
				 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
				 <span aria-hidden="true">X</span> 
				 </button>
			 </div> 
			<div class="modal-body"> 
				<form action="Galeria.php" method="post" >
					<div class="alert alert-success"><i class="fas fa-info-circle"></i>Una gelería es un conjunto de imágenes explicativas sobre el tema, debe contener una imágen, además puedes agregar traducciones de la lengua indígena al español y complementarlas con audios.</div>
	  		
					<div class="form-group">
						<center><label for="exampleInputQuestion" class="font-weight-bold">Número de imágenes</label></center>
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
$dir_upload='files/';
$file_upload=$dir_upload.basename($_FILES['archivo']['name']);
$tipo=$_POST['tipo'];
if(move_uploaded_file($_FILES['archivo']['tmp_name'],$file_upload)){
	$Qr="insert into archivo(IdCurso, Nombre, Tipo, Unidad) VALUES('$idcurso', '$file_upload', '$tipo', '$unidad')";
	$ct=mysqli_query($conexion, $Qr);
	echo '<script languaje="javascript">alert("Archivo cargado exitosamente... continua creando una actividades.");
			window.location.href="Cursos.php";
		</script>';
}

?>