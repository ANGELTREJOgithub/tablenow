<!DOCTYPE html>
<html class="wide wow-animation" lang="es">

<head>
  <title>Pedido</title>
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta charset="utf-8">
  <link rel="icon" href="../Vista/images/logob.png" type="image/x-icon">
  <!-- Stylesheets-->
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:100,300,300i,400,500,600,700,900%7CRaleway:500">
  <link rel="stylesheet" href="../Vista/css/bootstrap.css">
  <link rel="stylesheet" href="../Vista/css/fonts.css">
  <link rel="stylesheet" href="../Vista/css/estilos.css">
</head>

<body>
  <div class="preloader"></div>
  <div class="page">

    <?php include("./modulos/nav.php"); ?>

    <div class="container">
      <h3 class="oh-desktop"><span class="d-inline-block wow slideInUp">Tu reservacion</span></h3>
      <div class="row row-lg row-30"></div>
    </div>

    <div class="container">
      <h4 class="oh-desktop"><span class="d-inline-block wow slideInUp">Carrito de Compras</span></h4>

      <div class="row row-lg row-30">
        <?php
        require_once '../Modelo/conexion.php';
        
        // Asegúrate de que la sesión esté iniciada
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        $id_usuario = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : null;

        if (!$id_usuario) {
            echo "Debe iniciar sesión para ver su carrito.";
            exit();
        }

        $conexion = new Conexion();
        $conn = $conexion->conectarBD();

        $sql = "SELECT dp.id_dped, p.nombrep, dp.cantidad, dp.subtotal
                FROM detallepedido dp
                JOIN productos p ON dp.id_prod = p.id_prod
                WHERE dp.id = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            echo '<table class="table table-bordered">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Producto</th>';
            echo '<th>Precio</th>';
            echo '<th>Cantidad</th>';
            echo '<th>Total</th>';
            echo '<th>Acción</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            $total = 0;
            while ($fila = $resultado->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($fila['nombrep']) . '</td>';
                echo '<td>$' . htmlspecialchars(number_format($fila['subtotal'] / $fila['cantidad'], 2)) . '</td>';
                echo '<td>' . htmlspecialchars($fila['cantidad']) . '</td>';
                echo '<td>$' . htmlspecialchars(number_format($fila['subtotal'], 2)) . '</td>';
                echo '<td>';
                echo '<form method="post" action="../Controlador/CtrlCarrito.php?action=delete&id=' . htmlspecialchars($fila['id_dped']) . '">';
                echo '<input type="hidden" name="correo" value="' . htmlspecialchars($_GET['correo']) . '">';
                echo '<input type="hidden" name="id" value="' . htmlspecialchars($_GET['id']) . '">';
                echo '<button type="submit" class="btn btn-danger">Eliminar</button>';
                echo '</form>';
                echo '</td>';
                echo '</tr>';

                $total += $fila['subtotal'];
            }

            echo '<tr>';
            echo '<td colspan="3" align="right"><strong>Total</strong></td>';
            echo '<td align="right"><strong>$' . htmlspecialchars(number_format($total, 2)) . '</strong></td>';
            echo '<td></td>';
            echo '</tr>';
            echo '</tbody>';
            echo '</table>';
        } else {
            echo '<div class="alert alert-warning">El carrito está vacío.</div>';
        }

        $stmt->close();
        $conn->close();
        ?>
      </div>

      <div class="row row-lg row-30">
        <div class="col-12">
          <form method="post" action="../Controlador/CtrlCarrito.php?action=checkout">
            <input type="hidden" name="correo" value="<?php echo htmlspecialchars($_GET['correo']); ?>">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($_GET['id']); ?>">
            <button type="submit" class="button button-md button-secondary-2 button-winona wow fadeInUp" data-wow-delay=".2s">Ordenar</button>
          </form>
        </div>
      </div>

    </div>

    <div class="container">
      <h4 class="oh-desktop"><span class="d-inline-block wow slideInUp">Elige el pago de tu preferencia</span></h4>
      <a class="button button-md button-secondary-2 button-winona wow fadeInUp" href="../Vista/formPagoU.php?correo=<?php echo htmlspecialchars($_GET['correo']); ?>&id=<?php echo htmlspecialchars($_GET['id']); ?>" data-wow-delay=".2s">Pagar</a>
      <div class="row row-lg row-30"></div>
    </div>

    <?php include("../Vista/modulos/footer.php") ?>

  </div>
  <div class="snackbars" id="form-output-global"></div>
  <script src="../Vista/js/core.min.js"></script>
  <script src="../Vista/js/script.js"></script>
</body>

</html>
