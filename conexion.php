// conexion.php
<?php
$servidor = "localhost";
$usuario = "root";
$password = "";
$base_datos = "login_canaco";

$conexion = new mysqli($servidor, $usuario, $password, $base_datos);

if($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>