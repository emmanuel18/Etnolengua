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
				echo "<img src='../phpregistro/bdimagen/$ft' width='auto' height='32'>";
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
            <span>Mis Cursos</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Lenguas</h6>
            <a class="dropdown-item" data-toggle="modal" data-target="#act" href="">Mixe</a>
			  <a class="dropdown-item" data-toggle="modal" data-target="#act2" href="">Nahuatl</a>
          </div>
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
		<li class="nav-item active">
          <a class="nav-link" data-toggle="modal" data-target="#bot">
            <i class="fas fa-fw fa-robot"></i>
            <span>Bot(beta)</span>
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

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          
            <center><h2>¿Qué deseas aprender hoy?</h2></center>
          

          <!-- Page Content -->
          <div class="row container-fluid center">
			<div class="col-lg-6 mb-6 mt-6 text-center">
			  
				<h4>Mixe</h4>
				<img src="../images/mixe.png">
				<div class="dropdown-item text-center">
					<div class="btn-group-toggle">	
						<a class="btn btn-outline-primary btn-block" data-toggle="modal" data-target="#mixe">
						Aprendamos Mixe 
						<Span ></Span>
						</a>						
					</div>
			  	</div>
			  </div>
			
			<div class="col-lg-6 mb-6 mt-6 text-center">
			  <h4>Nahuatl</h4>
				<img src="../images/nahuatl.png" width="auto" height="250" alt="">
				<div class="dropdown-item text-center">
					<div class="btn-group-toggle">	
						<a class="btn btn-block btn-outline-success" data-toggle="modal" data-target="#nahutl">
						Aprendamos Nahuatl 
						<Span ></Span>
						</a>						
					</div>
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
	<!-- Bot -->
	<div class="modal fade bd-example-modal-lg" id="bot" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-robot text-primary"></i> Yolkan</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">X</span>
            </button>
          </div>
          <div class="modal-body">
			  <div class="form-group">
    			<h1>Yolkan</h1>
    				<p>Pulsa el botón de "hablar" para iniciar el reconocimiento, al finalizar pulsa "detener".</p>
					<div class="form-group">
    				<center><button onClick="testSpeech()" class="btn btn-success form"><i class="fa fa-microphone"></i>Comenzar prueba</button></center> </div>

    				
						<div class="form-group">
        				<textarea class="phrase form-control bg-light" rows="2">Palabra...</textarea>
						</div>
						<div class="form-group">
        				<textarea class="result form-control" rows="2">Correcto o Incorrecto</textarea>
						</div>
						<div class="form-group">
        				<textarea class="output form-control" rows="2">...diagnóstico</textarea>
						</div>
    				

    				<script src="script.js"></script>
			  
			
		  		</div>
          
        </div>
      </div>
    </div>
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
	<!-- mixe slector Modal-->
	<div class="modal fade" id="mixe" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Empecemos</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
			  <ul class="dropdown dropdown-menu-center" role="menu">
							<li class="dropdown-item" data-toggle="modal" data-target="#act">								
								<button class="btn btn-block btn-success"><i class="fa fa-pen text-warning"></i> Actividades </button>
							</li> 
							<li class="dropdown-item" data-toggle="modal" data-target="#history">								
								<button class="btn btn-block btn-primary"><i class="fa fa-atlas text-dark"></i> Historia </button>	
				  			</li>
							<li class="dropdown-item">
								<a href="traslatormixe.php" class="btn btn-block btn-outline-secondary"><i class="fa fa-book-open text-info"></i> Diccionario </a>
							</li>
						</ul> 
		  </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>            
          </div>
        </div>
      </div>
    </div> 
	 
	<!-- mixe act Modal-->  
	<div class="modal fade bd-example-modal-lg" id="act" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">¿Qué deséas aprender hoy?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">X</span>
            </button>
          </div>
          <div class="modal-body">
			 <div class="row"> 
			  <div class="col-lg-4 col-md-4 rounded bg-light">
				<li class="dropdown-item" data-toggle="modal" data-target="#color">
					<div class="text-center rounded">
           			<img class="rounded mt-2" alt="140x140" style="width: 140px; height: 140px;" src="img/color.png" data-holder-rendered="true">
           			<h3>Modulo 1:</h3>
           			<p>Colores</p>
					</div>
				</li>
			  </div>
			  <div class="col-lg-4 col-md-4 rounded bg-light">
				<li class="dropdown-item" data-toggle="modal" data-target="#letras">
					<div class="text-center rounded">
           			<img class="rounded mt-2" alt="140x140" style="width: 140px; height: 140px;" src="img/abc.png" data-holder-rendered="true">
           			<h3>Modulo 2:</h3>
           			<p>Letras</p>
					</div>
				</li>
			  </div>
			 </div>
		  </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-primary" href="">Ver Avance</a>
          </div>
        </div>
      </div>
    </div>
	  <!-- Colores mixe -->
	<div class="modal fade bd-example-modal-lg" id="color" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><img src="img/color.png" class="figure-img" width="35px"> Colores</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">X</span>
            </button>
          </div>
          <div class="modal-body">
			  <div id="myCarousel" class="carousel slide" data-ride="false" data-interval="2000">
  				<!-- Indicators -->
  				<ol class="carousel-indicators">
    				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    				<li data-target="#myCarousel" data-slide-to="1"></li>
    				<li data-target="#myCarousel" data-slide-to="2"></li>
					<li data-target="#myCarousel" data-slide-to="3"></li>
					<li data-target="#myCarousel" data-slide-to="4"></li>
					<li data-target="#myCarousel" data-slide-to="5"></li>
					<li data-target="#myCarousel" data-slide-to="6"></li>
  				</ol>

  				<!-- Wrapper for slides -->
  				<div class="carousel-inner">
    				<div class="carousel-item active">
						
      						<img src="img/0_I-sI3u34g0ydRqyA.png" height="350px" width="750px" alt="1">
							<div class="carousel-caption d-none d-md-block text-dark">							
    							<h3>Pon atención...</h3>
   	 							<h5>Te mostraremos algunos ejemplos de colores</h5>
								<h5>Posteriormente tendrás que elegir la opción correcta</h5>
  							</div>
						
   	 				</div>
					
					<div class="carousel-item">
      					<div class="bg-info">
      						<img src="img/Colores/Azul.png" height="350px" width="750px" alt="2">
							<div class="carousel-caption d-none d-md-block text-dark">
								<h4>Azul...</h4>
   	 							<h5>Tsu’unk </h5>
							</div>	
						</div>
    				</div>

    				<div class="carousel-item">
      					<div class="bg-info">
      						<img src="img/Colores/Blanco.png" height="350px" width="750px" alt="3">
							<div class="carousel-caption d-none d-md-block text-dark">
								<h4>Blanco...</h4>
   	 							<h5>Poop </h5>
							</div>	
						</div>
    				</div>

    				<div class="carousel-item">
      					<div class="bg-info">
      						<img src="img/Colores/Negro.png" height="350px" width="750px" alt="4">
							<div class="carousel-caption d-none d-md-block text-dark">
								<h4>Negro...</h4>
   	 							<h5>Tsixy </h5>	
							</div>
						</div>
    				</div>
					
					<div class="carousel-item">
      					<div class="bg-info">
      						<img src="img/Colores/Rojo.png" height="350px" width="750px" alt="5">
							<div class="carousel-caption d-none d-md-block text-dark">	
								<h4>Rojo...</h4>
   	 							<h5>Tsapts </h5>
							</div>
						</div>
    				</div>
					
					<div class="carousel-item">
      					<div class="bg-info">
      						<img src="img/Colores/Verde.png" height="350px" width="750px" alt="6">
							<div class="carousel-caption d-none d-md-block text-dark">	
								<h4>Verde...</h4>
   	 							<h5>Pu'ts </h5>
							</div>
						</div>
    				</div>
					
					<div class="carousel-item">
      					
      						<img src="img/0_I-sI3u34g0ydRqyA.png" height="350px" width="750px" alt="7">
							<div class="carousel-caption d-none d-md-block text-dark">							
    							<h3>Listo...</h3>
   	 							<h5>A continuación deberás elegir la opción que corresponda al color mostrado</h5>
								<h5>Pulsa "Siguiente para continuar..."</h5>
  							</div>
						
    				</div>
  				</div>

  				<!-- Left and right controls -->
  				<a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
    				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
    				<span class="sr-only">Previous</span>
  				</a>
  				<a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
    				<span class="carousel-control-next-icon" aria-hidden="true"></span>
    				<span class="sr-only">Next</span>
  				</a>
			</div>
			
		  </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-primary" data-toggle="modal" data-target="#color2">Siguiente</a>
          </div>
        </div>
      </div>
    </div>
	
	<div class="modal fade bd-example-modal-lg" id="color2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><img src="img/color.png" class="figure-img" width="35px"> Colores</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">X</span>
            </button>
          </div>
          <div class="modal-body">
			 <div class="row">
				 <div class="col-lg-4 col-md-4 rounded bg-light">				 	
						<div class="text-center">
           					<img class="mt-2" alt="140x140" style="width: 140px; height: 140px;" src="img/Colores/Azul1.png" data-holder-rendered="true">
           					<h3>Azul</h3>
           					<form name="miformulario" action="index.php" method="post" class="form-check">								
								<div class="form-group">
									<label class="input-group-text"> Elige una opción </label>
									<select class="form-control" id="exampleFormControlSelect1" name="n1">
										<option></option>
      									<option value="null">Tsixy</option>
      									<option value="1">Tsu’unk</option>
      									<option value="null">Pu'ts</option>      									
    								</select>
								</div>
							
						</div>					
			  	</div>
				<div class="col-lg-4 col-md-4 rounded bg-light">				 	
						<div class="text-center">
           					<img class="mt-2" alt="140x140" style="width: 140px; height: 140px;" src="img/Colores/Verde5.png" data-holder-rendered="true">
           					<h3>Verde</h3>
           													
								<div class="form-group">
									<label class="input-group-text"> Elige una opción </label>
									<select class="form-control" id="exampleFormControlSelect1" name="n2">
      									<option></option>
										<option value="1">Pu'ts</option>
      									<option value="null">Tsapts</option>
      									<option value="null">Tsu’unk</option>      									
    								</select>
								</div>
							
						</div>					
			  	</div>
				<div class="col-lg-4 col-md-4 rounded bg-light">				 	
						<div class="text-center">
           					<img class="mt-2" alt="140x140" style="width: 140px; height: 140px;" src="img/Colores/Blanco2.png" data-holder-rendered="true">
           					<h3>Blanco</h3>
           													
								<div class="form-group">
									<label class="input-group-text"> Elige una opción </label>
									<select class="form-control" id="exampleFormControlSelect1" name="n3">
      									<option></option>
										<option value="null">Po'op</option>
      									<option value="null">Tsapts</option>
      									<option value="1">Poop</option>      									
    								</select>
								</div>
							
						</div>					
			  	</div>
				<div class="col-lg-4 col-md-4 rounded bg-light">				 	
						<div class="text-center">
           					<img class="mt-2" alt="140x140" style="width: 140px; height: 140px;" src="img/Colores/Rojo4.png" data-holder-rendered="true">
           					<h3>Rojo</h3>
           												
								<div class="form-group">
									<label class="input-group-text"> Elige una opción </label>
									<select class="form-control" id="exampleFormControlSelect1" name="n4">
      									<option></option>
										<option value="null">Pu'ts</option>
      									<option value="1">Tsapts</option>
      									<option value="null">Puts</option>      									
    								</select>
								</div>
							
						</div>					
			  	</div>
				<div class="col-lg-4 col-md-4 rounded bg-light">				 	
						<div class="text-center">
           					<img class="mt-2" alt="140x140" style="width: 140px; height: 140px;" src="img/Colores/Negro3.png" data-holder-rendered="true">
           					<h3>Negro</h3>
           											
								<div class="form-group">
									<label class="input-group-text"> Elige una opción </label>
									<select class="form-control" id="exampleFormControlSelect1" name="n5">
      									<option></option>
										<option value="1">Tsixy</option>
      									<option value="null">Tsi'xy</option>
      									<option value="null">Puts</option>      									
    								</select>
								</div>
							
						</div>					
			  	</div>
				<div class="col-lg-4 col-md-4 rounded bg-light">				 	
						<div class="text-center">
           					<img class="mt-2" alt="140x140" style="width: 140px; height: 140px;" src="img/Colores/Verde5.png" data-holder-rendered="true">
           					<h3>Verde</h3>
           												
								<div class="form-group">
									<label class="input-group-text"> Elige una opción </label>
									<select class="form-control" id="exampleFormControlSelect1" name="n6">
      									<option></option>
										<option value="1">Pu'ts</option>
      									<option value="null">Pots</option>
      									<option value="null">Puts</option>      									
    								</select>
								</div>
							
						</div>					
			  	</div>
				 
			 </div>  
		  </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#ev">Evaluar</button>
			  </form>
          </div>
        </div>
      </div>
    </div>
	<div class="modal fade" id="ev" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Puntaje obtenido</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">X</span>
            </button>
          </div>
          <div class="modal-body">
			<?php
			  $n1=$_POST['n1'];
			  $n2=$_POST['n2'];
			  $n3=$_POST['n3'];
			  $n4=$_POST['n4'];
			  $n5=$_POST['n5'];
			  $n6=$_POST['n6'];
			  $cal=0;
			  if ($n1==1){
				$cal=$cal+10;
			  }
			  if ($n2==1){
				$cal=$cal+10;
			  }
			  if ($n3==1){
				$cal=$cal+10;
			  }
			  if ($n4==1){
				$cal=$cal+10;
			  }
			  if ($n5==1){
				$cal=$cal+10;
			  }
			  if ($n6==1){
				$cal=$cal+10;
			  }
			  $prom=$cal/6*10;
			  function porcentaje($cantidad,$decimales){
				  return number_format($cantidad,$decimales);
			  }
			  $porciento =  porcentaje($prom,2);
			  //echo ($porciento);
			  echo("66.67%");
			  ?>
		  </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Reintentar</button>
            <a class="btn btn-primary" href="index.php">Salir</a>
          </div>
        </div>
      </div>
    </div>
	<!-- Historia mixe --> 
	<div class="modal fade bd-example-modal-lg" id="history" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Mixe</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">X</span>
            </button>
          </div>
          <div class="modal-body">
			  <div class="row">
		  <div class="col-lg-6 mb-6 mt-6 bg-light text-justify">
		  	
			  <h2>
					Del nombre
				</h2>
				<p> <img src="mix/mixes-OAX402FLP.jpg" align="left" style="max-width: 30%;" HSPACE=10  alt="">
					Los mixes se llaman a sí mismos Ayuukjä'äy. La lengua que hablan es ayuuk, que es el nombre con que históricamente se conoce al grupo. La palabra ayuuk está compuesta de los siguientes morfemas: a = idioma, palabra; yuuk: montaña, florido; y yä'äy: gente, muchedumbre. Por lo tanto, su significado es "gente del idioma florido". Según la tradición oral, la palabra mixes es una corrupción del vocablo mixy (varón-hombre), al que se le agregó el plural "es". Otros piensan, que mixes pudo haber surgido de la dificultad de los españoles de pronunciar el vocablo original. 
					
				</p>
				 
				<h2>
					Localización
				</h2>
				<p > <img src="mix/mixes-OAX348FLP.jpg" align="right" style="max-width: 30%;" HSPACE=10  alt="">
					La región mixe se encuentra al noreste del estado de Oaxaca. Colinda al noroeste con los ex distritos de Villa Alta; al norte con Choapam y con el estado de Veracruz; al sur con Yautepec y al sureste con Juchitán y Tehuantepec. El territorio abarca una superficie total de 4 668.55 km2. <br><br>

					La topografía es accidentada, se pueden encontrar varios microclimas en un espacio geográfico reducido. La región ayuuk ha sido dividida en tres zonas climáticas: alta o fría, con altitudes superiores a los 1 800 m, media o templada, con alturas de 1 300 a 1 800 m, y baja o caliente que se localiza desde los 35 m hasta los 1 000 msnm.<br><br>

					La región tiene un total de 19 municipios: la zona alta está integrada por Tlahuitoltepec, Ayutla, Cacalotepec, Tepantlali, Tepuxtepec, Totontepec, Tamazulapam y Mixistlán; la zona media por Ocotepec, Atitlán, Alotepec, Juquila Mixes Camotlán, Zacatepec, Cotzocón, Ouetzaltepec, e lxcuintepec y la zona baja por Mazatlán y Guichicovi.
					
				</p>
		  </div>
		  
          <div class="col-lg-6 mb-6 mt-6 text-justify bg-light">
		  <h2>
					Antecedentes históricos
				</h2>
				<p > 
					La hipótesis más aceptada hasta el momento sobre el origen del grupo es la del investigador George Foster, que coincide con la filiación lingüística propuesta por Swadesh y que vincula al mixe-zoque-popoluca-tapachulteco con el tronco macro-maya. Esta hipótesis sugiere que los mixes debieron haber ocupado una franja del Istmo de Tehuantepec.<br><br>

					A mediados del siglo XVI, los españoles utilizaron como táctica de conquista, la evangelización, ésta estuvo a cargo de los dominicos, quienes fundaron vicarías en lugares como Villa Alta, Totontepec y Najapa de Madero, en esta última localidad introdujeron un Cristo negro en su centro ceremonial.<br><br>

					En 1938 se estableció oficialmente el distrito mixe, y el municipio de Zacatepec como cabecera de las autoridades judiciales y hacendarias. A partir de este nombramiento, se han presentado en la región serios conflictos políticos originados por cacicazgos locales. También se han presentado luchas violentas debido a conflictos agrarios.
					
				</p>
				
				<h2>
					Lengua
				</h2>
				<p> <img src="mix/mixes-7631.jpg" align="left" style="max-width: 20%;" HSPACE=10  alt="">
					La familia lingüística mixe-zoqueana está integrada por el mixe (ayuuk), el zoque y el popoluca; aunque hay quienes incluyen el tapachulteca (lengua extinta). <br><br>

					Entre los ayuuk jä'äy existen variantes dialectales inteligibles entre sí; sin embargo, cada pueblo dice hablar el ayuuk "más correctamente".
					
				</p>
				
				<h2>
					Artesanías
				</h2>
				<p> <img src="mix/mixes-7624.jpg" align="right" style="max-width: 20%;" HSPACE=10  alt="">
					La música puede considerarse como la principal actividad artística que cultivan los ayuuk. En cuanto a artesanías, podemos encontrar el telar de cintura, el cual se ha mantenido en Tamazulapam, Tlahuitoltepec y Cotzocón; mientras que Mixistlán, Tamazulapam y algunas rancherías de Ayutla, se caracterizan por la producción de alfarería.
					
				</p>


		  </div>
		  
		  
      </div></div>
         <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>            
          </div> 
        </div>
      </div>
    </div>
	<!-- Letras -->
	<div class="modal fade bd-example-modal-lg" id="letras" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><img src="img/abc.png" class="figure-img" width="35px">Letras</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">X</span>
            </button>
          </div>
          <div class="modal-body">
			 <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  				<ol class="carousel-indicators">
    				<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    				<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    				<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    				<li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
    				<li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
 			 	</ol>
  				<div class="carousel-inner">
    				<div class="carousel-item active">
						<video width="750" height="350" controls>
  							<source src="videosletras/E.mp4" type="video/mp4"> 
							Your browser does not support the video tag.
						</video>
						<div class="carousel-caption d-none d-md-block">
    						<h5>Letra...</h5>
    						<p>"E"</p>
  						</div>
    				</div>
    				<div class="carousel-item">
						<video width="750" height="350" controls>
  							<source src="videosletras/U.mp4" type="video/mp4"> 
							Your browser does not support the video tag.
						</video>
						<div class="carousel-caption d-none d-md-block">
    						<h5>Letra...</h5>
    						<p>"U"</p>
  						</div>
    				</div>
    				<div class="carousel-item ">
						<video width="750" height="350" controls>
  							<source src="videosletras/T.mp4" type="video/mp4"> 
							Your browser does not support the video tag.
						</video>
						<div class="carousel-caption d-none d-md-block">
    						<h5>Letra...</h5>
    						<p>"T"</p>
  						</div>
    				</div>
					<div class="carousel-item ">
						<video width="750" height="350" controls>
  							<source src="videosletras/S.mp4" type="video/mp4"> 
							Your browser does not support the video tag.
						</video>
						<div class="carousel-caption d-none d-md-block">
    						<h5>Letra...</h5>
    						<p>"S"</p>
  						</div>
    				</div>
					<div class="carousel-item ">
						<video width="750" height="350" controls>
  							<source src="videosletras/M.mp4" type="video/mp4"> 
							Your browser does not support the video tag.
						</video>
						<div class="carousel-caption d-none d-md-block">
    						<h5>Letra...</h5>
    						<p>"M"</p>
  						</div>
    				</div>
					<div class="carousel-item ">
						<video width="750" height="350" controls>
  							<source src="videosletras/einv.mp4" type="video/mp4"> 
							Your browser does not support the video tag.
						</video>
						<div class="carousel-caption d-none d-md-block">
    						<h5>Letra...</h5>
    						<p>"Ə"</p>
  						</div>
    				</div>
					<div class="carousel-item ">
						<video width="750" height="350" controls>
  							<source src="videosletras/G.mp4" type="video/mp4"> 
							Your browser does not support the video tag.
						</video>
						<div class="carousel-caption d-none d-md-block">
    						<h5>Letra...</h5>
    						<p>"G"</p>
  						</div>
    				</div>
					<div class="carousel-item ">
						<video width="750" height="350" controls>
  							<source src="videosletras/K.mp4" type="video/mp4"> 
							Your browser does not support the video tag.
						</video>
						<div class="carousel-caption d-none d-md-block">
    						<h5>Letra...</h5>
    						<p>"K"</p>
  						</div>
    				</div>
  				</div>
  				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
    				<span class="sr-only">Previous</span>
  				</a>
  				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    				<span class="carousel-control-next-icon" aria-hidden="true"></span>
    				<span class="sr-only">Next</span>
  				</a>
			</div>
			
		  </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Salir</button>
            
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
	<script src="js/script.js"></script>
  </body>
