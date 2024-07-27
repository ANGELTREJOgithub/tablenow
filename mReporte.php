<?php
class Reporte
{
    private $con;

    public function conexionBd()
    {
        $this->con = mysqli_connect("localhost", "root", "", "tablenow") or die("Problemas con la conexión a la base de datos");
    }

    public function cerrarBD()
    {
        mysqli_close($this->con);
    }

    public function listarBotones()
    {


        echo '<form action="../controlador/ctrlReporte.php" method="post">';
        echo '<input type="hidden" name="id" value="2">';
        echo '<input class="modificar" type="submit" value="Reporte de usuarios">';
        echo '</form>';

        echo '<form action="../controlador/ctrlReporte.php" method="post">';
        echo '<input type="hidden" name="id" value="3">';
        echo '<input class="modificar" type="submit" value="Reporte de contacto">';
        echo '</form>';

        echo '<form action="../controlador/ctrlReporte.php" method="post">';
        echo '<input type="hidden" name="id" value="4">';
        echo '<input class="modificar" type="submit" value="Reporte de reservaciones">';
        echo '</form>';

        echo '<form action="../controlador/ctrlReporte.php" method="post">';
        echo '<input type="hidden" name="id" value="5">';
        echo '<input class="modificar" type="submit" value="Reporte de productos">';
        echo '</form>';

        echo '<form action="../controlador/ctrlReporte.php" method="post">';
        echo '<input type="hidden" name="id" value="6">';
        echo '<input class="modificar" type="submit" value="Reportes de pedidos">';
        echo '</form>';

        echo '<form action="../controlador/ctrlReporte.php" method="post">';
        echo '<input type="hidden" name="id" value="7">';
        echo '<input class="modificar" type="submit" value="reporte de pagos">';
        echo '</form>';
    }

    public function obtenerReservacionesPorDia()
    {
        $this->conexionBd();

        $sql = "SELECT DATE(dia) as dia, COUNT(*) as total_reservaciones
                FROM reservacion
                GROUP BY DATE(dia)
                ORDER BY DATE(dia)";

        $result = mysqli_query($this->con, $sql);

        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        echo '<form action="../controlador/ctrlReporte.php" method="post">';
        echo '<input type="hidden" name="id" value="1">';
        echo '<input class="modificar" type="submit" value="Regresar">';
        echo '</form>';
        echo '<form action="../controlador/ctrlReporte.php" method="post">';
        echo '<input type="hidden" name="id" value="8">';
        echo '<input class="modificar" type="submit" value="Obtener json">';
        echo '</form>';

        $this->cerrarBD();

        return $data;
        
    }
}
