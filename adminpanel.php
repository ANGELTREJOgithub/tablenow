<!DOCTYPE html>
<html lang="en">

<head>
    <title>Panel Administrador</title>
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
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <?php include "../Vista/modulos/navbar.php"; ?>
        
              
        <!-- /.navbar -->

          <!-- SidebarSearch Form -->
       

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            
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
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Panel de control
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                        
                        </li>
                        <li class="nav-item">
                            <a href="../Controlador/ctrlReporte.php?id=1" class="nav-link">
                             <box-icon name='report' type='solid' color='#e24141' ></box-icon>
                                <p>Reportes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../Controlador/ctrlRol.php?id=2" class="nav-link">
                                <box-icon name='star-half' type='solid' color='#e24141'></box-icon>
                                <p>Roles</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../Controlador/ctrlUsuario.php?id=2" class="nav-link">
                                <box-icon name='user-pin' type='solid' color='#df3f3f'></box-icon>
                                <p>Usuarios</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../Controlador/ctrlContacto.php?id=2" class="nav-link">
                                <box-icon name='comment-dots' color='#e24141'></box-icon>
                                <p>Contacto</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../Controlador/ctrlReserva.php?id=2" class="nav-link">
                                <box-icon name='notepad' color='#e24141'></box-icon>
                                <p>Reservaciones</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../Controlador/ctrlMesa.php?id=2" class="nav-link">
                                <box-icon name='medium-square' type='logo' color='#e24141'></box-icon>
                                <p>Mesas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../Controlador/ctrlCategoria.php?id=2" class="nav-link">
                                <box-icon name='book-bookmark' color='#e24141'></box-icon>
                                <p>Categorias</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../Controlador/ctrlProducto.php?id=2" class="nav-link">
                                <box-icon name='dish' type='solid' color='#e24141'></box-icon>
                                <p>Productos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../Controlador/ctrlDpedido.php?id=2" class="nav-link">
                                <box-icon name='paste' color='#e24141'></box-icon>
                                <p>Detalle pedido</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../Controlador/ctrlPedido.php?id=2" class="nav-link">
                                <box-icon name='cart' color='#e24141'></box-icon>
                                <p>Pedido</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../Controlador/ctrlPago.php?id=2" class="nav-link">
                                <box-icon name='credit-card' color='#e24141'></box-icon>
                                <p>Pago</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Bienvenido administrador</h1>
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
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Gráficas</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <?php
            require_once '../Modelo/mGrafica.php';

            // Instanciar el modelo
            $model = new Grafica();

            // Obtener los datos para la gráfica de pastel
            $data = $model->obtenerDatosUsuarios();

            // Variables para almacenar las sumas
            $totalId = 0;
            $totalIdRol = 0;

            foreach ($data as $datum) {
                $totalId += $datum['id'];
                $totalIdRol += $datum['id_rol'];
            }

            $labels = json_encode(["Usuarios", "Admins"]);
            $values = json_encode([$totalId, $totalIdRol]);

            // Obtener los datos para la gráfica de barras
            $reservaciones = $model->obtenerDatosReservacionesPorDia();
            $dias = array_column($reservaciones, 'dia');
            $totalReservaciones = array_column($reservaciones, 'total_reservaciones');

            // Obtener los datos para la gráfica de líneas
            $reservacionesPorHora = $model->obtenerDatosReservacionesPorHora();
            $horas = array_column($reservacionesPorHora, 'hora');
            $totalReservacionesPorHora = array_column($reservacionesPorHora, 'total_reservaciones');
            ?>

            <section class="content">
                <div class="container-fluid">
                    <!-- PIE CHART -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Gráfico de Pastel</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <canvas id="pieChart"></canvas>
                                </div>
                            </div>
                        </div>

                        <!-- BAR CHART -->
                        <div class="col-md-6">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Gráfico de Barras</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <canvas id="barChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->

                    <!-- LINE CHART -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-warning">
                                <div class="card-header">
                                    <h3 class="card-title">Gráfico de Líneas</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <canvas id="lineChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- /.content-wrapper -->

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
    <!-- Bootstrap -->
    <script src="../Vista/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="../Vista/dista/js/adminlte.js"></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="../Vista/plugins/chart.js/Chart.min.js"></script>
    <script>
        $(function () {
            //-------------
            //- PIE CHART -
            //-------------
            var pieData = {
                labels: <?php echo $labels; ?>,
                datasets: [{
                    data: <?php echo $values; ?>,
                    backgroundColor: ['#f56954', '#00a65a'],
                }]
            };

            var pieOptions = {
                maintainAspectRatio: false,
                responsive: true,
            };

            new Chart($('#pieChart').get(0).getContext('2d'), {
                type: 'pie',
                data: pieData,
                options: pieOptions
            });

            //-------------
            //- BAR CHART -
            //-------------
            var barChartCanvas = $('#barChart').get(0).getContext('2d');
            var barData = {
                labels: <?php echo json_encode($dias); ?>,
                datasets: [
                    {
                        label: 'Reservaciones por día',
                        backgroundColor: '#007bff',
                        borderColor: '#007bff',
                        borderWidth: 1,
                        data: <?php echo json_encode($totalReservaciones); ?>
                    }
                ]
            };
            var barOptions = {
                maintainAspectRatio: false,
                responsive: true,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            };

            var barChart = new Chart(barChartCanvas, {
                type: 'bar',
                data: barData,
                options: barOptions
            });

            //-------------
            //- LINE CHART -
            //-------------
            var lineData = {
                labels: <?php echo json_encode($horas); ?>,
                datasets: [{
                    label: 'Reservaciones por Hora',
                    fill: false,
                    borderColor: 'rgba(255,99,132,1)',
                    data: <?php echo json_encode($totalReservacionesPorHora); ?>
                }]
            };

            var lineOptions = {
                responsive: true,
                maintainAspectRatio: false
            };

            new Chart($('#lineChart').get(0).getContext('2d'), {
                type: 'line',
                data: lineData,
                options: lineOptions
            });
        });
    </script>
</body>

</html>
