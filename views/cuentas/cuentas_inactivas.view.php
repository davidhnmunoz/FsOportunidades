<?php require '../views/menu/menuprincipal.view.php';?>
<hr>
  <center><h1>Cuentas Inactivas</h1></center>


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

<?php foreach ($rcuentasin as $cuentasin): ?>
                                <tbody>
                                    <tr>
                                        <td><a href="../php/cuenta_individual.php?id=<?php echo $cuentasin->id; ?>"><?php echo $cuentasin->nombreempresa; ?> </a></td>
                                        <td><?php echo $cuentasin->telefono; ?></td>
                                        <td><?php echo $cuentasin->nombrecontacto; ?>,
                                          <?php echo $cuentasin->apellidocontacto; ?>
                                        </td>
                                        <td><ul><?php echo $cuentasin->sitioweb; ?></ul></td>
                                        <td><?php echo $cuentasin->cuit; ?></td>
                                        <td><?php echo $cuentasin->descripcion ?></td>
                                        <td><?php echo $cuentasin->nombre; ?>
                                          <?php echo $cuentasin->apellido; ?>
                                        </td>
                                          <td><?php echo $cuentasin->CodPostal ?>,
                                              <?php echo $cuentasin->provincia ?>,
                                              <?php echo $cuentasin->localidad ?>
                                          </td>
                                            <td>
                                             <a href="../php/modificar_cuenta.php?id=<?php echo $cuentasin->id; ?>"><i class="editar fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>

    <a   href="../php/alta_cuentas.php?id=<?php echo $cuentasin->id; ?>"onclick="return confirm('¿Desea Dar de Alta la cuenta?')"><i class="alta fa fa-user-plus fa-2x" aria-hidden="true"></i></a>


<a  href="../php/eliminar_cuenta.php?id=<?php echo $cuentasin->id; ?>"onclick="return confirm('¿Desea Eliminar Cuenta?')"> <i class="eliminar fa fa-trash-o fa-2x" aria-hidden="true"></i></a>

    </td>


                                    </tr>
                                    </tbody><?php endforeach;?>
      </table>



    </body>
    </html>
<?php include '../views/menu/footer.view.php';?>