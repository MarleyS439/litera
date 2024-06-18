<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
<?php
// session
session_start();
// verificação se o usuário está logado
if (!isset($_SESSION['authUser'])) {
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

if ($codUser['isGuesty']) {
    header('Location: home.php');
}
// var_dump($codUser);
require('../dao/roupaDao.php');
$roupa = RoupaDao::selectAll();
require('../dao/cabeloDao.php');
$cabelo = CabeloDao::selectAll();
require('../dao/avatarDao.php');
$avatar = AvatarDao::selectByIdUser($codUser['codPerfil']);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/store.css">
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <link rel="shortcut icon" href="../assets/images/icons/favicon.ico" type="image/x-icon">
    <title>Litera | Loja</title>
</head>

<body style="background-color: white;">


    <div class="desktop-view">
        <?php include('../views/components/navbarHome.php'); ?>

        <!-- <script src="https://kit.fontawesome.com/a3e37e504d.js" crossorigin="anonymous"></script> -->

        <div class="title-container">
            <h2>Loja de produtos</h2>
        </div>
        <?php
        $status = isset($_GET['status']) ? $_GET['status'] : null;
        // var_dump($cabelo);
        if ($status === 'chapeos') {  ?>
            <div class="page">
                <div class="contain">
                    <div class="cards">
                        <a href="./store.php" class="access-card">
                            <div class="name-card">
                                <p>Roupas</p>
                            </div>
                            <div class="figure-card">
                                <img src="../assets/images/icons/shirt-icon.png" alt="Roupas">
                            </div>
                        </a>
                    </div>

                    <div class="cards card-active">
                        <a href="./store.php?status=chapeos" class="access-card">
                            <div class="name-card">
                                <p>Cabelos</p>
                            </div>
                            <div class="figure-card">
                                <img src="../assets/images/icons/Vector.svg" alt="Chápeus">
                            </div>
                        </a>
                    </div>
                </div>
                <form action="../controller/insertAvatar.php" method="POST" class="form-avatar">
                    <!-- Adicione o input hidden aqui, responsavel pelo cod da roupa  -->
                    <!--  !!!IMPORTANTE N REMOVER, SUJEITO A TIJOLADA!!!! ass: Agiota-->
                    <input type="hidden" name="cabelo" id="cabelo-hidden" value="">

                    <div class="inventory">
                        <?php
                        foreach ($cabelo as $cabelos) { ?>
                            <div class="card-item">
                                <div class="center-card-item">
                                    <img src="../assets/images/perfil/cabelo/<?php echo $cabelos['imgCabelo'] ?>" alt="<?php echo $cabelos['nomeCabelo'] ?>" data-value="<?php echo $cabelos['codCabelo'] ?>">
                                </div>
                                <div class="valor">
                                    <img src="../assets/images/icons/coin.svg" alt="valor">
                                    <span>100</span>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="items">
                        <div class="container-avatar">
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
                        <div class="buttons">
                            <button type="submit">
                                <p>Cancelar</p>
                            </button>
                            <input type="hidden" name="codUser" value="<?php echo $codUser['codPerfil'] ?>">
                            <input type="hidden" name="itemAvatar" value="comprarCabelo">
                            <button type="submit">
                                <p>Comprar</p>
                            </button>
                        </div>
                    </div>
                </form>
            </div>


        <?php } else { ?>


            <div class="page">
                <div class="contain">
                    <div class="cards card-active">
                        <a href="./store.php" class="access-card">
                            <div class="name-card">
                                <p>Roupas</p>
                            </div>
                            <div class="figure-card">
                                <img src="../assets/images/icons/shirt-icon.png" alt="Roupas">
                            </div>
                        </a>
                    </div>

                    <div class="cards ">
                        <a href="./store.php?status=chapeos" class="access-card">
                            <div class="name-card">
                                <p>Chapéus</p>
                            </div>
                            <div class="figure-card">
                                <img src="../assets/images/icons/hat-icon.png" alt="Chápeus">
                            </div>
                        </a>
                    </div>
                </div>
                <form action="../controller/insertAvatar.php" method="POST" class="form-avatar">
                    <!-- Adicione o input hidden aqui, responsavel pelo cod da roupa  -->
                    <!--  !!!IMPORTANTE N REMOVER, SUJEITO A TIJOLADA!!!! ass: Agiota-->
                    <input type="hidden" name="roupa" id="roupa-hidden" value="">

                    <div class="inventory">
                        <?php
                        foreach ($roupa as $roupas) { ?>
                            <div class="card-item">
                                <div class="center-card-item">
                                    <img src="../assets/images/perfil/roupa/<?php echo $roupas['imgRoupa'] ?>" alt="<?php echo $roupas['nomeRoupa'] ?>" data-value="<?php echo $roupas['codRoupa'] ?>">
                                </div>
                                <div class="valor">
                                    <img src="../assets/images/icons/coin.svg" alt="valor">
                                    <span>100</span>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="items">
                        <div class="container-avatar">
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
                        <div class="buttons">
                            <button type="submit">
                                <p>Cancelar</p>
                            </button>
                            <input type="hidden" name="codUser" value="<?php echo $codUser['codPerfil'] ?>">
                            <input type="hidden" name="itemAvatar" value="comprarRoupa">
                            <button type="submit">
                                <p>Comprar</p>
                            </button>
                        </div>
                    </div>
                </form>
            </div>


        <?php } ?>

    </div>










    <!-- Mobile View -->
    <div class="mobile-view">
        <div class="overlay-itens2"></div>
        <div class="top-bar">
            <div class="info-user">
                <img src="../assets/images/icons/profile.svg" alt="">
                <?php if (!$codUser['isGuesty']) : ?>

                    <span><?php echo ($perfilAutenticado['nomePerfil']) ?></span>
                <?php endif; ?>
            </div>

            <div class="credits">
                <img src="../assets/images/icons/coin2.svg" alt="">
                <?php if (!$codUser['isGuesty']) : ?>
                    <span><?php echo ($perfilAutenticado['dinheiroPerfil']) ?></span>
                <?php endif ?>
            </div>
        </div>
        <div class="contain">
            <div class="cards">
                <a href="./store.php" class="access-card">
                    <div class="name-card">
                        <p>Roupas</p>
                    </div>
                    <div class="figure-card">
                        <img src="../assets/images/icons/shirt-icon.png" alt="Roupas">
                    </div>
                </a>
            </div>

            <div class="cards card-active">
                <a href="./store.php?status=chapeos" class="access-card">
                    <div class="name-card">
                        <p>Chapéus</p>
                    </div>
                    <div class="figure-card">
                        <img src="../assets/images/icons/hat-icon.png" alt="Chápeus">
                    </div>
                </a>
            </div>
        </div>

        <form action="../controller/insertAvatar.php" method="POST" class="form-avatar">
            <!-- Adicione o input hidden aqui -->
            <input type="hidden" name="roupa" id="roupa-hidden" value="">

            <div class="inventory">
                <?php
                foreach ($roupa as $roupas) { ?>
                    <div class="card-item">
                        <img src="../assets/images/perfil/roupa/<?php echo $roupas['imgRoupa'] ?>" alt="<?php echo $roupas['nomeRoupa'] ?>" data-value="<?php echo $roupas['codRoupa'] ?>">
                    </div>
                <?php } ?>
            </div>
            <div class="items">
                <div class="container-avatar">
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
                <div class="buttons">
                    <button type="submit">
                        <p>Cancelar</p>
                    </button>
                    <input type="hidden" name="codUser" value="<?php echo $codUser['codPerfil'] ?>">
                    <input type="hidden" name="itemAvatar" value="comprarRoupa">
                    <button type="submit">
                        <p>Comprar</p>
                    </button>
                </div>
            </div>
        </form>


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























    <?php
    $status = isset($_GET['status']) ? $_GET['status'] : null;
    if ($status === 'chapeos') {
    ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var cardItems = document.querySelectorAll('.inventory .card-item');
                var cabeloAvatar = document.querySelector('.container-avatar .cabelo img');
                var cabeloHiddenInput = document.getElementById('cabelo-hidden'); // Adicione esta linha para obter a referência ao input hidden

                cardItems.forEach(function(card) {
                    card.addEventListener('click', function() {
                        var imgSrc = this.querySelector('img').getAttribute('src');
                        var img = this.querySelector('img').getAttribute('data-value');
                        cabeloAvatar.setAttribute('src', imgSrc);
                        // Atualize o valor do input hidden com a informação da roupa
                        cabeloHiddenInput.value = img;
                    });
                });
            });
        </script>
    <?php } else { ?>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var cardItems = document.querySelectorAll('.inventory .card-item');
                var roupaAvatar = document.querySelector('.container-avatar .roupa img');
                var roupaHiddenInput = document.getElementById('roupa-hidden'); // Adicione esta linha para obter a referência ao input hidden

                cardItems.forEach(function(card) {
                    card.addEventListener('click', function() {
                        var imgSrc = this.querySelector('img').getAttribute('src');
                        var img = this.querySelector('img').getAttribute('data-value');
                        roupaAvatar.setAttribute('src', imgSrc);
                        // Atualize o valor do input hidden com a informação da roupa
                        roupaHiddenInput.value = img;
                    });
                });
            });
        </script>
    <?php } ?>

</body>

</html>