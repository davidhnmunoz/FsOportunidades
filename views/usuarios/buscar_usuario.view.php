
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

         <th>Rol</th>

         <th>Fecha De alta</th>



         <th colspan="2">Accion</th>
      </tr>
      </thead>




      <?php foreach ($result as $row): ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $row['usuario']; ?>
                                        <td><?php echo $row['rol']; ?></td>
                                        <td><?php echo $row['fecha_alta']; ?></td>





                                            <td>
      <a href="../php/modificar_usuario.php?id=<?php echo $row['id'] ?>">

      <i class="editar fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
    </td>
    <td>

      <a  href="../php/bajalogica_usuario.php?id=<?php echo $row['id']; ?>"onclick="return confirm('¿Desea Dar el usuario?')"> <i class="eliminar fa fa-user-times fa-2x" aria-hidden="true"></i></i></a>
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