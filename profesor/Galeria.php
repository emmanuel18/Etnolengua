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
$introd=$_POST['introd'];
$numpreg=$_POST['num'];
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
            
            <a class="dropdown-item" href="#">No hay notificaciones</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <span class="badge badge-danger"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
            <a class="dropdown-item" href="#">Bandeja vacía</a>
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
			  <h2 class="breadcrumb justify-content-center text-dark">Galería de la lección <?php echo($unidad); ?>
			  </h2> 			  
		</div>
		 
		<?php $introd=$_POST['introd']; ?>
			
        </div>
		  <div class="container">
		   <div class="row">
			<div class="col-12 col-md-8 mx-auto">
			<div class="form-group jumbotron bg-light">				
				<center><h2 class="font-weight-bold">Imagen <?php echo($introd); ?></h2></center>				
				<form action="Galeria.php" method="post" enctype="multipart/form-data">
					
					<div class="form-group alert alert-info">							
						<label for="foto"><i class="text-danger h2">*</i> <i class="fas fa-image"></i> Elige una imagen (campo obligatorio)</label>							
						<input class="form-control-file text-center btn btn-info" type="file" name="foto" id="foto" accept="image/*" required>						
					</div>
					<div class="form-group">						
						<input type="text" class="form-control" name="ind" placeholder="Traducción en lengua indígena" required>						
					</div>
					<div class="form-group">						
						<input type="text" class="form-control" name="esp" placeholder="Traducción en Español" required>						
					</div>
					<div class="form-group alert alert-success">							
						<label for="audio"><i class="fas fa-file-audio"></i> Elige un audio</label>							
						<input class="form-control-file text-center btn btn-success" type="file" name="audio" id="audio" accept="audio/*">						
					</div>
					<input type="hidden" name="idcurso" value="<?php echo($idcurso); ?>">
					<input type="hidden" value="<?php echo($unidad); ?>" name="unidad">	
					<input type="hidden" value="<?php echo($numpreg); ?>" name="num">
					<input type="hidden" value="<?php echo($introd+1); ?>" name="introd">
					<div class="form-group text-center">
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
<?php
error_reporting(0);
$dir_upload='files/';

$file_upload=$dir_upload.basename($_FILES['foto']['name']);
$ind=$_POST['ind'];
$ind=addslashes($ind);
echo $ind;
$esp=$_POST['esp'];
$file2_upload=$dir_upload.basename($_FILES['audio']['name']);
//move_uploaded_file($_FILES['foto']['tmp_name'],$file_upload);
//move_uploaded_file($_FILES['audio']['tmp_name'],$file2_upload);
if($introd<=$numpreg){
	if(move_uploaded_file($_FILES['foto']['tmp_name'],$file_upload))
{
	if(move_uploaded_file($_FILES['audio']['tmp_name'],$file2_upload)){
		$Qr1="insert into galeria(IdCurso, NumLec, Img, Ind, Esp, Sonido) VALUES($idcurso, $unidad, '$file_upload', '$ind', '$esp', '$file2_upload')";
		$ct=mysqli_character_set_name(mysqli_query($conexion, $Qr1));
		
		echo $Qr1;
		if(!$ct){
			
		}
		
	}
	else{
		
		$Qr2="insert into galeria(IdCurso, NumLec, Img, Ind, Esp) VALUES('$idcurso', '$unidad', '$file_upload', '$ind', '$esp')";
		$ct2=mysqli_query($conexion, $Qr2);
	}
}
}
else{
	if(move_uploaded_file($_FILES['foto']['tmp_name'],$file_upload))
{
	if(move_uploaded_file($_FILES['audio']['tmp_name'],$file2_upload)){
		$Qr1="insert into galeria(IdCurso, NumLec, Img, Ind, Esp, Sonido) VALUES('$idcurso', '$unidad', '$file_upload', '$ind', '$esp','$file2_upload')";
		$ct=mysqli_query($conexion, $Qr1);
	}
	else{
		
		$Qr2="insert into galeria(IdCurso, NumLec, Img, Ind, Esp) VALUES('$idcurso', '$unidad', '$file_upload', '$ind', '$esp')";
		$ct2=mysqli_query($conexion, $Qr2);
	}
}
	echo '<script languaje="javascript">alert("Galeria creada exitosamente, continúa...");
				window.location.href="Cursos.php";
			</script>';
}
?>