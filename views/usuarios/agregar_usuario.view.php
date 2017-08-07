

<?php include '../views/menu/menuusuarios_activos.view.php';?>
<script src="../assets/js/validarpass.js"></script>
<script src="../assets/js/validarusuario.js"></script>
<script src="../assets/js/validar_id_usuario.js"></script>

<script>
  function validarSiNumero(numero){
    if (!/^([0-9])*$/.test(numero))
      alert("El id de usuario " + numero + " no es un número");
  }
</script>

<hr>


<h1 align="center"><i class="agregar fa fa-user-plus fa-lg" aria-hidden="true">&nbsp;</i>Agregar Nuevo Usuario</h1>
<br>
<div class="col-sm-8 offset-2">

  <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link " href="../php/index_usuarios.php">
                                            Usuarios Activos
                                        </a>

  </li>
  <li class="nav-item">
    <a class="nav-link active bg-primary text-white" href="../php/agregar_usuario.php">
                                            Agregar Usuario
                                        </a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="../php/usuario_inactivo.php">
                                            Usuarios Inactivos
                                        </a>
  </li>
</div>
<br>



<div class="offset-10 col-sm-1">

<a href="../php/index_usuarios.php" onclick="return confirm('¿Desea Cancelar?')" data-toggle="tooltip" data-placement="bottom" title="Cancelar"><i class="cancelform fa fa-times-circle-o fa-4x" aria-hidden="true"></i></i>
</a>
</div>
<form class="form-comtrol formagregar" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" name="form" onSubmit="return validarPass();">
<div class="form-group row">
<div class="col-sm-8 offset-2">
 <?php if (!empty($enviado)): ?>
<div class="col-sm-8 offset-2">
            <div class="alert alert-success">
            <?php echo $enviado; ?>
            </div>
  <?php endif;?>
</div>
</div>
</div>
<div class="form-group row">
<div class="col-sm-2">
  <label  for="inputEmail1"><strong>Id:</strong></label>
    <input required="" type="text" name="id" id="usuario_id" class="form-control" placeholder="id" onChange="validarSiNumero(this.value)">
    <span id="Infoid">
                            </span>
                        </input>

  </div>
  <div class="col-sm-3">
  <label  for="inputEmail1"><strong>Usuario:</strong></label>
    <input required="" type="text" name="usuario" id="username" class="form-control" placeholder="usuario" >
<span id="Info">
                            </span>
                        </input>
  </div>

<div class="col-sm-4">

  <label  for="inputEmail1"><strong>Contraseña:</strong></label>
    <input required="" type="password" id="contra" name="password" class="form-control" placeholder="Contraseña">
    <span id="pass" ></span>
    </input>
  </div>

  <div class="col-sm-3">
  <label  for="inputEmail1"><strong>Fecha De Alta:</strong></label>
    <input required="" type="date"  name="fecha_alta" class="form-control" value="<?php echo date("Y-m-d"); ?>" >
  </div>
</div>
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


        <?php if (!empty($errorusuario)): ?>
            <div class="col-sm-4 offset-1">
                <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                    <?php echo $errorusuario ?>
                </div>
            </div>
            <?php endif;?>
    </div>


 <div class="form-group row">
  <div class="col-sm-3">

  <?php $srol = $conexion->prepare("SELECT trol.id,trol.descripcion

FROM
tipos_roles trol");
$srol->execute();
$rsrol = $srol->fetchAll(PDO::FETCH_OBJ);
?>
<!-- Errores id empieza -->

<label  for="inputEmail1"><strong>Rol</strong></label>

<select required class="form-control" name="rol" id="rol">

<option value="">Elija Rol </option>
<?php foreach ($rsrol as $srol): ?>
<option value="<?php echo $srol->id ?>" >

<?php echo $srol->descripcion ?></option>

<?php endforeach;?>





</select>
  </div>
</div>

<div class="form-group row">
      <div class="offset-sm-5 col-sm-8">
        <input type="submit" class="btn btn-outline-success" name="agregar" value="Agregar Usuario">
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