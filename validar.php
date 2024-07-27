<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    $conexion = mysqli_connect("localhost", "root", "", "tablenow");

    // Verifica la conexión
    if (mysqli_connect_errno()) {
        die("Error al conectar con MySQL: " . mysqli_connect_error());
    }

    $correo = mysqli_real_escape_string($conexion, $correo);
    $contraseña = mysqli_real_escape_string($conexion, $contraseña);

    $consulta = "SELECT * FROM usuarios WHERE correo='$correo' AND contraseña='$contraseña'";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        $filas = mysqli_fetch_assoc($resultado);
        if ($filas) {
            $_SESSION['usuario'] = $filas['correo'];
            $_SESSION['id_usuario'] = $filas['id']; // Asegúrate de que el ID de usuario se almacene en la sesión
            if ($filas['id_rol'] == 1) { // ADMINISTRADOR
                header("Location:adminpanel.php");
            } elseif ($filas['id_rol'] == 2) { // Usuario normal
                header("Location:../index.php?correo=".$filas['correo']."&id=".$filas['id']."");
            } else {
                echo "<h1 class='bad'>ERROR EN LA AUTENTIFICACION</h1>";
            }
        } else {
            echo "<script>alert('DEBE REGISTRARSE PARA ACCEDER'); window.location.href='inicarsesion.php';</script>";
        }
    } else {
        die("Error en la consulta: " . mysqli_error($conexion));
    }

    mysqli_free_result($resultado);
    mysqli_close($conexion);
}

?>
