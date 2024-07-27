<?php
class Carrito {
    private $conexion;

    public function conexionBd() {
        $this->conexion = mysqli_connect("localhost", "root", "", "tablenow") or die("Problemas con la conexión a la base de datos");
        return $this->conexion;
    }

    public function cerrarBd() {
        mysqli_close($this->conexion);
    }

    public function agregarPedidos() {
        $con = $this->conexionBd();
    
        if (!empty($_SESSION['CARRITO'])) {
            foreach ($_SESSION['CARRITO'] as $producto) {
                $producto_id = $producto['id'];
                $cantidad = $producto['cantidad'];
                $subtotal = $producto['subtotal'];

                $query_insert = "INSERT INTO detallepedido (cantidad, subtotal, id_prod, id_orden) 
                                 VALUES ($cantidad, $subtotal, $producto_id, 1)"; // Cambia 1 por el id_orden correcto
                mysqli_query($con, $query_insert) or die(mysqli_error($con));
            }
            echo "Pedido agregado exitosamente.";
        } else {
            echo "El carrito está vacío.";
        }
    }

    public function vaciarCarrito() {
        unset($_SESSION['CARRITO']);
    }

    public function eliminarProductoCarrito($producto_id) {
        if (isset($_SESSION['CARRITO'][$producto_id])) {
            unset($_SESSION['CARRITO'][$producto_id]);
        }
    }

    public function actualizarCantidadCarrito($cantidad, $id_producto) {
        if (isset($_SESSION['CARRITO'][$id_producto])) {
            $_SESSION['CARRITO'][$id_producto]['cantidad'] = $cantidad;
            $_SESSION['CARRITO'][$id_producto]['subtotal'] = $_SESSION['CARRITO'][$id_producto]['precio'] * $cantidad;
        }
    }

    public function agregarProductoCarrito($id_producto, $nombre, $precio) {
        if (!isset($_SESSION['CARRITO'])) {
            $_SESSION['CARRITO'] = [];
        }

        // Verificar si el producto ya está en el carrito
        if (isset($_SESSION['CARRITO'][$id_producto])) {
            // Incrementar la cantidad si ya existe
            $_SESSION['CARRITO'][$id_producto]['cantidad'] += 1;
            $_SESSION['CARRITO'][$id_producto]['subtotal'] = $_SESSION['CARRITO'][$id_producto]['cantidad'] * $precio;
        } else {
            // Agregar nuevo producto al carrito
            $_SESSION['CARRITO'][$id_producto] = [
                'id' => $id_producto,
                'nombre' => $nombre,
                'precio' => $precio,
                'cantidad' => 1,
                'subtotal' => $precio
            ];
        }
    }
}
?>
