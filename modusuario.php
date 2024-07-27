<?php
class Usuarios
{
    private $id;
    private $nombre;
    private $apellidop;
    private $apellidom;
    private $correo;
    private $contraseña;
    private $telefono;
    private $id_rol;


    public function conexionBd()
    {
        $con = mysqli_connect("localhost", "root", "", "tablenow") or die("Problemas con la conexion a la base de datos");
        return $con;
    }
    public function cerrarBd()
    {
        mysqli_close($this->conexionBd());
    }
    public function inicializar($id, $nombre, $apellidop, $apellidom, $correo, $contraseña, $telefono, $id_rol)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidop = $apellidop;
        $this->apellidom = $apellidom;
        $this->correo = $correo;
        $this->contraseña = $contraseña;
        $this->telefono = $telefono;
        $this->id_rol = $id_rol;
    }

    public function registrarUsuario()
    {
        $correo = $this->correo;

        // Consultar si el correo ya existe en la base de datos
        $registro = mysqli_query($this->conexionBd(), "SELECT * FROM usuarios WHERE correo = '$correo'") or
            die(mysqli_error($this->conexionBd()));

        if (mysqli_num_rows($registro) > 0) {
            // Si ya existe un registro con ese correo, mostrar mensaje y regresar
            echo "<script>alert('Correo ya existente');</script>";
            echo "<script>window.location.href = '../Vista/registrarse.php';</script>";
        } else {
            // Si el correo no existe, proceder con el registro
            $nombre = $this->nombre;
            $apellidop = $this->apellidop;
            $apellidom = $this->apellidom;
            $correo = $this->correo;
            $contraseña = $this->contraseña;
            $telefono = $this->telefono;
            $id_rol = $this->id_rol;

            $query = "INSERT INTO usuarios (nombre, apellidop, apellidom, correo, contraseña, telefono, id_rol) 
                      VALUES ('$nombre', '$apellidop', '$apellidom', '$correo', '$contraseña', '$telefono', '$id_rol')";

            // Ejecutar la consulta de inserción
            mysqli_query($this->conexionBd(), $query) or die("Problemas en el insert: " . mysqli_error($this->conexionBd()));

            // Mostrar mensaje de éxito y redireccionar
            echo "<script>alert('El nuevo usuario ya fue almacenado');</script>";
            echo "<script>window.location.href = '../Vista/registrarse.php';</script>";
        }

        $this->cerrarBd();
    }




    public function listarUsuario()
    {
        $conexion = $this->conexionBd();
        $query = "SELECT usuarios.id, usuarios.nombre, usuarios.apellidop, usuarios.apellidom, usuarios.correo, usuarios.contraseña, usuarios.telefono, roles.descripcion AS rol 
                  FROM usuarios 
                  INNER JOIN roles ON roles.id_rol = usuarios.id_rol";
    
        $registro = mysqli_query($conexion, $query)
            or die("Error en la consulta: " . mysqli_error($conexion));
    
        echo '<table border="1" cellspacing="0" cellpadding="10">';
        echo '<tr><th>Código</th><th>Nombre</th><th>Apellido Paterno</th><th>Apellido Materno</th><th>Correo</th><th>Contraseña</th><th>Teléfono</th><th>Rol</th><th>Acciones</th></tr>';
    
        while ($reg = mysqli_fetch_assoc($registro)) {
            echo '<tr>';
            echo '<td>' . $reg['id'] . '</td>'; // Código
            echo '<td>' . $reg['nombre'] . '</td>'; // Nombre
            echo '<td>' . $reg['apellidop'] . '</td>'; // Apellido Paterno
            echo '<td>' . $reg['apellidom'] . '</td>'; // Apellido Materno
            echo '<td>' . $reg['correo'] . '</td>'; // Correo
            echo '<td>' . $reg['contraseña'] . '</td>'; // Contraseña
            echo '<td>' . $reg['telefono'] . '</td>'; // Teléfono
            echo '<td>' . $reg['rol'] . '</td>'; // Rol
    
            echo '<td>';
    
            // Botón de eliminar
            echo '<form action="../Controlador/ctrlUsuario.php" method="post" style="display:inline-block;">';
            echo '<input type="hidden" name="codigo" value="' . $reg['id'] . '">';
            echo '<input type="hidden" name="id" value="3">';
            echo '<button type="submit" class="buttonprod">';
            echo '<img src="../Vista/images/borrar.png" alt="Eliminar">';
            echo '</button>';
            echo '</form>';
    
            echo '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
    


    public function eliminarUsuario($id)
    {
        if (isset($_POST['confirmar'])) {
            if ($_POST['confirmar'] == 'si') {
                $conexion = $this->conexionBd();
                $query = "DELETE FROM usuarios WHERE id='$id'";
                $resultado = mysqli_query($conexion, $query);

                if ($resultado) {
                    echo '<h1>Se ha borrado el usuario correctamente</h1>';
                } else {
                    echo '<h1>Error al intentar borrar el usuario</h1>';
                }
                echo '<form action="../Vista/adminpanel.php" method="post">';
                echo '<input type="hidden" name="id" value="2">';
                echo '<input class="modificar" type="submit" value="Regresar">';
                echo '</form>';
            } else {
                echo '<h1>Se canceló la eliminación del usuario</h1>';

                echo '<form action="../Vista/adminpanel.php" method="post">';
                echo '<input type="hidden" name="id" value="2">';
                echo '<input class="modificar" type="submit" value="Regresar">';
                echo '</form>';
            }
        } else {
            $conexion = $this->conexionBd();
            $query = "SELECT nombre, apellidop, apellidom, correo FROM usuarios WHERE id = '$id'";
            $registro = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

            if ($reg = mysqli_fetch_array($registro)) {
                echo "<b>El usuario: </b><br><br>";
                echo "Nombre: " . $reg['nombre'] . "<br>";
                echo "Apellido Paterno: " . $reg['apellidop'] . "<br>";
                echo "Apellido Materno: " . $reg['apellidom'] . "<br>";
                echo "Correo: " . $reg['correo'] . "<br>";

                echo '<br><br>¿Estás seguro de que deseas eliminar este usuario?';
                echo '<form action="../Controlador/ctrlUsuario.php" method="post">';
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


}