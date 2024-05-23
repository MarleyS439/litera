const toggle = document.querySelector('.toggle')
const menu = document.querySelector('.menu')
toggle.onclick = function(){
  menu.classList.toggle('active')
}
let b1 = document.getElementById('b1')
let b2 = document.getElementById('b2')
let b3 = document.getElementById('b3')
let b4 = document.getElementById('b4')
let b5 = document.getElementById('b5')
let pontos_fim = document.getElementById('final_point')
let fim = document.getElementById('fim')
let moedas = 3
let vidas = 1
let icoAudioOff = document.getElementById('off')
let icoAudioOn = document.getElementById('on')
let icoAudioOff_mob = document.getElementById('offmob')
let icoAudioOn_mob = document.getElementById('onmob')
let comece = document.getElementById('botao');
let repetir = document.getElementById('repetir')
let audio = new Audio()

let falaSrc = ''

function comecarJogo() {
  return new Promise(function(resolve, reject) {

      var telaComece = document.getElementById('comece');

      comece.addEventListener('click', function() {
        telaComece.classList.add('fadeOut');
        setTimeout(() => {
          telaComece.style.display = 'none'
        }, 1000)
        falaSrc = 'audios/botao.mp3';
        audio.src = falaSrc
        audio.play();
      })

      

      comece.addEventListener('click', function() {
      setTimeout(() => {
          falaSrc  = 'Audios/Escolha a Letra Falada.mp3'
          audio.src = falaSrc 
          audio.play()

          setTimeout(() => {
          audio.onended = function() {
            // Faça algo quando o áudio terminar a reprodução
            if(audio.onended){
              console.log("O áudio terminou de reproduzir.")
              // Resolva a promessa quando a execução terminar
              resolve();
             }
            }
          }, 2000)
      }, 1500)
      
      })


      

      audio.onplay = function() {
          icoAudioOff.style.display = 'none';
          icoAudioOn.style.display = 'block';
          icoAudioOff_mob.style.display = 'none';
          icoAudioOn_mob.style.display = 'block';
      };

      audio.onpause = function() {
          icoAudioOff.style.display = 'block';
          icoAudioOn.style.display = 'none';
          icoAudioOff_mob.style.display = 'block';
          icoAudioOn_mob.style.display = 'none';
      };
  });
}
  /*audio.onended = function() {
    // Faça algo quando o áudio terminar a reprodução
    if(audio.onended){
      console.log("O áudio terminou de reproduzir.")
      fazerPergunta()
     }
    }*/

  function  selecaoBalao(balao){

    if( balao == b1 ){
      falaSrc  = 'Audios/A.mp3'
      audio.src = falaSrc 
      audio.play()
    } else if( balao == b2 ){
      falaSrc  = 'Audios/E.mp3'
      audio.src = falaSrc 
      audio.play()
    } else if( balao == b3 ){
      falaSrc  = 'Audios/I.mp3'
      audio.src = falaSrc 
      audio.play()
    } else if( balao == b4 ){
      falaSrc  = 'Audios/O.mp3'
      audio.src = falaSrc 
      audio.play()
    } else if( balao == b5 ){
      falaSrc  = 'Audios/U.mp3'
      audio.src = falaSrc 
      audio.play()
    }
    


    audio.onplay = function() {
      icoAudioOff.style.display = 'none';
      icoAudioOn.style.display = 'block';
      icoAudioOff_mob.style.display = 'none';
      icoAudioOn_mob.style.display = 'block';
    };

    audio.onpause = function() {
        icoAudioOff.style.display = 'block';
        icoAudioOn.style.display = 'none';
        icoAudioOff_mob.style.display = 'block';
        icoAudioOn_mob.style.display = 'none';
    };
  }


  function aumentarMoedas() {
    moedas = moedas + moedas + Math.floor(Math.random() * moedas);
    moedas++;
    document.getElementById('moeda').textContent = moedas;
}



function atualizarBarraVidas() {
  // Calcula a largura percentual da barra para cada vida
  let larguraPercentual = 100 / 5; // Considerando 3 vidas
  let largura = larguraPercentual * vidas + '%';

  // Atualiza a largura de cada elemento .acerto
  let acertos = document.querySelectorAll('.acerto');
  acertos.forEach(function(acerto) {
    acerto.style.width = largura;
  });
}
  

