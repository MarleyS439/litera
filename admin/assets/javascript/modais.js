document.addEventListener('DOMContentLoaded', function () {
    // Seleciona todos os botões "Banir usuário" e adiciona um evento de clique a cada um
    document.querySelectorAll('.openBlockUser').forEach(function (button) {
        button.addEventListener('click', function () {
            // Captura o ID do usuário associado ao botão clicado
            const userId = this.dataset.id;

            // Seleciona o modal "Banir usuário" correspondente ao usuário
            const modalBlockUser = document.getElementById('modalBlockUser_' + userId);

            // Preenche o ID do usuário no modal
            modalBlockUser.querySelector('#userIdSpan').innerText = userId;
            modalBlockUser.querySelector('#userIdToDelete').value = userId;
            modalBlockUser.querySelector('input[name="codUsuario"]').value = userId;

            // Exibe o modal
            modalBlockUser.style.display = 'flex';
        });
    });

    // Adiciona um evento de clique ao botão "Não" dentro de todos os modais "Banir usuário"
    document.querySelectorAll('.modal #negative').forEach(function (button) {
        button.addEventListener('click', function () {
            // Oculta o modal
            this.closest('.modal').style.display = 'none';
        });
    });

    // Seleciona todos os botões "Editar usuário" e adiciona um evento de clique a cada um
    document.querySelectorAll('.openEditUser').forEach(function (button) {
        button.addEventListener('click', function () {
            // Captura o ID do usuário associado ao botão clicado
            const userId = this.dataset.id;

            // Seleciona o modal "Editar usuário" correspondente ao usuário
            const modalEditUser = document.getElementById('modalEditUser');

            // Exibe o modal
            modalEditUser.style.display = 'flex';
        });
    });

    // Adiciona um evento de clique ao botão de fechar o modal de edição de usuário
    document.querySelectorAll('.modalEditInfo #close').forEach(function (button) {
        button.addEventListener('click', function () {
            // Oculta o modal
            this.closest('.modalEditInfo').style.display = 'none';
        });
    });
});
