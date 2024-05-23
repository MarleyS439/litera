// Função para atualizar a imagem da base do avatar quando uma opção é selecionada
function atualizarImagemBase() {
    var imagemBase = document.getElementById('cod');
    var opcoes = document.getElementsByName('genero');

    // Iterar sobre as opções e verificar qual está selecionada
    for (var i = 0; i < opcoes.length; i++) {
        if (opcoes[i].checked) {
            // Quando encontrarmos a opção selecionada, atualizamos a imagem da base
            imagemBase.src = '../assets/images/perfil/genero/' + opcoes[i].getAttribute('data-img');
            break;
        }
    }
}
function atualizarImagemCabelo() {
    var imagemBase = document.getElementById('cod');
    var opcoes = document.getElementsByName('cabelo');

    // Iterar sobre as opções e verificar qual está selecionada
    for (var i = 0; i < opcoes.length; i++) {
        if (opcoes[i].checked) {
            // Quando encontrarmos a opção selecionada, atualizamos a imagem da base
            imagemBase.src = '../assets/images/perfil/cabelo/' + opcoes[i].getAttribute('data-img');
            break;
        }
    }
}
function atualizarImagemRoupa() {
    var imagemBase = document.getElementById('cod');
    var opcoes = document.getElementsByName('roupa');

    // Iterar sobre as opções e verificar qual está selecionada
    for (var i = 0; i < opcoes.length; i++) {
        if (opcoes[i].checked) {
            // Quando encontrarmos a opção selecionada, atualizamos a imagem da base
            imagemBase.src = '../assets/images/perfil/roupa/' + opcoes[i].getAttribute('data-img');
            break;
        }
    }
}