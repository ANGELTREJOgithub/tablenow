<?PHP
class Reservaciones
{
    private $nombre;
    private $telefono;
    private $dia;
    private $hora;
    private $cantidadper;
    private $id;
    private $id_mesa;

    public function inicializar($nombre, $telefono, $dia, $hora, $cantidadper, $id, $id_mesa)
    {
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->dia = $dia;
        $this->hora = $hora;
        $this->cantidadper = $cantidadper;
        $this->id = $id;
        $this->id_mesa = $id_mesa;
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
    public function agregarReservacion()
    {
        $registro = mysqli_query($this->conexionBd(), "INSERT into reservacion (nombre, telefono, dia, hora, cantidadper, id, id_mesa) VALUES ('$this->nombre','$this->telefono','$this->dia','$this->hora', '$this->cantidadper', '$this->id' ,'$this->id_mesa')")
            or die("Error en el insert" . mysqli_error($this->conexionBd()));
        include ("mdMesa.php");
        $mes = new Mesa();
        $mes->actualizarEstatus($this->id_mesa, $this->hora);
    }


    public function listarReservaciones()
    {
        $registros = mysqli_query($this->conexionBd(), "SELECT * FROM reservacion inner join usuarios on usuarios.id=reservacion.id inner join mesa on mesa.id_mesa=reservacion.id_mesa") or die("Error en el inner" . mysqli_error($this->conexionBd()));
        echo '<table border="1" cellspacing="0" cellpadding="10">';
        echo '<tr>
                <th>ID Reservación</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Día de Reserva</th>
                <th>Hora</th>
                <th>Cantidad de Personas</th>
                <th>ID Mesa</th>
                <th>ID Usuario</th>
                <th>Acciones</th>
              </tr>';

        while ($reg = mysqli_fetch_array($registros)) {
            echo '<tr>';
            echo '<td>' . $reg['id_reser'] . '</td>';
            echo '<td>' . $reg[1] . '</td>';
            echo '<td>' . $reg['telefono'] . '</td>';
            echo '<td>' . $reg['dia'] . '</td>';
            echo '<td>' . $reg['hora'] . '</td>';
            echo '<td>' . $reg['cantidadper'] . '</td>';
            echo '<td>' . $reg['id_mesa'] . '</td>';
            echo '<td>' . $reg['id'] . '</td>';
            echo '<td>';
            echo '<form action="../controlador/ctrlReserva.php" method="post" style="display:inline-block;">';
            echo '<input type="hidden" name="id_reser" value="' . $reg['id_reser'] . '">';
            echo '<input type="hidden" name="id_mesa" value="' . $reg['id_mesa'] . '">';
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
    public function mostrarMesas($cantidadper, $horaMesa)
    {
        $registros = mysqli_query($this->conexionBd(), "SELECT * FROM mesa WHERE disponibilidad = 'Esta disponible' AND cantidad =$cantidadper AND hora = '$horaMesa'") or die("Error en el select" . mysqli_error($this->conexionBd()));
        echo '
            <select class="form-select" id="tipo" name="id_mesa">
        ';
        while ($reg = mysqli_fetch_array($registros)) {
            echo '<option value="' . $reg[0] . '">' . $reg[1] . ' ' . $reg[3] . '</option>';
        }
        echo '</select>';
    }
    public function eliminar($id_reser, $id_mesa){
        mysqli_query($this->conexionBd(), "DELETE FROM reservacion WHERE id_reser=$id_reser")or die("Error al eliminar".mysqli_error($this->conexionBd()));
        mysqli_query($this->conexionBd(), "UPDATE mesa set disponibilidad = 'Esta disponible' where id_mesa=$id_mesa");
    }


}
