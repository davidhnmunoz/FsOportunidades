
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


<script src="../assets/js/validar_id_oportunidad.js"></script>
<script src="../assets/js/selectcuentas.js"></script>
<script src="../assets/js/select_area.js"></script>



<br>
<br>

<h1 align="center"><i class= "text-primary fa fa-handshake-o fa-lg" aria-hidden="true">&nbsp;</i>Agregar Nueva Oportunidad</h1>

<hr>

<div class="offset-11 col-sm-1">
<a href="../php/index.php" onclick="return confirm('¿Desea Cancelar?')" data-toggle="tooltip" data-placement="bottom" title="Cancelar"><i class="cancelform fa fa-times-circle-o fa-4x" aria-hidden="true"></i></i>
</a>
</div>
<form class="form-comtrol formagregar" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" name="form">


<div class="form-group row">
 <div class="col-sm-2">
  <label  for="inputEmail1"><strong>id:</strong></label>
    <input required="" type="text" name="id" id="idoportunidad" class="form-control test-input"
    placeholder="id" onChange="ValidarIdopor(this.value)">
    <span id="Infoopor">
                            </span>
                        </input>
  </div>

  <div class="col-sm-3">
  <label  for="inputEmail1"><strong>Tema:</strong></label>
  <textarea required="" class="form-control form-rounded" name="tema" rows="2" placeholder="Tema"></textarea>

</div>
<?php $tare = $conexion->prepare('SELECT tare.id,tare.descripcion
FROM tipos_areas tare
');
$tare->execute();

?>
<div class="col-sm-4">

   <label  for="inputEmail1"><strong>Area:</strong></label>
   <select required  class="form-control chosen-select" name="area" id="area">
  <option value="">Elija Area</option>
</select>




</div>

<div class="col-sm-3">
<label  for="inputEmail1"><strong>Estado:</strong></label>
<select required  class="form-control" name="estado" id="estado">

<option value=""  >Elija Estado</option>


</select>
</div>






</div>

<div class="form-group row">
<div class="col-sm-6">
   <label  for="inputEmail1"><strong>Cuenta:</strong></label>
   <select required  class="form-control chosen-select" name="cuenta_id" id="cuenta">
  <option value="">Elija cuenta</option>
</select>
  </div>
  <div class="col-sm-4">
  <label  for="inputEmail1"><strong>Contacto:</strong></label>
    <select required class="form-control chosen-select" name="contacto_id" id="contacto">
  <option value="">Elija contacto</option>
</select>
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




<div class="bg-inverse text-white"><center><h3>Importe e Ingresos</h3></center></div>
<div class="form-group row">
<div class="col-sm-3">
<label for="basic-url"><strong>Importe Presupuesto</strong></label>
<div class="input-group">
<span class="input-group-addon">$</span>
  <input required="" type="text" class="form-control" id="basic-url" name="importe_presupuesto"  aria-describedby="basic-addon3" placeholder="Importe Presupuesto" onChange="Validarimporte_presupuesto(this.value)">

</div>
</div>

<div class="col-sm-3">
<label for="basic-url"><strong>Importe Real</strong></label>
<div class="input-group">
<span class="input-group-addon">$</span>
  <input  type="text" required=""  class="form-control" id="basic-url" name="importe_real"  aria-describedby="basic-addon3" placeholder="Importe Real" onChange="Validarimportereal(this.value)">
</div>
</div>
<div class="col-sm-3">
<label for="basic-url"><strong>Ingresos Estimados</strong></label>
<div class="input-group">
<span class="input-group-addon">$</span>
  <input  type="text" required=""  class="form-control" id="basic-url" name="ingresos_estimados"  aria-describedby="basic-addon3" placeholder="Ingreso Estimados" onChange="Validaringresoestimado(this.value)">
</div>
</div>
<div class="col-sm-3">
<label for="basic-url"><strong>Ingresos Reales</strong></label>
<div class="input-group">
<span class="input-group-addon">$</span>
  <input required=""  type="text" class="form-control" id="basic-url" name="ingresos_reales"  aria-describedby="basic-addon3" placeholder="Ingresos Reales" onChange="Validaringreso_reales(this.value)">
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
      <input type="text" name="situacionactual" class="form-control" placeholder="Describa la Situacion Actual">

    </div>
<br>
    <div class="input-group">
      <span class="input-group-btn">
        <button class="btn bg-inverse text-white" type="button"><strong>Necesidad del cliente:</strong></button>
      </span>
      <input type="text" name="necesidadcliente" class="form-control" placeholder="Describa la necesidad del cliente">
    </div>
    <br>
     <div class="input-group">
      <span class="input-group-btn">
        <button class="btn bg-inverse text-white" type="button"><strong>Solucion Propuesta:</strong></button>
      </span>
      <input type="text" name="solucionpropuesta" class="form-control" placeholder="Describa la solucion propuesta">
    </div>
    <br>
     <div class="input-group">
      <span class="input-group-btn">
        <button class="btn bg-inverse text-white" type="button"><strong>Descripcion:</strong></button>
      </span>
      <input type="text" name="descripcion" class="form-control" placeholder="Descripcion">
    </div>

  </div>

</div>
<!-- FIN DETALLES -->



<div class="form-group row">
  <div class="col-sm-4">

</select>
  </div>
<div class="col-sm-4">
  <label  for="inputEmail1"><strong>Fecha De Alta:</strong></label>
    <input required="" type="date"  name="fecha_alta" class="form-control" value="<?php echo date("Y-m-d"); ?>" >
  </div>
<div class="col-sm-4">
  <label  for="inputEmail1"><strong>Fecha De Cierre:</strong></label>
    <input required="" type="date"  name="fecha_cierre" class="form-control" value="<?php echo date("Y-m-d"); ?>" >
  </div>
</div>
</div>



<br>


<div class="form-group row">
      <div class="offset-sm-4 col-sm-8">
        <input type="submit" class="btn btn-outline-success" name="agregar" value="Agregar Oportunidad">
      </div>
  </div>

  <?php

?>
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
