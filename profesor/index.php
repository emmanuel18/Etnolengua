<?php
session_start();
$id=$_SESSION['id'];
$cr=$_SESSION['Correo'];
$ps=$_SESSION['Password'];
$Query="SELECT Nombre FROM userprofe WHERE Correo='$cr'";
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
          <input type="text" class="form-control" placeholder="Buscar Herramientas" aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <span class="badge badge-danger">9+</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <span class="badge badge-danger">7</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
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
          <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-book-open"></i>
            <span>Mis Cursos</span>
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

          <!-- Breadcrumbs-->
        

          <!-- Page Content -->
          <h1>Herramientas del Profesor</h1>
          <hr>
          <h5 class="text-center text-dark">Comienza creando un curso</h5>
			<div class="container">
			<div class="col-12 col-md-8 mx-auto">
				
			<div class="text-center">
			<form action="" method="post" >
				
				<div class="form-group">
					<label class="input-group-text">Introduce el nombre del curso </label>
					<input class="form-control" type="text" name="Curso" placeholder="" required>						
				</div>
					
				<div class="dropdown-divider"></div>
					
				<div class="form-group">
					<label class="input-group-text">Agrega una descripción</label>
					<textarea class="form-control" name="Descripcion"></textarea>
				</div> 
				<div class="dropdown-divider"></div>
				
				<div class="form-group">
					<label class="input-group-text"> Elige una lengua indígena </label>
					<select class="form-control" id="exampleFormControlSelect1">
      					<option>Mixe</option>
      					<option>Nahuatl</option>
      					<option>Maya</option>
      					<option>Azteca</option>
    				  	<option>Totonaca</option>
						<option>Olmeca</option>
						<option>Zapoteco</option>
						<option>Mixteco</option>
    				</select>
				</div>
				
				<div class="dropdown-divider"></div>
				<label class="input-group-text"> Agrega Archivos de Audio y Video </label>
				<div class="form-group">
					
					<div class="input-group mb-3">
  						<div class="input-group-prepend">
    						<span class="input-group-text" id="inputGroupFileAddon01">Cargar Archivo1</span>
  						</div>
  						<div class="custom-file">
    						<input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" >
    						<label class="custom-file-label" for="validatedCustomFile">Elige Archivo de Audio/Video</label>
  						</div>
					</div>
					
					<div class="input-group mb-3">
  						<div class="input-group-prepend">
    						<span class="input-group-text" id="inputGroupFileAddon01">Cargar Archivo2</span>
  						</div>
  						<div class="custom-file">
    						<input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" >
    						<label class="custom-file-label" for="validatedCustomFile">Elige Archivo de Audio/Video</label>
  						</div>
					</div>
					
					<div class="input-group mb-3">
  						<div class="input-group-prepend">
    						<span class="input-group-text" id="inputGroupFileAddon01">Cargar Archivo3</span>
  						</div>
  						<div class="custom-file">
    						<input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" >
    						<label class="custom-file-label" for="validatedCustomFile">Elige Archivo de Audio/Video</label>
  						</div>
					</div>
					
					<div class="input-group mb-3">
  						<div class="input-group-prepend">
    						<span class="input-group-text" id="inputGroupFileAddon01">Cargar Archivo4</span>
  						</div>
  						<div class="custom-file">
    						<input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" >
    						<label class="custom-file-label" for="validatedCustomFile">Elige Archivo de Audio/Video</label>
  						</div>
					</div>
				
				</div>	
					
				 
				<div class="dropdown-divider"></div>
				<label class="input-group-text" for="file">Agrega Documentación</label>
				<div class="form-group">
					<div class="input-group mb-3">
  						<div class="custom-file">
    						<input type="file" class="custom-file-input" id="inputGroupFile02">
    						<label class="custom-file-label" for="inputGroupFile02 validatedCustomFile" aria-describedby="inputGroupFileAddon02">Elige un Documento/PDF</label>
  						</div>
  						<div class="input-group-append">
    						<span class="input-group-text" id="inputGroupFileAddon02">Cargar Archivo1</span>
  						</div>
					</div>
					<div class="input-group mb-3">
  						<div class="custom-file">
    						<input type="file" class="custom-file-input" id="inputGroupFile02">
    						<label class="custom-file-label" for="inputGroupFile02 validatedCustomFile" aria-describedby="inputGroupFileAddon02">Elige un Documento/PDF</label>
  						</div>
  						<div class="input-group-append">
    						<span class="input-group-text" id="inputGroupFileAddon02">Cargar Archivo2</span>
  						</div>
					</div>
					<div class="input-group mb-3">
  						<div class="custom-file">
    						<input type="file" class="custom-file-input" id="inputGroupFile02">
    						<label class="custom-file-label" for="inputGroupFile02 validatedCustomFile" aria-describedby="inputGroupFileAddon02">Elige un Documento/PDF</label>
  						</div>
  						<div class="input-group-append">
    						<span class="input-group-text" id="inputGroupFileAddon02">Cargar Archivo3</span>
  						</div>
					</div>
					<div class="input-group mb-3">
  						<div class="custom-file">
    						<input type="file" class="custom-file-input" id="inputGroupFile02">
    						<label class="custom-file-label" for="inputGroupFile02 validatedCustomFile" aria-describedby="inputGroupFileAddon02">Elige un Documento/PDF</label>
  						</div>
  						<div class="input-group-append">
    						<span class="input-group-text" id="inputGroupFileAddon02">Cargar Archivo4</span>
  						</div>
					</div>
				</div> 
				
				<div class="dropdown-divider"></div>
				
				<div class="form-group">
				<label class="input-group-text">Crea una Actividad de Aprendizaje</label><br>
					<div class="row justify-content-lg-center table-hover">
					
						<div class="col-lg-auto">
							<a class="dropdown-item" href="#" data-toggle="modal" data-target="#quest"> 
							<i class="fa fa-address-book fa-7x text-dark"></i> 
							<h4>Cuestionario</h4>							
							</a> 
						</div>
						
						<div class="col-lg-auto">
							<a class="dropdown-item" href="#" data-toggle="modal" data-target="#reading">
							<i class="fa fa-book-reader fa-7x text-primary"></i>
							<h4>Lectura</h4>
							</a>
						</div>
					
						<div class="col-lg-auto">
							<a class="dropdown-item" href="#" data-toggle="modal" data-target="#test">
							<i class="fa fa-book fa-7x text-danger"></i>
							<h4>Evaluación</h4>							
							</a> 
						</div>
						
						<div class="col-lg-auto">
							<a class="dropdown-item" href="#" data-toggle="modal" data-target="#">
							<i class="fa fa-gamepad fa-7x text-success"></i>	
							<h4>Juego(beta)</h4>
							</a> 
						</div>
					</div>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-success btn-lg" value="Enviar">
				</div>
			</form>
			</div>
			</div>
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
	  
	<div class="modal fade" id="quest" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
	 <div class="modal-dialog" role="document">
		 <div class="modal-content">
			 <div class="modal-header">
			 <h5 class="modal-title" id="exampleModalLabel">Crea tu propio cuestionario</h5>
				 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
				 <span aria-hidden="true">X</span> 
				 </button>
			 </div> 
		<div class="modal-body"> 
		<form action="" method="post" id="cuestionario">
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
			<div class="modal-footer">
            	<button class="btn btn-primary" type="button" data-dismiss="modal">Enviar</button>
            	
          </div>
	  	</form>
		 </div>
		</div>
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
		<form action="" method="post" id="cuestionario">
	  		<div class="form-group">
				<center>
				<label for="exampleInputTittle"><b>Inserta Texto en Lengua Indígena</b></label></center>
				<textarea class="form-control" type="text" name="txtind" placeholder="Lengua Indígena" rows="5"></textarea>
				
			</div>
			<div class="form-group">
				<center>
				<label for="exampleInputTittle"><b>Inserta Texto en Español</b></label></center>
				<textarea class="form-control" type="text" name="esp" placeholder="Español" rows="5"></textarea>
				
			</div>
			
			
			<div class="modal-footer">
            	<button class="btn btn-primary" type="button" data-dismiss="modal">Enviar</button>
            	
          </div>
	  	</form>
		</div>
		</div>
		</div>
	  </div>
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
				<form action="" method="post" id="cuestionario">
	  		
					<div class="form-group">
						<center><label for="exampleInputQuestion" class="font-weight-bold">Pregunta 1</label></center>
						<input class="form-control" type="text" name="Pregunta1" placeholder="Escribe la primer pregunta" required>
						<label for="exampleInputAnswer">Respuestas</label>
						<div class="form-row">
    						<div class="col">
      							<input type="text" class="form-control" placeholder="Respuesta 1">
    						</div>
    						<div class="col">
      							<input type="text" class="form-control" placeholder="Respuesta 2">
    						</div>
  						</div>
						<br>
						<div class="form-row">
    						<div class="col">
      							<input type="text" class="form-control" placeholder="Respuesta 3">
    						</div>
    						<div class="col">
      							<input type="text" class="form-control" placeholder="Respuesta Correcta">
    						</div>
  						</div>
					</div>
					<div class="form-group">
						<center><label for="exampleInputQuestion" class="font-weight-bold">Pregunta 2</label></center>
						<input class="form-control" type="text" name="Pregunta1" placeholder="Escribe la primer pregunta" required>
						<label for="exampleInputAnswer">Respuestas</label>
						<div class="form-row">
    						<div class="col">
      							<input type="text" class="form-control" placeholder="Respuesta 1">
    						</div>
    						<div class="col">
      							<input type="text" class="form-control" placeholder="Respuesta 2">
    						</div>
  						</div>
						<br>
						<div class="form-row">
    						<div class="col">
      							<input type="text" class="form-control" placeholder="Respuesta 3">
    						</div>
    						<div class="col">
      							<input type="text" class="form-control" placeholder="Respuesta Correcta">
    						</div>
  						</div>
					</div>
					<div class="form-group">
						<center><label for="exampleInputQuestion" class="font-weight-bold">Pregunta 3</label></center>
						<input class="form-control" type="text" name="Pregunta1" placeholder="Escribe la primer pregunta" required>
						<label for="exampleInputAnswer">Respuestas</label>
						<div class="form-row">
    						<div class="col">
      							<input type="text" class="form-control" placeholder="Respuesta 1">
    						</div>
    						<div class="col">
      							<input type="text" class="form-control" placeholder="Respuesta 2">
    						</div>
  						</div>
						<br>
						<div class="form-row">
    						<div class="col">
      							<input type="text" class="form-control" placeholder="Respuesta 3">
    						</div>
    						<div class="col">
      							<input type="text" class="form-control" placeholder="Respuesta Correcta">
    						</div>
  						</div>
					</div>
					<div class="form-group">
						<center><label for="exampleInputQuestion" class="font-weight-bold">Pregunta 4</label></center>
						<input class="form-control" type="text" name="Pregunta1" placeholder="Escribe la primer pregunta" required>
						<label for="exampleInputAnswer">Respuestas</label>
						<div class="form-row">
    						<div class="col">
      							<input type="text" class="form-control" placeholder="Respuesta 1">
    						</div>
    						<div class="col">
      							<input type="text" class="form-control" placeholder="Respuesta 2">
    						</div>
  						</div>
						<br>
						<div class="form-row">
    						<div class="col">
      							<input type="text" class="form-control" placeholder="Respuesta 3">
    						</div>
    						<div class="col">
      							<input type="text" class="form-control" placeholder="Respuesta Correcta">
    						</div>
  						</div>
					</div>
					<div class="form-group">
						<center><label for="exampleInputQuestion" class="font-weight-bold">Pregunta 5</label></center>
						<input class="form-control" type="text" name="Pregunta1" placeholder="Escribe la primer pregunta" required>
						<label for="exampleInputAnswer">Respuestas</label>
						<div class="form-row">
    						<div class="col">
      							<input type="text" class="form-control" placeholder="Respuesta 1">
    						</div>
    						<div class="col">
      							<input type="text" class="form-control" placeholder="Respuesta 2">
    						</div>
  						</div>
						<br>
						<div class="form-row">
    						<div class="col">
      							<input type="text" class="form-control" placeholder="Respuesta 3">
    						</div>
    						<div class="col">
      							<input type="text" class="form-control" placeholder="Respuesta Correcta">
    						</div>
  						</div>
					</div>
					<div class="form-group">
						<center><label for="exampleInputQuestion" class="font-weight-bold">Pregunta 6</label></center>
						<input class="form-control" type="text" name="Pregunta1" placeholder="Escribe la primer pregunta" required>
						<label for="exampleInputAnswer">Respuestas</label>
						<div class="form-row">
    						<div class="col">
      							<input type="text" class="form-control" placeholder="Respuesta 1">
    						</div>
    						<div class="col">
      							<input type="text" class="form-control" placeholder="Respuesta 2">
    						</div>
  						</div>
						<br>
						<div class="form-row">
    						<div class="col">
      							<input type="text" class="form-control" placeholder="Respuesta 3">
    						</div>
    						<div class="col">
      							<input type="text" class="form-control" placeholder="Respuesta Correcta">
    						</div>
  						</div>
					</div>
					<div class="form-group">
						<center><label for="exampleInputQuestion" class="font-weight-bold">Pregunta 7</label></center>
						<input class="form-control" type="text" name="Pregunta1" placeholder="Escribe la primer pregunta" required>
						<label for="exampleInputAnswer">Respuestas</label>
						<div class="form-row">
    						<div class="col">
      							<input type="text" class="form-control" placeholder="Respuesta 1">
    						</div>
    						<div class="col">
      							<input type="text" class="form-control" placeholder="Respuesta 2">
    						</div>
  						</div>
						<br>
						<div class="form-row">
    						<div class="col">
      							<input type="text" class="form-control" placeholder="Respuesta 3">
    						</div>
    						<div class="col">
      							<input type="text" class="form-control" placeholder="Respuesta Correcta">
    						</div>
  						</div>
					</div>
					<div class="form-group">
						<center><label for="exampleInputQuestion" class="font-weight-bold">Pregunta 8</label></center>
						<input class="form-control" type="text" name="Pregunta1" placeholder="Escribe la primer pregunta" required>
						<label for="exampleInputAnswer">Respuestas</label>
						<div class="form-row">
    						<div class="col">
      							<input type="text" class="form-control" placeholder="Respuesta 1">
    						</div>
    						<div class="col">
      							<input type="text" class="form-control" placeholder="Respuesta 2">
    						</div>
  						</div>
						<br>
						<div class="form-row">
    						<div class="col">
      							<input type="text" class="form-control" placeholder="Respuesta 3">
    						</div>
    						<div class="col">
      							<input type="text" class="form-control" placeholder="Respuesta Correcta">
    						</div>
  						</div>
					</div>
					<div class="form-group">
						<center><label for="exampleInputQuestion" class="font-weight-bold">Pregunta 9</label></center>
						<input class="form-control" type="text" name="Pregunta1" placeholder="Escribe la primer pregunta" required>
						<label for="exampleInputAnswer">Respuestas</label>
						<div class="form-row">
    						<div class="col">
      							<input type="text" class="form-control" placeholder="Respuesta 1">
    						</div>
    						<div class="col">
      							<input type="text" class="form-control" placeholder="Respuesta 2">
    						</div>
  						</div>
						<br>
						<div class="form-row">
    						<div class="col">
      							<input type="text" class="form-control" placeholder="Respuesta 3">
    						</div>
    						<div class="col">
      							<input type="text" class="form-control" placeholder="Respuesta Correcta">
    						</div>
  						</div>
					</div>
					<div class="form-group">
						<center><label for="exampleInputQuestion" class="font-weight-bold">Pregunta 10</label></center>
						<input class="form-control" type="text" name="Pregunta1" placeholder="Escribe la primer pregunta" required>
						<label for="exampleInputAnswer">Respuestas</label>
						<div class="form-row">
    						<div class="col">
      							<input type="text" class="form-control" placeholder="Respuesta 1">
    						</div>
    						<div class="col">
      							<input type="text" class="form-control" placeholder="Respuesta 2">
    						</div>
  						</div>
						<br>
						<div class="form-row">
    						<div class="col">
      							<input type="text" class="form-control" placeholder="Respuesta 3">
    						</div>
    						<div class="col">
      							<input type="text" class="form-control" placeholder="Respuesta Correcta">
    						</div>
  						</div>
					</div>
			
			<div class="modal-footer">
            	<button class="btn btn-primary" type="button" data-dismiss="modal">Enviar</button>
            	
          </div>
	  	</form>
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
