<?php include '../views/menu/menucuenta_activa.view.php';?>
<script>
  function ValidarIdCuenta(numero){
    if (!/^([0-9])*$/.test(numero))
      alert("El id de cuenta " + numero + " no es un número");
  }
</script>
<script>
  function ValidarIdDireccion(numero){
    if (!/^([0-9])*$/.test(numero))
      alert("El id de Direccion " + numero + " no es un número");
  }
</script>

<script>
  function ValidarCuit(numero){
    if (!/^([0-9])*$/.test(numero))
      alert("El Cuit " + numero + " no es un número");
  }
</script>

<script src="../assets/js/validar_id_cuenta.js"></script>
<script src="../assets/js/validar_cuit.js"></script>
<script src="../assets/js/validar_nombreempresa.js"></script>
<script src="../assets/js/validar_id_direccion.js"></script>

<hr>


<h1 align="center"><i class="agregar fa fa-user-plus fa-lg" aria-hidden="true">&nbsp;</i>Agregar Nueva Cuenta</h1>


<div class="col-sm-7 offset-2">

  <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" href="../php/index_cuenta.php">Cuentas Activas</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active bg-primary text-white" href="../php/agregar_cuenta.php">Agregar Cuenta</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../php/cuentas_inactivas.php">Cuentas inactivas</a>
  </li>
  </ul>
</div>
<br>
<div class="offset-10 col-sm-1">
<a href="../php/index_cuenta.php" onclick="return confirm('¿Desea Cancelar?')" data-toggle="tooltip" data-placement="bottom" title="Cancelar"><i class="cancelform fa fa-times-circle-o fa-4x" aria-hidden="true"></i></i>
</a>
</div>
<form class="form-comtrol formagregar" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" name="form">
<div class="form-group row">

 <div class="col-sm-10 offset-1">
 <?php if (!empty($enviado)): ?>
<div class="col-sm-8 offset-2">
            <div class="alert alert-success">
            <?php echo $enviado; ?>

            </div>
  <?php endif;?>
</div>
</div>
<div class="form-group row">
 <div class="col-sm-2">
  <label  for="inputEmail1"><strong>id:</strong></label>
    <input required="" type="text" name="id" id="idcuenta" class="form-control test-input" placeholder="id" onChange="ValidarIdCuenta(this.value)">
    <span id="Info">
                            </span>
                        </input>
  </div>

  <div class="col-sm-3">
  <label  for="inputEmail1"><strong>Cuit :</strong></label>
    <input pattern="\d{11}" title="El Cuit debe tener 11 digitos enteros ej: 30710316097" required="" type="text" name="cuit" id="cuitcuenta" class="form-control" placeholder="Cuit" onChange="ValidarCuit(this.value)">
    <span id="Infocuenta">
                            </span>
                        </input>

  </div>
  <div class="col-sm-3">
  <label  for="inputEmail1"><strong>Nombre:</strong></label>
    <input  required="" type="text" name="nombreempresa" id="nombrecuenta" class="form-control " placeholder="Nombre">
      <span id="Infonombre">
                            </span>
                        </input>
  </div>
  <div class="col-sm-4">
  <label  for="inputEmail1"><strong>Telefono:</strong></label>
    <input required="" type="text" name="telefono" class="form-control" placeholder="Telefono">
  </div>
</div>
<div class="form-group row">

<!-- Errores id empieza -->
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

<!-- Errores id termina  -->
<!-- Errores cuit empieza -->
<?php if (!empty($errorcuit)): ?>
            <div class="col-sm-4 offset-2">
                <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                    <?php echo $errorcuit ?>
                </div>
            </div>
            <?php endif;?>
        </div>

<!-- Errores cuit termina  -->

<!-- Errores Empresa Empieza -->

<?php if (!empty($errorempresa)): ?>
            <div class="col-sm-3 offset-5">
                <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                    <?php echo $errorempresa ?>
                </div>
            </div>
            <?php endif;?>
        </div>




<!-- Errores Empresa Termina -->

<div class="form-group row">
  <div class="col-sm-4">
  <label  for="inputEmail1"><strong>Sitio Web:</strong></label>
    <input required="" type="text" name="sitioweb" class="form-control" placeholder="Sitio Web">
  </div>
  <div class="col-sm-8">

  <label  for="inputEmail1"><strong>Descripcion:</strong></label>
   <textarea required="" class="form-control form-rounded" name="descripcion" rows="3" placeholder="Descripcion"></textarea>

  </div>
</div>


