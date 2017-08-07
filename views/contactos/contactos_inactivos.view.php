<?php
require '../views/menu/menucontactos_inactivo.view.php';
?>



<hr>
  <center><h1>Contactos Inactivos</h1></center>
  <br>
  <div class="col-sm-7 offset-2">

  <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" href="../php/index_contactos.php">
                                    Contacto Activos
                                </a>


  </li>
  <li class="nav-item">
    <a class="nav-link " href="../php/agregar_contacto.php">Agregar contacto</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active bg-primary text-white " href="../php/contactos_inactivos.php">
                                    Contacto Inactivos</a>
  </li>
</div>
<br>


<div class="row">
<div class="col-md-3"></div>
<div class="col-md-5"><?php if (isset($_GET['exito'])) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <strong>Exitos!</strong> El contacto fue modificada con exitos del sistema.
    </div>';
    echo '<meta http-equiv="refresh" content="4;url=index_cuenta.php">';
}?></div>
  </div>
 <div class="row">
<div class="container" >

<?php
if ($rcontactos == false) {

    echo ' <div class="col-sm-5 offset-3">
                <div class="alert alert-success" role="alert">

                    <strong>Felicidades Usted no tiene Contactos Inactivos</strong>
                </div>
            <?php endif;?>
            </div>';
} else {
    echo '  <div class="col-sm-10 offset-2">
      <table class="table table-bordered  table-sm table-responsive">
      <thead class="thead-inverse">
      <tr>
         <th>Nombre</th>
         <th>Email</th>
         <th>Telefono</th>


         <th colspan="3">Accion</th>
      </tr>
      </thead> ';
}

?>











      <?php foreach ($rcontactos as $contactos): ?>
                                <tbody>
                                    <tr>
                                        <td><a href="../php/contacto_individual.php?id=<?php echo $contactos->id; ?>"><?php echo $contactos->nombre; ?> <?php echo $contactos->apellido; ?></a></td>

                                        <td><?php echo $contactos->email; ?></td>
                                        <td><?php echo $contactos->telefono; ?></td>



                                            <td>
      <a href="../php/modificar_contacto.php?id=<?php echo $contactos->id ?>">

      <i class="editar fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
    </td>
    <td>

    <a   href="../php/alta_contactos.php?id=<?php echo $contactos->id ?>"onclick="return confirm('¿Desea Dar de Alta el contacto?')"><i class="alta fa fa-user-plus fa-2x" aria-hidden="true"></i></a>
</td>
<td>

<a  href="../php/eliminar_contacto.php?id=<?php echo $contactos->id; ?>"onclick="return confirm('¿Desea eliminar  contacto Permanentemente?')"> <i class="eliminar fa fa-trash-o fa-2x" aria-hidden="true"></i></a>
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