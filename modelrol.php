<?php
class Rol
{
    private $id_rol;
    private $descripcion;

    public function conexionBd()
    {
        $con = mysqli_connect("localhost", "root", "", "tablenow") or die("Problemas con la conexión a la base de datos");
        return $con;
    }

    public function inicializar($id_rol, $descripcion)
    {
        $this->id_rol = $id_rol;
        $this->descripcion = $descripcion;
    }

    public function ingresarRol()
    {
        $con = $this->conexionBd();
        $registro = mysqli_query($con, "SELECT * FROM roles WHERE descripcion = '$this->descripcion'") or die(mysqli_error($con));

        if ($reg = mysqli_fetch_array($registro)) {
            echo "Rol ya existente<br>";
            echo '<form action="../Controlador/ctrlRol.php" method="post">';
            echo '<input type="hidden" name="id" value="2">';
            echo '<input class="modificar" type="submit" value="Regresar">';
            echo '</form>';
        } else {
            mysqli_query($con, "INSERT INTO roles (descripcion) VALUES ('$this->descripcion')") or die("Problemas en el insert" . mysqli_error($con));
            echo "El nuevo rol ya fue almacenado ";
            echo '<form action="../Controlador/ctrlRol.php" method="post">';
            echo '<input type="hidden" name="id" value="2">';
            echo '<input class="modificar" type="submit" value="Regresar">';
            echo '</form>';
        }

        $this->cerrarBd($con);
    }

    public function cerrarBd($con)
    {
        mysqli_close($con);
    }

    public function listarRol()
    {
        $con = $this->conexionBd();
        $registro = mysqli_query($con, "SELECT * FROM roles") or die(mysqli_error($con));

        echo '<form action="../Vista/frmRol.php" method="post">';
        echo '<input type="hidden" name="id" value="1">';
        echo '<input class="modificar" type="submit" value="Agregar rol">';
        echo '</form>';
        echo '<br>';

        echo '<table border="1" cellspacing="0" cellpadding="10">';
        echo '<tr><th>id_rol</th><th>Descripcion</th><th>Operaciones</th></tr>';

        while ($reg = mysqli_fetch_array($registro)) {
            echo '<tr>';
            echo '<td>' . $reg['0'] . '</td>';
            echo '<td>' . $reg['1'] . '</td>';
            echo '<td>';

            echo '<form action="../Controlador/ctrlRol.php" method="post" style="display:inline-block;">';
            echo '<input type="hidden" name="codigo" value="' . $reg['0'] . '">';
            echo '<button type="submit" class="buttonprod" name="id" value="eliminar">';
            echo '<input type="hidden" name="id" value="3">';
            echo '<img src="../Vista/images/borrar.png" alt="Eliminar">';
            echo '</button>';
            echo '</form>';

            echo '<form action="../Controlador/ctrlRol.php" method="post" style="display:inline-block;">';
            echo '<input type="hidden" name="codigo" value="' . $reg['0'] . '">';
            echo '<button type="submit" class="buttonprod" name="id" value="modificar">';
            echo '<input type="hidden" name="id" value="4">';
            echo '<img src="../Vista/images/modificiar.png" alt="Modificar">';
            echo '</button>';
            echo '</form>';

            echo '</td>';
            echo '</tr>';
        }

        echo '</table>';

        $this->cerrarBd($con);
    }

    public function mostrarFormulario()
    {
        echo '<h1>Alta de Roles</h1>
        <form action="Controlador/ctrlRol.php" method="post" class="formulario">
            Ingrese Descripcion del Rol:
            <input type="text" name="descripcion"><br>
            <input type="hidden" name="id" value="1">
            <input type="submit" value="Registrar">
        </form>';
    }

