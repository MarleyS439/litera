<!doctype html>
<html lang="pt-br" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A Fazenda dos Bichos</title>
    <link rel="stylesheet" href="../03/assets/css/style.css">
    <link rel="stylesheet" href="../03/assets/css/modal.css">
</head>

<body>

    <!--Modal exit-->
    <?php include('assets/components/modalExit.php'); ?>

    <div id="overlay"></div>

    <div class="container-game">
        <div class="top-bar">
            <div class="coins">
                <img src="assets/images/icons/coin.svg" alt="">
                <span>250<span>
            </div>

            <div class="progress-bar">
                <div class="effect"></div>

                <div class="time">
                    <span>2:30</span>
                </div>
            </div>

            <div class="buttons">
                <button type="button" id="home">
                    <img src="assets/images/icons/HomeIconBtn.svg" alt="">
                </button>

                <button type="button">
                    <img src="assets/images/icons/MusicIconBtn.svg" alt="">
                </button>

                <button type="button" id="fullScreenBtn">
                    <img src="assets/images/icons/FullscreenIconBtn.svg" alt="">
                </button>
            </div>
        </div>

        <div class="game-container">
            <div class="options">
                <div class="div1">
                    <div class="animal">
                        <img src="" alt="">
                    </div>
                </div>

                <div class="div2">
                    <div class="animal">
                        <img src="" alt="">
                    </div>
                </div>

                <div class="div3">
                    <div class="animal">
                        <img src="" alt="">
                    </div>
                </div>

                <div class="div4"> </div>
                <div class="div5"> </div>
                <div class="div6"> </div>
                <div class="div7"> </div>
                <div class="div8"> </div>
            </div>
        </div>


    </div>


    <script src="assets/javascript/fullscreen.js"></script>
    <!--Modal exit javascript-->
    <script src="assets/javascript/exitGame.js"></script>
</body>

</html>
