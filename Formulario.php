<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Contacto</title>
</head>
<body>
    <h1>Contacto</h1>
    <form action="contacto.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="asunto">Asunto:</label>
        <input type="text" id="asunto" name="asunto" required><br>

        <label for="mensaje">Mensaje:</label><br>
        <textarea id="mensaje" name="mensaje" required></textarea><br>

        <input type="submit" value="Enviar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = htmlspecialchars($_POST['nombre']);
        $email = htmlspecialchars($_POST['email']);
        $asunto = htmlspecialchars($_POST['asunto']);
        $mensaje = htmlspecialchars($_POST['mensaje']);

        // Validar el correo electrónico
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $to = "paolagonzaleslobo87@gmail.com"; 
            $subject = $asunto;
            $body = "Nombre: $nombre\nCorreo: $email\nMensaje: $mensaje";
            $headers = "From: $email";

            // Enviar el correo
            if (mail($to, $subject, $body, $headers)) {
                echo "Mensaje enviado correctamente.";
            } else {
                echo "Error al enviar el mensaje.";
            }
        } else {
            echo "Dirección de correo electrónico no válida.";
        }
    }
    ?>
</body>
</html>
