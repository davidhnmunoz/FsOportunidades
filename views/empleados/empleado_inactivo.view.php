<?php require '../views/menu/menuempleado_inactivo.view.php';?>




<hr>
  <center><h1>Empleados Inactivos</h1></center>

<div class="row">
<div class="col-md-3"></div>
<div class="col-md-5"><?php if (isset($_GET['exito'])) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <strong>Exitos!</strong> El Empleado fue modificado con exito del sistema.
    </div>';
    echo '<meta http-equiv="refresh" content="4;url=index_empleados.php">';
}?></div>
  </div>
 <div class="row">
<div class="container" >


<?php
if ($rempleados == false) {

    echo ' <div class="col-sm-5 offset-3">
                <div class="alert alert-success" role="alert">

                    <strong>Felicidades no hay empleados Inactivos</strong>
                </div>
            <?php endif;?>
            </div>';
} else {
    echo '
  <div class="col-sm-8 offset-3">
      <table class="table table-bordered  table-sm table-responsive">
      <thead class="thead-inverse">
      <tr>
         <th>Nombre</th>

         <th>Cargo</th>
        <th>Movil</th>
         <th>interno</th>

         <th colspan="3">Accion</th>
      </tr>
      </thead>
';
}

?>






      <?php foreach ($rempleados as $empleados): ?>
                                <tbody>
                                    <tr>
                                        <td><a href="../php/empleado_individual_inactivo.php?id=<?php echo $empleados->id ?>&jefe_id=<?php echo $empleados->jefe_id ?>">
                                        <?php echo $empleados->nombre; ?>
                                        <?php echo $empleados->apellido; ?></a></td>

                                        <td><?php echo $empleados->cargo; ?></td>
                                        <td><?php echo $empleados->telmovil; ?></td>

                                        <td><?php echo $empleados->interno; ?></td>



                                            <td>
      <a href="../php/modificarempleado_activo.php?id=<?php echo $empleados->id ?>&jefe_id=<?php echo $empleados->jefe_id ?>">

      <i class="editar fa fa-pencil-square-o fa-2x"  aria-hidden="true"></i></a>
    </td>


     <td>

    <a   href="../php/alta_empleados.php?id=<?php echo $empleados->usuario_id ?>"onclick="return confirm('¿Desea Dar de Alta el Empleado y usuario?')"><i class="alta fa fa-user-plus fa-2x" aria-hidden="true"></i></a>
</td>
<td>
<a  href="../php/eliminar_empleado.php?usuario_id=<?php echo $empleados->usuario_id; ?>&direccion_id=<?php echo $empleados->direccion_id ?>"onclick="return confirm('¿Desea eliminar el usuario Permanentemente?')"> <i class="eliminar fa fa-trash-o fa-2x" aria-hidden="true"></i></a>
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