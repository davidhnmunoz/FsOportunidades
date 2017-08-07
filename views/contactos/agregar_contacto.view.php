<?php include '../views/menu/menucontactos_activo.view.php';?>

<hr>

<h1 align="center"><i class="agregar fa fa-user-plus fa-lg" aria-hidden="true">&nbsp;</i>Agregar Nuevo Contacto</h1>


<div class="col-sm-7 offset-2">

  <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" href="../php/index_contactos.php">
                                    Contacto Activos
                                </a>


  </li>
  <li class="nav-item">
    <a class="nav-link active bg-primary text-white" href="../php/agregar_contacto.php">Agregar contacto</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="../php/contactos_inactivos.php">
                                    Contacto Inactivos</a>
  </li>
</div>
<br>

<div class="offset-10 col-sm-1">
<a href="../php/index_contactos.php" onclick="return confirm('¿Desea Cancelar?')" data-toggle="tooltip" data-placement="bottom" title="Cancelar"><i class="cancelform fa fa-times-circle-o fa-4x" aria-hidden="true"></i></i>
</a>
</div>
<form class="form-comtrol formagregar" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" name="form">
<div class="form-group row">
<div class="col-sm-12">
 <?php if (!empty($enviado)): ?>
<div class="col-sm-8 offset-2">
            <div class="alert alert-success">
            <?php echo $enviado; ?>
            </div>
  <?php endif;?>
</div>
</div>
<div class="form-group row">

  <div class="col-sm-4">
  <label  for="inputEmail1"><strong>Nombre :</strong></label>
    <input required="" type="text" name="nombre" class="form-control" placeholder="Nombre">
  </div>
  <div class="col-sm-4">
  <label  for="inputEmail1"><strong>Apellido:</strong></label>
    <input required="" type="text" name="apellido" class="form-control " placeholder="apellido">
  </div>
  <div class="col-sm-4">
  <label  for="inputEmail1"><strong>Email:</strong></label>
    <input required="" type="email" name="email" class="form-control" placeholder="email">
  </div>
</div>
<div class="form-group row">

  <div class="col-sm-4">
  <label  for="inputEmail1"><strong>Telefono:</strong></label>
    <input required="" type="text" name="telefono" class="form-control" placeholder="telefono">
    </div>

 <div class="col-sm-8">
<?php

$scuenta = $conexion->prepare("SELECT cue.id,cue.nombreempresa



FROM
cuentas cue");
$scuenta->execute();
$rscuenta = $scuenta->fetchAll(PDO::FETCH_OBJ);
?>


  <label  for="inputEmail1"><strong>Cuenta</strong></label>

<select required="" class="form-control" name="cuenta_id" id="cuenta_id">

<option value="">Elija Cuenta</option>
<?php foreach ($rscuenta as $scuenta): ?>
<option value="<?php echo $scuenta->id ?>" >

<?php echo $scuenta->nombreempresa ?></option>

<?php endforeach;?>




</select>

 </div>
</div>




<hr>











<div class="form-group row">
      <div class="offset-sm-5 col-sm-8">
        <input type="submit" class="btn btn-outline-success" name="agregar" value="Agregar Contacto">
      </div>
  </div>


</form>


            <?php if (!empty($enviar)): ?>
            <div class="enviar bg-success">
                <?php echo $enviar; ?>
            </div>

            <?php endif;?>
            </div>



<hr>

</body>
</html>

<?php include '../views/menu/footer.view.php';?>