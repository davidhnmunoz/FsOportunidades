<?php include 'header.php';?>
<?php if ($_SESSION['rol'] == '1'): ?>
<header>
    <div class="container">
        <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse">
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
                    <li class="nav-item active dropdown">
                        <li class="nav-item active dropdown">
                            <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown" href="../php/index_cuenta.php">
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
                    <!--  Oportuniades -->
                    <li class="nav-item dropdown">
                        <li class="nav-item dropdown">
                            <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown" href="" id="navbarDropdownMenuLink">
                                Oportunidades
                            </a>
                            <div aria-labelledby="navbarDropdownMenuLink" class="dropdown-menu">
                                <a class="dropdown-item" href="../php/agregar_oportunidad.php">
                                    Agregar Oportunidad
                                </a>
                                <a class="dropdown-item" href="../php/index.php">
                                    Mis oportunidades abiertas
                                </a>
                                <a class="dropdown-item" href="../php/oportunidades_abiertas.php">
                                    Oportunidades Abiertas
                                </a>
                                <a class="dropdown-item" href="../php/oportunidades_cerradas.php">
                                    Oportunidades Cerradas
                                </a>
                                <a class="dropdown-item" href="../php/oportunidades_ganadas.php">
                                    Oportunidades Ganadas
                                </a>
                                <a class="dropdown-item" href="../php/oportunidades_perdidas.php">
                                    Oportunidades Perdidas
                                </a>
                                <a class="dropdown-item" href="../php/oportunidades_postergadas.php">
                                    Postergadas
                                </a>
                            </div>
                        </li>
                    </li>
                    <!-- Fin Oportunidades -->
                    <!-- Estadisticas -->
                    <li class="nav-item dropdown">
                        <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown" href="" id="navbarDropdownMenuLink">
                            Estadisticas
                        </a>
                        <div aria-labelledby="navbarDropdownMenuLink" class="dropdown-menu">
                            <a class="dropdown-item" href="../php/marcador_ventas.ajax.php">
                                Marcador de ventas
                            </a>
                            <a class="dropdown-item" href="../php/cuentas_principales.ajax.php">
                                Cuentas Principales
                            </a>
                            <a class="dropdown-item" href="../php/oportunidades_ganadas_enproceso_perdidas.ajax.php">
                                En Proceso Ganadas y perdidas
                            </a>
                            <a class="dropdown-item" href="../php/ingresospormes.ajax.php">
                                Ingresos por mes
                            </a>
                        </div>
                    </li>
                    <!-- Fin estadisticas -->
                         <li class="nav-item ">
                                <!-- BUSCAR -->
                                <form class="form-inline my-2 my-lg-0">
                                    <div class="input-group-addon">
                                        <a href="../php/busqueda_cuenta_inactiva.ajax.php">
                                            <i aria-hidden="true" class="fa fa-search fa-lg">
                                            </i>
                                        </a>
                                    </div>
                                    <a class="btn btn-primary" href="../php/busqueda_cuenta_inactiva.ajax.php" name="buscar">
                                        Buscar Cuenta
                                    </a>
                                </form>
                            </li>
                            <!-- PERFIL -->
                    <li class="nav-item dropdown navbar-toggler-right active">
                        <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle animated bounceInDown" data-toggle="dropdown" href="config" id="navbarDropdownMenuLink">
                            <span class="usu">
                                <i class="fa fa-user">
                                </i>
                            </span>
                            <?php if (isset($_SESSION['usuario'])): ?>
                            <?php endif;?>
                            <?php echo ucwords($_SESSION['usuario']); ?>
                        </a>
                        <div aria-labelledby="navbarDropdownMenuLink" class="dropdown-menu">
                            <a class="dropdown-item" href="../php/perfil_usuario.php">
                                Perfil
                                <i class="fa fa-user-circle">
                                </i>
                            </a>
                            <a class="dropdown-item" href="../php/cambio_pass.php">
                                Cambiar Contraseña
                                <i class="fa fa-key">
                                </i>
                            </a>
                            <a class="dropdown-item" href="../php/cerrar.php">
                                Cerrar Sesión
                                <i class="fa fa-close">
                                </i>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<?php else: ?>


