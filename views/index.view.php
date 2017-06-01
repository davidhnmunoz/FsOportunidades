
<?php include 'menu/menuprincipal.view.php';?>


<hr>
  <center><h1>Bienvenidos a Fs Oportunidades</h1></center>
  <table class="table table-bordered">
  <thead class="thead-inverse">
      <tr>
         <th>Tema</th>
         <th>Fecha De Modificacion</th>
         <th>Fecha cierre</th>
         <th>Ingresos Estimados</th>
         <th>Importe presupuesto</th>
         <th>Importe</th>
         <th>Situacion <br> Actual</th>
         <th>Necesidad<br>cliente</th>
         <th>Solucion<br> propuesta</th>
         <th>Descripcion</th>
      </tr>
  </thead>
      <?php foreach ($oportunidades as $roportunidades): {
    }?>
                <tbody>
                    <tr>
                        <td><?php echo $roportunidades['tema']; ?></td>
                        <td><?php echo $roportunidades['fechamodificacion']; ?></td>
                        <td><?php echo $roportunidades['fechacierre']; ?></td>
                        <td><?php echo $roportunidades['ingresosestimados']; ?></td>
                        <td><?php echo $roportunidades['importepresupuesto']; ?></td>
                        <td><?php echo $roportunidades['importe']; ?></td>
                        <td><?php echo $roportunidades['situacionactual']; ?></td>
                        <td><?php echo $roportunidades['necesidadcliente']; ?></td>
                        <td><?php echo $roportunidades['solucionpropuesta']; ?></td>
                        <td><?php echo $roportunidades['descripcion']; ?></td>
                    </tr>
                    </tbody><?php endforeach;?>
  </table>



</body>
</html>
<?php include 'menu/footer.view.php';?>