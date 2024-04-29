<?php
// session
session_start();

// verificação se o user esta logado
if (!isset($_SESSION['authUser'])) {
    // caso não esteja, redirecione a login e indique que para realizar o login
    header("Location: ./login.php?status=erro2");
    exit();
}
// variavel para todas as informaçoes do usuario
require_once "../dao/usuarioDao.php";
$codUser = $_SESSION['authUser'];
$usuarioAutenticado = UsuarioDao::selectById($codUser['cod']);
// verificar se o user esta banido
if ($usuarioAutenticado['banido'] != 0) {
    // caso não esteja, redirecionar a login e indique que o user foi banido
    header("Location: ./login.php?status=erro3");
    exit();
}
require_once "../dao/compraItemDao.php";
require('../dao/AvatarDao.php');
$codUser = $_SESSION['authUser'];
$avatar = AvatarDao::selectByIdUser($codUser['cod']);

// Criando array com todos os meses do ano
$meses = array(
    1 => 'Janeiro',
    2 => 'Fevereiro',
    3 => 'Março',
    4 => 'Abril',
    5 => 'Maio',
    6 => 'Junho',
    7 => 'Julho',
    8 => 'Agosto',
    9 => 'Setembro',
    10 => 'Outubro',
    11 => 'Novembro',
    12 => 'Dezembro'
);
// Obter o número do mês
$numeroMes = date('n', strtotime($usuarioAutenticado['dataCriacao']));

// Obter o nome do mês em português
$mesPorExtenso = $meses[$numeroMes];
0
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/user.css">
    <title>Document</title>
</head>

<body>
    <div class="desktop-view">
        <?php
        include('../views/components/navbarHome.php');
        ?>
        <div class="container">
            <h2 class="profile-title">Seu perfil</h2>
            <div class="box">
                <div class="avatar">
                    <div class="avatar-container">
                        <div class="base">
                            <img src="../assets/images/perfil/genero/<?php echo $avatar["imgGenero"] ?>" alt="">
                            <div class="cabelo">
                                <img src="../assets/images/perfil/cabelo/<?php echo $avatar["imgCabelo"] ?>" alt="">
                            </div>
                            <div class="roupa">
                                <img src="../assets/images/perfil/roupa/<?php echo $avatar["imgRoupa"] ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="title-info">
                    <p><?php echo $usuarioAutenticado['nomeUsuario']?></p>
                    <div class="nivel">
                        <p>Nível</p>
                        <div class="nivel-number">
                            <span><?php echo $usuarioAutenticado['nivel']?></span>
                        </div>
                    </div>
                    <p>Proximo nível</p>
                    <div class="">
                        <div class="barra">
                            <div class="progresso"></div>
                        </div>
                    </div>
                    <p>Pontos: <?php echo $usuarioAutenticado['dinheiroUsuario'] ?></p>
                    <div class="enter-coin">
                        <span>Entrou em <?php echo ucfirst($mesPorExtenso) ?> de <?php echo explode("-", $usuarioAutenticado['dataCriacao'])[0] ?></span>
                        
                    </div>
                    <div class="conquistas">
                        <p>Conquistas</p>
                    </div>
                </div>

            </div>
        </div>

    </div>
</body>

</html>