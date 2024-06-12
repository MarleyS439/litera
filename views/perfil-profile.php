<?php
// session
session_start();
// verificação se o usuário está logado
if (!isset($_SESSION['authPerfil'])) {
    // caso não esteja, redirecione para o login e indique que é necessário fazer login
    header("Location: ./login.php?status=erro2");
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
if ($codUser['isGuesty']) {
    header('Location: home.php');
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
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/images/litera.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/profile.css">
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <style>
        /* Estilo da div com base na porcentagem */
        .barra .barra-progresso {
            width: <?php echo $porcentagem ?>%
        }
    </style>
    <title>Litera | Meu Perfil</title>
</head>

<body>
    <div class="desktop-view">

            <?php include('../views/components/navbarHome.php'); ?>
<!-- #region -->
        <div class="container">
            <div class="card">
                <div class="title-card">
                    <p>Seu Perfil</p>
                </div>
                <div class="infos-card">
                    <div class="area-avatar">
                        <div class="base">
                            <img src="../assets/images/perfil/genero/<?php echo $avatar["imgGenero"] ?>" alt="">
                            <div class="cabelo">
                                <img src="../assets/images/perfil/cabelo/<?php echo $avatar["imgCabelo"] ?>" alt="">
                            </div>
                            <div class="roupa">
                                <img src="../assets/images/perfil/roupa/<?php echo $avatar["imgRoupa"] ?>" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="area-infos">
                        <div class="infos-principais">
                            <span class="user"><?php echo $perfilAutenticado['nomePerfil']  ?></span>
                            <div>
                                <span>Nível</span>
                                <div>
                                    <span><?php echo $perfilAutenticado['nivel']  ?></span>
                                </div>
                            </div>
                            <!-- icon -->
                            <img src="../assets/images/icons/icon-moeda-azul.png" alt="moeda">
                            <span><?php echo $perfilAutenticado['dinheiroPerfil']  ?></span>
                        </div>
                        <div class="data-inicio">
                            <span>Membro desde <?php echo $perfilAutenticado['dataCriacao']  ?></span>
                        </div>
                        <div class="progresso">
                            <span>Próximo Nível</span>
                            <!-- barra de progresso -->
                            <div class="barra">
                                <div class="barra-progresso" style=" width: <?php echo $porcentagem ?>%"></div>
                            </div>
                        </div>
                        </d>
                    </div>
                </div>
                <div class="conquistas-card">
                    <div class="title-conquista">
                        <h1>Conquistas</h1>
                    </div>
                    <div class="conquistas">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mobile-view">
<<<<<<< HEAD
        <div class="container">
            <div class="topo">
                <span>Seu Perfil</span>
            </div>
            <div class="card">
                <div class="area-avatar">
                    <div class="base">
                        <img src="../assets/images/perfil/genero/<?php echo $avatar["imgGenero"] ?>" alt="">
                        <div class="cabelo">
                            <img src="../assets/images/perfil/cabelo/<?php echo $avatar["imgCabelo"] ?>" alt="">
                        </div>
                        <div class="roupa">
                            <img src="../assets/images/perfil/roupa/<?php echo $avatar["imgRoupa"] ?>" alt="">
                        </div>
                    </div>
                </div>
                <div class="infos">
                    <div class="primeira-info">
                        <span class="nome"><?php echo $perfilAutenticado['nomePerfil'] ?></span>
                        <span><?php echo $perfilAutenticado['dataCriacao']  ?></span>
                    </div>
                    <div class="nivel-area">
                        <span>Nivel</span>
                        <div>
                            <span class="nivel"><?php echo $perfilAutenticado['nivel'] ?></span>
                        </div>
                    </div>
                    <!-- <div class="infos-perfil">
                        <div class="nivel-area">
                            <span>Nivel</span>
                            <div>
                                <span class="nivel"><?php echo $perfilAutenticado['nivel'] ?></span>
                            </div>
                        </div>
                        <div class="dinheiro-area">
                            <img src="../assets/images/icons/icon-moeda-azul.png" alt="moeda">
                            <span><?php echo $perfilAutenticado['dinheiroPerfil']  ?></span>
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="conquistas">
                <div class="title">
                    <span>Conquistas</span>
                </div>
                <div class="conquistas-area">

                </div>
            </div>
        </div>

        <div class="bottom-navigation-bar">
=======

        <div class="bottom-navigation-bar">

>>>>>>> 58f7c13589524941715a1ba50a17ce6b71636441
            <a href="../views/home.php">
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
</body>

</html>