<!doctype html>
<html lang="pt-br" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A Fazenda dos Bichos</title>
    <link rel="stylesheet" href="../03/assets/css/style.css">
    <link rel="stylesheet" href="../03/assets/css/modal.css">
    <link rel="stylesheet" href="../03/assets/css/modalGameOver.css">
    <link rel="stylesheet" href="../03/assets/css/modalStartGame.css">
</head>

<body>
    <!-- Modal de início de partida -->
    <div id="modalStartGame" class="modalStart">
        <div class="modal-content start">
            <h2>Bem-vindo à Fazenda dos Bichos!</h2>
            <p>Clique em "Começar Jogo" para iniciar a partida.</p>
            <button id="startGameBtn">Começar Jogo</button>
        </div>
    </div>

    <!-- Modal de saída de partida -->
    <?php include('assets/components/modalExit.php'); ?>

    <!-- Modal de game over -->
    <div id="modalGameOver" class="modal">
        <div class="modal-content">
            <h2>Fim de Jogo!</h2>
            <p>Você conseguiu colocar todos os animais nas palavras corretas.</p>

            <div class="bntns">
                <button id="restartGameBtn">
                    <span>Recomeçar</span>
                    <img src="./assets/images/icons/retornarSil.svg" alt="">
                </button>

                <a id="exitGameBtn" href="../../home.php">
                    <span>Sair</span>
                    <img src="./assets/images/icons/arrow.svg" alt="">
                </a>
            </div>
        </div>
    </div>

    <!-- Overlay for modal exit -->
    <div id="overlay"></div>

    <div class="container-game">
        <div class="top-bar">
            <div class="coins">
                <img src="assets/images/icons/coin.svg" alt="Moeda">
                <span>250</span>
            </div>

            <div class="progress-bar">
                <div class="effect"></div>

                <div class="time">
                    <span>0:00</span>
                </div>
            </div>

            <div class="buttons">
                <button type="button" id="home">
                    <img src="assets/images/icons/HomeIconBtn.svg" alt="Home">
                </button>

                <button type="button">
                    <img src="assets/images/icons/MusicIconBtn.svg" alt="Música">
                </button>

                <button type="button" id="fullScreenBtn">
                    <img src="assets/images/icons/FullscreenIconBtn.svg" alt="Tela cheia">
                </button>
            </div>
        </div>

        <div class="game-container">
            <div id="container-animais" class="container-animais"></div>
            <div id="container-palavras" class="container-palavras"></div>
        </div>
    </div>

    <!-- fullscreen -->
    <script src="assets/javascript/fullscreen.js"></script>

    <!-- Modal de saída do jogo -->
    <script src="assets/javascript/exitGame.js"></script>

    <!-- Script do jogo -->
    <script src="assets/javascript/jogo.js"></script>

    <!-- Modal de gameOver -->
    <script src="../03/assets/javascript/gameOver.js"></script>
</body>

</html>