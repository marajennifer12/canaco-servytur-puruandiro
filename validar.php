// validar.php
<?php
session_start();
require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $conexion->real_escape_string($_POST['usuario']);
    $pass = $conexion->real_escape_string($_POST['pass']);
    
    $sql = "SELECT * FROM registros WHERE usuario = '$usuario' AND pass = '$pass'";
    $resultado = $conexion->query($sql);
    
    if ($resultado->num_rows > 0) {
        $_SESSION['usuario'] = $usuario;
        header("Location: panel_afiliados.php");
    } else {
        header("Location: login.php?error=1");
    }
}
$conexion->close();
?>

// panel_afiliados.php
<?php
session_start();
if(!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Panel de Afiliados</title>
</head>
<body>
    <div class="header">
        <h2 class="welcome">Bienvenido, <?php echo $_SESSION['usuario']; ?></h2>
        <a href="cerrar_sesion.php" class="logout-btn">Cerrar Sesión</a>
    </div>
    
    <!-- Aquí va el contenido del panel de afiliados -->
    <div class="content">
        <h3>Panel de Afiliados</h3>
        <p>Contenido exclusivo para afiliados...</p>
    </div>
</body>
</html>