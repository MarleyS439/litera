<?php
// variavel para todas as informaçoes do usuario
require_once "../dao/usuarioDao.php";
require_once "../dao/perfilDao.php";

// session
session_start();
// verificação se o user esta logado
if (!isset($_SESSION['authUser'])) {
    // caso não esteja, redirecione a login e indique que para realizar o login
    header("Location: ./login.php?status=erro2");
    exit();
}
$codUser = $_SESSION['authUser'];
$perfis = PerfilDao::selectByIdUser($codUser['cod']);
$usuarioAutenticado = UsuarioDao::selectById($codUser['cod']);
$qntdPerfil = PerfilDao::countById($codUser['cod']);
// verificar se o user esta banido
if ($usuarioAutenticado['banido'] != 0) {
    // caso não esteja, redirecionar a login e indique que o user foi banido
    header("Location: ./login.php?status=erro3");
    exit();
}
if ($_SESSION['authUser'] == null) {
    header('Location: ./login.php?status=erro4');
}
// var_dump($perfil);
?>
<<<<<<< HEAD

=======
<!DOCTYPE html>
>>>>>>> 9c9f2cbba128a78a7e42e0aeeb3d3d8c75294a59
<html lang="pt-BR" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Illumi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Litera | Criar perfil</title>
    <link rel="shortcut icon" href="../assets/images/icons/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/register-child.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <link rel="stylesheet" href="../assets/css/slick.css">
</head>

