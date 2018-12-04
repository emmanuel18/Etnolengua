<?php 
session_start();
if (isset($_SESSION['id'])){
  
  header('location: phpsesioncontrol/readdir.php');
}

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119884835-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-119884835-1');
</script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="etnolengua, aprender lenguas indígeas, dialecto, mixe, tradictor español-mixe">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Etnolengua, es una plataforma educativa dedicada al rescate de las lenguas indígenas a través de la documentación y la enseñanza de estas mediante plataformas digitales.">
    <meta name="Keywords" content="etnolengua, lenguas indígenas, dialecto, mixe, náhuatl, lenguas indígenas en méxico, aprender dialectos, aprender dialectos mexicanos, aprender lenguas indígenas en méxico, dialectos mexicanos, chol">
    <title>Etnolengua</title>
	<link rel="icon" type="image/png" href="images/favicon.png" alt="Etnolengua Favicon">
    <!-- Bootstrap -->
    <link href="css/bootstrap-4.0.0.css" rel="stylesheet">
	
  </head>
  <body>
	<!-- Barra de navegación -->
	
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
	<a class="navbar-brand img-logo" href="default.php" ><img src="images/logo.png" width="150" height="auto" alt=""/></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent"> 
        <ul class="navbar-nav mr-auto">
         
          <li class="nav-item"> <a class="nav-link" href="#Quienes" style="color:#FFFFFF"> ¿Quiénes Somos? </a> </li>
          <li class="nav-item"> <a class="nav-link" href="#contacto" style="color:#FFFFFF">Contacto</a> </li>
		  <li class="nav-item"> <a class="nav-link" href="translator.html" style="color:#FFFFFF">Diccionario</a> </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="phpsesioncontrol\login.php" method="POST">
          <input class="form-control mr-sm-2" type="email" name="correo" placeholder="Correo Electronico" aria-label="Search" required>
			<input class="form-control mr-sm-2" type="Password" name="Password" placeholder="Contraseña" aria-label="Search" required>
          <button class="btn btn-primary my-2 my-sm-0" type="submit">Iniciar Sesión</button>
        </form>
      </div>
    </nav>
	
	<!-- Presentación -->  
    <header>
	
      <div class="jumbotron display-4" role="heading">
		
		  
        
          <div class="row m-auto">
            <div class="col-12">
				
				<h1 id="TextBlue">Bienvenido a</h1>
				<div class="logo" align="center">
			  		<img src="images/ORIGINAL.png" width="auto" height="239" alt="" >
		  		</div>
				<!--<h1 class="text-center"><a class="logo">Etnolengua</a> </h1> -->
              <h3 id="TextWhite" class="text-center">Las lenguas Indígenas desde una perspectiva núnca antes vista</h3>
              <p>&nbsp;</p>
              <p class="text-center"><a class="btn btn-primary btn-lg" href="registro.html" role="button">Registrate</a> </p>
            </div>
		  <div id="Quienes"></div>
          </div>
		
        
      </div>
	
    </header>
	  
	  
	 <!-- Quienes somos --> 
    <section >
      <div class="container">
        <div class="row">
          <div class="col-lg-12 mb-4 mt-2 text-center">
            <h2>¿Quiénes Somos?</h2>
          </div>
        </div>
      </div>
	  <div class="row jumbotron1">
		  
          <div class="col-sm-6 col-lg-6">
            <blockquote class="blockquote">
              <p class="mb-0 text-justify">Etnolengua es una plataforma donde se aprende una lengua indígena de manera eficiente, eficaz y divertida. El material didáctico está diseñado para cada tipo de alumno y el vocabulario está estructurado desde el más básico al más avanzado.</p>
             
            </blockquote>
          </div>
          <div class="col-sm-6 col-lg-6">
            <blockquote class="blockquote">
              <p class="mb-0 text-justify">Etnolengua es una organización que cuenta con estudiantes de lingüística que se dedica a la investigación y documentación de lenguas indígenas.</p>
               
            </blockquote>
               
          
          </div>
        </div>
		<!--
		<div class="row">
          <div class="col-sm-12 mt-4 mb-2 text-center">
            <h2>TESTIMONIALS</h2>
          </div>
        </div>
        <div class="container ">
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-12 text-center">
            <img class="rounded-circle" alt="140x140" style="width: 140px; height: 140px;" src="images/140X140.gif" data-holder-rendered="true">
            <h3>Lorem ipsum</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12 text-center">
            <img class="rounded-circle" alt="140x140" style="width: 140px; height: 140px;" src="images/140X140.gif" data-holder-rendered="true">
            <h3>Lorem ipsum dolor</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12 text-center">
            <img class="rounded-circle" alt="140x140" style="width: 140px; height: 140px;" src="images/140X140.gif" data-holder-rendered="true">
            <h3>Lorem ipsum dolor</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12 text-center">
            <img class="rounded-circle" alt="140x140" style="width: 140px; height: 140px;" src="images/140X140.gif" data-holder-rendered="true">
            <h3>Lorem ipsum</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12 text-center">
            <img class="rounded-circle" alt="140x140" style="width: 140px; height: 140px;" src="images/140X140.gif" data-holder-rendered="true">
            <h3>Lorem ipsum dolor</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12 text-center">
            <img class="rounded-circle" alt="140x140" style="width: 140px; height: 140px;" src="images/140X140.gif" data-holder-rendered="true">
            <h3>Lorem ipsum</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
          </div>
        </div>
      -->  
		
        
      </section> <!-- Fin de la seccion quienes somos -->
	  
	  <!-- aqui empieza una seccion que nose como le voy a poner -->
      <div class="jumbotron">
        
          <div class="row">
            <div class="text-center col-md-8 col-12 mx-auto">
              <h3 class="text-center" id="TextBlue">"Aprende nuevas palabras con nuestro Diccionario"</h3>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4 col-auto mx-auto"> <a class="btn btn-block btn-lg btn-success" href="translator.html" title="">
				Aprende Más</a> </div>
          </div>
        
      </div>
      
    <div class="container" id="contacto">
      <div class="row">
        <div class="col-12 col-md-8 mx-auto">
          <div class="jumbotron1">
            <div class="row text-center">
              <div class="text-center col-12">
                <h2>Contáctanos</h2>
              </div>
              <div class="text-center col-12">
                <!-- CONTACT FORM https://github.com/jonmbake/bootstrap3-contact-form -->
                <form id="feedbackForm" class="text-center" action="php/sendemail.php" method="post">
                  <div class="form-group">
                    <label for="name">Ponte en contacto con nosotros si deseas mas información acerca del proyecto.</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nombre Completo" aria-describedby="nameHelp" required>
                    <span id="nameHelp" class="form-text text-muted" style="display: none;">Introduce tu nombre correctamente.</span>
                  </div>
                 
				 <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" aria-describedby="emailHelp" required>
                    <span id="emailHelp" class="form-text text-muted" style="display: none;">Introduce un Email válido.</span>
                  </div>
				  <div class="form-group">
                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Asunto" aria-describedby="subjectHelp" required>
                    <span id="emailHelp" class="form-text text-muted" style="display: none;">Introduce mas de 5 caracteres</span>
                  </div>
                  <div class="form-group">
                  
                    <textarea rows="10" cols="100" class="form-control" id="message" name="message" placeholder="Deja tu mensaje" aria-describedby="messageHelp" required></textarea>
                    <span id="messageHelp" class="form-text text-muted" style="display: none;">Please enter a message.</span>
                  </div>
                  <button type="submit" id="feedbackSubmit" class="btn btn-primary btn-lg">Enviar</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="text-center card-footer bg-dark">
      
        <div class="row">
          <div class="col-12">
            <p id="TextWhite">Copyright © Etnolengua. All rights reserved.</p>
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