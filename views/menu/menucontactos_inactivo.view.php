<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
            <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
                <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
                    <link href="../assets/css/styles.css" rel="stylesheet">
                        <link href="../assets/css/font-awesome.css" rel="stylesheet">
                            <title>
                            </title>
                        </link>
                    </link>
                </link>
            </meta>
        </meta>
    </head>
    <body>
        <script src="../assets/js/jquery.min.js">
        </script>
        <script src="../assets/js/tether.min.js" type="text/javascript">
        </script>
        <script src="../assets/js/bootstrap.min.js" type="text/javascript">
        </script>
        <script src="../assets/js/inputtest.js">
        </script>
        <header>
            <div class="container">
                <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse">
                    <button aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right" data-target="#navbarNavDropdown" data-toggle="collapse" type="button">
                        <span class="navbar-toggler-icon">
                        </span>
                    </button>
                    <ul class="navbar-nav">
                        <div>
                            <a class="navbar-brand" href="../index.php">
                                HOME
                            </a>
                        </div>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
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
                                        <a class="dropdown-item" href="../php/agregar_contacto.php">
                                            Agregar Contacto
                                        </a>
                                        <a class="dropdown-item" href="../php/index_contactos.php">
                                            Contacto Activos
                                        </a>
                                        <a class="dropdown-item" href="../php/contactos_inactivos.php">
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
                                             <a class="dropdown-item" href="../php/agregar_usuario.php">
                                            Agregar Usuario
                                        </a>
                                        <a class="dropdown-item" href="../php/index_usuarios.php">
                                            Usuarios Activos
                                        </a>
                                        <a class="dropdown-item" href="../php/usuario_inactivo.php">
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
                                            <a class="dropdown-item" href="../php/agregar_empleado.php">
                                               Agregar Empleado
                                            </a>
                                            <a class="dropdown-item" href="../php/index_empleados.php">
                                                Empleados Activos
                                            </a>
                                            <a class="dropdown-item" href="../php/empleado_inactivo.php">
                                                Empleados Inactivos
                                            </a>
                                        </div>
                                    </li>
                                </li>
                            <!-- Fin Empleados -->
                            <li class="nav-item ">
                                <!-- BUSCAR -->
                                <form class="form-inline my-2 my-lg-0">
                                    <div class="input-group-addon">
                                        <a href="../php/busqueda_contacto_activo.ajax.php">
                                            <i aria-hidden="true" class="fa fa-search fa-lg">
                                            </i>
                                        </a>
                                    </div>
                                    <a class="btn btn-primary" href="../php/busqueda_contacto_inactivo.ajax.php" name="buscar">
                                        Buscar Contactos
                                    </a>
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
                                    <a class="dropdown-item" href="../php/cerrar.php">
                                        Cerrar Sesión
                                    </a>
                                </div>
                            </li>
                        </div>
                    </ul>
                </nav>
            </div>
        </header>
    </body>
</html>