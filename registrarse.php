<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
  <title>Registrarse</title>
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
        <h1>Registrarse</h1>
        <h3 class="oh-desktop"></h3>
        <div class="row row-lg row-30">

          <div class="formulario1">
            <form action="../Controlador/ctrlUsuario.php" method="post" id="registro-form">
              <div class="username">
                <label for="nombre">Nombre(s)</label>
                <input type="text" id="nombre" name="nombre" required>
                <div class="error-message" id="nombre-error"></div>
              </div>
              <div class="username">
                <label for="apellidop">Apellido paterno</label>
                <input type="text" id="apellidop" name="apellidop" required>
                <div class="error-message" id="apellidos-error"></div>
              </div>
              <div class="username">
                <label for="apellidom">Apellido materno</label>
                <input type="text" id="apellidom" name="apellidom" required>
                <div class="error-message" id="apellidos-error"></div>
              </div>

              <div class="username">
                <label for="correo">Correo electrónico</label>
                <input type="email" id="correo" name="correo" required>
                <div class="error-message" id="correo-error"></div>
              </div>
              <div class="username">
                <label for="contrasena">Contraseña</label>
                <input type="password" id="contrasena" name="contraseña" required>
                <div class="error-message" id="contrasena-error"></div>
              </div>
              <div class="username">
                <label for="confirmar_contrasena">Confirma la contraseña</label>
                <input type="password" id="confirmar_contrasena" name="confirmar_contrasena" required>
                <div class="error-message" id="confirmar_contrasena-error"></div>
              </div>
              <div class="username">
                <label for="telefono">Teléfono</label>
                <input type="tel" id="telefono" name="telefono" required>
                <div class="error-message" id="telefono-error"></div>
              </div>
              <input type="hidden" name="id_rol" value="2">
              <input type="hidden" name="id" value="1">
              <input type="submit" value="Registrar"><br>
              <div class="registrarse"><a href="../Vista/inicarsesion.php">Iniciar sesión</a></div>
            </form>
          </div> <br><br><br>
        </div>
      </div>
  </section>


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