<?php include '../views/menu/menuprincipal.view.php';?>

     <script src="../assets/js/validarpass.js"></script>

        <div aria-hidden="true" aria-labelledby="exampleModalLabel"  id="exampleModal" role="dialog" tabindex="-1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
<div class="col-sm-12">
 <?php if (!empty($enviado)): ?>
<div class="col-sm-8 offset-2">
            <div class="alert alert-success">
            <?php echo $enviado; ?>
            </div>
  <?php endif;?>
</div>
</div>

                        <div class="col-sm-12">

                        <div class="alert alert-danger alert-dismissible fade show" role="alert">


      <strong>Por favor cambie: </strong>Su contraseña
    </div>
                        </div>



                    <div class="modal-body">
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" name="form" onSubmit="return validarPass();">
                            <div class="form-group">
                            <div class="col-sm-10">


                                <label class="form-control-label" for="recipient-name">
                                   <strong>Ingrese Nueva Contraseña:</strong>
                                </label>
                              <input required="" type="password" id="contra" name="password" class="form-control" placeholder="Nueva Contraseña">
    <span id="pass" ></span>
    </input>
                                </div>

                        <input name="id" type="hidden" value="<?php echo $_SESSION['idusuario'] ?>"></input>



                        <input name="alta_pass" type="hidden" value="<?php echo date('Y-m-d') ?>">
                        </input>


                            </div>
                    </div>
              <div class="form-group" >

      <div class="offset-sm-3 col-sm-3">
        <input type="submit" class="btn btn-outline-success" name="cambiar" value="Cambiar Contraseña">
      </div>
              </div>
                    </div>



                        </form>
                    </div>
                </div>
            </div>
        </div>



 <?php include '../views/menu/footer.view.php';?>