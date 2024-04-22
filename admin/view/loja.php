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
                </div>
                <div class="modalAreaCenter">
                    <?php require_once('./components/modal.php'); ?>
                </div>
                <div class="container-loja">
                    <div class="card-container">
                        <h4>Sem dados</h4>
                        <div class="card">
                            <p class="font-card"></p>
                        </div>
                    </div>
                    <div class="card-container">
                        <h4>Sem dados</h4>
                        <div class="card">
                            <p class="font-card"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</body>

</html>