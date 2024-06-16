document.addEventListener('DOMContentLoaded', function () {
    let intervalo;

    /* Array de imagens de animais */
    const animais = [
        { nome: 'Abelha', img: 'assets/images/animais/abelha.png' },
        { nome: 'Arara', img: 'assets/images/animais/arara.png' },
        { nome: 'Arraia', img: 'assets/images/animais/arraia.png' },
        {nome: ''}
    ];

    function iniciarJogo() {
        const containerAnimais = document.getElementById('container-animais');
        const containerPalavras = document.getElementById('container-palavras');

        containerAnimais.innerHTML = '';
        containerPalavras.innerHTML = '';

        // Seleciona 4 animais aleatórios e embaralha
        const animaisSelecionados = shuffle(animais).slice(0, 4);
        const palavrasSelecionadas = shuffle([...animaisSelecionados]);

        animaisSelecionados.forEach(animal => {
            const animalDiv = document.createElement('div');
            animalDiv.classList.add('animal');
            animalDiv.setAttribute('draggable', 'true');
            animalDiv.setAttribute('data-animal', animal.nome);

            const img = document.createElement('img');
            img.src = animal.img;
            img.alt = animal.nome;

            animalDiv.appendChild(img);
            containerAnimais.appendChild(animalDiv);

            animalDiv.addEventListener('dragstart', handleDragStart);
        });

        palavrasSelecionadas.forEach(palavra => {
            const palavraDiv = document.createElement('div');
            palavraDiv.classList.add('palavra');
            palavraDiv.setAttribute('data-animal', palavra.nome);

            const span = document.createElement('span');
            span.textContent = palavra.nome;

            palavraDiv.appendChild(span);
            containerPalavras.appendChild(palavraDiv);

            palavraDiv.addEventListener('dragover', handleDragOver);
            palavraDiv.addEventListener('drop', handleDrop);
        });

        /* Tempo de partida */
        iniciarContagemRegressiva(1, 0);
    }

    /* Funções para puxar e arrastar */
    function handleDragStart(event) {
        event.dataTransfer.setData('text/plain', event.target.dataset.animal);
        event.dataTransfer.effectAllowed = 'move';
    }

    function handleDragOver(event) {
        event.preventDefault();
        event.dataTransfer.dropEffect = 'move';
    }

    function handleDrop(event) {
        event.preventDefault();

        const animal = event.dataTransfer.getData('text/plain');
        const target = event.target.closest('.palavra');

        if (target && target.dataset.animal === animal) {
            const draggedElement = document.querySelector(`.animal[data-animal="${animal}"]`);
            target.appendChild(draggedElement);

            const span = target.querySelector('span');
            if (span) {
                span.style.opacity = '0';
                setTimeout(() => span.style.display = 'none', 300);
            }

            // Verifica se todos os animais foram posicionados corretamente
            const animaisCorretos = document.querySelectorAll('.palavra span[style="display: none;"]').length;
            if (animaisCorretos === 4) {
                document.getElementById('container-animais').classList.add('centralizado');
                document.querySelector('.game-container').classList.add('centralizado');

                // Pausa a contagem regressiva
                clearInterval(intervalo);

                // Mostra o alerta de fim de jogo
                alert('Fim de jogo!');
            }
        } else {
            alert('Esse animal não corresponde a esta palavra!');
        }
    }

    /* Cria um par ordenado para decrementar os animais com as palavras  */
    function shuffle(array) {
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
        return array;
    }

    /* Contagem regressiva para acabar o tempo de jogo */
    function iniciarContagemRegressiva(minutos, segundos) {
        let tempoRestante = minutos * 60 + segundos;
        const display = document.querySelector('.time span');

        intervalo = setInterval(() => {
            const minutos = Math.floor(tempoRestante / 60);
            const segundos = tempoRestante % 60;

            display.textContent = `${minutos}:${segundos < 10 ? '0' : ''}${segundos}`;

            if (tempoRestante <= 0) {
                clearInterval(intervalo);
                document.dispatchEvent(new Event('tempoEsgotado'));
            }

            tempoRestante--;
        }, 1000);
    }

    // Iniciar jogo ao clicar em "Começar Jogo"
    document.getElementById('startGameBtn').addEventListener('click', function () {
        document.getElementById('modalStartGame').style.display = 'none'; // Esconder modal de início de partida
        iniciarJogo(); // Iniciar o jogo
    });

    // Exibir modal de início de partida ao carregar a página
    document.getElementById('modalStartGame').style.display = 'block';
});
