document.addEventListener('DOMContentLoaded', function() {
  // Adiciona um evento de clique ao botão para abrir o modal de inserção
  var openModalButton = document.getElementById('openModal');
  var createAchivimenteModal = document.getElementById('createAchivimenteModal');

  openModalButton.addEventListener('click', function() {
      // Exibe o modal de inserção
      createAchivimenteModal.style.display = 'block';
  });

  // Adiciona um evento de clique ao botão de fechar o modal de inserção
  var closeModalButton = document.getElementById('closeModal');
  closeModalButton.addEventListener('click', function() {
      // Oculta o modal de inserção
      createAchivimenteModal.style.display = 'none';
  });
});
