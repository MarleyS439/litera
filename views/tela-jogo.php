<?php
// session
session_start();
// verificação se o user esta logado
if (!isset($_SESSION['authUser'])) {
    // caso não esteja, redirecione a login e indique que para realizar o login
    header("Location: ./login.php?status=erro2");
    exit();
}
if ($_SESSION['authUser'] == null){
    header('Location: ./login.php?status=erro4');
}
// variavel para todas as informaçoes do usuario
$usuarioAutenticado = $_SESSION['authUser'];
// verificar se o user esta banido
if ($usuarioAutenticado['banido'] != 0) {
    // caso não esteja, redirecionar a login e indique que o user foi banido
    header("Location: ./login.php?status=erro3");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../assets/css/tela-jogo.css">
    <title>Litera | Nome do Jogo</title>
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
                        <a href="#">
                            <svg width="28" height="31">
                                <image href="assets/images/icons/home-icon-desktop.svg" width="28" height="31" />
                            </svg>
                        </a>
                    </li>
                    <li class="store-icon">
                        <a href="#">
                            <svg width="28" height="31">
                                <image href="../assets/images/icons/store-icon-desktop.svg" width="28" height="31" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>


            <!-- <div class="profile">
        <div class="profile-pic">
            <span><?php echo $usuarioAutenticado['nome'] ?></span>
            <img src="../assets/images/icons/profile.svg" alt="">
        </div>
    </div> -->
            <div>
                <a href="../controller/logoutUser.php" title="logout">
                    <img class="img-logoff" src="../assets/images/icons/exit-svgrepo-com.svg" alt="exit">
                </a>

            </div>
        </nav>
        <script src="https://kit.fontawesome.com/a3e37e504d.js" crossorigin="anonymous"></script>

        <div class="container">
            <div class="selection-level">
                <div class="name-game">
                    <a href="#">
                        <img src="" alt="Voltar">
                    </a>
                </div>
            </div>

            <?php include('../views/components/menu-profile.php'); ?>
        </div>
    </div>

    <div class="mobile-view">
    </div>
</body>

</html>