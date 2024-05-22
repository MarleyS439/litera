<?php
// session
session_start();
// verificação se o user esta logado
if (!isset($_SESSION['authAdmin'])) {
    // caso não esteja, redirecione a login e indique que para realizar o login
    header("Location: ../view/index.php?status=erro2");
    exit();
}
// variavel para todas as informaçoes do usuario
$usuarioAutenticado = $_SESSION['authAdmin'];

require('../../dao/usuarioDao.php');
$usuarios = UsuarioDao::selectAll();

?>
<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Illumi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador | Jogos</title>
    <link rel="shortcut icon" href="../../assets/images/icons/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link rel="stylesheet" href="../../admin/assets/css/sidebar-admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>

<body>

    <div class="sides">
        <?php
        include('../view/components/sidebar-admin.php');
        ?>
        <div class="information">
            <div class="title">
                <h2>Jogos</h2>
            </div>

            <div class="search-game">
                <div class="card-container animate__animated animate__fadeInDown">
                    <h3>Usuário</h3>
                    <input placeholder="Procurar usuário" id="search_user" type="text" onkeyup="search()">
                </div>
                <script src="../assets/javascript/search.js"></script>
                <div class="card-container animate__animated animate__fadeInDown">
                    <h3>Jogo</h3>
                    <select name="selectJogo" id="selectJogo">
                        <option value="0" selected>Selecione o jogo</option>
                        <option value="2">Montar Sílabas</option>
                        <option value="1">Acertar Balões</option>
                        <option value="3">Jogo 3</option>
                        <option value="4">Jogo 4</option>
                    </select>
                </div>
            </div>

            <div class="container animate__animated" id="container">
                <div class="card-container">
                    <h4>Fases concluídas</h4>
                    <div class="card">
                        <p class="font-card" id="card-1">-</p>
                    </div>
                </div>
                <div class="card-container">
                    <h4>Pontuação máxima</h4>
                    <div class="card">
                        <p class="font-card" id="card-2">-</p>
                    </div>
                </div>
                <div class="card-container">
                    <h4>Quantidade média de acertos</h4>
                    <div class="card">
                        <p class="font-card" id="card-3">-</p>
                    </div>
                </div>
                <div class="card-container">
                    <h4>Quantidade média de erros</h4>
                    <div class="card">
                        <p class="font-card" id="card-4">-</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/javascript/gameArea.js"></script>

</body>

</html>