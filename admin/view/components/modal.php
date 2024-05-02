<div class="modalEditInfo" id="modalAddItem">
    <form action="../controller/processingItem.php" method="POST" enctype="multipart/form-data">
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
                <img id="preview" title="item a ser cadastrado" alt="Preview da imagem" class="image-size">
            </div>
            <div class="area-form-input">
                <div class="input-area">
                    <label for="nomeItem">Nome do Item</label>
                    <input type="text" name="nomeItem" id="nomeItem" placeholder="Nome do Item" required>
                </div>
                
                <div class="input-area">
                    <label for="precoItem">Preço</label>
                    <input type="number" name="precoItem" id="precoItem" value="0" required>
                </div>
                
                <div class="input-area">
                    <label for="tipoItem">Tipo do Item</label>
                    <select name="tipoItem" id="tipoItem" class="opcoes">
                        <option value="Cabelo">Cabelo</option>
                        <option value="Roupa" selected>Roupa</option>
                        <option value="Genero">Genero</option>
                    </select>
                </div>
                
                <div class="input-area">
                    <label for="foto">Escolha uma imagem</label>
                    <input type="file" id="foto" name="foto" accept="image/*" class="custom-file-input" required>
                    <input type="hidden" name="nomeFoto" id="nomeFoto">
                </div>
                
                <div class="item-form-edit btn-s">
                    <button type="submit" class="btn-modal-addItem">Confirmar</button>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="../assets/javascript/image.js"></script>