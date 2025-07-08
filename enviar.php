<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST["nombre"]);
    $correo = filter_var($_POST["correo"], FILTER_SANITIZE_EMAIL);
    $mensaje = htmlspecialchars($_POST["mensaje"]);

    $destino = "energygym54@gmail.com"; // 👉 CAMBIA esto por tu correo real
    $asunto = "Nuevo mensaje del formulario de contacto";

    $contenido = "Nombre: $nombre\n";
    $contenido .= "Correo: $correo\n";
    $contenido .= "Mensaje:\n$mensaje";

    $cabeceras = "From: $correo";

    if (mail($destino, $asunto, $contenido, $cabeceras)) {
        // Redirige al usuario a la página de gracias
        header("Location: gracias.html");
        exit();
    } else {
        echo "Hubo un error al enviar el mensaje.";
    }
} else {
    echo "Acceso no autorizado.";
}
?>

