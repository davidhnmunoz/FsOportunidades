
<?php include 'menu/menuprincipal.view.php';?>


<hr>
  <center><h1>Bienvenidos a Fs Oportunidades</h1></center>
  <div class="row">
<div class="col-md-3"></div>
<div class="col-md-5"><?php if (isset($_GET['exito'])) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <strong>Exitos!</strong> La Oportunidad fue modificada con exitos del sistema.
    </div>';
    echo '<meta http-equiv="refresh" content="4;url=index.php">';
}?></div>
  </div>
   <div class="row">
<div class="container" >
  <table class="table table-bordered">
  <thead class="thead-inverse">
      <tr>
         <th>Tema</th>
         <th>Fecha De Modificacion</th>
         <th>Ingresos Estimados</th>
         <th>Importe presupuesto</th>
         <th>Importe</th>
         <th>Situacion <br> Actual</th>
         <th>Necesidad<br>cliente</th>
         <th>Solucion<br> propuesta</th>

      </tr>
  </thead>

      <?php foreach ($roportunidades as $oportunidades): {
    }?>
                            <tbody>
                                <tr>
                                    <td><?php echo $oportunidades->tema ?></td>
                                    <td><?php echo $oportunidades->fechamodificacion ?></td>

                                    <td><?php echo $oportunidades->ingresosestimados ?></td>
                                    <td><?php echo $oportunidades->importepresupuesto ?></td>
                                    <td><?php echo $oportunidades->importe ?></td>
                                    <td><?php echo $oportunidades->situacionactual ?></td>
                                    <td><?php echo $oportunidades->necesidadcliente ?></td>
                                    <td><?php echo $oportunidades->solucionpropuesta ?></td>

                                </tr>
                                </tbody><?php endforeach;?>
  </table>
</div>
</div>


</body>
</html>
<?php include 'menu/footer.view.php';?>