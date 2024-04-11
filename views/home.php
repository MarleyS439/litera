<!DOCTYPE html>
<html lang="pt-br" dir="ltr">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <link rel="shortcut icon" href="../assets/images/litera.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../assets/css/home.css">
    <?php
    $passou_tutorial = false;

    if ($passou_tutorial == false) {
        echo '<link rel="stylesheet" type="text/css" href="../assets/css/tutorial-inicial.css">';
    }
    ?>
    <title>Litera | Início</title>

</head>

<body>
    <!-- Desktop and Tablet View -->

    <div class="overlay-itens1">

    </div>
    <div class="desktop-view">
        <?php
        include('../views/components/navbarHome.php');
        ?>

        <main class="main-desktop">
            <div class="games-desktop">
                <div class="title-desktop-room">
                    <h2>Sala de Jogos</h2>
                </div>

                <div class="games-desktop-itens">
                    <a class="game-item" id="first" href="../views/jogo/index.php">
                        <div class="title-game-item">
                            <p>Caça às vogais</p>
                            <div class="bg-game"></div>
                        </div>
                    </a>

                    <a class="game-item">
                        <div class="title-game-item">
                            <p>Caça às vogais</p>
                            <div class="bg-game"></div>
                        </div>
                    </a>

                    <a class="game-item">
                        <div class="title-game-item">
                            <p>Caça às vogais</p>
                            <div class="bg-game"></div>
                        </div>
                    </a>

                    <a class="game-item">
                        <div class="title-game-item">
                            <p>Caça às vogais</p>
                            <div class="bg-game"></div>
                        </div>
                    </a>
                </div>
            </div>

            <?php include('../views/components/menu-profile.php'); ?>
        </main>
        <div class="information-litera">
            <p>&copy; Litera 2024 | Versão 1.0</p>

        </div>
    </div>

    <!-- Mobile View -->
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
            <div class="title">
                <h2>Sala de Jogos</h2>
            </div>

            <div class="games-list">
                <a class="game" id="t" href="../views/jogo/index.php">
                    <div class="title-game" id="aa">
                        <p>Caça às Letras</p>
                    </div>

                    <div class="background-card-game" id="aa"></div>
                </a>

                <a class="game">
                    <div class="title-game">
                        <p>Caça às Letras</p>
                    </div>

                    <div class="background-card-game"></div>
                </a>

                <a class="game">
                    <div class="title-game">
                        <p>Caça às Letras</p>
                    </div>

                    <div class="background-card-game"></div>
                </a>

                <a class="game">
                    <div class="title-game">
                        <p>Caça às Letras</p>
                    </div>

                    <div class="background-card-game"></div>
                </a>
            </div>
        </main>



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
</body>

</html>