    public function eliminarRol($id)
{
    if (isset($_POST['confirmar'])) {
        if ($_POST['confirmar'] == 'si') {
            $conexion = $this->conexionBd();
            $query = "DELETE FROM roles WHERE id_rol='$id'";
            $resultado = mysqli_query($conexion, $query);

            if ($resultado) {
                echo '<h1>Se ha borrado el rol correctamente</h1>';
            } else {
                echo '<h1>Error al intentar borrar el Rol</h1>';
            }
            echo '<form action="../Vista/adminpanel.php" method="post">';
            echo '<input type="hidden" name="id" value="2">';
            echo '<input class="modificar" type="submit" value="Regresar">';
            echo '</form>';
        } else {
            echo '<h1>Se canceló la eliminación del Rol</h1>';

            echo '<form action="../Vista/adminpanel.php" method="post">';
            echo '<input type="hidden" name="id" value="2">';
            echo '<input class="modificar" type="submit" value="Regresar">';
            echo '</form>';
        }
    } else {
        $conexion = $this->conexionBd();
        $query = "SELECT id_rol, descripcion FROM roles WHERE id_rol = '$id'";
        $registro = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

        if ($reg = mysqli_fetch_array($registro)) {
            echo "<b>Rol: </b><br><br>";
            echo "Descripcion: " . $reg['descripcion'] . "<br>";
           
            echo '<br><br>¿Estás seguro de que deseas eliminar este rol?';
            echo '<form action="../Controlador/ctrlRol.php" method="post">';
            echo '<input type="hidden" name="confirmar" value="si">';
            echo '<input type="hidden" name="codigo" value="' . $id . '">';
            echo '<input type="hidden" name="id" value="3">';
            echo '<input class="modificar" type="submit" value="Confirmar">';
            echo '</form>';
            echo '<form action="../Vista/adminpanel.php" method="post">';
            echo '<input type="hidden" name="id" value="2">';
            echo '<input class="modificar" type="submit" value="Cancelar">';
            echo '</form>';
        } else {
            echo 'No existe un usuario con dicho código';
            echo '<form action="../Vista/adminpanel.php" method="post">';
            echo '<input type="hidden" name="id" value="2">';
            echo '<input class="modificar" type="submit" value="Regresar">';
            echo '</form>';
        }
    }
}

public function modificarRol($id_rol)
{
    $registro = mysqli_query($this->conexionBD(), "SELECT * FROM roles WHERE id_rol = '$id_rol'") or die("Problemas en el select: " . mysqli_error($this->conexionBD()));
    if ($reg = mysqli_fetch_array($registro)) {
        echo "<form action='../Controlador/ctrlRol.php' method='post'>
                <label>ID del rol:</label>
                <input type='text' name='codigo' value='{$reg['id_rol']}' readonly>
                <br>
                <label>Descripción:</label>
                <input type='text' name='descripcionNuevo' value='{$reg['descripcion']}'>
                <br>
                <input type='hidden' name='descripcionViejo' value='{$reg['descripcion']}'>
                <input type='hidden' name='id' value='5'>
                <input type='submit' value='Modificar'>
              </form>";
    } else {
        echo "No se encontró el rol.";
    }
}

public function actualizarRol($id_rol, $descripcionNuevo, $descripcionViejo)
{
    $registro = mysqli_query($this->conexionBD(), "SELECT * FROM roles WHERE descripcion = '$descripcionNuevo'") or die(mysqli_error($this->conexionBD()));
    if ($reg = mysqli_fetch_array($registro)) {
        echo "El rol ya existe.";
        echo '<form action="../Vista/adminpanel.php" method="post">
                <input type="hidden" name="id" value="2">
                <input class="modificar" type="submit" value="Regresar">
              </form>';
    } else {
        $update = mysqli_query($this->conexionBD(), "UPDATE roles SET descripcion='$descripcionNuevo' WHERE id_rol='$id_rol' AND descripcion='$descripcionViejo'") or die("Error en el update: " . mysqli_error($this->conexionBD()));
        if ($update) {
            echo "Rol modificado con éxito.";
        } else {
            echo "Error al modificar el rol.";
        }
        echo '<form action="../Vista/adminpanel.php" method="post">
                <input type="hidden" name="id" value="2">
                <input class="modificar" type="submit" value="Regresar">
              </form>';
    }
}
}
?>
