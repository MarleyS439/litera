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

require('../../dao/PerfilDao.php');
$usuarios = PerfilDao::selectAll();

?>
<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Illumi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../admin/assets/css/admin.css">
    <link rel="shortcut icon" href="../../assets/images/icons/favicon.ico" type="image/x-icon">
    <title>Administrador | Usuários</title>
</head>

<body>

    <div class="sides">
        <?php include('../view/components/sidebar-admin.php'); ?>
        <div class="information">

            <div class="title">
                <h2>Usuários cadastrados</h2>
            </div>

            <!-- Caixa de pesquisa de usuários -->
            <div class="search-container">
                <div class="ce">
                    <span class="title-search">
                        <span>Pesquisar</span>
                        <img src="../assets/images/icons/search-svgrepo-com.svg" alt="">
                    </span>
                    <input type="text" id="searchInput" class="input-search" placeholder="Nome, E-mail e ID" onkeyup="searchUsers()">
                </div>

                <div class="">
                    <span>Filtrar</span>
                    <select name="filtro" id="status" onchange="filterUsers()">
                        <option value="Todos">Todos</option>
                        <option value="Ativo">Ativos</option>
                        <option value="Banido">Banidos</option>
                    </select>
                </div>
            </div>


            <!-- Tabela de listagem de usuários -->
            <table>
                <thead>
                    <tr>
                        <th># </th>
                        <th>Nome do Usuário</th>
                        <th>Nome do Responsável</th>
                        <th>Pontuação</th>
                        <th>Dinheiro</th>
                        <th>Nível</th>
                        <th>Status</th>
                        <th>Ação</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($usuarios as $usuario) : ?>
                        <tr>
                            <td><?php echo $usuario['codPerfil'] ?></td>
                            <td><?php echo $usuario['nomePerfil'] ?></td>
                            <td><?php echo $usuario['nomeUsuario'] ?></td>
                            <td><?php echo $usuario['pontuacaoPerfil'] ?></td>
                            <td><?php echo $usuario['dinheiroPerfil'] ?></td>
                            <td><?php echo $usuario['nivel'] ?></td>
                            <td><?php echo ($usuario['banido'] != 0) ? "Banido" : "Ativo"; ?></td>
                            <td class="action">
                                <div class="btn-action">
                                    <?php if (!$usuario['banido']) : ?>
                                        <button type="submit" class="openBlockUser block banir" data-id="<?php echo $usuario['codUsuario'] ?>">
                                            <img src="../assets/images/icons/ban-svgrepo-com 1.png" alt="block">
                                        </button>
                                    <?php else : ?>

                                        <button type="submit" class="openBlockUser block banir-refazer" data-id="<?php echo $usuario['codUsuario'] ?>">
                                            <img src="../assets/images/icons/check.svg" alt="block">
                                        </button>
                                    <?php endif; ?>

                                    <?php include('../view/components/modalBlockUser.php'); ?>
                                    <button type="button" class="openEditUser edit" data-id="<?php echo $usuario['codUsuario'] ?>">
                                        <img src="../assets/images/icons/Vector.png" alt="edit">
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
    <script src="../assets/javascript/search.js"></script>

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