

const verificador = document.getElementById("imgVerific");

//BALÕES!!

let balaoA = document.getElementById("b1");
let balaoE = document.getElementById("b2");
let balaoI = document.getElementById("b3");
let balaoO = document.getElementById("b4");
let balaoU = document.getElementById("b5");
var squares = document.querySelectorAll('.square');


//VERIFICADOR!!
var verificar = document.getElementById("verificar");



// VIDAS:
let vidas = 1;
let intervalId = null;

// EXIBIR PONTOS NO FIM
let pontos_fim = document.getElementById("final_point");

let cronometro_fim = document.getElementById("cronometroFim");
let cronometro_fim2 = document.getElementById("cronometroFim2");

let pontos_fim2 = document.getElementById("final_point2");

let pontos_fim3 = document.getElementById("final_point3");

let pontos_errados = document.getElementById("final_error");

let pontos_errados2 = document.getElementById("final_error2");

let pontos_errados3 = document.getElementById("final_error3");

let pontos_acertos = document.getElementById("final_acerto");

let pontos_acertos2 = document.getElementById("final_acerto2");

// BOX INICIO DO JOGO!
const comeco = document.getElementById("boxComece");

// AUDIOS PERGUNTA
let perguntaSrc = "";

// AUDIOS INICIO DA FRASE
let fraseSrc = "";

// MOEDAS CONTAGEM
let moedas = 30;

// CONTAGEM DE ERROS!
let errado = 0;

// CONTAGEM DE ACERTOS!
let acertado = 0;





// BUTTONS...
const comece = document.getElementById("comece");

// ACERTOS
const acertou = document.getElementById("acertou");

const acertoPergunta = document.getElementById("joia");

// ERROS
const errou = document.getElementById("errada");

// FIM DO JOGO
const fim = document.getElementById("finalizar");

//falas
let audio = new Audio();

let letra = new Audio();

let clickLetra = new Audio();

let acertoeErro = new Audio();

let verificarCerta = new Audio();

let audioRetorne = new Audio();

//música
var audioBackground = new Audio();

// Selecionar o elemento onde o cronômetro será exibido
let cronometroElement = document.getElementById("cronometro");

// Variável para armazenar o tempo em segundos
let segundos = 0;

// Atribui as imagens das sílabas e da fruta aos elementos correspondentes

// imgSilaba = 'img/jogoFruta/silabas/MA.svg'
// silaba3.src = imgSilaba

// Adiciona evento de clique ao botão de áudio


function particulasEfeito(){
  if(!activado) return;

        const particulasContainer = activado.querySelector('.particulas');
        particulasContainer.style.display = "flex";
        const colors = ['#ff0000', '#ff6600', '#ff00ff', '#00ff00', '#00ffff', '#ffff00'];

        function getRandomColor() {
        return colors[Math.floor(Math.random() * colors.length)];
        }

        for (let i = 0; i < 20; i++) {
        const particula = document.createElement('div');
        particula.classList.add('particula');
        particula.style.backgroundColor = getRandomColor();
        particula.style.left = `${Math.random() * 100}%`;
        particula.style.top = `${Math.random() * 100}%`;
        particulasContainer.appendChild(particula);

        // Remover a partícula após a animação
        particula.addEventListener('animationend', () => {
            particula.remove();
        });
      }

}

function baloesErradas() {
  errado++;
}

function baloesAcertados() {
  acertado++;
}

function aumentarMoedas() {
  moedas = moedas + moedas - Math.floor(Math.random() * moedas);
  moedas++;
  document.getElementById("moeda").textContent = moedas;
}

function atualizarBarraVidas() {
  // Calcula a largura percentual da barra para cada vida
  let larguraPercentual = 100 / 2; // Considerando 3 vidas
  let largura = larguraPercentual * vidas + "%";

  // Atualiza a largura de cada elemento .acerto
  let acertos = document.querySelectorAll(".acerto");
  acertos.forEach(function (acerto) {
    acerto.style.width = largura;
  });
}

