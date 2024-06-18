<?php
// session
session_start();
// verificação se o usuário está logado
if (!isset($_SESSION['authPerfil'])) {
    // caso não esteja, redirecione para o login e indique que é necessário fazer login
    header("Location: ./login.php?status=erro2");
    exit();
}
if (!isset($_SESSION['authPerfil'])) {
    // caso não esteja, redirecione para o login e indique que é necessário fazer login
    header("Location: ./profile.php?status=erro");
    exit();
}
// variável para todas as informações do usuário
require_once "../dao/perfilDao.php";
require_once "../dao/usuarioDao.php";
$codUser = $_SESSION['authPerfil'];
$perfilAutenticado = PerfilDao::selectById($codUser['codPerfil']);
$usuarioAutenticado =  UsuarioDao::selectById($codUser['codUser']);
if ($codUser['isGuesty']) {
    $usuarioAutenticado =  $_SESSION;
}
// verificar se o usuário está banido
if (!$codUser['isGuesty']) {
    if ($usuarioAutenticado['banido'] != 0) {
        // caso esteja banido, redirecione para o login e indique que o usuário foi banido
        header("Location: ./login.php?status=erro3");
        exit();
    }
}
if ($_SESSION == null) {
    header('Location: ./login.php?status=erro4');
}
// calcular a porcentagem de progresso
$porcentagem = 0;
if (!$codUser['isGuesty']) {
    if ($perfilAutenticado['pontuacaoPerfil'] < 100 && $perfilAutenticado['pontuacaoPerfil'] > 0) {
        $porcentagem = ($perfilAutenticado['pontuacaoPerfil'] / 100) * 100;
    } else if ($perfilAutenticado['pontuacaoPerfil'] < 260 && $perfilAutenticado['pontuacaoPerfil'] >= 100) {
        $porcentagem = ($perfilAutenticado['pontuacaoPerfil'] / 260) * 100;
    } else if ($perfilAutenticado['pontuacaoPerfil'] < 700 && $perfilAutenticado['pontuacaoPerfil'] >= 260) {
        $porcentagem = ($perfilAutenticado['pontuacaoPerfil'] / 700) * 100;
    } else if ($perfilAutenticado['pontuacaoPerfil'] == 0) {
        $porcentagem = 5;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br" dir="ltr">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/images/litera.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../assets/css/home.css">
    <link rel="stylesheet" href="./../assets/css/navbar.css">

    <?php if (!$codUser['isGuesty']) {
        if ($perfilAutenticado['tutorial'] == 0) {
            echo '<link rel="stylesheet" type="text/css" href="../assets/css/tutorial-inicial.css">';
        }
    }
    ?>
    <title>Litera | Sala de Jogos</title>
    <style>
        /* Estilo da div com base na porcentagem */
        .barra .progresso {
            width: <?php echo $porcentagem; ?><span>%</span>
        }
    </style>
</head>

<body>
    <div class="mobile-view">

        <div class="overlay-itens2"></div>

        <div class="top-bar">
            <div class="info-user">
                <?php if (!$codUser['isGuesty']) : ?>

                    <span><?php echo ($perfilAutenticado['nomePerfil']) ?></span>
                    <span class="levelUser"><?php echo $perfilAutenticado['nivel'] ?? $codUser['nivel']; ?></span>
                <?php endif; ?>
            </div>

            <div class="credits">
                <img src="../assets/images/icons/coin2.svg" alt="">
                <?php if (!$codUser['isGuesty']) : ?>
                    <span><?php echo ($perfilAutenticado['dinheiroPerfil']) ?></span>
                <?php endif ?>
                <div class="options" >
                    <img id="configs" src="../assets/images/icons/confiIcon.svg" alt="Opções">
                </div>
            </div>

            <!-- Mini menu - mobile
            <?php include('../views/components/minimenu.php'); ?> -->
        </div>
        
            <!-- Mini menu - mobile -->
            <?php include('../views/components/minimenu.php'); ?>

        <main>
            <div class="title">
                <h2>Sala de Jogos</h2>
            </div>

            <div class="games-list">
                <a class="game" id="first" href="../views/jogo/map1.php">
                    <div class="title-game">
                        <p>Acertar balões</p>
                    </div>

                    <div class="background-card-game" id="game1"></div>
                </a>

                <a class="game" href="../views/jogo/map2.php">
                    <div class="title-game">
                        <p>Jogo das sílabas</p>
                    </div>

                    <div class="background-card-game" id="game2"></div>
                </a>

                <a class="game" href="../views/jogo/03/fazenda-dos-bichos.php">
                    <div class="title-game">
                        <p>Fazenda dos bichos</p>
                    </div>

                    <div class="background-card-game" id="game3"></div>
                </a>

                <a class="game" href="../views/jogo/03/fazenda-dos-bichos.php">
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

            <a href="../views/store.php">
                <img src="../assets/images/icons/store-icon.svg" alt="Loja" id="store">
            </a>

            <a href="../views/perfil-profile.php">
                <img src="../assets/images/icons/profile-icon.svg" alt="Perfil" id="profile">
            </a>

        </div>
    </div>

    <div class="overlay-itens1">

        <div class="desktop-view">
            <?php include('../views/components/navbarHome.php'); ?>

            <main class="main-desktop">
                <div class="games-desktop">
                    <div class="title-desktop-room">
                        <h2>Sala de Jogos</h2>
                    </div>

                    <div class="games-desktop-itens">

                        <a class="game-item game1" id="first" href="../views/jogo/map1.php">
                            <div class="title-game-item">
                                <p>Acertar Balões</p>
                                <div class="bg-game" id="balls"></div>
                            </div>
                        </a>

                        <a class="game-item game2" href="../views/jogo/map2.php">
                            <div class="title-game-item">
                                <p>Montar Sílabas</p>
                                <div class="bg-game" id="fruits"></div>
                            </div>
                        </a>

                        <a class="game-item game3" href="../views/jogo/03/fazenda-dos-bichos.php">
                            <div class="title-game-item">
                                <p>Em breve um novo jogo</p>
                                <div class="bg-game" id=""></div>
                            </div>
                        </a>

                        <a class="game-item game4">
                            <div class="title-game-item">
                                <p>Em breve um novo jogo</p>
                                <div class="bg-game"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <?php // include('../views/components/menu-profile.php'); 
                ?>
            </main>
        </div>
    </div>

    <script src="./../assets/javascript/modal.js"></script>
    <script src="../assets/javascript/minimenu.js"></script>
</body>

</html>