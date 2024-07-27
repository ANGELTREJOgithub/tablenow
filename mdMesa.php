<?php
class Mesa
{
    private $numero_mesa;
    private $cantidad;
    private $disponibilidad;
    private $hora;

    public function inicializar($numero_mesa, $cantidad, $disponibilidad, $hora)
    {
        $this->numero_mesa = $numero_mesa;
        $this->cantidad = $cantidad;
        $this->disponibilidad = $disponibilidad;
        $this->hora = $hora;
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

    public function ingresarMesa()
    {
        $registro = mysqli_query($this->conexionBd(), "SELECT * FROM mesa WHERE numero_mesa = '$this->numero_mesa' AND hora = '$this->hora'") or die(mysqli_error($this->conexionBd()));


        if ($reg = mysqli_fetch_array($registro)) {
            echo "Mesa ya existente" . "<br>";
            echo '<form action="../Controlador/ctrlMesa.php" method="post">';
            echo '<input type="hidden" name="id" value="2">';
            echo '<input class="modificar" type="submit" value="Regresar">';
            echo '</form>';
        } else {
            mysqli_query($this->conexionBd(), "INSERT INTO mesa (numero_mesa, cantidad, disponibilidad, hora) VALUES ('$this->numero_mesa', '$this->cantidad', '$this->disponibilidad', '$this->hora')") or
                die("Problemas en el insert: " . mysqli_error($this->conexionBd()));

            echo "La nueva mesa ya fue almacenada";
            echo '<form action="../Controlador/ctrlMesa.php" method="post">';
            echo '<input type="hidden" name="id" value="2">';
            echo '<input class="modificar" type="submit" value="Regresar">';
            echo '</form>';
        }
    }


    public function listarMesas()
    {
        $registro = mysqli_query($this->conexionBd(), "SELECT * from mesa")
            or die("Error en la consulta" . mysqli_error($this->conexionBd()));

        echo '<form action="../vista/formMesa.php" method="post">';
        echo '<input type="hidden" name="id" value="1">';
        echo '<input class="modificar" type="submit" value="Agregar mesa">';
        echo '</form>';
        echo '<br>';
        echo '<table border="1" cellspacing="0" cellpadding="10">';
        echo '<tr><th>id_mesa</th><th>numero_mesa</th><th>cantidad</th><th>disponibilidad</th><th>Hora</th><th>Acciones</th></tr>';

        while ($reg = mysqli_fetch_array($registro)) {
            echo '<tr>';
            echo '<td>' . $reg[0] . '</td>';
            echo '<td>' . $reg[1] . '</td>';
            echo '<td>' . $reg[2] . '</td>';
            echo '<td>' . $reg[3] . '</td>';
            echo '<td>' . $reg[4] . '</td>';
            echo '<td>';

            echo '<form action="../controlador/ctrlMesa.php" method="post" style="display:inline-block;">';
            echo '<input type="hidden" name="codigo" value="' . $reg[0] . '">';
            echo '<input type="hidden" name="id" value="3">';
            echo '<button type="submit" class="buttonprod">';
            echo '<img src="../vista/images/borrar.png" alt="Eliminar">';
            echo '</button>';
            echo '</form>';

            echo '<form action="../controlador/ctrlMesa.php" method="post" style="display:inline-block;">';
            echo '<input type="hidden" name="id_mesa" value="' . $reg[0] . '">';
            echo '<input type="hidden" name="id" value="5">';
            echo '<button type="submit" class="buttonprod">';
            echo '<img src="../vista/images/modificiar.png" alt="Modificar">';
            echo '</button>';
            echo '</form>';

            echo '</td>';
            echo '</tr>';
        }

        echo '</table>';
    }
    public function eliminarMesa($id_mesa)
    {
        if (isset($_POST['confirmar'])) {
            if ($_POST['confirmar'] == 'si') {
                $conexion = $this->conexionBd();
                $query = "DELETE FROM mesa WHERE id_mesa='$id_mesa'";
                $resultado = mysqli_query($conexion, $query);

                if ($resultado) {
                    echo '<h1>Se ha borrado la mesa correctamente</h1>';
                } else {
                    echo '<h1>Error al intentar borrar la mesa</h1>';
                }
                echo '<form action="../Controlador/ctrlMesa.php" method="post">';
                echo '<input type="hidden" name="id" value="2">';
                echo '<input class="modificar" type="submit" value="Regresar">';
                echo '</form>';
            } else {
                echo '<h1>Se canceló la eliminación de la mesa</h1>';

                echo '<form action=""../Controlador/ctrlMesa.php"" method="post">';
                echo '<input type="hidden" name="id" value="2">';
                echo '<input class="modificar" type="submit" value="Regresar">';
                echo '</form>';
            }
        } else {
            $conexion = $this->conexionBd();
            $query = "SELECT * FROM mesa WHERE id_mesa = '$id_mesa'";
            $registro = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

            if ($reg = mysqli_fetch_array($registro)) {
                echo "<b>Mesa a Eliminar:</b><br><br>";
                echo "Número de Mesa: " . $reg['numero_mesa'] . "<br>";
                echo "Cantidad: " . $reg['cantidad'] . "<br>";
                echo "Disponibilidad: " . $reg['disponibilidad'] . "<br>";
                echo "Hora: " . $reg['hora'] . "<br>";

                echo '<br><br>¿Estás seguro de que deseas eliminar esta mesa?';
                echo '<form action="../controlador/ctrlMesa.php" method="post">';
                echo '<input type="hidden" name="confirmar" value="si">';
                echo '<input type="hidden" name="codigo" value="' . $id_mesa . '">';
                echo '<input type="hidden" name="id" value="3">';
                echo '<input class="modificar" type="submit" value="Confirmar">';
                echo '</form>';
                echo '<form action=""../Controlador/ctrlMesa.php"" method="post">';
                echo '<input type="hidden" name="id" value="2">';
                echo '<input class="modificar" type="submit" value="Cancelar">';
                echo '</form>';
            } else {
                echo 'No existe una mesa con dicho código';
                echo '<form action=""../Controlador/ctrlMesa.php"" method="post">';
                echo '<input type="hidden" name="id" value="2">';
                echo '<input class="modificar" type="submit" value="Regresar">';
                echo '</form>';
            }
        }
    }
    public function modificarMesa($id_mesa){
        $registro = mysqli_query($this->conexionBd(), "SELECT * FROM mesa WHERE id_mesa='$id_mesa'")
            or die("Problemas en el select: " . mysqli_error($this->conexionBd()));

        if ($reg = mysqli_fetch_array($registro)) {
            echo '<form action="../controlador/ctrlMesa.php" method="post">';
            echo 'ID de la mesa: <input type="text" name="id_mesa" value="' . $reg['id_mesa'] . '" readonly><br>';
            echo 'Número de mesa: <input type="number" name="numero_mesa" value="' . $reg['numero_mesa'] . '"><br>';
            echo 'Cantidad: <input type="number" name="cantidad" value="' . $reg['cantidad'] . '"><br>';
            echo 'Disponibilidad: <input type="text" name="disponibilidad" value="' . $reg['disponibilidad'] . '"><br>';
            echo 'Hora: <input type="time" name="hora" value="' . $reg['hora'] . '"><br>';
            echo '<input type="hidden" name="id" value="6">';
            echo '<input class="modificar" type="submit" value="Modificar">';
            echo '</form>';
        }
    }

    public function actualizarMesa($id_mesa, $numero_mesa, $cantidad, $disponibilidad, $hora)
    {
        $reg = "UPDATE mesa SET numero_mesa='$numero_mesa', cantidad='$cantidad', disponibilidad='$disponibilidad', hora='$hora' WHERE id_mesa='$id_mesa'";
        $registro = mysqli_query($this->conexionBd(), $reg);

        if ($registro) {
            echo '<h1>Se ha actualizado la mesa correctamente</h1>';
        } else {
            echo '<h1>Error al intentar actualizar la mesa</h1>';
        }
        echo '<form action="../controlador/ctrlMesa.php" method="post">';
        echo '<input type="hidden" name="id" value="2">';
        echo '<input class="modificar" type="submit" value="Regresar">';
        echo '</form>';

    }
    public function actualizarEstatus($id_mesa, $hora){
        mysqli_query($this->conexionBd(), "UPDATE mesa SET disponibilidad = 'No esta disponible', hora='$hora'where id_mesa=$id_mesa")or die("Error en el update".mysqli_error($this->conexionBd()));
    }
    public function horaMesa(){
        $registros=mysqli_query($this->conexionBd(), "SELECT * FROM mesa WHERE disponibilidad = 'Esta disponible'")or die("Error en el select".mysqli_error($this->conexionBd()));
        echo '
            <select class="form-select" id="horaMesa" name="horaMesa">
        ';
        while ($reg = mysqli_fetch_array($registros)) {
            echo '<option value="' . $reg[4] . '">' . $reg[4] . '</option>';
        }
        echo '</select>';
    }
   
    
    
    
}
