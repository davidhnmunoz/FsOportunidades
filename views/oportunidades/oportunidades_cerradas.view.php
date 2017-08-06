<?php include '../views/menu/menuprincipal.view.php';?>
<hr>
    <center>
        <h1>
            Oportunidades Cerradas
        </h1>
    </center>
</hr>
<div class="row">
    <div class="container">
        <div class="col-sm-11 offset-2">
            <table class="table table-sm table-bordered table-responsive">
                <thead class="thead-inverse">
                    <tr>


                        <th>
                            <center>
                                Tema
                            </center>
                        </th>
                        <th>
                            <center>
                                Cuenta
                            </center>
                        </th>
                        <th>
                            <center>
                                Estado
                            </center>
                        </th>
                        <th>
                            <center>
                                Ingresos Reales
                            </center>
                        </th>
                        <th>
                          Cierre
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

                                                                                            <td>
                                                                                                <a href="oportunidad_individual.php?id=<?php echo $oportunidades->opu_id; ?>">
                                                                                                    <?php echo $oportunidades->tema; ?>
                                                                                                </a>
                                                                                            </td>
                                                                                            <td>
                                                                                                <a href="../php/cuenta_individual.php?id=<?php echo $oportunidades->cue_id; ?>">
                                                                                                    <?php echo $oportunidades->nombreempresa; ?>
                                                                                                </a>
                                                                                            </td>
                                                                                            <!-- SELECT ESTADO -->

                                                                                                <?php $oportunidades->estado;

    $estado = $oportunidades->estado;
    if ($estado == 'GANADA') {
        echo '<td>
                                                                                              <p class="text-success"><strong>GANADA!</strong></p>
                                                                                                  </td>';
    } else {
        echo '<td>
                                                                                                <p class="text-danger"><strong>PERDIDA!</strong></p>
                                                                                              </td>';
    }

    ?>

                                                                                      <td>
                                                                                          $<?php echo $oportunidades->ingresos_reales ?>
                                                                                      </td>
                                                                        <td>
                                                                          <?php echo $oportunidades->fecha_cierre ?>

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
                                                                                          <?php endforeach;?>
                          </td>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include '../views/menu/footer.view.php';?>
