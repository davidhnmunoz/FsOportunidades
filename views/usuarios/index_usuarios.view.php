<?php require '../views/menu/menuusuarios_activos.view.php';?>



<hr>
  <center><h1>Usuarios Activos</h1></center>

<div class="row">
<div class="col-md-3"></div>
<div class="col-md-5"><?php if (isset($_GET['exito'])) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <strong>Exitos!</strong> El Usuario fue modificado con exito del sistema.
    </div>';
    echo '<meta http-equiv="refresh" content="4;url=index_usuarios.php">';
}?></div>
  </div>
 <div class="row">
<div class="container" >

 <div class="col-sm-8 offset-4">
      <table class="table table-bordered  table-sm table-responsive">
      <thead class="thead-inverse">
      <tr>
         <th>Nombre</th>

         <th>Rol</th>
         <th>Fecha De Alta</th>


         <th colspan="2">Accion</th>
      </tr>
      </thead>




      <?php foreach ($rusuarios as $usuarios): ?>
                                <tbody>
                                    <tr>
                                        <td><a href="../php/usuario_individual.php?id=<?php echo $usuarios->id; ?>"><?php echo $usuarios->usuario; ?></a></td>

                                        <td><?php echo $usuarios->rol; ?></td>
                                        <td><?php echo $usuarios->fecha_alta; ?></td>



                                            <td>
      <a href="../php/modificar_usuario.php?id=<?php echo $usuarios->id ?>">

      <i class="editar fa fa-pencil-square-o fa-2x"  aria-hidden="true"></i></a>
    </td>
    <td>

      <a  href="../php/bajalogica_usuario.php?id=<?php echo $usuarios->id; ?>"onclick="return confirm('¿Desea Dar de baja el usuario?')"> <i class="eliminar fa fa-user-times fa-2x" aria-hidden="true"></i></i></a>
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