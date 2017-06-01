<?php
include '../views/menu/menuprincipal.view.php';?>


<hr>
  <div class="container">
<div class="row">
  <center><h1>Direcciones</h1></center>
  </div>
  </div>
  <br>
  <div class="container">
<div class="row">
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="#">Active</a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Provincia</a>
    <div class="dropdown-menu">
      <?php foreach ($provincias as $rprovincias): {
    }?>
         <a class="dropdown-item" >    <?php echo $rprovincias['nombre']; ?></a>
                    <?php endforeach;?>
      <div class="dropdown-divider"></div>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#">Disabled</a>
  </li>
</ul>

</div>
</div>



</body>
</html>
