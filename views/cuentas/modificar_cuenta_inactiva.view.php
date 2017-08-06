

<?php require '../views/menu/menucuenta_inactiva.view.php';?>
<script>
  function validarSiNumero(numero){
    if (!/^([0-9])*$/.test(numero))
      alert("El CUIT " + numero + " solo debe contener numeros");
  }
</script>

<script src="../assets/js/validar_cuit_cuenta_modificar.js"></script>
<br>
<br>

<h1 align="center"><i class="editarcuenta fa fa-pencil-square-o fa-lg" aria-hidden="true">&nbsp;</i>Modificar Cuenta</h1>



<hr>
<div class="offset-10 col-sm-1">
<a href="../php/index_cuenta.php" onclick="return confirm('¿Desea Cancelar?')" data-toggle="tooltip" data-placement="bottom" title="Cancelar"><i class="cancelform fa fa-times-circle-o fa-4x" aria-hidden="true"></i></i>
</a>
</div>


<form class="form-comtrol formod" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" name="form"


  >
<!-- Basico De Cuenta -->


<div class="form-group row">


<?php foreach ($res as $key): ?>


    <input type="hidden" value="<?php echo $key->id; ?>"  type="text" name="id" class="form-control test-input" placeholder="id">


  <div class="col-sm-3">
  <label  for="inputEmail1"><strong>Cuit :</strong></label>
    <input pattern="\d{11}"  required required type="text" id="cuitcuenta" name="cuit" class="form-control" title="El Cuit debe tener 11 digitos enteros ej: 30710316097" value="<?php echo $key->cuit ?>" onChange="validarSiNumero(this.value)"  >
    <span id="Infocuenta">
                            </span>
                        </input>
  </div>
  <div class="col-sm-5">
  <label  for="inputEmail1"><strong>Nombre:</strong></label>
    <input required="" type="text" name="nombreempresa" class="form-control" value="<?php echo $key->nombreempresa ?>" >
  </div>
  <div class="col-sm-4">
  <label  for="inputEmail1"><strong>Telefono:</strong></label>
    <input type="text" name="telefono" class="form-control" value="<?php echo $key->telefono ?>" >
  </div>
</div>
<div class="form-group row">

  <div class="col-sm-4">
  <label  for="inputEmail1"><strong>Sitio Web:</strong></label>
    <input type="text" name="sitioweb" class="form-control" value="<?php echo $key->sitioweb ?>">
  </div>
   <div class="col-sm-8">
  <label  for="inputEmail1"><strong>Descripcion:</strong></label>
  <textarea required=""  class="form-control form-rounded" name="descripcion" rows="3" >
    <?php echo $key->descripcion ?>
  </textarea>

  </div>
</div>


<?php endforeach?>
<!-- Fin Basico Cuentas -->
<!--   Saco todos los datos de la direccion -->

<?php

