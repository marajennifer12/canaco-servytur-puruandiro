<?php
// Configuración
$destinatario = "lopezlemusmariajennifer@gmail.com";
$asunto_base = "Nuevo mensaje de contacto";

// Verificar que se envíen los datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar los datos del formulario
    $nombre = htmlspecialchars($_POST["nombre"]);
    $apellidos = htmlspecialchars($_POST["apellidos"]);
    $telefono = htmlspecialchars($_POST["telefono"]);
    $correo = htmlspecialchars($_POST["correo"]);
    $asunto = htmlspecialchars($_POST["asunto"]);
    $mensaje = htmlspecialchars($_POST["mensaje"]);

    // Crear el mensaje de correo
    $cuerpo = "Has recibido un nuevo mensaje de contacto:\n\n";
    $cuerpo .= "Nombre: $nombre\n";
    $cuerpo .= "Apellido: $apellidos\n";
    $cuerpo .= "Teléfono: $telefono\n";
    $cuerpo .= "Correo: $correo\n";
    $cuerpo .= "Asunto: $asunto\n";
    $cuerpo .= "Mensaje:\n$mensaje\n";

    // Encabezados del correo
    $headers = "From: $correo\r\n";
    $headers .= "Reply-To: $correo\r\n";

    // Enviar el correo
    if (mail($destinatario, $asunto_base . ": " . $asunto, $cuerpo, $headers)) {
        echo "El mensaje se envió correctamente.";
    } else {
        echo "Hubo un error al enviar el mensaje. Inténtalo nuevamente.";
    }
} else {
    echo "Método no permitido.";
}
?>
