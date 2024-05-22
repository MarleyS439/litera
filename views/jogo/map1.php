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
require_once "../../dao/perfilDao.php";
require_once "../../dao/usuarioDao.php";
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
// var_dump($usuarioAutenticado);
?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../assets/css/map.css">
    <link rel="shortcut icon" href="../../assets/images/icons/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../assets/css/navbar.css">
    <?php
    if ($perfilAutenticado['tutorial'] == 0) {
        echo '<link rel="stylesheet" type="text/css" href="../../assets/css/tutorial-fases.css">';
    }
    ?>

    <title>Acertar Balões | Selecionar Fase</title>
</head>

<body>
    <!-- <div class="overlay-itens1"></div> -->
    <div class="desktop-view">

        <nav class="navbar">
            <div class="logo-area">
                <img src="../../assets/images/litera.png" alt="Litera">
                <span>Litera</span>
            </div>

            <div class="navigation">
                <ul>
                    <li class="home-icon">
                        <a href="../../views/home.php">
                            <svg width="28" height="31">
                                <image href="../../assets/images/icons/home-icon-desktop.svg" width="28" height="31" />
                            </svg>
                        </a>
                    </li>
                    <li class="store-icon">
                        <a href="../../views/store.php">
                            <svg width="28" height="31">
                                <image href="../../assets/images/icons/store-icon-desktop.svg" width="28" height="31" />
                            </svg>
                        </a>
                    </li>
                    <li class="profile-icon">
                        <a href="../../views/user-profile.php">
                            <svg width="28" height="31">
                                <image href="../../assets/images/icons/profile-icon-desktop.svg" width="28" height="31" />
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
                        <image href="../../assets/images/icons/coin2.svg" width="35" height="36" />
                    </svg>
                </div>

                <div class="name-user">
                    <span><?php echo $perfilAutenticado['dinheiroPerfil']; ?></span>
                </div>
            </div>

        </nav>

        <div class="overlay-itens2"></div>

        <main>
            <div class="dots">

                <div class="games-list-map">
                    <a class="game" id="t">
                        <div class="title-game-map" id="aa">
                            <p>Caça às Letras</p>
                        </div>
                    </a>

                </div>

                <div class="fase-list">

                    <div class="game-0" id="first">
                        <p>Tutorial</p>
                        <a href="../tutorial/tutorial-jogo1/tutorial.php">
                            <img src="../../assets/images/fase/map-on.png" alt="">
                        </a>
                    </div>
                    <div class="game-1">
                        <p>Fase 1</p>
                        <?php
                        if ($perfilAutenticado['tutorial'] == 0) {
                        ?>
                            <a href="#">
                                <img src="../../assets/images/fase/map-off.png" alt="">
                            </a>

                        <?php } else { ?>
                            <a href="../jogo/balao.php">
                                <img src="../../assets/images/fase/map-on.png" alt="">
                            </a>
                        <?php } ?>
                    </div>
                    <div class="game-2">
                        <p>Fase 2</p>
                        <?php
                        if ($perfilAutenticado['nivel'] >= 2 and $perfilAutenticado['nivel'] < 3) {
                        ?>
                            <a href="../jogo/balao.php">
                                <img src="../../assets/images/fase/map-on.png" alt="">
                            </a>

                        <?php } else { ?>
                            <a href="#">
                                <img src="../../assets/images/fase/map-off.png" alt="">
                            </a>
                        <?php } ?>
                    </div>
                    <div class="game-3">
                        <p>Fase 3</p>
                        <?php
                        if ($perfilAutenticado['nivel'] >= 3 and $perfilAutenticado['nivel'] < 4) {
                        ?>
                            <a href="../jogo/balao.php">
                                <img src="../../assets/images/fase/map-on.png" alt="">
                            </a>

                        <?php } else { ?>
                            <a href="#">
                                <img src="../../assets/images/fase/map-off.png" alt="">
                            </a>
                        <?php } ?>
                    </div>
                    <div class="game-4">
                        <p>Fase 3</p>
                        <?php
                        if ($perfilAutenticado['nivel'] >= 4 and $perfilAutenticado['nivel'] < 5) {
                        ?>
                            <a href="#">
                                <img src="../../assets/images/fase/map-on.png" alt="">
                            </a>

                        <?php } else { ?>
                            <a href="#">
                                <img src="../../assets/images/fase/map-off.png" alt="">
                            </a>
                        <?php } ?>
                    </div>

                </div>

        </main>

    </div>
    <div class="mobile-view">

        <div class="overlay-itens2"></div>

        <div class="top-bar">
            <div class="info-user">
                <img src="../assets/images/icons/profile.svg" alt="">
                <span>Nome usuário</span>
            </div>

            <div class="credits">
                <img src="../assets/images/icons/coin.svg" alt="">
                <span>500</span>
            </div>
        </div>

        <main>

            <div class="games-list-map">
                <a class="game">

                    <div class="background-card-game"></div>
                    <div class="title-game-map">
                        <p>Caça às Letras</p>
                    </div>
                </a>

            </div>
            <div class="fase-list">
                <div>
                    <div class="game-0" id="t">
                        <p>Tutorial</p>
                        <a href="../tutorial/tutorial-jogo1/tutorial.php">
                            <img id="aa" src="../../assets/images/fase/map-on.png" alt="">
                        </a>
                    </div>
                    <div class="game-1">
                        <p>Fase 1</p>
                        <?php
                        if ($perfilAutenticado['tutorial'] == 0) {
                        ?>
                            <a href="#">
                                <img src="../../assets/images/fase/map-off.png" alt="">
                            </a>

                        <?php } else { ?>
                            <a href="../jogo/balao.php">
                                <img src="../../assets/images/fase/map-on.png" alt="">
                            </a>
                        <?php } ?>
                    </div>
                    <div class="game-2">
                        <p>Fase 2</p>
                        <?php
                        if ($perfilAutenticado['nivel'] >= 2 and $perfilAutenticado['nivel'] < 3) {
                        ?>
                            <a href="../jogo/balao.php">
                                <img src="../../assets/images/fase/map-on.png" alt="">
                            </a>

                        <?php } else { ?>
                            <a href="#">
                                <img src="../../assets/images/fase/map-off.png" alt="">
                            </a>
                        <?php } ?>
                    </div>
                    <div class="game-3">
                        <p>Fase 3</p>
                        <?php
                        if ($perfilAutenticado['nivel'] >= 3 and $perfilAutenticado['nivel'] < 4) {
                        ?>
                            <a href="../jogo/balao.php">
                                <img src="../../assets/images/fase/map-on.png" alt="">
                            </a>

                        <?php } else { ?>
                            <a href="#">
                                <img src="../../assets/images/fase/map-off.png" alt="">
                            </a>
                        <?php } ?>
                    </div>
                    <div class="game-4">
                        <p>Fase 3</p>
                        <?php
                        if ($perfilAutenticado['nivel'] >= 4 and $perfilAutenticado['nivel'] < 5) {
                        ?>
                            <a href="#">
                                <img src="../../assets/images/fase/map-on.png" alt="">
                            </a>

                        <?php } else { ?>
                            <a href="#">
                                <img src="../../assets/images/fase/map-off.png" alt="">
                            </a>
                        <?php } ?>
                    </div>

                </div>

        </main>



        <div class="bottom-navigation-bar">

            <a href="../../views/home.php">
                <img src="../../assets/images/icons/home-icon.svg" alt="Início" id="home">
            </a>

            <a href="../../views/store.php">
                <img src="../../assets/images/icons/store-icon.svg" alt="Loja" id="store">
            </a>

            <a href="../../views/perfil-profile.php">
                <img src="../../assets/images/icons/profile-icon.svg" alt="Perfil" id="profile">
            </a>
        </div>
    </div>
</body>

</html>