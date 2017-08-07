<?php include '../views/menu/menuprincipal.view.php';?>
<?php foreach ($roportunidades as $oportunidades): {
    }?>
                                                    <hr>
                                                        <div class="row">
                                                            <div class="col-sm-8 offset-2">
                                                                <table class="table table-bordered table-sm table-responsive">
                                                                    <thead class="thead-inverse">
                                                                        <tr>
                                                                            <div class="row">
                                                                                <div class="container">
                                                                                    <div class="col-sm-8 offset-1">
                                                                                        <table class="table table-sm table-bordered table-responsive">
                                                                                            <thead class="thead-inverse">
                                                                                                <tr>
                                                                                                    <th colspan="5">
                                                                                                        <h2>
                                                                                                            <center>
                                                                                                                <?php echo $oportunidades->tema; ?>
                                                                                                            </center>
                                                                                                        </h2>
                                                                                                    </th>
                                                                                                </tr>
                                                                                                <tr>
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
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <tr>
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
                                                                                                            <?php echo $oportunidades->nombrecontacto ?>,
                                                                                                            <?php echo $oportunidades->apellidocontacto ?>
                                                                                                        </a>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <?php echo $oportunidades->email ?>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <?php echo $oportunidades->telefono ?>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </tr>
                                                                    </thead>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-8 offset-3">
                                                                <table class="table table-bordered table-sm table-responsive">
                                                                    <thead class="thead-inverse">


                                                                                        <table class="table table-sm table-bordered table-responsive">
                                                                                            <thead class="thead-inverse">
                                                                                                <tr>
                                                                                                    <th colspan="3">
                                                                                                        <h2>
                                                                                                            <center>
                                                                                                                Fechas
                                                                                                            </center>
                                                                                                        </h2>
                                                                                                    </th>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th>
                                                                                                        <center>
                                                                                                            Fecha Alta
                                                                                                        </center>
                                                                                                    </th>
                                                                                                    <th>
                                                                                                        <center>
                                                                                                            Fecha Modificacion
                                                                                                        </center>
                                                                                                    </th>
                                                                                                    <th>
                                                                                                        <center>
                                                                                                            Fecha Cierre
                                                                                                        </center>
                                                                                                    </th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        <?php echo $oportunidades->fecha_alta; ?>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <?php echo $oportunidades->fecha_modificacion ?>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <?php echo $oportunidades->fecha_cierre; ?>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>

                                                                        </tr>
                                                                    </thead>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-8 offset-3">
                                                                <table class="table table-bordered table-sm table-responsive">
                                                                    <thead class="thead-inverse">
                                                                        <tr>
                                                                            <div class="row">
                                                                                <div class="container">
                                                                                    <div class="col-sm-7 offset-1">
                                                                                        <table class="table table-sm table-bordered table-responsive">
                                                                                            <thead class="thead-inverse">
                                                                                                <tr>
                                                                                                    <th colspan="4">
                                                                                                        <h2>
                                                                                                            <center>
                                                                                                                Importes e Ingresos
                                                                                                            </center>
                                                                                                        </h2>
                                                                                                    </th>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th>
                                                                                                        <center>
                                                                                                            Importe Presupuesto
                                                                                                        </center>
                                                                                                    </th>
                                                                                                    <th>
                                                                                                        <center>
                                                                                                            Importe Real
                                                                                                        </center>
                                                                                                    </th>
                                                                                                    <th>
                                                                                                        <center>
                                                                                                            Ingresos Estimados
                                                                                                        </center>
                                                                                                    </th>
                                                                                                    <th>
                                                                                                        <center>
                                                                                                            Ingresos Reales
                                                                                                        </center>
                                                                                                    </th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        <?php echo $oportunidades->importe_presupuesto ?>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <?php echo $oportunidades->ingresos_reales; ?>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <?php echo $oportunidades->ingresos_estimados; ?>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <?php echo $oportunidades->importe; ?>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </tr>
                                                                    </thead>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-8 offset-2">
                                                                <table class="table table-sm table-bordered table-responsive">
                                                                    <thead class="thead-inverse">
                                                                        <tr>
                                                                            <th colspan="2">
                                                                                <h2>
                                                                                    <center>
                                                                                        Detalles
                                                                                    </center>
                                                                                </h2>
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody class="thead-inverse">
                                                                        <tr>
                                                                            <th scope="row">
                                                                                Situacion Actual
                                                                            </th>
                                                                            <td>
                                                                                <?php echo $oportunidades->situacionactual ?>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">
                                                                                Necesidad Cliente
                                                                            </th>
                                                                            <td>
                                                                                <?php echo $oportunidades->necesidadcliente; ?>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">
                                                                                Solucion Propuesta
                                                                            </th>
                                                                            <td>
                                                                                <?php echo $oportunidades->solucionpropuesta; ?>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th  scope="row">
                                                                                Descripcion
                                                                            </th>
                                                                            <td>
                                                                                <?php echo $oportunidades->descripcion; ?>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-8 offset-2">
                                                                <div class="d-flex flex-row justify-content-center bg-inverse text-white">
                                                                    <div class="p-2">
                                                                        <h3>
                                                                            Oportunidad Creada Por:
                                                                        </h3>
                                                                    </div>
                                                                    <div class="p-2">
                                                                        <h3>
                                                                            <?php echo $oportunidades->nombre ?>
                                                                            <?php echo $oportunidades->apellido ?>
                                                                        </h3>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php endforeach;?>
    </div>
</hr>