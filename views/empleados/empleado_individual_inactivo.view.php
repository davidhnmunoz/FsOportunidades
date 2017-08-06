<?php require '../views/menu/menuempleado_activo.view.php';?>
<hr>
<?php foreach ($rempleados as $empleados): ?>
  <div class="row">
 <div class="container">

<div class="row">

  <div class="col-sm-10 offset-2">

 <table  class="table table-bordered table-sm table-responsive">
  <thead class="thead-inverse">
    <tr>
                                                        <th colspan="7">
                                                            <h2>
                                                                <center>
                                                                     <?php echo $empleados->nombre; ?>
    <?php echo $empleados->apellido; ?>
                                                                </center>
                                                            </h2>
                                                        </th>
                                                    </tr>
      <tr>

         <th>Cargo</th>
          <th>Formacion</th>
         <th>Fecha Nacimiento</th>
          <th>Movil</th>
            <th>Interno</th>
            <th>Jefe</th>
            <th>Accion</th>

      </tr>
  </thead>




                                <tbody>
                                    <tr>

                                        <td><?php echo $empleados->cargo; ?></td>
             <td><?php echo $empleados->notas ?></td>
                                        <td><?php echo $empleados->fechanacimiento; ?></td>
                                        <td><?php echo $empleados->telmovil; ?></td>
                                         <td><?php echo $empleados->interno; ?></td>
                                          <?php endforeach;?>
                                          <?php foreach ($rjefes as $jefes): ?>
                                         <td><?php echo $jefes->nombre; ?>
                                           <?php echo $jefes->apellido; ?>
                                         </td>
                                          <?php endforeach;?>

        <?php foreach ($rempleados as $empleados): ?>                                                                       <td>
      <a href="../php/modificarempleado_activo.php?id=<?php echo $empleados->id ?>&jefe_id=<?php echo $empleados->jefe_id ?>">

      <i class="editar fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
    </td>
                                    </tr>
                                    </tbody>
</table>


 <table  class="table table-bordered table-sm table-responsive">
  <thead class="thead-inverse">
  <tr>
                                                        <th colspan="4">
                                                            <h2>
                                                                <center>
                                                                  Usuario
                                                                </center>
                                                            </h2>
                                                        </th>
                                                    </tr>
      <tr>

      <tr>

         <th>Usuario Asignado</th>
         <th>Fecha De Alta</th>
          <th>Fecha De Baja</th>
          <th>Accion</th>


      </tr>
  </thead>


                                <tbody>
                                    <tr>

                                        <td><?php echo $empleados->usuario; ?></td>
                                        <td><?php echo $empleados->fecha_alta; ?></td>
                                        <td><?php echo $empleados->fecha_baja; ?></td>
                                        <td>
     <a href="../php/modificarusuario_inactivo.php?id=<?php echo $empleados->id ?>">
      <i class="editar fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
    </td>
</tr>
</tbody>
</table>


  <table  class="table table-bordered table-sm table-responsive">
  <thead class="thead-inverse">
          <tr>

          </tr>
          </thead>
          <tbody>

          <tr>
          </tr>
          </tbody>

</table>
</div>
  </div>

<div class="row">
  <div class="col-sm-8 offset-2">


<table class="table table-bordered table-sm table-responsive">


<thead class="thead-inverse">


  <tr>
                                                        <th colspan="2">
                                                            <h2>
                                                                <center>
                                                            <h2 align="center">Direccion</h2>
                                                                </center>
                                                            </h2>
                                                        </th>
                                                    </tr>


</thead>

                  <tbody class="thead-inverse">
                  <tr>


<tr>
 <th>Direccion y Cod Postal</th>
         <td><?php echo $empleados->CodPostal ?></td>

</tr>
<tr>
         <th>Provincia</th>
         <td><?php echo $empleados->provincia ?></td>

</tr>
<tr>
         <th>Departamento</th>
         <td><?php echo $empleados->departamento ?></td>

</tr>
<tr>
        <th>Localidad</th>
        <td>   <?php echo $empleados->localidad ?></td>


                                  <?php endforeach;?>
                  </tr>
                  </tbody>
</table>
</div>
</div>




<hr>

    </body>
    </html>
    <?php include '../views/menu/footer.view.php';?>