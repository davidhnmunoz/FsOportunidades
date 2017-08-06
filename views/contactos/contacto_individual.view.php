<?php require '../views/menu/menucontactos_activo.view.php';?>



<hr>


 <div class="row">
<div class="container" >

 <div class="col-sm-10 offset-1">
      <table class="table table-bordered  table-sm table-responsive">
      <thead class="thead-inverse">
        <tr>
                                                        <th colspan="6">
                                                            <h2>
                                                                <center>
                                                          <center><h1>Informacion del contacto</h1></center>
                                                                </center>
                                                            </h2>
                                                        </th>
                                                    </tr>
      <tr>
         <th><center>Nombre</center></th>
          <th><center>Cuenta</center></th>
         <th><center>Email</center></th>
         <th><center>Telefono</center></th>

        <th><center>Creado Por</center></th>
         <th ><center>Accion</center></th>
      </tr>
      </thead>




      <?php foreach ($rcontactos as $contactos): ?>
                                <tbody>
                                    <tr>
                                        <td><a href="../php/contacto_individual.php?id=<?php echo $contactos->id; ?>"><?php echo $contactos->nombre; ?>
                                        <?php echo $contactos->apellido; ?></a></td>
                                          <td><a href="../php/cuenta_individual.php?id=<?php echo $contactos->cuenta_id; ?>"><?php echo $contactos->nombreempresa; ?>
                                        </a></td>
                                        <td><?php echo $contactos->email; ?></td>
                                        <td><?php echo $contactos->telefono; ?></td>
                                        <td>

                                            <?php echo $contactos->nemp; ?>
                                        <?php echo $contactos->aemp; ?></a>
                                        </td>


                                            <td>
      <a href="../php/modificar_contacto.php?id=<?php echo $contactos->id ?>">

      <i class="editar fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
    </td>



                                    </tr>
                                    </tbody><?php endforeach;?>
      </table>

 </div>
 </div>
</div>



    </body>
    </html>
<?php include '../views/menu/footer.view.php';?>