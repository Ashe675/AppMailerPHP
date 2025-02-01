<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;

require "vendor/autoload.php";

// Verificar si estamos en producción y solo cargar el .env en local
if (getenv('APP_ENV') !== 'production') {
    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();  // Cargar el archivo .env solo si no estamos en producción
}

function sendMail($fromEmail, $fromName, $subject, $body, $isHtml = false)
{
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP de Gmail
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';  // Servidor SMTP de Gmail
        $mail->SMTPAuth   = true;
        $mail->Username   = $_ENV['MAIL_USERNAME']; // Tu email de Gmail
        $mail->Password   = $_ENV['MAIL_PASSWORD']; // Contraseña de aplicación de Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Seguridad TLS
        $mail->Port       = 587; // Puerto SMTP

        // Configurar el remitente y el destinatario
        $mail->setFrom($_ENV['MAIL_USERNAME'], $_ENV['USERNAME']); // Quién envía el correo
        $mail->addAddress($fromEmail, $fromName);
        $mail->addAddress($_ENV['MAIL_USERNAME'], $_ENV['USERNAME']); // Destinatario

        // Contenido del email
        $mail->isHTML($isHtml);
        $mail->Subject = $subject;
        $mail->Body    = $body;
        $mail->AltBody = strip_tags($body); // Alternativa en texto plano

        // Enviar correo
        $mail->send();
        return 'Correo enviado correctamente';
    } catch (Exception $e) {
        return "Error al enviar el correo: {$mail->ErrorInfo}";
    }
}
