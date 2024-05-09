<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once '../src/PHPMailer.php';
require_once '../src/SMTP.php';
require_once '../src/Exception.php';

$numero_aleatorio = mt_rand(100000, 999999);

$mail = new PHPMailer(true);

try {
    // Configuração do servidor SMTP
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com'; // Servidor SMTP
    $mail->SMTPAuth   = true;
    $mail->Username   = 'mh16122006@gmail.com'; // Seu e-mail
    $mail->Password   = 'sqjsxaofjbayftmy'; // Sua senha
    $mail->SMTPSecure = 'ssl'; // Usar 'ssl' se estiver usando SSL, ou 'tls' se estiver usando TLS
    $mail->Port       = 465; // Porta do servidor SMTP

    // Configuração do e-mail
    $mail->setFrom('seu_email@gmail.com', 'Seu Nome');
    $mail->addAddress($dadosUsuario['email_user'], $dadosUsuario['name_user']);
    $mail->Subject = 'Código de verificação - Litera';

    // Configuração de charset e codificação de texto
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';

    // Corpo do e-mail com caracteres brasileiros
    $mail->Body = 'Seu código de verificação é: ' . $numero_aleatorio;

    // Enviando o e-mail
    $mail->send();
    echo 'E-mail enviado com sucesso!';
} catch (Exception $e) {
    echo "Erro ao enviar o e-mail: {$mail->ErrorInfo}";
}
