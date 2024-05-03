document.addEventListener('DOMContentLoaded', function () {
    // Obtém o botão "Adicionar novo item"
    var btnOpenModal = document.getElementById('btnOpenModal');

    // Obtém o modal "Adicionar item"
    var modalAddItem = document.getElementById('modalAddItem');

    // Obtém o elemento <span> que fecha o modal
    var span = modalAddItem.querySelector('.close');

    // Quando o usuário clicar no botão, abre o modal
    btnOpenModal.onclick = function () {
        modalAddItem.style.display = "block";
    }

    // Quando o usuário clicar no <span> (x), fecha o modal
    span.onclick = function () {
        modalAddItem.style.display = "none";
    }

    // Quando o usuário clicar em qualquer lugar fora do modal, fecha o modal
    window.onclick = function (event) {
        if (event.target == modalAddItem) {
            modalAddItem.style.display = "none";
        }
    }
});