function fazerPergunta() {

  var perguntas = ['Audios/A.mp3','Audios/E.mp3','Audios/I.mp3',
  'Audios/O.mp3','Audios/U.mp3'];

  var perguntaAtual = 0;

  comece.addEventListener("click", function () {
    

    let mutar = document.getElementById("mutarEdesmutar");

    // Reproduzir música de fundo
    audioBackground.src = "Falas Jogo Silabas/musica.mp3";
    audioBackground.play();

    // Definir estado inicial de mudo como falso (não mutado)
    var isMuted = false;

    // Event listener para o botão de mutar/desmutar
    mutar.addEventListener('click', function() {
        // Alternar entre mutar e desmutar
        if (isMuted) {
            audioBackground.volume = 0.1; // Definir volume de volta para o normal
            isMuted = false;
            mutar.style.background = "url('./img/homeIcoB.svg')";
            mutar.style.backgroundSize = "cover";
            mutar.style.backgroundPosition = "center center";
        } else {
            audioBackground.volume = 0; // Mudo
            isMuted = true;
            mutar.style.background = "url('./img/icoPlayB.svg')";
            mutar.style.backgroundSize = "cover";
            mutar.style.backgroundPosition = "center center";
            
        }
    });

    // Event listener para quando a música acabar
    audioBackground.addEventListener('ended', function() {
      // Reproduzir a música novamente
      audioBackground.currentTime = 0; // Reiniciar a música
      audioBackground.play();
    });

    // Iniciar a reprodução da música
    audioBackground.play();

    audioBackground.volume = 0.1;
    


    function atualizarCronometro() {
      // Incrementar os segundos
      segundos++;
      
      // Calcular horas, minutos e segundos
      let minutos = Math.floor((segundos % 3600) / 60);
      let seg = segundos % 60;
      
      // Exibir o cronômetro no formato hh:mm:ss
      cronometroElement.textContent = 
          (minutos < 10 ? "0" + minutos : minutos) + ":" +
          (seg < 10 ? "0" + seg : seg);
    }
  
    // Iniciar o cronômetro
    intervalId = setInterval(atualizarCronometro, 1000); // Atualiza a cada segundo
    
    // Exemplo de como parar o cronômetro após 10 segundos
    setTimeout(function() {
        clearInterval(intervalId); // Parar o intervalo
    },  600000);



    fraseSrc = 'Audios/Escolha a Letra Falada.mp3';
    audio.src = fraseSrc;
    audio.play();

    setTimeout(function () {
      console.log(perguntas[perguntaAtual]);

      setTimeout(function () {
        perguntaSrc = perguntas[perguntaAtual];
        letra.src = perguntaSrc;
        letra.play();
      }, 2200);
    }, 400);















    
    

    

      comeco.style.display = "none";

  
  });


  

  function responderPergunta(balao) {
    console.log("Pergunta atual:", perguntaAtual);
    if(perguntaAtual === 0){
      if(balao === "A"){
        particulasEfeito();

        activado.style.animation = 'explode .7s forwards';

        // Remover o quadrado após a explosão
        setTimeout(function() {
        activado.style.display = 'none';
        }, 500);

        
        
        fundo.style.display = "none";
        

        console.log("A pressionado!!")
        if (vidas <= 8) {
          document.getElementById("v" + vidas).style.backgroundColor =
            "#3EF150";
          vidas++;
          atualizarBarraVidas();
        }

          aumentarMoedas();
          console.log("Resposta correta!");

          verificarCerta.src = "Falas jogo Balao/explodir.mp3";
          verificarCerta.play();

          baloesAcertados()
          console.log("vc acertou:" +acertado);
          
          setTimeout(function () {
            acertou.style.display = "flex";
            acertoeErro.src = "Falas jogo Balao/Resposta correta.mp3";
            acertoeErro.play();
            
          }, 500);
          setTimeout(function () {
            verificar.style.display = "none";
          }, 800);
          verificador.style.display = "flex";
          verificador.src = "./img/acertoV.svg";

          // Avança para a próxima pergunta
          perguntaAtual++;
          if (perguntaAtual < perguntas.length) {
            setTimeout(function () {
              verificador.src = "./img/selecionar.svg";
            }, 800);
            
            setTimeout(function () {
              acertou.style.display = "none";
              perguntaSrc = perguntas[perguntaAtual];
              letra.src = perguntaSrc;
              letra.play();
        
              letra.volume = 1;
              
              
            }, 3000);
            console.log("Proxima pergunta: " +perguntas[perguntaAtual]);
          }
          else {
            setTimeout(function () {
              console.log("FIM!");
            }, 2500);
          }
      }
      else {
        console.log("Errada!");

        setTimeout(function () {
          verificar.style.display = "none";
        }, 1600);
        verificador.style.display = "flex";
        verificador.src = "./img/x.svg";
        setTimeout(function () {
          verificador.src = "./img/selecionar.svg";
        }, 1600);
       
        

        baloesErradas()
        console.log("resposta errada: "+errado)
        setTimeout(function () {        
          closeSquare()
            
        }, 1400);
        setTimeout(function () {
          errou.style.display = "flex";
          
          acertoeErro.src = "Falas jogo Balao/Resposta errada.mp3";
          acertoeErro.play();
        
          setTimeout(function () {
            errou.style.display = "none";
          }, 2500);
        }, 500);
        
       
          

        
        
      }
     
    }
    else if(perguntaAtual === 1){
      if(balao === "E"){
        particulasEfeito();

        activado.style.animation = 'explode .7s forwards';

        // Remover o quadrado após a explosão
        setTimeout(function() {
        activado.style.display = 'none';
        }, 500);

        
        fundo.style.display = "none";
        
        console.log("E pressionado!!")
        if (vidas <= 8) {
          document.getElementById("v" + vidas).style.backgroundColor =
            "#3EF150";
          vidas++;
          atualizarBarraVidas();
        }

          aumentarMoedas();
          console.log("Resposta correta!");

          verificarCerta.src = "Falas jogo Balao/explodir.mp3";
          verificarCerta.play();

          baloesAcertados()
          console.log("vc acertou:" +acertado);
          setTimeout(function () {
            acertou.style.display = "flex";
            acertoeErro.src = "Falas jogo Balao/Resposta correta.mp3";
            acertoeErro.play();
          }, 500);
          setTimeout(function () {
            verificar.style.display = "none";
          }, 800);
          verificador.style.display = "flex";
          verificador.src = "./img/acertoV.svg";
          

          // Avança para a próxima pergunta
          perguntaAtual++;
          if (perguntaAtual < perguntas.length) {
            setTimeout(function () {
              verificador.src = "./img/selecionar.svg";
            }, 800);
            setTimeout(function () {
  
              acertou.style.display = "none";
                
              
    

              perguntaSrc = perguntas[perguntaAtual];
              letra.src = perguntaSrc;
              letra.play();
        
              letra.volume = 1;
              
              
            }, 3000);
            console.log("Proxima pergunta: " +perguntas[perguntaAtual]);
          }
          else {
            setTimeout(function () {
              console.log("FIM!");
            }, 2500);
          }
      }
      else {
        console.log("Errada!");
        setTimeout(function () {
          verificar.style.display = "none";
        }, 1600);
        verificador.style.display = "flex";
        verificador.src = "./img/x.svg";
        setTimeout(function () {
          verificador.src = "./img/selecionar.svg";
        }, 1600);
        baloesErradas()
        console.log("resposta errada: "+errado)
        setTimeout(function () {        
          closeSquare()
            
        }, 1400);
        setTimeout(function () {
          errou.style.display = "flex";
          
          acertoeErro.src = "Falas jogo Balao/Resposta errada.mp3";
          acertoeErro.play();
        
          setTimeout(function () {
            errou.style.display = "none";
          }, 2500);
        }, 500); 
      }
     
    }
    else if(perguntaAtual === 2){
      if(balao === "I"){

        particulasEfeito();

        activado.style.animation = 'explode .7s forwards';

        // Remover o quadrado após a explosão
        setTimeout(function() {
        activado.style.display = 'none';
        }, 500);

      
        fundo.style.display = "none";
        
        console.log("I pressionado!!")
        if (vidas <= 8) {
          document.getElementById("v" + vidas).style.backgroundColor =
            "#3EF150";
          vidas++;
          atualizarBarraVidas();
        }

          aumentarMoedas();
          console.log("Resposta correta!");
          verificarCerta.src = "Falas jogo Balao/explodir.mp3";
          verificarCerta.play();

          baloesAcertados()
          console.log("vc acertou:" +acertado);

          setTimeout(function () {
            acertou.style.display = "flex";
            acertoeErro.src = "Falas jogo Balao/Resposta correta.mp3";
            acertoeErro.play();
          }, 500);

          setTimeout(function () {
            verificar.style.display = "none";
          }, 800);
          verificador.style.display = "flex";
          verificador.src = "./img/acertoV.svg";

          

          // Avança para a próxima pergunta
          perguntaAtual++;
          if (perguntaAtual < perguntas.length) {
            setTimeout(function () {
              verificador.src = "./img/selecionar.svg";
            }, 800);
            setTimeout(function () {

              
              acertou.style.display = "none";
                
    
              perguntaSrc = perguntas[perguntaAtual];
              letra.src = perguntaSrc;
              letra.play();
        
              letra.volume = 1;
              
              
            }, 3000);
            console.log("Proxima pergunta: " +perguntas[perguntaAtual]);
          }
          else {
            setTimeout(function () {
              console.log("FIM!");
            }, 2500);
          }
      }
      else {
        console.log("Errada!");
        setTimeout(function () {
          verificar.style.display = "none";
        }, 1600);
        verificador.style.display = "flex";
        verificador.src = "./img/x.svg";
        setTimeout(function () {
          verificador.src = "./img/selecionar.svg";
        }, 1600);
        baloesErradas()
        console.log("resposta errada: "+errado)
        setTimeout(function () {        
          closeSquare()
            
        }, 1400);
        setTimeout(function () {
          errou.style.display = "flex";
          
          acertoeErro.src = "Falas jogo Balao/Resposta errada.mp3";
          acertoeErro.play();
        
          setTimeout(function () {
            errou.style.display = "none";
          }, 2500);
        }, 500);
      }
     
    }
    else if(perguntaAtual === 3){
      if(balao === "O"){

        particulasEfeito();

        activado.style.animation = 'explode .7s forwards';

        // Remover o quadrado após a explosão
        setTimeout(function() {
        activado.style.display = 'none';
        }, 500);

        
        fundo.style.display = "none";
     
        console.log("O pressionado!!")
        if (vidas <= 8) {
          document.getElementById("v" + vidas).style.backgroundColor =
            "#3EF150";
          vidas++;
          atualizarBarraVidas();
        }

          aumentarMoedas();
          console.log("Resposta correta!");
          verificarCerta.src = "Falas jogo Balao/explodir.mp3";
          verificarCerta.play();

          baloesAcertados()
          console.log("vc acertou:" +acertado);

          setTimeout(function () {
            acertou.style.display = "flex";
            acertoeErro.src = "Falas jogo Balao/Resposta correta.mp3";
            acertoeErro.play();
          }, 500);

          setTimeout(function () {
            verificar.style.display = "none";
          }, 800);
          verificador.style.display = "flex";
          verificador.src = "./img/acertoV.svg";

          

          // Avança para a próxima pergunta
          perguntaAtual++;
          if (perguntaAtual < perguntas.length) {
            setTimeout(function () {
              verificador.src = "./img/selecionar.svg";
            }, 800);
            setTimeout(function () {

              
              acertou.style.display = "none";
                
             
    

              perguntaSrc = perguntas[perguntaAtual];
              letra.src = perguntaSrc;
              letra.play();
        
              letra.volume = 1;
              
              
            }, 3000);
            console.log("Proxima pergunta: " +perguntas[perguntaAtual]);
          }
          else {
            setTimeout(function () {
              console.log("FIM!");
            }, 2500);
          }
      }
      else {
        console.log("Errada!");
        setTimeout(function () {
          verificar.style.display = "none";
        }, 1600);
        verificador.style.display = "flex";
        verificador.src = "./img/x.svg";
        setTimeout(function () {
          verificador.src = "./img/selecionar.svg";
        }, 1600);
        baloesErradas()
        console.log("resposta errada: "+errado)
        setTimeout(function () {        
          closeSquare()
            
        }, 1400);
        setTimeout(function () {
          errou.style.display = "flex";
          
          acertoeErro.src = "Falas jogo Balao/Resposta errada.mp3";
          acertoeErro.play();
        
          setTimeout(function () {
            errou.style.display = "none";
          }, 2500);
        }, 500);
      }
     
    }
    else if(perguntaAtual === 4){
      if(balao === "U"){
        
        particulasEfeito();


        activado.style.animation = 'explode .7s forwards';

        // Remover o quadrado após a explosão
        setTimeout(function() {
        activado.style.display = 'none';
        }, 500);

        
        fundo.style.display = "none";
       
        console.log("O pressionado!!")
        if (vidas <= 8) {
          document.getElementById("v" + vidas).style.backgroundColor =
            "#3EF150";
          vidas++;
          atualizarBarraVidas();
        }

          aumentarMoedas();
          console.log("Resposta correta!");
          verificarCerta.src = "Falas jogo Balao/explodir.mp3";
          verificarCerta.play();

          baloesAcertados()
          console.log("vc acertou:" +acertado);

          setTimeout(function () {
            acertou.style.display = "flex";
            acertoeErro.src = "Falas jogo Balao/Resposta correta.mp3";
            acertoeErro.play();
          }, 500);

          setTimeout(function () {
            verificar.style.display = "none";
          }, 800);
          verificador.style.display = "flex";
          verificador.src = "./img/acertoV.svg";

          

          // Avança para a próxima pergunta
          perguntaAtual++;
          if (perguntaAtual < perguntas.length) {
            setTimeout(function () {
              verificador.src = "./img/selecionar.svg";
            }, 800);
            setTimeout(function () {

            
              acertou.style.display = "none";
         
    
              perguntaSrc = perguntas[perguntaAtual];
              letra.src = perguntaSrc;
              letra.play();
        
              letra.volume = 1;
              
              
            }, 3000);
            console.log("Proxima pergunta: " +perguntas[perguntaAtual]);
          }
          else {
            setTimeout(function () {

              let tempoAtual = cronometroElement.textContent;

              // Exibir o tempo atual
              console.log("Tempo atual: " + tempoAtual);
              cronometro_fim.textContent = tempoAtual;
              cronometro_fim2.textContent = tempoAtual;

              console.log("FIM!");
              fim.style.display = "flex";
              acertou.style.display = "none";
              pontos_fim.textContent = moedas;
              pontos_fim2.textContent = moedas;
              pontos_fim3.textContent = moedas;
              pontos_errados.textContent = errado;
              pontos_errados2.textContent = errado;
              pontos_errados3.textContent = errado;
              pontos_acertos.textContent = acertado;
              pontos_acertos2.textContent = acertado;

              
              // lógica de inserção no banco ajax Ajax AJAX 
              // lógica de inserção no banco ajax Ajax AJAX 
              const dados = {
                id: document.getElementById("id").value,
                money: moedas,
              };

              // Cria o objeto XMLHttpRequest
              const xhr = new XMLHttpRequest();

              // Define o método e a URL para a requisição
              xhr.open("POST", "../../../controller/insertMoney.php", true);

              // Define o cabeçalho da requisição
              xhr.setRequestHeader("Content-Type", "application/json");

              // Função de callback para quando a requisição estiver completa
              xhr.onload = function () {
                if (xhr.status >= 200 && xhr.status < 300) {
                  // Requisição bem-sucedida, você pode lidar com a resposta aqui
                  console.log(xhr.responseText);
                } else {
                  // Trate os erros de requisição aqui
                  console.error("Erro ao enviar requisição");
                }
              };
              // Envia a requisição com os dados convertidos para JSON
              xhr.send(JSON.stringify(dados));

              //logica de banco para pontuação e o nivel
              const nivelInsert = {
                id: document.getElementById("id").value,
                pontuacao: 50,
              };

              // Cria o objeto XMLHttpRequest
              const xhr2 = new XMLHttpRequest();

              // Define o método e a URL para a requisição
              xhr2.open("POST", "../../../controller/insertPontuacao.php", true);

              // Define o cabeçalho da requisição
              xhr2.setRequestHeader("Content-Type", "application/json");

              // Função de callback para quando a requisição estiver completa
              xhr2.onload = function () {
                if (xhr2.status >= 200 && xhr2.status < 300) {
                  // Requisição bem-sucedida, você pode lidar com a resposta aqui
                  console.log(xhr2.responseText);
                } else {
                  // Trate os erros de requisição aqui
                  console.error("Erro ao enviar requisição");
                }
              };
              // Envia a requisição com os dados convertidos para JSON
              xhr2.send(JSON.stringify(nivelInsert));

              // Seu script JavaScript
              const dadosFase = {
                id: document.getElementById("id").value,
                idFase: 2,
                money: moedas,
                acertos: 8,
                erros: errado ? errado : 0,
                pontos: 50
              };

              // Cria o objeto XMLHttpRequest
              const xhrDadosFase = new XMLHttpRequest();

              // Define o método e a URL para a requisição
              xhrDadosFase.open("POST", "../../../controller/insertDadosFase.php", true);

              // Define o cabeçalho da requisição
              xhrDadosFase.setRequestHeader("Content-Type", "application/json");

              // Função de callback para quando a requisição estiver completa
              xhrDadosFase.onload = function () {
                if (xhrDadosFase.status >= 200 && xhrDadosFase.status < 300) {
                  // Requisição bem-sucedida, você pode lidar com a resposta aqui
                  console.log(xhrDadosFase.responseText);
                } else {
                  // Trate os erros de requisição aqui
                  console.error("Erro ao enviar requisição");
                }
              };

              // Envia a requisição com os dados convertidos para JSON
              xhrDadosFase.send(JSON.stringify(dadosFase));

            }, 2500);
          }
      }
      else {
        console.log("Errada!");
        setTimeout(function () {
          verificar.style.display = "none";
        }, 1600);
        verificador.style.display = "flex";
        verificador.src = "./img/x.svg";
        setTimeout(function () {
          verificador.src = "./img/selecionar.svg";
        }, 1600);
        baloesErradas()
        console.log("resposta errada: "+errado)
        setTimeout(function () {        
          closeSquare()
            
        }, 1400);
        setTimeout(function () {
          errou.style.display = "flex";
          
          acertoeErro.src = "Falas jogo Balao/Resposta errada.mp3";
          acertoeErro.play();
        
          setTimeout(function () {
            errou.style.display = "none";
          }, 2500);
        }, 500);
      }
     
    }
  }

// Variável para armazenar o balão selecionado
var balaoSelecionado;

// Adiciona eventos de clique para cada balão
balaoA.addEventListener("click", function() {
    balaoSelecionado = "A"; // Armazena o balão selecionado
    clickLetra.src = "Falas jogo Balao/click.mp3"
    clickLetra.play();
});

balaoE.addEventListener("click", function() {
    balaoSelecionado = "E"; // Armazena o balão selecionado
    clickLetra.src = "Falas jogo Balao/click.mp3"
    clickLetra.play();
});

balaoI.addEventListener("click", function() {
    balaoSelecionado = "I"; // Armazena o balão selecionado
    clickLetra.src = "Falas jogo Balao/click.mp3"
    clickLetra.play();
});

balaoO.addEventListener("click", function() {
    balaoSelecionado = "O"; // Armazena o balão selecionado
    clickLetra.src = "Falas jogo Balao/click.mp3"
    clickLetra.play();
});

balaoU.addEventListener("click", function() {
    balaoSelecionado = "U"; // Armazena o balão selecionado
    clickLetra.src = "Falas jogo Balao/click.mp3"
    clickLetra.play();
});

// Adiciona um evento de clique para o botão de verificação
verificar.addEventListener("click", function() {
    if (balaoSelecionado) {
      console.log(balaoSelecionado);
        // Chama a função responderPergunta com o balão selecionado
        responderPergunta(balaoSelecionado);
    } else {
        console.log("Nenhum balão selecionado!");
    }
});
  

}


