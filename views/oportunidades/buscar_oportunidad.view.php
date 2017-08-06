
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
  <div class="row">
<div class="container" >
<div class="col-sm-12">


  <table class="table table-sm table-bordered  table-responsive">
  <thead class="thead-inverse">
      <tr>
         <th><center>Tema</center></th>
         <th><center>Area</center></th>
         <th><center>Cuenta</center></th>
         <th><center>Contacto</center></th>
         <th><center>Correo Electronico</center></th>
         <th><center>Telefono</center></th>
         <th colspan="2" >Accion</th>





      </tr>
  </thead>

                      <?php foreach ($result as $row): ?>
		                                        <tbody>
		                                             <tr>
		                                                  <td><a href="oportunidad_individual.php?id=<?php echo $row['opu_id']; ?>">
		                                                                                  <?php echo $row['tema']; ?></a></td>
		                                                  <td><?php echo $row['area'] ?></td>
		                                                  <td><a href="../php/cuenta_individual.php?id=<?php echo $row['cue_id']; ?>">
		                                                    <?php echo $row['nombreempresa']; ?></a></td>
		                                                  <td><a href="../php/contacto_individual.php?id=<?php echo $row['con_id']; ?>">
		                                                   <?php echo $row['nombre'] ?>,
		                                                     <?php echo $row['apellido'] ?></a></td>
		                                                  <td><?php echo $row['email'] ?></td>
		                                                  <td><?php echo $row['telefono'] ?></td>
		                                                  <td>
		                          <a href="../php/modificar_oportunidad.php?id=<?php echo $row['opu_id'] ?>">

		                          <i class="editar fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a></td>
		                          <td>
		                             <a href="../php/eliminar_oportunidad.php?id=<?php echo $row['opu_id'] ?>"onclick="return confirm('¿Desea eliminar la oportunidad permanentemente?')">

		                          <i class="eliminar fa fa-trash fa-2x" aria-hidden="true"></i></a>
		                          </td>


		                                            </tr>
		                                       </tbody><?php endforeach;?>
        </table>
        </div>
      </div>
</div>
    </html>
<?php endif;?>
<?php include '../views/menu/footer.view.php';?>