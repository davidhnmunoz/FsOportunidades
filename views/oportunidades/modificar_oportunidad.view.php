

<?php include '../views/menu/menuprincipal.view.php';?>



<script>
  function ValidarIdopor(numero){
    if (!/^([0-9])*$/.test(numero))
      alert("El id de Oportunidad " + numero + " no es un número");
  }
</script>
<script>
  function Validarimporte_presupuesto(numero){
    if (!/^([0-9])*$/.test(numero))
      alert("El  Importe Presupuesto " + numero + " no es un número");
  }
</script>
<script>
  function Validarimporte_presupuesto(numero){
    if (!/^([0-9])*$/.test(numero))
      alert("El  Importe Presupuesto " + numero + " no es un número");
  }
</script>
<script>
  function Validarimportereal(numero){
    if (!/^([0-9])*$/.test(numero))
      alert("El  Importe Presupuesto " + numero + " no es un número");
  }
</script>
<script>
  function Validaringresoestimado(numero){
    if (!/^([0-9])*$/.test(numero))
      alert("El  Importe Presupuesto " + numero + " no es un número");
  }
</script>
<script>
  function Validaringreso_reales(numero){
    if (!/^([0-9])*$/.test(numero))
      alert("El  Importe Presupuesto " + numero + " no es un número");
  }
</script>




<script src="../assets/js/modificar_select_cuenta.js"></script>
<script src="../assets/js/modificar_select_area.js"></script>


<br>
<br>

<h1 align="center"><i class="editarcuenta fa fa-pencil-square-o fa-lg" aria-hidden="true">&nbsp;</i>Modificar Oportunidad</h1>


<hr>

<div class="offset-10 col-sm-1">
<a href="../php/index.php" onclick="return confirm('¿Desea Cancelar?')" data-toggle="tooltip" data-placement="bottom" title="Cancelar"><i class="cancelform fa fa-times-circle-o fa-4x" aria-hidden="true"></i></i>
</a>
</div>
<form class="form-comtrol formagregar" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" name="form">

<?php foreach ($res as $key): ?>

    <input required="" type="hidden" type="text" name="id" id="idoportunidad" class="form-control test-input"
    placeholder="id" value="<?php echo $key->id; ?>" onChange="ValidarIdopor(this.value)">

<div class="form-group row">


  <div class="col-sm-4">
  <label  for="inputEmail1"><strong>Tema:</strong></label>
  <textarea required="" class="form-control form-rounded" name="tema" rows="2" placeholder="Tema">
    <?php echo $key->tema; ?>
  </textarea>

</div>
<?php endforeach?>

