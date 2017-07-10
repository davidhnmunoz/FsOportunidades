<?php if (!empty($sinresultado)): ?>
  <hr>
            <div class="col-sm-4 offset-3">
                <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                    <?php echo $sinresultado ?>
                </div>
            </div>
            <?php endif;?>
        </div>
<hr>
<?php if (empty($sinresultado)): ?>
  <center><h2>Resultado De Busqueda:</h2></center>


 <div class="col-sm-10 offset-1">
      <table class="table table-bordered  table-sm table-responsive">
      <thead class="thead-inverse">
      <tr>
         <th>Empresa</th>
         <th>Cuit</th>
         <th>Telefono</th>

         <th>Sitioweb</th>



         <th colspan="3">Accion</th>
      </tr>
      </thead>




      <?php foreach ($result as $row): ?>
                                <tbody>
                                    <tr>
                                        <td><a href="../php/cuenta_individual.php?id=<?php echo $row['id']; ?>"><?php echo $row['nombreempresa']; ?> </a></td>
                                        <td><?php echo $row['cuit']; ?></td>
                                        <td><?php echo $row['telefono']; ?></td>

                                        <td><?php echo $row['sitioweb']; ?></td>


                                            <td>
      <a href="../php/modificar_cuenta.php?id=<?php echo $row['id'] ?>">

      <i class="editar fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
    </td>
    <td>

    <a   href="../php/alta_cuentas.php?id=<?php echo $row['id'] ?>"onclick="return confirm('¿Desea Dar de Alta la cuenta?')"><i class="alta fa fa-user-plus fa-2x" aria-hidden="true"></i></a>
</td>

<td>

<a  href="../php/eliminar_cuenta.php?id=<?php echo $row['id']; ?>"onclick="return confirm('¿Desea Eliminar Cuenta?')"> <i class="eliminar fa fa-trash-o fa-2x" aria-hidden="true"></i></a>
</td>


                                    </tr>
                                    </tbody><?php endforeach;?>
      </table>
 </div>
 </div>
</div>



    </body>
    </html>
<?php endif;?>
<?php include '../views/menu/footer.view.php';?>