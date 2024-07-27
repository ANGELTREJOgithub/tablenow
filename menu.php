<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
  <title>Menu</title>
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

    <section class="section section-lg bg-default">
      <div class="container">
        <h3 class="oh-desktop"><span class="d-inline-block wow slideInUp">Nuestra especialidad</span></h3>
        <?php
        include("../Modelo/Categoria.php");
        $cat = new Categoria();
        $cat->mostarCategoria();
        if (isset($_POST['buscar'])) {
          $campo = $_POST['campo'];
          $id_categoria = $_POST['id_categoria'];
          $cat->obtenerDetallesCategoria($id_categoria, $campo);
        }

        ?>
        <div class="row row-lg row-30">
          <?php
          $cat->verCategoria();
          ?>
        </div>


        <div class="container">

        </div>
    </section>



    <div class="container">

      <h3 class="oh-desktop"><span class="d-inline-block wow slideInUp">ve nuestra variedad de platillos y bebidas</span></h3>

      <a class="button button-md button-secondary-2 button-winona wow fadeInUp" href="../Vista/reservacion.php" data-wow-delay=".2s">Reservar tu mesa</a>
      <a class="button button-md button-secondary-2 button-winona wow fadeInUp" href="../index.html" data-wow-delay=".2s">Regresar</a>

      <div class="row row-lg row-30">
      </div>



      <!-- parallax top-->
      <!-- Our Team-->


      <!-- Our clients-->

      <!-- Page Footer-->

    </div>
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