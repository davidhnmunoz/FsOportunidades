<?php require '../views/menu/menucuenta_inactiva.view.php';?>
<hr>
<div class="row">
<div class="container">

  <center><h1>Cuentas Inactivas</h1></center>

<div class="col-sm-10 offset-1">

  <table class="table table-bordered table-sm table-responsive">
  <thead class="thead-inverse">
      <tr>
         <th>Empresa</th>
         <th>Cuit</th>
         <th>Telefono</th>

         <th>Sitioweb</th>

         <th colspan="3">Accion</th>
      </tr>
  </thead>

<?php foreach ($rcuentasin as $cuentasin): ?>
                                <tbody>
                                    <tr>
                                        <td><a href="../php/cuenta_individual_inactiva.php?id=<?php echo $cuentasin->id; ?>"><?php echo $cuentasin->nombreempresa ?> </a></td>
                                        <td><?php echo $cuentasin->cuit ?></td>
 <td><?php echo $cuentasin->telefono ?></td>
                                        <td><ul><?php echo $cuentasin->sitioweb; ?></ul></td>

                                            <td>
                                             <a href="../php/modificar_cuenta_inactiva.php?id=<?php echo $cuentasin->id ?>"><i class="editar fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
</td>
<td>

    <a   href="../php/alta_cuentas.php?id=<?php echo $cuentasin->id ?>"onclick="return confirm('¿Desea Dar de Alta la cuenta?')"><i class="alta fa fa-user-plus fa-2x" aria-hidden="true"></i></a>
</td>
<td>

<a  href="../php/eliminar_cuenta.php?id=<?php echo $cuentasin->id; ?>&direccion_id=<?php echo $cuentasin->direccion_id; ?>"onclick="return confirm('¿Desea eliminar la cuenta y todos sus contactos Permanentemente?')"> <i class="eliminar fa fa-trash-o fa-2x" aria-hidden="true"></i></a>
</td>






                                    </tr>
                                    </tbody><?php endforeach;?>
      </table>

</div>

</div>
</div>

    </body>
    </html>
<?php include '../views/menu/footer.view.php';?>