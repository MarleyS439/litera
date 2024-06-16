let imgFruta = "";
let imgSilaba = "";
let imgSil = "";

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

// AUDIOS FRUTAS
let frutaSrc = "";

// AUDIOS SILABA
let silabaSrc = "";

// MOEDAS CONTAGEM
let moedas = 3;

// CONTAGEM DE ERROS!
let errado = 0;

// CONTAGEM DE ACERTOS!
let acertado = 0;

// BOX DAS SILABAS AO REMOVER SOME TODAS AS SILABAS.... {SILABA1} etc.. e {sil1}.
let box1 = document.getElementById("bx1");
let box2 = document.getElementById("bx2");
let box3 = document.getElementById("bx3");
let box4 = document.getElementById("bx4");

//SILABAS SELECIONADAS
let sil1 = document.getElementById("sil1");
let sil2 = document.getElementById("sil2");
let sil3 = document.getElementById("sil3");
let sil4 = document.getElementById("sil4");

// FRUTAS IMAGEM
const fruta = document.getElementById("fruta");

// SILABAS IMG
const silaba1 = document.getElementById("silaba1");
const silaba2 = document.getElementById("silaba2");
const silaba3 = document.getElementById("silaba3");
const silaba4 = document.getElementById("silaba4");

// BUTTONS...
const btnAudio = document.getElementById("repetir");
const comece = document.getElementById("comece");

// ACERTOS
const acertou = document.getElementById("acertou");
const acertoPergunta = document.getElementById("joia");

// ERROS
const errou = document.getElementById("errada");
const errada = document.getElementById("joiaErrado")
// FIM DO JOGO
const fim = document.getElementById("finalizar");

//falas
let audio = new Audio();

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

function silabasErradas() {
  errado++;
}

function silabasAcertadas() {
  acertado++;
}

function aumentarMoedas() {
  moedas = moedas + moedas - Math.floor(Math.random() * moedas);
  moedas++;
  document.getElementById("moeda").textContent = moedas;
}

function atualizarBarraVidas() {
  // Calcula a largura percentual da barra para cada vida
  let larguraPercentual = 100 / 8; // Considerando 3 vidas
  let largura = larguraPercentual * vidas + "%";

  // Atualiza a largura de cada elemento .acerto
  let acertos = document.querySelectorAll(".acerto");
  acertos.forEach(function (acerto) {
    acerto.style.width = largura;
  });
}

