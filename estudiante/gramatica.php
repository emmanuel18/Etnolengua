<?php
error_reporting( 0 );
//contador de preguntas y calificaciones
$npregun = "select count(*) from quizzgram where idcurso='$idcurso' and numlec='$unidad'";
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
$answer = "Select Respuesta from quizzgram where idcurso='$idcurso' and numlec='$unidad' and IdQuizz='$idpregunta'";
$consulanswer = mysqli_query( $conexion, $answer );

if ( $res1 = mysqli_fetch_array( $consulanswer ) ) {
	$resp1 = $res1[ 'Respuesta' ];

	if ( strcmp( $resprecib, $resp1 ) == 0 ) {
		$aciertos++;
	}else{
		$cont=$cont-1;
		$alert="<div class='alert alert-danger' role='alert'>Incorrecto, la respuesta correcta es: ".$resp1."</div>";
	}
}

?>
<form action="actividad.php" method="post">

	<input type='hidden' name='idcurso' value='<?php echo($idcurso);?>'>
	<input type='hidden' name='ncurso' value='<?php echo($ncurso);?>'>
	<div class='jumbotron w-50 mx-auto'>

		<?php
		error_reporting( 0 );

		$Evaluacion = "SELECT * from quizzgram where IdCurso='$idcurso' AND NumLec='$unidad' LIMIT $cont, 1";
		$respuestas = "SELECT Respuesta From quizzgram where IdCurso='$idcurso' AND NumLec='$unidad' ORDER BY RAND()";
		$consultaEval = mysqli_query( $conexion, $Evaluacion );
		$consultaResp = mysqli_query( $conexion, $respuestas );

		if ( $row4 = mysqli_fetch_array( $consultaEval ) ) {
			echo( "<div class='mx-auto img-fluid'><center>" );
			echo( "<img src='../profesor/" );
			echo( $row4[ 'Imagen' ] );
			echo( "' height='190px' width='auto' onerror='this.style.opacity=0'>" );
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

			echo( "<div class='input-group mb-3'><div class='input-group-prepend'><label class='input-group-text' for='inputGroupSelect01'>Respuesta</label></div><select class='custom-select' id='inputGroupSelect01' name='resp' required><option value='' selected>Eliger una opción...</option>" );
			while ( $row5 = mysqli_fetch_array( $consultaResp ) ) {
				echo( "<option value=" );
				echo( $row5[ 'Respuesta' ]);
				echo( ">" );
				echo( $row5[ 'Respuesta' ] );
				echo( "</option>" );
			}
		
			echo( "</select></div><div>".$alert."</div>" );

		} else {

			$calif = ( $aciertos / $npreg ) * 10;
			echo( "<center><h5>¡Felicidades!, Haz concluido la lección " . $unidad . " </h5>" );
			echo( "<i class='fas fa-grin-stars text-success fa-10x'></i> <p>Continúa realizando las actividades.</p></center>" );
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
	
	if ( $unidad >= 3 ) {
		$redir = 'examen.php';
	} else {
		$redir = 'contentvid.php';
	}
	$registrarcalif = "INSERT INTO avance (IdCurso, IdEstudiante, Unidad, Calificacion1) VALUES ('$idcurso', '$iduser', '$unidad', '$calif')";
	
	$insertcalif = mysqli_query( $conexion, $registrarcalif );
	if($insertcalif){
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
	
}
?>