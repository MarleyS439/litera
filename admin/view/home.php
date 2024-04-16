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

?>
<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Illumi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador | Home</title>
    <link rel="shortcut icon" href="../assets/images/icons/Litera Icon2.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../admin/assets/css/users.css">
</head>

<body>
    <div class="topo">
        <?php
        include('../view/components/topbar.php');
        ?>
    </div>

    <div class="sides">
        <?php
        include('../view/components/sidebar.php');
        ?>
        <div class="information">
            <div class="title">
                <h2>Usuários cadastrados</h2>
            </div>
            <!-- Nesta table, deve ser feito um foreach para resgatar os usuários cadastrados.-->
        </div>
</body>

</html>