<?php
class Categoria
{
    private $nombre;
    private $imagen;
    public $conexion;

    public function conexionBd()
    {
        $this->conexion = mysqli_connect("localhost", "root", "", "tablenow") or die("Problemas con la conexion a la base de datos");
        return $this->conexion;
    }

    public function cerrarBd()
    {
        mysqli_close($this->conexionbd());
    }

    public function inicializar($nombre, $imagen)
    {
        $this->nombre = $nombre;
        $this->imagen = $imagen;
    }

    public function ingresarCategoria()
    {
        $con = $this->conexionBd();
        $registro = mysqli_query($con, "SELECT * FROM categorias WHERE nombre = '$this->nombre'") or die(mysqli_error($con));
        if ($reg = mysqli_fetch_array($registro)) {
            echo "Categoria ya existente<br>";
            echo '<form action="../controlador/ctrlCategoria.php" method="post">';
            echo '<input type="hidden" name="id" value="2">';
            echo '<input class="modificar" type="submit" value="Regresar">';
            echo '</form>';
        } else {
            mysqli_query($con, "INSERT INTO categorias (nombre, imagen) VALUES ('$this->nombre', '$this->imagen')") or die("Problemas en el insert: " . mysqli_error($con));
            echo "La nueva categoria ya fue almacenada";
            echo '<form action="../controlador/ctrlCategoria.php" method="post">';
            echo '<input type="hidden" name="id" value="2">';
            echo '<input class="modificar" type="submit" value="Regresar">';
            echo '</form>';
        }
        $this->cerrarBd();
    }

    public function listarCategorias()
    {
        $con = $this->conexionBd();
        $registro = mysqli_query($con, "SELECT * FROM categorias") or die(mysqli_error($con));

        echo '<form action="../Vista/formCategoria.php" method="post">';
        echo '<input type="hidden" name="id" value="1">';
        echo '<input class="modificar" type="submit" value="Agregar Categoria">';
        echo '</form>';
        echo '<br>';

        echo '<table border="1" cellspacing="0" cellpadding="10">';
        echo '<tr><th>id_cate</th><th>Nombre</th><th>Imagen</th><th>Operaciones</th></tr>';

        while ($reg = mysqli_fetch_array($registro)) {
            echo '<tr>';
            echo '<td>' . $reg['0'] . '</td>';
            echo '<td>' . $reg['1'] . '</td>';
            echo '<td><img src="data:image/jpeg;base64,' . base64_encode($reg[2]) . '" alt="imagen" /></td>';
            echo '<td>';

            echo '<form action="../Controlador/ctrlCategoria.php" method="post" style="display:inline-block;">';
            echo '<input type="hidden" name="id_cate" value="' . $reg[0] . '">';
            echo '<button type="submit" class="buttonprod" name="id" value="eliminar">';
            echo '<input type="hidden" name="id" value="3">';
            echo '<img src="../Vista/images/borrar.png" alt="Eliminar">';
            echo '</button>';
            echo '</form>';

            echo '<form action="../Controlador/ctrlCategoria.php" method="post" style="display:inline-block;">';
            echo '<input type="hidden" name="id_cate" value="' . $reg[0] . '">';
            echo '<button type="submit" class="buttonprod" name="id" value="modificar">';
            echo '<input type="hidden" name="id" value="5">';
            echo '<img src="../Vista/images/modificiar.png" alt="Modificar">';
            echo '</button>';
            echo '</form>';

            echo '</td>';
            echo '</tr>';
        }

        echo '</table>';

        $this->cerrarBd();
    }

    public function eliminarCategoria($id_cate)
    {
        $con = $this->conexionBd();
        if (isset($_POST['confirmar'])) {
            if ($_POST['confirmar'] == 'si') {
                $query = "DELETE FROM categorias WHERE id_cate='$id_cate'";
                $resultado = mysqli_query($con, $query);

                if ($resultado) {
                    echo '<h1>Se ha borrado la categoría correctamente</h1>';
                } else {
                    echo '<h1>Error al intentar borrar la categoría</h1>';
                }
            } else {
                echo '<h1>Se canceló la eliminación de la categoría</h1>';
            }
            echo '<form action="../controlador/ctrlCategoria.php" method="post">';
            echo '<input type="hidden" name="id" value="2">';
            echo '<input class="modificar" type="submit" value="Regresar">';
            echo '</form>';
        } else {
            $query = "SELECT id_cate, nombre, imagen FROM categorias WHERE id_cate = '$id_cate'";
            $registro = mysqli_query($con, $query) or die(mysqli_error($con));

            if ($reg = mysqli_fetch_array($registro)) {
                echo "<b>Categoría:</b><br><br>";
                echo "Código: " . $reg['id_cate'] . "<br>";
                echo "Nombre: " . $reg['nombre'] . "<br>";
                echo '<img src="data:image/jpeg;base64,' . base64_encode($reg[2]) . '" alt="imagen"/>';
                echo '<br><br>¿Estás seguro de que deseas eliminar esta categoría?';
                echo '<form action="../controlador/ctrlCategoria.php" method="post">';
                echo '<input type="hidden" name="confirmar" value="si">';
                echo '<input type="hidden" name="id_cate" value="' . $id_cate . '">';
                echo '<input type="hidden" name="id" value="3">';
                echo '<input class="modificar" type="submit" value="Confirmar">';
                echo '</form>';
                echo '<form action="../controlador/ctrlCategoria.php" method="post">';
                echo '<input type="hidden" name="id" value="2">';
                echo '<input class="modificar" type="submit" value="Cancelar">';
                echo '</form>';
            } else {
                echo 'No existe una categoría con dicho código';
            }
        }
        $this->cerrarBd();
    }

