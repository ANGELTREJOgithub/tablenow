<?php
require_once '../Modelo/Carrito.php';
require_once '../Modelo/conexion.php';

// Asegúrate de que la sesión esté iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$carrito = new Carrito();

// Obtener el ID del usuario desde la sesión
$id_usuario = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : null;

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    $id_producto = $_GET['id'];
    $correo = $_GET['correo'];
    $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '../Vista/Pedido.php?correo=' . $correo . '&id=' . $id_usuario;

    switch ($action) {
        case 'add':
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $cantidad = 1;  // Valor predeterminado de cantidad
            $subtotal = $precio * $cantidad;
            $id_orden = 1;  // Asegúrate de obtener el ID de la orden correctamente

            $carrito->conexionBd();
            $carrito->agregarProductoCarrito($id_producto, $nombre, $precio);

            // Inserción en la tabla detallepedido
            $conexion = new Conexion();
            $conn = $conexion->conectarBD();
            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            $sql = "INSERT INTO detallepedido (cantidad, subtotal, id_prod, id_orden, id)
                    VALUES (?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("idiis", $cantidad, $subtotal, $id_producto, $id_orden, $id_usuario);

            if ($stmt->execute()) {
                echo "Producto agregado al pedido con éxito.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $stmt->close();
            $conn->close();

            header('Location: ' . $redirect);
            exit();

        case 'delete':
            $carrito->conexionBd();
            $carrito->eliminarProductoCarrito($id_producto);
            header('Location: ' . $redirect);
            exit();

        case 'update':
            $nuevaCantidad = $_POST['cantidad'];
            $carrito->conexionBd();
            $carrito->actualizarCantidadCarrito($nuevaCantidad, $id_producto);
            header('Location: ' . $redirect);
            exit();

        case 'clear':
            $carrito->conexionBd();
            $carrito->vaciarCarrito();
            header('Location: ' . $redirect);
            exit();

        case 'checkout':
            $carrito->conexionBd();
            $carrito->agregarPedidos();
            header('Location: ' . $redirect);
            exit();
    }
}
?>
