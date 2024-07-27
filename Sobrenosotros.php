<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
  <title>Sobre nosotros</title>
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
    <!-- parallax top-->
    <!-- Breadcrumbs -->
    <section class="bg-gray-7">
      <div class="breadcrumbs-custom box-transform-wrap context-dark">
        <div class="container">
          <h3 class="breadcrumbs-custom-title">Sobre nosotros</h3>
          <div class="breadcrumbs-custom-decor"></div>
        </div>
        <div class="box-transform" style="background-image: url(../Vista/images/nosotros.jpg);"></div>
      </div>
    </section>
    <section class="section section-lg bg-default">
      <div class="container">
        <div class="tabs-custom row row-50 justify-content-center flex-lg-row-reverse text-center text-md-left" id="tabs-4">
          <div class="col-lg-8 col-xl-9">
            <!-- Tab panes-->
            <div class="tab-content tab-content-1">
              <div class="tab-pane fade show active" id="tabs-4-1">
                <h4>¿Quiénes somos?</h4>
                <p>Somos Dadi's Cafetería, un negocio que busca crecer cada día con el apoyo de nuestra comunidad.
                  Iniciamos hace tres años, post-pandemia, gracias a la confianza de nuestros comensales. Fue así como
                  pudimos expandirnos a
                  lo largo de estos años de aprendizaje. Nos gusta pensar que nuestros clientes llegan sabiendo que esta
                  es más que una cafetería, es un lugar donde la calidez y la calidad se encuentran en cada uno de
                  nuestros productos.
                </p><img src="../Vista/images/nosotros (1).jpg" alt="" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Icon Classic-->
    <section class="section section-lg bg-gray-100">
      <div class="container">
        <div class="row row-md row-50">
          <div class="col-sm-6 col-xl-4 wow fadeInUp" data-wow-delay="0s">
            <article class="box-icon-classic">
              <div class="unit unit-spacing-lg flex-column text-center flex-md-row text-md-left">
                <div class="unit-left">
                  <div class="box-icon-megan-icon linearicons-bag"></div>
                </div>
                <div class="unit-body">
                  <h5 class=""><a href="../Vista/reservacion.php">Conoce nuestra reserva de mesa</a></h5>
                  <p class="box-icon-classic-text">Con tu reserva de mesa y alimentos, solo llegas a disfrutar la
                    experiencia y tus deliciosos alimentos.</p>
                </div>
              </div>
            </article>
          </div>
          <div class="col-sm-6 col-xl-4 wow fadeInUp" data-wow-delay=".1s">
            <article class="box-icon-classic">
              <div class="unit unit-spacing-lg flex-column text-center flex-md-row text-md-left">
                <div class="unit-left">
                  <div class="box-icon-classic-icon linearicons-pizza"></div>
                </div>
                <div class="unit-body">
                  <h5 class="box-icon-classic-title"><a href="#"></a>Gran calidad en nuestro servicio</h5>
                  <p class="box-icon-classic-text">Nos gusta brindar el mejor servicio a nuestros clientes, con
                    alimentos de calidad y el mejor trato que se merecen</p>
                </div>
              </div>
            </article>
          </div>
          <div class="col-sm-6 col-xl-4 wow fadeInUp" data-wow-delay=".2s">
            <article class="box-icon-classic">
              <div class="unit unit-spacing-lg flex-column text-center flex-md-row text-md-left">
                <div class="unit-left">
                  <div class="box-icon-classic-icon linearicons-leaf"></div>
                </div>
                <div class="unit-body">
                  <h5 class="box-icon-classic-title"><a href="#">Alimentos hechos con la mejor higiene</a></h5>
                  <p class="box-icon-classic-text">En dady's nos gusta brindar confianza a nuestros clientes,
                    con los más altos estándares de limpieza y seguridad alimentaria.
                </div>
              </div>
            </article>
          </div>
        </div>
      </div>
    </section>

    <!-- Our Team-->

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