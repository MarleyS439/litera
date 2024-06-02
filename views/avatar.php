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
<!-- import das img  -->
<?php
require('../dao/cabeloDao.php');
require('../dao/generoDao.php');
require('../dao/roupaDao.php');
require('../dao/avatarDao.php');
require('../dao/acessoUsuarioDao.php');

$cabelo = CabeloDao::selectAll();
$roupa = RoupaDao::selectAll();
$genero = GeneroDao::selectAll();
$avatar = AvatarDao::selectByIdUser($codUser['codPerfil']);
// var_dump($codUser);
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Litera | Criação de Avatar</title>
    <script src="../assets/javascript/avatar.js"></script>
    <link rel="stylesheet" href="../assets/css/avatar.css">
    <link rel="shortcut icon" href="../assets/images/icons/favicon.ico" type="image/x-icon">
</head>

<body>
    <div class="conteinerAvatarCriacao">
        <div class="top">
            <p>Crie seu Avatar</p>
        </div>
        <!-- verificação da etapa atravez da url, confome a resposta apresenta uma parte -->
        <?php if ($_GET['status'] == 'base') :  ?>
            <div class="containerAvatar">
                <div class="cardItem">
                    <div class="base">
                        <!-- img do avatar apenas com a base -->
                        <img id="cod" src="../assets/images/perfil/genero/fb5d1c27ff697dffa11ced29aa15fe13.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="etapa">
                <!-- card com as etapas para o usuario ver onde esta -->
                <div class="card etapaAtu genero">
                    <img src="./../assets/images/icons/male.svg" class="genderMale" alt="genero">
                    <img src="./../assets/images/icons/female.svg" alt="genero">
                </div>
                <div class="card">
                    <img class="cabeloIcon" src="./../assets/images/icons/comb.svg" alt="cabelo">
                </div>
                <div class="card">
                    <img src="./../assets/images/icons/shirt.svg" alt="roupa">
                </div>
            </div>
            <form action="../controller/insertAvatar.php" method="post" onchange="atualizarImagemBase()">

                <div class="containerOpcoes">
                    <?php foreach ($genero as $generos) : ?>
                        <div class="opcoes">
                            <input required type="radio" name="genero" class="input-opcao" value="<?php echo $generos['codGenero'] ?>" data-img="<?php echo $generos["imgGenero"] ?>">
                            <img src="../assets/images/perfil/genero/<?php echo $generos["imgGenero"] ?>" alt="base">
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="avancar">
                    <input type="hidden" name="codUser" value="<?php echo $codUser['codPerfil'] ?>">
                    <input type="hidden" name="itemAvatar" value="base">
                    <button type="submit">Proximo</button>
                </div>
            </form>
            <!-- <div class="conteinerImg">
                <div class="cardItem">
                    <div class="base">
                        <img id="cod" src="../assets/images/perfil/genero/fb5d1c27ff697dffa11ced29aa15fe13.jpg" alt="">
                        <div class="cabelo">
                            <img src="../assets/images/perfil/cabelo/98e21116972c84c51c6b757e5eb9dda8.jpg" alt="">
                        </div>
                        <div class="roupa">
                            <img src="../assets/images/perfil/roupa/4d1465f52d3637e2d5d2c1b7ace4c7d7.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="conteinerOpcoes">
                <form action="../controller/insertAvatar.php" method="post" onchange="atualizarImagemBase()">
                    <?php
                    foreach ($genero as $generos) : ?>
                        <div class="opcoes">

                            <input required type="radio" name="genero" class="input-opcao" value="<?php echo $generos['codGenero'] ?>" data-img="<?php echo $generos["imgGenero"] ?>">
                            <img src="../assets/images/perfil/genero/<?php echo $generos["imgGenero"] ?>" alt="base">
                        </div>
                    <?php endforeach; ?>
                    
                </form>
            </div> -->

        <?php elseif ($_GET['status'] == 'cabelo') :  ?>
            <div class="containerAvatar">
                <div class="cardItem">
                    <div class="base">
                        <img src="../assets/images/perfil/genero/<?php echo $avatar["imgGenero"] ?>" alt="">
                        <div class="cabelo">
                            <img id="cod" src="../assets/images/perfil/cabelo/98e21116972c84c51c6b757e5eb9dda8.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="etapa ">
                <div class="card genero">
                    <img src="./../assets/images/icons/male.svg" class="genderMale" alt="genero">
                    <img src="./../assets/images/icons/female.svg" alt="genero">
                </div>
                <div class="card etapaAtu">
                    <img src="./../assets/images/icons/comb-color.svg" alt="cabelo">
                </div>
                <div class="card">
                    <img src="./../assets/images/icons/shirt.svg" alt="roupa">
                </div>
            </div>
            <form action="../controller/insertAvatar.php" method="post" onchange="atualizarImagemCabelo()">

                <div class="containerOpcoes">
                    <?php foreach ($cabelo as $cabelos) : ?>
                        <div class="opcoes opcoes-cabelo">
                            <input required type="radio" name="cabelo" class="input-opcao" value="<?php echo $cabelos['codCabelo'] ?>" data-img="<?php echo $cabelos["imgCabelo"] ?>">
                            <img src="../assets/images/perfil/cabelo/<?php echo $cabelos["imgCabelo"] ?>" alt="base">
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="avancar">
                    <input type="hidden" name="codUser" value="<?php echo $codUser['codPerfil'] ?>">
                    <input type="hidden" name="itemAvatar" value="cabelo">
                    <button type="submit">Proximo</button>
                </div>
            </form>

        <?php elseif ($_GET['status'] == 'roupa') :  ?>
            <div class="containerAvatar">
                <div class="cardItem">
                    <div class="base">
                        <img src="../assets/images/perfil/genero/<?php echo $avatar["imgGenero"] ?>" alt="">
                        <div class="cabelo">
                            <img src="../assets/images/perfil/cabelo/<?php echo $avatar["imgCabelo"] ?>" alt="">
                        </div>
                        <div class="roupa">
                            <img id="cod" src="../assets/images/perfil/roupa/4d1465f52d3637e2d5d2c1b7ace4c7d7.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="etapa">
                <div class="card genero ">
                    <img src="./../assets/images/icons/male.svg" class="genderMale" alt="genero">
                    <img src="./../assets/images/icons/female.svg" alt="genero">
                </div>
                <div class="card ">
                    <img src="./../assets/images/icons/comb.svg" alt="cabelo">
                </div>
                <div class="card etapaAtu">
                    <img src="./../assets/images/icons/shirt-color.svg" alt="roupa">
                </div>
            </div>
            <form action="../controller/insertAvatar.php" method="post" onchange="atualizarImagemRoupa()">

                <div class="containerOpcoes">
                    <?php foreach ($roupa as $roupas) : ?>
                        <div class="opcoes opcoes-cabelo">
                            <input required type="radio" name="roupa" class="input-opcao" value="<?php echo $roupas['codRoupa'] ?>" data-img="<?php echo $roupas["imgRoupa"] ?>">
                            <img src="../assets/images/perfil/roupa/<?php echo $roupas["imgRoupa"] ?>" alt="base">
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="avancar">
                    <input type="hidden" name="codUser" value="<?php echo $codUser['codPerfil'] ?>">
                    <input type="hidden" name="itemAvatar" value="roupa">
                    <button type="submit">Proximo</button>
                </div>
            </form>


            <!-- <div class="conteinerImg">
                <div class="cardItem">
                    <div class="base">
                        <img src="../assets/images/perfil/genero/<?php echo $avatar["imgGenero"] ?>" alt="">
                        <div class="cabelo">
                            <img src="../assets/images/perfil/cabelo/<?php echo $avatar["imgCabelo"] ?>" alt="">
                        </div>
                        <div class="roupa">
                            <img id="cod" src="../assets/images/perfil/roupa/4d1465f52d3637e2d5d2c1b7ace4c7d7.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="conteinerOpcoes">
                <form action="../controller/insertAvatar.php" method="post" onchange="atualizarImagemRoupa()">
                    <button type="submit">Proximo</button>
                    <?php
                    foreach ($roupa as $roupas) : ?>
                        <div class="opcoes">
                            <input required type="radio" name="roupa" class="input-opcao" value="<?php echo $roupas['codRoupa'] ?>" data-img="<?php echo $roupas["imgRoupa"] ?>">
                            <img src="../assets/images/perfil/roupa/<?php echo $roupas["imgRoupa"] ?>" alt="base">
                        </div>
                    <?php endforeach; ?>
                    <input type="hidden" name="codUser" value="<?php echo $codUser['cod'] ?>">
                    <input type="hidden" name="itemAvatar" value="roupa">
                </form>
            </div> -->
        <?php else :
            AcessoUsuarioDao::insert($codUser);
            header('Location: ../views/home.php');
        endif ?>

    </div>
</body>

</html>