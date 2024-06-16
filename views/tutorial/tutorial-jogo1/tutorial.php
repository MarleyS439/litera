<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/tutorial.css">
    <link rel="shortcut icon" href="../../../assets/images/litera.png" type="image/x-icon">
    <title>Litera | Tutorial Balão </title>
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
            <div class="barra">
                <div class="contagem">
                    <div class="effect"></div>
                    <div class="cor" id="cor1"></div>
                    <div class="cor" id="cor2"></div>
                </div>
            </div>
            <div class="box-mensagem">
                <div class="mensagem">
                    <p class="texto" id="text">Ouça e veja a letra dita e selecione
                        o balão que contém esta letra</p>
                </div>
            </div>
            <div class="letra">
                <img src="img/A.svg" id="A">
                <img src="img/E.svg" id="E">
            </div>
            <div class="balao">
                <img src="img/Balao A.svg" id="BL1">
                <img src="img/balaoA certo.svg" id="BL3">
                
                <img src="img/BalaoE.svg" onclick="selecaoBalao(balaoE)" id="BL2">
                <img src="img/balaoE certo.svg" id="BL4">
            </div>
            
            <div class="botao" id="verificar">
                <button class="verific" id="verific"><img src="img/verificOff.svg"></button>
                <button class="verific2" id="verific2"><img src="img/verificOn.svg"></button>
            </div>



            <div class="selecao" id="mao">
                <img src="img/mão.png">
            </div>
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
                    <a href="../tutorial-jogo1/tutorial.php" class="btnFinal"><img src="img/recomecar.svg" alt=""></a>
                    <a href="../../../controller/fimTutorial.php" class="btnFinal"><img src="img/avancar.svg" alt=""></a>
                </div>
            </div>
        </div>
    </section>
    <script src="js/script.js"></script>
</body>
</html>