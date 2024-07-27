<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
  <title>Bebidas</title>
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
        <h3 class="oh-desktop"><span class="d-inline-block wow slideInUp">Checa nuestros tipo de bebida</span></h3>
        <div class="row row-lg row-30">
          <div class="col-sm-6 col-lg-4 col-xl-3">
            <!-- Product-->

          </div>
          <div class="col-sm-6 col-lg-4 col-xl-3">
            <!-- Product-->
            <article class="product wow fadeInLeft" data-wow-delay=".1s">
              <div class="product-figure"><img src="../Vista/images/cafef.jpg" alt= />
              </div>
              <div class="product-rating">
              </div>
              <h6 class="product-title">Cafes</h6>
              <div class="product-button">

                <div class="button-wrap"><a class="button button-xs button-secondary button-winona" href="../Vista/cafes.php">Ver productos</a></div>
              </div>
            </article>
          </div>
          <div class="col-sm-6 col-lg-4 col-xl-3">
            <!-- Product-->
            <article class="product wow fadeInLeft" data-wow-delay=".1s">
              <div class="product-figure"><img src="../Vista/images/frappef.jpg" alt= />
              </div>
              <div class="product-rating">
              </div>
              <h6 class="product-title">Frapes</h6>
              <div class="product-button">

                <div class="button-wrap"><a class="button button-xs button-secondary button-winona" href="../Vista/Frapes.php">Ver productos</a></div>
              </div>
            </article>
          </div>

        </div>
      </div>

    </section>
    <div class="container">

      <h3 class="oh-desktop"><span class="d-inline-block wow slideInUp">Saborea la calidad en cada bocado.</span></h3>


      <a class="button button-md button-secondary-2 button-winona wow fadeInUp" href="../Vista/menu.php" data-wow-delay=".2s">Regresar</a>

      <div class="row row-lg row-30">
      </div>

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