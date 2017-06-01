<?php
if (isset($_POST['enviar'])) {
    $robot    = $_POST['robot'];
    $rand     = $_POST['rand'];
    $aciertos = '';
    $errores  = '';
    $correcto = '';

    if ($robot == $rand) {
        $aciertos .= 'Codigo Correcto!';
        $aciertos .= '<meta http-equiv="refresh" content="2;url=login.php">';
        $correcto .= '<center><i class="fa fa-superpowers fa-pulse fa-3x fa-fw"></i>
<span class="sr-only">Loading...</span><br>
                  <span class="form-text text-success"><strong>Cargando</strong></span></center><br>';
    } else {
        $errores = '<strong>Codigo Incorrecto: </strong>Intentelo nuevamente ';
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<title>Robot</title>
</head>
<body>

<div class="conteiner">
		<div class="row">


	<form method="post" class="formrobot">
	<div class="form-group row">
	<div class="col-sm-12">
	<div class="alert alert-warning">
	<small class="form-text text-warning"><strong>Ha superado el limite de intestos:</strong> Ingrese el codigo y haga click en enviar</small>
	</div>
	<br>
	</div>
	<div class="col-sm-2 ">
	 <label class="col-sm-2 col-form-label"><strong>Codigo:</strong></label>
	</div>
	<div class="col-sm-2 ">

	 <label for="inputPassword" class="col-sm-2 col-form-label"><?php $ca = rand();
echo $ca;?></label>
</div>

	<div class="col-sm-4">
      <input type="number" class="form-control" name="robot" >
    </div>

		<input type="hidden" name="rand" value="<?php echo $ca; ?>">
		<div class="col-sm-1">
<a class="navbar-brand" href="robot.php">

		<i class="fa fa-refresh fa-lg"></i>
                        </a>
    </div>
	<div class="col-sm-1 ">
		<input class="btn btn-outline-success" name="enviar" type="submit" value="Enviar" >
    </div>
<?php if (!empty($aciertos)): ?>

</form>
<br>
<br>
<div class="col-sm-8 offset-2">
	<div class="alert alert-success role alert">
		<?php echo $aciertos ?>
	</div>
	<div class="col-sm-2 offset-4">


		<?php echo $correcto ?>
	</div>
		<?php endif;?>
</div>
	<?php if (!empty($errores)): ?>
<hr class="hr2">
<div class="col-sm-12">
	<div class="alert alert-danger robotalert" role="alert">

		<?php echo $errores ?>
		<?php endif;?>

		</div>
</div>
</div>
</div>
</body>
</html>
