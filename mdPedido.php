<?php
class Pedido
{
    private $id_mesa;
    public function inicializar($id_mesa){
        $this->id_mesa=$id_mesa;
    }
    public function conexionBd()
    {
        $con = mysqli_connect("localhost", "root", "", "tablenow") or die("Problemas con la conexión a la base de datos");
        return $con;
    }
    public function cerrarBD()
    {
        mysqli_close($this->conexionBd());
    }

    public function agregarPedido()
    {
        $consultaVerificar = "SELECT * FROM pedido WHERE id_mesa = '$this->id_mesa'";
        $registros = mysqli_query($this->conexionbd(), $consultaVerificar) or die(mysqli_error($this->conexionbd()));

        if ($reg = mysqli_fetch_array($registros)) {
            echo '<script>
                alert("El producto ya está registrado en la base de datos");
                window.location.href = "../Controlador/ctrlProducto.php?id=2";
            </script>';
        } else {
         
            $consultaInsertar = "INSERT INTO pedido( id_mesa) 
                                 VALUES (' $this->id_mesa)";
            mysqli_query($this->conexionbd(), $consultaInsertar) or die("Problemas en el insert: " . mysqli_error($this->conexionbd()));
            
            echo '<script>
                alert("Producto registrado");
                window.location.href = "../Controlador/ctrlProducto.php?id=2"; 
            </script>';
        }
    }
    
        
    
    public function listarPedidos()
    {
        $con = $this->conexionBd();
        $registro = mysqli_query($con, " SELECT * from pedido") or die(mysqli_error($con));
        echo '<form action="../vista/formPedido.php" method="post">';
        echo '<input type="hidden" name="id" value="1">';
        echo '<input class="modificar" type="submit" value="Agregar numero de pedido">';
        echo '</form>';
        echo '<br>';
        echo '<table border="1" cellspacing="0" cellpadding="10">';
        echo '<tr><th>numero de orden</th><th>mesa</th><th>Operaciones</th></tr>';

        while ($reg = mysqli_fetch_array($registro)) {
            echo '<tr>';
            echo '<td>' . $reg['0'] . '</td>';

            echo '<td>' . $reg['1'] . '</td>';
            echo '<td>';

            echo '<form action="../Controlador/ctrlPedido.php" method="post" style="display:inline-block;">';
            echo '<input type="hidden" name="id_orden" value="' . $reg['0'] . '">';
            echo '<button type="submit" class="buttonprod" name="id" value="eliminar">';
            echo '<input type="hidden" name="id" value="3">';
            echo '<img src="../Vista/images/borrar.png" alt="Eliminar">';
            echo '</button>';
            echo '</form>';


            echo '</td>';
            echo '</tr>';
        }

        echo '</table>';
    }

    public function eliminarPedidos($id_orden)
    {
        if (isset($_POST['confirmar'])) {
            if ($_POST['confirmar'] == 'si') {
                $conexion = $this->conexionBd();
                $query = "DELETE FROM pedido WHERE id_orden='$id_orden'";
                $resultado = mysqli_query($conexion, $query);

                if ($resultado) {
                    echo '<h1>Se ha borrado la mesa correctamente</h1>';
                } else {
                    echo '<h1>Error al intentar borrar la mesa</h1>';
                }
                echo '<form action="../Controlador/ctrlPedido.php" method="post">';
                echo '<input type="hidden" name="id" value="2">';
                echo '<input class="modificar" type="submit" value="Regresar">';
                echo '</form>';
            } else {
                echo '<h1>Se canceló la eliminación de la mesa</h1>';

                echo '<form action=""../Controlador/ctrlPedido.php"" method="post">';
                echo '<input type="hidden" name="id" value="2">';
                echo '<input class="modificar" type="submit" value="Regresar">';
                echo '</form>';
            }
        } else {
            $conexion = $this->conexionBd();
            $query = "SELECT * FROM pedido WHERE id_orden= '$id_orden'";
            $registro = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

            if ($reg = mysqli_fetch_array($registro)) {
                echo "<b>Pedido a Eliminar:</b><br><br>";
                echo "Id orden: " . $reg['id_orden'] . "<br>";


                echo '<br><br>¿Estás seguro de que deseas eliminar este pedido?';
                echo '<form action="../controlador/ctrlPedido.php" method="post">';
                echo '<input type="hidden" name="confirmar" value="si">';
                echo '<input type="hidden" name="id_orden" value="' . $id_orden . '">';
                echo '<input type="hidden" name="id" value="3">';
                echo '<input class="modificar" type="submit" value="Confirmar">';
                echo '</form>';
                echo '<form action=""../Controlador/ctrlPedido.php"" method="post">';
                echo '<input type="hidden" name="id" value="2">';
                echo '<input class="modificar" type="submit" value="Cancelar">';
                echo '</form>';
            } else {
                echo 'No existe una mesa con dicho código';
                echo '<form action=""../Controlador/ctrlPedido.php"" method="post">';
                echo '<input type="hidden" name="id" value="2">';
                echo '<input class="modificar" type="submit" value="Regresar">';
                echo '</form>';
            }
        }
    }
    public function mostrarMesas() {
        $registros = mysqli_query($this->conexionBd(), "SELECT id_mesa FROM mesa") or die("Error en el select: " . mysqli_error($this->conexionBd()));
        
        echo '<select class="form-select" id="tipo" name="id_mesa">';
        while ($reg = mysqli_fetch_assoc($registros)) {
            echo '<option value="' . $reg['id_mesa'] . '">' . $reg['id_mesa'] . '</option>';
        }
        echo '</select>';
    }
   
}
