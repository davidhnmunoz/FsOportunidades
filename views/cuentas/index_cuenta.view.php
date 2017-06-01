
<?php require '../views/menu/menuprincipal.view.php';?>
<hr>
  <center><h1>CUENTAS ACTIVAS</h1></center>


 <div class="row">
 <div class="col-md-12">
      <table class="table table-bordered table-sm table-responsive">
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
      <a href="../php/modificar_cuenta.php?id=<?php echo $cuentas->id; ?>"><i class="editar fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
      <a  href="../php/bajalogica_cuentas.php?id=<?php echo $cuentas->id; ?>"onclick="return confirm('¿Desea Dar de baja la cuenta?')"> <i class="eliminar fa fa-user-times fa-2x" aria-hidden="true"></i></i></a>

    </td>


                                    </tr>
                                    </tbody><?php endforeach;?>
      </table>
 </div>
 </div>



    </body>
    </html>
<?php include '../views/menu/footer.view.php';?>