/*let novoTexto = 'Novo texto para substituir';
    let texto = document.getElementById('text').textContent = novoTexto;
    if(texto === novoTexto){
        
    }
*/

let balaoA = document.getElementById('BL1')
let balaoE = document.getElementById('BL2')
let certoA = document.getElementById('BL3')
let certoE = document.getElementById('BL4')
let letraA = document.getElementById('A')
let letraE = document.getElementById('E')
let mao = document.getElementById('mao')
let verifica1 = document.getElementById('verific')
let verifica2 = document.getElementById('verific2')
let audio = new Audio()
let avancar = document.getElementById('proxima')
let avancar2 = document.getElementById('proxima2')
let maoProx = document.getElementById('maoProxima')

let cor1 = document.getElementById('cor1')
let cor2 = document.getElementById('cor2')

let fim = document.getElementById('tutorial')



function comecarTutorial(){
    cor1.style.background = 'transparent'
    cor2.style.background = 'transparent'
    audio.src = 'audios/botao.mp3'
    audio.play()
    document.getElementById('comecar').style.display = 'none'
    setTimeout(function(){
        audio.src = 'audios/Escolha a Letra Falada.mp3'
        audio.play()
    }, 1500)

    setTimeout(function(){
        maoProx.style.display= 'block'
        avancar.style.pointerEvents = 'all'
    }, 3600)
    
}




function botaoAvancar(){
    maoProx.style.display= 'none'
    letraA.style.display = 'block'
    balaoA.style.display = 'block'
    avancar.style.display = 'none'

    
    verifica1.style.display = 'block'
    verifica2.style.display = 'none'

    setTimeout(function(){
        audio.src = 'audios/A.mp3'
        audio.play()
    }, 1000)

    setTimeout(function(){
        mao.style.display = 'block'
    }, 2000)
    setTimeout(function(){
        verifica1.style.display = 'none'
        verifica2.style.display = 'block'
    }, 6700)
    setTimeout(function(){
        audio.src = 'audios/Resposta Correta.mp3'
        audio.play()
        balaoA.style.display = 'none'
        certoA.style.display = 'block'
        cor1.style.background = '#3EF150'
    }, 6800)
    setTimeout(function(){
        mao.style.display = 'none'
    }, 8000)
    setTimeout(function(){
        avancar2.style.pointerEvents = 'all'
        maoProx.style.display= 'block'
    }, 8500)

}

function botaoAvancar2(){
    setTimeout(function(){
        audio.src = 'audios/E.mp3'
        audio.play()
    }, 1000)

    maoProx.style.display= 'none'
    avancar2.style.display = 'none'
    letraA.style.display = 'none'
    letraE.style.display = 'block'
    balaoE.style.display = 'block'
    verifica1.style.display = 'block'
    verifica2.style.display = 'none'



}


function selecaoBalao(balao){
    if(balao == balaoE){
        audio.src = 'audios/E.mp3'
        audio.play()
        setTimeout(function(){
            audio.src = 'audios/Resposta Correta.mp3'
            audio.play()
            balaoE.style.display = 'none'
            certoE.style.display = 'block'
            cor2.style.background = '#3EF150'
            verifica1.style.display = 'none'
            verifica2.style.display = 'block'
            setTimeout(function(){
                audio.src = 'audios/Fim de Jogo.mp3'
                audio.play()
                fim.style.display = 'block'
            }, 1800)
        }, 800)
    }
}