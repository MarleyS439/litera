<?php
// session
session_start();
// verificação se o user esta logado
if (!isset($_SESSION['authUser'])) {
    // caso não esteja, redirecione a login e indique que para realizar o login
    header("Location: ./login.php?status=erro2");
    exit();
}
// variavel para todas as informaçoes do usuario
require_once "../dao/usuarioDao.php";
$codUser = $_SESSION['authUser'];
$usuarioAutenticado = UsuarioDao::selectById($codUser['cod']);
// verificar se o user esta banido
if ($usuarioAutenticado['banido'] != 0) {
    // caso não esteja, redirecionar a login e indique que o user foi banido
    header("Location: ./login.php?status=erro3");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="balao.css">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/9b58b8faa9.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>

    <header class="headerNav">
        <a href="#" class="logo">Litera</a>
        <nav class="navbar">
            <ul class="ulNav">
                <li class="liNav"><a href="#"><img src="img/home.svg"></a></li>
                <li class="liNav"><a href="#"><img src="img/store.svg"></a></li>
            </ul>
        </nav>
        <a href="#" class="perfil">
            <img src="img/sapo.png" class="avatar">
            <span class="nomeUser" name="userName">João</span>   
        </a>
        <div class="menu-mobile">
            <a href="" class="logo-mob">Litera</a>
            <div class="menu">
                <div class="toggle"><i class="fa-solid fa-plus"></i></div>
                <li style="--i:0">
                    <a href=""><i class="fa-solid fa-house"></i></a>
                </li>
                <li style="--i:1">
                    <a href=""><i class="fa-solid fa-store"></i></a>
                </li>
                <li style="--i:2">
                    <a href=""><i class="fa-solid fa-user"></i></a>
                </li>
            </div>
        </div>
    </header>
        


    <section class="jogo-balao">
        <div class="container">
            <div class="effect-estrelar">
                <div class="letra1"><i class="fa-regular fa-star" style="color: #ffd000;"></i></div>
                <div class="letra2"><i class="fa-solid fa-star" style="color: #ffd000;"></i></div>
                <div class="letra3"><i class="fa-regular fa-star" style="color: #ffd000;"></i></div>
                <div class="letra4"><i class="fa-solid fa-star" style="color: #ffd000;"></i></div>
                <div class="letra5"><i class="fa-regular fa-star" style="color: #ffd000;"></i></div>
                <div class="letra6"><i class="fa-solid fa-star" style="color: #ffd000;"></i></div>
                <div class="letra7"><i class="fa-regular fa-star" style="color: #ffd000;"></i></div>
                <div class="letra8"><i class="fa-solid fa-star" style="color: #ffd000;"></i></div>
                <div class="letra9"><i class="fa-regular fa-star" style="color: #ffd000;"></i></div>
                <div class="letra10"><i class="fa-regular fa-star" style="color: #ffd000;"></i></div>
                <div class="letra11"><i class="fa-solid fa-star" style="color: #ffd000;"></i></div>
                <div class="letra12"><i class="fa-regular fa-star" style="color: #ffd000;"></i></div>
                <div class="letra13"><i class="fa-solid fa-star" style="color: #ffd000;"></i></div>
                <div class="letra14"><i class="fa-regular fa-star" style="color: #ffd000;"></i></div>
                <div class="letra15"><i class="fa-solid fa-star" style="color: #ffd000;"></i></div>
                <div class="letra16"><i class="fa-regular fa-star" style="color: #ffd000;"></i></div>
                <div class="letra17"><i class="fa-solid fa-star" style="color: #ffd000;"></i></div>
                <div class="letra18"><i class="fa-regular fa-star" style="color: #ffd000;"></i></div>
                <div class="letra19"><i class="fa-solid fa-star" style="color: #ffd000;"></i></div>
                <div class="letra21"><i class="fa-solid fa-star" style="color: #ffd000;"></i></div>
                <div class="letra22"><i class="fa-regular fa-star" style="color: #ffd000;"></i></div>
                <div class="letra23"><i class="fa-regular fa-star" style="color: #ffd000;"></i></div>
                <div class="letra24"><i class="fa-regular fa-star" style="color: #ffd000;"></i></div>
                <div class="letra25"><i class="fa-solid fa-star" style="color: #ffd000;"></i></div>
                <div class="letra26"><i class="fa-regular fa-star" style="color: #ffd000;"></i></div>
                <div class="letra27"><i class="fa-solid fa-star" style="color: #ffd000;"></i></div>
                <div class="letra28"><i class="fa-regular fa-star" style="color: #ffd000;"></i></div>
                <div class="letra29"><i class="fa-solid fa-star" style="color: #ffd000;"></i></div>
                <div class="letra30"><i class="fa-solid fa-star" style="color: #ffd000;"></i></div>
                <div class="letra31"><i class="fa-regular fa-star" style="color: #ffd000;"></i></div>
                <div class="letra32"><i class="fa-regular fa-star" style="color: #ffd000;"></i></div>
                <div class="letra33"><i class="fa-regular fa-star" style="color: #ffd000;"></i></div>
            </div>
        </div>


        <div class="area-jogo">
            <div class="fim" id="fim">
                <h1 class="titulo-fim">Fase <span>Concluída!</span></h1>
                <p>Sua Pontuação: <span class="total_moedas" id="final_point"></span></p>
            </div>


            <div class="audio" id="audio-comece">
                <i class="fa-solid fa-volume-off" id="off"></i>
                <i class="fa-solid fa-volume-high" id="on" style="display: none;"></i>
            </div>
            <div class="mobile-aud" id="audio-comece">
                <i class="fa-solid fa-volume-off" id="offmob"></i>
                <i class="fa-solid fa-volume-high" id="onmob" style="display: none;"></i>
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
                
            </div>

            <div class="baloes">
                <div class="baloes">
                    <div class="box-balao">
                        <img src="img/baloes/BalaoA.svg" alt="" class="balao1" onclick="selecaoBalao(b1)" id="b1">
                        <img src="img/baloes/BalaoE.svg" alt="" class="balao2" onclick="selecaoBalao(b2)" id="b2">
                        <img src="img/baloes/BalaoI.svg" alt="" class="balao3" onclick="selecaoBalao(b3)" id="b3">
                        <img src="img/baloes/BalaoO.svg" alt="" class="balao4" onclick="selecaoBalao(b4)" id="b4">
                        <img src="img/baloes/BalaoU.svg" alt="" class="balao5" onclick="selecaoBalao(b5)" id="b5">
                    </div>
                </div>
            </div>

            <div class="box-comecar" id="comece">
                <h1>Vamos <span>começar</span>!</h1>
                <button class="btn-play" id="botao">Começar</button>
            </div>

            <button id="repetir" class="microfone" title="Repetir a letra"><i class="fa-solid fa-volume-high"></i></button>
        </div>
    </section>
    <script src="balao.js"></script>
</body>

</html>