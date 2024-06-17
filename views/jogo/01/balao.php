<?php
// session
session_start();
// verificação se o user esta logado
if (!isset($_SESSION['authPerfil'])) {
    // caso não esteja, redirecione a login e indique que para realizar o login
    header("Location: ./login.php?status=erro2");
    exit();
}
// variavel para todas as informaçoes do usuario
require_once "../../../dao/perfilDao.php";
require_once "../../../dao/usuarioDao.php";
$codUser = $_SESSION['authPerfil'];
$perfilAutenticado = PerfilDao::selectById($codUser['codPerfil']);
$usuarioAutenticado =  UsuarioDao::selectById($codUser['codUser']);
// verificar se o user esta banido
if ($usuarioAutenticado['banido'] != 0) {
    // caso não esteja, redirecionar a login e indique que o user foi banido
    header("Location: ./login.php?status=erro3");
    exit();
}
if ($_SESSION['authUser'] == null) {
    header('Location: ./login.php?status=erro4');
}
// var_dump($perfilAutenticado);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="balao.css">

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9b58b8faa9.js" crossorigin="anonymous"></script>
    <title>GAME DE FRUTAS!</title>
</head>

<body>

    <section class="jogo">
        <div class="area-jogo">


            <div class="nuvens-animadas">
                <img src="./img/nuvens/nuvem1.svg" alt="" class="nuvem">
                <img src="./img/nuvens/nuvem1.svg" alt="" class="nuvem">
                <img src="./img/nuvens/nuvem1.svg" alt="" class="nuvem">
                <img src="./img/nuvens/nuvem1.svg" alt="" class="nuvem">
                <img src="./img/nuvens/nuvem1.svg" alt="" class="nuvem">
                <img src="./img/nuvens/nuvem1.svg" alt="" class="nuvem">
            </div>



            <div class="final" id="finalizar">
                <div class="text-fim">
                    <p>FIM DE JOGO</p>
                </div>
                <p id="corPontuacao">Sua Pontuação: <span class="total_moedas" id="final_point"></span></p>
                <p id="corErros">Quantidade de Erros: <span class="total_moedas" id="final_error"></span></p>
                <div class="btn-fim">
                    <a href="balao.php" class="btnFinal"><img src="img/recomecar.svg" alt=""></a>
                    <div class="btnFinal" id="abrirModal">
                        <p class="textoResultados">?</p>
                    </div>
                    <a href="../../home.php" class="btnFinal"><img src="img/avancar.svg" alt=""></a>

                </div>

                <div id="modal" class="modal">
                    <div class="modal-content">
                        <div class="headerModal">
                            <p>seus resultados</p>
                            <span class="close"><img style="width: 30px;" src="./img/jogoFruta/X.svg" alt=""></span>
                        </div>

                        <div class="conteudoFrutas">
                            <div class="areaDePontos">
                                <p id="corPontuacao" class="desk">Pontuação: <span class="total_modal" id="final_point2"><i class="fa-solid fa-coins"></i></span></p>
                                <p id="corErros" class="desk">Tentativas: <span class="total_modal" id="final_error2"></span></p>
                                <p id="corAcertos" class="desk">Acertos: <span class="total_modal" id="final_acerto"></span></p>
                                <p id="corAcertos" class="desk">Tempo: <span class="total_modal" id="cronometroFim">00:00</span></p>
                                
                                <p id="corPontuacao" class="mobile"><span class="total_modal" id="final_point3"><i class="fa-solid fa-coins"> </i></span></p>
                                <p id="corErros" class="mobile">Tentativas: <span class="total_modal" id="final_error3"></span></p>
                                <p id="corAcertos" class="mobile">Acertos: <span class="total_modal" id="final_acerto2"></span></p>
                                <p id="corAcertos" class="mobile">Tempo: <span class="total_modal" id="cronometroFim2">00:00</span></p>
                                
                                
                                <div class="som">
                                    <div class="audioSom">
                                        <img src="./img/jogoFruta/audioIco.svg" alt="">
                                    </div>
                                </div>
                               
                               
                                
                            </div>
                            <div class="areaDeFrutas">
                                <div class="cardsFrutas">
                                    <div class="card"  id="f1">
                                        <img src="./img/baloes/BalaoA.svg" alt="">
                                        <img class="somFruta" src="./img/jogoFruta/icoSom.svg" alt="">
                                        <p>A</p>
                                    </div>
                                    <div class="card" id="f2">
                                        <img src="./img/baloes/BalaoE.svg" alt="">
                                        <img class="somFruta" src="./img/jogoFruta/icoSom.svg" alt="">
                                        <p class="banana">E</p>
                                    </div>
                                    <div class="card" id="f3">
                                        <img src="./img/baloes/BalaoI.svg" alt="">
                                        <img class="somFruta" src="./img/jogoFruta/icoSom.svg" alt="">
                                        <p class="melancia">I</p>
                                    </div>
                                    <div class="card" id="f4">

                                        <img src="./img/baloes/BalaoO.svg" alt="">
                                        <img class="somFruta" src="./img/jogoFruta/icoSom.svg" alt="">
                                        <p class="morango">O</p>
                                    </div>
                                </div>
                                <div class="cardsFrutas2">
                                    <div class="card" id="f5">
                                        <img src="./img/baloes/BalaoU.svg" alt="">
                                        <img class="somFruta" src="./img/jogoFruta/icoSom.svg" alt="">
                                        <p class="pera">U</p>
                                    </div>
                                </div>


                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="./img/baloes/BalaoA.svg" alt="Maçã">
                                            <img class="somFruta" src="./img/jogoFruta/icoSom.svg" alt="">
                                            <p class="maca">A</p>
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="./img/baloes/BalaoE.svg" alt="Banana">
                                            <img class="somFruta" src="./img/jogoFruta/icoSom.svg" alt="">
                                            <p class="banana">E</p>
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="./img/baloes/BalaoI.svg" alt="Melancia">
                                            <img class="somFruta" src="./img/jogoFruta/icoSom.svg" alt="">
                                            <p class="melancia">I</p>
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="./img/baloes/BalaoO.svg" alt="Morango">
                                            <img class="somFruta" src="./img/jogoFruta/icoSom.svg" alt="">
                                            <p class="morango">O</p>
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="./img/baloes/BalaoU.svg" alt="Pera">
                                            <img class="somFruta" src="./img/jogoFruta/icoSom.svg" alt="">
                                            <p class="pera">U</p>
                                        </div>
                                        
                                    </div>
                               
                                    
                              
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>



            <div class="comecar-jogo" id="boxComece">
                <h1>Vamos começar!</h1>
                <button id="comece">Começar!</button>
            </div>

            <div class="confetti-container" id="acertou">
                <!-- CONFETES ANIMAÇÃO -->
            </div>

            <div class="x-container" id="errada">
                <!-- x ANIMAÇÃO -->
            </div>




            <div class="topo">
                <div class="moedas" id="mobile">
                    <i class="fa-solid fa-coins"></i><span id="moeda">0</span>
                </div>
                <div class="barra" id="barraVidas">
                    <div class="acerto" id="v1"></div>
                    <div class="acerto" id="v2"></div>
                    <div class="acerto" id="v3"></div>
                    <div class="acerto" id="v4"></div>
                    <div class="acerto" id="v5"></div>
             
                </div>

                <div class="header" id="header">
                    <div id="cronometro" class="cronometro">00:00</div>
                    <a href="../../../views/home.php" class="homeScreen"></a>
                    <button class="mutarSom" id="mutarEdesmutar"></button>
                    <button onclick="openFullscreen()" class="fullScreen" id="abrirCheia"></button>
                    <button onclick="closeFullscreen()" class="fullScreen" id="fecharCheia"></button>
                </div>

            </div>
            <div class="area-itens">
                <div class="semfundo" id="fundo">
                    <button onclick="closeSquare(this)" class="fechado"></button>
                </div>
                
                <div class="square square-blue" id="b1" onclick="moveToCenter(this)">
                
                    <img src="./img/baloes/BalaoA.svg" alt="" class="balao" id="zoomBalao1">
                    
                    <div class="particulas"></div>
                </div>
                <div class="square square-red" id="b2" onclick="moveToCenterBottom(this)">
                    <img src="./img/baloes/BalaoE.svg" alt="" class="balao" id="zoomBalao2">
                    <div class="particulas"></div>
                </div>
                <div class="square square-red2" id="b3" onclick="moveToCenterBottom(this)">
                    <img src="./img/baloes/BalaoI.svg" alt="" class="balao" id="zoomBalao3">
                    <div class="particulas"></div>
                </div>
                <div class="square square-green" id="b4"onclick="moveToCenter(this)">
                    <img src="./img/baloes/BalaoO.svg" alt="" class="balao" id="zoomBalao4">
                    <div class="particulas"></div>
                </div>
                <div class="square square-green2" id="b5" onclick="moveToCenter(this)">
                    <img src="./img/baloes/BalaoU.svg" alt="" class="balao" id="zoomBalao5">
                    <div class="particulas"></div>
                </div>

                <div class="verificando" id="verificar">
                    
                    <div class="circle"></div>
                    <div class="circle"><div class="detalhe"></div></div>
                    <div class="circle"></div>
                    <div class="circle"></div>
                    <div class="sombraNuvem"></div>
                    <img class="verificadorImg" src="./img/selecionar.svg" alt="" id="imgVerific">
                </div>


            </div>

            <input type="hidden" name="id" id="id" value="<?php echo $perfilAutenticado['codPerfil'] ?>">
            

        </div>
    </section>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="balao.js"></script>
    <script>
        // Cores disponíveis para os confetes
        const confettiColors = ['#ff0000', '#ff6600', '#ff00ff', '#00ff00', '#00ffff', '#ffff00'];

        // Quantidade de confetes a serem gerados
        const confettiCount = 170;

        // Container de confetes
        const confettiContainer = document.querySelector('.confetti-container');

        // Função para gerar um confete
        function createConfetti() {
            const confetti = document.createElement('div');
            confetti.classList.add('confetti');
            const bodyWidth = document.body.offsetWidth; // Largura do body
            const bodyHeight = document.body.offsetHeight; // Altura do body
            confetti.style.left = `${Math.random() * bodyWidth}px`; // Usando px para a largura
            confetti.style.top = `${Math.random() * bodyHeight}px`; // Usando px para a altura
            confetti.style.animationDelay = `${Math.random() * 1.3}s`;
            confetti.style.backgroundColor = confettiColors[Math.floor(Math.random() * confettiColors.length)]; // Cor aleatória
            confettiContainer.appendChild(confetti);
        }

        // Gerar confetes
        for (let i = 0; i < confettiCount; i++) {
            createConfetti();
        }






        // Quantidade de "X" a serem gerados
        const xCount = 20;

        // Container de "X"
        const xContainer = document.querySelector('.x-container');

        // Função para gerar uma imagem com tamanho aleatório
        function createX() {
            const x = document.createElement('img'); // Usando <img> em vez de <div>
            x.src = './img/jogoFruta/X.svg'; // Defina o caminho da sua imagem
            x.classList.add('x');
            const bodyWidth = document.body.offsetWidth; // Largura do body
            const bodyHeight = document.body.offsetHeight; // Altura do body
            x.style.left = `${Math.random() * bodyWidth}px`; // Usando px para a largura
            x.style.top = `${Math.random() * bodyHeight}px`; // Usando px para a altura
            x.style.animationDelay = `${Math.random() * 1.3}s`;

            // Tamanho aleatório para a imagem
            const width = Math.random() * 3 + 30; // Largura entre 30 e 50 pixels
            x.style.width = `${width}px`;
            const height = Math.random() * 30 + 70; // Altura entre 70 e 100 pixels
            x.style.height = `${height}px`;


            xContainer.appendChild(x);
        }

        // Gerar imagens
        for (let i = 0; i < xCount; i++) {
            createX();
        }












        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
        });

    </script>
</body>

</html>