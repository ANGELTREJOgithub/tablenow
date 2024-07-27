<?php
class Productos
{
    private $imagen;
    private $nombrep;
    private $descripcion;
    private $precio;
    private $id_cate;

    public function inicializar($imagen, $nombrep, $descripcion, $precio, $id_cate)
    {
        $this->imagen = $imagen;
        $this->nombrep = $nombrep;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->id_cate = $id_cate;
    }

    public function conexionbd()
    {
        $con = mysqli_connect("localhost", "root", "", "tablenow") or die("Problemas con la conexion a la base de datos");
        return $con;
    }

    public function agregarProducto()
    {
        $consultaVerificar = "SELECT * FROM productos WHERE nombrep = '$this->nombrep'";
        $registros = mysqli_query($this->conexionbd(), $consultaVerificar) or die(mysqli_error($this->conexionbd()));

        if ($reg = mysqli_fetch_array($registros)) {
            echo '<script>
                alert("El producto ya está registrado en la base de datos");
                window.location.href = "../Controlador/ctrlProducto.php?id=2";
            </script>';
        } else {
            $consultaInsertar = "INSERT INTO productos(imagen, nombrep, descripcion, precio, id_cate) 
                                 VALUES ('$this->imagen', '$this->nombrep', '$this->descripcion', $this->precio, $this->id_cate)";
            mysqli_query($this->conexionbd(), $consultaInsertar) or die("Problemas en el insert: " . mysqli_error($this->conexionbd()));

            echo '<script>
                alert("Producto registrado");
                window.location.href = "../Controlador/ctrlProducto.php?id=2"; 
            </script>';
        }
    }

    public function listarProducto()
    {
        $con = $this->conexionBd();
        $registro = mysqli_query($con, "SELECT * FROM productos inner join categorias on categorias.id_cate=productos.id_cate") or die(mysqli_error($con));

        echo '<form action="../Vista/formProducto.php" method="post">';
        echo '<input type="hidden" name="id" value="1">';
        echo '<input class="modificar" type="submit" value="Agregar Producto">';
        echo '</form>';
        echo '<br>';

        echo '<table border="1" cellspacing="0" cellpadding="10">';
        echo '<tr><th>id</th><th>Nombre</th><th>Descripcion</th><th>Imagen</th><th>precio</th><th>categoria</th><th>Operaciones</th></tr>';

        while ($reg = mysqli_fetch_array($registro)) {
            echo '<tr>';
            echo '<td>' . $reg['0'] . '</td>';
            echo '<td>' . $reg['2'] . '</td>';
            echo '<td>' . $reg['3'] . '</td>';
            echo '<td><img src="data:image/jpeg;base64,' . base64_encode($reg[1]) . '" alt="imagen" /></td>';
            echo '<td>' . $reg['4'] . '</td>';
            echo '<td>' . $reg['7'] . '</td>';
            echo '<td>';

            echo '<form action="../Controlador/ctrlProducto.php" method="post" style="display:inline-block;">';
            echo '<input type="hidden" name="nombrep" value="' . $reg['nombrep'] . '">';
            echo '<button type="submit" class="buttonprod" name="id" value="3">';
            echo '<img src="../Vista/images/borrar.png" alt="Eliminar">';
            echo '</button>';
            echo '</form>';
            echo '<form action="../Controlador/ctrlProducto.php" method="post" style="display:inline-block;">';
            echo '<input type="hidden" name="nombrep" value="' . $reg[0] . '">';
            echo '<button type="submit" class="buttonprod" name="id" value="modificar">';
            echo '<input type="hidden" name="id" value="5">';
            echo '<img src="../Vista/images/modificiar.png" alt="Modificar">';
            echo '</button>';
            echo '</form>';

            echo '</td>';
            echo '</tr>';
        }

        echo '</table>';

        $this->cerrarBd($con);
    }

