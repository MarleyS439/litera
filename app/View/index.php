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
<html lang="pt-BR" dir="ltr" class="font-poppins scroll-smooth" id="home">

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

    <body class="bg-blue-litera" style="cursor: url(<?= htmlspecialchars(
        $assets["cursors"]
    ) ?>Point.ico), auto ">

        <!-- Header -->
        <header class="bg-center bg-cover h-screen bg-no-repeat" style="background-image: url(<?= htmlspecialchars(
            $assets["images"]
        ) ?>Background.svg)">

            <!-- Navbar -->
            <nav class="z-50 flex items-center lg:fixed lg:top-4 lg:w-[90%] md:fixed md:top-4 md:w-[90%] lg:mx-16 md:mx-12 md:p-2 md:px-6 lg:p-2 lg:justify-between md:justify-between bg-white/95 backdrop-blur-lg rounded-2xl shadow-lg shadow-black/20">

                <!-- Logo -->
                <div class="flex items-center lg:px-4">
                    <a class="flex items-center" href="">
                        <img class="w-16 lg:mx-1 pointer-events-none" src="<?= htmlspecialchars(
                            $assets["images"]
                        ) ?>Litera.svg" alt="Logo Litera">
                        <span class="mx-1 font-bold text-2xl text-blue-litera">Litera</span>
                    </a>
                </div>

                <!-- Navigation -->
                <div class="hidden lg:flex md:flex">
                    <ul class="flex">
                        <li class="font-medium text-[1.1rem] mx-3 text-stone-800 hover:transform transition-transform duration-300 ease-in-out hover:-translate-y-1" style="cursor: url(<?= htmlspecialchars(
                            $assets["cursors"]
                        ) ?>HandPoint.ico), auto ">
                            <a class="hover:text-blue-litera transition-all duration-300" href="#home" style="cursor: url(<?= htmlspecialchars(
                                $assets["cursors"]
                            ) ?>HandPoint.ico), auto ">Início</a>
                        </li>

                        <li class="font-medium text-[1.1rem] mx-3 text-stone-800 hover:transform transition-transform duration-300 ease-in-out hover:-translate-y-1" style="cursor: url(<?= htmlspecialchars(
                            $assets["cursors"]
                        ) ?>HandPoint.ico), auto ">
                            <a class="hover:text-blue-litera transition-all duration-300" href="#about" style="cursor: url(<?= htmlspecialchars(
                                $assets["cursors"]
                            ) ?>HandPoint.ico), auto ">Sobre</a>
                        </li>

                        <li class="font-medium text-[1.1rem] mx-3 text-stone-800 hover:transform transition-transform duration-300 ease-in-out hover:-translate-y-1" style="cursor: url(<?= htmlspecialchars(
                            $assets["cursors"]
                        ) ?>HandPoint.ico), auto ">
                            <a class="hover:text-blue-litera transition-all duration-300" href="" style="cursor: url(<?= htmlspecialchars(
                                $assets["cursors"]
                            ) ?>HandPoint.ico), auto ">Preço</a>
                        </li>

                        <li class="font-medium text-[1.1rem] mx-3 text-stone-800 hover:transform transition-transform duration-300 ease-in-out hover:-translate-y-1" style="cursor: url(<?= htmlspecialchars(
                            $assets["cursors"]
                        ) ?>HandPoint.ico), auto ">
                            <a class="hover:text-blue-litera transition-all duration-300" href="" style="cursor: url(<?= htmlspecialchars(
                                $assets["cursors"]
                            ) ?>HandPoint.ico), auto ">Contato</a>
                        </li>
                    </ul>
                </div>

                <!-- Action -->
                <div class="lg:px-6">
                    <a href="login" class="flex items-center justify-center px-6 py-2 bg-green-litera text-stone-800 font-medium rounded-lg shadow-lg hover:bg-green-litera border-3 border-dark-green-litera transition duration-200 ease-in-out active:scale-90 active:shadow-inner" style="cursor: url(<?= htmlspecialchars(
                        $assets["cursors"]
                    ) ?>HandPoint.ico), auto">
                        <span class="font-medium text-stone-800">Login</span>
                        <img class="w-5 mx-1" src="<?= htmlspecialchars(
                            $assets["icons"]
                        ) ?>login-icon.svg" alt="">
                    </a>
                </div>

                <!-- Menu Mobile -->
                <button class="lg:hidden md:hidden" id="button" type="button">
                    <img class="w-8" src="<?= htmlspecialchars(
                        $assets["icons"]
                    ) ?>menu.svg" alt="Menu">
                </button>

            </nav>

            <div class="bg-white hidden" id="menu">
                Conteúdo do menu
            </div>

            <!-- Header content -->
            <div class="lg:h-screen flex md:h-screen md:mx-0 justify-center items-center md:w-full">

                <div class="flex flex-col lg:bg-center md:bg-center md:bg-[100%_auto] md:bg-no-repeat lg:bg-[80%_auto] h-screen items-center justify-center md:w-[70vw]" style="background-image: url(<?= htmlspecialchars(
                    $assets["images"]
                ) ?>Clould.svg);">
                    <h1 class="lg:flex md:flex md:px-10 md:p-4 lg:px-10 lg:justify-center lg:p-4 lg:text-4xl md:text-4xl bg-blue-litera font-bold text-white rounded-lg self-center" style="box-shadow: 0px 5px 0px #3b3b3b">Aprender com jogos educativos</h1>
                    <h2 class="lg:flex md:flex md:px-10 md:p-4 lg:px-10 lg:justify-center lg:p-4 lg:text-2xl md:text-2xl bg-yellow-litera font-bold text-stone-800 rounded-lg lg:self-center" style="box-shadow: 0px 5px 0px #3b3b3b">Suíte de jogos para alfabetização infantil</h2>

                    <!-- Call to Action -->
                    <div class="lg:flex lg:justify-center lg:my-2 md:my-6">
                        <a class="p-3 bg-green-litera border-2 border-dark-green-litera rounded-lg shadow-lg hover:bg-green-litera transition duration-200 ease-in-out active:scale-90 active:shadow-inner" style="cursor: url(<?= htmlspecialchars(
                            $assets["cursors"]
                        ) ?>HandPoint.ico), auto" href="portal">Começe agora</a>
                    </div>
                </div>

            </div>

        </header>

        <main class="bg-blue-litera bg-center bg-no-repeat h-screen" id="about">

            <section class="lg:p-4 md:h-[50vh] md:my-2 lg:mt-40 bg-white lg:mx-16 rounded-lg shadow-lg">
                <div class="flex p-4 lg:justify-between items-center">
                    <img class="w-[40%] rounded-lg lg:mx-4" style="box-shadow: -12px 8px 1px #f8d467" src="<?= htmlspecialchars(
                        $assets["images"]
                    ) ?>Multiplataforma.png" alt="Uma plataforma online e multiplataforma">
                    <div class="p-4">
                        <h3 class="text-orange-litera text-2xl font-bold lg:my-2">Uma plataforma online e multiplataforma</h3>

                        <p class="w-full">O Litera foi totalmente desenvolvido e pensado para rodar em quaisquer dispositivos com navegador e acesso à internet, facilitando o uso, sem necessidade de muitos recursos ou instalação direta.</p>
                    </div>
                </div>
            </section>

            <section class="lg:p-4 lg:h-screen lg:mx-12 rounded-lg">
                <form class="bg-white backdrop-blur-lg rounded-lg lg:p-6 lg:w-1/3" id="" action="" method="POST">
                    <div class="">
                        <label for="name">Nome</label>
                        <input class="bg-zinc-200 p-2 rounded border border-neutral-300 placeholder:text-neutral-500 transition-all w-full focus:outline-none focus:border-yellow-600" type="text" name="name" id="name" placeholder="Como podemos te chamar?" required>
                    </div>

                    <div class="">
                        <label for="email">E-mail</label>
                        <input class="bg-zinc-200 p-2 rounded border border-neutral-300 placeholder:text-neutral-500 transition-all w-full focus:outline-none focus:border-yellow-600" type="e-mail" name="email" id="email" placeholder="Seu melhor e-mail" required autocomplete="email">
                    </div>

                    <div class="">
                        <label for="">Mensagem</label>
                        <textarea class="bg-zinc-200 w-full rounded-lg" col="4" rows="3"></textarea>
                    </div>
                </form>
            </section>

        </main>

        <footer class="lg:h-[80vh] rounded-tl-lg rounded-tr-lg bg-white backdrop-blur-md w-full">

            <!-- Logo -->
            <div class="p-4 flex items-center mx-18">
                <img class="w-20 pointer-events-none" src="<?= htmlspecialchars(
                    $assets["images"]
                ) ?>Litera.svg" alt="Litera">
                <span class="mx-1 font-bold text-2xl text-blue-litera">Litera</span>
            </div>

            <!-- Copyright -->
            <div class="flex justify-end p-4 mr-10">
                <span class="text-blue-litera font-bold">© 2025 · Litera · Todos os direitos reservados. Mantido por <a class="underline" href="" target="_blank">Marley de S. Santos</a></span>
            </div>
        </footer>

        <!-- Cookies banner -->
        <div class="bg-white lg:w-[90%] lg:mx-15 lg:p-2 bottom-5 fixed flex flex-col justify-center items-center rounded-lg shadow-lg" id="banner">
            <span class="text-xl font-bold text-blue-litera">Permitir cookies no site</span>
            <p class="lg:px-2">Nosso site usa cookies. Ao continuar, assumimos sua permissão para implementar cookies conforme detalhado em nossa <a href="">Política de Privacidade</a></p>
            <div class="lg:my-2">
                <button class="bg-blue-litera lg:p-4 lg:mx-2 rounded-lg text-white font-semibold" type="button">Permitir</button>
                <button class="border rounded-lg lg:p-4 border-blue-litera" type="button">Recusar</button>
            </div>
        </div>

        <!-- JQuery -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

        <script>
        (function () {
          $(document).ready(function () {
              $("#button").click(function () {
                  $("#menu").toggleClass("hidden");
              });

              function showCookiesBanner(banner) {
                $(this).toggleClass("hidden");
              };

              let banner = $("#cookies");

              setTimeout(showCookiesBanner(banner), 5000);
          });
        })();
        </script>
    </body>
</html>
