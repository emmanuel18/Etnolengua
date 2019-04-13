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


$ncurso=$_POST['nombre'];
$idcurso=$_POST['idcurso'];
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
          <a class="nav-link " href="index.php"  role="button"  >
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

      <div id="content-wrapper" class="bg-light">

        <div class="container-fluid align-content-center">

          <div class="container-fluid text-center">
			  <h2 class="btn-info btn-block btn-lg" style="font-size: 25px;"><i class="fas fa-chalkboard-teacher" style="color: #1B1E49;"></i> Curso: <?php echo($ncurso); ?></h2>
		  </div>
          <!-- Page Content -->
		<center>
          <div class="mr-auto">
			  <div class="jumbotron-fluid text-center mx-auto container-fluid">
				  <div class="container-fluid">
					  <p><b>Descripción: </b>
						  <?php 
						  
							$descripcion="SELECT Descripcion FROM cursos where  IdCurso='$idcurso'";
							$foto1="SELECT VideoInt FROM cursos where IdCurso='$idcurso'";
							$condes=mysqli_query($conexion, $descripcion);
							$foto2=mysqli_query($conexion, $foto1);
							if($xondes1=mysqli_fetch_row($condes)){
								$condes1=trim($xondes1[0]);	
							}
							if($foto3=mysqli_fetch_row($foto2)){
								$foto1=trim($foto3[0]);	
								$foto1=utf8_encode($foto1);
							}
							echo(utf8_encode ($condes1));
						  ?>
					  </p>
				  </div>
				  <div class="figure-img">
					  <video src="../profesor/php/bdfiles/<?php echo($foto1); ?>" controls  style="width: auto; height: 350px;" preload="auto">
						  Tu navegador no implementa el elemento <code>video</code>.
					  </video>
			  	  	
				  </div>
				  <div class="form-group">
					  
					  <?php
	                     $iduser = "SELECT id from userestudiante where Correo='$cr'";
						 $consulid = mysqli_query( $conexion, $iduser );
						 if ( $rt = mysqli_fetch_row( $consulid ) ) {
							 $rs1 = trim( $rt[0] );
						 }
						 
	
					  $avance="SELECT Calificacion1 FROM avance WHERE IdEstudiante='$rs1' AND IdCurso='$idcurso'"; 
					  $conavance=mysqli_query($conexion, $avance);
						 if($avance1=mysqli_fetch_row($conavance)){
							 $result2=trim($avance1[0]);							 
						 }
						 else{
							$result2=0;	 
						 }
						 if($result2==0){
							 echo("<form action='examen.php' method='post'>
						  <input type='hidden' name='ncurso' value='$ncurso'>
						  <input type='hidden' name='idcurso' value='$idcurso'>
						  <input type='hidden' name='unidad' value='0'>
						  <button class='btn btn-primary' type='submit'><i class='fas fa-arrow-circle-right'></i> Realizar Examen Diagnóstico</button>					  
					  </form>");
						 }
						 else
						 {
							 echo("<form action='contentgallery.php' method='post'>
						  <input type='hidden' name='ncurso' value='$ncurso'>
						  <input type='hidden' name='idcurso' value='$idcurso'>
						  <input type='hidden' name='unidad' value='0'>
						  <button class='btn btn-primary' type='submit'><i class='fas fa-arrow-circle-right'></i> Continuar Curso</button>					  
					  </form>");
						 }
					  ?>
					  				  	
				  </div>  
			  </div>
			    
			 </div>
			</div>
		</center>
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
