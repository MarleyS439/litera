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
    <link rel="stylesheet" href="frutas.css">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/9b58b8faa9.js" crossorigin="anonymous"></script>
    <title>GAME DE FRUTAS!</title>
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
    </header>
        

    <section class="jogo">
       <div class="area-jogo">
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
            <div class="area-itens">
                <div class="repetir" id='repetir'>
                    <img class="audioRepetir" src="img/jogoFruta/audio.svg" alt="audio">
                </div>
                <div class="areaFruta">
                    <img class="fruta" alt="" id="fruta">
                </div>
                <div class="palavras">
                    <div class="boxPalavra">
                        <img class="silBox" src="img/jogoFruta/silabas/MA.svg" alt="" id="sil1">
                        <img class="silBox" src="img/jogoFruta/silabas/MA.svg" alt="" id="sil2">
                        <img class="silBox" src="img/jogoFruta/silabas/MA.svg" alt="" id="sil3">
                        <img class="silBox" src="img/jogoFruta/silabas/MA.svg" alt="" id="sil4">
                    </div>
                </div>
                <div class="silabas">
                    <div class="boxSilabas" id="bx1">
                        <img class="sil" src="" alt="" id="silaba1">
                    </div>
                    
                    <div class="boxSilabas" id="bx2">
                        <img class="sil" src="" alt="" id="silaba2">
                    </div>
                    
                    <div class="boxSilabas" id="bx3">
                        <img class="sil" src="" alt="" id="silaba3">
                    </div>
                    
                    <div class="boxSilabas" id="bx4">
                        <img class="sil" src="" alt="" id="silaba4">
                    </div>
                    
                </div>
                <div class="acerto">
                    <div class="button" id="verific">
                        <img class="verificar" src="img/jogoFruta/verificarX.svg" alt="">
                    </div>
                </div>
            </div>
       </div>
    </section>
    <script src="frutas.js"></script>
</body>

</html>