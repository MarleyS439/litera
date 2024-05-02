<?php
    // select para pegar todos os dados
    $usuarios = UsuarioDao::selectById($usuario['codUsuario']);
    // variaveis para que o nome e o email apareção
    $dinheiro_user = $usuarios['dinheiroUsuario'];
?>
<div class="modalEditInfo" id="modalEditUser_<?php echo $usuario['codUsuario'] ?>">
    <form action="../controller/processingUser.php" method="POST">
        <div class="close">
            <button type="button" id="close" title="Fechar" onclick="closeModalEditUser()">
                <svg width="25" height="25" style="border-radius: 50%;">
                    <image href="../assets/images/icons/cancel-icon.svg" width="25" height="25" />
                </svg>
            </button>
        </div>

        <div class="title-form-edit">
            <h3>Quantidade de dinheiro</h3>
        </div>
        <div class="item-form-edit">
            <input type="hidden" value="<?php echo ($usuario['codUsuario'])?>" name="codUsuario" id="codUsuario">
            <input type="hidden" value="<?php echo ($usuario['emailUsuario'])?>" name="" id="codUsuario">
            <input type="hidden" value="update" id="acao" name="acao">
        </div>

        <div class="item-form-edit">
            <label for="">Dinheiro</label>
            <input class="modal-input" type="number" name="dinheiro_user" id="dinheiro_user" value="<?=$dinheiro_user?>">
        </div>

        <div class="item-form-edit  btn-s">
            <button type="submit">Confirmar alterações</button>
        </div>
    </form>
</div>