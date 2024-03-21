<?php
    // select para pegar todos os dados
    $usuarios = UsuarioDao::selectById($usuario['codUsuario']);
    // variaveis para que o nome e o email apareção
    $nome_user = $usuarios['nomeUsuario'];
    $email_user = $usuarios['emailUsuario'];
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
            <h3>Alterar conta</h3>
        </div>
        <div class="item-form-edit">
            <input type="hidden" value="<?php echo ($usuario['codUsuario'])?>" name="codUsuario" id="codUsuario">
            <input type="hidden" value="update" id="acao" name="acao">
        </div>
        <div class="item-form-edit">
            <label for="">Nome de usuário</label>
            <input type="text" name="name_user" id="name_user" placeholder="nameuseer" value="<?=$nome_user?>" required>
        </div>

        <div class="item-form-edit">
            <label for="">E-mail</label>
            <input type="email" name="email_user" id="email_user" placeholder="email@email.com"value="<?=$email_user?>" required>
        </div>

        <div class="item-form-edit">
            <label for="">Senha</label>
            <input type="password" name="passwd_user" id="passwd_user" placeholder="Senha" required>
        </div>
        <div class="item-form-edit">
            <label for="">Confirmar senha</label>
            <input type="password" name="confirm_passwd_user" id="confirm_passwd_user" placeholder="COnfirmação da senha" required>
        </div>
        <div class="item-form-edit  btn-s">
            <button type="submit">Confirmar alterações</button>
        </div>
    </form>
</div>