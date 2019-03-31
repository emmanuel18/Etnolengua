<?php
//contador de elementos
$nelements = "select count(*) from Galeria where IdCurso='$idcurso' AND NumLec='$unidad'";
$consulelements = mysqli_query( $conexion, $nelements );

if ( $elemt = mysqli_fetch_array( $consulelements ) ) {
	$nelemto = trim( $elemt[ 0 ] );
}
$contelem=0;
$consultgal = "SELECT Img, Ind, Esp, Sonido FROM Galeria WHERE IdCurso='$idcurso' AND NumLec='$unidad'";
$gal = mysqli_query( $conexion, $consultgal );
$cont = 0;
?>
<!-- -->
<div class="bd-example jumbotron">
	<div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel">
		
		<div class="carousel-inner">
		<?php
		while($arrayres=mysqli_fetch_array($gal))
		{
			if ($cont==0)
			{
				echo("<div class='carousel-item active'>");
				$cont=1;
			}
			else 
			{
				echo("<div class='carousel-item'>");
			}
			echo("<img src='../profesor/".$arrayres["Img"]."' class='d-block w-auto mx-auto' height='400px'>
				<div class='carousel-caption d-none d-md-block bold text-white'>
					<h3 class='text-shadow'>".$arrayres["Ind"]."</h3>
					<h4 class='text-shadow'>".$arrayres["Esp"]."</h4>
					<audio controls='' onerror='this.style.opacity=0'>
					
					<source src='../profesor/".$arrayres["Sonido"]."' type='audio/mpeg'>
					</audio> 
				</div>
			</div>
			");
		}
		?>
		
			
				
				
			
		</div>
		
		
		
		
		<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Anterior</span>
    </a>
	


		<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Siguiente</span>
    </a>
	


	</div>
</div>