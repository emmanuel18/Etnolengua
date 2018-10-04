<?php
$Target_dir='bdimagen/';
$Target_file=$Target_dir.basename($_FILES['foto'] ['name']);
$uploadid=1;
$imageFileType=strtolower(pathinfo($Target_file, PATHINFO_EXTENSION));
/*
if (isset($_POST ['submit'])) {
	# code...
	$check=getimagesize($_FILES['foto'] ['name']);
	if ($check!==false) {
		# code...
		echo "file isimg".$check['mime'].".";
	}else 
	{echo "nel".$check['mime'].".";}
}*/

if ($imageFileType!="jpg" && $imageFileType!="png" && $imageFileType!="gif" && $imageFileType!="jpeg" && $imageFileType!="JPG" && $imageFileType!="PNG" && $imageFileType!="GIF" && $imageFileType!="JPEG") {
	# code...
	echo '<script languaje="javascript">alert("El archivo no es una imagen");
			window.location.href="../registrousuario.html";
			</script>';
} else {
	if (move_uploaded_file($_FILES['foto'] ['tmp_name'], $Target_file)) {
		# code...
		echo "El archivo ".basename($_FILES['foto'] ['name'])."Se subio correctamente";
	} 
	else {
		echo "nel";
		print_r($_FILES);
	}
	
}

?>