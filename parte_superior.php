<?php session_start();

?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>




    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>

    <!-- Custom fonts for this template-->
    <link href="/Inspecciones/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/Inspecciones/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/Inspecciones/css/style.css">


    <!--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 -->

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidenav-not-toggled sidebar sidebar-dark accordion   " id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/Inspecciones/index.php">
                <img class="icono" src="https://www.encava.com/wp-content/uploads/2021/09/logo_encava_foter.svg" alt="">


                <div class="sidebar-brand-icon rotate-n-15">
                    <!--                     <i class="fas fa-laugh-wink"></i> -->
                </div>
                <div class="sidebar-brand-text mx-3">




                    ENCAVA<sup></sup>

                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/Inspecciones/inicio.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Inicio</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Modulos
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapsefour">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Carta rutas</span>
                </a>

                <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header"></h6>
                        <a class="collapse-item" href=" /Inspecciones/views/buscar.php">Ensamblaje de chasis</a>
                        <a class="collapse-item" href=" /Inspecciones/views/buscar.php">Chequeo Carroceria</a>
                        <a class="collapse-item" href=" /Inspecciones/views/buscar.php">Cabina Pintura</a>
                        <a class="collapse-item" href=" /Inspecciones/views/buscar.php">Linea_final</a>
                        <a class="collapse-item" href=" /Inspecciones/views/buscar.php">Ensamblaje de camion</a>
                        <a class="collapse-item" href=" /Inspecciones/views/buscar.php">Inspeccion de EP-1000</a>

                        <!--                        <a class="collapse-item" href=" /Inspecciones/views/buscar.php">Ensamblaje de chasis</a>

                        <a class="collapse-item" href=" /Inspecciones/views/ensamblaje_chasis/ENT-610/remachado.php">Chequeo carroceria</a>
                        <a class="collapse-item" href=" /Inspecciones/views/ensamblaje_chasis/ENT-610/remachado.php">Cabina pintura</a> -->
                    </div>
                </div>

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTen" aria-expanded="true" aria-controls="collapseTen">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Inspecciones</span>
                </a>

                <div id="collapseTen" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header"></h6>

                        <a class="collapse-item" href=" /Inspecciones/views/inspecciones/buscarInspecciones.php">Por vehiculo</a>


                    </div>
                </div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEleven" aria-expanded="true" aria-controls="collapseEleven">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Observaciones</span>
                </a>

                <div id="collapseEleven" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header"></h6>

                        <a class="collapse-item" href=" /Inspecciones/views/observaciones/mostrarObservaciones.php">Ver Observaciones</a>
                        <a class="collapse-item" href=" /Inspecciones/views/observaciones/buscarObservaciones.php">Buscar Observaciones</a>


                    </div>
                </div>


                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Ubicaciones</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header"></h6>

                        <a class="collapse-item" href="/Inspecciones/views/ubicacion/ubicaciones.php">Ver ubicaciones</a>
                        <a class="collapse-item" href="/Inspecciones/views/ubicacion/buscarUbicaciones.php">Buscar Ubicacion</a>


                    </div>
                </div>



                <!--                <a class="nav-link collapsed" href="/Inspecciones/views/ubicacion/ubicaciones.php" data-toggle="collapse" data-target="#" aria-expanded="true" aria-controls="collapseThree">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Ubicaciones</span>
                </a>
                 -->
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapsefour">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Vehiculos</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header"></h6>

                        <a class="collapse-item" href=" /Inspecciones/views/Vehiculo/RegistrarVehiculo.php">Registrar vehiculo</a>

                        <a class="collapse-item" href=" /Inspecciones/views/Vehiculo/buscarVehiculo.php">Buscar vehiculo</a>
                        <a class="collapse-item" href=" /Inspecciones/views/Vehiculo/listado_de_vehiculo.php">Listado de vehiculos</a>
                    </div>
                </div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsefour" aria-expanded="true" aria-controls="collapsefour">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Estadisticas</span>
                </a>
                <div id="collapsefour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header"></h6>

                        <a class="collapse-item" href=" /Inspecciones/views/graficas/610.php">ENT-610</a>
                        <a class="collapse-item" href=" /Inspecciones/views/graficas/710.php">ENT-3300-710-900-6100</a>
                        <a class="collapse-item" href=" /Inspecciones/views/graficas/et5.php">ET-5</a>

                        <a class="collapse-item" href=" /Inspecciones/views/graficas/grafico.php">General </a>
                        <a class="collapse-item" href=" /Inspecciones/views/ensamblaje_chasis/ENT-610/remachado.php">Promedio de Errores</a>
                    </div>
                </div>



                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsefive" aria-expanded="true" aria-controls="collapsefive">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Usuarios</span>
                </a>
                <div id="collapsefive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header"></h6>
                        <a class="collapse-item" href="/Inspecciones/views/usuarios/nuevoUsuario.php">Nuevo Usuario</a>
                        <a class="collapse-item" href="/Inspecciones/views/usuarios/gestionarUsuario.php">Gestionar Usuarios</a>
                    </div>
                </div>



            </li>








            <!--                 <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Usuarios</span></a> -->
            <!--                 <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Prestamos</span>
                </a>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Devoluciones</span>
                </a>
                <a class="nav-link collapsed" href="tabla.php" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Libros</span>
                </a>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Reportes</span>
                </a>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Usuarios</span>
                </a> -->

            <!--  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="buttons.html">Buttons</a>
                        <a class="collapse-item" href="cards.html">Cards</a>
                    </div>
                </div> -->
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->


            <!-- Divider -->
            <!--     <hr class="sidebar-divider"> -->

            <!-- Heading -->


            <!-- Nav Item - Pages Collapse Menu -->

            <!-- Nav Item - Charts -->


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <!--                     <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> -->

                    <!-- Topbar Navbar -->



                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">

                            <!-- Dropdown - Alerts -->

                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">

                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['username'] ?>   </span> 
                              <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['cargo'] ?></span> 
                                                             <img class="img-profile rounded-circle" src="/Inspecciones/img/undraw_profile.svg"> 
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="cerrar.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar sesion
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>

                <!-- End of Topbar -->