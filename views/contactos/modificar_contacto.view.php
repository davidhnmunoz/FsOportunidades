<?php include '../views/menu/menucontactos_activo.view.php';?>

<br>
<br>


<h1 align="center"><i class="editarcuenta fa fa-pencil-square-o fa-lg" aria-hidden="true">&nbsp;</i>Modificar Contacto</h1>

<hr>

<div class="offset-10 col-sm-1">
<a href="../php/index_contactos.php" onclick="return confirm('¿Desea Cancelar?')" data-toggle="tooltip" data-placement="bottom" title="Cancelar"><i class="cancelform fa fa-times-circle-o fa-4x" aria-hidden="true"></i></i>
</a>
</div>
<form class="form-comtrol formagregar" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" name="form">
<?php foreach ($res as $key): ?>

<div class="form-group row">

 <input type="hidden"  value="<?php echo $key->id; ?>"  type="text" name="id" class="form-control test-input" placeholder="id">


  <div class="col-sm-4">
  <label  for="inputEmail1"><strong>Nombre :</strong></label>
    <input required="" value="<?php echo $key->nombre; ?>" type="text" name="nombre" class="form-control" placeholder="Nombre">
  </div>
  <div class="col-sm-4">
  <label  for="inputEmail1"><strong>Apellido:</strong></label>
    <input required="" value="<?php echo $key->apellido; ?>" type="text" name="apellido" class="form-control " placeholder="apellido">
  </div>
  <div class="col-sm-4">
  <label  for="inputEmail1"><strong>Email:</strong></label>
    <input required="" value="<?php echo $key->email; ?>" type="text" name="email" class="form-control" placeholder="email">
  </div>
</div>
<div class="form-group row">

  <div class="col-sm-4">
  <label  for="inputEmail1"><strong>Telefono:</strong></label>
    <input required="" value="<?php echo $key->telefono; ?>" type="text" name="telefono" class="form-control" placeholder="telefono">
    </div>
<?php endforeach?>
 <div class="col-sm-8">
<?php

$scuenta = $conexion->prepare("SELECT cue.id,cue.nombreempresa



FROM
cuentas cue");
$scuenta->execute();
$rscuenta = $scuenta->fetchAll(PDO::FETCH_OBJ);
?>


  <label  for="inputEmail1"><strong>Cuenta</strong></label>

<select required class="form-control" name="cuenta_id" id="cuenta_id">
<?php foreach ($res as $key): ?>
<option selected="selected"  value="<?php echo $key->cuenta_id ?>" ><?php echo $key->nombreempresa ?></option>
<?php endforeach;?>
<option value="0">Elija Cuenta</option>
<?php foreach ($rscuenta as $scuenta): ?>
<option value="<?php echo $scuenta->id ?>" >

<?php echo $scuenta->nombreempresa ?></option>

<?php endforeach;?>




</select>

 </div>
</div>




<hr>





<!-- Tablas Usuarios -->
<?php
$conusu = $conexion->prepare("SELECT con.usuario_id,con.id,usu.usuario


FROM  contactos con
JOIN usuarios usu ON con.usuario_id=usu.id




 WHERE con.id = $id");
$conusu->execute();

$rconusu = $conusu->fetchAll(PDO::FETCH_OBJ);
/*Nuevo usuario*/
$nuevousu = $conexion->prepare('SELECT id,usuario FROM usuarios

WHERE id>1');
$nuevousu->execute();

$rnuevousu = $nuevousu->fetchAll(PDO::FETCH_OBJ);

?>
<div class="form-group row">
  <div class="col-sm-4">
  <label  for="inputEmail1"><strong>Usuario del Sistema</strong></label>

<label  for="inputEmail1"><strong>Usuario</strong></label>
<select required  class="form-control chosen-select" id="usuario_id" name="usuario_id">
     <?php foreach ($rconusu as $conusu): ?>
<option selected="selected" value="<?php echo $conusu->usuario_id ?>"></a>

    <?php echo $conusu->usuario ?>
                </option>
                   <?php endforeach;?>

     <option value=""   >Seleccione usuario</option>
     <?php foreach ($rnuevousu as $nuevousu): ?>
                  <option value="<?php echo $nuevousu->id ?>"></a>

    <?php echo $nuevousu->usuario ?>
                </option>
                   <?php endforeach;?>
</select>
  </div>
</div>
<!-- Fin Tabla Usuarios -->





<div class="form-group row">
      <div class="offset-sm-5 col-sm-8">
        <input type="submit" class="btn btn-outline-warning" name="modificar" value="Modificar Contacto">
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