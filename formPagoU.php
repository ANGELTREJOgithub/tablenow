<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
    <title>Pago</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="../Vista/images/logob (3).png" type="image/x-icon">
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:100,300,300i,400,500,600,700,900%7CRaleway:500">
    <link rel="stylesheet" href="../Vista/css/bootstrap.css">
    <link rel="stylesheet" href="../Vista/css/fonts.css">
    <link rel="stylesheet" href="../Vista/css/estilos.css">

</head>

<body>
    <div class="preloader">

    </div>
    <div class="page">

        <?php
        include("./modulos/nav.php");
        ?>

        <!-- parallax top-->
        <!-- Our Team-->
        <div class="container">

            <h3 class="oh-desktop"><span class="d-inline-block wow slideInUp">Tu compra es muy valiosa</span>
            </h3>
            <div class="row row-lg row-30">
            </div>

        </div>
        <div class="container">
            <h3 class="oh-desktop"></h3>
            <div class="row row-lg row-30">

                <div class="formulario1">
                    <form action="../Controlador/ctrlPago.php" method="post" id="registro-form">

                        <div class="username">
                            <label for="telefono">Total</label>
                            <input type="tel" id="telefono" name="telefono" required>
                            <div class="error-message" id="telefono-error"></div>
                        </div>
                        <div class="username">
                            <label for="tipo_contacto">Selecciona el tipo de pago</label>
                            <select name="tipo_contacto" id="tipo_contacto">
                                <option value="debito">Tarjeta de debito</option>
                                <option value="credito">Trajeta de credito</option>
                                <option value="Paypal">Paypal</option>
                         
                            </select>
                        </div>
                        <div class="username">
                            <label for="nombre">Número de transferencia</label>
                            <input type="text" id="nombre" name="nombre" required>
                            <div class="error-message" id="nombre-error"></div>
                        </div>
                        <input type="hidden" name="id_rol" value="2">
                        <input type="hidden" name="id" value="1">
                        <input type="submit" value="Pagar"><br>
                    </form>
                </div> <br><br><br>

            </div>
            </section>

            <div class="row row-lg row-30">

            </div>
        </div>
        <div class="container">
            <a class="button button-md button-secondary-2 button-winona wow fadeInUp" href="../Vista/Pedido.php" data-wow-delay=".2s">Regresar</a>
            <div class="row row-lg row-30">
            </div>
        </div>


        <!-- Our clients-->

        <!-- Page Footer-->
        <?php
        include("../Vista/modulos/footer.php")
        ?>
    </div>
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
    <script src="../Vista/js/core.min.js"></script>
    <script src="../Vista/js/script.js"></script>
</body>

</html>
