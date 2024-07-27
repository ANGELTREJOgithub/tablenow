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

    <header class="section page-header">
      <!-- RD Navbar-->
      <div class="rd-navbar-wrap">
        <nav class="rd-navbar rd-navbar-modern" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="56px" data-xl-stick-up-offset="56px" data-xxl-stick-up-offset="56px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
          <div class="rd-navbar-inner-outer">
            <div class="rd-navbar-inner">
              <!-- RD Navbar Panel-->
              <div class="rd-navbar-panel">
                <!-- RD Navbar Toggle-->
                <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                <!-- RD Navbar Brand-->
                <div class="rd-navbar-brand"><a class="brand" href="../index.php"><img class="brand-logo-dark" src="../Vista/images/logofina (1).jpg" alt= /></a></div>
              </div>
              <div class="rd-navbar-right rd-navbar-nav-wrap">
                <div class="rd-navbar-main">
                  <!-- RD Navbar Nav-->
                  <ul class="rd-navbar-nav">
                    <li class="rd-nav-item "><a class="rd-nav-link" href="../index.php">Inicio</a>
                    </li>
                    <li class="rd-nav-item"><a class="rd-nav-link" href="../Vista/Sobrenosotros.php">Nosotros</a>
                    </li>
                    <li class="rd-nav-item "><a class="rd-nav-link" href="../Vista/menu.php">Menú</a>
                    </li>
                    <li class="rd-nav-item active"><a class="rd-nav-link" href="../Vista/inicarsesion.php">Registrate</a>
                    </li>
                    <li class="rd-nav-item"><a class="rd-nav-link" href="../Vista/reservacion.php">Reserva</a>
                    </li>
                    <li class="rd-nav-item"><a class="rd-nav-link" href="../Vista/contacto.php">Contactanos</a>
                    </li>
                  </ul>
                </div>
              </div>

            </div>
        </nav>
      </div>
    </header>
    <section class="section section-lg bg-default">
      <div class="container">
        <h1>Registrar un producto</h1>
        <h3 class="oh-desktop"></h3>
        <div class="row row-lg row-30">

                <div class="formulario1">
                    <form action="../Controlador/ctrlUProdcuto.php" method="post" id="registro-form"> 
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Imagen</label>
                <input type="file" name="imagen" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Por favor, seleccione una imagen.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre</label>
                <input type="nombre" name="nombre" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Por favor, ingrese el nombre del producto.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Descripción</label>
                <input type="text" name="descripcion" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Por favor, ingrese la descripción del producto.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Precio</label>
                <input type="number" name="precio" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Por favor, ingrese el precio del producto</div>
            </div>
            
                <button type="submit" class="btn btn-primary">Guardar</button>
        <a class="btn btn-danger" href="#">Cancelar</a>
        </form>
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