<!--<script type="text/javascript">

	var recognition;
	var recognizing = false;
	if (!('webkitSpeechRecognition' in window)) {
		alert("¡API no soportada!");
	} else {

		recognition = new webkitSpeechRecognition();
		recognition.lang = "es-VE";
		recognition.continuous = true;
		recognition.interimResults = true;

		recognition.onstart = function() {
			recognizing = true;
			console.log("empezando a eschucar");
		}
		recognition.onresult = function(event) {

		 for (var i = event.resultIndex; i < event.results.length; i++) {
			if(event.results[i].isFinal)
				document.getElementById("texto").value += event.results[i][0].transcript;
		    }
			
			//texto
		}
		recognition.onerror = function(event) {
		}
		recognition.onend = function() {
			recognizing = false;
			document.getElementById("procesar").innerHTML = "<i class='fa fa-microphone'></i> Hablar";
			console.log("terminó de eschucar, llegó a su fin");

		}

	}

	function procesar() {

		if (recognizing == false) {
			recognition.start();
			recognizing = true;
			document.getElementById("procesar").innerHTML = "<i class='fa fa-microphone'></i> Detener";
		} else {
			recognition.stop();
			recognizing = false;
			document.getElementById("procesar").innerHTML = "<i class='fa fa-microphone'></i> Hablar";
		}
	}
</script> -->
</html>
