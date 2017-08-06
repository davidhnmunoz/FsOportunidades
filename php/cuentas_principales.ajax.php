<?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}
include '../views/menu/menuprincipal.view.php';?>


<hr>
<h1 align="center"><i class= "text-success fa fa-usd fa-spin fa-lg fa-fw" aria-hidden="true">&nbsp;</i>Cuentas Principales </h1>
<div class="row">
<div class="container">
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
            url: '../php/cuentas_principales.php',
            data: 'año=' + año,
            success: function(data) {
                var valores = eval(data);
                var primero = valores[0];
                var segundo = valores[1];
                var tercero = valores[2];
                var cuarto = valores[3];
                var quinto = valores[4];
                var sexto = valores[5];
                var setpimo = valores[6];
                var octavo = valores[7];
                var noveno = valores[8];
                var decimo = valores[9];



                var Datos = {
                    labels: [sexto, setpimo, octavo, noveno, decimo],
                    datasets: [{
                        fillColor: 'rgba(91,228,146,0.6)', //COLOR DE LAS BARRAS
                        strokeColor: 'rgba(57,194,112,0.7)', //COLOR DEL BORDE DE LAS BARRAS
                        highlightFill: 'rgba(73,206,180,0.6)', //COLOR "HOVER" DE LAS BARRAS
                        highlightStroke: 'rgba(66,196,157,0.7)', //COLOR "HOVER" DEL BORDE DE LAS BARRAS
                        data: [primero, segundo, tercero,cuarto,quinto]
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