<?php
// session
session_start();
// verificação se o user esta logado
if (!isset($_SESSION['authPerfil'])) {
    // caso não esteja, redirecione a login e indique que para realizar o login
    header("Location: ./login.php?status=erro2");
    exit();
}
// variavel para todas as informaçoes do usuario
require_once "../dao/perfilDao.php";
require_once "../dao/usuarioDao.php";
$codUser = $_SESSION['authPerfil'];
$perfilAutenticado = PerfilDao::selectById($codUser['codPerfil']);
$usuarioAutenticado =  UsuarioDao::selectById($codUser['codUser']);
// verificar se o user esta banido
if ($usuarioAutenticado['banido'] != 0) {
    // caso não esteja, redirecionar a login e indique que o user foi banido
    header("Location: ./login.php?status=erro3");
    exit();
}
if ($_SESSION['authUser'] == null) {
    header('Location: ./login.php?status=erro4');
}

?>

<?php
// if e else para atualizar o progresso
$porcentagem = 0;

if ($perfilAutenticado['pontuacaoPerfil'] < 100 && $perfilAutenticado['pontuacaoPerfil'] > 0) {
    $porcentagem = ($perfilAutenticado['pontuacaoPerfil'] / 100) * 100;
} else if ($perfilAutenticado['pontuacaoPerfil'] < 260 && $perfilAutenticado['pontuacaoPerfil'] >= 100) {
    $porcentagem = ($perfilAutenticado['pontuacaoPerfil'] / 260) * 100;
} else if ($perfilAutenticado['pontuacaoPerfil'] < 700 && $perfilAutenticado['pontuacaoPerfil'] >= 260) {
    $porcentagem = ($perfilAutenticado['pontuacaoPerfil'] / 700) * 100;
} else if ($perfilAutenticado['pontuacaoPerfil'] == 0) {
    $porcentagem = 5;
}
?>

<!DOCTYPE html>
<html lang="pt-br" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <link rel="stylesheet" href="../assets/css/home.css">
    <title>Litera | Meu perfil</title>
    <style>
        /* Estilo da div com base na porcentagem */
        .barra .progresso {
            width: <?php echo $porcentagem; ?>%
        }
    </style>
</head>

<body>
    <!-- <nav class="navbar">
        <div class="logo-area">
            <img src="../assets/images/litera.png" alt="Litera">
            <span>Litera</span>
        </div>

        <div class="navigation">
            <ul>
                <li class="home-icon">
                    <a href="../views/home.php">
                        <svg width="28" height="31">
                            <image href="../assets/images/icons/home-icon-desktop.svg" width="28" height="31" />
                        </svg>
                    </a>
                </li>
                <li class="store-icon">
                    <a href="../views/store.php">
                        <svg width="28" height="31">
                            <image href="../assets/images/icons/store-icon-desktop.svg" width="28" height="31" />
                        </svg>
                    </a>
                </li>
                <li class="profile-icon">
                    <a href="../views/user-profile.php">
                        <svg width="28" height="31">
                            <image href="../assets/images/icons/profile-icon-desktop.svg" width="28" height="31" />
                        </svg>
                    </a>
                </li>
            </ul>
        </div>


        <div class="profile-info">
            <div class="name-user">
                <span><?php echo $perfilAutenticado['nomePerfil']; ?></span>
            </div>
            <div class="level">
                <span><?php echo $perfilAutenticado['nivel']; ?></span>
            </div>
            <div class="coin">
                <svg width="36" height="36">
                    <image href="../assets/images/icons/coin2.svg" width="35" height="36" />
                </svg>
            </div>

            <div class="name-user">
                <span><?php echo $perfilAutenticado['dinheiroPerfil']; ?></span>
            </div>
        </div>

    </nav> -->

    <div class="menu-profile-child">
        <?php
        require_once "../dao/compraItemDao.php";
        require('../dao/AvatarDao.php');
        $codUser = $_SESSION['authUser'];
        $avatar = AvatarDao::selectByIdUser($perfilAutenticado['codPerfil']);

        // Array associativo com os nomes dos meses em português
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
        $numeroMes = date('n', strtotime($perfilAutenticado['dataCriacao']));

        // Obter o nome do mês em português
        $mesPorExtenso = $meses[$numeroMes];


        ?>
        <div class="profile-menu">
            <div class="title-profile-menu">
                <h4>Seu perfil</h4>
            </div>
            <div class="name-user">
                <span><?php echo $perfilAutenticado['nomePerfil'] ?></span>
            </div>
            <!-- <div class="modalContent">
                <button class="edit-btn">

                </button>
                <dialog class="edit-name-dialog">
                    <form action="../controller/updateUser.php" method="POST">
                        <header>
                            <h2>Edite seu nome de Usuário</h2>
                            <button class="close-btn secundary" type="button">
                                X
                            </button>
                        </header>
                        <div class="save-name-dialog__content">
                            <div class="save-name-wrapper">
                                <input id="edit-name-input" name="id_user" type="hidden" value="<?php echo ($perfilAutenticado['codUsuario']) ?>">
                                <input id="edit-name-input" name="email_user" type="hidden" value="<?php echo ($perfilAutenticado['emailUsuario']) ?>">
                                <input id="edit-name-input" name="passw_user" type="hidden" value="<?php echo ($perfilAutenticado['senhaUsuario']) ?>">
                                <input id="edit-name-input" name="name_user" type="text" value="<?php echo ($perfilAutenticado['nomeUsuario']) ?>" required>
                                <button class="save-btn" type="submit">
                                    <span>Salvar</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </dialog>
            </div> -->

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
            <div class="infomation-user">
                <div class="enter-coin">
                    <span>Entrou em <?php echo ucfirst($mesPorExtenso) ?> de <?php echo explode("-", $perfilAutenticado['dataCriacao'])[0] ?></span>
                    <div class="coins">
                        <img src="../assets/images/icons/coin.svg" alt="">
                        <span><?php echo $perfilAutenticado['dinheiroPerfil'] ?></span>
                    </div>
                </div>

                <div class="infos">
                    <div class="">
                        <span>Nível: <?php echo $perfilAutenticado['nivel'] ?></span>
                    </div>

                    <div class="">
                        <span>Quantidade de itens: <?php echo CompraItemDao::contByIdUser($perfilAutenticado['codPerfil']) ?></span>
                    </div>

                    <div class="">
                        <span>Melhor desempenho: </span>
                    </div>
                    <div class="">
                        <span>Pontuação Total: <?php echo $perfilAutenticado['pontuacaoPerfil'] ?></span>
                    </div>
                    <div class="label-progresso">
                        <span>Progresso para o proximo nivel</span>
                    </div>
                    <!-- barra de progresso -->
                    <div class="">
                        <div class="barra">
                            <div class="progresso"></div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <script>
            const modalDialog = document.querySelector(".edit-name-dialog")
            const editBtn = document.querySelector(".edit-btn")
            const closeBtn = document.querySelector(".close-btn")
            const saveBtn = document.querySelector(".save-btn")

            editBtn.addEventListener("click", () => {
                modalDialog.classList.remove("edit-name-dialog--fadeout")
                modalDialog.showModal()
                console.log("Funcionoy");
            })
            closeBtn.addEventListener("click", () => {
                modalDialog.classList.add("edit-name-dialog--fadeout")
                modalDialog.close()
            })
        </script>
    </div>

</body>

</html>
