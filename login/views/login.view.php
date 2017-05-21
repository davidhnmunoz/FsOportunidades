<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
            <title>
                Login
            </title>
            <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
            <link href="css/metro.min.css" rel="stylesheet">
                <link href="css/estilos.css" rel="stylesheet">
                    <link href="../assets/css/font-awesome.css" rel="stylesheet" type="text/css">
                        <script src="js/jquery.js">
                        </script>
                    </link>
                </link>
            </link>
        </meta>
    </head>
    <body>
        <div class="formu">
            <!-- PHP SELF SIRVE PARA HACER UNA CARGA DE LA PROPIA PAGINA -->
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" name="form">
                <center>
                    <h1 class="text-dark">
                        <i>
                            Inicie Sesión
                        </i>
                    </h1>
                </center>
                <hr class="hr1"/>
                <br/>
                <div class="input-control text full-size" data-role="input">
                    <label for="user_login">
                        Usuario:
                    </label>
                    <input id="user_login" name="usuario" type="text">
                        <button class="button helper-button clear">
                            <i aria-hidden="true" class="fa fa-user">
                            </i>
                        </button>
                    </input>
                </div>
                <br/>
                <br/>
                <div class="input-control password full-size" data-role="input">
                    <label for="user_password">
                        Password:
                    </label>
                    <input id="user_password" name="password" type="password">
                        <button class="button helper-button reveal">
                            <i "="" aria-hidden="true" class="fa fa-key">
                            </i>
                        </button>
                    <br/>
                    <br/>
                    <br>
                    </br>
                </div>
            <?php

if (!isset($_SESSION['usuario'])) {

    include 'btn_enviar.php';}?>

            <?php if (!empty($enviar)): ?>
            </form>
            <div class="enviar bg-success">
                <?php echo $enviar; ?>
            </div>
            <?php echo $enviado; ?>
            <?php endif;?>
            <?php if (!empty($error)): ?>
            <div class="col-sm-12">
                <div class="alert alert-danger" role="alert">
                    <?php echo $error ?>
                </div>
            </div>
            <?php endif;?>
        </div>
    </body>
</html>
