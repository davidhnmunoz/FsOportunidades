<?php require '../views/menu/menuprincipal.view.php';?>

<br>
<br>
<h1 align="center"><i class="editarcuenta fa fa-pencil-square-o fa-lg" aria-hidden="true">&nbsp;</i>Modificar Cuenta</h1>

<hr>


<form class="form-comtrol formagregar" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" name="form">

  <?php foreach ($scuentas as $rscuentas): ?>
<div class="form-group row">

    <input type="hidden" value="<?php echo $rscuentas['id']; ?>"  type="text" name="id" class="form-control test-input" placeholder="id">

  <div class="col-sm-3">
  <label  for="inputEmail1"><strong>Cuit :</strong></label>
    <input required="" type="text" name="cuit" class="form-control" value="<?php echo $rscuentas['cuit']; ?>" >
  </div>
  <div class="col-sm-5">
  <label  for="inputEmail1"><strong>Nombre:</strong></label>
    <input required="" type="text" name="nombreempresa" class="form-control" value="<?php echo $rscuentas['nombreempresa']; ?>" >
  </div>
  <div class="col-sm-4">
  <label  for="inputEmail1"><strong>Telefono:</strong></label>
    <input type="text" name="telefono" class="form-control" value="<?php echo $rscuentas['telefono']; ?>" >
  </div>
</div>




<div class="form-group row">
  <div class="col-sm-4">
  <label  for="inputEmail1"><strong>Fax:</strong></label>
    <input type="text" name="fax" class="form-control" value="<?php echo $rscuentas['fax']; ?>"  >
  </div>
  <div class="col-sm-4">
  <label  for="inputEmail1"><strong>Sitio Web:</strong></label>
    <input type="text" name="sitioweb" class="form-control" value="<?php echo $rscuentas['sitioweb']; ?>">
  </div>
  <div class="col-sm-4">
  <label  for="inputEmail1"><strong>Descripcion:</strong></label>
    <input type="text" name="descripcion" class="form-control" value="<?php echo $rscuentas['descripcion']; ?>">
  </div>
</div>

<?php endforeach;?>
<!-- Empieza Direcciones -->
<hr>
 <?php foreach ($sdirecciones as $rsdirecciones): ?>
<h2 align="center">Direccion</h2>
<hr>
<div class="form-group row">

    <input type="hidden" type="text"  name="direccion_id" class="form-control" value="<?php echo $rsdirecciones['id']; ?>">

  <div class="col-sm-4">
  <label  for="inputEmail1"><strong>Provincia:</strong></label>
   <select class="form-control chosen-select" name="provincia" id="provincia">
  <option >Elija provincia</option>
</select>
  </div>
  <div class="col-sm-4">
  <label  for="inputEmail1"><strong>Departamento:</strong></label>
    <select class="form-control chosen-select" name="departamento" id="departamento">
  <option value="0">Elija Departamento</option>
</select>
  </div>
  <div class="col-sm-4">
  <label  for="inputEmail1"><strong>Localidad:</strong></label>
  <select class="form-control chosen-select" name="localidad" id="localidad">
  <option value="0">Elija localidad</option>
</select>
  </div>
</div>

<div class="form-group row">
<div class="col-sm-8">
 <label  for="inputEmail1"><strong>Direccion y Cod Postal:</strong></label>
    <input value="<?php echo $rsdirecciones['CodPostal']; ?>" type="text" name="direccion" class="form-control " placeholder="Direccion y Cod Postal">
  </div>

</div>

<?php endforeach;?>
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
<select class="form-control chosen-select" id="tiorigen" name="tiorigen">

<option value=""  required="" >Seleccione un origen</option>
<?php foreach ($toricon as $rtoricon): ?>
<option value="<?php echo $rtoricon['id']; ?>"></a>

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
<select class="form-control chosen-select" id="tiprop" name="tiprop">

<option value=""  required="" >Seleccione propiedad</option>
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
<select class="form-control chosen-select" id="tiorga" name="tiorga">

<option value=""  required="" >Seleccione Organizacion</option>
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
<select class="form-control chosen-select" id="tinemp" name="tinemp">

<option value=""  required="" >Seleccione N° Empleados</option>
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
<select class="form-control chosen-select" id="tisec" name="tisec">

<option value=""  required="" >Seleccione Sector</option>
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


<!-- Tablas Usuarios -->
<?php
$conusu = $conexion->prepare('SELECT id,usuario FROM usuarios

WHERE id>1');
$conusu->execute();

?>
<div class="form-group row">
  <div class="col-sm-4">
  <label  for="inputEmail1"><strong>Usuario del Sistema</strong></label>

<label  for="inputEmail1"><strong>Usuario</strong></label>
<select required="" class="form-control chosen-select" id="usuario_id" name="usuario_id">


     <option value=""  required="" >Seleccione usuario</option>
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
        <input type="submit" class="btn btn-outline-warning" name="editar" value="Editar Cuenta">
      </div>
  </div>
  <?php if (!empty($enviado)): ?>
<div class="col-sm-8 offset-2">
            <div class="alert alert-success">
            <?php echo $enviado; ?>
            </div>
  <?php endif;?>
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






























<?php require '../views/menu/footer.view.php';?>