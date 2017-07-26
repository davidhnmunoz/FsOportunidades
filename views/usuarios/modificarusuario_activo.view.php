


<?php include '../views/menu/menuusuarios_activos.view.php';?>

<script src="../assets/js/validar_usuario_modificar.js"></script>



<br>
<br>



<h1 align="center"><i class="editarcuenta fa fa-pencil-square-o fa-lg" aria-hidden="true">&nbsp;</i>Modificar Usuario</h1>


<hr>

<div class="offset-10 col-sm-1">
<a href="../php/index_usuarios.php" onclick="return confirm('¿Desea Cancelar?')" data-toggle="tooltip" data-placement="bottom" title="Cancelar"><i class="cancelform fa fa-times-circle-o fa-4x" aria-hidden="true"></i></i>
</a>
</div>
<form class="form-comtrol formagregar" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" name="form" >
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
<?php foreach ($res as $key): ?>

<div class="form-group row">
    <input type="hidden" required="" value="<?php echo $key->id; ?>"  type="text" name="id"  class="form-control" placeholder="id">

  <div class="col-sm-3">
  <label  for="inputEmail1"><strong>Usuario:</strong></label>
    <input required="" value="<?php echo $key->usuario; ?>" type="text" name="usuario" id="username" class="form-control" placeholder="usuario">
 <span id="Infousu">
                            </span>
                        </input>
  </div>


  <div class="col-sm-3">
  <label  for="inputEmail1"><strong>Fecha De Alta:</strong></label>
    <input required="" type="date"  name="fecha_alta" class="form-control" value="<?php echo $key->fecha_alta; ?>"  >
  </div>


<?php endforeach?>
  <div class="col-sm-3">

<?php
$conrol = $conexion->prepare("SELECT trol.id,trol.descripcion

FROM usuarios usu JOIN
roles rol ON usu.id=rol.usuario_id
JOIN tipos_roles trol ON rol.tiposroles_id=trol.id

WHERE usu.id=$id");
$conrol->execute();
$rconrol = $conrol->fetchAll(PDO::FETCH_OBJ);
?>
<!-- Nuevo Rol -->
  <?php $srol = $conexion->prepare("SELECT trol.id,trol.descripcion

FROM
tipos_roles trol");
$srol->execute();
$rsrol = $srol->fetchAll(PDO::FETCH_OBJ);
?>

<label  for="inputEmail1"><strong>Rol</strong></label>

<select required class="form-control" name="rol" id="rol">
<?php foreach ($rconrol as $conrol): ?>
  <option value="<?php echo $conrol->id ?>" >

<?php echo $conrol->descripcion ?></option>
  <?php endforeach;?>
<option value="">Elija Rol </option>
<?php foreach ($rsrol as $srol): ?>
<option value="<?php echo $srol->id ?>" >

<?php echo $srol->descripcion ?></option>

<?php endforeach;?>





</select>
  </div>

</div>
<!-- Errores id empieza -->
<div class="form-group row">
<?php if (!empty($errorid)): ?>
            <div class="col-sm-3 ">
                <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                    <?php echo $errorid ?>
                </div>
            </div>
            <?php endif;?>
        </div>
</div>
<div class="form-group row">
      <div class="offset-sm-5 col-sm-8">
        <input type="submit" class="btn btn-outline-warning" name="modificar" value="modificar Usuario">
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