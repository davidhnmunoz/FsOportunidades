<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
            <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
                <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
                    <link href="../assets/css/font-awesome.css" rel="stylesheet">
                        <title>
                        </title>
                    </link>
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
        <div class="container">
            <div class="row">
                <header>

                    <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                        <button aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right" data-target="#navbarNavDropdown" data-toggle="collapse" type="button">
                            <span class="navbar-toggler-icon">
                            </span>
                        </button>
                        <a class="navbar-brand" href="../php/index.php">
                            HOME
                        </a>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#">
                                        cuentas
                                        <span class="sr-only">
                                            (current)
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        contactos
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        usuarios
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="direcciones.php">
                                        Direcciones
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <!-- BUSCAR -->
                                    <form class="form-inline my-1 my-lg-0">
                                        <input class="form-control mr-sm-1" placeholder="buscar" type="text">
                                            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">
                                                buscar
                                            </button>
                                        </input>
                                    </form>
                                </li>
                                <!-- PERFIL -->
                                <li class="nav-item dropdown">
                                    <?php if (isset($_SESSION['usuario'])): ?>
                                    <?php endif;?>
                                    <li class="nav-item dropdown">
                                        <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="navbarDropdownMenuLink">
                                            <?php echo ucwords($_SESSION['usuario']); ?>
                                            <button class="button helper-button clear">
                            <i aria-hidden="true" class="fa fa-user">
                            </i>
                        </button>
                                        </a>
                                        <div aria-labelledby="navbarDropdownMenuLink" class="dropdown-menu">
                                            <a class="dropdown-item" href="../php/index.php">
                                                Perfil
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                Another action
                                            </a>
                                            <a class="dropdown-item" href="../php/cerrar.php">
                                                Cerrar Sesión
                                            </a>
                                        </div>
                                    </li>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </header>
            </div>
        </div>
    </body>
</html>