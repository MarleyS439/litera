let configIcon = document.getElementById('configs');

let minMenu = document.getElementById('miniMenu');

let bodySite = document.body;

configIcon.addEventListener('click', function () {
    if (minMenu.style.display != 'none') {
        minMenu.style.display = 'block';
    } else if (minMenu.style.display = 'block') {
        minMenu.style.display = 'none';
    }
});
