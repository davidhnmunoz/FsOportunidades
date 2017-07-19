
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


 <div class="col-sm-8 offset-4">
      <table class="table table-bordered  table-sm table-responsive">
      <thead class="thead-inverse">
      <tr>
         <th>Nombre</th>

         <th>Cargo</th>

         <th>Movil</th>

<th>Interno</th>

         <th colspan="3">Accion</th>
      </tr>
      </thead>




      <?php foreach ($result as $row): ?>
                                <tbody>
                                    <tr>
                                        <td> <a href="../php/empleado_individual.php?id=<?php echo $row['id'] ?>&jefe_id=<?php echo $row['jefe_id'] ?>">
                                        <?php echo $row['nombre']; ?>
                                      <?php echo $row['apellido']; ?>
                                        </a></td>
                                        <td><?php echo $row['cargo']; ?></td>
                                        <td><?php echo $row['telmovil']; ?></td>
                                        <td><?php echo $row['interno']; ?></td>





                                            <td>
      <a href="../php/modificarempleado_Activo.php?id=<?php echo $row['id'] ?>&jefe_id=<?php echo $row['jefe_id'] ?>">

      <i class="editar fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
    </td>

<td>
    <a   href="../php/alta_empleados.php?id=<?php echo $row['usuario_id'] ?>"onclick="return confirm('¿Desea Dar de Alta el Empleado y usuario?')"><i class="alta fa fa-user-plus fa-2x" aria-hidden="true"></i></a>
</td>
<td>
<a  href="../php/eliminar_empleado.php?usuario_id=<?php echo $row['usuario_id'] ?>&direccion_id=<?php echo $row['direccion_id'] ?>"onclick="return confirm('¿Desea eliminar el usuario Permanentemente?')"> <i class="eliminar fa fa-trash-o fa-2x" aria-hidden="true"></i></a>
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