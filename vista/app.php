<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Dupont</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Themesbrand" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App Icons -->
    <link rel="shortcut icon" href="<?php echo $url ?>vista/assets/images/logo_dupont.png">

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="<?php echo $url ?>vista/assets/plugins/morris/morris.css">

    <!-- App css -->
    <link href="<?php echo $url ?>vista/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $url ?>vista/assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $url ?>vista/assets/css/style.css" rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="<?php echo $url ?>vista/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $url ?>vista/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="<?php echo $url ?>vista/assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</head>


<body>

    <!-- Loader -->
    <!-- <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div> -->

    <?php if (isset($_SESSION['session']) && $_SESSION['session']) : ?>

        <div class="header-bg">
            <!-- Navigation Bar-->
            <header id="topnav">
                <div class="topbar-main">
                    <div class="container-fluid">

                        <!-- Logo-->
                        <div class="d-block d-lg-none mr-5">

                            <a href="<?php echo $url ?>" class="logo">
                                <img src="<?php echo $url ?>vista/assets/images/logo_dupont.png" alt="" height="28" class="logo-small">
                            </a>

                        </div>
                        <!-- End Logo-->

                        <div class="menu-extras topbar-custom navbar p-0">

                            <ul class="list-inline flags-dropdown d-none d-lg-block mb-0">
                                <!-- <li class="list-inline-item text-white-50 mr-3">
                                <span class="font-13">Help : +012 3456 789</span>
                            </li> -->
                                <!-- <li class="list-inline-item dropdown notification-list">
                                <a class="nav-link dropdown-toggle text-white-50 arrow-none waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <img src="<?php echo $url ?>vista/assets/images/flags/us_flag.jpg" alt="" class="flag-img">
                                    United States <i class="mdi mdi-chevron-down"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-animated">
                                    <a href="#" class="dropdown-item"><img src="<?php echo $url ?>vista/assets/images/flags/french_flag.jpg" alt="" class="flag-img"> French</a>
                                    <a href="#" class="dropdown-item"><img src="<?php echo $url ?>vista/assets/images/flags/germany_flag.jpg" alt="" class="flag-img"> Germany</a>
                                    <a href="#" class="dropdown-item"><img src="<?php echo $url ?>vista/assets/images/flags/italy_flag.jpg" alt="" class="flag-img"> Italy</a>
                                    <a href="#" class="dropdown-item"><img src="<?php echo $url ?>vista/assets/images/flags/spain_flag.jpg" alt="" class="flag-img"> Spain</a>
                                </div>
                            </li> -->
                            </ul>

                            <!-- Search input -->
                            <div class="search-wrap" id="search-wrap">
                                <div class="search-bar">
                                    <form method="post" id="formBuscarPeido">
                                        <input class="search-input" type="search" placeholder="Buscar pedido" name="BuscarPedido" />
                                        <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                                            <i class="mdi mdi-close-circle"></i>
                                        </a>
                                        <?php

                                        $buscarPedido = new PedidosControlador();
                                        $buscarPedido->ctrBuscarPedido();
                                        ?>
                                    </form>
                                </div>
                            </div>

                            <ul class="list-inline ml-auto mb-0">

                                <!-- notification-->

                                <li class="list-inline-item dropdown notification-list">
                                    <a class="nav-link waves-effect toggle-search" href="#" data-target="#search-wrap">
                                        <i class="mdi mdi-magnify noti-icon"></i>
                                    </a>
                                </li>


                                <!-- User-->
                                <li class="list-inline-item dropdown notification-list">
                                    <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                        <img src="<?php echo $url ?>vista/assets/images/users/avatar-1.jpg" alt="user" class="rounded-circle">
                                        <span class="d-none d-md-inline-block ml-1">Alberto F. <i class="mdi mdi-chevron-down"></i> </span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown">
                                        <!-- <a class="dropdown-item" href="#"><i class="dripicons-user text-muted"></i> Profile</a>
                                    <a class="dropdown-item" href="#"><i class="dripicons-wallet text-muted"></i> My Wallet</a>
                                    <a class="dropdown-item" href="#"><span class="badge badge-success float-right m-t-5">5</span><i class="dripicons-gear text-muted"></i> Settings</a>
                                    <a class="dropdown-item" href="#"><i class="dripicons-lock text-muted"></i> Lock screen</a> -->
                                        <!-- <div class="dropdown-divider"></div> -->
                                        <a class="dropdown-item" href="<?php $url ?>salir"><i class="dripicons-exit text-muted"></i> Salir</a>
                                    </div>
                                </li>
                                <li class="menu-item list-inline-item">
                                    <!-- Mobile menu toggle-->
                                    <a class="navbar-toggle nav-link">
                                        <div class="lines">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                    </a>
                                    <!-- End mobile menu toggle-->
                                </li>

                            </ul>

                        </div>
                        <!-- end menu-extras -->

                        <div class="clearfix"></div>

                    </div> <!-- end container -->
                </div>
                <!-- end topbar-main -->

                <!-- MENU Start -->
                <div class="navbar-custom">
                    <div class="container-fluid">
                        <!-- Logo-->
                        <div class="d-none d-lg-block">
                            <!-- Text Logo
                            <a href="index.html" class="logo">
                                Foxia
                            </a>
                             -->
                            <!-- Image Logo -->
                            <a href="<?php echo $url ?>" class="logo">
                                <!-- <img src="<?php echo $url ?>vista/assets/images/logo-sm.png" alt="" height="22" class="logo-small"> -->
                                <img src="<?php echo $url ?>vista/assets/images/logo_dupont.png" alt="" width="100" class="logo-large">
                            </a>

                        </div>
                        <!-- End Logo-->
                        <div id="navigation">

                            <!-- Navigation Menu-->
                            <ul class="navigation-menu">

                                <li class="has-submenu">
                                    <a href="./"><i class="dripicons-meter"></i>Reportes</a>
                                </li>

                                <li class="has-submenu">
                                    <a href="#"><i class="dripicons-briefcase"></i>Inventario <i class="mdi mdi-chevron-down mdi-drop"></i></a>
                                    <ul class="submenu megamenu">
                                        <!-- <li>
                                        <ul>
                                            <li><a href="#">Almacenes</a></li>
                                            

                                            <!-- <li><a href="ui-buttons.html"></a></li>
                                            <li><a href="ui-cards.html">Cards</a></li>
                                            <li><a href="ui-dropdowns.html">Dropdowns</a></li>
                                            <li><a href="ui-navs.html">Navs</a></li> 
                                        </ul>
                                    </li> -->
                                        <li>
                                            <ul>
                                                <li><a href="<?php echo $url  ?>lista-productos">Listar productos</a></li>
                                                <li><a href="<?php echo $url ?>nuevo-producto">Nuevo producto</a></li>
                                                <!-- <li><a href="ui-modals.html">Modals</a></li>
                                            <li><a href="ui-images.html">Images</a></li>
                                            <li><a href="ui-progressbars.html">Progress Bars</a></li>
                                            <li><a href="ui-lightbox.html">Lightbox</a></li>
                                            <li><a href="ui-pagination.html">Pagination</a></li> -->
                                            </ul>
                                        </li>

                                        <!-- <li>
                                        <ul>
                                            <li><a href="ui-popover-tooltips.html">Popover & Tooltips</a></li>
                                            <li><a href="ui-carousel.html">Carousel</a></li>
                                            <li><a href="ui-video.html">Video</a></li>
                                            <li><a href="ui-typography.html">Typography</a></li>
                                            <li><a href="ui-sweet-alert.html">Sweet-Alert</a></li>
                                            <li><a href="ui-grid.html">Grid</a></li>
                                        </ul>
                                    </li> -->
                                    </ul>
                                </li>

                                <li class="has-submenu">
                                    <a href="#"><i class="fa fa-archive"></i>Salidas <i class="mdi mdi-chevron-down mdi-drop"></i></a>
                                    <ul class="submenu">
                                        <li>
                                            <ul>
                                                <li><a href="<?php echo $url  ?>lista-pedidos">Listar salidas</a></li>
                                                <li><a href="<?php echo $url ?>nuevo-pedido">Nueva salida</a></li>
                                                <!-- <li><a href="ui-modals.html">Modals</a></li>
                                            <li><a href="ui-images.html">Images</a></li>
                                            <li><a href="ui-progressbars.html">Progress Bars</a></li>
                                            <li><a href="ui-lightbox.html">Lightbox</a></li>
                                            <li><a href="ui-pagination.html">Pagination</a></li> -->
                                            </ul>
                                        </li>
                                    </ul>
                                </li>

                                <li class="has-submenu">
                                    <a href="#"><i class="fa fa-users"></i>Usuarios<i class="mdi mdi-chevron-down mdi-drop"></i></a>
                                    <ul class="submenu">
                                        <li><a href="<?php echo  $url . 'lista-usuarios' ?>">Administración de usuarios</a></li>
                                        <!-- <li><a href="<?php echo  $url . 'nuevo-rol' ?>">Roles de acceso</a></li> -->

                                    </ul>
                                </li>

                                <!-- <li class="has-submenu">
                                <a href="#"><i class="dripicons-wallet"></i>Pages <i class="mdi mdi-chevron-down mdi-drop"></i></a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>
                                            <li><a href="pages-timeline.html">Timeline</a></li>
                                            <li><a href="pages-invoice.html">Invoice</a></li>
                                            <li><a href="pages-directory.html">Directory</a></li>
                                            <li><a href="pages-login.html">Login</a></li>
                                            <li><a href="pages-register.html">Register</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <li><a href="pages-recoverpw.html">Recover Password</a></li>
                                            <li><a href="pages-lock-screen.html">Lock Screen</a></li>
                                            <li><a href="pages-blank.html">Blank Page</a></li>
                                            <li><a href="pages-404.html">Error 404</a></li>
                                            <li><a href="pages-500.html">Error 500</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li> -->

                            </ul>
                            <!-- End navigation menu -->
                        </div> <!-- end #navigation -->
                    </div> <!-- end container -->
                </div> <!-- end navbar-custom -->
            </header>
            <!-- End Navigation Bar-->


        </div>


        <div class="wrapper">
            <div class="container-fluid">

                <?php


                if (isset($_GET['ruta'])) {

                    $rutas = $_GET['ruta'];

                    $rutas = explode("/", $rutas);

                    if (

                        $rutas[0] == 'lista-productos' ||
                        $rutas[0] == 'nuevo-producto' ||
                        $rutas[0] == 'nuevo-usuario' ||
                        $rutas[0] == 'nuevo-rol' ||
                        $rutas[0] == 'inicio' ||
                        $rutas[0] == 'nuevo-pedido' ||
                        $rutas[0] == 'pedido' ||
                        $rutas[0] == 'editar-producto' ||
                        $rutas[0] == 'editar-usuario' ||
                        $rutas[0] == 'lista-usuarios' ||
                        $rutas[0] == 'salir' ||
                        $rutas[0] == 'lista-pedidos'

                    ) {

                        include_once 'paginas/' . $rutas[0] . '.php';
                    }
                } else {
                    include_once 'paginas/inicio.php';
                }

                ?>

            </div> <!-- end container-fluid -->
        </div>
        <!-- end wrapper -->


        <!-- Footer -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- © 2019 - 2020 Dupont <span class="d-none d-md-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> Desarrollador por kinetik.</span> -->
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer -->
    <?php else :
        include_once 'paginas/login.php';
    ?>

    <?php endif; ?>

    <!-- jQuery  -->
    <script src="<?php echo $url ?>vista/assets/js/jquery.min.js"></script>
    <script src="<?php echo $url ?>vista/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo $url ?>vista/assets/js/modernizr.min.js"></script>
    <script src="<?php echo $url ?>vista/assets/js/waves.js"></script>
    <script src="<?php echo $url ?>vista/assets/js/jquery.slimscroll.js"></script>

    <script src="<?php echo $url ?>vista/assets/plugins/peity-chart/jquery.peity.min.js"></script>

    <!--Morris Chart-->
    <script src="<?php echo $url ?>vista/assets/plugins/morris/morris.min.js"></script>
    <script src="<?php echo $url ?>vista/assets/plugins/raphael/raphael-min.js"></script>

    <script src="<?php echo $url ?>vista/assets/pages/dashboard.js"></script>
    <!-- App js -->
    <script src="<?php echo $url ?>vista/assets/js/app.js"></script>


    <script src="<?php echo $url ?>vista/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo $url ?>vista/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>


    <script src="<?php echo $url ?>vista/assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="<?php echo $url ?>vista/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

    <!-- Datatable init js -->
    <!-- <script src="<?php echo $url ?>vista/assets/pages/datatables.init.js"></script> -->

    <!-- Para generar números aleatorios -->
    <script src="<?php echo $url ?>vista/assets/js/uuid.min.js"></script>


    <!-- Js productos  -->
    <script src="<?php echo $url ?>vista/assets/js/productos.js"></script>


    <script src="<?php echo $url ?>vista/assets/js/plantilla.js"></script>

    <script src="<?php echo $url ?>vista/assets/js/pedidos.js"></script>

    <script src="<?php echo $url ?>vista/assets/js/usuarios.js"></script>


</body>

</html>