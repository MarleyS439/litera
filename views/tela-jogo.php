<?php
// session
session_start();
// verificação se o user esta logado
if(!isset($_SESSION['authUser'])){
    // caso não esteja, redirecione a login e indique que para realizar o login
    header("Location: ./login.php?status=erro2");
    exit();
}
// variavel para todas as informaçoes do usuario
$usuarioAutenticado = $_SESSION['authUser'];
// verificar se o user esta banido
if($usuarioAutenticado['banido']!=0){
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
        <?php include('../views/components/navbarHome.php'); ?>

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