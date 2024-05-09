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
require('../dao/roupaDao.php');
$roupa = RoupaDao::selectAll();
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


            <!-- <div class="profile">
        <div class="profile-pic">
            <span>Nome</span>
            <img src="../assets/images/icons/profile.svg" alt="">
        </div>

        <div class="logout-area">
            <a href="../controller/logoutUser.php" title="logout">
                <img class="img-logoff" src="../assets/images/icons/exit-svgrepo-com.svg" alt="exit">
            </a>
        </div>
    </div> -->

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
        <!-- <script src="https://kit.fontawesome.com/a3e37e504d.js" crossorigin="anonymous"></script> -->

        <div class="title-container">
            <h2>Loja de produtos</h2>
        </div>

        <div class="page">
            <div class="contain">
                <div class="cards">
                    <a href="" class="access-card">
                        <div class="name-card">
                            <p>Roupas</p>
                        </div>
                        <div class="figure-card">
                            <img src="../assets/images/icons/shirt-icon.png" alt="Roupas">
                        </div>
                    </a>
                </div>

                <div class="cards">
                    <a href="" class="access-card">
                        <div class="name-card">
                            <p>Chapéus</p>
                        </div>
                        <div class="figure-card">
                            <img src="../assets/images/icons/hat-icon.png" alt="Chápeus">
                        </div>
                    </a>
                </div>

                <div class="cards">
                    <a href="" class="access-card">
                        <div class="name-card">
                            <p>Acessórios</p>
                        </div>
                        <div class="figure-card">
                            <img src="../assets/images/icons/glass-icon.png" alt="Acessórios">
                        </div>
                    </a>
                </div>
            </div>
            <form action="../controller/insertAvatar.php" method="POST" class="form-avatar">
                <!-- Adicione o input hidden aqui, responsavel pelo cod da roupa  -->
                <!--  !!!IMPORTANTE N REMOVER, SUJEITO A TIJOLADA!!!! -->
                <input type="hidden" name="roupa" id="roupa-hidden" value="">

                <div class="inventory">
                    <?php
                    foreach ($roupa as $roupas) { ?>
                        <div class="card-item">
                            <img src="../assets/images/perfil/roupa/<?php echo $roupas['imgRoupa'] ?>" alt="<?php echo $roupas['nomeRoupa'] ?>" data-value="<?php echo $roupas['codRoupa'] ?>">
                        </div>
                    <?php } ?>
                </div>
                <div class="items" style="border: 1px solid gray; border-radius: 10px">
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
    </div>
    <!-- Mobile View -->
    <div class="mobile-view">

        <div class="overlay-itens2"></div>

        <div class="top-bar">
            <div class="info-user">
                <img src="../assets/images/icons/profile.svg" alt="">
                <span><?php echo ($perfilAutenticado['nomePerfil']) ?></span>
            </div>

            <div class="credits">
                <img src="../assets/images/icons/coin.svg" alt="">
                <span><?php echo ($perfilAutenticado['pontuacaoPerfil']) ?></span>
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
                    <input type="hidden" name="codUser" value="<?php echo $codUser['cod'] ?>">
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

</body>

</html>