function fazerPergunta() {
  // Array de perguntas com as fontes de áudio correspondentes
  var perguntas = [
    "img/jogoFruta/figuras-frutas/maça.svg",
    "img/jogoFruta/figuras-frutas/banana.svg",
    "img/jogoFruta/figuras-frutas/melancia.svg",
    "img/jogoFruta/figuras-frutas/cereja.svg",
    "img/jogoFruta/figuras-frutas/morango.svg",
    "img/jogoFruta/figuras-frutas/abacaxi.svg",
    "img/jogoFruta/figuras-frutas/laranja.svg",
    "img/jogoFruta/figuras-frutas/pera.svg",
  ];

  var audioFruta = [
    "Falas Jogo Silabas/maça/maça.mp3",
    "Falas Jogo Silabas/banana/banana.mp3",
    "Falas Jogo Silabas/melancia/melancia.mp3",
    "Falas Jogo Silabas/cereja/cereja.mp3",
    "Falas Jogo Silabas/morango/morango.mp3",
    "Falas Jogo Silabas/abacaxi/abacaxi.mp3",
    "Falas Jogo Silabas/laranja/laranja.mp3",
    "Falas Jogo Silabas/pera/pera.mp3",
  ];

  // Reproduz o áudio da primeira pergunta
  var audioAtual = 0;
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
            mutar.style.background = "url('./img/icoPlay.svg')";
            mutar.style.backgroundSize = "cover";
            mutar.style.backgroundPosition = "center center";
        } else {
            audioBackground.volume = 0; // Mudo
            isMuted = true;
            mutar.style.background = "url('./img/icoMuted.svg')";
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














    
    

    silabaSrc = "Falas Jogo Silabas/junte as silabas corretas.mp3";

    audio.src = silabaSrc;
    audio.play();

    setTimeout(function () {
      console.log(audioFruta[audioAtual]);

      console.log(perguntas[perguntaAtual]);
      imgFruta = perguntas[perguntaAtual];
      fruta.src = imgFruta;

      imgSilaba = "img/jogoFruta/silabas/MA1.svg";
      silaba2.src = imgSilaba;

      imgSilaba = "img/jogoFruta/silabas/ÇA1.svg";
      silaba1.src = imgSilaba;

      box3.style.display = "none";
      box4.style.display = "none";

      sil1.style.display = "none";
      sil2.style.display = "none";
      sil3.style.display = "none";
      sil4.style.display = "none";

      comeco.style.display = "none";

      setTimeout(function () {
        frutaSrc = audioFruta[audioAtual];
        audio.src = frutaSrc;
        audio.play();
      }, 2200);
    }, 200);
  });


  const retorne = document.getElementById("retornar");
  let silabasSelecionadas = [];
  let areaSilabas = [];
  retorne.style.display = "none";

  // Função para responder à pergunta
  function responderPergunta(silaba) {
    if (perguntaAtual === 0 && audioAtual === 0) {
      if (silaba === silaba1) {
        silabaSrc = "Falas Jogo Silabas/maça/selecionada.mp3";
        audio.src = silabaSrc;
        audio.play();

      } else if (silaba === silaba2) {
        silabaSrc = "Falas Jogo Silabas/maça/selecionada.mp3";
        audio.src = silabaSrc;
        audio.play();
      }

      // Adiciona a sílaba selecionada ao array
      silabasSelecionadas.push(silaba.id);
      console.log("Silabas selecionadas:", silabasSelecionadas);

      areaSilabas.push(silaba.src.substring(silaba.src.indexOf("img")));
      console.log("Area Silabas:", areaSilabas);

      //limpa o campo da silaba selecionada
      silaba.style.display = "none";

      // Verifica se há uma imagem para exibir no sil1
      if (areaSilabas[0] && silabasSelecionadas[0]) {
        // Define a imagem e torna o campo de imagem visível
        sil1.src = areaSilabas[0];
        sil1.style.display = "block";
        retorne.style.display = "block";
      }

      // Verifica se há uma imagem para exibir no sil2
      if (areaSilabas[1]) {
        // Define a imagem e torna o campo de imagem visível
        sil2.src = areaSilabas[1];
        sil2.style.display = "block";
        retorne.style.display = "block";
      }

      // Verifica se há uma imagem para exibir no sil3
      if (areaSilabas[2]) {
        // Define a imagem e torna o campo de imagem visível
        sil3.src = areaSilabas[2];
        sil3.style.display = "block";
        retorne.style.display = "block";
      }

      // Verifica se há uma imagem para exibir no sil4
      if (areaSilabas[3]) {
        // Define a imagem e torna o campo de imagem visível
        sil4.src = areaSilabas[3];
        sil4.style.display = "block";
        retorne.style.display = "block";
      }

      // Verifica se todas as sílabas foram selecionadas
      if (silabasSelecionadas.length === 2) {
        // Verifica se a resposta está correta
        if (
          silabasSelecionadas[0] === "silaba2" &&
          silabasSelecionadas[1] === "silaba1"
        ) {
          if (vidas <= 8) {
            document.getElementById("v" + vidas).style.backgroundColor =
              "#3EF150";
            vidas++;
            atualizarBarraVidas();
          }

          aumentarMoedas();
          console.log("Resposta correta!");
          silabasAcertadas()
          console.log("vc acertou:" +acertado);

          setTimeout(function () {
            acertou.style.display = "flex";
            acertoPergunta.style.display = "flex";
            
          }, 700);
          
          setTimeout(function () {
            frutaSrc = "Falas Jogo Silabas/Resposta correta.mp3";
            audio.src = frutaSrc;
            audio.volume = 0.2;
            audio.play();
          }, 1300);

          // Avança para a próxima pergunta
          audioAtual++;
          perguntaAtual++;

          if (perguntaAtual < perguntas.length) {
            setTimeout(function () {
              retorne.style.display = "none";
              acertou.style.display = "none";
              acertoPergunta.style.display = "none";

            

              console.log(audioFruta[audioAtual]);

              frutaSrc = audioFruta[audioAtual];
              audio.src = frutaSrc;
              audio.volume = 1;
              audio.play();

              console.log(perguntas[perguntaAtual]);
              silabasSelecionadas = [];
              imgFruta = perguntas[perguntaAtual];
              fruta.src = imgFruta;

              // SILABAS BANANA

              box3.style.display = "block";

              imgSilaba = "img/jogoFruta/silabas/NA1.svg";
              silaba3.src = imgSilaba;
              imgSilaba = "img/jogoFruta/silabas/BA1.svg";
              silaba2.src = imgSilaba;
              imgSilaba = "img/jogoFruta/silabas/NA2.svg";
              silaba1.src = imgSilaba;

              areaSilabas = [];
              sil1.src = "";
              sil2.src = "";
              sil1.style.display = "none";
              sil2.style.display = "none";
              sil3.style.display = "none";
              sil4.style.display = "none";
              silaba1.style.display = "block";
              silaba2.style.display = "block";
              silaba3.style.display = "block";
              silaba4.style.display = "block";
            }, 3000);
          } else {
            setTimeout(function () {
              console.log("FIM!");
            }, 2500);
          }
        } else {
          console.log("Errada!");
          
          setTimeout(function () {
            errou.style.display = "flex";
            errada.style.display = "flex";
            frutaSrc = "Falas Jogo Silabas/Resposta errada.mp3";
            audio.src = frutaSrc;
            audio.volume = 0.2;
            audio.play();
           
          }, 1400);
          
          retorne.style.display = "none";

          setTimeout(function () {
            errou.style.display = "none";
            errada.style.display = "none";
            silabasErradas();
            console.log("Erros:" + errado);

            areaSilabas = [];
            sil1.src = "";
            sil2.src = "";
            sil1.style.display = "none";
            sil2.style.display = "none";
            sil3.style.display = "none";
            sil4.style.display = "none";
            silaba1.style.display = "block";
            silaba2.style.display = "block";
            silaba3.style.display = "block";
            silaba4.style.display = "block";

            box1.classList.add("moveRetorne");
            box2.classList.add("moveRetorne");
            box3.classList.add("moveRetorne");
            box4.classList.add("moveRetorne");
            setTimeout(function () {
              box1.classList.remove("moveRetorne");
              box2.classList.remove("moveRetorne");
              box3.classList.remove("moveRetorne");
              box4.classList.remove("moveRetorne");
              
            }, 3000);
            
            audio.volume = 1;
            silabasSelecionadas = [];
          }, 3000);

          console.log(
            "Tentativa incorreta. Silabas selecionadas reiniciadas:",
            silabasSelecionadas
          );
          console.log(perguntas[perguntaAtual]);
        }
      }
    }
    // BANANA
    else if (perguntaAtual === 1 && audioAtual === 1) {
      if (silaba === silaba1) {
        silabaSrc = "Falas Jogo Silabas/banana/selecionada.mp3";
        audio.src = silabaSrc;
        audio.play();
      } else if (silaba === silaba2) {
        silabaSrc = "Falas Jogo Silabas/banana/selecionada.mp3";
        audio.src = silabaSrc;
        audio.play();
      } else if (silaba === silaba3) {
        silabaSrc = "Falas Jogo Silabas/banana/selecionada.mp3";
        audio.src = silabaSrc;
        audio.play();
      }

      // Lógica similar à pergunta atual 0
      silabasSelecionadas.push(silaba.id);
      console.log("Silabas selecionadas:", silabasSelecionadas);

      areaSilabas.push(silaba.src.substring(silaba.src.indexOf("img")));
      console.log("Area Silabas:", areaSilabas);

      //limpa o campo da silaba selecionada
      silaba.style.display = "none";

      // Verifica se há uma imagem para exibir no sil1
      if (areaSilabas[0]) {
        // Define a imagem e torna o campo de imagem visível
        sil1.src = areaSilabas[0];
        sil1.style.display = "block";
        retorne.style.display = "block";
      }

      // Verifica se há uma imagem para exibir no sil2
      if (areaSilabas[1]) {
        // Define a imagem e torna o campo de imagem visível
        sil2.src = areaSilabas[1];
        sil2.style.display = "block";
        retorne.style.display = "block";
      }

      // Verifica se há uma imagem para exibir no sil3
      if (areaSilabas[2]) {
        // Define a imagem e torna o campo de imagem visível
        sil3.src = areaSilabas[2];
        sil3.style.display = "block";
        retorne.style.display = "block";
      }

      // Verifica se há uma imagem para exibir no sil4
      if (areaSilabas[3]) {
        // Define a imagem e torna o campo de imagem visível
        sil4.src = areaSilabas[3];
        sil4.style.display = "block";
        retorne.style.display = "block";
      }

      if (silabasSelecionadas.length === 3) {
        if (
          (silabasSelecionadas[0] === "silaba2" &&
            silabasSelecionadas[1] === "silaba1" &&
            silabasSelecionadas[2] === "silaba3") ||
          (silabasSelecionadas[0] === "silaba2" &&
            silabasSelecionadas[1] === "silaba3" &&
            silabasSelecionadas[2] === "silaba1")
        ) {
          if (vidas <= 8) {
            document.getElementById("v" + vidas).style.backgroundColor =
              "#3EF150";
            vidas++;
            atualizarBarraVidas();
          }

    
          aumentarMoedas();

          console.log("Resposta correta!");
          silabasAcertadas()
          console.log("vc acertou:" +acertado);

          silabasSelecionadas = [];

          setTimeout(function () {
            acertoPergunta.style.display = "flex";
            acertou.style.display = 'flex';
          }, 700);

          setTimeout(function () {
          
            frutaSrc = "Falas Jogo Silabas/Resposta correta.mp3";
            audio.src = frutaSrc;
            audio.volume = 0.2;
            audio.play();
          
          }, 1300);

          // Avança para a próxima pergunta
          audioAtual++;
          perguntaAtual++;
          if (perguntaAtual < perguntas.length) {
            setTimeout(function () {
          
              retorne.style.display = "none";
              acertou.style.display = "none";
              acertoPergunta.style.display = "none";

          

              console.log(audioFruta[audioAtual]);

              frutaSrc = audioFruta[audioAtual];
              audio.src = frutaSrc;
              audio.volume = 1;
              audio.play();

              console.log(perguntas[perguntaAtual]);
              imgFruta = perguntas[perguntaAtual];
              fruta.src = imgFruta;

              // SILABAS MELANCIA

              box3.style.display = "block";
              box4.style.display = "block";

              imgSilaba = "img/jogoFruta/silabas/A1.svg";
              silaba4.src = imgSilaba;
              imgSilaba = "img/jogoFruta/silabas/ME1.svg";
              silaba3.src = imgSilaba;
              imgSilaba = "img/jogoFruta/silabas/CI1.svg";
              silaba2.src = imgSilaba;
              imgSilaba = "img/jogoFruta/silabas/LAN1.svg";
              silaba1.src = imgSilaba;

              areaSilabas = [];
              sil1.src = "";
              sil2.src = "";
              sil3.src = "";
              sil1.style.display = "none";
              sil2.style.display = "none";
              sil3.style.display = "none";
              sil4.style.display = "none";
              silaba1.style.display = "block";
              silaba2.style.display = "block";
              silaba3.style.display = "block";
              silaba4.style.display = "block";
            }, 3000);
          } else {
            setTimeout(function () {
              console.log("FIM!");
            }, 2500);
          }
        } else {
          console.log("Errada!");

          setTimeout(function () {
            errou.style.display = "flex";
            errada.style.display = "flex";
            frutaSrc = "Falas Jogo Silabas/Resposta errada.mp3";
            audio.src = frutaSrc;
            audio.volume = 0.2;
            audio.play();
           
          }, 1400);

          retorne.style.display = "none";
          silabasErradas();
          console.log("Erros:" + errado);

          // Limpar o array se a resposta estiver errada após ambas as sílabas serem informadas
          setTimeout(function () {
           
            errou.style.display = "none";
            errada.style.display = "none";

            areaSilabas = [];
            sil1.src = "";
            sil2.src = "";
            sil3.src = "";
            sil1.style.display = "none";
            sil2.style.display = "none";
            sil3.style.display = "none";
            sil4.style.display = "none";
            silaba1.style.display = "block";
            silaba2.style.display = "block";
            silaba3.style.display = "block";
            silaba4.style.display = "block";

            box1.classList.add("moveRetorne");
            box2.classList.add("moveRetorne");
            box3.classList.add("moveRetorne");
            box4.classList.add("moveRetorne");
            setTimeout(function () {
              box1.classList.remove("moveRetorne");
              box2.classList.remove("moveRetorne");
              box3.classList.remove("moveRetorne");
              box4.classList.remove("moveRetorne");
            }, 3000);

            audio.volume = 1;

            silabasSelecionadas = [];
          }, 3000);


          console.log(
            "Tentativa incorreta. Silabas selecionadas reiniciadas:",
            silabasSelecionadas
          );
          console.log(perguntas[perguntaAtual]);
        }
      }
    }
    // MELANCIA
    else if (perguntaAtual === 2 && audioAtual === 2) {
      if (silaba === silaba1) {
        silabaSrc = "Falas Jogo Silabas/melancia/selecionada.mp3";
        audio.src = silabaSrc;
        audio.play();
      } else if (silaba === silaba2) {
        silabaSrc = "Falas Jogo Silabas/melancia/selecionada.mp3";
        audio.src = silabaSrc;
        audio.play();
      } else if (silaba === silaba3) {
        silabaSrc = "Falas Jogo Silabas/melancia/selecionada.mp3";
        audio.src = silabaSrc;
        audio.play();
      } else if (silaba === silaba4) {
        silabaSrc = "Falas Jogo Silabas/melancia/selecionada.mp3";
        audio.src = silabaSrc;
        audio.play();
      }

      // Lógica similar à pergunta atual 0
      silabasSelecionadas.push(silaba.id);
      console.log("Silabas selecionadas:", silabasSelecionadas);

      areaSilabas.push(silaba.src.substring(silaba.src.indexOf("img")));
      console.log("Area Silabas:", areaSilabas);

      //limpa o campo da silaba selecionada
      silaba.style.display = "none";

      // Verifica se há uma imagem para exibir no sil1
      if (areaSilabas[0]) {
        // Define a imagem e torna o campo de imagem visível
        sil1.src = areaSilabas[0];
        sil1.style.display = "block";
        retorne.style.display = "block";
      }

      // Verifica se há uma imagem para exibir no sil2
      if (areaSilabas[1]) {
        // Define a imagem e torna o campo de imagem visível
        sil2.src = areaSilabas[1];
        sil2.style.display = "block";
        retorne.style.display = "block";
      }

      // Verifica se há uma imagem para exibir no sil3
      if (areaSilabas[2]) {
        // Define a imagem e torna o campo de imagem visível
        sil3.src = areaSilabas[2];
        sil3.style.display = "block";
        retorne.style.display = "block";
      }

      // Verifica se há uma imagem para exibir no sil4
      if (areaSilabas[3]) {
        // Define a imagem e torna o campo de imagem visível
        sil4.src = areaSilabas[3];
        sil4.style.display = "block";
        retorne.style.display = "block";
      }

      if (silabasSelecionadas.length === 4) {
        if (
          silabasSelecionadas[0] === "silaba3" &&
          silabasSelecionadas[1] === "silaba1" &&
          silabasSelecionadas[2] === "silaba2" &&
          silabasSelecionadas[3] === "silaba4"
        ) {
          if (vidas <= 8) {
            document.getElementById("v" + vidas).style.backgroundColor =
              "#3EF150";
            vidas++;
            atualizarBarraVidas();
          }

 

          aumentarMoedas();

          console.log("Resposta correta!");
          silabasAcertadas()
          console.log("vc acertou:" +acertado);

          silabasSelecionadas = [];

          setTimeout(function () {
            acertou.style.display = 'flex';
            acertoPergunta.style.display = "flex";
          }, 700);

          setTimeout(function () {
          
            frutaSrc = "Falas Jogo Silabas/Resposta correta.mp3";
            audio.src = frutaSrc;
            audio.volume = 0.2;
            audio.play();
        
          }, 1300);

          // Avança para a próxima pergunta
          audioAtual++;
          perguntaAtual++;
          if (perguntaAtual < perguntas.length) {
            setTimeout(function () {
            
              retorne.style.display = "none";
              acertou.style.display = "none";
              acertoPergunta.style.display = "none";

             

              console.log(audioFruta[audioAtual]);

              frutaSrc = audioFruta[audioAtual];
              audio.src = frutaSrc;
              audio.volume = 1;
              audio.play();

              console.log(perguntas[perguntaAtual]);
              silabasSelecionadas = [];
              imgFruta = perguntas[perguntaAtual];
              fruta.src = imgFruta;

              // SILABAS CEREJA

              box3.style.display = "block";
              box4.style.display = "none";

              imgSilaba = "img/jogoFruta/silabas/CE1.svg";
              silaba3.src = imgSilaba;
              imgSilaba = "img/jogoFruta/silabas/JA1.svg";
              silaba2.src = imgSilaba;
              imgSilaba = "img/jogoFruta/silabas/RE1.svg";
              silaba1.src = imgSilaba;

              areaSilabas = [];
              sil1.src = "";
              sil2.src = "";
              sil3.src = "";
              sil1.style.display = "none";
              sil2.style.display = "none";
              sil3.style.display = "none";
              sil4.style.display = "none";
              silaba1.style.display = "block";
              silaba2.style.display = "block";
              silaba3.style.display = "block";
              silaba4.style.display = "block";
            }, 3000);
          } else {
            setTimeout(function () {
              console.log("FIM!");
            }, 2500);
          }
        } else {
          console.log("Errada!");

          setTimeout(function () {
            errou.style.display = "flex";
            errada.style.display = "flex";
            frutaSrc = "Falas Jogo Silabas/Resposta errada.mp3";
            audio.src = frutaSrc;
            audio.volume = 0.2;
            audio.play();
           
          }, 1400);
      
          retorne.style.display = "none";
          silabasErradas();
          console.log("Erros:" + errado);

          // Limpar o array se a resposta estiver errada após ambas as sílabas serem informadas

          setTimeout(function () {
            errou.style.display = "none";
            errada.style.display = "none";

            areaSilabas = [];
            sil1.src = "";
            sil2.src = "";
            sil3.src = "";
            sil1.style.display = "none";
            sil2.style.display = "none";
            sil3.style.display = "none";
            sil4.style.display = "none";
            silaba1.style.display = "block";
            silaba2.style.display = "block";
            silaba3.style.display = "block";
            silaba4.style.display = "block";

            box1.classList.add("moveRetorne");
            box2.classList.add("moveRetorne");
            box3.classList.add("moveRetorne");
            box4.classList.add("moveRetorne");
            setTimeout(function () {
              box1.classList.remove("moveRetorne");
              box2.classList.remove("moveRetorne");
              box3.classList.remove("moveRetorne");
              box4.classList.remove("moveRetorne");
            }, 3000);

            audio.volume = 1;
            silabasSelecionadas = [];
          }, 3000);

          console.log(
            "Tentativa incorreta. Silabas selecionadas reiniciadas:",
            silabasSelecionadas
          );
          console.log(perguntas[perguntaAtual]);
        }
      }
    }
    // CEREJA
    else if (perguntaAtual === 3 && audioAtual === 3) {
      if (silaba === silaba1) {
        silabaSrc = "Falas Jogo Silabas/cereja/selecionada.mp3";
        audio.src = silabaSrc;
        audio.play();
      } else if (silaba === silaba2) {
        silabaSrc = "Falas Jogo Silabas/cereja/selecionada.mp3";
        audio.src = silabaSrc;
        audio.play();
      } else if (silaba === silaba3) {
        silabaSrc = "Falas Jogo Silabas/cereja/selecionada.mp3";
        audio.src = silabaSrc;
        audio.play();
      }

      // Lógica similar à pergunta atual 0
      silabasSelecionadas.push(silaba.id);
      console.log("Silabas selecionadas:", silabasSelecionadas);

      areaSilabas.push(silaba.src.substring(silaba.src.indexOf("img")));
      console.log("Area Silabas:", areaSilabas);

      //limpa o campo da silaba selecionada
      silaba.style.display = "none";

      // Verifica se há uma imagem para exibir no sil1
      if (areaSilabas[0]) {
        // Define a imagem e torna o campo de imagem visível
        sil1.src = areaSilabas[0];
        sil1.style.display = "block";
        retorne.style.display = "block";
      }

      // Verifica se há uma imagem para exibir no sil2
      if (areaSilabas[1]) {
        // Define a imagem e torna o campo de imagem visível
        sil2.src = areaSilabas[1];
        sil2.style.display = "block";
        retorne.style.display = "block";
      }

      // Verifica se há uma imagem para exibir no sil3
      if (areaSilabas[2]) {
        // Define a imagem e torna o campo de imagem visível
        sil3.src = areaSilabas[2];
        sil3.style.display = "block";
        retorne.style.display = "block";
      }

      // Verifica se há uma imagem para exibir no sil4
      if (areaSilabas[3]) {
        // Define a imagem e torna o campo de imagem visível
        sil4.src = areaSilabas[3];
        sil4.style.display = "block";
        retorne.style.display = "block";
      }

      if (silabasSelecionadas.length === 3) {
        if (
          silabasSelecionadas[0] === "silaba3" &&
          silabasSelecionadas[1] === "silaba1" &&
          silabasSelecionadas[2] === "silaba2"
        ) {
          if (vidas <= 8) {
            document.getElementById("v" + vidas).style.backgroundColor =
              "#3EF150";
            vidas++;
            atualizarBarraVidas();
          }

      

          aumentarMoedas();

          console.log("Resposta correta!");
          silabasAcertadas()
          console.log("vc acertou:" +acertado);

          silabasSelecionadas = [];

          setTimeout(function () {
            acertou.style.display = 'flex';
            acertoPergunta.style.display = "flex";
          }, 700);

          setTimeout(function () {
           

            frutaSrc = "Falas Jogo Silabas/Resposta correta.mp3";
            audio.src = frutaSrc;
            audio.volume = 0.2;
            audio.play();
           

          }, 1300);

          // Avança para a próxima pergunta
          audioAtual++;
          perguntaAtual++;
          if (perguntaAtual < perguntas.length) {
            setTimeout(function () {
          
              retorne.style.display = "none";
              acertou.style.display = "none";
              acertoPergunta.style.display = "none";


              
              console.log(audioFruta[audioAtual]);

              frutaSrc = audioFruta[audioAtual];
              audio.src = frutaSrc;
              audio.volume = 1;
              audio.play();

              console.log(perguntas[perguntaAtual]);
              silabasSelecionadas = [];
              imgFruta = perguntas[perguntaAtual];
              fruta.src = imgFruta;

              // SILABAS MORANGO

              box3.style.display = "block";

              imgSilaba = "img/jogoFruta/silabas/GO1.svg";
              silaba3.src = imgSilaba;
              imgSilaba = "img/jogoFruta/silabas/MO1.svg";
              silaba2.src = imgSilaba;
              imgSilaba = "img/jogoFruta/silabas/RAN1.svg";
              silaba1.src = imgSilaba;

              areaSilabas = [];
              sil1.src = "";
              sil2.src = "";
              sil3.src = "";
              sil1.style.display = "none";
              sil2.style.display = "none";
              sil3.style.display = "none";
              sil4.style.display = "none";
              silaba1.style.display = "block";
              silaba2.style.display = "block";
              silaba3.style.display = "block";
              silaba4.style.display = "block";
            }, 3000);
          } else {
            setTimeout(function () {
              console.log("FIM!");
            }, 2500);
          }
        } else {
          console.log("Errada!");

          setTimeout(function () {
            errou.style.display = "flex";
            errada.style.display = "flex";
            frutaSrc = "Falas Jogo Silabas/Resposta errada.mp3";
            audio.src = frutaSrc;
            audio.volume = 0.2;
            audio.play();
           
          }, 1400);
        
          retorne.style.display = "none";
          silabasErradas();
          console.log("Erros:" + errado);

          // Limpar o array se a resposta estiver errada após ambas as sílabas serem informadas

          setTimeout(function () {
       
            errou.style.display = "none";
            errada.style.display = "none";

            areaSilabas = [];
            sil1.src = "";
            sil2.src = "";
            sil3.src = "";
            sil1.style.display = "none";
            sil2.style.display = "none";
            sil3.style.display = "none";
            sil4.style.display = "none";
            silaba1.style.display = "block";
            silaba2.style.display = "block";
            silaba3.style.display = "block";
            silaba4.style.display = "block";

            box1.classList.add("moveRetorne");
            box2.classList.add("moveRetorne");
            box3.classList.add("moveRetorne");
            box4.classList.add("moveRetorne");
            setTimeout(function () {
              box1.classList.remove("moveRetorne");
              box2.classList.remove("moveRetorne");
              box3.classList.remove("moveRetorne");
              box4.classList.remove("moveRetorne");
            }, 3000);

            audio.volume = 1;
            silabasSelecionadas = [];
          }, 3000);
          console.log(
            "Tentativa incorreta. Silabas selecionadas reiniciadas:",
            silabasSelecionadas
          );
          console.log(perguntas[perguntaAtual]);
        }
      }
    }
    // MORANGO
    else if (perguntaAtual === 4 && audioAtual === 4) {
      if (silaba === silaba1) {
        silabaSrc = "Falas Jogo Silabas/morango/selecionada.mp3";
        audio.src = silabaSrc;
        audio.play();
      } else if (silaba === silaba2) {
        silabaSrc = "Falas Jogo Silabas/morango/selecionada.mp3";
        audio.src = silabaSrc;
        audio.play();
      } else if (silaba === silaba3) {
        silabaSrc = "Falas Jogo Silabas/morango/selecionada.mp3";
        audio.src = silabaSrc;
        audio.play();
      }

      // Lógica similar à pergunta atual 0
      silabasSelecionadas.push(silaba.id);
      console.log("Silabas selecionadas:", silabasSelecionadas);

      areaSilabas.push(silaba.src.substring(silaba.src.indexOf("img")));
      console.log("Area Silabas:", areaSilabas);

      //limpa o campo da silaba selecionada
      silaba.style.display = "none";

      // Verifica se há uma imagem para exibir no sil1
      if (areaSilabas[0]) {
        // Define a imagem e torna o campo de imagem visível
        sil1.src = areaSilabas[0];
        sil1.style.display = "block";
        retorne.style.display = "block";
      }

      // Verifica se há uma imagem para exibir no sil2
      if (areaSilabas[1]) {
        // Define a imagem e torna o campo de imagem visível
        sil2.src = areaSilabas[1];
        sil2.style.display = "block";
        retorne.style.display = "block";
      }

      // Verifica se há uma imagem para exibir no sil3
      if (areaSilabas[2]) {
        // Define a imagem e torna o campo de imagem visível
        sil3.src = areaSilabas[2];
        sil3.style.display = "block";
        retorne.style.display = "block";
      }

      // Verifica se há uma imagem para exibir no sil4
      if (areaSilabas[3]) {
        // Define a imagem e torna o campo de imagem visível
        sil4.src = areaSilabas[3];
        sil4.style.display = "block";
        retorne.style.display = "block";
      }

      if (silabasSelecionadas.length === 3) {
        if (
          silabasSelecionadas[0] === "silaba2" &&
          silabasSelecionadas[1] === "silaba1" &&
          silabasSelecionadas[2] === "silaba3"
        ) {
          if (vidas <= 8) {
            document.getElementById("v" + vidas).style.backgroundColor =
              "#3EF150";
            vidas++;
            atualizarBarraVidas();
          }

        
          aumentarMoedas();

          console.log("Resposta correta!");
          silabasAcertadas()
          console.log("vc acertou:" +acertado);

          silabasSelecionadas = [];

          setTimeout(function () {
            acertoPergunta.style.display = "flex";
            acertou.style.display = 'flex';
          }, 700);

          setTimeout(function () {
           
            frutaSrc = "Falas Jogo Silabas/Resposta correta.mp3";
            audio.src = frutaSrc;
            audio.volume = 0.2;
            audio.play();

          }, 1300);

          // Avança para a próxima pergunta
          audioAtual++;
          perguntaAtual++;
          if (perguntaAtual < perguntas.length) {
            setTimeout(function () {
              
              retorne.style.display = "none";
              acertou.style.display = "none";
              acertoPergunta.style.display = "none";


              console.log(audioFruta[audioAtual]);

              frutaSrc = audioFruta[audioAtual];
              audio.src = frutaSrc;
              audio.volume = 1;
              audio.play();

              console.log(perguntas[perguntaAtual]);
              silabasSelecionadas = [];
              imgFruta = perguntas[perguntaAtual];
              fruta.src = imgFruta;

              // SILABAS ABACAXI

              box3.style.display = "block";
              box4.style.display = "block";

              imgSilaba = "img/jogoFruta/silabas/A2.svg";
              silaba3.src = imgSilaba;
              imgSilaba = "img/jogoFruta/silabas/XI1.svg";
              silaba2.src = imgSilaba;
              imgSilaba = "img/jogoFruta/silabas/BA2.svg";
              silaba1.src = imgSilaba;
              imgSilaba = "img/jogoFruta/silabas/CA1.svg";
              silaba4.src = imgSilaba;

              areaSilabas = [];
              sil1.src = "";
              sil2.src = "";
              sil3.src = "";
              sil1.style.display = "none";
              sil2.style.display = "none";
              sil3.style.display = "none";
              sil4.style.display = "none";
              silaba1.style.display = "block";
              silaba2.style.display = "block";
              silaba3.style.display = "block";
              silaba4.style.display = "block";
            }, 3000);
          } else {
            setTimeout(function () {
              console.log("FIM!");
            }, 2500);
          }
        } else {
          console.log("Errada!");

          
          setTimeout(function () {
            errou.style.display = "flex";
            errada.style.display = "flex";
            frutaSrc = "Falas Jogo Silabas/Resposta errada.mp3";
            audio.src = frutaSrc;
            audio.volume = 0.2;
            audio.play();
           
          }, 1400);
      
          retorne.style.display = "none";
          silabasErradas();
          console.log("Erros:" + errado);

          // Limpar o array se a resposta estiver errada após ambas as sílabas serem informadas

          setTimeout(function () {
            errou.style.display = "none";
            errada.style.display = "none";

            areaSilabas = [];
            sil1.src = "";
            sil2.src = "";
            sil3.src = "";
            sil1.style.display = "none";
            sil2.style.display = "none";
            sil3.style.display = "none";
            sil4.style.display = "none";
            silaba1.style.display = "block";
            silaba2.style.display = "block";
            silaba3.style.display = "block";
            silaba4.style.display = "block";

            box1.classList.add("moveRetorne");
            box2.classList.add("moveRetorne");
            box3.classList.add("moveRetorne");
            box4.classList.add("moveRetorne");
            setTimeout(function () {
              box1.classList.remove("moveRetorne");
              box2.classList.remove("moveRetorne");
              box3.classList.remove("moveRetorne");
              box4.classList.remove("moveRetorne");
            }, 3000);


            audio.volume = 1;
            silabasSelecionadas = [];
          }, 3000);
          console.log(
            "Tentativa incorreta. Silabas selecionadas reiniciadas:",
            silabasSelecionadas
          );
          console.log(perguntas[perguntaAtual]);
        }
      }
    }
    // ABACAXI
    else if (perguntaAtual === 5 && audioAtual === 5) {
      if (silaba === silaba1) {
        silabaSrc = "Falas Jogo Silabas/abacaxi/selecionada.mp3";
        audio.src = silabaSrc;
        audio.play();
      } else if (silaba === silaba2) {
        silabaSrc = "Falas Jogo Silabas/abacaxi/selecionada.mp3";
        audio.src = silabaSrc;
        audio.play();
      } else if (silaba === silaba3) {
        silabaSrc = "Falas Jogo Silabas/abacaxi/selecionada.mp3";
        audio.src = silabaSrc;
        audio.play();
      } else if (silaba === silaba4) {
        silabaSrc = "Falas Jogo Silabas/abacaxi/selecionada.mp3";
        audio.src = silabaSrc;
        audio.play();
      }

      // Lógica similar à pergunta atual 0
      silabasSelecionadas.push(silaba.id);
      console.log("Silabas selecionadas:", silabasSelecionadas);

      areaSilabas.push(silaba.src.substring(silaba.src.indexOf("img")));
      console.log("Area Silabas:", areaSilabas);

      //limpa o campo da silaba selecionada
      silaba.style.display = "none";

      // Verifica se há uma imagem para exibir no sil1
      if (areaSilabas[0]) {
        // Define a imagem e torna o campo de imagem visível
        sil1.src = areaSilabas[0];
        sil1.style.display = "block";
        retorne.style.display = "block";
      }

      // Verifica se há uma imagem para exibir no sil2
      if (areaSilabas[1]) {
        // Define a imagem e torna o campo de imagem visível
        sil2.src = areaSilabas[1];
        sil2.style.display = "block";
        retorne.style.display = "block";
      }

      // Verifica se há uma imagem para exibir no sil3
      if (areaSilabas[2]) {
        // Define a imagem e torna o campo de imagem visível
        sil3.src = areaSilabas[2];
        sil3.style.display = "block";
        retorne.style.display = "block";
      }

      // Verifica se há uma imagem para exibir no sil4
      if (areaSilabas[3]) {
        // Define a imagem e torna o campo de imagem visível
        sil4.src = areaSilabas[3];
        sil4.style.display = "block";
        retorne.style.display = "block";
      }

      if (silabasSelecionadas.length === 4) {
        if (
          silabasSelecionadas[0] === "silaba3" &&
          silabasSelecionadas[1] === "silaba1" &&
          silabasSelecionadas[2] === "silaba4" &&
          silabasSelecionadas[3] === "silaba2"
        ) {
          if (vidas <= 8) {
            document.getElementById("v" + vidas).style.backgroundColor =
              "#3EF150";
            vidas++;
            atualizarBarraVidas();
          }

          

          aumentarMoedas();

          console.log("Resposta correta!");
          silabasAcertadas()
          console.log("vc acertou:" +acertado);

          silabasSelecionadas = [];

          setTimeout(function () {
            acertoPergunta.style.display = "flex";
            acertou.style.display = 'flex';
          }, 700);

          setTimeout(function () {
            
            frutaSrc = "Falas Jogo Silabas/Resposta correta.mp3";
            audio.src = frutaSrc;
            audio.volume = 0.2;
            audio.play();

          }, 1300);

          // Avança para a próxima pergunta
          audioAtual++;
          perguntaAtual++;
          if (perguntaAtual < perguntas.length) {
            setTimeout(function () {
              
              retorne.style.display = "none";
              acertou.style.display = "none";
              acertoPergunta.style.display = "none";

              

              console.log(audioFruta[audioAtual]);

              frutaSrc = audioFruta[audioAtual];
              audio.src = frutaSrc;
              audio.volume = 1;
              audio.play();

              console.log(perguntas[perguntaAtual]);
              silabasSelecionadas = [];
              imgFruta = perguntas[perguntaAtual];
              fruta.src = imgFruta;

              // SILABAS LARANJA

              box3.style.display = "block";
              box4.style.display = "none";

              imgSilaba = "img/jogoFruta/silabas/RAN2.svg";
              silaba3.src = imgSilaba;
              imgSilaba = "img/jogoFruta/silabas/JA1.svg";
              silaba2.src = imgSilaba;
              imgSilaba = "img/jogoFruta/silabas/LA1.svg";
              silaba1.src = imgSilaba;

              areaSilabas = [];
              sil1.src = "";
              sil2.src = "";
              sil3.src = "";
              sil4.src = "";
              sil1.style.display = "none";
              sil2.style.display = "none";
              sil3.style.display = "none";
              sil4.style.display = "none";
              silaba1.style.display = "block";
              silaba2.style.display = "block";
              silaba3.style.display = "block";
              silaba4.style.display = "block";
            }, 3000);
          } else {
            setTimeout(function () {
              console.log("FIM!");
            }, 2500);
          }
        } else {
          console.log("Errada!");

          setTimeout(function () {
            errou.style.display = "flex";
            errada.style.display = "flex";
            frutaSrc = "Falas Jogo Silabas/Resposta errada.mp3";
            audio.src = frutaSrc;
            audio.volume = 0.2;
            audio.play();
           
          }, 1400);
    
          retorne.style.display = "none";
          silabasErradas();
          console.log("Erros:" + errado);

          // Limpar o array se a resposta estiver errada após ambas as sílabas serem informadas

          setTimeout(function () {
            errou.style.display = "none";
            errada.style.display = "none";

            areaSilabas = [];
            sil1.src = "";
            sil2.src = "";
            sil3.src = "";
            sil4.src = "";
            sil1.style.display = "none";
            sil2.style.display = "none";
            sil3.style.display = "none";
            sil4.style.display = "none";
            silaba1.style.display = "block";
            silaba2.style.display = "block";
            silaba3.style.display = "block";
            silaba4.style.display = "block";

            box1.classList.add("moveRetorne");
            box2.classList.add("moveRetorne");
            box3.classList.add("moveRetorne");
            box4.classList.add("moveRetorne");
            setTimeout(function () {
              box1.classList.remove("moveRetorne");
              box2.classList.remove("moveRetorne");
              box3.classList.remove("moveRetorne");
              box4.classList.remove("moveRetorne");
            }, 3000);


            audio.volume = 1;
            silabasSelecionadas = [];
          }, 3000);

          console.log(
            "Tentativa incorreta. Silabas selecionadas reiniciadas:",
            silabasSelecionadas
          );
          console.log(perguntas[perguntaAtual]);
        }
      }
    }
    // LARANJA
    else if (perguntaAtual === 6 && audioAtual === 6) {
      if (silaba === silaba1) {
        silabaSrc = "Falas Jogo Silabas/laranja/selecionada.mp3";
        audio.src = silabaSrc;
        audio.play();
      } else if (silaba === silaba2) {
        silabaSrc = "Falas Jogo Silabas/laranja/selecionada.mp3";
        audio.src = silabaSrc;
        audio.play();
      } else if (silaba === silaba3) {
        silabaSrc = "Falas Jogo Silabas/laranja/selecionada.mp3";
        audio.src = silabaSrc;
        audio.play();
      }

      // Lógica similar à pergunta atual 0
      silabasSelecionadas.push(silaba.id);
      console.log("Silabas selecionadas:", silabasSelecionadas);

      areaSilabas.push(silaba.src.substring(silaba.src.indexOf("img")));
      console.log("Area Silabas:", areaSilabas);

      //limpa o campo da silaba selecionada
      silaba.style.display = "none";

      // Verifica se há uma imagem para exibir no sil1
      if (areaSilabas[0]) {
        // Define a imagem e torna o campo de imagem visível
        sil1.src = areaSilabas[0];
        sil1.style.display = "block";
        retorne.style.display = "block";
      }

      // Verifica se há uma imagem para exibir no sil2
      if (areaSilabas[1]) {
        // Define a imagem e torna o campo de imagem visível
        sil2.src = areaSilabas[1];
        sil2.style.display = "block";
        retorne.style.display = "block";
      }

      // Verifica se há uma imagem para exibir no sil3
      if (areaSilabas[2]) {
        // Define a imagem e torna o campo de imagem visível
        sil3.src = areaSilabas[2];
        sil3.style.display = "block";
        retorne.style.display = "block";
      }

      // Verifica se há uma imagem para exibir no sil4
      if (areaSilabas[3]) {
        // Define a imagem e torna o campo de imagem visível
        sil4.src = areaSilabas[3];
        sil4.style.display = "block";
        retorne.style.display = "block";
      }

      if (silabasSelecionadas.length === 3) {
        if (
          silabasSelecionadas[0] === "silaba1" &&
          silabasSelecionadas[1] === "silaba3" &&
          silabasSelecionadas[2] === "silaba2"
        ) {
          if (vidas <= 8) {
            document.getElementById("v" + vidas).style.backgroundColor =
              "#3EF150";
            vidas++;
            atualizarBarraVidas();
          }

         

          aumentarMoedas();

          console.log("Resposta correta!");
          silabasAcertadas()
          console.log("vc acertou:" +acertado);

          silabasSelecionadas = [];

          setTimeout(function () {
            acertou.style.display = 'flex';
            acertoPergunta.style.display = "flex";
          }, 700);

          setTimeout(function () {
            
            frutaSrc = "Falas Jogo Silabas/Resposta correta.mp3";
            audio.src = frutaSrc;
            audio.volume = 0.2;
            audio.play();

          }, 1300);

          // Avança para a próxima pergunta
          audioAtual++;
          perguntaAtual++;
          if (perguntaAtual < perguntas.length) {
            setTimeout(function () {

              acertou.style.display = "none";
              retorne.style.display = "none";
              acertoPergunta.style.display = "none";

             

              console.log(audioFruta[audioAtual]);

              frutaSrc = audioFruta[audioAtual];
              audio.src = frutaSrc;
              audio.volume = 1;
              audio.play();

              console.log(perguntas[perguntaAtual]);
              silabasSelecionadas = [];
              imgFruta = perguntas[perguntaAtual];
              fruta.src = imgFruta;

              // SILABAS PERA

              box3.style.display = "none";
              box4.style.display = "none";

              imgSilaba = "img/jogoFruta/silabas/PE.svg";
              silaba2.src = imgSilaba;
              imgSilaba = "img/jogoFruta/silabas/RA2.svg";
              silaba1.src = imgSilaba;

              areaSilabas = [];
              sil1.src = "";
              sil2.src = "";
              sil3.src = "";
              sil1.style.display = "none";
              sil2.style.display = "none";
              sil3.style.display = "none";
              sil4.style.display = "none";
              silaba1.style.display = "block";
              silaba2.style.display = "block";
              silaba3.style.display = "block";
              silaba4.style.display = "block";
            }, 3000);
          } else {
            setTimeout(function () {
              console.log("FIM!");
            }, 2500);
          }
        } else {
          console.log("Errada!");

          setTimeout(function () {
            errou.style.display = "flex";
            errada.style.display = "flex";
            frutaSrc = "Falas Jogo Silabas/Resposta errada.mp3";
            audio.src = frutaSrc;
            audio.volume = 0.2;
            audio.play();
           
          }, 1400);
         
          retorne.style.display = "none";
          silabasErradas();
          console.log("Erros:" + errado);

          // Limpar o array se a resposta estiver errada após ambas as sílabas serem informadas
          setTimeout(function () {

            errou.style.display = "none";
            errada.style.display = "none";
           
            acertou.style.display = "none";

            areaSilabas = [];
            sil1.src = "";
            sil2.src = "";
            sil3.src = "";
            sil1.style.display = "none";
            sil2.style.display = "none";
            sil3.style.display = "none";
            sil4.style.display = "none";
            silaba1.style.display = "block";
            silaba2.style.display = "block";
            silaba3.style.display = "block";
            silaba4.style.display = "block";

            box1.classList.add("moveRetorne");
            box2.classList.add("moveRetorne");
            box3.classList.add("moveRetorne");
            box4.classList.add("moveRetorne");
            setTimeout(function () {
              box1.classList.remove("moveRetorne");
              box2.classList.remove("moveRetorne");
              box3.classList.remove("moveRetorne");
              box4.classList.remove("moveRetorne");
            }, 3000);

            audio.volume = 1;
            silabasSelecionadas = [];
          }, 3000);
          console.log(
            "Tentativa incorreta. Silabas selecionadas reiniciadas:",
            silabasSelecionadas
          );
          console.log(perguntas[perguntaAtual]);
        }
      }
    }
    // FIM -> RESPONDER PERA!
    else if (perguntaAtual === 7) {
      if (silaba === silaba1) {
        silabaSrc = "Falas Jogo Silabas/pera/selecionada.mp3";
        audio.src = silabaSrc;
        audio.play();
      } else if (silaba === silaba2) {
        silabaSrc = "Falas Jogo Silabas/pera/selecionada.mp3";
        audio.src = silabaSrc;
        audio.play();
      }

      // Lógica similar à pergunta atual 0
      silabasSelecionadas.push(silaba.id);
      console.log("Silabas selecionadas:", silabasSelecionadas);

      areaSilabas.push(silaba.src.substring(silaba.src.indexOf("img")));
      console.log("Area Silabas:", areaSilabas);

      //limpa o campo da silaba selecionada
      silaba.style.display = "none";

      // Verifica se há uma imagem para exibir no sil1
      if (areaSilabas[0]) {
        // Define a imagem e torna o campo de imagem visível
        sil1.src = areaSilabas[0];
        sil1.style.display = "block";
        retorne.style.display = "block";
      }

      // Verifica se há uma imagem para exibir no sil2
      if (areaSilabas[1]) {
        // Define a imagem e torna o campo de imagem visível
        sil2.src = areaSilabas[1];
        sil2.style.display = "block";
        retorne.style.display = "block";
      }

      // Verifica se há uma imagem para exibir no sil3
      if (areaSilabas[2]) {
        // Define a imagem e torna o campo de imagem visível
        sil3.src = areaSilabas[2];
        sil3.style.display = "block";
        retorne.style.display = "block";
      }

      // Verifica se há uma imagem para exibir no sil4
      if (areaSilabas[3]) {
        // Define a imagem e torna o campo de imagem visível
        sil4.src = areaSilabas[3];
        sil4.style.display = "block";
        retorne.style.display = "block";
      }

      if (silabasSelecionadas.length === 2) {
        if (
          silabasSelecionadas[0] === "silaba2" &&
          silabasSelecionadas[1] === "silaba1"
        ) {
          if (vidas <= 8) {
            document.getElementById("v" + vidas).style.backgroundColor =
              "#3EF150";
            vidas++;
            atualizarBarraVidas();
          }


          aumentarMoedas();

          console.log("Resposta correta!");
          silabasAcertadas()
          console.log("vc acertou:" +acertado);

          silabasSelecionadas = [];

          setTimeout(function () {
            acertou.style.display = 'flex';
            acertoPergunta.style.display = "flex";
          }, 700);

          setTimeout(function () {
      
            frutaSrc = "Falas Jogo Silabas/Resposta correta.mp3";
            audio.src = frutaSrc;
            audio.volume = 0.2;
            audio.play();

          }, 1300);

          // Avança para a próxima pergunta
          audioAtual++;
          perguntaAtual++;
          if (perguntaAtual < perguntas.length) {
            setTimeout(function () {
    
              retorne.style.display = "none";
              acertou.style.display = "none";
              acertoPergunta.style.display = "none";

          

              console.log(audioFruta[audioAtual]);

              frutaSrc = audioFruta[audioAtual];
              audio.src = frutaSrc;
              audio.volume = 1;
              audio.play();

              console.log(perguntas[perguntaAtual]);
              silabasSelecionadas = [];
              imgFruta = perguntas[perguntaAtual];
              fruta.src = imgFruta;

              areaSilabas = [];
              sil1.src = "";
              sil2.src = "";
              sil1.style.display = "none";
              sil2.style.display = "none";
              sil3.style.display = "none";
              sil4.style.display = "none";
              silaba1.style.display = "block";
              silaba2.style.display = "block";
              silaba3.style.display = "block";
              silaba4.style.display = "block";
            }, 3000);
          } else {
          
            setTimeout(function () {
              let tempoAtual = cronometroElement.textContent;

              // Exibir o tempo atual
              console.log("Tempo atual: " + tempoAtual);
              cronometro_fim.textContent = tempoAtual;
              cronometro_fim2.textContent = tempoAtual;
              
              // Parar o cronômetro
              clearInterval(intervalId);
              
              console.log("FIM!");
         
              fim.style.display = "flex";
              acertoPergunta.style.display = "none";
              retorne.style.display = "none";
              acertou.style.display = "none";
              silabaSrc = "Audios/Fim de Jogo.mp3";
              audio.src = silabaSrc;
              audio.play();

              pontos_fim.textContent = moedas;
              pontos_fim2.textContent = moedas;
              pontos_fim3.textContent = moedas;
              pontos_errados.textContent = errado;
              pontos_errados2.textContent = errado;
              pontos_errados3.textContent = errado;
              pontos_acertos.textContent = acertado;
              pontos_acertos2.textContent = acertado;

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

           
            }, 3000);
          }
        } else {
          console.log("Errada!");

          setTimeout(function () {
            errou.style.display = "flex";
            errada.style.display = "flex";
            frutaSrc = "Falas Jogo Silabas/Resposta errada.mp3";
            audio.src = frutaSrc;
            audio.volume = 0.2;
            audio.play();
           
          }, 1400);
          
       
          retorne.style.display = "none";
          silabasErradas();
          console.log("Erros:" + errado);

          // Limpar o array se a resposta estiver errada após ambas as sílabas serem informadas

          setTimeout(function () {

            errou.style.display = "none";
            errada.style.display = "none";
            
            acertou.style.display = "none";

            areaSilabas = [];
            sil1.src = "";
            sil2.src = "";
            sil3.src = "";
            sil1.style.display = "none";
            sil2.style.display = "none";
            sil3.style.display = "none";
            sil4.style.display = "none";
            silaba1.style.display = "block";
            silaba2.style.display = "block";
            silaba3.style.display = "block";
            silaba4.style.display = "block";

            box1.classList.add("moveRetorne");
            box2.classList.add("moveRetorne");
            box3.classList.add("moveRetorne");
            box4.classList.add("moveRetorne");
            setTimeout(function () {
              box1.classList.remove("moveRetorne");
              box2.classList.remove("moveRetorne");
              box3.classList.remove("moveRetorne");
              box4.classList.remove("moveRetorne");
            }, 3000);

            audio.volume = 1;
            silabasSelecionadas = [];
          }, 3000);
          console.log(
            "Tentativa incorreta. Silabas selecionadas reiniciadas:",
            silabasSelecionadas
          );
          console.log(perguntas[perguntaAtual]);
        }
      }
    }


    retorne.addEventListener("click", function() {
      // Carrega o novo áudio
      audioRetorne.src = "Falas Jogo Silabas/retornando.mp3";
      
      // Event listener para verificar se o áudio foi carregado
      audioRetorne.addEventListener("loadedmetadata", function() {
        // Reproduz o áudio
        audioRetorne.play();
        audioRetorne.volume = 0.6;
        
        // Event listener para pausar o áudio após um curto período de tempo (500ms)
        setTimeout(function() {
          // Verifica se o áudio está sendo reproduzido corretamente
          if (!audioRetorne.paused) {
            // Pausa o áudio
            audioRetorne.pause();
          }
        }, 700);
      });
    });
    
  }

  // Adiciona event listener aos elementos das sílabas
  silaba1.addEventListener("click", function () {
    responderPergunta(this);
  });
  silaba2.addEventListener("click", function () {
    responderPergunta(this);
  });
  silaba3.addEventListener("click", function () {
    responderPergunta(this);
  });
  silaba4.addEventListener("click", function () {
    responderPergunta(this);
  });

  // BUTTON PARA REPETIR PERGUNTA
  btnAudio.addEventListener("click", function () {
    console.log(
      "REPETINDO PERGUNTA: " + perguntas[perguntaAtual] + audioFruta[audioAtual]
    );

    console.log(audioFruta[audioAtual]);

    frutaSrc = audioFruta[audioAtual];
    audio.src = frutaSrc;
    audio.play();
  });

  // Event listener para o botão "retorne"
  retorne.addEventListener("click", function () {
    // Verifica se há sílabas selecionadas para remover
    if (silabasSelecionadas.length > 0) {
      // Remove a última sílaba selecionada do array
      var ultimaSilabaSelecionada = silabasSelecionadas.pop();

      // Exibe a última sílaba selecionada novamente
      var silabaSelecionada = document.getElementById(ultimaSilabaSelecionada);
      silabaSelecionada.style.display = "block";

      // Atualiza os campos de imagem correspondentes para ocultar a sílaba
      var indiceSilaba = areaSilabas.indexOf(
        silabaSelecionada.src.substring(silabaSelecionada.src.indexOf("img"))
      );
      if (indiceSilaba !== -1) {
        areaSilabas.splice(indiceSilaba, 1);
        if (indiceSilaba === 0) {
          sil1.src = "";
          sil1.style.display = "none";
        } else if (indiceSilaba === 1) {
          sil2.src = "";
          sil2.style.display = "none";
        } else if (indiceSilaba === 2) {
          sil3.src = "";
          sil3.style.display = "none";
        } else if (indiceSilaba === 3) {
          sil4.src = "";
          sil4.style.display = "none";
        }
      }
    }

    // Se o array de sílabas selecionadas estiver vazio, reexibe todas as sílabas originais
    if (silabasSelecionadas.length === 0) {
      sil1.src = "";
      sil2.src = "";
      sil3.src = "";
      sil4.src = "";
      sil1.style.display = "none";
      sil2.style.display = "none";
      sil3.style.display = "none";
      sil4.style.display = "none";

      areaSilabas = []; // Limpa o array de áreas de

      retorne.style.display = "none";
    }

    console.log("exibindo tudo:", areaSilabas);
  });
}


