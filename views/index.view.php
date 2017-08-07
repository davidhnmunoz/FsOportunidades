
<?php include 'menu/menuprincipal.view.php';?>



<body>





<hr>

  <center><h1>Mis Oportunidades Abiertas</h1></center>

  <div class="row">
  <div class="container">

<br>

<div class="col-md-6 offset-2"><?php if (isset($_GET['exito'])) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <strong>Exitos!</strong> La Oportunidad fue modificada con exitos del sistema.
    </div>';
    echo '<meta http-equiv="refresh" content="4;url=index.php">';
}?></div>
<div class="col-md-6 offset-2"><?php if (isset($_GET['exitocontra'])) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <strong>Exitos!</strong>La contraseña Fue Cambiadada Correctamente
    </div>';
    echo '<meta http-equiv="refresh" content="4;url=index.php">';
}?></div>
<div class="col-md-6 offset-2"><?php if (isset($_GET['exitoagregar'])) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <strong>Exitos!</strong>La oportunidad Fue Agregada Correctamente
    </div>';
    echo '<meta http-equiv="refresh" content="4;url=index.php">';
}?></div>
<div class="col-md-6 offset-2"><?php if (isset($_GET['exitomodificar'])) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <strong>Exitos!</strong>La oportunidad Fue Modificada Correctamente
    </div>';
    echo '<meta http-equiv="refresh" content="4;url=index.php">';
}?></div>
<div class="col-md-6 offset-2"><?php if (isset($_GET['eliminada'])) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <strong>Exitos!</strong>La oportunidad fue eliminada correctamente
    </div>';
    echo '<meta http-equiv="refresh" content="4;url=index.php">';
}?></div>
  </div>
  </div>
   <div class="row">
<div class="container" >
<div class="col-sm-9 offset-1">
  <!-- Errores sIN DATOS -->

<?php
if ($roportunidades == false) {

    echo ' <div class="col-sm-8 offset-3">
                <div class="alert alert-warning" role="alert">

                    <strong>Usted no tiene Oportunidades Abiertas Por favor cree una</strong>
                </div>
            <?php endif;?>
            </div>';
} else {
    echo '  <table class="table table-sm table-bordered  table-responsive">
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
  </thead>';
}

?>





<!-- Errores SINDATOS -->



                      <?php foreach ($roportunidades as $oportunidades): {
    }?>
                                                                                                                          <tbody>
                                                                                                                               <tr>
                                                                                                                                    <td><a href="oportunidad_individual.php?id=<?php echo $oportunidades->opu_id; ?>">
                                                                                                                                                                    <?php echo $oportunidades->tema; ?></a></td>
                                                                                                                                    <td><?php echo $oportunidades->area ?></td>
                                                                                                                                    <td><a href="../php/cuenta_individual.php?id=<?php echo $oportunidades->cue_id; ?>">
                                                                                                                                      <?php echo $oportunidades->nombreempresa; ?></a></td>
                                                                                                                                    <td><a href="../php/contacto_individual.php?id=<?php echo $oportunidades->con_id; ?>">
                                                                                                                                     <?php echo $oportunidades->nombre ?>,
                                                                                                                                       <?php echo $oportunidades->apellido ?></a></td>
                                                                                                                                    <td><?php echo $oportunidades->email ?></td>
                                                                                                                                    <td><?php echo $oportunidades->telefono ?></td>
                                                                                                                                    <td>
                                                                                                            <a href="../php/modificar_oportunidad.php?id=<?php echo $oportunidades->opu_id ?>">

                                                                                                            <i class="editar fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a></td>
                                                                                                            <td>
                                                                                                               <a href="../php/eliminar_oportunidad.php?id=<?php echo $oportunidades->opu_id ?>"onclick="return confirm('¿Desea eliminar la oportunidad permanentemente?')">

                                                                                                            <i class="eliminar fa fa-trash fa-2x" aria-hidden="true"></i></a>
                                                                                                            </td>


                                                                                                                              </tr>
                                                                                                                         </tbody><?php endforeach;?>
        </table>
        </div>
      </div>
</div>


</body>
</html>
<?php include 'menu/footer.view.php';?>