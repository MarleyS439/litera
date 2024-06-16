<?php
// session
session_start();
// verificação se o usuário está logado
if(!isset($_SESSION['authUser'])){
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
require_once "../../dao/perfilDao.php";
require_once "../../dao/usuarioDao.php";
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
// var_dump($perfilAutenticado)
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
    if (!$codUser['isGuesty']) {
        if (!$perfilAutenticado['tutorial']) {
            echo '<link rel="stylesheet" type="text/css" href="../../assets/css/tutorial-fases.css">';
        }
    }
    ?>

    <title>Acertar Balões | Selecionar Fase</title>
</head>

<body>

    <div class="desktop-view">

        <!--Barra de navegação-->
        <?php include('../../views/components/navbarMap.php'); ?>

        <div class="overlay-itens2"></div>


        <main>
            <div class="dots">
                <div class="games-list-map">
                    <a class="game" id="t">
                        <div class="title-game-map" id="aa">
                            <p>Montar Sílabas</p>
                        </div>
                    </a>
                </div>

                <!--Listagem de fases-->
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
                        if (!$codUser['isGuesty']) {
                            if ($perfilAutenticado['tutorial'] == 0) {
                        ?>
                            <a href="#">
                                <img src="../../assets/images/fase/map-off.png" alt="">
                            </a>

                        <?php } else { ?>
                            <a href="../jogo/02/">
                                <img src="../../assets/images/fase/map-on.png" alt="">
                            </a>
                        <?php } } ?>
                    </div>
                    <div class="game-2">
                        <p>Fase 2</p>
                        <?php
                        if (!$codUser['isGuesty']) {
                            if ($perfilAutenticado['nivel'] >= 2) {
                        ?>
                            <a href="../jogo/02/">
                                <img src="../../assets/images/fase/map-on.png" alt="">
                            </a>

                        <?php } else { ?>
                            <a href="#">
                                <img src="../../assets/images/fase/map-off.png" alt="">
                            </a>
                        <?php } }?>
                    </div>
                    <div class="game-3">
                        <p>Fase 3</p>
                        <?php
                        if (!$codUser['isGuesty']) {
                            if ($perfilAutenticado['nivel'] >= 3) {
                        ?>
                            <a href="../jogo/02/">
                                <img src="../../assets/images/fase/map-on.png" alt="">
                            </a>

                        <?php } else { ?>
                            <a href="#">
                                <img src="../../assets/images/fase/map-off.png" alt="">
                            </a>
                        <?php } } ?>
                    </div>
                    <div class="game-4">
                        <p>Fase 4</p>
                        <?php
                        if (!$codUser['isGuesty']) {
                            if ($perfilAutenticado['nivel'] >= 4) {
                        ?>
                            <a href="#">
                                <img src="../../assets/images/fase/map-on.png" alt="">
                            </a>

                        <?php } else { ?>
                            <a href="#">
                                <img src="../../assets/images/fase/map-off.png" alt="">
                            </a>
                        <?php } } ?>
                    </div>

                </div>
        </main>
    </div>


    <div class="mobile-view">

        <div class="overlay-itens2"></div>

        <div class="top-bar">
            <div class="info-user">
                <img src="../assets/images/icons/profile.svg" alt="">
                <span><?php echo $perfilAutenticado['nomePerfil']; ?></span>
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
                        <p>Montar Sílabas</p>
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
                            <a href="../jogo/02/">
                                <img src="../../assets/images/fase/map-on.png" alt="">
                            </a>
                        <?php } ?>
                    </div>
                    <div class="game-2">
                        <p>Fase 2</p>
                        <?php
                        if ($perfilAutenticado['nivel'] >= 2 ) {
                        ?>
                            <a href="../jogo/02/">
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
                        if ($perfilAutenticado['nivel'] >= 3 ) {
                        ?>
                            <a href="../jogo/02/">
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
                        if ($perfilAutenticado['nivel'] >= 4) {
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
