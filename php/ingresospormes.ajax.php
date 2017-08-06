<?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}
include '../views/menu/menuprincipal.view.php';?>


<hr>
<h1 align="center"><i class= "text-success fa fa-usd fa-spin fa-lg fa-fw" aria-hidden="true">&nbsp;</i>Ingresos reales por mes </h1>
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
            url: '../php/ingresospormes.php',
            data: 'año=' + año,
            success: function(data) {
                var valores = eval(data);
                var e = valores[0];
                var f = valores[1];
                var m = valores[2];
                var a = valores[3];
                var ma = valores[4];
                var j = valores[5];
                var jl = valores[6];
                var ag = valores[7];
                var s = valores[8];
                var o = valores[9];
                var n = valores[10];
                var d = valores[11];
                var Datos = {
                    labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                    datasets: [{
                        fillColor: 'rgba(91,228,146,0.6)', //COLOR DE LAS BARRAS
                        strokeColor: 'rgba(57,194,112,0.7)', //COLOR DEL BORDE DE LAS BARRAS
                        highlightFill: 'rgba(73,206,180,0.6)', //COLOR "HOVER" DE LAS BARRAS
                        highlightStroke: 'rgba(66,196,157,0.7)', //COLOR "HOVER" DEL BORDE DE LAS BARRAS
                        data: [e, f, m, a, ma, j, jl, ag, s, o, n, d]
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