<?php require '../views/menu/menuusuarios_activos.view.php';?>


<?php foreach ($rnombre as $nombre): ?>
  <div class="row">
 <div class="container">

<hr>
<div class="row">
<div class="col-sm-12">
<div class="input-group">
  <span class="input-group-addon" id="sizing-addon1"><i class="text-primary fa fa-user fa-2x" aria-hidden="true"></i></span>



&nbsp;
&nbsp;
&nbsp;


<strong>

	<p class="text-primary">

	 <?php echo $nombre->nombre; ?>, <?php echo $nombre->apellido; ?>
	</p>
	</strong>
	&nbsp;
	&nbsp;

</div>



</div>
</div>


<?php endforeach;?>


<hr>

<div class="row">
  <div class="col-sm-10 offset-2">

 <table  class="table table-bordered table-sm table-responsive">
  <thead class="thead-inverse">


  <tr>
                                                        <th colspan="7">
                                                            <h2>
                                                                <center>
Estadisticas del usuario
                                                                </center>
                                                            </h2>
                                                        </th>
                                                    </tr>
      <tr>

         <th>Cuentas</th>
         <th>Contactos</th>

            <th>Oportunidades</th>
          <th>Ganadas</th>
             <th>En Proceso</th>
                <th>Perdidas</th>


      </tr>
  </thead>





                                <tbody>
                                    <tr>


                                        <td>
                                        <center>
                                        	 <strong>
                                        	 <h2>
                                        	 	<?php foreach ($rcantcuentas as $cantcuentas): ?>
															<?php echo $cantcuentas->cantidadcuentas; ?>
                                        	    	<?php endforeach;?>
                                        	 </h2>
                                        </strong>
                                        </center>




                                        </td>



                                        <td>
                                        	<center>
                                        	 <strong>
                                        	 <h2>
                                        	 	<?php foreach ($rcantcontactos as $cantcontactos): ?>
															<?php echo $cantcontactos->cantidadcontactos; ?>
                                        	    	<?php endforeach;?>
                                        	 </h2>
                                        </strong>

                                        </td>
                                       <td>
                                       		<center>
                                        	 <strong>
                                        	 <h2>
                                        	 	<?php foreach ($roport as $oport): ?>
															<?php echo $oport->cantidadoportunidades; ?>
                                        	    	<?php endforeach;?>
                                        	 </h2>
                                        </strong>

                                       </td>
                                       <td>
                                           <center>
                                        	 <strong>
                                        	 <h2>
                                        	 	<?php foreach ($roportg as $oportg): ?>
															<?php echo $oportg->ganadas; ?>
                                        	    	<?php endforeach;?>
                                        	 </h2>
                                        </strong>
                                       </td>
                                        <td>
                                         <center>
                                        	 <strong>
                                        	 <h2>
                                        	 	<?php foreach ($roportep as $oportep): ?>
															<?php echo $oportep->enproceso; ?>
                                        	    	<?php endforeach;?>
                                        	 </h2>
                                      </strong>

                                       </td>
                                        <td>
                                         <strong>
                                        	 <h2>
                                        	 	<?php foreach ($roportp as $oportp): ?>
															<?php echo $oportp->perdidas; ?>
                                        	    	<?php endforeach;?>
                                        	 </h2>
                                        </strong>

                                       </td>


                                    </tr>
                                    </tbody>
</table>
</div>
</div>

<hr>


<?php foreach ($ractcuentas as $actcuentas): ?>

<?php echo $actcuentas->nombre; ?>, <?php echo $actcuentas->apellido; ?> creo la cuenta:

<a href="../php/cuenta_individual.php?id=<?php echo $actcuentas->cue_id; ?>"><?php echo $actcuentas->nombreempresa; ?> </a>


 ,

La fecha:
<?php echo $actcuentas->fecha_alta; ?>.

<br>
<?php endforeach;?>

<?php foreach ($ractcont as $actcont): ?>

<?php echo $actcont->empnom; ?>, <?php echo $actcont->empape; ?> creo el contacto:

<a href="../php/contacto_individual.php?id=<?php echo $actcont->con_id; ?>"><?php echo $actcont->nomcon; ?>, <?php echo $actcont->apecont; ?> </a>.


<br>
<?php endforeach;?>

<?php foreach ($ractopu as $actopu): ?>

<?php echo $actopu->nombre; ?>, <?php echo $actopu->apellido; ?> creo la oportunidad:

<a href="../php/oportunidad_individual.php?id=<?php echo $actopu->opu_id; ?>"><?php echo $actopu->tema; ?></a>
la fecha:
 <?php echo $actopu->fecha_alta; ?>.

<br>
<?php endforeach;?>

<?php foreach ($ropug as $opug): ?>

<?php echo $opug->nombre; ?>, <?php echo $opug->apellido; ?> ha ganado la oportunidad:

<a href="../php/oportunidad_individual.php?id=<?php echo $opug->opu_id; ?>"><?php echo $opug->tema; ?></a>

 Por $<?php echo $opug->ingresos_reales; ?>, la fecha: <?php echo $opug->fecha_cierre; ?>.

<br>
<?php endforeach;?>


<?php foreach ($ropup as $opup): ?>

<?php echo $opup->nombre; ?>, <?php echo $opup->apellido; ?> ha perdido la oportunidad:

<a href="../php/oportunidad_individual.php?id=<?php echo $opup->opu_id; ?>"><?php echo $opup->tema; ?></a>

  la fecha: <?php echo $opup->fecha_cierre; ?>.

<br>
<?php endforeach;?>








</div>
</div>

















 <?php include '../views/menu/footer.view.php';?>