<?php include 'header.php';?>
<?php if ($_SESSION['rol'] == '1'): ?>
<header>
            <div class="container">
                <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse">
                    <button aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right" data-target="#navbarNavDropdown" data-toggle="collapse" type="button">
                        <span class="navbar-toggler-icon">
                        </span>
                    </button>

                    <ul class="navbar-nav nav nav-pills nav-fill">
                     <li class="nav-item">
    <a class="nav-link" href="../index.php">HOME</a>
  </li>




                        <div class="collapse navbar-collapse">
                            <!-- Cuentas -->
                            <li class="nav-item">

                                    <a class="nav-link" href="../php/index_cuenta.php">
                                        Cuentas
                                    </a>

                            </li>
                            <!-- Fin cuentas -->
                           <!-- Contactos -->

                             <li class="nav-item ">

                                    <a class="nav-link" href="../php/index_contactos.php">
                                        Contactos
                                    </a>
                                    </li>
                    <!-- Fin Contactos -->
                            <!-- Fin Contactos -->

                            <!-- Usuarios -->
                             <li class="nav-item ">

                                    <a class="nav-link" href="../php/index_usuarios.php">
                                        Usuarios
                                    </a>
                                    </li>
                            <!-- Fin Usuarios -->

                            <!-- Empleados -->

                             <li class="nav-item ">

                                    <a class="nav-link" href="../php/index_empleados.php">
                                            Empleados
                                        </a>

                                        </li>
                            <!-- Fin Empleados -->

                            <!--  Oportunidades -->

                                    <li class="nav-item ">

                                    <a class="nav-link" href="../php/index.php">
                                            Oportunidades
                                        </a>

                                        </li>

                            <!-- Fin Oportunidades -->


                            <!-- Estadisticas -->
                           <li class="nav-item ">

                                    <a class="nav-link active" href="../php/index_estadisticas.php">
                                            Estadisticas
                                        </a>

                                        </li>
                            <!-- Fin estadisticas -->
                            <li class="nav-item ">

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
                                        <i class="fa fa-user-circle"></i>
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
                        </div>
                    </ul>
                </nav>
                </div>



                <!-- USUARIO -->

<?php else: ?>
            <header>
            <div class="container">
                <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse">
                    <button aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right" data-target="#navbarNavDropdown" data-toggle="collapse" type="button">
                        <span class="navbar-toggler-icon">
                        </span>
                    </button>

                    <ul class="navbar-nav nav nav-pills nav-fill">
                     <li class="nav-item">
    <a class="nav-link" href="../index.php">HOME</a>
  </li>




                        <div class="collapse navbar-collapse">
                            <!-- Cuentas -->
                            <li class="nav-item">

                                    <a class="nav-link" href="../php/index_cuenta.php">
                                        Cuentas
                                    </a>

                            </li>
                            <!-- Fin cuentas -->
                           <!-- Contactos -->

                             <li class="nav-item ">

                                    <a class="nav-link" href="../php/index_contactos.php">
                                        Contactos
                                    </a>
                                    </li>
                    <!-- Fin Contactos -->
                            <!-- Fin Contactos -->



                            <!--  Oportunidades -->

                                    <li class="nav-item ">

                                    <a class="nav-link" href="../php/index.php">
                                            Oportunidades
                                        </a>

                                        </li>

                            <!-- Fin Oportunidades -->


                            <!-- Estadisticas -->
                           <li class="nav-item ">

                                    <a class="nav-link active" href="../php/index_estadisticas.php">
                                            Estadisticas
                                        </a>

                                        </li>
                            <!-- Fin estadisticas -->
                            <li class="nav-item ">

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
                                        <i class="fa fa-user-circle"></i>
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
                        </div>
                    </ul>
                </nav>
                </div>

<?php endif?>