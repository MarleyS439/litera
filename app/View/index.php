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
            <nav class="nav z-50 flex items-center lg:fixed lg:top-4 lg:w-[90%] md:fixed md:top-4 md:w-[90%] lg:mx-16 md:mx-12 md:p-2 md:px-6 lg:p-2 lg:justify-between md:justify-between bg-white/95 backdrop-blur-lg rounded-2xl shadow-lg shadow-black/20">

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

        <!-- Main -->
        <main class="bg-blue-litera bg-center bg-no-repeat lg:my-2" id="about" style="background-image: url(<?= htmlspecialchars(
            $assets["images"]
        ) ?>nuvens-sem-fundo.svg">

            <section class="lg:p-4 lg:py-8 bg-white/95 backdrop-blur-lg lg:my-16 lg:mx-16 rounded-lg shadow-lg flex items-center">
                <div class="flex p-4 lg:justify-between items-center">
                    <img class="w-[50%] rounded-lg lg:mx-4" style="box-shadow: -12px 8px 1px #f8d467" src="<?= htmlspecialchars(
                        $assets["images"]
                    ) ?>Multiplataforma.png" alt="Uma plataforma online e multiplataforma">
                    <div class="px-2 py-4 my-2">
                        <h3 class="text-orange-litera text-3xl font-bold lg:my-4">Uma plataforma online e multiplataforma</h3>
                        <p class="w-full">O Litera foi totalmente desenvolvido e pensado para rodar em quaisquer dispositivos com navegador e acesso à internet, facilitando o uso, sem necessidade de muitos recursos ou instalação direta.</p>
                    </div>
                </div>
            </section>

            <section class="lg:p-4 lg:py-8 bg-white/95 backdrop-blur-lg lg:mt-16 lg:mx-16 rounded-lg shadow-lg flex items-center">
                <div class="flex p-4 lg:justify-between flex-row-reverse items-center">
                    <img class="w-[50%] rounded-lg lg:mx-4" style="box-shadow: -12px 8px 1px #f8d467" src="<?= htmlspecialchars(
                        $assets["images"]
                    ) ?>Children.svg" alt="Uma plataforma online e multiplataforma">
                    <div class="px-2 py-4 my-2">
                        <h3 class="text-orange-litera text-3xl font-bold lg:my-4">Animado e Divertido</h3>
                        <p class="w-full">Buscamos tornar a plataforma divertida e cativante para os pequenos, onde a todo momento serão instigados com as animações e efeitos visuais presentes nos jogos do Litera.</p>
                    </div>
                </div>
            </section>

            <!-- Why Litera -->
            <section class="flex justify-center flex-col items-center h-[100vh] bg-center bg-cover bg-no-repeat">

                <div class="lg:my-2 flex justify-center p-4 bg-yellow-litera w-1/4 text-2xl font-bold text-stone-800 rounded-lg my-2 why-litera" style="box-shadow: 0px 5px 0px #3b3b3b">
                    <h3 class="text-stone-800">Porque o Litera?</h3>
                </div>

                <div class="my-4 flex justify-between lg:mx-12">
                    <div class="lg:p-6 bg-white/95 backdrop-blur-lg rounded-lg w-1/3 mx-4 transition-all ease-in-out duration-500 hover:rotate-6 shadow-lg shadow-black/60">
                        <div class="">
                            <span class="bg-blue-litera py-2 px-4 rounded-full text-white font-bold">1</span>
                        </div>

                        <div class="my-2">
                            <span class="py-2 text-orange-litera font-bold text-2xl">Engajamento e Diversão</span>
                        </div>

                        <div class="my-2">
                            <p class="py-2">Um aprendizado divertido, criativo, estimulante e extremamente envolvente que os pequenos realmente adoram.</p>
                        </div>
                    </div>

                    <div class="lg:p-6 bg-white/95 backdrop-blur-lg rounded-lg w-1/3 mx-4 transition-all ease-in-out duration-500 hover:rotate-6 shadow-lg shadow-black/60">
                        <div class="">
                            <span class="bg-blue-litera py-2 px-4 rounded-full text-white font-bold">2</span>
                        </div>

                        <div class="my-2">
                            <span class="py-2 text-orange-litera font-bold text-2xl">Uma plataforma inovadora</span>
                        </div>

                        <div class="my-2">
                            <p class="py-2">Combinamos o melhor da educação com jogos para tornar o aprendizado divertido, interativo e eficaz para as crianças.</p>
                        </div>
                    </div>

                    <div class="lg:p-6 bg-white/95 backdrop-blur-lg rounded-lg w-1/3 mx-4 transition-all ease-in-out duration-500 hover:rotate-6 shadow-lg shadow-black/60">
                        <div class="">
                            <span class="bg-blue-litera py-2 px-4 rounded-full text-white font-bold">3</span>
                        </div>

                        <div class="my-2">
                            <span class="py-2 text-orange-litera font-bold text-2xl">Múltiplos perfis</span>
                        </div>

                        <div class="my-2">
                            <p class="py-2">Oferecemos a possibilidade de criar até 5 perfis individuais, cada um com seu próprio avatar, estatísticas de perfil e conquistas personalizadas.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="lg:p-4 lg:py-8 bg-white/95 backdrop-blur-lg lg:my-16 lg:mx-16 rounded-lg shadow-lg flex items-center">
                <div class="flex p-4 lg:justify-between items-center">
                    <img class="w-[50%] rounded-lg lg:mx-4" style="box-shadow: -12px 8px 1px #f8d467" src="<?= htmlspecialchars(
                        $assets["images"]
                    ) ?>Multiplataforma.png" alt="Uma plataforma online e multiplataforma">
                    <div class="px-2 py-4 my-2">
                        <h3 class="text-orange-litera text-3xl font-bold lg:my-4">Desperte a Curiosidade das Crianças com o Mundo Maravilhoso da Alfabetização!</h3>
                        <p class="w-full">Este vídeo pitch é o seu convite para conhecer um projeto que transforma a vida das crianças. Prepare-se para se inspirar e se apaixonar pelo futuro da alfabetização!</p>
                    </div>
                </div>
            </section>

            <section class="lg:p-4 lg:py-8 bg-white/95 backdrop-blur-lg lg:my-16 lg:mx-16 rounded-lg shadow-lg flex items-center">
                <div class="flex p-4 lg:justify-between flex-row-reverse items-center">
                    <img class="w-[50%] rounded-lg lg:mx-4" style="box-shadow: -12px 8px 1px #f8d467" src="<?= htmlspecialchars(
                        $assets["images"]
                    ) ?>games.avif" alt="Uma plataforma online e multiplataforma">
                    <div class="px-2 py-4 my-2">
                        <h3 class="text-orange-litera text-3xl font-bold lg:my-4">Uma plataforma gamificada</h3>
                        <p class="w-full">Unimos o a educação com a gamificação para criar este incrível projeto, capaz de melhorar o engajamento e a eficiência no aprendizado das crianças brasileiras.</p>
                    </div>
                </div>
            </section>

            <!-- Contact form -->
            <section class="lg:h-[90vh] my-4 lg:p-4 lg:px-6 flex justify-end bg-center bg-cover" style="background-image: url(<?= htmlspecialchars(
                $assets["images"]
            ) ?>FormBg.svg)">
                <form class="bg-white backdrop-blur-lg rounded-lg lg:px-6 lg:py-4 lg:w-[40vw] h-fit items-center flex flex-col text-stone-800" id="" action="" method="POST" style="cursor: url(<?= htmlspecialchars(
                    $assets["cursors"]
                ) ?>HandPoint.ico), auto">
                    <div class="lg:my-2 flex justify-center w-full">
                        <span class="lg:p-2 bg-blue-litera text-2xl rounded-lg text-white font-bold w-full">Ficou com alguma dúvida? Envie uma mensagem!</span>
                    </div>

                    <div class="lg:my-1 w-full">
                        <label for="name">Nome</label>
                        <input class="bg-zinc-200 p-2 rounded border-2 border-neutral-300 placeholder:text-neutral-500 transition-all w-full focus:outline-none focus:border-orange-litera" type="text" name="name" id="name" placeholder="Como podemos te chamar?" required>
                    </div>

                    <div class="lg:my-1 w-full">
                        <label for="email">E-mail</label>
                        <input class="bg-zinc-200 p-2 rounded border-2 border-neutral-300 placeholder:text-neutral-500 transition-all w-full focus:outline-none focus:border-orange-litera" type="e-mail" name="email" id="email" placeholder="Seu melhor e-mail" required autocomplete="email">
                    </div>

                    <div class="lg:my-1 w-full">
                        <label for="message">Mensagem</label>
                        <textarea class="bg-zinc-200 w-full border-2 border-neutral-300 p-2 rounded-lg placeholder:text-neutral-500 transition-all focus:outline-none focus:border-orange-litera" col="4" rows="3" name="message" id="message" placeholder="Digite sua mensagem aqui"></textarea>
                    </div>

                    <div class="lg:my-1 w-full flex justify-center flex-row-reverse">
                        <label for="confirm">Concordo com os <a class="underline text-orange-litera" href="" style="cursor: url(<?= htmlspecialchars(
                            $assets["cursors"]
                        ) ?>HandPoint.ico), auto;">Termos e Condições</a></label>
                        <input class="mx-2 w-4" style="cursor: url(<?= htmlspecialchars(
                            $assets["cursors"]
                        ) ?>HandPoint.ico), auto;" type="checkbox" name="confirm" id="confirm">
                    </div>

                    <div class="lg:mt-5 w-full">
                        <button class="bg-yellow-litera flex lg:p-3 lg:w-full rounded-lg text-stone-800 font-semibold transition duration-200 ease-in-out active:scale-90 active:shadow-inner justify-center items-center" type="button" style="cursor: url(<?= htmlspecialchars(
                            $assets["cursors"]
                        ) ?>HandPoint.ico), auto;">
                            <span class="text-stone-800">Enviar</span>
                            <img class="w-8 mx-2" src="<?= htmlspecialchars(
                                $assets["icons"]
                            ) ?>send.svg" alt="">
                        </button>
                    </div>
                </form>
            </section>

        </main>

        <footer class="h-[50vh] rounded-tl-lg rounded-tr-lg bg-white backdrop-blur-md w-full lg:py-4">

            <!-- Logo -->
            <div class="p-4 flex items-center mx-18">
                <img class="w-20 pointer-events-none" src="<?= htmlspecialchars(
                    $assets["images"]
                ) ?>Litera.svg" alt="Litera">
                <span class="mx-1 font-bold text-2xl text-blue-litera">Litera</span>
            </div>

            <!-- Copyright -->
            <div class="flex justify-end p-4 mr-10">
                <span class="text-blue-litera font-bold">© 2025 · Litera · Todos os direitos reservados. Mantido por <a class="underline text-orange-litera" href="https://github.com/MarleyS439/" target="_blank" title="Ver no github">Marley de S. Santos</a></span>
            </div>
        </footer>

        <!-- Cookies banner -->
        <div class="opacity-0 transition-opacity duration-700 ease-in-out hidden bg-white/95 backdrop-blur-lg lg:p-3 lg:px-4 bottom-5 lg:w-[60vw] lg:mx-2 fixed flex-col justify-center rounded-lg shadow-lg items-center -translate-x-1/2 left-1/2 shadow-black/70" id="cookies">
            <span class="text-xl font-bold text-blue-litera">Permitir cookies no site</span>
            <p class="lg:px-2 lg:my-2">Nosso site usa cookies. Ao continuar, assumimos sua permissão para implementar cookies conforme detalhado em nossa <a class="underline text-orange-litera font-bold" href="" style="cursor: url(<?= htmlspecialchars(
                $assets["cursors"]
            ) ?>HandPoint.ico), auto">Política de Privacidade</a></p>
            <div class="lg:my-2">
                <button class="bg-blue-litera lg:p-4 lg:px-4 lg:mx-4 rounded-lg text-white font-semibold transition duration-200 ease-in-out active:scale-90 active:shadow-inner" type="button" style="cursor: url(<?= htmlspecialchars(
                    $assets["cursors"]
                ) ?>HandPoint.ico), auto" id="yes">Permitir</button>
                <button class="border rounded-lg lg:p-4 lg:mx-4 border-blue-litera transition duration-200 ease-in-out active:scale-90 active:shadow-inner" type="button" style="cursor: url(<?= htmlspecialchars(
                    $assets["cursors"]
                ) ?>HandPoint.ico), auto" id="no">Recusar</button>
            </div>
        </div>

        <!-- JQuery -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

        <script>
        (function () {
          $(document).ready(function () {

            let button = $("#button");
            let menu = $("#menu");
            let cookies = $("#cookies");
            let permited = $("#yes");
            let danied = $("#no");

            button.click(function () {
              menu.toggleClass("hidden");
            });

            setTimeout(function () {
                cookies.removeClass("hidden").addClass("flex opacity-0").css("transition", "opacity .4s ease-in-out").delay(10).queue(function(next) {                $(this).removeClass("opacity-0").addClass("opacity-100");
                  next();
                });
            }, 5000);

            permited.click(function () {
              cookies.hide();
            });

            danied.click(function () {
              cookies.hide();
            })

          });
        })();
        </script>
    </body>
</html>
