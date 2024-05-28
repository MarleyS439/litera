<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once '../src/PHPMailer.php';
require_once '../src/SMTP.php';
require_once '../src/Exception.php';

$numero_aleatorio = mt_rand(100000, 999999);
$num_string = (string)$numero_aleatorio;
$num_char = [];

for ($i = 0; $i < strlen($num_string); $i++) {
    $num_char[] = $num_string[$i];
};

try {
    // Instanciando o objeto do PHPMailer
    $mail = new PHPMailer(true);

    // Configuração do servidor SMTP
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com'; // Servidor SMTP
    $mail->SMTPAuth   = true;
    $mail->Username   = 'mh16122006@gmail.com'; // Seu e-mail
    $mail->Password   = 'sqjsxaofjbayftmy'; // Sua senha
    $mail->SMTPSecure = 'ssl'; // Usar 'ssl' se estiver usando SSL, ou 'tls' se estiver usando TLS
    $mail->Port       = 465; // Porta do servidor SMTP

    // Configuração do e-mail
    $mail->setFrom('litera@gmail.com', 'Litera');
    $mail->addAddress($dadosUsuario['email_user'], $dadosUsuario['name_user']);
    $mail->Subject = 'Código de verificação - Litera';

    $logo = '../assets/images/litera.png';
    $mail->addAttachment($logo);

    // Configuração de charset e codificação de texto
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';

    // Corpo do e-mail com caracteres brasileiros
    $mail->isHTML(true);

    $mail->Body = "
    <!DOCTYPE html>
<html lang='pt-br'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
</head>

<body>
    <style>
        @font-face {
            font-family: 'Poppins-Black';
            src: url(./assets/fonts/Poppins/Poppins-Black.ttf);
        }

        @font-face {
            font-family: 'Poppins-BlackItalic';
            src: url(./assets/fonts/Poppins/Poppins-BlackItalic.ttf);
        }

        @font-face {
            font-family: 'Poppins-Bold';
            src: url(./assets/fonts/Poppins/Poppins-Bold.ttf);
        }

        @font-face {
            font-family: 'Poppins-Regular';
            src: url(./assets/fonts/Poppins/Poppins-Regular.ttf);
        }

        :root {
            --font-poppins-bold: 'Poppins-Bold', Sans-serif;
            --font-poppins-regular: 'Poppins-Regular', Sans-serif;
        }

        nav {
            font-family: var(--font-poppins-bold);
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #F6F6F6;
            width: 100%;
            height: 124px;
            margin-bottom: 5%;
            color: #353636;
        }

        .logo {
            width: 120px;
        }

        h1 {
            font-family: var(--font-poppins-bold);
            font-size: 36px;
            text-align: center;
            margin-bottom: 2%;
            color: #353636;
        }

        h2 {
            font-size: 48px;
        }

        p {
            font-family: var(--font-poppins-regular);
            font-size: 20px;
            padding: 5%;
            text-align: justify;
        }

        .container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-bottom: 15%;
        }

        .cards {
            font-family: var(--font-poppins-bold);
            display: flex;
            flex-direction: column;
            background-color: #03A9F5;
            width: 15%;
            height: 80px;
            border-radius: 10px;
            text-align: center;
            justify-content: center;
            font-size: 35px;
            color: white;
            font-weight: bold;
            padding: 10px 0;
        }
    </style>
    <nav>
        <img class='logo' src='cid:imagem' alt='Logo-Litera'>
        <h2>Litera</h2>
    </nav>
    <h1>Você está quase lá!</h1>
    <p>Só mais um passo pra você se tornar parte da familia litera. Por favor insira o código de verificação no site para finalizar a criação da sua conta</p>
    <div class='container'>
        <div class='cards'>". $num_char[0] ."</div>
        <div class='cards'>". $num_char[1] ."</div>
        <div class='cards'>". $num_char[2] ."</div>
        <div class='cards'>". $num_char[3] ."</div>
        <div class='cards'>". $num_char[4] ."</div>
        <div class='cards'>". $num_char[5] ."</div>
    </div>
</body>

</html>";

    // Adiciona a imagem ao e-mail
    $mail->AddEmbeddedImage($logo, 'imagem');
    $mail->AltBody = "Seu código de verificação: " . $numero_aleatorio;

    // Enviando o e-mail
    $mail->send();
} catch (Exception $e) {
    echo 'Erro ao enviar o e-mail: ' . $mail->ErrorInfo;
}