<!-- Empieza Areas seleccionadas -->
<?php $tareselected = $conexion->prepare("SELECT are.tipoarea_id,tare.descripcion

FROM
oportunidades opu
JOIN areas are ON opu.id=are.oportunidad_id
JOIN tipos_areas tare on are.tipoarea_id=tare.id


WHERE are.oportunidad_id=$id");
$tareselected->execute();
$rtareselected = $tareselected->fetchAll(PDO::FETCH_OBJ);

?>

<!-- Termina area seleccionada -->
<!-- Empieza Select nueva Area -->

<?php $tare = $conexion->prepare('SELECT tare.id,tare.descripcion
FROM tipos_areas tare
');
$tare->execute();
$rtare = $tare->fetchAll(PDO::FETCH_OBJ);

?>
<div class="col-sm-4">
<?php foreach ($rtareselected as $tareselected): ?>
<label  for="inputEmail1"><strong>Area:</strong></label>
<select required  class="form-control" id="area" name="area">
<option selected="selected" value="<?php echo $tareselected->tipoarea_id ?>" >

<?php echo $tareselected->descripcion ?>
</option>
<?php endforeach?>

<option value=""  >Seleccione Area</option>
<?php foreach ($rtare as $tare): ?>
<option value="<?php echo $tare->id ?>"></a>

<?php echo $tare->descripcion ?>
</option>
<?php endforeach;?>
</select>
</div>

<!-- termina Areas -->




<!-- EMPIEZA ESTADOS -->
<?php $estadoselected = $conexion->prepare("SELECT testo.id,testo.descripcion



FROM estado_oportunidades esto
JOIN oportunidades opu ON esto.oportunidad_id=opu.id
JOIN tipos_estado testo ON esto.tipos_estado_id=testo.id


WHERE esto.oportunidad_id=$id");
$estadoselected->execute();
$restadoselected = $estadoselected->fetchAll(PDO::FETCH_OBJ);
?>





<div class="col-sm-3">
<?php foreach ($restadoselected as $estadoselected): ?>
<label  for="inputEmail1"><strong>Estado:</strong></label>

<select required  class="form-control" name="estado" id="estado">

<option selected="selected" value="<?php echo $estadoselected->id ?>" >
<?php echo $estadoselected->descripcion ?>
</option>

<?php endforeach;?>
<option value=""  >Elija Estado</option>


</option>

</select>
</div>
</div>
<!-- Termina estados -->

<!-- Empieza CUENTA -->

<?php $cuentaselected = $conexion->prepare("SELECT cue.id,cue.nombreempresa


FROM  oportunidades opu
JOIN cuentas cue ON opu.cuenta_id=cue.id

WHERE opu.id=$id");

$cuentaselected->execute();
$rcuentaselected = $cuentaselected->fetchAll(PDO::FETCH_OBJ);

?>
<!-- SELECT NUEVA EMPRESA -->
<?php $nuevacuentaselect = $conexion->prepare("SELECT id,nombreempresa



FROM cuentas");
$nuevacuentaselect->execute();
$rnuevacuentaselect = $nuevacuentaselect->fetchAll(PDO::FETCH_OBJ);

?>




   <?php foreach ($rcuentaselected as $cuentaselected): ?>
<div class="form-group row">
<div class="col-sm-6">
   <label  for="inputEmail1"><strong>Cuenta:</strong></label>
   <select required  class="form-control" name="cuenta_id" id="cuenta">

    <option selected="selected" value="<?php echo $cuentaselected->id ?>" >

<?php echo $cuentaselected->nombreempresa ?></option>

    <?php endforeach;?>
  <option value="0">Elija cuenta</option>
  <?php foreach ($rnuevacuentaselect as $nuevacuentaselect): ?>
<option  value="<?php echo $nuevacuentaselect->id ?>" >

<?php echo $nuevacuentaselect->nombreempresa ?></option>
<?php endforeach;?>
</select>
<!-- termina cuenta -->
  </div>
<!-- Empieza Contacto Select contacto -->
  <div class="col-sm-4">
  <?php $contactoselected = $conexion->prepare("SELECT con.id,con.nombre,con.apellido


FROM  oportunidades opu
JOIN cuentas cue ON opu.cuenta_id=cue.id
JOIN contactos con ON opu.contacto_id=con.id

WHERE opu.id=$id");

$contactoselected->execute();
$rcontactoselected = $contactoselected->fetchAll(PDO::FETCH_OBJ);

?>

  <label  for="inputEmail1"><strong>Contacto:</strong></label>
    <select required class="form-control chosen-select" name="contacto_id" id="contacto">
    <?php foreach ($rcontactoselected as $contactoselected): ?>
  <option selected="selected" value="<?php echo $contactoselected->id ?>">
<?php echo $contactoselected->nombre . ', ' . $contactoselected->apellido ?> </option>
<?php endforeach;?>
  <option value="0">Elija contacto</option>
</select>
  </div>
  </div>
  <!-- termina contacto -->
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


<?php foreach ($res as $key): ?>

<div class="bg-inverse text-white"><center><h3>Importe e Ingresos</h3></center></div>
<div class="form-group row">
<div class="col-sm-3">
<label for="basic-url"><strong>Importe Presupuesto</strong></label>
<div class="input-group">
<span class="input-group-addon">$</span>
  <input required=""  value="<?php echo $key->importe_presupuesto; ?>" type="text" class="form-control" id="basic-url" name="importe_presupuesto"  aria-describedby="basic-addon3" placeholder="Importe Presupuesto" onChange="Validarimporte_presupuesto(this.value)">

</div>
</div>

<div class="col-sm-3">
<label for="basic-url"><strong>Importe Real</strong></label>
<div class="input-group">
<span class="input-group-addon">$</span>
  <input  required="" type="text" class="form-control" value="<?php echo $key->importe; ?>" id="basic-url" name="importe_real"  aria-describedby="basic-addon3" placeholder="Importe Real" onChange="Validarimportereal(this.value)">
</div>
</div>
<div class="col-sm-3">
<label for="basic-url"><strong>Ingresos Estimados</strong></label>
<div class="input-group">
<span class="input-group-addon">$</span>
  <input  type="text" class="form-control" value="<?php echo $key->ingresos_estimados; ?>"  id="basic-url" name="ingresos_estimados"  aria-describedby="basic-addon3" placeholder="Ingreso Estimados" onChange="Validaringresoestimado(this.value)">
</div>
</div>
<div class="col-sm-3">
<label for="basic-url"><strong>Ingresos Reales</strong></label>
<div class="input-group">
<span class="input-group-addon">$</span>
  <input required=""  type="text" class="form-control" value="<?php echo $key->ingresos_reales; ?>"  id="basic-url" name="ingresos_reales"  aria-describedby="basic-addon3" placeholder="Ingresos Reales" onChange="Validaringreso_reales(this.value)">
</div>
</div>
</div>

<div class="bg-inverse text-white"><center><h3>Detalles</h3></center></div>
<!-- Detalles -->
<div class="form-group row">

  <div class="col-lg-12 ">
    <div class="input-group">
      <span class="input-group-btn">
        <button class=" btn bg-inverse text-white" type="button"><strong>Situacion Actual:</strong></button>
      </span>
      <input type="text" name="situacionactual" value="<?php echo $key->situacionactual; ?>" class="form-control" placeholder="Describa la Situacion Actual">

    </div>
<br>
    <div class="input-group">
      <span class="input-group-btn">
        <button class="btn bg-inverse text-white" type="button"><strong>Necesidad del cliente:</strong></button>
      </span>
      <input value="<?php echo $key->necesidadcliente; ?>" required=""  type="text" name="necesidadcliente" class="form-control" placeholder="Describa la necesidad del cliente">
    </div>
    <br>
     <div class="input-group">
      <span class="input-group-btn">
        <button class="btn bg-inverse text-white" type="button"><strong>Solucion Propuesta:</strong></button>
      </span>
      <input type="text" value="<?php echo $key->solucionpropuesta; ?>" required=""   name="solucionpropuesta" class="form-control" placeholder="Describa la solucion propuesta">
    </div>
    <br>
     <div class="input-group">
      <span class="input-group-btn">
        <button class="btn bg-inverse text-white" type="button"><strong>Descripcion:</strong></button>
      </span>
      <input type="text" value="<?php echo $key->descripcion; ?>" name="descripcion" class="form-control" placeholder="Descripcion">
    </div>

  </div>

</div>
<!-- FIN DETALLES -->



<div class="form-group row">




    <input type="hidden"  type="date"  name="fecha_modificacion" class="form-control" value="<?php echo date("Y-m-d"); ?>" >

<div class="col-sm-4">
  <label  for="inputEmail1"><strong>Fecha De Cierre:</strong></label>
    <input required="" type="date"  name="fecha_cierre" class="form-control" value="<?php echo $key->fecha_cierre; ?>" >
  </div>



    </div>

</div>
</div>

<?php endforeach;?>


<br>

<div class="form-group row">
      <div class="offset-sm-4 col-sm-8">
        <input type="submit" class="btn btn-outline-warning" name="modificar" value="Modificar Oportunidad">
      </div>
  </div>


</form>






<hr>

</body>
</html>

<?php include '../views/menu/footer.view.php';?>
