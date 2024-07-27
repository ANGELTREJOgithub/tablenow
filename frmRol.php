<!DOCTYPE html>
<html lang="en">

<head>
    <title>Roles</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="../Vista/images/logob.png" type="image/x-icon">

    <!-- Google Font: Source Sans Pro -->
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../Vista/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../Vista/dista/css/adminlte.min.css">
    <link rel="stylesheet" href="../Vista/css/tabladmin.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- navbar -->

        <!-- Navbar -->
        <?PHP
        include "../Vista/modulos/navbar.php";
        ?>
        <!-- /.navbar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->


            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../Vista/images/logob.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Daniel Jardon</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Buscar" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item ">
                                    <a onclick="CargarContenido('content-wrapper','Vista/graficos.php')" class="nav-link active" style="cursor:pointer;">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Graficos Estadisticos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a onclick="CargarContenido('content-wrapper','Vista/reportes.php')" class="nav-link active" style="cursor:pointer;">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Reportes</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="../Vista/adminpanel.php" class="nav-link">
                                <box-icon name='home-alt-2' color='#e24141'></box-icon>
                                <p>
                                    Inicio
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../Controlador/ctrlRol.php?id=2" class="nav-link">
                                <box-icon name='star-half' type='solid' color='#e24141'></box-icon>
                                <p>
                                    Roles
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../Controlador/ctrlUsuario.php?id=2" class="nav-link">
                                <box-icon name='user-pin' type='solid' color='#df3f3f'></box-icon>
                                <p>Usuarios</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <box-icon name='comment-dots' color='#e24141'></box-icon>
                                <p>Contacto</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <box-icon name='notepad' color='#e24141'></box-icon>
                                <p>Reservaciones </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../Controlador/ctrlMesa.php?=2" class="nav-link">
                                <box-icon name='medium-square' type='logo' color='#e24141'></box-icon>
                                <p>
                                    Mesas
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../Controlador/ctrlCategoria.php?id=2" class="nav-link">
                                <box-icon name='book-bookmark' color='#e24141'></box-icon>
                                <p>
                                    Categorias
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <box-icon name='dish' type='solid' color='#e24141'></box-icon>
                                <p>
                                    Productos
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <box-icon name='paste' color='#e24141'></box-icon>
                                <p>
                                    Detallle pedido
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <box-icon name='cart' color='#e24141'></box-icon>
                                <p>
                                    Pedido
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <box-icon name='credit-card' color='#e24141'></box-icon>
                                <p>
                                    Pago
                                </p>
                            </a>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- Main Sidebar Container -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">

                            <h1 class="m-0"> <box-icon name='star-half' type='solid' color='#e24141'></box-icon></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="../Vista/adminpanel.php">Inicio</a></li>

                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                       

                        </div>

                        <!-- aqui va el modelo -->

                        <div id="agrupar">
        <div id="contenido">
        </div>
        <h1>Alta de Roles</h1>
        <?php
        if (isset($_REQUEST['id'])) {
            switch ($_REQUEST['id']) {
                case 1:
        ?>
                    <form action="../Controlador/ctrlRol.php" method="post">
                        <input type="hidden" name="id" value="1">
                        Ingrese el Rol: <input type="text" name="descripcion"><br>
                        <input class="modificar" type="submit" value="Registrar">
                    </form>
                    <form action="../Controlador/ctrlRol.php" method="post">
                        <input type="hidden" name="id" value="2">
                        <input class="modificar" type="submit" value="regresar">
                    </form>
        <?php
                    break;
                default:
                    echo "Valor de 'id' no válido.";
            }
        }
        ?>
                     




                    </div>

                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            Alguna cosas que desee enlazar
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>
    </div>
    <!-- ./wrapper -->
    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="../Vista/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../Vista/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="../Vista/plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../Vista/dist/js/adminlte.min.js"></script>
    <script>
        function CargarContenido(contenedor, contenido) {
            $("." + contenedor).load(contenido);
        }
    </script>
</body>

</html>
