<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Home</title>
</head>
<body>
    <header>
    <nav>
        <h1 class="poppins-extrabold">Litera</h1>
        <ul>
        <li><a href="#home"><img src="./Image/IconHome.svg" alt="Home" class="iconHome" onclick="changeColor('iconHome')"></a></li>
        <li><a href="#loja"><img src="./Image/IconStore.svg" alt="Store" class="iconStore" onclick="changeColor('iconStore')"></a></li>
        </ul>
        <div class="contUser">
            <div class="profile-img">
                <img src="./Image/Lula.jpeg" alt="Imagem">
            </div>
            <h2 class="poppins-bold">Usuário</h2>
        </div>
    </nav>
    </header>

    <div class="container">
        <div class="contSalaJogos">
            <h1>Sala de Jogos</h1>
            <div class="jogos">
                    <div class="contJogo">
                        <h1>Nome do Jogo</h1>
                    </div>
                    <div class="contJogo">
                        <h1>Nome do Jogo</h1>
                    </div>
                </div>
                <div class="jogos">
                    <div class="contJogo">
                        <h1>Nome do Jogo</h1>
                    </div>
                    <div class="contJogo">
                        <h1>Nome do Jogo</h1>
                </div>
            </div>
        </div>

        <div class="contPerfil">
            <h1>Seu Perfil</h1>
            <div class="perfilUser">
                <h1>Usuário</h1>
            </div>
            <div class="contDadosUser">
                <div class="SideToSide">
                    <p>Entrou em Junho de 2024</p>
                    <div class="moedas">
                        <img src="./Image/IconMoedas.svg" alt="coins">
                        <p>554</p>
                    </div>
                </div>
                <p class="mb">Nivel: 4</p>
                <p class="mb">Quantidade de Itens:</p>
                <p class="mb">Melhor desempenho em:</p>
            </div>
        </div>
    </div>
</body>
</html>