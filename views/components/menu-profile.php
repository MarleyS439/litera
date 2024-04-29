<?php
require_once "../dao/compraItemDao.php";
require('../dao/AvatarDao.php');
$codUser = $_SESSION['authUser'];
$avatar = AvatarDao::selectByIdUser($codUser['cod']);

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
$numeroMes = date('n', strtotime($usuarioAutenticado['dataCriacao']));

// Obter o nome do mês em português
$mesPorExtenso = $meses[$numeroMes];


?>
<div class="profile-menu">
    <div class="title-profile-menu">
        <h4>Seu perfil</h4>
    </div>
    <div class="name-user">
        <span><?php echo $usuarioAutenticado['nomeUsuario'] ?></span>
    </div>
    <div class="modalContent">
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
                        <input id="edit-name-input" name="id_user" type="hidden" value="<?php echo ($usuarioAutenticado['codUsuario']) ?>">
                        <input id="edit-name-input" name="email_user" type="hidden" value="<?php echo ($usuarioAutenticado['emailUsuario']) ?>">
                        <input id="edit-name-input" name="passw_user" type="hidden" value="<?php echo ($usuarioAutenticado['senhaUsuario']) ?>">
                        <input id="edit-name-input" name="name_user" type="text" value="<?php echo ($usuarioAutenticado['nomeUsuario']) ?>" required>
                        <button class="save-btn" type="submit">
                            <span>Salvar</span>
                        </button>
                    </div>
                </div>
            </form>
        </dialog>
    </div>
    <!-- <form action="" method="POST" id="modal">
            <input id="campo" type="text" value="<?php echo ($usuarioAutenticado['nome']) ?>" name="nome"> 
            <button id="editar" id="modal" >Editar</button>
            <input type="submit" value="salvar" id="salvar">
    </form> -->

    <div class="avatar-container">
        <div class="base">
            <img src="../assets/images/perfil/genero/<?php echo $avatar["imgGenero"]?>" alt="">
            <div class="cabelo">
                <img src="../assets/images/perfil/cabelo/<?php echo $avatar["imgCabelo"]?>" alt="">
            </div>
            <div class="roupa">
                <img src="../assets/images/perfil/roupa/<?php echo $avatar["imgRoupa"]?>" alt="">
            </div>
        </div>
    </div>
    <div class="infomation-user">
        <div class="enter-coin">
            <span>Entrou em <?php echo ucfirst($mesPorExtenso) ?> de <?php echo explode("-", $usuarioAutenticado['dataCriacao'])[0] ?></span>
            <div class="coins">
                <img src="../assets/images/icons/coin.svg" alt="">
                <span><?php echo $usuarioAutenticado['dinheiroUsuario'] ?></span>
            </div>
        </div>

        <div class="infos">
            <div class="">
                <span>Nível: <?php echo $usuarioAutenticado['nivel'] ?></span>
            </div>

            <div class="">
                <span>Quantidade de itens: <?php echo CompraItemDao::contByIdUser($usuarioAutenticado['codUsuario']) ?></span>
            </div>

            <div class="">
                <span>Melhor desempenho: </span>
            </div>
            <div class="">
                <span>Pontuação Total: <?php echo $usuarioAutenticado['pontuacaoUsuario'] ?></span>
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