document.getElementById('fecharCheia').style.display = 'none'

function openFullscreen() {
  if (document.documentElement.requestFullscreen) {
    document.documentElement.requestFullscreen();
  } else if (document.documentElement.mozRequestFullScreen) { /* Firefox */
    document.documentElement.mozRequestFullScreen();
  } else if (document.documentElement.webkitRequestFullscreen) { /* Chrome, Safari e Opera */
    document.documentElement.webkitRequestFullscreen();
  } else if (document.documentElement.msRequestFullscreen) { /* IE/Edge */
    document.documentElement.msRequestFullscreen();
 }
  document.getElementById('fecharCheia').style.display = 'block'
  document.getElementById('abrirCheia').style.display = 'none'

}

// Opcional: fechar tela cheia

function closeFullscreen() {
  if (document.exitFullscreen) {
    document.exitFullscreen();
  } else if (document.mozCancelFullScreen) { /* Firefox */
    document.mozCancelFullScreen();
  } else if (document.webkitExitFullscreen) { /* Chrome, Safari e Opera */
    document.webkitExitFullscreen();
  } else if (document.msExitFullscreen) { /* IE/Edge */
    document.msExitFullscreen();
  }
  document.getElementById('fecharCheia').style.display = 'none'
  document.getElementById('abrirCheia').style.display = 'block'
}










