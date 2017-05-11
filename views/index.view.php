
<?php include 'menu/menuprincipal.view.php'; ?>
	
    
<hr>
  <center><h1>Bienvenidos a Fs Oportunidades</h1></center>
<div class="container">
    <div class="row">
  <table class="table table-bordered">
  <thead class="thead-inverse">
      <tr>
         <th>Tema</th>
         <th>Fecha De Modificacion</th>
         <th>Fecha cierre</th>
         <th>Ingresos Estimados</th>
         <th>Importepresupuesto</th>
         <th>Importe</th>
         <th>SituacionActual</th>
         <th>Necesidadcliente</th>
         <th>Solucionpropuesta</th>
         <th>Descripcion</th>
      </tr>
  </thead>
      <?php foreach ($oportunidades as $roportunidades ): {
  } ?>
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
      </tbody><?php endforeach; ?>   
  </table>
</div>
</div>


</body>
</html>
