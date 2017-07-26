<?php include '../views/menu/menuusuarios_activos.view.php';?>


<script src="../assets/js/validarpass.js"></script>


<br>
<br>



<h1 align="center"><i class="editarcuenta fa fa-key fa-lg" aria-hidden="true">&nbsp;</i>Modificar Contraseña</h1>


<hr>

<div class="offset-10 col-sm-1">
<a href="../php/index_usuarios.php" onclick="return confirm('¿Desea Cancelar?')" data-toggle="tooltip" data-placement="bottom" title="Cancelar"><i class="cancelform fa fa-times-circle-o fa-4x" aria-hidden="true"></i></i>
</a>
</div>
<form class="form-comtrol formagregar" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" name="form" onSubmit="return validarPass();">
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



<div class="col-sm-4 offset-4">
  <label  for="inputEmail1"><strong>Ingrese Nueva Contraseña:</strong></label>
    <input required="" type="password"  name="password" id="contra" class="form-control" placeholder="Contraseña">
      <span id="pass" ></span>
    </input>

  </div>


<input name="alta_pass" type="hidden"  value="<?php echo date('Y-m-d') ?>">
                        </input>

<?php endforeach?>
  <div class="col-sm-3">






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
      <div class="offset-sm-4 col-sm-8">
        <input type="submit" class="btn btn-outline-warning" name="modificar" value="Modificar Contraseña">
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