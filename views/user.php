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
require_once "../dao/perfilDao.php";
require_once "../dao/usuarioDao.php";
$codUser = $_SESSION['authUser'];
$perfilAutenticado = PerfilDao::selectById($codUser['codPerfil']);
$usuarioAutenticado = UsuarioDao::selectById($codUser['cod']);
// verificar se o user esta banido
if ($perfilAutenticado['banido'] != 0) {
    // caso não esteja, redirecionar a login e indique que o user foi banido
    header("Location: ./login.php?status=erro3");
    exit();
}
require_once "../dao/compraItemDao.php";
require('../dao/AvatarDao.php');
$codUser = $_SESSION['authUser'];
$avatar = AvatarDao::selectByIdUser($codUser['cod']);

// Criando array com todos os meses do ano
$meses = array(
    1 => 'Janeiro',
    2 => 'Fevereiro',
    3 => 'Março',
    4 => 'Abril',
    5 => 'Maio',
    6 => 'Junho',
    7 => 'Julho',
    8 => 'Agosto',
    9 => 'Setembro',
    10 => 'Outubro',
    11 => 'Novembro',
    12 => 'Dezembro'
);
// Obter o número do mês
$numeroMes = date('n', strtotime($perfilAutenticado['dataCriacao']));

// Obter o nome do mês em português
$mesPorExtenso = $meses[$numeroMes];
0
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <link rel="stylesheet" href="../assets/css/user.css">
    <title>Document</title>
</head>

<body>
    <div class="desktop-view">
        <nav class="navbar">
            <div class="logo-area">
                <img src="../assets/images/litera.png" alt="Litera">
                <span>Litera</span>
            </div>

            <div class="navigation">
                <ul>
                    <li class="home-icon">
                        <a href="../views/home.php">
                            <svg width="28" height="31">
                                <image href="../assets/images/icons/home-icon-desktop.svg" width="28" height="31" />
                            </svg>
                        </a>
                    </li>
                    <li class="store-icon">
                        <a href="../views/store.php">
                            <svg width="28" height="31">
                                <image href="../assets/images/icons/store-icon-desktop.svg" width="28" height="31" />
                            </svg>
                        </a>
                    </li>
                    <li class="profile-icon">
                        <a href="../views/user-profile.php">
                            <svg width="28" height="31">
                                <image href="../assets/images/icons/profile-icon-desktop.svg" width="28" height="31" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>


            <div class="profile-info">
                <div class="name-user">
                    <span><?php echo $perfilAutenticado['nomePerfil']; ?></span>
                </div>
                <div class="level">
                    <span><?php echo $perfilAutenticado['nivel']; ?></span>
                </div>
                <div class="coin">
                    <svg width="36" height="36">
                        <image href="../assets/images/icons/coin2.svg" width="35" height="36" />
                    </svg>
                </div>

                <div class="name-user">
                    <span><?php echo $perfilAutenticado['dinheiroPerfil']; ?></span>
                </div>
            </div>

        </nav>
        <div class="container">
            <h2 class="profile-title">Seu perfil</h2>
            <div class="box">
                <div class="avatar">
                    <div class="avatar-container">
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
                </div>
                <div class="title-info">
                    <p><?php echo $perfilAutenticado['nomePerfil']?></p>
                    <div class="nivel">
                        <p>Nível</p>
                        <div class="nivel-number">
                            <span><?php echo $perfilAutenticado['nivel']?></span>
                        </div>
                    </div>
                    <p>Proximo nível</p>
                    <div class="">
                        <div class="barra">
                            <div class="progresso"></div>
                        </div>
                    </div>
                    <p>Pontos: <?php echo $perfilAutenticado['dinheiroPerfil'] ?></p>
                    <div class="enter-coin">
                        <span>Entrou em <?php echo ucfirst($mesPorExtenso) ?> de <?php echo explode("-", $perfilAutenticado['dataCriacao'])[0] ?></span>
                        
                    </div>
                    <div class="conquistas">
                        <p>Conquistas</p>
                    </div>
                </div>

            </div>
        </div>

    </div>
</body>

</html>