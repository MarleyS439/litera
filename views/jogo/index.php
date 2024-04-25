<?php
session_start();
// verificação se o user esta logado
if (!isset($_SESSION['authUser'])) {
    // caso não esteja, redirecione a login e indique que para realizar o login
    header("Location: ./login.php?status=erro2");
    exit();
}
// variavel para todas as informaçoes do usuario
require_once "../../dao/usuarioDao.php";
$codUser = $_SESSION['authUser'];
$usuarioAutenticado = UsuarioDao::selectById($codUser['cod']);
// verificar se o user esta banido
if ($usuarioAutenticado['banido'] != 0) {
    // caso não esteja, redirecionar a login e indique que o user foi banido
    header("Location: ./login.php?status=erro3");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="frutas.css">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/9b58b8faa9.js" crossorigin="anonymous"></script>
    <title>GAME DE FRUTAS!</title>
</head>

<body>
        
    <section class="jogo">
        


        <div class="area-jogo">

            

            <div class="final" id="finalizar">
                <div class="text-fim">
                    <p>FIM DE JOGO</p>
                </div>
                <p>Sua Pontuação: <span class="total_moedas" id="final_point"></span></p>
                <p>Quantidade de Erros: <span class="total_moedas" id="final_error"></span></p>
                <div class="btn-fim">
                    <a href="index.php" class="btnFinal"><img src="img/recomecar.svg" alt=""></a>
                    <a href="../home.php" class="btnFinal"><img src="img/avancar.svg" alt=""></a>
                </div>
            </div>

            

            <div class="comecar-jogo" id="boxComece">
                <h1>Vamos começar!</h1>
                <button id="comece">Começar!</button>
            </div>


            <div class="effeitoAcerto" id="effeitoA">
                <img src="img/acerto.png" alt="" class="joinhaUp" id="acertouUp">
                <img src="img/errou.png" alt="" class="joinhaDown" id="errada">
            </div>

            <div class="topo">
                <div class="moedas" id="mobile">
                    <i class="fa-solid fa-coins"></i><span id="moeda">0</span>
                </div>
                <div class="barra" id="barraVidas">
                    <div class="acerto" id="v1"></div>
                    <div class="acerto" id="v2"></div>
                    <div class="acerto" id="v3"></div>
                    <div class="acerto" id="v4"></div>
                    <div class="acerto" id="v5"></div>
                    <div class="acerto" id="v6"></div>
                    <div class="acerto" id="v7"></div>
                    <div class="acerto" id="v8"></div>
                </div>

                <div class="header" id="header">
                    <button onclick="openFullscreen()" class="fullScreen"></button>
                    <button onclick="closeFullscreen()" class="fullScreen"></button>
                 </div>
                
            </div>
            <div class="area-itens">
                
                

                <div class="repetir" id='repetir'>
                    <img class="audioRepetir" src="img/jogoFruta/audio.svg" alt="audio">
                </div>



                <div class="areaFruta">
                    <img class="fruta" alt="" id="fruta">
                </div>
                <div class="palavras">
                    <div class="boxPalavra">
                        <img class="silBox" src="img/jogoFruta/silabas/MA.svg" alt="" id="sil1">
                        <img class="silBox" src="img/jogoFruta/silabas/MA.svg" alt="" id="sil2">
                        <img class="silBox" src="img/jogoFruta/silabas/MA.svg" alt="" id="sil3">
                        <img class="silBox" src="img/jogoFruta/silabas/MA.svg" alt="" id="sil4">
                    </div>
                </div>
                <div class="silabas">

                    <button id="retornar" class="retornar"><img src="img/retornarSil.svg" alt="<"></button>

                    <div class="boxSilabas" id="bx1">
                        <img class="sil" src="" alt="" id="silaba1">
                    </div>
                    
                    <div class="boxSilabas" id="bx2">
                        <img class="sil" src="" alt="" id="silaba2">
                    </div>
                    
                    <div class="boxSilabas" id="bx3">
                        <img class="sil" src="" alt="" id="silaba3">
                    </div>
                    
                    <div class="boxSilabas" id="bx4">
                        <img class="sil" src="" alt="" id="silaba4">
                    </div>
                    
                </div>
                <div class="acertoBtn">
                    <div class="button" id="verific">
                        <img class="verificar" src="img/jogoFruta/verificarX.svg" alt="">
                    </div>
                </div>
            </div>

            <input type="hidden" name="id" id="id" value="<?php echo $usuarioAutenticado['codUsuario'] ?>">

        </div>
    </section>
    <script src="frutas.js"></script>
</body>

</html>