    public function borrarProducto($nombrep)
    {
        $consultaVerificar = "SELECT * FROM productos WHERE nombrep = '$nombrep'";
        $registros = mysqli_query($this->conexionbd(), $consultaVerificar) or die(mysqli_error($this->conexionbd()));

        if ($reg = mysqli_fetch_array($registros)) {
            $consultaBorrar = "DELETE FROM productos WHERE nombrep = '$nombrep'";
            mysqli_query($this->conexionbd(), $consultaBorrar) or die("Problemas en el borrado: " . mysqli_error($this->conexionbd()));
            echo '<script>
                alert("Producto eliminado exitosamente.");
                window.location.href = "../Controlador/ctrlProducto.php?id=2"; 
            </script>';
        } else {
            echo '<script>
                alert("El producto no existe o ya ha sido eliminado.");
                window.location.href = "../Controlador/ctrlProducto.php?id=2"; 
            </script>';
        }
    }

    public function cerrarbd()
    {
        mysqli_close($this->conexionBd());
    }

    public function verAlitas()
    {
        $con = $this->conexionBd();
        $registro = mysqli_query($con, "SELECT * FROM productos WHERE id_cate = 1") or die(mysqli_error($con));
    
        $correo = isset($_REQUEST['correo']) ? $_REQUEST['correo'] : '';
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
    
        while ($reg = mysqli_fetch_array($registro)) {
            echo '<div class="col-sm-6 col-lg-4 col-xl-3">';
            echo '<article class="product wow fadeInLeft" data-wow-delay=".1s">';
    
            echo '<div class="product-figure" style="width: 160px; height: 175px; overflow: hidden;">';
            echo '<img src="data:image/jpeg;base64,' . base64_encode($reg['imagen']) . '" alt="imagen" style="width: 100%; height: 100%; object-fit: cover;" />';
            echo '</div>';
    
            echo '<h6 class="product-title">' . $reg['nombrep'] . '<br>' . $reg['descripcion'] . '<br>$' . $reg['precio'] . '</br></h6>';
    
            echo '<div class="product-price-wrap"></div>';
            echo '<div class="product-button"><div class="button-wrap">';
            echo '<form method="post" action="../Controlador/CtrlCarrito.php?action=add&id=' . $reg['id_prod'] . '&correo=' . $correo . '&id=' . $id . '">';
            echo '<input type="hidden" name="nombre" value="' . $reg['nombrep'] . '">';
            echo '<input type="hidden" name="precio" value="' . $reg['precio'] . '">';
            echo '<input type="hidden" name="cantidad" value="1">'; // Valor predeterminado de 1
            echo '<input type="hidden" name="id_orden" value="1">'; // Define aquí el ID de la orden
            echo '<button type="submit" class="button button-xs button-primary button-winona">Agregar a pedido</button>';
            echo '</form>';
            echo '</div></div>';
    
            echo '</article>';
            echo '</div>';
        }
    }
    
    
    // Aplica cambios similares a las demás funciones (verBoneless, verHamburguesas, etc.)
    

