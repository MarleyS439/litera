let imgMaca = document.getElementById('maca');
let imgPera = document.getElementById('pera');
let slb1 = document.getElementById('silaba');
let slb2 = document.getElementById('silaba1');
let slb3 = document.getElementById('silaba2');
let slb4 = document.getElementById('silaba3');
let mao = document.getElementById('mao');
let audio = new Audio();
let avancar = document.getElementById('proxima');
let avancar2 = document.getElementById('proxima2');
let maoProx = document.getElementById('maoProxima');
let cor1 = document.getElementById('cor1');
let cor2 = document.getElementById('cor2');
let alter = document.getElementById('alternativa')
let alter1 = document.getElementById('alternativa1')
let alter2 = document.getElementById('alternativa2')
let alter3 = document.getElementById('alternativa3')
// let respostaCorreta = ['ma', 'ça'];
let fim = document.getElementById('tutorial');

function comecarTutorial() {
    cor1.style.background = 'transparent';
    cor2.style.background = 'transparent';
    audio.src = 'audios/botao.mp3';
    audio.play();
    document.getElementById('comecar').style.display = 'none';
    setTimeout(function () {
        audio.src = 'audios/junte as silabas corretas.mp3';
        audio.play();
    }, 1500);

    setTimeout(function () {
        maoProx.style.display = 'block';
        avancar.style.pointerEvents = 'all';
    }, 4500);
}

function botaoAvancar() {
    maoProx.style.display = 'none';
    imgMaca.style.display = 'block';
    slb1.style.display = 'block';
    slb2.style.display = 'block';
    avancar.style.display = 'none';

    setTimeout(function () {
        mao.style.display = 'block';
    }, 2000);
    setTimeout(function(){
        alter.style.display = 'block'
        slb1.style.display = 'none'
        cor1.style.background = '#3EF150'
    }, 4000)
    setTimeout(function(){
        alter1.style.display = 'block'
        slb2.style.display = 'none'
        cor2.style.background = '#3EF150'
    }, 6000)
    setTimeout(function(){
        mao.style.display = 'none';
    }, 8000)
    setTimeout(function () {
        avancar2.style.pointerEvents = 'all';
        maoProx.style.display = 'block';
    }, 9500);
}
function botaoAvancar2(){
    maoProx.style.display= 'none'
    avancar2.style.display = 'none'
    imgMaca.style.display = 'none'
    imgPera.style.display = 'block'
    slb1.style.display = 'none'
    slb2.style.display = 'none'
    alter.style.display = 'none'
    alter1.style.display = 'none'
    alter2.style.display = 'block'
    cor2.style.background = 'transparent'
    slb4.style.display = 'block'
    
}


function selecionarSilaba(silaba) {
    if(silaba == slb4){
        setTimeout(function(){
            audio.src = 'audios/Resposta Correta.mp3'
            audio.play()
            slb4.style.display = 'none'
            alter3.style.display = 'block'
            cor2.style.background = '#3EF150'
            setTimeout(function(){
                audio.src = 'audios/Fim de Jogo.mp3'
                audio.play()
                fim.style.display = 'block'
            }, 1800)
        }, 800)
    }
}


function avancarParaProxima() {
    imgMaca.style.display = 'none';
    imgPera.style.display = 'block';
    slb1.src = 'img/pera/pe.svg';
    slb2.src = 'img/pera/ra.svg';
    silabaSelecionada = [];
    cor1.style.background = 'transparent';
    cor2.style.background = 'transparent';
}
