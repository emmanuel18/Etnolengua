<?php

if (empty($base = $_POST['base']))
    die("missing string base64");

function base64ToJpeg($base64_string) {
    $data = explode(';', $base64_string);
    $dataa = explode(',', $base64_string);
    $part = explode("/", $data[0]);
    if (empty($part))
        return false;
    $file = md5(uniqid(rand(), true)) . ".{$part[1]}";
    if (!is_dir(realpath(__DIR__) . "/uploads/"))
        mkdir(realpath(__DIR__) . "/uploads/");

    $ifp = fopen(realpath(__DIR__) . "/uploads/{$file}", 'wb');
    fwrite($ifp, base64_decode($dataa[1]));
    fclose($ifp);
	$name=$file;
	$idcurso=$_POST['idcurso'];
	$tipo=$_POST['tipo'];
	$insert="INSERT INTO archivo(IdCurso, Nombre, Tipo) values ('$idcurso', '$name', '$tipo')";
	$conexion = mysqli_connect("localhost", "etnoleng_emmanue", "estrada_18", "etnoleng_mixe");
	$Query=mysqli_query($conexion, $insert);
    return $file;
}

foreach ($base as $index => $base64) {
    if (!empty($base64) && !file_exists($finalFile = sprintf('%1$s/uploads/%2$s', realpath(__DIR__), base64ToJpeg($base64))))
        echo("Upload error {$finalFile} on index : {$index}");
}
echo '<script languaje="javascript">alert("Documentos cargados exitosamente");
				window.location.href="../Cursos.php";
			</script>'; 



