
<?php require '../views/menu/menuprincipal.view.php';?>
<hr>
  <center><h1>CUENTAS ACTIVAS</h1></center>

<div class="row">
<div class="col-md-3"></div>
<div class="col-md-5"><?php if (isset($_GET['exito'])) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <strong>Exitos!</strong> La cuenta fue modificada con exitos del sistema.
    </div>';
    echo '<meta http-equiv="refresh" content="4;url=index_cuenta.php">';
}?></div>
  </div>
 <div class="row">
<div class="container" >

 <div class="col-sm-10 offset-1">
      <table class="table table-bordered  table-sm table-responsive">
      <thead class="thead-inverse">
      <tr>
         <th>Empresa</th>
         <th>Telefono</th>

         <th>Sitioweb</th>
         <th>Cuit</th>



         <th colspan="2">Accion</th>
      </tr>
      </thead>




      <?php foreach ($rcuentas as $cuentas): ?>
                                <tbody>
                                    <tr>
                                        <td><a href="../php/cuenta_individual.php?id=<?php echo $cuentas->id; ?>"><?php echo $cuentas->nombreempresa; ?> </a></td>
                                        <td><?php echo $cuentas->telefono; ?></td>

                                        <td><?php echo $cuentas->sitioweb; ?></td>
                                        <td><?php echo $cuentas->cuit; ?></td>


                                            <td>
      <a href="../php/modificar_cuenta.php?id=<?php echo $cuentas->id ?>">

      <i class="editar fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
    </td>
    <td>

      <a  href="../php/bajalogica_cuentas.php?id=<?php echo $cuentas->id; ?>"onclick="return confirm('¿Desea Dar de baja la cuenta?')"> <i class="eliminar fa fa-user-times fa-2x" aria-hidden="true"></i></i></a>
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