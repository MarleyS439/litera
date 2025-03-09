<?php

// Declaração de tipagem forte
declare(strict_types=1);

// Declaração do namespace
namespace App\View;

// Informações da página

// Título da página
$title = "Litera | Alfabetização Para Novas Gerações";

// Autor
$author = "Marley de S. Santos";

// Descrição
$description =
    "Conheça o Litera, uma plataforma de jogos educativos voltados para a alfabetização intantil, totalmente gratuita!";

// Palavras-chave
$keywords = [
    "Litera",
    "Alfabetização",
    "Infantil",
    "Jogos",
    "Gamificação",
    "Educação",
    "Alfabetização infantil",
];

// URL de assets
$assetsUrl = "./public/assets";

// Assets
$assets = [
    "images" => "$assetsUrl/images/",
    "icons" => "$assetsUrl/icons/",
    "javascript" => "$assetsUrl/javascript/",
    "css" => "$assetsUrl/css/",
    "cursors" => "$assetsUrl/cursors/",
];
?>
<!DOCTYPE html>
<html lang="pt-BR" dir="ltr" class="font-poppins">

    <head>
        <!-- HTML Meta Tags -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="<?= htmlspecialchars($author) ?>">
        <meta name="description" content="<?= htmlspecialchars(
            $description
        ) ?>">
        <meta name="keywords" content="<?= htmlspecialchars(
            implode(", ", $keywords)
        ) ?>" >
        <meta name="robots" content="index, follow">
        <meta name="copyright" content="© Marley de S. Santos" >

        <!-- Security -->
        <meta http-equiv="X-XSS-Protection" content="1; mode=block">

        <!-- Appearance -->
        <meta name="theme-color" content="#03a9f5">

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="<?= htmlspecialchars(
            $assets["icons"]
        ) ?>favicon.ico">

        <!-- Tailwind CSS -->
        <link rel="stylesheet" href="<?= htmlspecialchars(
            $assets["css"]
        ) ?>styles.css">

        <!-- Title -->
        <title><?= htmlspecialchars($title) ?></title>
    </head>

    <body class="" style="cursor: url(<?= htmlspecialchars(
        $assets["cursors"]
    ) ?>Point.ico), auto ">

        <!-- Header -->
        <header class="bg-center bg-cover h-screen bg-no-repeat" style="background-image: url(<?= htmlspecialchars(
            $assets["images"]
        ) ?>Background.svg)">

            <!-- Navbar -->
            <nav class="z-50 flex items-center lg:fixed lg:top-4 w-[90%] lg:mx-16 lg:p-2 lg:justify-between bg-white/95 backdrop-blur-lg rounded-2xl shadow-lg shadow-black/20">

                <!-- Logo -->
                <div class="flex items-center lg:px-4">
                    <a class="flex items-center" href="">
                        <img class="w-16 lg:mx-1" src="<?= htmlspecialchars(
                            $assets["images"]
                        ) ?>Litera.svg" alt="Logo Litera">
                        <span class="mx-1 font-bold text-2xl text-blue-litera">Litera</span>
                    </a>
                </div>

                <!-- Navigation -->
                <div class="hidden lg:flex">
                    <ul class="flex">
                        <li class="font-medium text-[1.1rem] mx-3 text-stone-800 hover:transform transition-transform duration-300 ease-in-out hover:-translate-y-1" style="cursor: url(<?= htmlspecialchars(
                            $assets["cursors"]
                        ) ?>HandPoint.ico), auto ">
                            <a class="hover:text-blue-litera transition-all duration-300" href="" style="cursor: url(<?= htmlspecialchars(
                                $assets["cursors"]
                            ) ?>HandPoint.ico), auto ">Início</a>
                        </li>

                        <li class="font-medium text-[1.1rem] mx-3 text-stone-800 hover:transform transition-transform duration-300 ease-in-out hover:-translate-y-1">
                            <a class="hover:text-blue-litera transition-all duration-300" href="">Sobre</a>
                        </li>

                        <li class="font-medium text-[1.1rem] mx-3 text-stone-800 hover:transform transition-transform duration-300 ease-in-out hover:-translate-y-1">
                            <a class="hover:text-blue-litera transition-all duration-300" href="">Preço</a>
                        </li>

                        <li class="font-medium text-[1.1rem] mx-3 text-stone-800 hover:transform transition-transform duration-300 ease-in-out hover:-translate-y-1">
                            <a class="hover:text-blue-litera transition-all duration-300" href="">Contato</a>
                        </li>
                    </ul>
                </div>

                <!-- Action -->
                <div class="lg:px-6">
                    <a href="login" class="flex items-center justify-center px-6 py-2 bg-green-litera text-stone-800 font-medium rounded-lg shadow-lg hover:bg-green-litera border-3 border-dark-green-litera transition duration-200 ease-in-out active:scale-90 active:shadow-inner">
                        <span class="font-medium text-stone-800">Login</span>
                        <img class="w-5 mx-1" src="<?= htmlspecialchars(
                            $assets["icons"]
                        ) ?>login-icon.svg" alt="">
                    </a>
                </div>

                <!-- Menu Mobile -->
                <button class="lg:hidden" id="button" type="button">
                    <img class="w-8" src="<?= htmlspecialchars(
                        $assets["icons"]
                    ) ?>menu.svg" alt="Menu">
                </button>

            </nav>

            <div class="bg-white hidden" id="menu">
                Conteúdo do menu
            </div>

            <!-- Header content -->
            <div class="lg:h-screen lg:mx-10 flex justify-center items-center">

                <div class="flex flex-col bg-center bg-[100%_auto] h-screen items-center justify-center" style="background-image: url(<?= htmlspecialchars(
                    $assets["images"]
                ) ?>Clould.svg);">
                    <h1 class="lg:flex lg:px-10 lg:justify-center lg:p-4 lg:text-4xl bg-blue-litera font-bold text-white rounded-lg self-center" style="box-shadow: 0px 5px 0px #3b3b3b">Aprender com jogos educativos</h1>
                    <h2 class="lg:flex lg:px-10 lg:justify-center lg:p-4 lg:text-2xl bg-yellow-litera font-bold text-stone-800 rounded-lg lg:self-center" style="box-shadow: 0px 5px 0px #3b3b3b">Suíte de jogos para alfabetização infantil</h2>

                    <!-- Call to Action -->
                    <div class="lg:flex lg:justify-center lg:my-2">
                        <a class="p-3 bg-green-litera border-2 border-dark-green-litera rounded-lg shadow-lg hover:bg-green-litera transition duration-200 ease-in-out active:scale-90 active:shadow-inner" href="">Começe agora</a>
                    </div>
                </div>

            </div>

        </header>

        <!-- JQuery -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

        <script>
        (function () {
          $(document).ready(function () {
              $("#button").click(function () {
                  $("#menu").toggleClass("hidden");
              });
          });
        })();
        </script>
    </body>
</html>
