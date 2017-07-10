<?php require '../views/menu/menucuenta_activa.view.php';?>
<hr>
<?php foreach ($rcuentas as $cuentas): ?>
  <div class="row">
 <div class="container">
  <div class="bg-inverse text-white col-sm-8 offset-2">

  <center><h2> <?php echo $cuentas->nombreempresa; ?></h2></center>
  </div>

<div class="row">
  <div class="col-sm-10 offset-2">

 <table  class="table table-bordered table-sm table-responsive">
  <thead class="thead-inverse">
      <tr>

         <th>Cuit</th>
         <th>Telefono</th>
          <th>Contacto</th>
            <th>Sitioweb</th>
            <th>Accion</th>

      </tr>
  </thead>




                                <tbody>
                                    <tr>

                                        <td><?php echo $cuentas->cuit; ?></td>
                                        <td><?php echo $cuentas->telefono; ?></td>
                                        <td><?php echo $cuentas->nombrecontacto; ?>,
                                          <?php echo $cuentas->apellidocontacto; ?>
                                        </td>
                                         <td><?php echo $cuentas->sitioweb; ?></td>
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
</div>
  </div>

<div class="row">
  <div class="col-sm-8 offset-2">

<div  class="bg-inverse text-white">
<h2 align="center">Direccion</h2>
  </div>
<table class="table table-bordered table-sm table-responsive">


<thead class="thead-inverse">

         <th>Direccion y Cod Postal</th>
         <th>Provincia</th>
         <th>Departamento</th>
        <th>Localidad</th>
</thead>

                  <tbody>
                  <tr>

                                          <td><?php echo $cuentas->CodPostal ?></td>
                                            <td><?php echo $cuentas->provincia ?></td>
                                            <td><?php echo $cuentas->departamento ?></td>
                                            <td>   <?php echo $cuentas->localidad ?></td>
                                  <?php endforeach;?>
                  </tr>
                  </tbody>
</table>
</div>
</div>







<div  class="bg-inverse text-white col-sm-8 offset-2">
<h2 align="center">Caracteristicas de la cuenta</h2>
</div>
<div class="row">
  <div class="col-sm-10 offset-2">

  <table class="table table-bordered table-sm table-responsive">
  <thead class="thead-inverse">
      <tr>


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
<div class="col-sm-8 offset-2">

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