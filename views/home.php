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

<?php
// if e else para atualizar o progresso
$porcentagem = 0;

if ($usuarioAutenticado['pontuacaoUsuario'] < 100 && $usuarioAutenticado['pontuacaoUsuario'] > 0) {
    $porcentagem = ($usuarioAutenticado['pontuacaoUsuario'] / 100) * 100;
} else if ($usuarioAutenticado['pontuacaoUsuario'] < 260 && $usuarioAutenticado['pontuacaoUsuario'] >= 100) {
    $porcentagem = ($usuarioAutenticado['pontuacaoUsuario'] / 260) * 100;
} else if ($usuarioAutenticado['pontuacaoUsuario'] < 700 && $usuarioAutenticado['pontuacaoUsuario'] >= 260) {
    $porcentagem = ($usuarioAutenticado['pontuacaoUsuario'] / 700) * 100;
} else if ($usuarioAutenticado['pontuacaoUsuario'] == 0) {
    $porcentagem = 5;
}
?>

<!DOCTYPE html>
<html lang="pt-br" dir="ltr">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <link rel="shortcut icon" href="../assets/images/litera.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../assets/css/home.css">
    <?php

    if ($usuarioAutenticado['tutorial'] == 0) {
        echo '<link rel="stylesheet" type="text/css" href="../assets/css/tutorial-inicial.css">';
    }
    ?>
    <title>Litera | Início</title>
    <style>
        /* Estilo da div com base na porcentagem */
        .barra .progresso {
            width: <?php echo $porcentagem; ?>%;
        }
    </style>
</head>

<body>
    <!-- Desktop and Tablet View -->

    <div class="overlay-itens1">

    </div>
    <div class="desktop-view">
        <?php
        include('../views/components/navbarHome.php');
        ?>


        <main class="main-desktop">
            <div class="games-desktop">
                <div class="title-desktop-room">
                    <h2>Sala de Jogos</h2>
                </div>

                <div class="games-desktop-itens">

                    <a class="game-item" id="first" href="../views/jogo/map1.php">
                        <div class="title-game-item">
                            <p>Caça às vogais</p>
                            <div class="bg-game"></div>
                        </div>
                    </a>

                    <a class="game-item" href="../views/jogo/index.php">
                        <div class="title-game-item">
                            <p>Ditado</p>
                            <div class="bg-game" id=""></div>
                        </div>
                    </a>

                    <a class="game-item">
                        <div class="title-game-item">
                            <p>Jogo</p>
                            <div class="bg-game"></div>
                        </div>
                    </a>

                    <a class="game-item">
                        <div class="title-game-item">
                            <p>Jogo</p>
                            <div class="bg-game"></div>
                        </div>
                    </a>
                </div>
            </div>

            <?php include('../views/components/menu-profile.php'); ?>
        </main>
        <div class="information-litera">
            <p>&copy; Litera 2024 | Versão 1.0</p>

        </div>
    </div>

    <!-- Mobile View -->
    <div class="mobile-view">

        <div class="overlay-itens2"></div>

        <div class="top-bar">
            <div class="info-user">
                <img src="../assets/images/icons/profile.svg" alt="">
                <span><?php echo ($usuarioAutenticado['nomeUsuario'])?></span>
            </div>

            <div class="credits">
                <img src="../assets/images/icons/coin.svg" alt="">
                <span><?php echo ($usuarioAutenticado['pontuacaoUsuario'])?></span>
            </div>
        </div>

        <main>
            <div class="title">
                <h2>Sala de Jogos</h2>
            </div>

            <div class="games-list">
                <a class="game" id="t" href="../views/jogo/map1.php">
                    <div class="title-game" id="aa">
                        <p>Caça às Letras</p>
                    </div>

                    <div class="background-card-game" id="aa"></div>
                </a>

                <a class="game">
                    <div class="title-game">
                        <p>Caça às Letras</p>
                    </div>

                    <div class="background-card-game"></div>
                </a>

                <a class="game">
                    <div class="title-game">
                        <p>Caça às Letras</p>
                    </div>

                    <div class="background-card-game"></div>
                </a>

                <a class="game">
                    <div class="title-game">
                        <p>Caça às Letras</p>
                    </div>

                    <div class="background-card-game"></div>
                </a>
            </div>
        </main>
        <div class="bottom-navigation-bar">

            <a href="./home.php">
                <img src="../assets/images/icons/home-icon.svg" alt="Início" id="home">
            </a>

            <a href="./store.php">
                <img src="../assets/images/icons/store-icon.svg" alt="Loja" id="store">
            </a>

            <a href="#">
                <img src="../assets/images/icons/profile-icon.svg" alt="Perfil" id="profile">
            </a>

        </div>
    </div>
    <script src="./../assets/javascript/modal.js"></script>
</body>

</html>