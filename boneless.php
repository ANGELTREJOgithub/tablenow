<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
  <title>Boneless</title>
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
  include ("./modulos/nav.php");
  ?>
    <section class="section section-lg bg-default">
      <div class="container">
        <h3 class="oh-desktop"><span class="d-inline-block wow slideInUp">Boneless</span></h3>
        <div class="row row-lg row-30">
        <?php
          include ("../Modelo/modProducto.php");
          $pro= new Productos();
          $pro->verBoneless();
          ?>
      </div>
    </section>
    <div class="container">

      <h3 class="oh-desktop"><span class="d-inline-block wow slideInUp">Saborea la calidad en cada bocado.</span></h3>

      <a class="button button-md button-secondary-2 button-winona wow fadeInUp" href="../Vista/reservacion.php" data-wow-delay=".2s">Reservar tu mesa</a>
      <a class="button button-md button-secondary-2 button-winona wow fadeInUp" href="../Vista/WINGS.php" data-wow-delay=".2s">Regresar</a>

      <div class="row row-lg row-30">
      </div>



      <!-- Our clients-->

      <!-- Page Footer-->
    </div>
    <!-- parallax top-->
    <!-- Our Team-->


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