<header>
    <div class="container">
        <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse">
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
                    <li class="nav-item active dropdown">
                        <li class="nav-item active dropdown">
                            <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown" href="../php/index_cuenta.php">
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

                    <!--  Oportuniades -->
                    <li class="nav-item dropdown">
                        <li class="nav-item dropdown">
                            <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown" href="" id="navbarDropdownMenuLink">
                                Oportunidades
                            </a>
                            <div aria-labelledby="navbarDropdownMenuLink" class="dropdown-menu">
                                <a class="dropdown-item" href="../php/agregar_oportunidad.php">
                                    Agregar Oportunidad
                                </a>
                                <a class="dropdown-item" href="../php/index.php">
                                    Mis oportunidades abiertas
                                </a>
                                <a class="dropdown-item" href="../php/oportunidades_abiertas.php">
                                    Oportunidades Abiertas
                                </a>
                                <a class="dropdown-item" href="../php/oportunidades_cerradas.php">
                                    Oportunidades Cerradas
                                </a>
                                <a class="dropdown-item" href="../php/oportunidades_ganadas.php">
                                    Oportunidades Ganadas
                                </a>
                                <a class="dropdown-item" href="../php/oportunidades_perdidas.php">
                                    Oportunidades Perdidas
                                </a>
                                <a class="dropdown-item" href="../php/oportunidades_postergadas.php">
                                    Postergadas
                                </a>
                            </div>
                        </li>
                    </li>
                    <!-- Fin Oportunidades -->
                    <!-- Estadisticas -->
                    <li class="nav-item dropdown">
                        <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown" href="" id="navbarDropdownMenuLink">
                            Estadisticas
                        </a>
                        <div aria-labelledby="navbarDropdownMenuLink" class="dropdown-menu">
                            <a class="dropdown-item" href="../php/marcador_ventas.ajax.php">
                                Marcador de ventas
                            </a>
                            <a class="dropdown-item" href="../php/cuentas_principales.ajax.php">
                                Cuentas Principales
                            </a>
                            <a class="dropdown-item" href="../php/oportunidades_ganadas_enproceso_perdidas.ajax.php">
                                En Proceso Ganadas y perdidas
                            </a>
                            <a class="dropdown-item" href="../php/ingresospormes.ajax.php">
                                Ingresos por mes
                            </a>
                        </div>
                    </li>
                    <!-- Fin estadisticas -->
                        <   <li class="nav-item ">
                                <!-- BUSCAR -->
                                <form class="form-inline my-2 my-lg-0">
                                    <div class="input-group-addon">
                                        <a href="../php/busqueda_cuenta_inactiva.ajax.php">
                                            <i aria-hidden="true" class="fa fa-search fa-lg">
                                            </i>
                                        </a>
                                    </div>
                                    <a class="btn btn-primary" href="../php/busqueda_cuenta_inactiva.ajax.php" name="buscar">
                                        Buscar Cuenta
                                    </a>
                                </form>
                            </li>
                            <!-- PERFIL -->
                    <li class="nav-item dropdown navbar-toggler-right active">
                        <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle animated bounceInDown" data-toggle="dropdown" href="config" id="navbarDropdownMenuLink">
                            <span class="usu">
                                <i class="fa fa-user">
                                </i>
                            </span>
                            <?php if (isset($_SESSION['usuario'])): ?>
                            <?php endif;?>
                            <?php echo ucwords($_SESSION['usuario']); ?>
                        </a>
                        <div aria-labelledby="navbarDropdownMenuLink" class="dropdown-menu">
                            <a class="dropdown-item" href="../php/perfil_usuario.php">
                                Perfil
                                <i class="fa fa-user-circle">
                                </i>
                            </a>
                            <a class="dropdown-item" href="../php/cambio_pass.php">
                                Cambiar Contraseña
                                <i class="fa fa-key">
                                </i>
                            </a>
                            <a class="dropdown-item" href="../php/cerrar.php">
                                Cerrar Sesión
                                <i class="fa fa-close">
                                </i>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<?php endif?>