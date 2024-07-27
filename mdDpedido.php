<?php
class DetallePedido{
    private $cantidad;
    private $subtotal;

    public function inicializar($cantidad,$subtotal){
        $this->cantidad=$cantidad;
        $this->subtotal=$subtotal;

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
}
?>