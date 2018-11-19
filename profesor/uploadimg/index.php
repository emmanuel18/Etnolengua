<?php
$idcurso=$_POST['idcurso'];
$tipo=$_POST['tipo'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Cargar imágenes</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" type="image/png" href="../../images/favicon.png" alt="Etnolengua Favicon">
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link id="bootstrap-styleshhet" href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"/>
    <link href="css/style.min.css" rel="stylesheet" type="text/css"/>
    <script src="../vendor/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="js/modernizr.min.js"></script>
    <script src="js/uploadHBR.min.js"></script>
    <script>
        $(document).ready(function () {
            uploadHBR.init({
                "target": "#uploads",
				"mimes": ["image/jpg", "image/png", "image/bmp", "image/gif", "image/ief", "image/jpeg"],
 				"max": 6,
                "textNew": "Añadir",
                "textTitle": "Haga clic aquí o arrastre para subir una imagen",
                "textTitleRemove": "Haga clic aquí quitar la imagen"
            });
            $('#reset').click(function () {
                uploadHBR.reset('#uploads');
            });
        });
    </script>
</head>
<body>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12 text-center">
				
                <form role="form" action="upload.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <div class="col-md-12 col-lg-12 col-xs-12" id="columns">
                                <h3 class="form-label">Selecciona las imágenes</h3>
                                <div class="desc"><p class="text-center">o arrastra al cuadro</p></div>
                                <div id="uploads"><!-- Upload Content --></div>
                            </div>
							<input type="hidden" name="idcurso" value="<?php echo($idcurso); ?>">
							<input type="hidden" name="tipo" value="<?php echo($tipo); ?>">
                            <div class="clearfix"></div>
                            <button class="btn btn-danger btn-lg pull-left" id="reset" type="button" ><i class="fa fa-history"></i> Clear</button>
							
                            <button class="btn btn-primary btn-lg pull-right" type="submit" ><i class="fa fa-upload"></i> Upload </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
