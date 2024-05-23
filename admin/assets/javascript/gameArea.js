let container = document.getElementById('container');
container.style.display = 'none';

const selectJogo = document.getElementById('select-jogo');
const valorSelecionado = selectJogo.options[selectJogo.selectedIndex].text;

// Adicionando o valor selecionado como texto ao elemento com o ID 'teste'
const teste = document.getElementById('teste');