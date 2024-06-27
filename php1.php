<?php
// Verificar si se han enviado datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $mensaje = $_POST['mensaje'];

    // Correo al que se enviará la información
    $destinatario = 'luis2312311233@gmail.com'; // Cambiar por tu dirección de correo electrónico

    // Asunto del correo
    $asunto = 'Nuevo mensaje de solicitud de información';

    // Construir el cuerpo del correo
    $cuerpoMensaje = "Nombre: $nombre\n";
    $cuerpoMensaje .= "Correo electrónico: $correo\n";
    $cuerpoMensaje .= "Mensaje:\n\n";
    $cuerpoMensaje .= $mensaje;

    // Cabeceras del correo
    $cabeceras = "From: $nombre <$correo>\r\n";
    $cabeceras .= "Reply-To: $correo\r\n";
    $cabeceras .= "MIME-Version: 1.0\r\n";
    $cabeceras .= "Content-type: text/plain; charset=utf-8\r\n";

    // Intentar enviar el correo
    if (mail($destinatario, $asunto, $cuerpoMensaje, $cabeceras)) {
        // Éxito al enviar el correo
        echo json_encode(array('status' => 'success', 'message' => 'Correo enviado correctamente.'));
    } else {
        // Error al enviar el correo
        echo json_encode(array('status' => 'error', 'message' => 'Error al enviar el correo.'));
    }
} else {
    // Si no se envió por POST, retornar un error
    echo json_encode(array('status' => 'error', 'message' => 'Método no permitido.'));
}
?>
