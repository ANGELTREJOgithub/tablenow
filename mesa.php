<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
    <title>Reservacion</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport"
        content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="../Vista/images/logob (3).png (3).png" type="image/x-icon">
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css"
        href="//fonts.googleapis.com/css?family=Roboto:100,300,300i,400,500,600,700,900%7CRaleway:500">
    <link rel="stylesheet" href="../Vista/css/bootstrap.css">
    <link rel="stylesheet" href="../Vista/css/fonts.css">
    <link rel="stylesheet" href="../Vista/css/estilos.css">

</head>

<body>
    <div class="preloader">

    </div>
    <div class="page">

        <?php
        include ("./modulos/nav.php");
        ?>
        <div class="container">

            <h1>Elige tu mesa</h1>
            <img src="../Vista/images/mesas.jpg" alt="" />

            <form action="../Controlador/ctrlReserva.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="tipo">Elige la mesa</label>
                    <?php
                    $nombre=$_REQUEST['nombre'];
                    $telefono=$_REQUEST['telefono'];
                    $fecha_reservacion=$_REQUEST['fecha_reservacion'];
                    $horaMesa=$_REQUEST['horaMesa'];
                    $numero_personas=$_REQUEST['numero_personas'];
                    $id_user=$_REQUEST['id'];
                    $correo=$_REQUEST['correo'];
                    include ("../Modelo/mdReserva.php");
                    $res = new Reservaciones();
                    $res->mostrarMesas($numero_personas, $horaMesa);
                    ?>
                <input type="hidden" name="nombre" value="<?php echo $nombre; ?>">
                <input type="hidden" name="telefono" value="<?php echo $telefono; ?>">
                <input type="hidden" name="fecha_reservacion" value="<?php echo $fecha_reservacion; ?>">
                <input type="hidden" name="horaMesa" value="<?php echo $horaMesa; ?>">
                <input type="hidden" name="numero_personas" value="<?php echo $numero_personas; ?>">
                <input type="hidden" name="id_user" value="<?php echo $id; ?>">
                <input type="hidden" name="correo" value="<?php echo $correo; ?>">
                <input type="hidden" name="id" value="1">
                    <input type="submit" value="Hacer reservacion"><br>



            </form>



            <!-- parallax top-->
            <!-- Our Team-->


            <!-- Our clients-->

            <!-- Page Footer-->
        </div>
    </div>





    <!-- parallax top-->
    <!-- Our Team-->



    <!-- Our clients-->

    <!-- Page Footer-->
    <?php
    include ("../Vista/modulos/footer.php")
        ?>

    </div>
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
    <script src="../Vista/js/core.min.js"></script>
    <script src="../Vista/js/script.js"></script>
</body>

</html>