    public function verBoneless()
    {
        $con = $this->conexionBd();
        $registro = mysqli_query($con, "SELECT * FROM productos WHERE id_cate = 2") or die(mysqli_error($con));

        $correo = isset($_REQUEST['correo']) ? $_REQUEST['correo'] : '';
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';

        while ($reg = mysqli_fetch_array($registro)) {
            echo '<div class="col-sm-6 col-lg-4 col-xl-3">';
            echo '<article class="product wow fadeInLeft" data-wow-delay=".1s">';

            echo '<div class="product-figure" style="width: 160px; height: 175px; overflow: hidden;">';
            echo '<img src="data:image/jpeg;base64,' . base64_encode($reg['imagen']) . '" alt="imagen" style="width: 100%; height: 100%; object-fit: cover;" />';
            echo '</div>';

            echo '<h6 class="product-title">' . $reg['nombrep'] . '<br>' . $reg['descripcion'] . '<br>$' . $reg['precio'] . '</br></h6>';

            echo '<div class="product-price-wrap"></div>';
            echo '<div class="product-button"><div class="button-wrap">';
            echo '<form method="post" action="../Controlador/CtrlCarrito.php?action=add&id=' . $reg['id_prod'] . '&correo=' . $correo . '&id=' . $id . '">';
            echo '<input type="hidden" name="nombre" value="' . $reg['nombrep'] . '">';
            echo '<input type="hidden" name="precio" value="' . $reg['precio'] . '">';
            echo '<input type="number" name="cantidad" required placeholder="Cantidad">';
            echo '<input type="hidden" name="id_orden" value="1">'; // Define aquí el ID de la orden
            echo '<button type="submit" class="button button-xs button-primary button-winona">Agregar a pedido</button>';
            echo '</form>';
            echo '</div></div>';

            echo '</article>';
            echo '</div>';
        }
    }


public function verHamburguesas()
{
    $con = $this->conexionBd();
    $registro = mysqli_query($con, "SELECT * FROM productos WHERE id_cate = 3") or die(mysqli_error($con));

    $correo = isset($_REQUEST['correo']) ? $_REQUEST['correo'] : '';
    $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';

    while ($reg = mysqli_fetch_array($registro)) {
        echo '<div class="col-sm-6 col-lg-4 col-xl-3">';
        echo '<article class="product wow fadeInLeft" data-wow-delay=".1s">';

        echo '<div class="product-figure" style="width: 160px; height: 175px; overflow: hidden;">';
        echo '<img src="data:image/jpeg;base64,' . base64_encode($reg['imagen']) . '" alt="imagen" style="width: 100%; height: 100%; object-fit: cover;" />';
        echo '</div>';

        echo '<h6 class="product-title">' . $reg['nombrep'] . '<br>' . $reg['descripcion'] . '<br>$' . $reg['precio'] . '</br></h6>';

        echo '<div class="product-price-wrap"></div>';
        echo '<div class="product-button"><div class="button-wrap"><a class="button button-xs button-primary button-winona" href="../Vista/Pedido.php?correo=' . $correo . '&id=' . $id . '">Agregar a pedido</a></div></div>';

        echo '</article>';
        echo '</div>';
    }
}

public function verPapas()
{
    $con = $this->conexionBd();
    $registro = mysqli_query($con, "SELECT * FROM productos WHERE id_cate = 4") or die(mysqli_error($con));

    $correo = isset($_REQUEST['correo']) ? $_REQUEST['correo'] : '';
    $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';

    while ($reg = mysqli_fetch_array($registro)) {
        echo '<div class="col-sm-6 col-lg-4 col-xl-3">';
        echo '<article class="product wow fadeInLeft" data-wow-delay=".1s">';

        echo '<div class="product-figure" style="width: 160px; height: 175px; overflow: hidden;">';
        echo '<img src="data:image/jpeg;base64,' . base64_encode($reg['imagen']) . '" alt="imagen" style="width: 100%; height: 100%; object-fit: cover;" />';
        echo '</div>';

        echo '<h6 class="product-title">' . $reg['nombrep'] . '<br>' . $reg['descripcion'] . '<br>$' . $reg['precio'] . '</br></h6>';

        echo '<div class="product-price-wrap"></div>';
        echo '<div class="product-button"><div class="button-wrap"><a class="button button-xs button-primary button-winona" href="../Vista/Pedido.php?correo=' . $correo . '&id=' . $id . '">Agregar a pedido</a></div></div>';

        echo '</article>';
        echo '</div>';
    }
}

public function verPastas()
{
    $con = $this->conexionBd();
    $registro = mysqli_query($con, "SELECT * FROM productos WHERE id_cate = 5") or die(mysqli_error($con));

    $correo = isset($_REQUEST['correo']) ? $_REQUEST['correo'] : '';
    $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';

    while ($reg = mysqli_fetch_array($registro)) {
        echo '<div class="col-sm-6 col-lg-4 col-xl-3">';
        echo '<article class="product wow fadeInLeft" data-wow-delay=".1s">';

        echo '<div class="product-figure" style="width: 160px; height: 175px; overflow: hidden;">';
        echo '<img src="data:image/jpeg;base64,' . base64_encode($reg['imagen']) . '" alt="imagen" style="width: 100%; height: 100%; object-fit: cover;" />';
        echo '</div>';

        echo '<h6 class="product-title">' . $reg['nombrep'] . '<br>' . $reg['descripcion'] . '<br>$' . $reg['precio'] . '</br></h6>';

        echo '<div class="product-price-wrap"></div>';
        echo '<div class="product-button"><div class="button-wrap"><a class="button button-xs button-primary button-winona" href="../Vista/Pedido.php?correo=' . $correo . '&id=' . $id . '">Agregar a pedido</a></div></div>';

        echo '</article>';
        echo '</div>';
    }
}

public function verEnsaladas()
{
    $con = $this->conexionBd();
    $registro = mysqli_query($con, "SELECT * FROM productos WHERE id_cate = 6") or die(mysqli_error($con));

    $correo = isset($_REQUEST['correo']) ? $_REQUEST['correo'] : '';
    $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';

    while ($reg = mysqli_fetch_array($registro)) {
        echo '<div class="col-sm-6 col-lg-4 col-xl-3">';
        echo '<article class="product wow fadeInLeft" data-wow-delay=".1s">';

        echo '<div class="product-figure" style="width: 160px; height: 175px; overflow: hidden;">';
        echo '<img src="data:image/jpeg;base64,' . base64_encode($reg['imagen']) . '" alt="imagen" style="width: 100%; height: 100%; object-fit: cover;" />';
        echo '</div>';

        echo '<h6 class="product-title">' . $reg['nombrep'] . '<br>' . $reg['descripcion'] . '<br>$' . $reg['precio'] . '</br></h6>';

        echo '<div class="product-price-wrap"></div>';
        echo '<div class="product-button"><div class="button-wrap"><a class="button button-xs button-primary button-winona" href="../Vista/Pedido.php?correo=' . $correo . '&id=' . $id . '">Agregar a pedido</a></div></div>';

        echo '</article>';
        echo '</div>';
    }
}

public function verCafes()
{
    $con = $this->conexionBd();
    $registro = mysqli_query($con, "SELECT * FROM productos WHERE id_cate = 7") or die(mysqli_error($con));

    $correo = isset($_REQUEST['correo']) ? $_REQUEST['correo'] : '';
    $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';

    while ($reg = mysqli_fetch_array($registro)) {
        echo '<div class="col-sm-6 col-lg-4 col-xl-3">';
        echo '<article class="product wow fadeInLeft" data-wow-delay=".1s">';

        echo '<div class="product-figure" style="width: 160px; height: 175px; overflow: hidden;">';
        echo '<img src="data:image/jpeg;base64,' . base64_encode($reg['imagen']) . '" alt="imagen" style="width: 100%; height: 100%; object-fit: cover;" />';
        echo '</div>';

        echo '<h6 class="product-title">' . $reg['nombrep'] . '<br>' . $reg['descripcion'] . '<br>$' . $reg['precio'] . '</br></h6>';

        echo '<div class="product-price-wrap"></div>';
        echo '<div class="product-button"><div class="button-wrap"><a class="button button-xs button-primary button-winona" href="../Vista/Pedido.php?correo=' . $correo . '&id=' . $id . '">Agregar a pedido</a></div></div>';

        echo '</article>';
        echo '</div>';
    }
}

public function verFrappes()
    {
        $con = $this->conexionbd();
        $registro = mysqli_query($con, "SELECT * FROM productos WHERE id_cate = 8") or die(mysqli_error($con));

        $correo = isset($_REQUEST['correo']) ? $_REQUEST['correo'] : '';
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';

        while ($reg = mysqli_fetch_array($registro)) {
            echo '<div class="col-sm-6 col-lg-4 col-xl-3">';
            echo '<article class="product wow fadeInLeft" data-wow-delay=".1s">';

            echo '<div class="product-figure" style="width: 160px; height: 175px; overflow: hidden;">';
            echo '<img src="data:image/jpeg;base64,' . base64_encode($reg['imagen']) . '" alt="imagen" style="width: 100%; height: 100%; object-fit: cover;" />';
            echo '</div>';

            echo '<h6 class="product-title">' . $reg['nombrep'] . '<br>' . $reg['descripcion'] . '<br>$' . $reg['precio'] . '</br></h6>';

            echo '<div class="product-price-wrap"></div>';
            echo '<div class="product-button"><div class="button-wrap">';
            echo '<a class="button button-xs button-primary button-winona" href="../Controlador/CtrlCarrito.php?action=add&id=' . $reg['id_prod'] . '&correo=' . $correo . '&id=' . $id . '">Agregar a pedido</a>';
            echo '</div></div>';

            echo '</article>';
            echo '</div>';
        }
    }

}
