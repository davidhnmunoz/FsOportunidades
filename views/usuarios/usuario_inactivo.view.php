<?php require '../views/menu/menuusuario_inactivo.view.php';?>




<hr>
  <center><h1>Usuarios inactivos</h1></center>

<div class="row">
<div class="col-md-3"></div>
<div class="col-md-5"><?php if (isset($_GET['exito'])) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <strong>Exitos!</strong> El usuario fue modificado con exito del sistema.
    </div>';
    echo '<meta http-equiv="refresh" content="4;url=index_contactos.php">';
}?></div>
  </div>
 <div class="row">
<div class="container" >

<br>
<div class="col-sm-8 offset-2">

  <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link " href="../php/index_usuarios.php">
                                            Usuarios Activos
                                        </a>

  </li>
  <li class="nav-item">
    <a class="nav-link " href="../php/agregar_usuario.php">
                                            Agregar Usuario
                                        </a>
  </li>
  <li class="nav-item">
    <a class="nav-link active bg-primary text-white " href="../php/usuario_inactivo.php">
                                            Usuarios Inactivos
                                        </a>
  </li>
</div>
<br>



<?php
if ($rusuarios == false) {

    echo ' <div class="col-sm-5 offset-3">
                <div class="alert alert-success" role="alert">

                    <strong>Felicidades no hay Usuarios Inactivos</strong>
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

         <th><center>Rol</center></th>
         <th>Fecha De Alta</th>

          <th>Fecha De Baja</th>
         <th colspan="4"><center>Accion</center> </th>
      </tr>
      </thead>';
}

?>








      <?php foreach ($rusuarios as $usuarios): ?>
                                <tbody>
                                    <tr>
                                        <td><a href="../php/usuario_individual.php?id=<?php echo $usuarios->id; ?>"><?php echo $usuarios->usuario; ?></a></td>

                                        <td><?php echo $usuarios->rol; ?></td>
                                        <td><?php echo $usuarios->fecha_alta; ?></td>
                                        <td><?php echo $usuarios->fecha_baja; ?></td>



                                            <td>
      <a href="../php/modificarusuario_inactivo.php?id=<?php echo $usuarios->id ?>">

      <i class="editar fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
    </td>
    <td>

    <a   href="../php/alta_usuario.php?id=<?php echo $usuarios->id ?>"onclick="return confirm('¿Desea Dar de Alta el usuario?')"><i class="alta fa fa-user-plus fa-2x" aria-hidden="true"></i></a>
</td>
<td>
      <a href="../php/cambio_pass_usuario.php?id=<?php echo $usuarios->id ?>">

      <i class="editar fa fa-key fa-2x"  aria-hidden="true"></i></a>
    </td>
<td>
<a  href="../php/eliminar_usuarios.php?id=<?php echo $usuarios->id; ?>&direccion_id=<?php echo $usuarios->direccion_id; ?>"onclick="return confirm('¿Desea eliminar el usuario y el Empleado Permanentemente?')"> <i class="eliminar fa fa-trash-o fa-2x" aria-hidden="true"></i></a>
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