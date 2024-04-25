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
            <form action="" method="POST" class="form-avatar">
                <div class="inventory">
                    <?php
                    $itens = [
                        ['id' => 1, 'nome' => 'item 1', 'imagem' => '../assets/images/facebook.png'],
                        ['id' => 2, 'nome' => 'item 2', 'imagem' => '../assets/images/instagram.png'],
                        ['id' => 3, 'nome' => 'item 3', 'imagem' => 'item.jpg']
                    ];
                    foreach ($itens as $item) {
                        echo '<div class="card-item" data-id="' . $item['id'] . '" onclick="atualizarImagem(this)">';
                        echo '<img src="' . $item['imagem'] . ' " alt="' . $item['nome'] . '">';
                        echo '</div>';
                    }
                    ?>
                </div>
                <div class="items">
                    <div class="container-avatar">

                        <div class="base">
                            <img src="../assets/images/perfil/genero/fb5d1c27ff697dffa11ced29aa15fe13.jpg" alt="">
                            <div class="cabelo">
                                <img src="../assets/images/perfil/cabelo/98e21116972c84c51c6b757e5eb9dda8.jpg" alt="">
                            </div>
                            <div class="roupa">
                                <img src="../assets/images/perfil/roupa/4d1465f52d3637e2d5d2c1b7ace4c7d7.jpg" alt="">
                            </div>
                        </div>

                    </div>
                    <div class="buttons">
                        <button type="submit">
                            <p>Cancelar</p>
                        </button>
                        <button type="submit" value="Comprar">
                            <p>Comprar</p>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="mobile-view">


        <div class="bottom-navigation-bar">

            <a href="#">
                <img src="../assets/images/icons/home-icon.svg" alt="Início" id="home">
            </a>

            <a href="#">
                <img src="../assets/images/icons/store-icon.svg" alt="Loja" id="store">
            </a>

            <a href="#">
                <img src="../assets/images/icons/profile-icon.svg" alt="Perfil" id="profile">
            </a>

        </div>
    </div>

    <script>
        function atualizarImagem(element) {
            var itemId = element.getAttribute('data-id');

            var imgSrc = element.querySelector('img').getAttribute('src')

            var imgAvatar = document.querySelector('.img-avatar');
            imgAvatar.innerHTML = '<img src= "' + imgSrc + '" alt="Avatar">'
        }
    </script>
</body>

</html>