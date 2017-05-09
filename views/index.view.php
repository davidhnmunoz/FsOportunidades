<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Index</title>
	<link href="css/metro.min.css" rel="stylesheet">
	<link href="css/estilos.css" rel="stylesheet">
    <link href="css/reloj.css" rel="stylesheet">
    <link rel="stylesheet" href="css/alertify.min.css" />
    <link rel="stylesheet" href="css/default.min.css" />
    <script src="js/alertify.min.js"></script>
    <script src="https://use.fontawesome.com/5fe7ff4e50.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/metro.js"></script>
    <script type="text/javascript">
     function alert(){

     alertify.confirm("<h3><br> Desea realmenta eliminar al usuario?",
  function(){
    alertify.success('Aceptar');
  },
  function(){
    alertify.error('Cancelar');
  });
      }
    </script>
</head>
<body>
	
     <li class="li">
            <?php if(isset($_SESSION['usuario'])) : ?>
        <?php endif ;?>
        <a href="#" class="dropdown-toggle"><strong>Bienvenido...</strong><?php echo ucwords( $_SESSION['usuario']);?></a>
        <ul  class="d-menu" data-role="dropdown">
            <li><a href="cerrar.php">Cerrar Sesion</a></li>
            <li><a href="#">Partners</a></li>
        </ul>
     <li>
    </li>
    </ul>

<center><h1>Bienvenidos a Fs Oportunidades</h1></center>
<table>
<thead>
    <tr>
       <th>Tema</th>
       <th>Fecha De Modificacion</th>
       <th>fechacierre</th>
       <th>ingresosestimados</th>
       <th>importepresupuesto</th>
       <th>importe</th>
       <th>situacionactual</th>
       <th>necesidadcliente</th>
       <th>solucionpropuesta</th>
       <th>descripcion</th>
    </tr>
</thead>
    <?php foreach ($oportunidades as $roportunidades ): {
} ?>
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
    <?php endforeach; ?>   
</table>


<footer>
 <div class="wrap">
        
            <div class="fecha">
                <span id="diaSemana" class="diaSemana">Martes</span>
                <span id="dia" class="dia">27</span>
                <span>de </span>
                <span id="mes" class="mes">Octubre</span>
                <span>del </span>
                <span id="year" class="year">2015 </span> 
                <span id="horas" class="horas">11</span>
                <span>:</span>
                <span id="minutos" class="minutos">48</span>
                
            </div>
        
    </div>
    <script src="js/reloj.js"></script> 
       <small>    
     
       </small>
    
</footer>
</body>
</html>
