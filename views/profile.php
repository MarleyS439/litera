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
$perfil = PerfilDao::selectByIdUser($codUser['cod']);
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
<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
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
    <div class="overlay"></div>
    <div class="container">
        <div class="arara">
            <img src="../assets/images/arara 2.svg" alt="">
            <h2>Litera</h2>
        </div>

        <div class="container-add-profile">
            <?php if (is_array($perfil) && !empty($perfil)) { ?>
                <div class="title-form">
                    <h2 id="h2">Escolha um perfil</h2>
                </div>
            <?php } else { ?>

                <div class="title-form">
                    <h2 id="h2">Parece que ainda não há um perfil, vamos criar um?</h2>
                </div>
            <?php } ?>
            <div class="box-perfil">
                <div class="cards-perfil">
                <?php if (is_array($perfil) && !empty($perfil)) : ?>
                    <?php foreach ($perfil as $perfils) : ?>
                        <!-- <?php var_dump($perfils) ?> -->
                        <div class="cards">
                            <a href="../controller/conectionPerfil.php?id=<?php echo $perfils['codPerfil'];?>&coduser=<?php echo $codUser['cod']?>">
                                <img src="../assets/images/icons/<?php echo $perfils['iconPerfil'] ?>" alt="">
                                <p><?php echo $perfils['nomePerfil']; ?></p>
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                </div>
                <?php if($qntdPerfil <5) {?>
                    <div class="add">
                        <button type="submit" id="addProfile" title="Criar um novo perfil">
                            <img src="../assets/images/icons/addbtn.png" alt="">
                        </button>
                    </div>                  
                <?php }; ?>
            </div>
        </div>
        
        


            <!-- Modal de adicionar perfil -->
            <div class="modal-add-profile" id="modalAddProfile">

                <div class="cancel">
                    <button type="button" id="cancelAddProfile" title="Cancelar">
                        <img src="../assets/images/icons/cancel-img.png" alt="">
                    </button>
                </div>

                <div class="title-modal">
                    <p>Adicionar perfil</p>
                </div>

                <div class="">
                    <form action="../controller/processRegisterPerfis.php" method="post">
                        <!-- cod do usuario responsavel -->
                        <input type="hidden" value="<?php echo $codUser['cod'] ?>" name="codUser">
                        <div class="inputs-modal">
                            <label for="nome_perfil">Nome</label>
                            <input type="text" name="nome_perfil" id="nome_perfil" placeholder="João">
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
                            <button type="submit" class="salvar-btn">Adicionar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="../assets/javascript/modal-add-profile.js"></script>
</body>

</html>