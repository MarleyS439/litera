<div class="modalEditInfo" id="modalAddItem">
    <form action="../controller/processingUser.php" method="POST">
        <div class="title-form-edit">
            <h3>Adicionar item</h3>
        </div>
        <div class="close">
            <button type="button" id="closeModalAddItem" title="Fechar">
                <svg width="25" height="25" style="border-radius: 50%;">
                    <image href="../assets/images/icons/cancel-icon.svg" width="25" height="25" />
                </svg>
            </button>
        </div>

        <div class="container-form-addItem">
            <div class="area-img">
                <!-- <img src="#" alt="icone"> -->
            </div>
            <div class="area-form-input">
                <div class="input-area">
                    <label for="nomeItem">Nome do Item</label>
                    <input type="text" name="nomeItem" id="nomeItem" placeholder="Nome do Item" required>
                </div>

                <div class="input-area">
                    <label for="precoItem">Preço</label>
                    <input type="number" name="precoItem" id="precoItem">
                    <input type="text" name="" id="">
                </div>

                <div class="input-area">
                    <label for="tipoItem">Tipo do Item</label>
                    <select name="tipoItem" id="tipoItem">
                        <option value="Cabelo" selected>Cabelo</option>
                        <option value="Roupa">Roupa</option>
                        <option value="Genero">Genero</option>
                    </select>
                </div>

                <div class="item-form-edit btn-s">
                    <button type="submit">Confirmar alterações</button>
                </div>
            </div>
        </div>
    </form>
</div>