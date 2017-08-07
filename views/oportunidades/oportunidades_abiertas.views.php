<?php include '../views/menu/menuoportunidades.view.php';?>
<hr>
    <center>
        <h1>
            Oportunidades Abiertas

        </h1>
    </center>
    <br>
    <div class="row">
        <div class="container">
            <div class="col-sm-12">

   <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link " href="../php/index_oportunidades.php">Mis oportinidades Abiertas</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="../php/agregar_oportunidad.php">Agregar Oportunidad</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active bg-primary text-white" href="../php/oportunidades_abiertas.php">Oportunidades Abiertas</a>
  </li>
    <li class="nav-item">
    <a class="nav-link" href="../php/oportunidades_cerradas.php">Oportunidades Cerradas</a>
  </li>
    <li class="nav-item">
    <a class="nav-link" href="../php/oportunidades_ganadas.php">Oportunidades Ganadas</a>
  </li>
    <li class="nav-item">
    <a class="nav-link" href="../php/oportunidades_perdidas.php">Oportunidades Perdidas</a>
  </li>
    <li class="nav-item">
    <a class="nav-link" href="../php/oportunidades_postergadas.php">Oportunidades Postergadas</a>
  </li>

</ul>
<br>


                <table class="table table-sm table-bordered table-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th>
                                Ingresos Estimados
                            </th>
                            <th>
                                <center>
                                    Tema
                                </center>
                            </th>
                            <th>
                                Cierre
                            </th>
                            <th>
                                <center>
                                    Area
                                </center>
                            </th>
                            <th>
                                <center>
                                    Cuenta
                                </center>
                            </th>
                            <th>
                                <center>
                                    Contacto
                                </center>
                            </th>
                            <th>
                                <center>
                                    Correo Electronico
                                </center>
                            </th>
                            <th>
                                <center>
                                    Telefono
                                </center>
                            </th>
                            <th colspan="2">
                                Accion
                            </th>
                        </tr>
                    </thead>
                    <?php foreach ($roportunidades as $oportunidades): {
    }?>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>$
                                                                                <?php echo $oportunidades->ingresos_estimados; ?>
                                                                            </td>

                                                                            <td>
                                                                                <a href="oportunidad_individual.php?id=<?php echo $oportunidades->opu_id; ?>">
                                                                                    <?php echo $oportunidades->tema; ?>
                                                                                </a>
                                                                            </td>
                                                                            <td>
                                                                                <?php echo $oportunidades->fecha_cierre; ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php echo $oportunidades->area ?>
                                                                            </td>
                                                                            <td>
                                                                                <a href="../php/cuenta_individual.php?id=<?php echo $oportunidades->cue_id; ?>">
                                                                                    <?php echo $oportunidades->nombreempresa; ?>
                                                                                </a>
                                                                            </td>
                                                                            <td>
                                                                                <a href="../php/contacto_individual.php?id=<?php echo $oportunidades->con_id; ?>">
                                                                                    <?php echo $oportunidades->nombre ?>,
                                                                                    <?php echo $oportunidades->apellido ?>
                                                                                </a>
                                                                            </td>
                                                                            <td>
                                                                                <?php echo $oportunidades->email ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php echo $oportunidades->telefono ?>
                                                                            </td>
                                                                            <td>
                                                                                <a href="../php/modificar_oportunidad.php?id=<?php echo $oportunidades->opu_id ?>">
                                                                                    <i aria-hidden="true" class="editar fa fa-pencil-square-o fa-2x">
                                                                                    </i>
                                                                                </a>
                                                                            </td>
                                                                            <td>
                                                                                <a href="../php/eliminar_oportunidad.php?id=<?php echo $oportunidades->opu_id ?>" onclick="return confirm('¿Desea eliminar la oportunidad permanentemente?')">
                                                                                    <i aria-hidden="true" class="eliminar fa fa-trash fa-2x">
                                                                                    </i>
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                    <?php endforeach;?>
                </table>
            </div>
        </div>
    </div>
</hr>
<?php include '../views/menu/footer.view.php';?>