    public function modificarCategoria($id_cate)
    {
        $con = $this->conexionBd();
        $registro = mysqli_query($con, "SELECT * FROM categorias WHERE id_cate='$id_cate'") or die("Problemas en el select: " . mysqli_error($con));

        if ($reg = mysqli_fetch_array($registro)) {
            echo "<form action='../Controlador/ctrlCategoria.php' method='post'>
                    <label>ID Categoría:</label>
                    <input type='text' name='id_cate' value='{$reg['id_cate']}' readonly>
                    <br>
                    <label>Nombre:</label>
                    <input type='text' name='nombre' value='{$reg['nombre']}'>
                    <br>
                    <input type='hidden' name='id' value='6'> 
                    <input class='modificar' type='submit' value='Actualizar'>
                  </form>";
        }
        $this->cerrarBd();
    }

    public function actualizarCategoria($id_cate, $nombre)
    {
        $con = $this->conexionBd();
        $consulta = "UPDATE categorias SET nombre='$nombre' WHERE id_cate='$id_cate'";
        $resultado = mysqli_query($con, $consulta) or die("Error en el update: " . mysqli_error($con));

        if ($resultado) {
            echo "Categoría modificada con éxito";
        } else {
            echo "Error al modificar la categoría";
        }
        echo '<form action="../Controlador/ctrlCategoria.php" method="post">';
        echo '<input type="hidden" name="id" value="2">';
        echo '<input class="modificar" type="submit" value="Regresar">';
        echo '</form>';
        $this->cerrarBd();
    }

    public function mostarCategoria()
    {
        $con = $this->conexionBd();
        $registros = mysqli_query($con, "SELECT * FROM categorias") or die("Error" . mysqli_error($con));
        echo "<select name='id_cate'>";
        while ($reg = mysqli_fetch_array($registros)) {
            echo "<option value='" . $reg['id_cate'] . "'>" . $reg['nombre'] . "</option>";
        }
        echo "</select>";
        $this->cerrarBd();
    }

    public function obtenerDetallesCategoria($id_categoria, $campo = '')
    {
        $con = $this->conexionBd();

        // Obtener el nombre de la categoría
        $query_categoria = "SELECT nombre FROM categorias WHERE id_cate = $id_categoria";
        $resultado_categoria = mysqli_query($con, $query_categoria) or die(mysqli_error($con));

        if ($row_categoria = mysqli_fetch_assoc($resultado_categoria)) {
            $categoria = $row_categoria['nombre'];
        } else {
            die('Error al obtener la categoría.');
        }

        // Mostrar el nombre de la categoría
        echo "<h2>Categoría: $categoria</h2>";

        // Consultar productos de la categoría
        $query_productos = "SELECT * FROM productos WHERE id_categoria = $id_categoria";
        $resultado_productos = mysqli_query($con, $query_productos) or die(mysqli_error($con));

        echo "<h3>Productos</h3>";
        echo "<table border='1'>";
        echo "<tr><th>Nombre</th><th>Precio</th><th>Descripción</th></tr>";

        while ($row_producto = mysqli_fetch_assoc($resultado_productos)) {
            echo "<tr>";
            echo "<td>" . $row_producto['nombre'] . "</td>";
            echo "<td>" . $row_producto['precio'] . "</td>";
            echo "<td>" . $row_producto['descripcion'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        $this->cerrarBd();
    }


    public function verCategoria() {
        $con = $this->conexionBd();
        $registro = mysqli_query($con, "SELECT * FROM categorias") or die(mysqli_error($con));
    
        while ($reg = mysqli_fetch_array($registro)) {
            echo '<div class="col-sm-6 col-lg-4 col-xl-3">';
            echo '<article class="product wow fadeInLeft" data-wow-delay=".1s">';
    
            echo '<div class="product-figure"><img src="data:image/jpeg;base64,' . base64_encode($reg['imagen']) . '" alt="imagen" /></div>';
            echo '<div class="product-rating"></div>';
            echo '<h6 class="product-title">' . $reg['nombre'] . '</h6>';
    
            echo '<div class="product-button">';
            echo '<div class="button-wrap"><a class="button button-xs button-secondary button-winona" href="';
    
            // Añadir las variables $correo y $id en las URLs
            $correo = $_GET['correo'];
            $id = $_GET['id'];
            switch ($reg['id_cate']) {
                case 1:
                    echo "../Vista/alitas.php?correo=$correo&id=$id";
                    break;
                case 2:
                    echo "../Vista/boneless.php?correo=$correo&id=$id";
                    break;
                case 3:
                    echo "../Vista/Hamburguesas.php?correo=$correo&id=$id";
                    break;
                case 4:
                    echo "../Vista/papas.php?correo=$correo&id=$id";
                    break;
                case 5:
                    echo "../Vista/pastas.php?correo=$correo&id=$id";
                    break;
                case 6:
                    echo "../Vista/ensaladas.php?correo=$correo&id=$id";
                    break;
                case 7:
                    echo "../Vista/cafes.php?correo=$correo&id=$id";
                    break;
                case 8:
                    echo "../Vista/Frapes.php?correo=$correo&id=$id";
                    break;
                default:
                    echo "../Vista/menu.php?correo=$correo&id=$id";
                    break;
            }
    
            echo '">Ver productos</a></div>';
            echo '</div>';
    
            echo '</article>';
            echo '</div>';
        }
    }  
}