/*document.getElementById('fecharCheia').style.display = 'none'

function openFullscreen() {
  if (document.documentElement.requestFullscreen) {
    document.documentElement.requestFullscreen();
  } else if (document.documentElement.mozRequestFullScreen) { /* Firefox */
   /* document.documentElement.mozRequestFullScreen();
  } else if (document.documentElement.webkitRequestFullscreen) { /* Chrome, Safari e Opera */
  /*  document.documentElement.webkitRequestFullscreen();
  } else if (document.documentElement.msRequestFullscreen) { /* IE/Edge */
  /*  document.documentElement.msRequestFullscreen();
 }
  document.getElementById('fecharCheia').style.display = 'block'
  document.getElementById('abrirCheia').style.display = 'none'

}

// Opcional: fechar tela cheia

function closeFullscreen() {
  if (document.exitFullscreen) {
    document.exitFullscreen();
  } else if (document.mozCancelFullScreen) { /* Firefox */
   /* document.mozCancelFullScreen();
  } else if (document.webkitExitFullscreen) { /* Chrome, Safari e Opera */
   /* document.webkitExitFullscreen();
  } else if (document.msExitFullscreen) { /* IE/Edge */
  /*  document.msExitFullscreen();
  }
  document.getElementById('fecharCheia').style.display = 'none'
  document.getElementById('abrirCheia').style.display = 'block'
}*/

