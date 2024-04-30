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
?>
<!-- inport das img  -->
<?php
require('../dao/cabeloDao.php');
require('../dao/generoDao.php');
require('../dao/roupaDao.php');
require('../dao/AvatarDao.php');
$cabelo = CabeloDao::selectAll();
$roupa = RoupaDao::selectAll();
$genero = GeneroDao::selectAll();
$avatar = AvatarDao::selectByIdUser($codUser['cod']);
// var_dump($avatar)
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
        <?php if ($_GET['status'] == 'base') :  ?>
            <div class="containerAvatar">
                <div class="cardItem">
                    <div class="base">
                        <img id="cod" src="../assets/images/perfil/genero/fb5d1c27ff697dffa11ced29aa15fe13.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="etapa">
                <div class="card etapaAtu">
                    <img src="#" alt="genero">
                </div>
                <div class="card">
                    <img src="#" alt="cabelo">
                </div>
                <div class="card">
                    <img src="#" alt="roupa">
                </div>
            </div>
            <form action="../controller/insertAvatar.php" method="post" onchange="atualizarImagemBase()">
                <div class="avancar">
                    <input type="hidden" name="codUser" value="<?php echo $codUser['cod'] ?>">
                    <input type="hidden" name="itemAvatar" value="base">
                    <button type="submit">Proximo</button>
                </div>
                <div class="containerOpcoes">
                    <?php foreach ($genero as $generos) : ?>
                        <div class="opcoes">
                            <input required type="radio" name="genero" class="input-opcao" value="<?php echo $generos['codGenero'] ?>" data-img="<?php echo $generos["imgGenero"] ?>">
                            <img src="../assets/images/perfil/genero/<?php echo $generos["imgGenero"] ?>" alt="base">
                        </div>
                    <?php endforeach; ?>
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
            <div class="etapa">
                <div class="card ">
                    <img src="#" alt="genero">
                </div>
                <div class="card etapaAtu">
                    <img src="#" alt="cabelo">
                </div>
                <div class="card">
                    <img src="#" alt="roupa">
                </div>
            </div>
            <form action="../controller/insertAvatar.php" method="post" onchange="atualizarImagemCabelo()">
                <div class="avancar">
                    <input type="hidden" name="codUser" value="<?php echo $codUser['cod'] ?>">
                    <input type="hidden" name="itemAvatar" value="cabelo">
                    <button type="submit">Proximo</button>
                </div>
                <div class="containerOpcoes">
                    <?php foreach ($cabelo as $cabelos) : ?>
                        <div class="opcoes opcoes-cabelo">
                            <input required type="radio" name="cabelo" class="input-opcao" value="<?php echo $cabelos['codCabelo'] ?>" data-img="<?php echo $cabelos["imgCabelo"] ?>">
                            <img src="../assets/images/perfil/cabelo/<?php echo $cabelos["imgCabelo"] ?>" alt="base">    
                        </div>
                    <?php endforeach; ?>
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
                <div class="card ">
                    <img src="#" alt="genero">
                </div>
                <div class="card ">
                    <img src="#" alt="cabelo">
                </div>
                <div class="card etapaAtu">
                    <img src="#" alt="roupa">
                </div>
            </div>
            <form action="../controller/insertAvatar.php" method="post" onchange="atualizarImagemRoupa()">
                <div class="avancar">
                    <input type="hidden" name="codUser" value="<?php echo $codUser['cod'] ?>">
                    <input type="hidden" name="itemAvatar" value="roupa">
                    <button type="submit">Proximo</button>
                </div>
                <div class="containerOpcoes">
                    <?php  foreach ($roupa as $roupas) : ?>
                        <div class="opcoes opcoes-cabelo">
                            <input required type="radio" name="roupa" class="input-opcao" value="<?php echo $roupas['codRoupa'] ?>" data-img="<?php echo $roupas["imgRoupa"] ?>">
                            <img src="../assets/images/perfil/roupa/<?php echo $roupas["imgRoupa"] ?>" alt="base">
                        </div>
                    <?php endforeach; ?>
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
            header('Location: ../views/home.php');
        endif ?>

    </div>
</body>

</html>