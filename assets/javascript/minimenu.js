let configIcon = document.getElementById('configs');

let minMenu = document.getElementById('miniMenu');

let bodySite = document.body;

configIcon.addEventListener('click',
    function () {
        if (minMenu.style.display != 'flex') {
            minMenu.style.display = 'flex';
            // console.log('abrir modal';
        } else if (minMenu.style.display != 'none') {
            minMenu.style.display = 'none';
            // console.log('fechar modal')
        }
    }
);
