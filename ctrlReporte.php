<!DOCTYPE html>
<html lang="en">

<head>
    <title>Reportes</title>
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
        <?php include "../Vista/modulos/navAdmin.php";?>
        <!-- Main Sidebar Container -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">

                            <h1 class="m-0"> <box-icon name='report' type='solid' color='#e24141'></box-icon>
                            </h1>
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

                    <?php
                    include("../Modelo/mReporte.php");

                    $rep = new Reporte();




                    if (isset($_REQUEST['id'])) {
                        switch ($_REQUEST['id']) {
                            case 1:

                                $rep->listarBotones();


                                break;
                            case 2:

                                break;
                            case 3:
                                break;
                            case 4:
                                $reservacionesPorDia = $rep->obtenerReservacionesPorDia();

                                echo "<h2>Reporte de Reservaciones por Día</h2>";
                                echo "<table border='1'>";
                                echo "<tr><th>Día</th><th>Total de Reservaciones</th></tr>";
                                foreach ($reservacionesPorDia as $reservacion) {
                                    echo "<tr>";
                                    echo "<td>" . $reservacion['dia'] . "</td>";
                                    echo "<td>" . $reservacion['total_reservaciones'] . "</td>";
                                    echo "</tr>";
                                }
                                echo "</table>";

                                break;
                            default:
                                echo "ID de reporte no válido";
                        }
                    } else {

                        echo "<p>Seleccione un reporte para ver los detalles.</p>";
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