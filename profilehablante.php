<?php
session_start();
$cr=$_SESSION ['Correo'];
$ps=$_SESSION ['Password'];
$conexion = mysqli_connect("localhost", "emmanuel18", "estrada18", "mixe");
$query="SELECT Correo FROM userhablante WHERE Correo='$cr' and Password=MD5('$ps')";
$query2="SELECT Nombre FROM userhablante WHERE Correo='$cr' and Password=MD5('$ps')";
$resultado1=mysqli_query($conexion, $query);
$resultado2=mysqli_query($conexion, $query2);
if($row=mysqli_fetch_row($resultado1)){
  $rs=trim($row[0]);

} 
else{
  $rs=null;
}
if($row=mysqli_fetch_row($resultado2)){
  $rs2=trim($row[0]);

} 
else{
  $rs2=null;
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Etnolengua</title>
	<link rel="icon" type="image/png" href="images/favicon.png">
    <!-- Bootstrap -->
    <link href="css/bootstrap-4.0.0.css" rel="stylesheet">
	
  </head>
  <body >
	<!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
	<a class="navbar-brand logo" href="profile.html" ><img src="images/PERFIL.png" width="auto" height="32" alt="" ></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
         
          <li class="nav-item"> <a class="nav-link" href="#" style="color:#FFFFFF";> ¡Hola 
            <?php
            $token = strtok($rs2, " \n\t");
            if($token !== false) {
              echo " $token";   
              }
            ?>! </a> </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="phpsesioncontrol/cerrarsesion.php">
          
          <button class="btn btn-primary my-2 my-sm-0" type="submit">Cerrar sesión</button>
        </form>
      </div>
    </nav>
	  
	
	  
	 <!-- Quienes somos --> 
    <section id="Quienes" >
      <div class="container">
        <div class="row">
          <div class="col-lg-12 mb-4 mt-2 text-center">
            <h2>¿Qué lengua quieres aprender hoy?</h2>
          </div>
        </div>
      </div>
	  <div class="row">
          <div class="col-lg-6 mb-6 mt-6 text-center bg-light">
		  	<h2>Mixe</h2>
			  <img src="images/mixe.png" alt="">
			  <br> <br>
			  

			<div class="btn-group">
  				<button type="button" class="btn btn-primary dropdown-toggle-split dropdown-toggle" data-toggle="dropdown">
    				Aprende más <span class="caret"></span>
 		 		</button>
 
  				<ul class="dropdown-menu" role="menu">
    				<li class="dropdown-item"><a href="learn.html" >Actividades</a></li>
					<li class="dropdown-item"><a href="blog.html" >Historia</a></li>
    				<li class="dropdown-item"><a href="translator.html">Diccionario</a></li>
  				</ul>
			</div>


		  </div>
		  
		  <div class="col-lg-6 mb-6 mt-6 text-center bg-light">
		  	<h2>Nahuatl</h2>
			  <img src="images/nahuatl.png" width="auto" height="250" alt="">
			  <br><br>
			  <div class="btn-group">
  				<button type="button" class="btn btn-primary dropdown-toggle-split dropdown-toggle" data-toggle="dropdown">
    				Aprende más <span class="caret"></span>
 		 		</button>
 
  				<ul class="dropdown-menu" role="menu">
    				<li class="dropdown-item"><a href="#" >Actividades</a></li>
    				<li class="dropdown-item"><a href="translator2.html">Diccionario</a></li>
  				</ul>
			</div>
		  </div>
      </div>
		
		
       
      </section> <!-- Fin de la seccion quienes somos -->
	  
	  
   <br> <br> <br> <br> <br> <br> <br> 
    <footer class="text-center">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <p>Copyright © Etnolengua. All rights reserved.</p>
          </div>
        </div>
      </div>
    </footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
    <script src="js/jquery-3.2.1.min.js"></script> 
    <!-- Include all compiled plugins (below), or include individual files as needed --> 
    <script src="js/popper.min.js"></script> 
    <script src="js/bootstrap-4.0.0.js"></script>
  </body>
</html>