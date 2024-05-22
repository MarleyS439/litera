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
require_once "../dao/perfilDao.php";
require_once "../dao/usuarioDao.php";
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

<?php
// if e else para atualizar o progresso
$porcentagem = 0;

if ($perfilAutenticado['pontuacaoPerfil'] < 100 && $perfilAutenticado['pontuacaoPerfil'] > 0) {
    $porcentagem = ($perfilAutenticado['pontuacaoPerfil'] / 100) * 100;
} else if ($perfilAutenticado['pontuacaoPerfil'] < 260 && $perfilAutenticado['pontuacaoPerfil'] >= 100) {
    $porcentagem = ($perfilAutenticado['pontuacaoPerfil'] / 260) * 100;
} else if ($perfilAutenticado['pontuacaoPerfil'] < 700 && $perfilAutenticado['pontuacaoPerfil'] >= 260) {
    $porcentagem = ($perfilAutenticado['pontuacaoPerfil'] / 700) * 100;
} else if ($perfilAutenticado['pontuacaoPerfil'] == 0) {
    $porcentagem = 5;
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
            width: <?php echo $porcentagem; ?>%
        }
    </style>
    <title>Litera | Meu Perfil</title>
</head>

<body>
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
        <div class="card">
            <div class="title-card">
                <p>Seu Perfil</p>
            </div>
            <div class="infos-card">
                <div class="area-avatar">

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
                        <span><?php echo $perfilAutenticado['dinheiroPerfil']  ?></span>
                    </div>
                    <div class="data-inicio">
                        <span>Membro desde <?php echo $perfilAutenticado['dataCriacao']  ?></span>
                    </div>
                    <div class="progresso">
                        <span>Próximo Nível</span>
                        <!-- barra de progresso -->
                        <div class="barra">
                            <div class="barra-progresso">
                            <?php echo $porcentagem  ?>
                            </div>
                        </div>
                    </div>
                    </d>
                </div>
                <div class="conquistas-card"></div>
            </div>
        </div>
</body>

</html>