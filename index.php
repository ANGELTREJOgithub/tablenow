<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
  <title>TableNow</title>
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport"
    content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta charset="utf-8">
  <link rel="icon" href="../Tablenow/Vista/images/logob.png" type="image/x-icon">
  <!-- Stylesheets-->
  <link rel="stylesheet" type="text/css"
    href="//fonts.googleapis.com/css?family=Roboto:100,300,300i,400,500,600,700,900%7CRaleway:500">
  <link rel="stylesheet" href="../Tablenow/Vista/css/bootstrap.css">
  <link rel="stylesheet" href="../Tablenow/Vista/css/fonts.css">
  <link rel="stylesheet" href="../Tablenow/Vista/css/estilos.css">
</head>

<body>
  <?php
  include ("./Vista/modulos/nav.php");
  ?>

  <!-- Swiper-->
  <section class="section swiper-container swiper-slider swiper-slider-2 swiper-slider-3" data-loop="true"
    data-autoplay="5000" data-simulate-touch="false" data-slide-effect="fade">
    <div class="swiper-wrapper text-sm-left">
      <div class="swiper-slide context-dark" style="background-image: url('../Tablenow/Vista/images/Fondo1.jpg');">
        <div class="swiper-slide-caption section-md">
          <div class="container">
            <div class="row">
              <div class="col-sm-9 col-md-8 col-lg-7 col-xl-7 offset-lg-1 offset-xxl-0">
                <h1 class="oh swiper-title"><span class="d-inline-block" data-caption-animate="slideInUp"
                    data-caption-delay="0">Bienvenidos a Dady's</span></h1>
                <p class="big swiper-text" data-caption-animate="fadeInLeft" data-caption-delay="300">Sabor
                  expres,calidad eterna</p>
                <a class="button button-lg button-primary button-winona button-shadow-2" href="../Tablenow/Vista/menu.php"
                  data-caption-animate="fadeInUp" data-caption-delay="300">Ir al menú</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-slide context-dark" style="background-image: url('../Tablenow/Vista/images/fondo2.jpg');">
        <div class="swiper-slide-caption section-md">
          <div class="container">
            <div class="row">
              <div class="col-sm-8 col-lg-7 offset-lg-1 offset-xxl-0">
                <h1 class="oh swiper-title"><span class="d-inline-block" data-caption-animate="slideInDown"
                    data-caption-delay="0">Dar nuestro mejor sevicio es nuestra prioridad</span></h1>
                <p class="big swiper-text" data-caption-animate="fadeInRight" data-caption-delay="300">Que esperas para
                  visitarnos</p>
                <div class="button-wrap oh"><a class="button button-lg button-primary button-winona button-shadow-2"
                    href="../Tablenow/Vista/menu.php" data-caption-animate="slideInUp" data-caption-delay="0">Ir al menú</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Swiper Pagination-->
  <!-- navegacion con flechas-->
  <div class="swiper-button-prev">
    <div class="preview">
      <div class="preview__img"></div>
    </div>
    <div class="swiper-button-arrow"></div>
  </div>
  <div class="swiper-button-next">
    <div class="swiper-button-arrow"></div>
    <div class="preview">
      <div class="preview__img"></div>
    </div>
  </div>
  </section>
  <!-- nuestro menu-->
  <section class="section section-md bg-default">
    <div class="container">
      <h3 class="oh-desktop"><span class="d-inline-block wow slideInDown">En nuestro menú contamos con..</span></h3>
      <div class="row row-md row-30">
        <div class="col-sm-6 col-lg-4">
          <div class="oh-desktop">
            <!-- Services Terri-->
            <article class="services-terri wow slideInUp">
              <div class="services-terri-figure"><img src="../Tablenow/Vista/images/ensaladaMenu.jpg" alt= />
              </div>
              <div class="services-terri-caption"><img>
                <h5 class="services-terri-title"><a href="../Tablenow/Vista/ensaladas.php">Ensaladas</a></h5>
              </div>
            </article>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="oh-desktop">
            <!-- Services Terri-->
            <article class="services-terri wow slideInDown">
              <div class="services-terri-figure"><img src="../Tablenow/Vista/images/HAMBUR.jpg" alt= />
              </div>
              <div class="services-terri-caption">
                <h5 class="services-terri-title"><a href="../Tablenow/Vista/Hamburguesas.php">Hamburguesas</a></h5>
              </div>
            </article>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="oh-desktop">
            <!-- Services Terri-->
            <article class="services-terri wow slideInUp">
              <div class="services-terri-figure"><img src="../Tablenow/Vista/images/PAPAFRITA.jpg" alt="Papas Fritas" />
              </div>
              <div class="services-terri-caption">
                <h5 class="services-terri-title"><a href="../Tablenow/Vista/papas.php">Papas</a></h5>
              </div>
            </article>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="oh-desktop">
            <!-- Services Terri-->
            <article class="services-terri wow slideInDown">
              <div class="services-terri-figure"><img src="../Tablenow/Vista/images/alitabone.jpg" alt= />
              </div>
              <div class="services-terri-caption">
                <h5 class="services-terri-title"><a href="../Tablenow/Vista/WINGS.php">Alitas y<br>Boneless</br></a></h5>
              </div>
            </article>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="oh-desktop">
            <!-- Services Terri-->
            <article class="services-terri wow slideInUp">
              <div class="services-terri-figure"><img src="../Tablenow/Vista/images/bebidas.jpg" alt= />
              </div>
              <div class="services-terri-caption">
                <h5 class="services-terri-title"><a href="../Tablenow/Vista/bebidas.php">Bebidas</a></h5>
              </div>
            </article>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="oh-desktop">
            <!-- Services Terri-->
            <article class="services-terri wow slideInDown">
              <div class="services-terri-figure"><img src="../Tablenow/Vista/images/PAS.jpg" alt= />
              </div>
              <div class="services-terri-caption">
                <h5 class="services-terri-title"><a href="../Tablenow/Vista/pastas.php">Pastas</a></h5>
              </div>
            </article>
          </div>

        </div>
      </div>
    </div>
  </section>

  <!-- citas-->
  <section class="primary-overlay section parallax-container">
    <div class="parallax-content section-xl context-dark text-md-left">
      <div class="container">
            <div class="cta-modern">
              <h3 class="cta-modern-title wow fadeInRight">La mejor experiencia para ti</h3>
              <p class="lead">¿Qué esperas para hacer tu reservación?"</p>
              <a class="button button-md button-secondary-2 button-winona wow fadeInUp" href="../Tablenow/Vista/reservacion.php"
                data-wow-delay=".2s">Reserva tu mesa</a>
            </div>
          </div>
        </div>
  </section>
  <!-- Tell-->


  <!-- Section Services  Last section-->
  <section class="section section-sm bg-default">
    <div class="container">
      <div class="owl-carousel owl-style-11 dots-style-2" data-items="1" data-sm-items="1" data-lg-items="2"
        data-xl-items="4" data-margin="30" data-dots="true" data-mouse-drag="true" data-rtl="true">
        <article class="box-icon-megan wow fadeInUp">
          <div class="box-icon-megan-header">
            <div class="box-icon-megan-icon linearicons-radar"></div>
          </div>
          <h5 class="box-icon-megan-title"><a href="../Tablenow/Vista/registrarse.php">Inicia sesión</a></h5>
          <p class="box-icon-megan-text">Necesitamos saber quién eres para brindarte un mejor servicio.
          </p>
        </article>
        <article class="box-icon-megan wow fadeInUp" data-wow-delay=".1s">
          <div class="box-icon-megan-header">
            <div class="box-icon-megan-icon linearicons-bag"> </div>
          </div>
          <h5 class="box-icon-megan-title"><a href="../Tablenow/Vista/reservacion.php">Realiza tu reservación</a></h5>
          <p class="box-icon-megan-text">Reserva tu mesa,hora de llegada,número de personas y tus alimentos a consumir</p>
        </article>
        <article class="box-icon-megan wow fadeInUp" data-wow-delay=".1s">
          <div class="box-icon-megan-header">
            <div class="box-icon-megan-icon linearicons-map2"></div>
          </div>
          <h5 class="box-icon-megan-title"><a href="#">Dirigete al local</a></h5>
          <p class="box-icon-megan-text">Una vez pagado la reserva, acude a tiempo a nuestro establecimiento.</p>
        </article>
        <article class="box-icon-megan wow fadeInUp" data-wow-delay=".15s">
          <div class="box-icon-megan-header">
            <div class="box-icon-megan-icon linearicons-thumbs-up"></div>
          </div>
          <h5 class="box-icon-megan-title"><a href="#">Disfruta</a></h5>
          <p class="box-icon-megan-text">Solo queda disfrutar de tus deliciosos alimentos  seleccionados.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- Page Footer-->
  <footer class="section footer-modern context-dark footer-modern-2">
    <div class="footer-modern-line">
      <div class="container">
        <div class="row row-50">
          <div class="col-md-6 col-lg-4">
            <h5 class="footer-modern-title oh-desktop"><span class="d-inline-block wow slideInLeft">¿Qué ofrecemos?</span>
            </h5>
            <ul class="footer-modern-list d-inline-block d-sm-block wow fadeInUp">
              <li><a href="../Tablenow/Vista/alitas.php">Alitas</a></li>
              <li><a href="../Tablenow/Vista/boneless.php">Boneless</a></li>
              <li><a href="../Tablenow/Vista/Hamburguesas.php">Hamburguesas</a></li>
              <li><a href="../Tablenow/Vista/papas.php">Papas</a></li>
              <li><a href="../Tablenow/Vista/pastas.php">Pastas</a></li>
              <li><a href="../Tablenow/Vista/ensaladas.php">Ensaladas</a></li>
              <li><a href="../Tablenow/Vista/cafes.php">Cafés</a></li>
              <li><a href="../Tablenow/Vista/Frapes.php">Frapés</a></li>
            </ul>
          </div>
          <div class="col-lg-4 col-xl-5" style="align-items: center;">
            <h5 class="footer-modern-title oh-desktop" style="text-align: left;">
                <span class="d-inline-block wow slideInLeft">Comunícate con nosotros</span>
                <a class="button button-sm button-icon-3 button-primary button-winona" href="../Tablenow/Vista/contacto.php">
                    <span class="d-none d-xl-inline-block">Contáctanos</span>
                    <span class="icon mdi mdi-telegram d-xl-none"></span>
                </a>
            </h5>
        </div>        
          <div class="col-md-6 col-lg-4 col-xl-3">
            <h5 class="footer-modern-title oh-desktop"><span class="d-inline-block wow slideInLeft">¿Quiénes somos?</span>
            </h5>
            <ul class="footer-modern-list d-inline-block d-sm-block wow fadeInUp">
              <li><a href="../Tablenow/Vista/Sobrenosotros.php">Sobre nosotros</a></li>
              <li><a href="../Tablenow/Vista/menu.php">Nuestro menú</a></li>
              <li><a href="../Tablenow/Vista/inicarsesion.php">Inicia sesión</a></li>
              <li><a href="../Tablenow/Vista/reservacion.php">Realiza tu reserva</a></li>
              <li><a href="../Tablenow/Vista/documentos/POLITICAS DE RESERVACACION.pdf">Politica de reservación</a></li>
            </ul>
          </div>

        </div>
      </div>
    </div>
    <div class="footer-modern-line-2">
      <div class="container">
        <div class="row row-30 align-items-center">
          <div class="col-sm-6 col-md-7 col-lg-4 col-xl-4">
            <div class="row row-30 align-items-center text-lg-center">
              <div class="col-md-5 col-xl-6">
                <div class="footer-modern-contacts wow slideInUp">
                  <div class="unit unit-spacing-sm align-items-center">
                    <div class="unit-left"><span class="icon icon-24 mdi mdi-phone"></span></div>
                    <div class="unit-body"><a class="phone" href="tel:#"> +52 55-58-60-46-96</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-12 col-lg-8 col-xl-8 oh-desktop">
            <div class="group-xmd group-sm-justify">
              <div class="footer-modern-contacts wow slideInUp">
                <div class="unit unit-spacing-sm align-items-center">
                  <div class="unit-left"><span class="icon icon-24 mdi mdi-phone"></span></div>
                  <div class="unit-body"><a class="phone" href="tel:#">+52 56-10-48-42-14</a></div>
                </div>
              </div>
              <div class="footer-modern-contacts wow slideInDown">
                <div class="unit unit-spacing-sm align-items-center">
                  <div class="unit-left"><span class="icon mdi mdi-email"></span></div>
                  <div class="unit-body"><a class="mail" href="mailto:#">dady's18@gmail.com</a></div>
                </div>
              </div>
              <div class="wow slideInRight">
                <ul class="list-inline footer-social-list footer-social-list-2 footer-social-list-3">
                  <li><a class="icon mdi mdi-facebook" href="#"></a></li>
                  <li><a class="icon mdi mdi-twitter" href="#"></a></li>
                  <li><a class="icon mdi mdi-instagram" href="#"></a></li>
                  <li><a class="icon mdi mdi-google-plus" href="#"></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-modern-line-3" style="color: black;">
      <div class="container">
          <div class="row row-10 justify-content-between">
              <div class="col-md-6"><a>Eje vial 10 sur(carretera a tlaltenco a la mexico puebla 296),santa
                      Catarina,Tlahuac,13100 Cdmx</a></div>
                      <div class="col-md-auto">
                        <!-- Rights-->
                        <p class="rights" style="color: black;"><span>&copy;&nbsp;</span><span class="copyright-year"></span><span></span><span>.&nbsp;</span>
                            <span>All Rights Reserved.</span><span> Design&nbsp;by&nbsp;<a
                                    href="https://www.templatemonster.com">TemplateMonster</a></span></p>
                    </div>
                    
          </div>
      </div>
  </div>
  
  </footer>

  </div>
  <div class="snackbars" id="form-output-global"></div>
  <!-- Javascript-->
  <script src="../Tablenow/Vista/js/core.min.js"></script>
  <script src="../Tablenow/Vista/js/script.js"></script>

</body>

</html>