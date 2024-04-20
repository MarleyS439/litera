<div class="modal" id="modalBlockUser_<?php echo $usuario['codUsuario']; ?>">

    <div class="modal-content">
        <?php if (!$usuario['banido']) : ?>
            <div class="title-modal">
                <h3>Banir usuário</h3>
            </div>
            <p>Deseja realmente banir o usuário ID(<span id="userIdSpan"><?php echo $usuario['codUsuario']; ?></span>)?</p>
            <p id="notice">Este usuário não poderá mais utilizar o Litera</p>
        <?php else : ?>
            <div class="title-modal">
                <h3>Desbanir usuário</h3>
            </div>
            <p>Deseja realmente desbanir o usuário ID(<span id="userIdSpan"><?php echo $usuario['codUsuario']; ?></span>)?</p>
            <p id="notice">Este usuário poderá voltar a utilizar o Litera</p>
        <?php endif; ?>
    </div>

    <div class="actions-btn">
        <form action="../controller/processingUser.php" method="POST">
            <input type="hidden" value="<?php echo $usuario['codUsuario']; ?>" name="codUsuario" id="codUsuario">
            <?php if (!$usuario['banido']) : ?>
                <input type="hidden" value="suspend" id="acao" name="acao">
                <input type="hidden" id="userIdToDelete" name="userIdToDelete">
                <button type="submit" id="positive">Sim, banir</button>
            <?php else : ?>
                <input type="hidden" value="Unbanned" id="acao" name="acao">
                <input type="hidden" id="userIdToDelete" name="userIdToDelete">
                <button type="submit" id="refazer">Desbanir</button>
            <?php endif; ?>
            <button type="button" id="negative" class="aaaaa" onclick="closeModalBlockUser()">Não</button>
        </form>
    </div>
</div>