function fazerPergunta() { 
  // Array de perguntas com as fontes de áudio correspondentes
  var perguntas = ['Audios/A.mp3', 'Audios/E.mp3', 'Audios/I.mp3', 'Audios/O.mp3', 'Audios/U.mp3']
  
  // Reproduz o áudio da primeira pergunta
  var perguntaAtual = 0 // Índice da pergunta atual[
    setTimeout(function() {
      audio.src = perguntas[perguntaAtual]
      audio.play()  
    }, 400)
  
  
  
  // Função para responder à pergunta
  function responderPergunta(balao) {
    // Verifica se a resposta do usuário está correta
    if (balao.id === 'b1' && perguntaAtual === 0 ||
        balao.id === 'b2' && perguntaAtual === 1 ||
        balao.id === 'b3' && perguntaAtual === 2 ||
        balao.id === 'b4' && perguntaAtual === 3 ||
        balao.id === 'b5' && perguntaAtual === 4) {
        console.log('Resposta correta!')

        if (vidas <= 5) {
          document.getElementById('v' + vidas).style.backgroundColor = '#3EF150'
          vidas++
          atualizarBarraVidas()
        }
        aumentarMoedas()
          setTimeout(function() {
            audio.src = 'Audios/Resposta Correta.mp3'
            audio.play()
          },1000)
          setTimeout(function() {
            audio.src = 'Audios/bolha.mp3'
            audio.play()
            balao.style.display = 'none'
          }, 3000)
      
       
        
        
      
      // Avança para a próxima pergunta
      perguntaAtual++
      if (perguntaAtual < perguntas.length) {
        setTimeout(function() {
          audio.src = perguntas[perguntaAtual]
          audio.play()
        }, 4600)
      } else {
        setTimeout(function (){

          audio.src = 'Audios/Fim de Jogo.mp3'
          audio.play()
          fim.style.display = 'flex'
          pontos_fim.textContent = moedas += ',00';
        }, 4700)
      }
      //caso a resposta esteja errada
    } else {
      setTimeout(function (){
      audio.src = 'Audios/Resposta Errada.mp3'
      audio.play()
      }, 1000)
    }
    
  }
  
  // Adiciona event listeners aos botões
  b1.addEventListener('click', function() {
    responderPergunta(b1)
  })
  b2.addEventListener('click', function() {
    responderPergunta(b2)
  })
  b3.addEventListener('click', function() {
    responderPergunta(b3)
  })
  b4.addEventListener('click', function() {
    responderPergunta(b4)
  })
  b5.addEventListener('click', function() {
    responderPergunta(b5)
  })
  repetir.addEventListener('click', function() {
      falaSrc  = 'Audios/Escolha a Letra Falada.mp3'
      audio.src = falaSrc 
      audio.play()
    setTimeout(function() {
      audio.src = perguntas[perguntaAtual];
      audio.play();
      console.log('Repetindo!')
    },2300)
    
  })
}


// Chamada da função comecarJogo com then() para fazerPergunta quando a promessa for resolvida
comecarJogo().then(fazerPergunta)

/* perguntas corrigidas */
/*function fazerPergunta() { 
  // Array de perguntas com as fontes de áudio correspondentes
  var perguntas = ['Audios/A.mp3', 'Audios/E.mp3', 'Audios/I.mp3', 'Audios/O.mp3', 'Audios/U.mp3'];
  
  // Reproduz o áudio da primeira pergunta
  var perguntaAtual = 0; // Índice da pergunta atual
  audio.src = perguntas[perguntaAtual];
  audio.play();
  
  // Função para responder à pergunta
  function responderPergunta(balao) {
    // Verifica se a resposta do usuário está correta
    if (balao.id === 'b1' && perguntaAtual === 0 ||
        balao.id === 'b2' && perguntaAtual === 1 ||
        balao.id === 'b3' && perguntaAtual === 2 ||
        balao.id === 'b4' && perguntaAtual === 3 ||
        balao.id === 'b5' && perguntaAtual === 4) {
        console.log('Resposta correta!');
        audio.src = 'Audios/parabens.mp3';
        audio.play();
        
      
      // Avança para a próxima pergunta
      perguntaAtual++;
      if (perguntaAtual < perguntas.length) {
        setTimeout(function() {
          audio.src = perguntas[perguntaAtual];
          audio.play();
        }, 3000);
      } else {
        console.log('Fim das perguntas.');
      }
    } else {
      // Repete a pergunta atual
      setTimeout(function() {
        
        repetir.addEventListener('click', function() {
          falaSrc  = 'Audios/Escolha a Letra Falada.mp3'
          audio.src = falaSrc 
          audio.play()
          audio.src = perguntas[perguntaAtual];
          audio.play();
        })
        
      }, 2000);
    }
  }
  
  // Adiciona event listeners aos botões
  b1.addEventListener('click', function() {
    responderPergunta(b1);
  });
  b2.addEventListener('click', function() {
    responderPergunta(b2);
  });
  b3.addEventListener('click', function() {
    responderPergunta(b3);
  });
  b4.addEventListener('click', function() {
    responderPergunta(b4);
  });
  b5.addEventListener('click', function() {
    responderPergunta(b5);
  });
}*/

