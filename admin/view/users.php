<?php
// session
session_start();
// verificação se o user esta logado
if (!isset($_SESSION['authAdmin'])) {
    // caso não esteja, redirecione a login e indique que para realizar o login
    header("Location: ./index.php?erro2");
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Illumi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador | Usuários</title>
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
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome de usuário</th>
                        <th>Senha</th>
                        <th>E-mail</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $usuario) : ?>
                        <tr>
                            <td><?php echo $usuario['codUsuario'] ?></td>
                            <td><?php echo $usuario['nomeUsuario'] ?></td>
                            <td><?php echo $usuario['senhaUsuario'] ?></td>
                            <td><?php echo $usuario['emailUsuario'] ?></td>
                            <td>
                                <div class="btn-action">
                                    <button type="submit" class="openBlockUser block" data-id="<?php echo $usuario['codUsuario'] ?>">
                                        <img src="../assets/images/icons/ban-svgrepo-com 1.png" alt="">
                                    </button>
                                    <?php include('../view/components/modalBlockUser.php'); ?>
                                    <button type="button" class="openEditUser edit" data-id="<?php echo $usuario['codUsuario'] ?>">
                                        <img src="../assets/images/icons/Vector.png" alt="">
                                    </button>

                                    <?php include('../view/components/editAccountModal.php'); ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>

    <script src="../assets/javascript/modais.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Seleciona todos os botões "Editar usuário" e adiciona um evento de clique a cada um
            document.querySelectorAll('.openEditUser').forEach(function(button) {
                button.addEventListener('click', function() {
                    // Captura o ID do usuário associado ao botão clicado
                    const userId = this.dataset.id;

                    // Seleciona o modal "Editar usuário" correspondente ao usuário
                    const modalEditUser = document.getElementById('modalEditUser_' + userId);

                    // Exibe o modal
                    modalEditUser.style.display = 'flex';
                });
            });

            // Adiciona um evento de clique ao botão de fechar o modal de edição de usuário
            document.querySelectorAll('.modalEditInfo #close').forEach(function(button) {
                button.addEventListener('click', function() {
                    // Oculta o modal
                    this.closest('.modalEditInfo').style.display = 'none';
                });
            });
        });
    </script>

</body>

</html>