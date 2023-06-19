<?php
// Genera un código de confirmación aleatorio
$codConfirmacion = rand(100000, 999999);

// Datos del correo electrónico
$destinatario = 'xavisaireyes@gmail.com';
$asunto = 'Código de confirmación';
$mensaje = 'Tu código de confirmación es: ' . $codConfirmacion;

// Cabeceras del correo electrónico
$cabeceras = 'From: tu_correo@example.com' . "\r\n" .
    'Reply-To: tu_correo@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

// Envía el correo electrónico
mail($destinatario, $asunto, $mensaje, $cabeceras);

// Puedes almacenar el código de confirmación en una base de datos o enviarlo a otra página
// para que el usuario lo ingrese y lo verifique
?>