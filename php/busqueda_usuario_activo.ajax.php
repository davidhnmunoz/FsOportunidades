<?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}
require 'conexion.php';

require '../views/menu/menuusuarios_activos.view.php';?>
<hr>

<div class="row" >
<div class="container">


<div class="col-sm-8 offset-2">

<nav class="navbar navbar-light  justify-content-between">

  <form class="form-inline">


  <button type="button" class="btn  btn-primary active " >

  Nombre de usuario:


  </button>
    <input class="form-control mr-sm-2" onkeyup="buscar(this.value)" type="text" placeholder="buscar">

  </form>
</nav>
</div>
</div>
</div>


            <p>
                <span id="txtSearchResult">
                </span>
                <script>
                    function buscar(str)
{
     if (str.length == 0)
     {
          document.getElementById("txtSearchResult").innerHTML = "";
          return;
     }
     else
     {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function()
          {
                  if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                  {
                         document.getElementById("txtSearchResult").innerHTML = xmlhttp.responseText;                      }
       }
       xmlhttp.open("GET", "busqueda_usuario_activo.php?txtName=" + str, true);
       xmlhttp.send();
     }
}
                </script>
            </p>
