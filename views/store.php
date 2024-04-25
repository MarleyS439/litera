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
require('../dao/roupaDao.php');
$roupa = RoupaDao::selectAll();
require('../dao/AvatarDao.php');
$avatar = AvatarDao::selectByIdUser($codUser['cod']);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/store.css">
    <link rel="shortcut icon" href="../assets/images/icons/Litera Icon2.ico" type="image/x-icon">
    <title>Loja | Litera</title>
</head>

<body>
    <div class="desktop-view">

        <?php
        include('../views/components/navbarHome.php');
        ?>

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
        </div>
        <!-- Mobile View -->
        <div class="mobile-view">

            <div class="overlay-itens2"></div>

            <div class="top-bar">
                <div class="info-user">
                    <img src="../assets/images/icons/profile.svg" alt="">
                    <span><?php echo ($usuarioAutenticado['nomeUsuario']) ?></span>
                </div>

                <div class="credits">
                    <img src="../assets/images/icons/coin.svg" alt="">
                    <span><?php echo ($usuarioAutenticado['pontuacaoUsuario']) ?></span>
                </div>
            </div>


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