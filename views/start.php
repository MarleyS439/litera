<?php
// session
session_start();
// verificação se o user esta logado
if(!isset($_SESSION['authUser'])){
    // caso não esteja, redirecione a login e indique que para realizar o login
    header("Location: ./login.php?erro2");
    exit();
}
// variavel para todas as informaçoes do usuario
$usuarioAutenticado = $_SESSION['authUser'];
// verificar se o user esta banido
if($usuarioAutenticado['banido']!=0){
    // caso não esteja, redirecionar a login e indique que o user foi banido
    header("Location: ./login.php?erro3");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/home.css">
    <link rel="shortcut icon" href="../assets/images/icons/Litera Icon2.ico" type="image/x-icon">
    <title>Home | Litera</title>
</head>

<body>
    <?php
    include('../views/components/topbar.php');
    ?>

    <div class="title-container">
        <h2>Sala de Jogos</h2>
    </div>

    <div class="contain">
        <div class="suit-games">
            <div class="games">
                <a href="../views/jogo/index.php" class="access-game">
                    <div class="name-game">
                        <p>Caça às Vogais</p>
                    </div>
                    <div class="desciption-game">
                        <span>Selecione as imagens corretas</span>
                    </div>
                    <div class="figure-game">
                        <img src="../assets/images/LOGOTIPO.png" alt="">
                    </div>
                </a>
            </div>

            <div class="games">
                <a href="" class="access-game">
                    <div class="name-game">
                        <p>Nome do Jogo</p>
                    </div>
                    <div class="desciption-game">
                        <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>
                    </div>
                    <div class="figure-game">
                        <img src="../assets/images/LOGOTIPO.png" alt="">
                    </div>
                </a>
            </div>

            <div class="games">
                <a href="" class="access-game">
                    <div class="name-game">
                        <p>Nome do Jogo</p>
                    </div>
                    <div class="desciption-game">
                        <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>
                    </div>
                    <div class="figure-game">
                        <img src="../assets/images/LOGOTIPO.png" alt="">
                    </div>
                </a>
            </div>

            <div class="games">
                <a href="" class="access-game">
                    <div class="name-game">
                        <p>Nome do Jogo</p>
                    </div>
                    <div class="desciption-game">
                        <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>
                    </div>
                    <div class="figure-game">
                        <img src="../assets/images/LOGOTIPO.png" alt="">
                    </div>
                </a>
            </div>
        </div>

        <div class="side-status">
            <?php
            include('../views/components/status.php');
            ?>
        </div>
    </div>



    <script src="../assets/javascript/navigation.js"></script>
</body>

</html>