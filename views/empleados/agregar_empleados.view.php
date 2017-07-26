
<?php include '../views/menu/menuempleado_activo.view.php';?>
<script>
  function validarSiNumero(numero){
    if (!/^([0-9])*$/.test(numero))
      alert("El id de direccion " + numero + " no es un número");
  }
</script>
<script src="../assets/js/validar_id_direccion.js"></script>

<br>
<br>


<h1 align="center"><i class="agregar fa fa-user-plus fa-lg" aria-hidden="true">&nbsp;</i>Agregar Nuevo Empleado</h1>

<hr>

<div class="offset-10 col-sm-1">
<a href="../php/index_empleados.php" onclick="return confirm('¿Desea Cancelar?')" data-toggle="tooltip" data-placement="bottom" title="Cancelar"><i class="cancelform fa fa-times-circle-o fa-4x" aria-hidden="true"></i></i>
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

  <div class="col-sm-3">
  <label  for="inputEmail1"><strong>Nombre:</strong></label>
    <input required="" type="text" name="nombre" class="form-control " placeholder="Nombre">
  </div>
  <div class="col-sm-3">
  <label  for="inputEmail1"><strong>Apellido :</strong></label>
    <input required="" type="text" name="apellido" class="form-control" placeholder="apellido">
  </div>
  <div class="col-sm-2">
  <label  for="inputEmail1"><strong>Cargo:</strong></label>
    <input required="" type="text" name="cargo" class="form-control" placeholder="cargo">
  </div>
  <div class="col-sm-2">
  <label  for="inputEmail1"><strong>Formacion:</strong></label>
    <input required="" type="text" name="notas" class="form-control" placeholder="formacion">
  </div>
</div>


<div class="form-group row">
  <div class="col-sm-3">
  <label  for="inputEmail1"><strong>Nacimiento:</strong></label>
    <input required="" type="date" name="fechanacimiento" class="form-control" placeholder="fechanacimiento">
  </div>
  <div class="col-sm-3">
  <label  for="inputEmail1"><strong>Telmovil:</strong></label>
    <input required="" type="text" name="telmovil" class="form-control" placeholder="telmovil">
  </div>
  <div class="col-sm-2">
  <label  for="inputEmail1"><strong>Interno:</strong></label>
    <input required="" type="text" name="interno" class="form-control" placeholder="interno">
  </div>



<?php
$conjefe = $conexion->prepare('SELECT  jef.id,jef.empleado_id,emp.nombre,emp.apellido

FROM empleados emp JOIN jefes jef ON emp.id=jef.empleado_id



WHERE emp.id=jef.empleado_id ');
$conjefe->execute();

?>
  <div class="col-sm-3">
  <label  for="inputEmail1"><strong>Jefe:</strong></label>


<select required  class="form-control chosen-select" id="jefe_id" name="jefe_id">


     <option value=""   >Seleccione jefe</option>
     <?php foreach ($conjefe as $rconjefe): ?>
                  <option value="<?php echo $rconjefe['id']; ?>"></a>

    <?php echo $rconjefe['nombre']; ?>
    <?php echo $rconjefe['apellido']; ?>
                </option>
                   <?php endforeach;?>
</select>
  </div>
</div>




</div>


<!-- Empieza Direcciones -->
<hr>
<h2 align="center">Direccion</h2>

<hr>
<div class="form-group row">
 <div class="col-sm-2">
  <label  for="inputEmail1"><strong>id</strong></label>
    <input required="" type="text" name="direccion_id" class="form-control " id="direccion_id" placeholder="id" onChange="validarSiNumero(this.value)">
     <span id="Infodir">
                            </span>
                        </input>
  </div>
  <div class="col-sm-3">
  <label  for="inputEmail1"><strong>Provincia:</strong></label>
   <select required=""  class="form-control chosen-select" name="provincia" id="provincia">
  <option value="0">Elija provincia</option>
</select>
  </div>
  <div class="col-sm-3">
  <label  for="inputEmail1"><strong>Departamento:</strong></label>
    <select required="" class="form-control chosen-select" name="departamento" id="departamento">
  <option value="0">Elija Departamento</option>
</select>
  </div>
  <div class="col-sm-4">
  <label  for="inputEmail1"><strong>Localidad:</strong></label>
  <select required  class="form-control chosen-select" name="localidad" id="localidad">
  <option value="0">Elija localidad</option>
</select>
  </div>
</div>
<!-- Errores ciudad_id   -->
<div class="form-group row">
<?php if (!empty($errorid_c)): ?>
            <div class="col-sm-4 ">
                <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                    <?php echo $errorid_c ?>
                </div>
            </div>
            <?php endif;?>
  </div>
<!-- Errores ciudad_id termina  -->

<div class="form-group row">
<div class="col-sm-8">
 <label  for="inputEmail1"><strong>Direccion y Cod Postal:</strong></label>
    <input required="" type="text" name="direccion" class="form-control " placeholder="Direccion y Cod Postal">
  </div>

</div>


<hr>
<!-- Termina Direcciones -->




<!-- Tablas Usuarios -->
<?php
$conusu = $conexion->prepare('SELECT id,usuario FROM usuarios

WHERE id>1');
$conusu->execute();

?>
<div class="form-group row">
  <div class="col-sm-4">
  <label  for="inputEmail1"><strong>Usuario Asignado:</strong></label>


<select required  class="form-control chosen-select" id="usuario_id" name="usuario_id">


     <option value=""   >Seleccione usuario</option>
     <?php foreach ($conusu as $rconusu): ?>
                  <option value="<?php echo $rconusu['id']; ?>"></a>

    <?php echo $rconusu['usuario']; ?>
                </option>
                   <?php endforeach;?>
</select>
  </div>
</div>
<!-- Fin Tabla Usuarios -->





<div class="form-group row">
      <div class="offset-sm-5 col-sm-8">
        <input type="submit" class="btn btn-outline-success" name="agregar" value="Agregar Empleado">
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
<script src="../assets/js/functions.js"></script>