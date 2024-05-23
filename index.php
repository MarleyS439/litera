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
                <a href="">Entre ou cadastre-se</a>
            </div>
        </div>

        <div class="hero">
            <!-- Container de itens do header -->
            <div class="container-header">
                <div class="sidea">
                    <h1>Aprender com Jogos Educativos</h1>
                    <h2>Litera - Alfabetização Para Novas Gerações</h2>

                    <div class="cta-div">
                        <a href="">Saiba mais</a>
                    </div>
                </div>

                <div class="sideb">
                    <img src="./assets/images/crianças (1)-min.png" alt="">
                </div>
            </div>
        </div>
    </header>


    <div class="reference" id="sobre"></div>

    <!--Seção principal-->
    <main>
        <section class="cards-section">
            <div class="title-section-cards">
                <h2>Porquê o Litera?</h1>
            </div>

            <div class="bg"></div>

            <div class="cards">
                <div class="card" id="card1" data-bg="url(./assets/images/estrela.gif)">
                    <div class="title-card">
                        <div class="tag-card">
                            <span>1</span>
                        </div>

                        <div class="content-card">
                            <h4>Engajamento e diversão<h4>

                                    <div class="content-card-p">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magnam aliquam.</p>
                                    </div>
                        </div>
                    </div>
                </div>

                <div class="card" id="card2" data-bg="url(./assets/images/asterisco.gif)">
                    <div class="title-card">
                        <div class="tag-card">
                            <span>2</span>
                        </div>

                        <div class="content-card">
                            <h4>Monitoramento de Progresso<h4>

                                    <div class="content-card-p">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magnam aliquam.</p>
                                    </div>
                        </div>
                    </div>
                </div>

                <div class="card" data-bg="url(./assets/images/peça.gif)">
                    <div class="title-card">
                        <div class="tag-card">
                            <span>3</span>
                        </div>

                        <div class="content-card">
                            <h4>Habilidades Cognitivas<h4>

                                    <div class="content-card-p">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magnam aliquam.</p>
                                    </div>
                        </div>
                    </div>
                </div>
            </div>

            </div>
        </section>


        <section class="video">
            <div class="title-section-cards">
                <h2>Vídeo Pitch</h1>
            </div>

            <video src="./assets/video/pitch.mp4" controls>
                Seu navegador não suporta a tag de vídeo.
            </video>

        </section>


        <section class="contato">
            <div class="title-form">
                <h2>Entre em contato</h2>
            </div>

            <div class="container-form">

                <div class="imagem-contato">
                    <img src="./assets/images/child.png" alt="Imagem">
                </div>

                <form action="" method="">
                    <div class="item-form">
                        <label for="">Nome</label>
                        <input type="text" placeholder="Digite seu nome" required />
                    </div>

                    <div class="item-form">
                        <label for="">E-mail</label>
                        <input type="email" placeholder="Digite seu e-mail" required />
                    </div>

                    <div class="item-form">
                        <label for="">Mensagem</label>
                        <textarea name="" id="" cols="30" rows="5"></textarea>
                    </div>

                    <div class="bottom">
                        <button type="submit">Enviar</button>
                    </div>
                </form>
            </div>
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

                <a href="" title="Conheças todos os recursos">Recursos</a>
                <a href="" title="Temos soluções diversas. Acesse e saiba mais.">Soluções</a>
                <a href="" title="Ficou preocupado com a Segurança da nossa plataforma? Saiba mais.">Segurança</a>
                <a href="" title="Fique por dentro das mais recentes versões do antes de todo mundo.">Acesso antecipado</a>
            </div>

            <div class="item-footer">
                <h4>Empresa</h4>
                <a href="">Illumi</a>
                <a href="">Trabalhe conosco</a>
                <a href="">Parceiros</a>
            </div>

            <div class="item-footer">
                <h4>Suporte</h4>
                <a href="">Central de ajuda</a>
                <a href="">Fale conosco</a>
                <a href="">Privacidade e termos de uso</a>
                <a href="">Política de cookies</a>
                <a href="">Recursos de aprendizagem</a>
            </div>

            <div class="item-footer">
                <h4>Comunidade</h4>
                <a href="">Blog</a>
                <a href="">Desenvolvedores</a>
                <a href="">Fóruns da comunidade</a>
                <a href="">Indicações</a>
                <a href="">Parceiros de integração</a>
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
            &copy; 2023 · Litera. Todos os direitos reservados. Desenvolvido por <a href="">Illumi</a>
        </div>

    </footer>



    <!-- Script para movimentação do Navbar -->
    <script>
        /* Variável para capturar a largura da tela */
        // var larguraTela = screen.width;
        // var navbar = document.getElementById('navbar');


        /* Caso a largura da tela seja maior ou igual a 770, ele ativa o script */
        // if (larguraTela > 770) {
        //     /* Ao fazer scroll de 20px, ele muda o tamanho do navbar */
        //     window.addEventListener('scroll', function() {
        //         if (window.scrollY >= 20) {
        //             navbar.style.width = 'calc(100vw - 5%)';
        //             navbar.style.margin = '10px';
        //             navbar.style.boxShadow = "rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;";
        //         } else {
        //             navbar.style.width = '100%';
        //             navbar.style.margin = "0px 10px";
        //         }
        //     });
        // }

        // if (larguraTela < 768) {
        //     window.addEventListener('scroll', function() {
        //         if (window.screenY >= 20) {
        //             navbar.style.width = '100%';
        //             navbar.style.margin = '0px';
        //         }
        //     })
        // }
    </script>

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

    <!--<script>
        document.addEventListener("DOMContentLoaded", function() {
            const cardsSection = document.querySelector('.cards-section');
            const cards = document.querySelectorAll('.card');

            cards.forEach(card => {
                card.addEventListener('mouseover', function() {
                    const bgImage1 = card.getAttribute('data-bg');

                    cardsSection.style.backgroundImage = bgImage1;
                    cardsSection.style.backgroundSize = '80vh';
                    cardsSection.style.backgroundRepeat = 'no-repeat';


                })
            })
        })
    </script>-->
</body>

</html>
