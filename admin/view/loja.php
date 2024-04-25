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

require('../../dao/cabeloDao.php');
require('../../dao/generoDao.php');
require('../../dao/roupaDao.php');
$cabelo = CabeloDao::selectAll();
$roupa = RoupaDao::selectAll();
$genero = GeneroDao::selectAll();

?>
<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Illumi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../assets/images/icons/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../admin/assets/css/admin.css">
    <link rel="stylesheet" href="../../admin/assets/css/sidebar-admin.css">

    <title>Administrador | Loja</title>
</head>

<body>
    <div class="sides">
        <?php include('../view/components/sidebar-admin.php'); ?>

        <div class="information">
            <div class="information-home">
                <div class="flex-title">
                    <div class="btn-addArea">
                        <button type="button" class="btn-addItem" id="btnOpenModal">
                            <span>Adicionar novo item</span>
                        </button>
                        <script src="../assets/javascript/modalStore.js"></script>
                    </div>
                    <div class="title">
                        <h2>Itens Loja</h2>
                    </div>
                    <div>
                        <select id="" onchange="mostrarOpcao()">
                            <option value="">Tudo</option>
                            <option value="">Cabelos</option>
                            <option value="">Roupas</option>
                            <option value="">Peles</option>
                        </select>
                    </div>
                </div>
                <div class="modalAreaCenter">
                    <?php require_once('./components/modal.php'); ?>
                </div>

                <div class="container-loja">
                    <div class="container-cards">

                        <?php
                        foreach ($cabelo as $cabelos) : ?>
                            <div class="cards">
                                <img src="../../assets/images/perfil/cabelo/<?php echo $cabelos["imgCabelo"] ?>" alt="cabelios salvos">
                                <p><?php echo $cabelos['nomeCabelo'] ?></p>
                            </div>
                        <?php endforeach; ?>
                        <?php
                        foreach ($roupa as $roupas) : ?>
                            <div class="cards">
                                <img src="../../assets/images/perfil/roupa/<?php echo $roupas["imgRoupa"] ?>" alt="cabelios salvos">
                                <p><?php echo $roupas['nomeRoupa'] ?></p>
                            </div>
                        <?php endforeach; ?>
                        <?php
                        foreach ($genero as $generos) : ?>
                            <div class="cards">
                                <img src="../../assets/images/perfil/genero/<?php echo $generos["imgGenero"] ?>" alt="cabelios salvos">
                                <p><?php echo $generos['nomeGenero'] ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>


</body>

</html>