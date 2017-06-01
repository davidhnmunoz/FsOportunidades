<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
            <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
            <link rel="stylesheet" href="../assets/css/styles.css">
                <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
                <link rel="stylesheet" type="text/css" href="../assets/css/chosen-bootstrap.css">
                    <link href="../assets/css/font-awesome.css" rel="stylesheet">
                        <title>
                        </title>
                    </link>
                </link>
            </meta>
        </meta>
    </head>
    <body>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/functions.js"></script>
    <script src="../assets/js/inputtest.js"></script>
             <script src="../assets/js/tether.min.js" type="text/javascript">
        </script>
        <script src="../assets/js/bootstrap.min.js" type="text/javascript">
        </script>

                <header>

                    <nav class="navbar navbar-toggleable-md  navbar-inverse bg-inverse">
                        <button aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right" data-target="#navbarNavDropdown" data-toggle="collapse" type="button">
                            <span class="navbar-toggler-icon">
                            </span>
                        </button>
                        <a class="navbar-brand" href="../index.php">
                            HOME
                        </a>

                        <div class="collapse navbar-collapse" id="navbarNavDropdown">

                            <ul class="navbar-nav">
                            <!-- Cuentas -->
                                    <li class="nav-item dropdown">

                                    <li class="nav-item dropdown">
                                        <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown" href="../php/index_cuenta.php" id="navbarDropdownMenuLink">
                                            Cuentas
                                        </a>
                                        <div aria-labelledby="navbarDropdownMenuLink" class="dropdown-menu">
                                            <a class="dropdown-item" href="../php/agregar_cuenta.php">
                                               Agregar Cuenta
                                            </a>
                                            <a class="dropdown-item" href="../php/index_cuenta.php">
                                                Cuentas Activas
                                            </a>
                                            <a class="dropdown-item" href="../php/cuentas_inactivas.php">
                                                Cuentas Inactivas
                                            </a>
                                        </div>
                                    </li>
                                </li>
                                <!-- Fin cuentas -->
                                <!-- Contactos -->
                                 <li class="nav-item dropdown">

                                    <li class="nav-item dropdown">
                                        <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown" href="" id="navbarDropdownMenuLink">
                                            Contactos
                                        </a>
                                        <div aria-labelledby="navbarDropdownMenuLink" class="dropdown-menu">
                                            <a class="dropdown-item" href="">
                                               Agregar Contacto
                                            </a>
                                            <a class="dropdown-item" href="">
                                                Contacto Activos
                                            </a>
                                            <a class="dropdown-item" href="">
                                                Contacto Inactivos
                                            </a>
                                        </div>
                                    </li>
                                </li>

                                  <!-- Fin Contactos -->
                                  <!-- Usuarios -->
                                <li class="nav-item dropdown">

                                    <li class="nav-item dropdown">
                                        <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown" href="" id="navbarDropdownMenuLink">
                                            Usuarios
                                        </a>
                                        <div aria-labelledby="navbarDropdownMenuLink" class="dropdown-menu">
                                            <a class="dropdown-item" href="">
                                               Agregar Usuario
                                            </a>
                                            <a class="dropdown-item" href="">
                                                Usuarios Activos
                                            </a>
                                            <a class="dropdown-item" href="">
                                                Usuarios Inactivos
                                            </a>
                                        </div>
                                    </li>
                                </li>
                               <!-- Fin Usuarios -->
                               <!-- Empleados -->
                         <li class="nav-item dropdown">

                                    <li class="nav-item dropdown">
                                        <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown" href="" id="navbarDropdownMenuLink">
                                            Empleados
                                        </a>
                                        <div aria-labelledby="navbarDropdownMenuLink" class="dropdown-menu">
                                            <a class="dropdown-item" href="">
                                               Agregar Empleado
                                            </a>
                                            <a class="dropdown-item" href="">
                                                Empleados Activos
                                            </a>
                                            <a class="dropdown-item" href="">
                                                Empleados Inactivos
                                            </a>
                                        </div>
                                    </li>
                                </li>
                                 <!-- Fin Empleados -->
                                <li class="nav-item ">
                                    <a class="nav-link" href="direcciones.php">
                                        Direcciones
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <!-- BUSCAR -->
                                    <form  class="form-inline my-2 my-lg-0">
                                        <input class="form-control mr-sm-1" placeholder="buscar" type="text">

                                         <div class="input-group-addon"><i class="fa fa-search fa-lg" aria-hidden="true"></i></div>
                                            <button class="btn btn-primary " type="submit">
                                                Buscar
                                            </button>
                                        </input>
                                    </form>
                                </li>
                                <!-- PERFIL -->


                                    <li class="nav-item dropdown navbar-toggler-right">
                                        <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="navbarDropdownMenuLink">
                                        <?php if (isset($_SESSION['usuario'])): ?>
                                    <?php endif;?>
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
                     </ul>

                    </nav>
                </header>

    </body>
</html>