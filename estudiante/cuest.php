<form action="actividad.php" method="post">
	<input type='hidden' name='idcurso' value='<?php echo($idcurso);?>'>
	<input type='hidden' name='ncurso' value='<?php echo($ncurso);?>'>
	<input type="hidden" name="unidad" value='<?php echo($unidad);?>'>


	<?php 
				 $pregunta="SELECT Nombre, Pregunta1, Pregunta2, Pregunta3, Pregunta4, Pregunta5, Pregunta6, Pregunta7, Pregunta8 FROM cuestionario WHERE IdCurso='$idcurso' AND Unidad='$unidad'";
				 $consulpreg=mysqli_query($conexion, $pregunta);
				 if($arraypreg=mysqli_fetch_array($consulpreg)){
					 $npreg=1;
					 
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