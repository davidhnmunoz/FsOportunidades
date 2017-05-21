<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
            <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
                <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
                <link rel="stylesheet" href="../assets/css/font-awesome.css" class="">

                    <title>
                        Cambiar pass
                    </title>
                </link>
            </meta>
        </meta>
    </head>
    <body>
     <script src="../assets/js/jquery.slim.min.js" type="text/javascript">
        </script>
        <script src="../assets/js/tether.min.js" type="text/javascript">
        </script>
        <script src="../assets/js/bootstrap.min.js" type="text/javascript">
        </script>
        <button class="btn btn-primary" data-target="#exampleModal" data-toggle="modal" data-whatever="@mdo" type="button">
            Contraseña Expirada
        </button>
        <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="exampleModal" role="dialog" tabindex="-1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                          Su contraseña expiro Por favor cambiela!
                        </h5>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label class="form-control-label" for="recipient-name">
                                    Ingrese Nueva Contraseña:
                                </label>
                                <input class="form-control" id="recipient-name" type="text">
                                </input>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal" type="button">
                            cerrar
                        </button>
                        <button class="btn btn-success" type="button">
                            Cambiar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
