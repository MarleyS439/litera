const buttonFullScreen = document.getElementById('fullScreenBtn');

buttonFullScreen.addEventListener('click', function() {
    const janela = document.documentElement;

    if (!document.fullscreenElement) {
        if (janela.requestFullscreen) {
            janela.requestFullscreen();
        } else if (janela.mozRequestFullScreen) {
            janela.mozRequestFullScreen();
        } else if (janela.webkitRequestFullscreen) {
            janela.webkitRequestFullscreen();
        } else if (janela.msRequestFullscreen) {
            janela.msRequestFullscreen();
        }
    } else {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitExitFullscreen) {
            document.webkitExitFullscreen();
        } else if (document.msExitFullscreen) {
            document.msExitFullscreen();
        }
    }
});
