<?php
class Conexion {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "tablenow"; // Asegúrate de que este sea el nombre correcto de la base de datos

    public function conectarBD() {
        // Crear la conexión
        $conexion = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        // Verificar la conexión
        if ($conexion->connect_error) {
            die("Conexión fallida: " . $conexion->connect_error);
        }

        return $conexion;
    }
}
?>
