<?php require '../views/menu/menuprincipal.view.php';?>
<hr>
  <center><h1>CUENTA INDIVIDUAL</h1></center>


 <table class="table table-bordered">
  <thead class="thead-inverse">
      <tr>
         <th>Empresa</th>
         <th>Telefono</th>
          <th>Contacto</th>
         <th>Sitioweb</th>
         <th>Cuit</th>
          <th>Descripcion</th>
         <th>Creado Por</th>
         <th>Direccion</th>
         <th>Accion</th>
      </tr>
  </thead>

<?php foreach ($rcuentas as $cuentas): ?>
                                <tbody>
                                    <tr>
                                        <td><a href="../php/cuenta_individual.php?id=<?php echo $cuentas->id; ?>"><?php echo $cuentas->nombreempresa; ?> </a></td>
                                        <td><?php echo $cuentas->telefono; ?></td>
                                        <td><?php echo $cuentas->nombrecontacto; ?>,
                                          <?php echo $cuentas->apellidocontacto; ?>
                                        </td>
                                        <td><ul><?php echo $cuentas->sitioweb; ?></ul></td>
                                        <td><?php echo $cuentas->cuit; ?></td>
                                        <td><?php echo $cuentas->descripcion ?></td>
                                        <td><?php echo $cuentas->nombre; ?>
                                          <?php echo $cuentas->apellido; ?>
                                        </td>
                                          <td><?php echo $cuentas->CodPostal ?>,
                                              <?php echo $cuentas->provincia ?>,
                                              <?php echo $cuentas->localidad ?>
                                          </td>
                                            <td>
     <a  class="btn btn-outline-warning" name="editar"  href="../php/modificar_cuenta.php?id=<?php echo $cuentas->id; ?>">Editar</a>

    </td>


                                    </tr>
                                    </tbody><?php endforeach;?>
      </table>





  <table class="table table-bordered">
  <thead class="thead-inverse">
      <tr>

        <th>Nombre</th>
        <th>Origen</th>
         <th>propiedades</th>
         <th>organizacion</th>
         <th>Cantidad De Empleados</th>
         <th>Sector</th>
    <th>Accion</th>



      </tr>
  </thead>

<?php foreach ($rcuentasin as $cuentasin): ?>
                                <tbody>
                                    <tr>
                                        <td><a href="../php/cuenta_individual.php?id=<?php echo $cuentasin->id; ?>"><?php echo $cuentasin->nombreempresa; ?> </a></td>
                                        <td><?php echo $cuentasin->origen; ?></td>
                                        <td><?php echo $cuentasin->propiedades; ?></td>
                                        <td><?php echo $cuentasin->organizacion; ?></td>
                                         <td> <?php echo $cuentasin->cantidadempleados; ?></td>
                                        <td><?php echo $cuentasin->sector; ?></td>

                                            <td>
     <a  class="btn btn-outline-warning" name="editar"  href="../php/modificar_cuenta.php?id=<?php echo $cuentasin->id; ?>">Editar</a>
<a class="btn btn-outline-danger" name="bajar"  href="../php/bajalogica_cuentas.php?id=<?php echo $cuentasin->id; ?>">Dar de Baja</a>

    </td>


                                    </tr>
                                    </tbody><?php endforeach;?>
      </table>



    </body>
    </html>
    <?php include '../views/menu/footer.view.php';?>