let fruta1 = document.getElementById("f1");
let fruta2 = document.getElementById("f2");
let fruta3 = document.getElementById("f3");
let fruta4 = document.getElementById("f4");
let fruta5 = document.getElementById("f5");
let fruta6 = document.getElementById("f6");
let fruta7 = document.getElementById("f7");
let fruta8 = document.getElementById("f8");
let fruta9 = document.getElementById("f9");
let fruta10 = document.getElementById("f10");



function limaparCard(){
  fruta1.style.transform = "none";
  fruta2.style.transform = "none";
  fruta3.style.transform = "none";
  fruta4.style.transform = "none";
  fruta5.style.transform = "none";
  fruta6.style.transform = "none";
  fruta7.style.transform = "none";
  fruta8.style.transform = "none";
  fruta9.style.transform = "none";
  fruta10.style.transform = "none";
}

fruta1.addEventListener('click', function() {
  limaparCard();
  // Exibe o modal
  audio.src = "Audios/A.mp3";
  audio.play();
  audio.volume = 1;
  fruta1.style.transform = "translateY(-20px)";
  fruta1.style.transition = "transform 0.5s ease";

  audio.addEventListener('ended', function() {
    fruta1.style.transform = "none";
  });
});
fruta6.addEventListener('click', function() {
  limaparCard();
  // Exibe o modal
  audio.src = "Audios/A.mp3";
  audio.play();
  audio.volume = 1;
  fruta6.style.transform = "translateY(-20px)";
  fruta6.style.transition = "transform 0.5s ease";

  audio.addEventListener('ended', function() {
    fruta6.style.transform = "none";
  });
});
fruta2.addEventListener('click', function() {
  limaparCard();
  // Exibe o modal
  audio.src = "Audios/E.mp3";
  audio.play();
  audio.volume = 1;
  fruta2.style.transform = "translateY(-20px)";
  fruta2.style.transition = "transform 0.5s ease";

  audio.addEventListener('ended', function() {
    fruta2.style.transform = "none";
  });
});
fruta7.addEventListener('click', function() {
  limaparCard();
  // Exibe o modal
  audio.src = "Audios/E.mp3";
  audio.play();
  audio.volume = 1;
  fruta7.style.transform = "translateY(-20px)";
  fruta7.style.transition = "transform 0.5s ease";

  audio.addEventListener('ended', function() {
    fruta7.style.transform = "none";
  });
});
fruta3.addEventListener('click', function() {
  limaparCard();
  // Exibe o modal
  audio.src = "Audios/I.mp3";
  audio.play();
  audio.volume = 1;
  fruta3.style.transform = "translateY(-20px)";
  fruta3.style.transition = "transform 0.5s ease";

  audio.addEventListener('ended', function() {
    fruta3.style.transform = "none";
  });
});
fruta8.addEventListener('click', function() {
  limaparCard();
  // Exibe o modal
  audio.src = "Audios/I.mp3";
  audio.play();
  audio.volume = 1;
  fruta8.style.transform = "translateY(-20px)";
  fruta8.style.transition = "transform 0.5s ease";

  audio.addEventListener('ended', function() {
    fruta8.style.transform = "none";
  });
});
fruta4.addEventListener('click', function() {
  limaparCard();
  // Exibe o modal
  audio.src = "Audios/O.mp3";
  audio.play();
  audio.volume = 1;
  fruta4.style.transform = "translateY(-20px)";
  fruta4.style.transition = "transform 0.5s ease";

  audio.addEventListener('ended', function() {
    fruta4.style.transform = "none";
  });
});
fruta9.addEventListener('click', function() {
  limaparCard();
  // Exibe o modal
  audio.src = "Audios/O.mp3";
  audio.play();
  audio.volume = 1;
  fruta9.style.transform = "translateY(-20px)";
  fruta9.style.transition = "transform 0.5s ease";

  audio.addEventListener('ended', function() {
    fruta9.style.transform = "none";
  });
});
fruta5.addEventListener('click', function() {
  limaparCard();
  // Exibe o modal
  audio.src = "Audios/U.mp3";
  audio.play();
  audio.volume = 1;
  fruta5.style.transform = "translateY(-20px)";
  fruta5.style.transition = "transform 0.5s ease";

  audio.addEventListener('ended', function() {
    fruta5.style.transform = "none";
  });
});
fruta10.addEventListener('click', function() {
  limaparCard();
  // Exibe o modal
  audio.src = "Audios/U.mp3";
  audio.play();
  audio.volume = 1;
  fruta10.style.transform = "translateY(-20px)";
  fruta10.style.transition = "transform 0.5s ease";

  audio.addEventListener('ended', function() {
    fruta10.style.transform = "none";
  });
});








