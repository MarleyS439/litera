document.addEventListener('DOMContentLoaded', function () {

    /* Array de imagems de animais */
    const animais = [
        { nome: 'Cachorro', img: 'assets/images/animais/cachorro.png' },
        { nome: 'Abelha', img: 'assets/images/animais/abelha.png' },
        { nome: 'Formiga', img: 'assets/images/animais/formiga.png' },
        { nome: 'Camaleão', img: 'assets/images/animais/camaleao.png' },
        { nome: 'Tartaruga', img: 'assets/images/animais/tartaruga.png' },
        { nome: 'Arara', img: 'assets/images/animais/arara.png' },
        { nome: 'Besouro', img: 'assets/images/animais/besouro.png' },
        { nome: 'Touro', img: 'assets/images/animais/touro.png' },
        { nome: 'Capivara', img: 'assets/images/animais/capivara.png' },
        { nome: 'Cervo', img: 'assets/images/animais/cervo.png' },
        { nome: 'Cobra', img: 'assets/images/animais/cobra.png' },
        { nome: 'Galinha', img: 'assets/images/animais/galinha.png' },
        { nome: 'Galo', img: 'assets/images/animais/galo.png' },
        { nome: 'Jacaré', img: 'assets/images/animais/jacare.png' },
        { nome: 'Macaco', img: 'assets/images/animais/macaco.png' },
        { nome: 'Sapo', img: 'assets/images/animais/sapo.png' },
        { nome: 'Tatu', img: 'assets/images/animais/tatu.png' },
        { nome: 'Vaca', img: 'assets/images/animais/vaca.png' },
        { nome: 'Peixe', img: 'assets/images/animais/peixe.png' }

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

    /* Funções para puxa e arrasta */
    function handleDragStart(event) {
        event.dataTransfer.setData('text/plain', event.target.dataset.animal);
        event.dataTransfer.effectAllowed = 'move';
    }

    function handleDragOver(event) {
        event.preventDefault();
        event.dataTransfer.dropEffect = 'move';
    }

    /* Função para largar a div na outra div */
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
            if (document.querySelectorAll('.palavra span[style="display: none;"]').length === 4) {
                document.getElementById('container-animais').classList.add('centralizado');
                document.querySelector('.game-container').classList.add('centralizado');
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

        const intervalo = setInterval(() => {
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

    document.addEventListener('tempoEsgotado', function() {
        let modalgameOver = document.getElementById('gameOver');
        modalgameOver.style.display = 'block';
    });

    /* Faz a chamada da função de jogo */
    iniciarJogo();
});
