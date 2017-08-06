<?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}
include '../views/menu/menuprincipal.view.php';?>


<hr>
<h1 align="center"><i class= "text-success fa fa-usd fa-spin fa-lg fa-fw" aria-hidden="true">&nbsp;</i>Ventas Por usuarios </h1>
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
            url: '../php/marcador_ventas.php',
            data: 'año=' + año,
            success: function(data) {
                var valores = eval(data);
                var a = valores[0];
                var b = valores[1];
                var c = valores[2];
                var d = valores[3];
                var e = valores[4];
                var f = valores[5];
                var g  = valores[6];
                var h  = valores[7];
                var i  = valores[8];
                var j  = valores[9];
                var k  = valores[10];
                var l  = valores[11];


                var Datos = {
                    labels: [g , h , i, j , k , l ],
                    datasets: [{
                        fillColor: 'rgba(91,228,146,0.6)', //COLOR DE LAS BARRAS
                        strokeColor: 'rgba(57,194,112,0.7)', //COLOR DEL BORDE DE LAS BARRAS
                        highlightFill: 'rgba(73,206,180,0.6)', //COLOR "HOVER" DE LAS BARRAS
                        highlightStroke: 'rgba(66,196,157,0.7)', //COLOR "HOVER" DEL BORDE DE LAS BARRAS
                        data: [a, b, c , d, e, f]
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