// Seleciona o botão final
const btnFinal = document.getElementById('abrirModal');

// Seleciona o modal
const modal = document.getElementById('modal');

// Seleciona o elemento para fechar o modal
const closeBtn = document.querySelector('.close');

//Adiciona um evento de clique ao botão final
btnFinal.addEventListener('click', function() {
  // Exibe o modal
  modal.style.display = 'block';
});

// Adiciona um evento de clique ao elemento para fechar o modal
closeBtn.addEventListener('click', function() {
  // Fecha o modal
  modal.style.display = 'none';
});

// Fecha o modal quando o usuário clica fora dele
window.addEventListener('click', function(event) {
  if (event.target === modal) {
    modal.style.display = 'none';
  }
});












var fundo = document.getElementById("fundo");
var fechar = document.getElementById("fechado");
var verificar = document.getElementById("verificar");
var activadoBalao = null;
var activado = null;

function moveToCenter(square) {
var balao = square.querySelector('.balao');
square.style.top = 'calc(50% - 50px)';
square.style.right = 'calc(50% - 50px)';
balao.classList.add('zoomed');
square.style.zIndex = 2;
fundo.style.display = "flex";
verificar.style.display = "flex";
activado = square;
activadoBalao = balao;
console.log(activado);
}

function moveToCenterBottom(square){
  var balao = square.querySelector('.balao');
square.style.bottom = 'calc(50% - 50px)';
square.style.left = 'calc(50% - 50px)';
balao.classList.add('zoomed');
square.style.zIndex = 2;
fundo.style.display = "flex";
verificar.style.display = "flex";
activado = square;
activadoBalao = balao;
console.log(activado);

}

function closeSquare() {

  clickLetra.src = "Falas jogo Balao/retornando.mp3"
  clickLetra.play();
var squares = document.querySelectorAll('.square');
squares.forEach(square => {
    square.style.top = '';
    square.style.right = '';
    square.style.bottom = '';
    square.style.left = '';
    square.style.zIndex = 0;
});
fundo.style.display = "none";
verificar.style.display = "none";

activado = null;

if (activadoBalao) {
  activadoBalao.classList.remove('zoomed');
  activadoBalao = null;
}else{
  console.log("zoom no balão esta desativado")
}

}


fazerPergunta();