$siddirecprov = $conexion->prepare("SELECT dir.id  ,dir.CodPostal as 'direccion',prov.id as 'provid', prov.nombre as 'provnombre'

FROM provincias prov JOIN
direcciones dir ON dir.provincia_id=prov.id JOIN
cuentas cue ON cue.direccion_id=dir.id
WHERE   cue.id= $id");
$siddirecprov->execute();
$rsiddirecprov = $siddirecprov->fetchAll(PDO::FETCH_OBJ);
?>

<!-- Empieza Direcciones -->

<?php foreach ($rsiddirecprov as $siddirecprov): ?>
  <div  class="bg-inverse text-white">
<h2 align="center">Direccion</h2>
</div>

<div class="form-group row">

<input type="hidden"  name="direccion_id" class="form-control" value="<?php echo $siddirecprov->id ?>">
</div>

<div class="form-group row">

<div class="col-sm-12">
<label  for="inputEmail1"><strong>Direccion y Cod Postal:</strong></label>
<input type="text" name="direccion"  class="form-control" placeholder="Direccion y Cod Postal" value="<?php echo $siddirecprov->direccion ?>">

</div>

</div>

<?php endforeach;?>
<!-- Empieza Provincia -->
<!-- Provincia Selecionada -->
<?php
$queryselected = $conexion->prepare("SELECT dir.id as 'dirid' ,prov.id as 'provid', prov.nombre as 'provnombre'

FROM provincias prov JOIN
direcciones dir ON dir.provincia_id=prov.id JOIN
cuentas cue ON cue.direccion_id=dir.id
WHERE   cue.id= $id");
$queryselected->execute();
$rqueryselected = $queryselected->fetchAll(PDO::FETCH_OBJ);

$nuevaprovincia = $conexion->prepare("SELECT prov.id as 'provid', prov.nombre as 'provnombre'

FROM provincias prov ");
$nuevaprovincia->execute();
$rnuevaprovincia = $nuevaprovincia->fetchAll(PDO::FETCH_OBJ);

foreach ($rqueryselected as $queryselected): ?>

<div class="form-group row">
<div class="col-sm-4">

<label  for="inputEmail1"><strong>Provincia:</strong></label>

<select class="form-control" name="provincia" id="provincia">

<option selected="selected" value="<?php echo $queryselected->provid ?>" >

<?php echo $queryselected->provnombre ?></option>

<?php endforeach;?>
<option value="0">Elija provincia</option>


<?php foreach ($rnuevaprovincia as $nuevaprovincia): ?>
<option value="<?php echo $nuevaprovincia->provid ?>" >

<?php echo $nuevaprovincia->provnombre ?></option>

<?php endforeach;?>


</select>

</div>

<!-- Empieza Departamentos -->
<?php
$depselected = $conexion->prepare("SELECT   dir.departamento_id,dep.nombre

FROM provincias prov
JOIN departamentos dep ON prov.id=dep.provincia_id
JOIN direcciones dir ON dir.provincia_id=prov.id
JOIN cuentas cue ON cue.direccion_id=dir.id
WHERE cue.id=$id and dir.departamento_id=dep.id");
$depselected->execute();
$rdepselected = $depselected->fetchAll(PDO::FETCH_OBJ);

foreach ($rdepselected as $depselected): ?>

<div class="col-sm-4">

<label  for="inputEmail1"><strong>Departamento:</strong></label>
<select class="form-control " name="departamento" id="departamento">
<option selected="selected" value="<?php echo $depselected->departamento_id ?>" >

<?php echo $depselected->nombre ?></option>

<?php endforeach;?>

<option value="0">Elija Departamento</option>
</select>
</div>
<!-- Empieza Localidad -->

<?php

$locselect = $conexion->prepare("SELECT   dir.localidad_id,loc.nombre

FROM provincias prov
JOIN departamentos dep ON prov.id=dep.provincia_id
JOIN localidades loc ON dep.id=loc.departamento_id
JOIN direcciones dir ON dir.provincia_id=prov.id
JOIN cuentas cue ON cue.direccion_id=dir.id
WHERE cue.id=$id and dir.localidad_id=loc.id");
$locselect->execute();
$rlocselect = $locselect->fetchAll(PDO::FETCH_OBJ);
foreach ($rlocselect as $locselect): ?>


<div class="col-sm-4">
<label  for="inputEmail1"><strong>Localidad:</strong></label>
<select class="form-control" name="localidad" id="localidad">
<option selected="selected" value="<?php echo $locselect->localidad_id ?>" >

<?php echo $locselect->nombre ?></option>

<?php endforeach;?>

<option value="0">Elija localidad</option>
</select>
</div>
</div>

</div>




<!-- Termina Direcciones -->

<!-- Tablas satelites -->
<!-- TIPO Origen -->
<!-- SELECCIONADO -->

<?php
$toriedit = $conexion->prepare("SELECT  tori.id,tori.descripcion

FROM tipos_origenes tori
JOIN origenes ori ON tori.id=ori.tipoorigen_id
JOIN cuentas cue ON ori.cuenta_id=cue.id

WHERE cue.id=$id");
$toriedit->execute();
$rtoriedit = $toriedit->fetchAll(PDO::FETCH_OBJ);
/* Consulta nueva*/
$toricon = $conexion->prepare("SELECT  tori.id,tori.descripcion

FROM tipos_origenes tori");
$toricon->execute();

$rtoricon = $toricon->fetchAll(PDO::FETCH_OBJ);

?>
<!-- Fin consulta seleccionado -->

<!-- fin consulta seleccion nueva -->

<!-- SELECCION Nueva -->
 <div  class="bg-inverse text-white">
<h2 align="center">Caracteristicas de la cuenta</h2>
</div>
<div class="form-group row">
<div class="col-sm-4">
<label  for="inputEmail1"><strong>Origen:</strong></label>
<select required class="form-control" id="tiorigen" name="tiorigen">

<option value=""  >Seleccione un origen</option>
<?php foreach ($rtoriedit as $toriedit): ?>

<option selected="selected" value="<?php echo $toriedit->id; ?>" ></a>

<?php echo $toriedit->descripcion; ?>

<?php endforeach;?>
</option>

<?php foreach ($rtoricon as $toricon): ?>
<option value="<?php echo $toricon->id ?>"></a>

<?php echo $toricon->descripcion ?>
</option>
<?php endforeach;?>
</select>

</div>
<!-- FIN TIPO Origen -->
<!-- Tipo Propiedad -->
<?php
$tpropedit = $conexion->prepare("SELECT tprop.id,tprop.descripcion

FROM tipos_propiedades tprop
JOIN propiedades prop ON prop.tipopropiedad_id=tprop.id
JOIN cuentas cue ON prop.cuenta_id=cue.id

WHERE cue.id=$id");

$tpropedit->execute();
$rtpropedit = $tpropedit->fetchAll(PDO::FETCH_OBJ);

?>

<?php $tprop = $conexion->prepare('SELECT tprop.id,tprop.descripcion

FROM tipos_propiedades tprop
');
$tprop->execute();
$rtprop = $tprop->fetchAll(PDO::FETCH_OBJ);
?>
<div class="col-sm-4">
<label  for="inputEmail1"><strong>Propiedad:</strong></label>
<select class="form-control" id="tiprop" name="tiprop">

<option value=""  required="" >Seleccione propiedad</option>

<?php foreach ($rtpropedit as $tpropedit): ?>

<option selected="selected" value="<?php echo $tpropedit->id ?>" ></a>

<?php echo $tpropedit->descripcion ?>
<?php endforeach;?>
</option>

<?php foreach ($rtprop as $tprop): ?>
<option value="<?php echo $tprop->id ?>"></a>

<?php echo $tprop->descripcion ?>
</option>
<?php endforeach;?>
</select>
</div>

<!-- Fin tipo Propiedad -->
<!-- Tipo Organizacion -->
<?php

$torgaedit = $conexion->prepare("

SELECT torga.id,torga.descripcion
FROM tipos_organizaciones torga
JOIN organizaciones org ON org.tipoorganizacion_id=torga.id
JOIN cuentas cue ON org.cuenta_id=cue.id
WHERE cue.id=$id
");

$torgaedit->execute();
$rtorgaedit = $torgaedit->fetchAll(PDO::FETCH_OBJ);
?>

<?php $torga = $conexion->prepare('SELECT torga.id,torga.descripcion
FROM tipos_organizaciones torga
');
$torga->execute();
$rtorga = $torga->fetchAll(PDO::FETCH_OBJ);

?>
<div class="col-sm-4">
<label  for="inputEmail1"><strong>Organizacion:</strong></label>
<select class="form-control" id="tiorga" name="tiorga">

<option value=""  required="" >Seleccione Organizacion</option>

<?php foreach ($rtorgaedit as $torgaedit): ?>

<option selected="selected" value="<?php echo $torgaedit->id ?>" ></a>

<?php echo $torgaedit->descripcion ?>
<?php endforeach;?>
</option>

<?php foreach ($rtorga as $torga): ?>
<option value="<?php echo $torga->id ?>"></a>

<?php echo $torga->descripcion ?>
</option>
<?php endforeach;?>
</select>
</div>
</div>
<!-- FIN Tipo Organizacion -->
<!-- Numero de empleados -->

<?php
$tnempedit = $conexion->prepare("SELECT tnemp.id, tnemp.descripcion

FROM tipos_numerosempleados tnemp
JOIN numeroempleados nemp ON tnemp.id=nemp.tiponumeroempleados_id
JOIN cuentas cue ON nemp.cuenta_id=cue.id

WHERE cue.id=$id");
$tnempedit->execute();
$rtnempedit = $tnempedit->fetchAll(PDO::FETCH_OBJ);
?>

<?php $tnemp = $conexion->prepare('SELECT tnemp.id, tnemp.descripcion

FROM tipos_numerosempleados tnemp
');
$tnemp->execute();
$rtnemp = $tnemp->fetchAll(PDO::FETCH_OBJ);
?>

<div class="form-group row">
<div class="col-sm-5">
<label  for="inputEmail1"><strong>N° Empleados:</strong></label>
<select class="form-control" id="tinemp" name="tinemp">

<option value=""  required="" >Seleccione N° Empleados</option>

<?php foreach ($rtnempedit as $tnempedit): ?>

<option selected="selected" value="<?php echo $tnempedit->id ?>" ></a>

<?php echo $tnempedit->descripcion ?>
<?php endforeach;?>
</option>

<?php foreach ($rtnemp as $tnemp): ?>
<option value="<?php echo $tnemp->id ?>"></a>

<?php echo $tnemp->descripcion ?>
</option>
<?php endforeach;?>
</select>

</div>
<!-- Fin Numero Empleados -->

<!-- Sectores -->
<?php

$tsecedit = $conexion->prepare("SELECT tsec.id,tsec.descripcion

FROM tipos_sectores tsec JOIN
sectores sec ON tsec.id=sec.tiposector_id JOIN
cuentas cue ON sec.cuenta_id=cue.id

WHERE cue.id=$id");

$tsecedit->execute();
$rtsecedit = $tsecedit->fetchAll(PDO::FETCH_OBJ);
?>

<?php $tsec = $conexion->prepare('SELECT tsec.id,tsec.descripcion

FROM tipos_sectores tsec
');
$tsec->execute();
$rtsec = $tsec->fetchAll(PDO::FETCH_OBJ);
?>
<div class="col-sm-5">
<label  for="inputEmail1"><strong>Sector:</strong></label>
<select class="form-control" id="tisec" name="tisec">

<option value=""  required="" >Seleccione Sector</option>
<?php foreach ($rtsecedit as $tsecedit): ?>
<option selected="selected"  value="<?php echo $tsecedit->id ?>"></a>

<?php echo $tsecedit->descripcion ?>
</option>
<?php endforeach;?>

<?php foreach ($rtsec as $tsec): ?>
<option value="<?php echo $tsec->id ?>"></a>

<?php echo $tsec->descripcion ?>
</option>
<?php endforeach;?>
</select>

</div>
<!-- Fin Sectores -->

</div>

<!-- Fin tablas Satelites -->





<div class="form-group row">






<?php foreach ($res as $key): ?>
<div class="col-sm-3">
  <label  for="inputEmail1"><strong>Fecha De Alta:</strong></label>
    <input required="" type="date"  name="fecha_alta" class="form-control" value="<?php echo $key->fecha_alta; ?>"  >
  </div>
  <div class="col-sm-3">
  <label  for="inputEmail1"><strong>Fecha De baja:</strong></label>
    <input required="" type="date"  name="fecha_baja" class="form-control" value="<?php echo $key->fecha_baja; ?>"  >
  </div>
    <?php endforeach;?>
</div>
<!-- Fin Tabla Usuarios -->



<br>

<div class="form-group row">
      <div class="offset-sm-4 col-sm-8">

        <input type="submit"  class="btn btn-outline-warning" id="modificar" name="modificar" value="Modificar Cuenta">
      </div>
  </div>

</form>


</body>
</html>





<?php require '../views/menu/footer.view.php';?>


 <script src="../assets/js/function-editar-direccion.js"></script>