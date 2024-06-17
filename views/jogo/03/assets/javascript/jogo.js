document.addEventListener('DOMContentLoaded', function () {
    let intervalo;
    const tempoInicial = { minutos: 1, segundos: 0 };
    let animaisCorretos = 0; // Adicionando variável para monitorar animais corretamente alocados

    /* Array de imagens de animais */
    const animais = [
        { nome: 'Abelha', img: 'assets/images/animais/abelha.png' },
        { nome: 'Arara', img: 'assets/images/animais/arara.png' },
        { nome: 'Arraia', img: 'assets/images/animais/arraia.png' },
        { nome: 'Besouro', img: 'assets/images/animais/besouro.png' },
        { nome: 'Boi', img: 'assets/images/animais/boi.png' },
        { nome: 'Cachorro', img: 'assets/images/animais/cachorro.png' },
        { nome: 'Camaleão', img: 'assets/images/animais/camaleao.png' },
        { nome: 'Capivara', img: 'assets/images/animais/capivara.png' },
        { nome: 'Cervo', img: 'assets/images/animais/cervo.png' },
        { nome: 'Cobra', img: 'assets/images/animais/cobra.png' },
        { nome: 'Formiga', img: 'assets/images/animais/formiga.png' },
        { nome: 'Galinha', img: 'assets/images/animais/galinha.png' },
        { nome: 'Galo', img: 'assets/images/animais/galo.png' },
        { nome: 'Jacaré', img: 'assets/images/animais/jacare.png' },
        { nome: 'Macaco', img: 'assets/images/animais/macaco.png' },
        { nome: 'Peixe', img: 'assets/images/animais/peixe.png' },
        { nome: 'Peixe-boi', img: 'assets/images/animais/peixeboi.png' },
        { nome: 'Sapo', img: 'assets/images/animais/sapo.png' },
        { nome: 'Tamanduá', img: 'assets/images/animais/tamandua.png' },
        { nome: 'Tartaruga', img: 'assets/images/animais/tartaruga.png' },
        { nome: 'Tatu', img: 'assets/images/animais/tatu.png' },
        { nome: 'Tubarão', img: 'assets/images/animais/tubarao.png' },
        { nome: 'Tucano', img: 'assets/images/animais/tucano.png' },
        { nome: 'Urubu', img: 'assets/images/animais/urubu.png' },
        { nome: 'Vaca', img: 'assets/images/animais/vaca.png' }
    ];

    function iniciarJogo() {
        const containerAnimais = document.getElementById('container-animais');
        const containerPalavras = document.getElementById('container-palavras');

        containerAnimais.innerHTML = '';
        containerPalavras.innerHTML = '';

        // Redefine o contador de animais corretos
        animaisCorretos = 0;

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
        iniciarContagemRegressiva(tempoInicial.minutos, tempoInicial.segundos);
    }

    function reiniciarJogo() {
        clearInterval(intervalo); // Parar a contagem regressiva
        iniciarJogo(); // Reiniciar o jogo
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

            // Incrementa o contador de animais corretos
            animaisCorretos++;

            // Verifica se todos os animais foram posicionados corretamente
            if (animaisCorretos === 4) {
                clearInterval(intervalo); // Pausa a contagem regressiva

                document.getElementById('container-animais').classList.add('centralizado');
                document.querySelector('.game-container').classList.add('centralizado');

                // Mostra o alerta de fim de jogo
                alert("Fim");
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
                alert("Tempo Esgotado!");
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

    // Reiniciar o jogo ao clicar no botão de reinício
    document.getElementById('restartGameBtn').addEventListener('click', reiniciarJogo);
});
    