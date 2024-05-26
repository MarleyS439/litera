<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Litera | Alfabetização para Novas Gerações</title>

    <link rel="stylesheet" type="text/css" href="./assets/landing/index.css">
    <link rel="shortcut icon" href="./assets/images/icons/favicon.ico" type="image/x-icon">
    <script src="https://kit.fontawesome.com/5bf5514c29.js" crossorigin="anonymous"></script>

</head>

<body>

    <!-- Header -->
    <header>
        <!-- Navbar -->
        <nav class="" id="navbar">
            <div class="logo-area">
                <img src="./assets/images/arara 2.svg" alt="Litera">
                <span>Litera</span>
            </div>

            <div class="navigation">
                <ul>
                    <li><a href="#">Início</a></li>
                    <li><a href="#sobre">Sobre</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Preço</a></li>
                    <li><a href="#">Contato</a></li>
                </ul>
            </div>

            <!--Botão de ação - desktop-->
            <div class="action-btn" id="menu">
                <a href="./views/register.php">Começar</a>

                <!-- Div que simula um botão de clique para abrir o menu oculto -->
                <div class="menu-mobile" id="openBtn">
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                </div>
            </div>
        </nav>

        <!-- Menu oculto-->
        <div class="side-menu" id="hiddenMenu">
            <ul>
                <li><a href="" title="">Início</a></li>
                <li><a href="" title="#sobre">Sobre</a></li>
                <li><a href="" title="">Blog</a></li>
                <li><a href="" title="">Preço</a></li>
                <li><a href="" title="">Contato</a></li>
            </ul>

            <div class="close-menu-mobile" id="closeBtn">
                <img src="./assets/images/icons/cancel-svgrepo-com.svg">
            </div>

            <div class="cta-mobile">
                <a href="./views/register.php">Entre ou cadastre-se</a>
            </div>
        </div>

        <div class="hero">
            <!-- Container de itens do header -->
            <div class="container-header">
                <h1>Aprender com jogos educativos</h1>
                <h2>Suíte de jogos para alfabetização infantil</h2>

                <div class="cta">
                    <a href="#">Saiba mais</a>
                </div>
            </div>
        </div>
    </header>

    <!--Seção principal-->
    <main>
        <section class="cards-section">
            <div class="title-section-cards">
                <h2>Porquê o Litera?</h1>
            </div>

            <div class="bg"></div>

            <div class="cards">
                <div class="card" id="card1">
                    <div class="title-card">
                        <div class="tag-card">
                            <span> 1 </span>
                        </div>

                        <div class="content-card">
                        <h4>Engajamento e Diversão</h4>

                        <div class="content-card-p">
                            <p>Um aprendizado divertido, criativo, estimulante e extremamente envolvente que os pequenos realmente adoram.</p>
                        </div>

                        </div>
                    </div>
                </div>

                <div class="card" id="card2">
                    <div class="title-card">
                        <div class="tag-card">
                            <span>2</span>
                        </div>

                        <div class="content-card">
                        <h4>Uma plataforma inovadora</h4>

                        <div class="content-card-p">
                            <p>Combinamos o melhor da educação com jogos para tornar o aprendizado divertido, interativo e eficaz para as crianças.</p>
                        </div>

                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="title-card">
                        <div class="tag-card">
                            <span>3</span>
                        </div>

                        <div class="content-card">
                            <h4>Múltiplos Perfis</h4>

                            <div class="content-card-p">
                                <p>Oferecemos a possibilidade de criar até 5 perfis individuais, cada um com seu próprio avatar, estatísticas de perfil e conquistas personalizadas.</p>
                            </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            </div>
        </section>

        <section class="">

        </section>

        <section class="video">
            <div class="title-section-cards">
                <h2>Vídeo Pitch</h1>
            </div>

            <iframe width="560" height="315" src="https://www.youtube.com/embed/iVGN-FqM3O4?si=8e1V8p-0VKG7cRdR" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

        </section>


       <section class="">
       </section>
    </main>

    <!--Footer-->
    <footer>
        <div class="items-footer">
            <div class="item-footer">

                <div class="logo-litera">
                    <img src="./assets/images/arara 2.svg" alt="">
                    <h4>Litera</h4>
                </div>

                <a href="#" title="Conheças todos os recursos">Recursos</a>
                <a href="#" title="Temos soluções diversas. Acesse e saiba mais.">Soluções</a>
                <a href="#" title="Ficou preocupado com a Segurança da nossa plataforma? Saiba mais.">Segurança</a>
                <a href="#" title="Fique por dentro das mais recentes versões do antes de todo mundo.">Acesso antecipado</a>
            </div>

            <div class="item-footer">
                <h4>Empresa</h4>
                <a href="#">Illumi</a>
                <a href="#">Trabalhe conosco</a>
                <a href="#">Parceiros</a>
            </div>

            <div class="item-footer">
                <h4>Suporte</h4>
                <a href="#">Central de ajuda</a>
                <a href="#">Fale conosco</a>
                <a href="#">Privacidade e termos de uso</a>
                <a href="#">Política de cookies</a>
                <a href="#">Recursos de aprendizagem</a>
            </div>

            <div class="item-footer">
                <h4>Comunidade</h4>
                <a href="#">Blog</a>
                <a href="#">Desenvolvedores</a>
                <a href="#">Fóruns da comunidade</a>
                <a href="#">Indicações</a>
                <a href="#">Parceiros de integração</a>
            </div>

        </div>

        <div class="title-social-media">
            <h4>Siga-nos nas redes sociais</h4>
        </div>

        <!-- Links de redes sociais -->
        <div class="social-media">

            <i class="fa-brands fa-instagram" title="Instagram" id="instagram"></i>
            <i class="fa-brands fa-facebook" title="Facebook" id="facebook"></i>
            <i class="fa-brands fa-x-twitter" title="Twitter/X" id="x"></i>
            <i class="fa-brands fa-pinterest" title="Pinterest" id="pin"></i>
            <i class="fa-brands fa-youtube" title="YouTube" id="youtube"></i>

        </div>

        <!-- Copyright -->
        <div class="copy">
            <span>
                &copy; 2023 · Litera. Todos os direitos reservados. Desenvolvido por<a href="https://localhost/illumi" target="_blank"> Illumi</a>

                <span>🇧🇷</span>
            <span>
        </div>

    </footer>

    <!-- Script para menu lateral mobile -->
    <script>
        // Botão de abrir o menu
        let openMenuBtn = document.getElementById('openBtn');

        // Menu lateral
        let menu = document.getElementById('hiddenMenu');

        // Corpo do site
        let bodySite = document.body;

        // Função para abrir o menu
        openBtn.addEventListener('click', function() {
            if (menu.style.display = 'none') {
                menu.style.display = 'block';
                menu.style.position = 'fixed';
                bodySite.style.overflowY = 'hidden';
            }
        });

        // Botão de fechar o menu
        let closeMenuBtn = document.getElementById('closeBtn');

        closeBtn.addEventListener('click', function() {
            menu.style.display = 'none';
            bodySite.style.overflowY = 'auto';
        });
    </script>

</body>

</html>
