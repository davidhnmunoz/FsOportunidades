<?php require '../views/menu/menuempleado_activo.view.php';?>




<hr>
  <center><h1>Empleados Activos</h1></center>

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
<div class="col-sm-10 offset-2">

  <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active bg-primary text-white" href="../php/index_empleados.php">
                                            Empleados activos
                                        </a>


  </li>
  <li class="nav-item">
    <a class="nav-link " href="../php/agregar_empleado.php">
                                            Agregar Empleado
                                        </a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="../php/empleado_inactivo.php">
                                            Empleados Inactivos
                                        </a>
  </li>
</div>
<br>


 <div class="col-sm-8 offset-2">
      <table class="table table-bordered  table-sm table-responsive">
      <thead class="thead-inverse">
      <tr>
         <th>Nombre</th>

         <th>Cargo</th>
        <th>Movil</th>
         <th>interno</th>

         <th colspan="2">Accion</th>

      </tr>
      </thead>




      <?php foreach ($rempleados as $empleados): ?>
                                <tbody>
                                    <tr>
                                        <td><a href="../php/empleado_individual.php?id=<?php echo $empleados->id ?>&jefe_id=<?php echo $empleados->jefe_id ?>">
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

      <a  href="../php/bajalogica_empleados.php?id=<?php echo $empleados->usuario_id; ?>"onclick="return confirm('¿Desea Dar de baja el Empleado y el usuario?')"> <i class="eliminar fa fa-user-times fa-2x" aria-hidden="true"></i></i></a>
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