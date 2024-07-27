<?php
class Pago
{
    private $pago;
    private $total;
    private $clave_transaccion;


    public function inicializar($pago, $total, $clave_transaccion)
    {
        $this->pago = $pago;
        $this->total = $total;
        $this->clave_transaccion = $clave_transaccion;
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
    public function ingresarPago(){

    }
    public function listarPago(){

    }
    public function eliminarPago(){
        
    }
}
