document.addEventListener("DOMContentLoaded", function() {
    const carouselSlide = document.querySelector('.carousel-slide');
    const images = document.querySelectorAll('.carousel-slide div');

    let counter = 0;
    const size = images[0].clientWidth; // obtém a largura de um contêiner de ícone, todos devem ter a mesma largura

    carouselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';

    // Botões de navegação do carrossel
    document.querySelector('.next').addEventListener('click', (event) => {
        event.stopPropagation(); // Evita que o evento de clique seja propagado
        if (counter >= images.length - 1) return;
        carouselSlide.style.transition = 'transform 0.5s ease-in-out';
        counter++;
        carouselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';
    });

    document.querySelector('.prev').addEventListener('click', (event) => {
        event.stopPropagation(); // Evita que o evento de clique seja propagado
        if (counter <= 0) return;
        carouselSlide.style.transition = 'transform 0.5s ease-in-out';
        counter--;
        carouselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';
    });

    // Para reiniciar o carrossel após a última imagem
    carouselSlide.addEventListener('transitionend', () => {
        if (counter >= images.length - 1) {
            carouselSlide.style.transition = 'none';
            counter = 0;
            carouselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';
        }
        if (counter <= 0) {
            carouselSlide.style.transition = 'none';
            counter = images.length - 1;
            carouselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';
        }
    });
});
// <!-- <div class="select-icon carrossel">


// <div class="">
//     <img src="../assets/images/icons/Frame 190.png" alt="">
// </div>

// <div class="">
//     <img src="../assets/images/icons/Frame 196.png" alt="">
// </div>

// <div class="">
//     <img src="../assets/images/icons/Frame 197.png" alt="">
// </div>

// <div class="">
//     <img src="../assets/images/icons/Frame 198.png" alt="">
// </div>

// </div> -->
