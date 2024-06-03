// Botão de ir para Home
let homeBtn = document.getElementById('home');

// Modal
let modal = document.getElementById('modalExit');

// Botão de confirmar saída da partida
let exitBtn = document.getElementById('exit');

// Botão de continuar a partida
let continueBtn = document.getElementById('continue');

let overlay =  document.getElementById('overlay')

let corpoJogo = document.body;

homeBtn.addEventListener('click', function () {
    if (modal.style.display != 'block') {
        modal.style.display = 'block';
        modal.style.zIndex = 300;
        overlay.style.display = 'block';
        corpoJogo.style.overflow = 'hidden';
    }
});


exitBtn.addEventListener('click', function () {
    modal.style.display = 'none';
    window.location.href = '../../../../litera/views/home.php';
});


continueBtn.addEventListener('click', function() {
   modal.style.display = 'none';
   corpoJogo.style.overflow = 'auto';
   overlay.style.display = 'none';
});



