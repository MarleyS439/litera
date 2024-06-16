<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/tutorial.css">
    <link rel="shortcut icon" href="../../../assets/images/litera.png" type="image/x-icon">
    <title>Litera | Tutorial Fruta </title>
</head>
<body>
    <header class="headerNav">
        <a href="#" class="logo">Litera</a>
        <nav class="navbar">
            <ul class="ulNav">
                <li class="liNav"><a href="#"><img src="./img/home.svg"></a></li>
                <li class="liNav"><a href="#"><img src="./img/store.svg"></a></li>
            </ul>
        </nav>
        <a href="#" class="perfil">
            <img src="./img/sapo.png" class="avatar">
            <span class="nomeUser" name="userName">João</span>   
        </a>
    </header>
    <section class="container">
        <div class="area-jogo">
            <!-- barra de progresso -->
            <div class="barra">
                <div class="contagem">
                    <div class="effect"></div>
                    <div class="cor" id="cor1"></div>
                    <div class="cor" id="cor2"></div>
                </div>
            </div>
            <!-- caixa com a mesagem do tutorial -->
            <div class="box-mensagem">
                <div class="mensagem">
                    <p class="texto" id="text">Junte as sílabas para formar o nome da fruta desenhada.</p>
                </div>
            </div>

            <!-- area onde apacere a fruta -->
            <div class="fruta">
                <img src="img/maça/maça.svg" alt="maçã" id="maca">
                <img src="img/pera/pera.svg" alt="pera" id="pera">
            </div>

            <!-- div onde aparece as silabas para selecionar -->
            <div class="silabas silabas-area-resp">
                <img src="img/maça/MA1.svg" alt="silaba alt" id="alternativa">
                <img src="img/maça/ÇA1.svg" alt="silaba alt" id="alternativa1">

                <img src="img/pera/PE1.svg" alt="silaba" id="alternativa2">
                <img src="img/pera/RE2.svg" alt="silaba" id="alternativa3">   
            </div>

            <!-- area onde apacere as letras selecionadas -->
             <div class="silabas">
                <img src="img/maça/ÇA1.svg" alt="silaba" id="silaba1">
                <img src="img/maça/MA1.svg" alt="silaba" id="silaba">
                <img src="img/pera/RA2.svg"  onclick="selecionarSilaba(slb4)" alt="silaba" id="silaba3">
             </div>

             

            <!-- mão de dica  -->
            <div class="selecao" id="mao">
                <img src="img/mão.png">
            </div>

            <!-- botão de proximo verdinho lateral  -->
            <div class="proximo" id="maoProxima">
                <img src="img/mão.png">
            </div>





            <button onclick="botaoAvancar()" class="btnProx" id="proxima">></button>
            <button onclick="botaoAvancar2()" class="btnProx" id="proxima2">></button>

            
            <div class="comeco" id="comecar"> 
                <button onclick="comecarTutorial()" class="btnComecar">Começar tutorial</button>
            </div>
            

            <div class="tutorial" id="tutorial">
                <div class="text-fim">
                    <p>FIM DE JOGO</p>
                </div>
                <div class="btn-fim">
                    <a href="../tutorial-jogo2/tutorial.php" class="btnFinal"><img src="img/recomecar.svg" alt=""></a>
                    <a href="../../../controller/fimTutorial.php" class="btnFinal"><img src="img/avancar.svg" alt=""></a>
                </div>
            </div>
        </div>
    </section>
    <script src="js/script.js"></script>
</body>
</html>