<!-- Empieza Direcciones -->
<hr>
<h2 align="center">Direccion</h2>
<hr>
<div class="form-group row">
 <div class="col-sm-2">
  <label  for="inputEmail1"><strong>id</strong></label>
    <input required="" type="text" name="direccion_id" id="direccion_id" class="form-control " placeholder="id" OnChange="ValidarIdDireccion(this.value)" >
    <span id="Infodir">
                            </span>
                        </input>
  </div>
  <div class="col-sm-3">
  <label  for="inputEmail1"><strong>Provincia:</strong></label>
   <select required  class="form-control chosen-select" name="provincia" id="provincia">
  <option value="0">Elija provincia</option>
</select>
  </div>
  <div class="col-sm-3">
  <label  for="inputEmail1"><strong>Departamento:</strong></label>
    <select required class="form-control chosen-select" name="departamento" id="departamento">
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


<!-- Tablas satelites -->
<!-- TIPO Origen -->
<?php $toricon = $conexion->prepare('SELECT  tori.id,tori.descripcion

FROM tipos_origenes tori');
$toricon->execute();

?>
<h2 align="center">Caracteristicas de la cuenta</h2>
<hr>
<div class="form-group row">
<div class="col-sm-4">
<label  for="inputEmail1"><strong>Origen:</strong></label>
<select required class="form-control chosen-select" id="tiorigen" name="tiorigen">

<option value=""  >Seleccione un origen</option>
<?php foreach ($toricon as $rtoricon): ?>
<option  value="<?php echo $rtoricon['id']; ?>"></a>

<?php echo $rtoricon['descripcion']; ?>
</option>
<?php endforeach;?>
</select>

</div>
<!-- FIN TIPO Origen -->
<!-- Tipo Propiedad -->
<?php $tprop = $conexion->prepare('SELECT tprop.id,tprop.descripcion

FROM tipos_propiedades tprop
');
$tprop->execute();

?>
<div class="col-sm-4">
<label  for="inputEmail1"><strong>Propiedad:</strong></label>
<select required  class="form-control chosen-select" id="tiprop" name="tiprop">

<option value=""   >Seleccione propiedad</option>
<?php foreach ($tprop as $rtprop): ?>
<option value="<?php echo $rtprop['id']; ?>"></a>

<?php echo $rtprop['descripcion']; ?>
</option>
<?php endforeach;?>
</select>
</div>

<!-- Fin tipo Propiedad -->
<!-- Tipo Organizacion -->
<?php $torga = $conexion->prepare('SELECT torga.id,torga.descripcion
FROM tipos_organizaciones torga
');
$torga->execute();

?>
<div class="col-sm-4">
<label  for="inputEmail1"><strong>Organizacion:</strong></label>
<select required  class="form-control chosen-select" id="tiorga" name="tiorga">

<option value=""  >Seleccione Organizacion</option>
<?php foreach ($torga as $rtorga): ?>
<option value="<?php echo $rtorga['id']; ?>"></a>

<?php echo $rtorga['descripcion']; ?>
</option>
<?php endforeach;?>
</select>
</div>
</div>
<!-- FIN Tipo Organizacion -->
<!-- Numero de empleados -->
<?php $tnemp = $conexion->prepare('SELECT tnemp.id, tnemp.descripcion

FROM tipos_numerosempleados tnemp
');
$tnemp->execute();

?>

<div class="form-group row">
<div class="col-sm-5">
<label  for="inputEmail1"><strong>N° Empleados:</strong></label>
<select required class="form-control chosen-select" id="tinemp" name="tinemp">

<option value=""   >Seleccione N° Empleados</option>
<?php foreach ($tnemp as $rtnemp): ?>
<option value="<?php echo $rtnemp['id']; ?>"></a>

<?php echo $rtnemp['descripcion']; ?>
</option>
<?php endforeach;?>
</select>

</div>
<!-- Fin Numero Empleados -->

<!-- Sectores -->
<?php $tsec = $conexion->prepare('SELECT tsec.id,tsec.descripcion

FROM tipos_sectores tsec
');
$tsec->execute();

?>
<div class="col-sm-5">
<label  for="inputEmail1"><strong>Sector:</strong></label>
<select required class="form-control chosen-select" id="tisec" name="tisec">

<option value=""  >Seleccione Sector</option>
<?php foreach ($tsec as $rtsec): ?>
<option value="<?php echo $rtsec['id']; ?>"></a>

<?php echo $rtsec['descripcion']; ?>
</option>
<?php endforeach;?>
</select>

</div>
<!-- Fin Sectores -->

</div>

<!-- Fin tablas Satelites -->


<div class="form-group row">

<div class="col-sm-4">
  <label  for="inputEmail1"><strong>Fecha De Alta:</strong></label>
    <input required="" type="date"  name="fecha_alta" class="form-control" value="<?php echo date("Y-m-d"); ?>" >
  </div>
</div>
<!-- Fin Tabla Usuarios -->





<div class="form-group row">
      <div class="offset-sm-5 col-sm-8">
        <input type="submit" class="btn btn-outline-success" name="agregar" value="Agregar Cuenta">
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