<?php
error_reporting( 0 );
//contador de preguntas y calificaciones
$npregun = "select count(*) from quizzpron where idcurso='$idcurso' and numlec='$unidad'";
$consultapreg = mysqli_query( $conexion, $npregun );

if ( $pre = mysqli_fetch_array( $consultapreg ) ) {
	$npreg = trim( $pre[ 0 ] );
}
//recibe respuesta
$aciertos = $_POST[ 'aciertos' ];
$resprecib = $_POST[ 'resp' ];
$pregunta = $_POST[ 'pregunta' ];
$cont = $_POST[ 'contador' ];
//consulta y cuenta respuestas correctas
$answer = "Select Respuesta from quizzpron where idcurso='$idcurso' and numlec='$unidad' and Pregunta='$pregunta'";
$consulanswer = mysqli_query( $conexion, $answer );

if ( $res1 = mysqli_fetch_array( $consulanswer ) ) {
	$resp1 = $res1[ 'Respuesta' ];

	if ( strcmp( $resprecib, $resp1 ) == 0 ) {
		$aciertos++;
	}
}

?>
<form action="actividad.php" method="post">

	<input type='hidden' name='idcurso' value='<?php echo($idcurso);?>'>
	<input type='hidden' name='ncurso' value='<?php echo($ncurso);?>'>
	<div class='jumbotron'>

		<?php
		//error_reporting( 0 );
		
		$Evaluacion = "SELECT * from quizzpron where IdCurso='$idcurso' AND NumLec='$unidad' LIMIT $cont, 1";
		$respuestas = "SELECT Respuesta From quizzpron where IdCurso='$idcurso' AND NumLec='$unidad' ORDER BY RAND()";
		$consultaEval = mysqli_query( $conexion, $Evaluacion );
		$consultaResp = mysqli_query( $conexion, $respuestas );
		
		if ( $row4 = mysqli_fetch_array( $consultaEval ) ) {
			echo( "<div class='mx-auto img-fluid'><center>" );
			
			echo( "<audio src='../profesor/" );
			echo( $row4[ 'Audio' ] );
			echo( "' controls>" );
			
			echo( "</center></div>" );
			echo( "<h5 class='text-center'>" );
			echo( $row4[ 'Pregunta' ] );
			echo( "</h5>" );
			echo( "<input type='hidden' name='pregunta' value='" );
			echo( $row4[ 'Pregunta' ] );
			echo( "'>" );
			echo( "<div class='input-group mb-3'><div class='input-group-prepend'><label class='input-group-text' for='inputGroupSelect01'>Respuesta</label></div><select class='custom-select' id='inputGroupSelect01' name='resp' required><option value='' selected>Eliger una opción...</option>" );
			while ( $row5 = mysqli_fetch_array( $consultaResp ) ) {
				echo( "<option value='" );
				echo( $row5[ 'Respuesta' ] );
				echo( "'>" );
				echo( $row5[ 'Respuesta' ] );
				echo( "</option>" );
			}
			echo( "</select></div>" );

		} else {

			$calif = ( $aciertos / $npreg ) * 10;
			if ( $calif >= 8 ) {
				echo( "<center><h5>¡Felicidades!, tu puntaje es de " . round( $calif, 2 ) . "/10 </h5>" );
				echo( "<i class='fas fa-grin-stars text-success fa-10x'></i> <p>Sigue preparandote tomando otro de nuestros curso.</p></center>" );
			} elseif ( $calif < 8 && $calif > 6 ) {
				echo( "<center><h5>Tu puntaje es de " . round( $calif, 2 ) . "/10 </h5>" );
				echo( "<i class='fas fa-smile-wink text-success fa-10x'></i> <p>Puedes volver a hacer la evaluación o tomar otro de nuestros cursos.</p></center>" );
			} elseif ( $calif <= 6 ) {
				echo( "<center><h5>¡Ups!, tu puntaje es de " . round( $calif, 2 ) . "/10 </h5>" );
				echo( "<i class='far fa-grin-beam-sweat text-primary fa-10x'></i><p> Te recomendamos repasar otra vez las lecciones.</p><p>Pero no te preocupes lo puedes seguir intentando cuantas veces sea necesario.</p><p>¡Te deseamos mucho exito!</p></center>" );
			}
		}

		?>

	</div>

	<input type='hidden' name='contador' value='<?php echo($cont+1);?>'>

	<input type='hidden' name='aciertos' value='<?php echo($aciertos);?>'>
	<center>
		<?php
		if ( ( $cont ) < $npreg ) {
			echo( "<input type='hidden' name='unidad' value='" );
			echo( $unidad );
			echo( "'>" );
			echo( "<button class='btn btn-primary' type='submit'>Siguiente Pregunta <i class='fas fa-arrow-circle-right'></i></button>" );
		}
		?>

	</center>

</form>

<?php
if ( ( $cont ) == $npreg ) {
	$registrarcalif = "INSERT INTO avance (IdCurso, IdEstudiante, Unidad, Calificacion1) VALUES ('$idcurso', '$iduser', '$unidad', '$calif')";
	
	if($unidad>=3){
		$redir='examen.php';
	}else{
		$redir='contentvid.php';
	}
	$insertcalif = mysqli_query( $conexion, $registrarcalif );
	echo( "<form action='".$redir."' method='post'><input type='hidden' name='unidad' value='" );
	echo( $unidad + 1 );
	echo( "'>" );
	echo("<input type='hidden' name='ncurso' value='" );
	echo( $ncurso);
	echo( "'>" );
	echo("<input type='hidden' name='idcurso' value='" );
	echo( $idcurso);
	echo( "'>" );
	echo( "<center><button class='btn btn-danger text-white' type='submit'>Finalizar lección <i class='fas fa-arrow-circle-right'></i></button></center></form>" );
}
?>