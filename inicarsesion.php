<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
<head>
  <title>Iniciar sesion</title>
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
  <div class="preloader"></div>
  <div class="page">
    <?php include ("./modulos/nav.php"); ?>
    <section class="section section-lg bg-default">
      <div class="container">
        <h1>Iniciar sesión</h1>
        <h3 class="oh-desktop"></h3>
        <div class="row row-lg row-30">
          <div class="formulario">
            <form action="validar.php" method="post">
              <div class="username">
                <input type="email" required name="correo"><br><br>
                <label>Correo electrónico</label>
              </div>
              <div class="username">
                <input type="password" name="contraseña" required>
                <label>Contraseña</label>
              </div>
              <input type="hidden" name="opcion" value="2">
              <div class="registrarse">
                <input type="submit"></input>
              </div>
              <div class="registrarse"><a href="../Vista/registrarse.php">Registrarse</a></div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <?php include ("../Vista/modulos/footer.php"); ?>
  </div>
  <!-- Global Mailform Output-->
  <div class="snackbars" id="form-output-global"></div>
  <!-- Javascript-->
  <script src="../Vista/js/core.min.js"></script>
  <script src="../Vista/js/script.js"></script>
</body>
</html>
