<?php require '../views/menu/menucuenta_activa.view.php';?>
<hr>
<?php foreach ($rcuentas as $cuentas): ?>
  <div class="row">
 <div class="container">


<div class="row">
  <div class="col-sm-10 offset-2">

 <table  class="table table-bordered table-sm table-responsive">
  <thead class="thead-inverse">


  <tr>
                                                        <th colspan="5">
                                                            <h2>
                                                                <center>
                                                                     <?php echo $cuentas->nombreempresa; ?>
                                                                </center>
                                                            </h2>
                                                        </th>
                                                    </tr>
      <tr>

         <th>Cuit</th>
         <th>Telefono Empresa</th>

            <th>Sitioweb</th>
          <th>Fecha De alta</th>
            <th>Accion</th>

      </tr>
  </thead>




                                <tbody>
                                    <tr>

                                        <td><?php echo $cuentas->cuit; ?></td>
                                        <td><?php echo $cuentas->telefono; ?></td>
                                       <td><?php echo $cuentas->sitioweb; ?></td>
                                       <td><?php echo $cuentas->fecha_alta; ?></td>


                                                                               <td>
      <a href="../php/modificar_cuenta.php?id=<?php echo $cuentas->id ?>">

      <i class="editar fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
    </td>
                                    </tr>
                                    </tbody>
</table>

  <table  class="table table-bordered table-sm table-responsive">
  <thead class="thead-inverse">
          <tr>
          <th>Descripcion
          </th>
          </tr>
          </thead>

          <tbody>

          <tr>
             <td><?php echo $cuentas->descripcion ?></td>

          </tr>
          </tbody>

</table>
<?php endforeach;?>
</table>
<div class="row">
  <div class="col-sm-6 ">


  <table  class="table table-bordered table-sm table-responsive">
  <thead class="thead-inverse">

  <tr>
                                                        <th colspan="3">
                                                            <h2>
                                                                <center>
                                                            <h2 align="center">Contactos</h2>
                                                                </center>
                                                            </h2>
                                                        </th>
                                                    </tr>
      <tr>
          <tr>
          <th>Nombre</th>
          <th>Telefono</th>
          <th>Correo</th>
  <?php foreach ($rcontactos as $contactos): ?>

          </tr>
          </thead>

          <tbody>

          <tr>
            <td><a href="../php/contacto_individual.php?id=<?php echo $contactos->con_id; ?>"><?php echo $contactos->nombrecontacto; ?>,
                                          <?php echo $contactos->apellidocontacto; ?></a></td>
                                          <td> <?php echo $contactos->telefono; ?></td>
                                          <td> <?php echo $contactos->email; ?></td>

          </tr>
          </tbody>
<?php endforeach;?>
</table>




</div>
  </div>

<div class="row">
  <div class="col-sm-8">


<table class="table table-bordered table-sm table-responsive">


<thead class="thead-inverse">
<?php foreach ($rcuentas as $cuentas): ?>

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
         <td><?php echo $cuentas->CodPostal ?></td>

</tr>
<tr>
         <th>Provincia</th>
         <td><?php echo $cuentas->provincia ?></td>

</tr>
<tr>
         <th>Departamento</th>
         <td><?php echo $cuentas->departamento ?></td>

</tr>
<tr>
        <th>Localidad</th>
        <td>   <?php echo $cuentas->localidad ?></td>


                                  <?php endforeach;?>
                  </tr>
                  </tbody>
</table>
</div>
</div>








<div class="row">
  <div class="col-sm-10 ">

  <table class="table table-bordered table-sm table-responsive">
  <thead class="thead-inverse">
      <tr>
 <th colspan="5">
                                                            <h2>
                                                                <center>
                                                            <h2 align="center">Caracteristicas de la cuenta</h2>
                                                                </center>
                                                            </h2>
                                                        </th>
                                                    </tr>

        <th>Origen</th>
         <th>Propiedades</th>
         <th>Organizacion</th>
         <th>Cantidad De Empleados</th>
         <th>Sector</th>




      </tr>
  </thead>
<?php foreach ($rcuentasin as $cuentasin): ?>
                                <tbody>
                                    <tr>

                                        <td><?php echo $cuentasin->origen; ?></td>
                                        <td><?php echo $cuentasin->propiedades; ?></td>
                                        <td><?php echo $cuentasin->organizacion; ?></td>
                                         <td> <?php echo $cuentasin->cantidadempleados; ?></td>
                                        <td><?php echo $cuentasin->sector; ?></td>




                                    </tr>
                                    </tbody><?php endforeach;?>
      </table>
      </div>
      </div>

      <?php foreach ($rcuentas as $cuentas): ?>





<div class="row">
<div class="col-sm-8 ">

        <div class="d-flex flex-row justify-content-center bg-inverse text-white">
 <div class="p-2" ><h3>Cuenta Creada Por:</h3></div>
  <div class="p-2"><h3><?php echo $cuentas->nombre ?> <?php echo $cuentas->apellido ?></h3></div>
</div>

</div>
                              <?php endforeach;?>
</div>

</div>
</div>


<hr>

    </body>
    </html>
    <?php include '../views/menu/footer.view.php';?>