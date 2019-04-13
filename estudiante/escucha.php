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
$idpregunta = $_POST[ 'idpregunta' ];
$cont = $_POST[ 'contador' ];
//consulta y cuenta respuestas correctas
$answer = "Select Respuesta from quizzpron where idcurso='$idcurso' and numlec='$unidad' and IdQuizz='$idpregunta'";
$consulanswer = mysqli_query( $conexion, $answer );

if ( $res1 = mysqli_fetch_array( $consulanswer ) ) {
	$resp1 = $res1[ 'Respuesta' ];

	if ( strcmp( $resprecib, $resp1 ) == 0 ) {
		$aciertos++;
	} else {
		$cont = $cont - 1;
		$alert = "<div class='alert alert-danger' role='alert'>Incorrecto, la respuesta correcta es: " . $resp1 . "</div>";
	}
}

?>
<div class='jumbotron w-50 mx-auto'>
	<form action="actividad.php" method="post">

		<input type='hidden' name='idcurso' value='<?php echo($idcurso);?>'>
		<input type='hidden' name='ncurso' value='<?php echo($ncurso);?>'>


		<?php
		//error_reporting( 0 );

		$Evaluacion = "SELECT * from quizzpron where IdCurso='$idcurso' AND NumLec='$unidad' LIMIT $cont, 1";
		$respuestas = "SELECT Respuesta From quizzpron where IdCurso='$idcurso' AND NumLec='$unidad' ORDER BY RAND()";
		$consultaEval = mysqli_query( $conexion, $Evaluacion );
		$consultaResp = mysqli_query( $conexion, $respuestas );

		if ( $row4 = mysqli_fetch_array( $consultaEval ) ) {
			echo( "<div class='mx-auto img-fluid'><center>" );
			echo( "<h4 class='text-center'>Reactivo: " . ( $cont + 1 ) . "</h4><br>" );

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
			echo( "<input type='hidden' name='idpregunta' value='" );
			echo( $row4[ 'IdQuizz' ] );
			echo( "'>" );

			$correcta = $row4[ 'Respuesta' ];

			echo( "<div class='input-group mb-3'><div class='input-group-prepend'><label class='input-group-text' for='search'>Elige una respuesta</label></div><select class='custom-select' id='search' name='resp' required><option >Elige una opción...</option>" );
			while ( $row5 = mysqli_fetch_array( $consultaResp ) ) {



				echo( "<option value=" . addslashes( $row5[ 'Respuesta' ] ) . ">" );
				echo( $row5[ 'Respuesta' ] );
				echo( "</option>" );
			}
			echo( "</select></div><div>" . $alert . "</div>" );

		} else {

			$calif = ( $aciertos / $npreg ) * 10;





		}



		?>



		<input type='hidden' name='contador' value='<?php echo($cont+1);?>'>

		<input type='hidden' name='aciertos' value='<?php echo($aciertos);?>'>
		<center>
			<?php
			if ( ( $cont ) < $npreg ) {
				echo( "<input type='hidden' name='unidad' value='" );
				echo( $unidad );
				echo( "'>" );
				echo( "<button class='btn btn-primary' type='submit'>Revisar <i class='fas fa-arrow-circle-right'></i></button>" );
			}
			?>

		</center>

	</form>

	<?php

	if ( ( $cont ) == $npreg ) {
		if ( $unidad == 1 ) {
			include 'botchido.php';
		}elseif( $unidad == 2 ){
			include 'botchido2.php';
		}

		$registrarcalif = "INSERT INTO avance (IdCurso, IdEstudiante, Unidad, Calificacion1) VALUES ('$idcurso', '$iduser', '$unidad', '$calif')";

		if ( $unidad >= 4 ) {
			$redir = 'examen.php';
		} else {
			$redir = 'contentvid.php';
		}
		$insertcalif = mysqli_query( $conexion, $registrarcalif );
		echo( "<form action='" . $redir . "' method='post'><input type='hidden' name='unidad' value='" );
		echo( $unidad + 1 );
		echo( "'>" );
		echo( "<input type='hidden' name='ncurso' value='" );
		echo( $ncurso );
		echo( "'>" );
		echo( "<input type='hidden' name='idcurso' value='" );
		echo( $idcurso );
		echo( "'>" );
		echo( "<center><button class='btn btn-danger text-white' type='submit'>Finalizar lección <i class='fas fa-arrow-circle-right'></i></button></center></form>" );
	}
	?>
</div>