let fruta1 = document.getElementById("f1");
let fruta2 = document.getElementById("f2");
let fruta3 = document.getElementById("f3");
let fruta4 = document.getElementById("f4");
let fruta5 = document.getElementById("f5");
let fruta6 = document.getElementById("f6");
let fruta7 = document.getElementById("f7");
let fruta8 = document.getElementById("f8");

function limaparCard(){
  fruta1.style.transform = "none";
  fruta2.style.transform = "none";
  fruta3.style.transform = "none";
  fruta4.style.transform = "none";
  fruta5.style.transform = "none";
  fruta6.style.transform = "none";
  fruta7.style.transform = "none";
  fruta8.style.transform = "none";
}

fruta1.addEventListener('click', function() {
  limaparCard();
  // Exibe o modal
  audio.src = "Falas Jogo Silabas/maça/maça.mp3";
  audio.play();
  audio.volume = 1;
  fruta1.style.transform = "translateY(-20px)";
  fruta1.style.transition = "transform 0.5s ease";

  audio.addEventListener('ended', function() {
    fruta1.style.transform = "none";
  });
});
fruta2.addEventListener('click', function() {
  limaparCard();
  // Exibe o modal
  audio.src = "Falas Jogo Silabas/banana/banana.mp3";
  audio.play();
  audio.volume = 1;
  fruta2.style.transform = "translateY(-20px)";
  fruta2.style.transition = "transform 0.5s ease";
  
  audio.addEventListener('ended', function() {
    fruta2.style.transform = "none";
  });
});
fruta3.addEventListener('click', function() {
  limaparCard();

  // Exibe o modal
  audio.src = "Falas Jogo Silabas/melancia/melancia.mp3";
  audio.play();
  audio.volume = 1;
  fruta3.style.transform = "translateY(-20px)";
  fruta3.style.transition = "transform 0.5s ease";
  
  audio.addEventListener('ended', function() {
    fruta3.style.transform = "none";
  });

});
fruta4.addEventListener('click', function() {
  limaparCard();
  // Exibe o modal
  audio.src = "Falas Jogo Silabas/morango/morango.mp3";
  audio.play();
  audio.volume = 1;
  fruta4.style.transform = "translateY(-20px)";
  fruta4.style.transition = "transform 0.5s ease";
  
  audio.addEventListener('ended', function() {
    fruta4.style.transform = "none";
  });

});
fruta5.addEventListener('click', function() {
  limaparCard();
  // Exibe o modal
  audio.src = "Falas Jogo Silabas/pera/pera.mp3";
  audio.play();
  audio.volume = 1;
  fruta5.style.transform = "translateY(-20px)";
  fruta5.style.transition = "transform 0.5s ease";
  
  audio.addEventListener('ended', function() {
    fruta5.style.transform = "none";
  });

});
fruta6.addEventListener('click', function() {
  limaparCard();
  // Exibe o modal
  audio.src = "Falas Jogo Silabas/cereja/cereja.mp3";
  audio.play();
  audio.volume = 1;
  fruta6.style.transform = "translateY(-20px)";
  fruta6.style.transition = "transform 0.5s ease";
  
  audio.addEventListener('ended', function() {
    fruta6.style.transform = "none";
  });

});
fruta7.addEventListener('click', function() {
  limaparCard();
  // Exibe o modal
  audio.src = "Falas Jogo Silabas/abacaxi/abacaxi.mp3";
  audio.play();
  audio.volume = 1;
  fruta7.style.transform = "translateY(-20px)";
  fruta7.style.transition = "transform 0.5s ease";
  
  audio.addEventListener('ended', function() {
    fruta7.style.transform = "none";
  });
});
fruta8.addEventListener('click', function() {
  limaparCard();
  // Exibe o modal
  audio.src = "Falas Jogo Silabas/laranja/laranja.mp3";
  audio.play();
  audio.volume = 1;
  fruta8.style.transform = "translateY(-20px)";
  fruta8.style.transition = "transform 0.5s ease";
  
  audio.addEventListener('ended', function() {
    fruta8.style.transform = "none";
  });
});




// Seleciona o botão final
const btnFinal = document.getElementById('abrirModal');

// Seleciona o modal
const modal = document.getElementById('modal');

// Seleciona o elemento para fechar o modal
const closeBtn = document.querySelector('.close');

// Adiciona um evento de clique ao botão final
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







fazerPergunta();
