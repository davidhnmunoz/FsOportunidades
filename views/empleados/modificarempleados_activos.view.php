
<?php require '../views/menu/menuempleado_activo.view.php';?>


<br>
<br>

<h1 align="center"><i class="editarcuenta fa fa-pencil-square-o fa-lg" aria-hidden="true">&nbsp;</i>Modificar empleado</h1>


  <div class="offset-10 col-sm-1">
<a href="../php/index_empleados.php" onclick="return confirm('¿Desea Cancelar?')" data-toggle="tooltip" data-placement="bottom" title="Cancelar"><i class="cancelform fa fa-times-circle-o fa-4x" aria-hidden="true"></i></i>
</a>
</div>
<form class="form-comtrol formagregar" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" name="form">

<?php foreach ($res as $key): ?>
<div class="form-group row">
<input type="hidden" value="<?php echo $key->id; ?>"  type="text" name="id" class="form-control test-input" placeholder="id">
  <div class="col-sm-3">
  <label  for="inputEmail1"><strong>Nombre:</strong></label>
    <input required="" type="text" name="nombre" class="form-control " placeholder="Nombre" value="<?php echo $key->nombre ?>">
  </div>
  <div class="col-sm-3">
  <label  for="inputEmail1"><strong>Apellido :</strong></label>
    <input required="" type="text" name="apellido" class="form-control" placeholder="apellido" value="<?php echo $key->apellido ?>">
  </div>
  <div class="col-sm-2">
  <label  for="inputEmail1"><strong>Cargo:</strong></label>
    <input required="" type="text" name="cargo" class="form-control" placeholder="cargo" value="<?php echo $key->cargo ?>">
  </div>
  <div class="col-sm-2">
  <label  for="inputEmail1"><strong>Formacion:</strong></label>
    <input required="" type="text" name="notas" class="form-control" placeholder="formacion" value="<?php echo $key->notas ?>" >
  </div>
</div>


<div class="form-group row">
  <div class="col-sm-3">
  <label  for="inputEmail1"><strong>Nacimiento:</strong></label>
    <input required="" type="date" name="fechanacimiento" class="form-control" placeholder="fechanacimiento" value="<?php echo $key->fechanacimiento ?>">
  </div>
  <div class="col-sm-3">
  <label  for="inputEmail1"><strong>Telmovil:</strong></label>
    <input required="" type="text" name="telmovil" class="form-control" placeholder="telmovil" value="<?php echo $key->telmovil ?>">
  </div>
  <div class="col-sm-2">
  <label  for="inputEmail1"><strong>Interno:</strong></label>
    <input required="" type="text" name="interno" class="form-control" placeholder="interno" value="<?php echo $key->interno ?>">
  </div>
  <?php endforeach?>



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



<!-- Fin Basico Cuentas -->
<!--   Saco todos los datos de la direccion -->

<?php

$siddirecprov = $conexion->prepare("SELECT dir.id  ,dir.CodPostal as 'direccion',prov.id as 'provid', prov.nombre as 'provnombre'

FROM provincias prov JOIN
direcciones dir ON dir.provincia_id=prov.id
JOIN empleados emp ON emp.direccion_id=dir.id
WHERE   emp.id=$id");
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
empleados emp ON emp.direccion_id=dir.id
WHERE   emp.id= $id");
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
JOIN empleados emp ON emp.direccion_id=dir.id
WHERE emp.id=$id and dir.departamento_id=dep.id");
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
JOIN empleados emp ON dir.id=emp.direccion_id
WHERE emp.id=$id and dir.localidad_id=loc.id");
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





<!-- Tablas Usuarios -->
<?php
$usuedit = $conexion->prepare("SELECT usu.id,usu.usuario

FROM usuarios usu JOIN cuentas cue ON
usu.id=cue.usuario_id

WHERE cue.id=$id");

$usuedit->execute();
$rusuedit = $usuedit->fetchAll(PDO::FETCH_OBJ);

?>

<?php

$conusu = $conexion->prepare('SELECT id,usuario FROM usuarios

WHERE id>1');
$conusu->execute();
$rconusu = $conusu->fetchAll(PDO::FETCH_OBJ);
?>
<div class="form-group row">
  <div class="col-sm-4">
  <label  for="inputEmail1"><strong>Usuario del Sistema</strong></label>


<select required="" class="form-control" id="usuario_id" name="usuario_id">


     <option value=""  required="" >Seleccione usuario</option>
<?php foreach ($rusuedit as $usuedit): ?>
<option selected="selected"  value="<?php echo $usuedit->id ?>"></a>

<?php echo $usuedit->usuario ?>
</option>
<?php endforeach;?>




     <?php foreach ($rconusu as $conusu): ?>
                  <option value="<?php echo $conusu->id; ?>"></a>

    <?php echo $conusu->usuario ?>
                </option>
                   <?php endforeach;?>
</select>
  </div>
</div>
<!-- Fin Tabla Usuarios -->



<br>

<div class="form-group row">
      <div class="offset-sm-4 col-sm-8">

        <input type="submit"  class="btn btn-outline-warning" id="modificar" name="modificar" value="Modificar Empleado">
      </div>
  </div>

</form>


</body>
</html>





<?php require '../views/menu/footer.view.php';?>


 <script src="../assets/js/function-editar-direccion.js"></script>