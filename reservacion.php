<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
  <title>Reservacion</title>
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

        </div>
        <div class="container">
        <h1>Realiza tu Reservacion</h1>
          <h3 class="oh-desktop"></h3>
          <div class="row row-lg row-30">
            <div class="formulario1">
              <?php
                if(isset($_REQUEST['correo'])){
                  $correo=$_REQUEST['correo'];
                  $id=$_REQUEST['id'];
                  ?>
              <form action="mesa.php?correo=<?php echo "$correo"?>&id=<?php echo "$id" ?>" method="post" id="registro-form">
                <div class="username">
                  <label for="nombre">Nombre(s)</label>
                  <input type="text" id="nombre" name="nombre" required>
                  <div class="error-message" id="nombre-error"></div>
                </div>
                <div class="username">
                  <label for="telefono">Teléfono</label>
                  <input type="tel" id="telefono" name="telefono" required>
                  <div class="error-message" id="telefono-error"></div>
                </div>
                <div class="username">
                  <label for="fecha_reservacion">Fecha de la Reservación</label>
                  <input type="date" id="fecha_reservacion" name="fecha_reservacion" required>
                  <div class="error-message" id="fecha_reservacion-error"></div>
                </div>
                <div class="username">
                  <!-- <label for="hora_reservacion">Hora de la Reservación</label>
                  <input type="time" id="hora_reservacion" name="hora_reservacion" required>
                  <div class="error-message" id="hora_reservacion-error"></div> -->
                  <?php
                  include("../Modelo/mdMesa.php");
                  $mes=new Mesa();
                  $mes->horaMesa();
                  ?>
                </div>
                <div class="username">
                  <label for="numero_personas">Número de Personas</label>
                  <input type="number" id="numero_personas" name="numero_personas" min="1" required>
                  <div class="error-message" id="numero_personas-error"></div>
                </div>
                <input type="hidden" name="rol" value="2">
                <input type="submit" value="Hacer reservacion"><br>
              </form>
                  <?php

                }else{
                  ?>
                    <h3 class="oh-desktop"><span class="d-inline-block wow slideInUp">Primero tienes que iniciar sesion o crear una cuenta!.</span></h3>
                    <a class="button button-md button-secondary-2 button-winona wow fadeInUp" href="../Vista/inicarsesion.php" data-wow-delay=".2s">iniciar sesion</a>

                  <?php
                }

              ?>

            </div>
          </div>
        </div>
      </section>
      <div class="container">

        <h3 class="oh-desktop"><span class="d-inline-block wow slideInUp">Checa tu reservación.</span></h3>

        <a class="button button-md button-secondary-2 button-winona wow fadeInUp" href="../Vista/Pedido.php" data-wow-delay=".2s">Pedido</a>

        <div class="row row-lg row-30">
        </div>



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