<body>

    <!--Sbreposição de corpo da página-->
    <!--<div class="overlay"></div>-->

    <!--Container de perfil-->
    <div class="container">

        <!--Logo Litera-->
        <div class="arara">
            <img src="../assets/images/arara 2.svg" alt="">
            <h2>Litera</h2>
        </div>

        <!--Container de adição e gerenciamento de perfis-->
        <div class="container-add-profile">
            <?php if (is_array($perfis) && !empty($perfis)) { ?>
                <div class="title-form">
                    <h2 id="h2">Escolha um perfil</h2>
                </div>
            <?php } else { ?>

                <!--Faz verificação se não há perfil e indica criar um caso a quantidade de perfis seja 0-->
                <div class="title-form">
                    <h2 id="h2">Parece que ainda não há um perfil, vamos criar um?</h2>
                </div>
            <?php } ?>


            <!--Caixa de perfis -->
            <div class="box-perfil">
                <div class="cards-perfil">
                    <?php if (is_array($perfis) && !empty($perfis)) :
                        foreach ($perfis as $perfil) : ?>

                            <div class="cards">
                                <div class="overlay-card" id="card-modal">
                                    <img src="../assets/images/icons/edit-svgrepo-com.svg" alt="">
                                </div>

                                <input type="hidden" value="<?php echo $perfil['codPerfil'] ?>" class="cod-usuario-hidden-input">

                                <a href="../controller/conectionPerfil.php?id=<?php echo $perfil['codPerfil']; ?>&coduser=<?php echo $codUser['cod'] ?>">

                                    <img src="../assets/images/icons/<?php echo $perfil['iconPerfil'] ?>" alt="">
                                    <p><?php echo $perfil['nomePerfil']; ?></p>

                                </a>
                            </div>
                    <?php endforeach;
                    endif; ?>
                </div>

                <!--Faz a verificação se há a possibilidade de adicionar mais perfis-->
                <?php if ($qntdPerfil < 5) { ?>
                    <div class="add">
                        <button type="submit" id="addProfile" title="Criar um novo perfil">
                            <span>+ Adicionar</span>
                        </button>
                    </div>
                <?php }; ?>
            </div>
        </div>
    </div>

    <!-- Modal de adicionar perfil -->
    <div class="modal-add-profile" id="modalAddProfile">
        <div class="title-modal">
            <p>Adicionar perfil</p>
        </div>

        <div class="">
            <form action="../controller/processRegisterPerfis.php" method="post">

                <!-- cod do usuario responsavel -->
                <input type="hidden" value="<?php echo $codUser['cod'] ?>" name="codUser">

                <div class="inputs-modal">
                    <label for="nome_perfil">Nome</label>
                    <input type="text" name="nome_perfil" id="nome_perfil" placeholder="Ex.: João">
                </div>

                <div class="two">
                    <div class="inpu">
                        <label for="data_nasc">Data de nascimento</label>
                        <input type="date" name="data_nasc" id="data_nasc">
                    </div>

                    <div class="inpu">
                        <label for="genero">Gênero</label>
                        <select name="genero" id="genero">
                            <option value="null">-</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Feminino">Feminino</option>
                            <option value="nao-definir">Não definir</option>
                        </select>
                    </div>
                </div>

                <div class="profile-select-icon">
                    <div class="title-profile-select">
                        <p>Selecione a foto de perfil</p>
                    </div>

                    <input type="hidden" name="imagem_perfil" id="imagem_perfil">


                    <div class="select-icon carrossel">

                        <div class="icon">
                            <input type="radio" name="avatar" class="input-icon-avatar" value="Frame 190.png">
                            <img src="../assets/images/icons/Frame 190.png" class="icons-image" alt="">
                        </div>
                        <div class="icon">
                            <input type="radio" name="avatar" class="input-icon-avatar" value="Frame 196.png" checked>
                            <img src="../assets/images/icons/Frame 196.png" class="icons-image" alt="">
                        </div>
                        <div class="icon">
                            <input type="radio" name="avatar" class="input-icon-avatar" value="Frame 197.png">
                            <img src="../assets/images/icons/Frame 197.png" class="icons-image" alt="">
                        </div>
                        <div class="icon">
                            <input type="radio" name="avatar" class="input-icon-avatar" value="Frame 198.png">
                            <img src="../assets/images/icons/Frame 198.png" class="icons-image" alt="">
                        </div>
                    </div>
                </div>

                <div class="inputs-modal-buttom">
                    <button type="button" id="cancelAddProfile" title="Cancelar">
                        <p>Cancelar</p>
                    </button>

                    <button type="submit" class="salvar-btn">Adicionar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal para editar o perfil -->
    <div class="modal-edit-profile" id="modalEditProfile">

        <div class="title-modal">
            <p>Configurar perfil</p>
        </div>

        <div class="">
            <form action="../controller/processRegisterPerfis.php">
                <input type="hidden" value="<?php echo $codUser['cod'] ?>" name="codUser">

                <input id="edit-name-input" name="passw_user" type="hidden" value="<?php echo isset($codUser['pontuacaoPerfil']) ? $codUser['pontuacaoPerfil'] : '' ?>">
                <input id="edit-name-input" name="passw_user" type="hidden" value="<?php echo isset($codUser['dinheiroPerfil']) ? $codUser['dinheiroPerfil'] : '' ?>">
                <input id="edit-name-input" name="passw_user" type="hidden" value="<?php echo isset($codUser['tutorial']) ? $codUser['tutorial'] : '' ?>">
                <input id="edit-name-input" name="passw_user" type="hidden" value="<?php echo isset($codUser['nivel']) ? $codUser['nivel'] : '' ?>">
                <input id="edit-name-input" name="passw_user" type="hidden" value="<?php echo isset($codUser['fasesConcluidas']) ? $codUser['fasesConcluidas'] : '' ?>">

                <div class="edit-box">

                    <div class="imgBox">
                        <image id="edit-icon-input" src="../assets/images/perfil/<?php echo isset($codUser['iconPerfil']) ?>">
                    </div>

                    <div class="infoP">

                        <label for="">Nome:</label>
                        <input id="nome_perfil" name="nome_perfil" type="text" placeholder="<?php echo isset($codUser['nomePerfil']) ? $codUser['nomePerfil'] : '' ?>">

                        <label for="">Data de Nascimento</label>
                        <input id="edit-birth-input" name="data_nasc" type="text" value="<?php echo isset($codUser['dataNasc']) ? $codUser['dataNasc'] : '' ?>">

                        <label for="">Gênero</label>
                        <input id="edit-gender-input" name="genero_user" type="text" value="<?php echo isset($codUser['generoPerfil']) ? $codUser['generoPerfil'] : '' ?>">


                        <div class="inputs-modal-buttom">
                            <button type="button" id="cancelEditProfile" title="Cancelar">
                                <p>Cancelar</p>
                            </button>

                            <button type="submit" value="Alterar">Editar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <!--Gerenciar perfis-->
    <div class="configs">
        <button class="edit-perfil" id="open-edit">
            <span>Gerenciar Perfis</span>
        </button>

    <!--Fazer logout-->
        <a href="../controller/logoutProfile.php" class="logoutBtn">
            <img src="../assets/images/icons/exit-svgrepo-com.svg" alt="">
            <span>Sair</span>
        </a>
    </div>
    

    <!--Javascripts-->
    <script src="../assets/javascript/modal-edit-profile.js"></script>
    <script src="../assets/javascript/modal-add-profile.js"></script>
</body>

</html>
