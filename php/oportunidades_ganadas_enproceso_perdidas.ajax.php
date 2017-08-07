<?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}
include '../views/menu/menuestadisticas.view.php';?>


<hr>
<h1 align="center"><i class= "text-success fa fa-usd fa-spin fa-lg fa-fw" aria-hidden="true">&nbsp;</i>Oportunidades En Proceso Ganadas y perdidas </h1>
<br>
<div class="row">
<div class="container">
<div class="col-sm-10">

  <ul class="nav nav-tabs">



<li class="nav-item">
    <a class="nav-link  " href="../php/index_estadisticas.php">
                                        Marcador de ventas
                                    </a>


  </li>

  <li class="nav-item">
    <a class="nav-link  " href="../php/cuentas_principales.ajax.php">
                                        Cuentas Principales

</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active bg-primary text-white" href="../php/oportunidades_ganadas_enproceso_perdidas.ajax.php">
                                        En Proceso Ganadas y perdidas
                                    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="../php/ingresospormes.ajax.php">
                                        Ingresos por mes
                                    </a>
  </li>
  </ul>
</div>
        <div class="caja col-sm-4">
            <select onChange="mostrarResultados(this.value);">
                <?php
for ($i = 2014; $i < 2018; $i++) {
    if ($i == 2017) {
        echo '<option value="' . $i . '" selected>' . $i . '</option>';
    } else {
        echo '<option value="' . $i . '">' . $i . '</option>';
    }
}
?>
            </select>
        </div>
        <div class="col-sm-10"><canvas id="grafico"></canvas>
        </div>
</div>
</div>

        <script>




    $(document).ready(mostrarResultados(2017));

    function mostrarResultados(año) {
        $.ajax({
            type: 'POST',
            url: '../php/oportunidades_ganadas_enproceso_perdidas.php',
            data: 'año=' + año,
            success: function(data) {
                var valores = eval(data);
                var g = valores[0];
                var p = valores[1];
                var ep = valores[2];

                var Datos = {
                    labels: ['Ganadas', 'En Proceso', 'Perdidas'],

                    datasets: [{
                        fillColor: 'rgba(91,221,146,0.6)', //COLOR DE LAS BARRAS
                        strokeColor: 'rgba(57,194,112,0.7)', //COLOR DEL BORDE DE LAS BARRAS
                        highlightFill: 'rgba(73,206,180,0.6)', //COLOR "HOVER" DE LAS BARRAS
                        highlightStroke: 'rgba(66,196,157,0.7)', //COLOR "HOVER" DEL BORDE DE LAS BARRAS

                        data: [g, p, ep]

                    }]
                }
                var contexto = document.getElementById('grafico').getContext('2d');
                window.Barra = new Chart(contexto).Bar(Datos, {
                    responsive: true
                });
            }
        });
        return false;
    }

 </script>