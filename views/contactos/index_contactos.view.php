<?php require '../views/menu/menucontactos_activo.view.php';?>



<hr>
  <center><h1>Contactos Activos</h1></center>

<div class="row">
<div class="col-md-3"></div>
<div class="col-md-5"><?php if (isset($_GET['exito'])) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <strong>Exitos!</strong> El contacto fue modificada con exito del sistema.
    </div>';
    echo '<meta http-equiv="refresh" content="4;url=index_contactos.php">';
}?></div>
  </div>
 <div class="row">
<div class="container" >

 <div class="col-sm-10 offset-2">
      <table class="table table-bordered  table-sm table-responsive">
      <thead class="thead-inverse">
      <tr>
         <th>Nombre</th>

         <th>Email</th>
         <th>Telefono</th>


         <th colspan="2">Accion</th>
      </tr>
      </thead>




      <?php foreach ($rcontactos as $contactos): ?>
                                <tbody>
                                    <tr>
                                        <td><a href="../php/contacto_individual.php?id=<?php echo $contactos->id; ?>"><?php echo $contactos->nombre; ?>
                                        <?php echo $contactos->apellido; ?></a></td>

                                        <td><?php echo $contactos->email; ?></td>
                                        <td><?php echo $contactos->telefono; ?></td>



                                            <td>
      <a href="../php/modificar_contacto.php?id=<?php echo $contactos->id ?>">

      <i class="editar fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
    </td>
    <td>

      <a  href="../php/bajalogica_contactos.php?id=<?php echo $contactos->id; ?>"onclick="return confirm('¿Desea Dar de baja el contacto?')"> <i class="eliminar fa fa-user-times fa-2x" aria-hidden="true"></i></i></a>
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