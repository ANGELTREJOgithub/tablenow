<?php
class Grafica {
    private $con;

    public function conexionBd() {
        $this->con = mysqli_connect("localhost", "root", "", "tablenow") or die("Problemas con la conexión a la base de datos");
    }

    public function cerrarBD() {
        mysqli_close($this->con);
    }

    public function obtenerDatosUsuarios() {
        $this->conexionBd();
        $sql = "SELECT u.id, r.id_rol 
                FROM usuarios u
                INNER JOIN roles r ON u.id_rol = r.id_rol";
        $resul = mysqli_query($this->con, $sql);
        
        $data = array();
        while($row = mysqli_fetch_assoc($resul)) {
            $data[] = $row;
        }

        $this->cerrarBD();
        return $data;
    }

    public function obtenerDatosReservacionesPorDia() {
        $this->conexionBd();
        $sql = "SELECT DATE(dia) as dia, COUNT(id_reser) as total_reservaciones 
                FROM reservacion 
                GROUP BY DATE(dia)";
        $resul = mysqli_query($this->con, $sql);
        
        $data = array();
        while($row = mysqli_fetch_assoc($resul)) {
            $data[] = $row;
        }
    
        $this->cerrarBD();
        return $data;
    }

    public function obtenerDatosReservacionesPorHora() {
        $this->conexionBd();
        $sql = "SELECT HOUR(hora) as hora, COUNT(id_reser) as total_reservaciones 
                FROM reservacion 
                GROUP BY HOUR(hora)";
        $resul = mysqli_query($this->con, $sql);
        
        $data = array();
        while($row = mysqli_fetch_assoc($resul)) {
            $data[] = $row;
        }
    
        $this->cerrarBD();
        return $data;
    }
    
}
?>
