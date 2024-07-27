<?php
class Contacto
{
    private $nombre;
    private $telefono;
    private $correo;
    private $tipo_contacto;
    private $comentario;


    public function inicializar($nombre, $telefono, $correo, $tipo_contacto, $comentario)
    {
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->correo = $correo;
        $this->tipo_contacto = $tipo_contacto;
        $this->comentario = $comentario;
    }
    public function conexionBd()
    {
        $con = mysqli_connect("localhost", "root", "", "tablenow") or die("Problemas con la conexion a la base de datos");
        return $con;
    }
    public function cerrarBD()
    {
        mysqli_close($this->conexionBd());
    }
    public function ingresarComentario()
    {
        $registro = mysqli_query($this->conexionBd(), "SELECT * FROM contacto WHERE telefono = '$this->telefono'") or die(mysqli_error($this->conexionBd()));
        if ($reg = mysqli_fetch_array($registro)) {
         echo '<script>
                alert("Ya te has contactado con nosotros.");
                window.location.href = "../vista/contacto.php"; 
            </script>';
        } else {
            mysqli_query($this->conexionBd(), "INSERT INTO contacto (nombre, telefono, correo,tipo_contacto,comentario) VALUES ('$this->nombre', '$this->telefono', '$this->correo', '$this->tipo_contacto', '$this->comentario')") or
                die("Problemas en el insert: " . mysqli_error($this->conexionBd()));

           echo  '<script>
                alert("Gracias por comunicarte con nosotros.");
                window.location.href = "../vista/contacto.php"; 
            </script>';
        }
    }
    public function listarComentarios()
    {
        $registro = mysqli_query($this->conexionBd(), "SELECT * from contacto")
            or die("Error en la consulta" . mysqli_error($this->conexionBd()));

       
        echo '<br>';
        echo '<table border="1" cellspacing="0" cellpadding="10">';
        echo '<tr><th>id_conta</th><th>nombre</th><th>telefono</th><th>correo</th><th>tipo-contacto</th><th>comentario</th><th>Acciones</th></tr>';

        while ($reg = mysqli_fetch_array($registro)) {
            echo '<tr>';
            echo '<td>' . $reg[0] . '</td>';
            echo '<td>' . $reg[1] . '</td>';
            echo '<td>' . $reg[2] . '</td>';
            echo '<td>' . $reg[3] . '</td>';
            echo '<td>' . $reg[4] . '</td>';
            echo '<td>' . $reg[5] . '</td>';
            echo '<td>';

            echo '<form action="../controlador/ctrlContacto.php" method="post" style="display:inline-block;">';
            echo '<input type="hidden" name="id_conta" value="' . $reg[0] . '">';
            echo '<input type="hidden" name="id" value="3">';
            echo '<button type="submit" class="buttonprod">';
            echo '<img src="../vista/images/borrar.png" alt="Eliminar">';
            echo '</button>';
            echo '</form>';
            echo '</td>';
            echo '</tr>';
        }

        echo '</table>';
    }
    public function borrarComentario($id_conta)
    {
        if (isset($_POST['confirmar'])) {
            if ($_POST['confirmar'] == 'si') {
                $conexion = $this->conexionBd();
                $query = "DELETE FROM contacto WHERE id_conta='$id_conta'";
                $resultado = mysqli_query($conexion, $query);

                if ($resultado) {
                    echo '<h1>Se ha borrado el comentario correctamente</h1>';
                } else {
                    echo '<h1>Error al intentar borrar la mesa</h1>';
                }
                echo '<form action="../Controlador/ctrlContacto.php" method="post">';
                echo '<input type="hidden" name="id" value="2">';
                echo '<input class="modificar" type="submit" value="Regresar">';
                echo '</form>';
            } else {
                echo '<h1>Se canceló la eliminación del comentario</h1>';

                echo '<form action=""../Controlador/ctrlContacto.php"" method="post">';
                echo '<input type="hidden" name="id" value="2">';
                echo '<input class="modificar" type="submit" value="Regresar">';
                echo '</form>';
            }
        } else {
            $conexion = $this->conexionBd();
            $query = "SELECT * FROM contacto WHERE id_conta = '$id_conta'";
            $registro = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

            if ($reg = mysqli_fetch_array($registro)) {
                echo "<b>Comentario a Eliminar:</b><br><br>";
                echo "id: " . $reg['id_conta'] . "<br>";
                echo "Nombre: " . $reg['nombre'] . "<br>";
                echo "Telefono: " . $reg['telefono'] . "<br>";
                echo "Correo: " . $reg['correo'] . "<br>";
                echo "Tipo-contacto: " . $reg['tipo_contacto'] . "<br>";
                echo "Comentario: " . $reg['comentario'] . "<br>";

                echo '<br><br>¿Estás seguro de que deseas eliminar este comentario?';
                echo '<form action="../controlador/ctrlContacto.php" method="post">';
                echo '<input type="hidden" name="confirmar" value="si">';
                echo '<input type="hidden" name="id_conta" value="' . $id_conta . '">';
                echo '<input type="hidden" name="id" value="3">';
                echo '<input class="modificar" type="submit" value="Confirmar">';
                echo '</form>';
                echo '<form action=""../Controlador/ctrlContacto.php"" method="post">';
                echo '<input type="hidden" name="id" value="2">';
                echo '<input class="modificar" type="submit" value="Cancelar">';
                echo '</form>';
            } else {
                echo 'No existe un comentario con dicho código';
                echo '<form action=""../Controlador/ctrlContacto.php"" method="post">';
                echo '<input type="hidden" name="id" value="2">';
                echo '<input class="modificar" type="submit" value="Regresar">';
                echo '</form>';
            }
        }
    }
}
