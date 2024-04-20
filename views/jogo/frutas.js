let imgFruta = "";
let imgSilaba = "";
let imgSil = "";

// VIDAS:
let vidas = 1;

// EXIBIR PONTOS NO FIM
let pontos_fim = document.getElementById("final_point");

// BOX INICIO DO JOGO!
const comeco = document.getElementById("boxComece");

// AUDIOS FRUTAS
let frutaSrc = "";

// AUDIOS SILABA
let silabaSrc = "";

// MOEDAS CONTAGEM
let moedas = 3;

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
const btnVerific = document.getElementById("verific");
const comece = document.getElementById("comece");

// ACERTOS
const acertou = document.getElementById("effeitoA");
const acerto = document.getElementById("acertouUp");

// ERROS
const errou = document.getElementById("errada");

// FIM DO JOGO
const fim = document.getElementById("finalizar");

let audio = new Audio();

// Atribui as imagens das sílabas e da fruta aos elementos correspondentes

// imgSilaba = 'img/jogoFruta/silabas/MA.svg'
// silaba3.src = imgSilaba

// Adiciona evento de clique ao botão de áudio

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
    silabaSrc = "Falas Jogo Silabas/junte as silabas corretas.mp3";

    audio.src = silabaSrc;
    audio.play();

    setTimeout(function () {
      console.log(audioFruta[audioAtual]);

      console.log(perguntas[perguntaAtual]);
      imgFruta = perguntas[perguntaAtual];
      fruta.src = imgFruta;

      imgSilaba = "img/jogoFruta/silabas/MA.svg";
      silaba2.src = imgSilaba;

      imgSilaba = "img/jogoFruta/silabas/ÇA.svg";
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

  let silabasSelecionadas = [];
  let areaSilabas = [];

  // Função para responder à pergunta
  function responderPergunta(silaba) {
    if (perguntaAtual === 0 && audioAtual === 0) {
      if (silaba === silaba1) {
        silabaSrc = "Falas Jogo Silabas/maça/ça.mp3";
        audio.src = silabaSrc;
        audio.play();
      } else if (silaba === silaba2) {
        silabaSrc = "Falas Jogo Silabas/maça/ma.mp3";
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
      }

      // Verifica se há uma imagem para exibir no sil2
      if (areaSilabas[1]) {
        // Define a imagem e torna o campo de imagem visível
        sil2.src = areaSilabas[1];
        sil2.style.display = "block";
      }

      // Verifica se há uma imagem para exibir no sil3
      if (areaSilabas[2]) {
        // Define a imagem e torna o campo de imagem visível
        sil3.src = areaSilabas[2];
        sil3.style.display = "block";
      }

      // Verifica se há uma imagem para exibir no sil4
      if (areaSilabas[3]) {
        // Define a imagem e torna o campo de imagem visível
        sil4.src = areaSilabas[3];
        sil4.style.display = "block";
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

          //cor do botão por acertar novamente
          btnVerific.style.borderColor = "#15BE26";
          btnVerific.style.backgroundColor = "#9CFFA5";

          setTimeout(function () {
            acertou.style.display = "flex";
            acerto.style.display = "block";

            frutaSrc = "Falas Jogo Silabas/acerto2.mp3";
            audio.src = frutaSrc;
            audio.volume = 0.2;
            audio.play();
          }, 1000);

          // Avança para a próxima pergunta
          audioAtual++;
          perguntaAtual++;
          if (perguntaAtual < perguntas.length) {
            setTimeout(function () {
              acertou.style.display = "none";

              //cor do botão cinza novamente
              btnVerific.style.borderColor = "#5A7C90";
              btnVerific.style.backgroundColor = "#79A2BB";

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

              imgSilaba = "img/jogoFruta/silabas/NA.svg";
              silaba3.src = imgSilaba;
              imgSilaba = "img/jogoFruta/silabas/BA.svg";
              silaba2.src = imgSilaba;
              imgSilaba = "img/jogoFruta/silabas/NA.svg";
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
            }, 2800);
          } else {
            setTimeout(function () {
              console.log("FIM!");
            }, 2500);
          }
        } else {
          console.log("Errada!");
          errou.style.display = "block";
          acertou.style.display = "flex";
          acerto.style.display = "none";

          setTimeout(function () {
            errou.style.display = "none";
            acertou.style.display = "none";

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
            }, 2000);

            silabasSelecionadas = [];
          }, 1500);

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
        silabaSrc = "Falas Jogo Silabas/banana/na2.mp3";
        audio.src = silabaSrc;
        audio.play();
      } else if (silaba === silaba2) {
        silabaSrc = "Falas Jogo Silabas/banana/ba.mp3";
        audio.src = silabaSrc;
        audio.play();
      } else if (silaba === silaba3) {
        silabaSrc = "Falas Jogo Silabas/banana/na1.mp3";
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
      }

      // Verifica se há uma imagem para exibir no sil2
      if (areaSilabas[1]) {
        // Define a imagem e torna o campo de imagem visível
        sil2.src = areaSilabas[1];
        sil2.style.display = "block";
      }

      // Verifica se há uma imagem para exibir no sil3
      if (areaSilabas[2]) {
        // Define a imagem e torna o campo de imagem visível
        sil3.src = areaSilabas[2];
        sil3.style.display = "block";
      }

      // Verifica se há uma imagem para exibir no sil4
      if (areaSilabas[3]) {
        // Define a imagem e torna o campo de imagem visível
        sil4.src = areaSilabas[3];
        sil4.style.display = "block";
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

          //cor do botão por acertar novamente
          btnVerific.style.borderColor = "#15BE26";
          btnVerific.style.backgroundColor = "#9CFFA5";
          aumentarMoedas();
          console.log("Resposta correta!");
          silabasSelecionadas = [];

          setTimeout(function () {
            acertou.style.display = "flex";
            acerto.style.display = "block";

            frutaSrc = "Falas Jogo Silabas/acerto2.mp3";
            audio.src = frutaSrc;
            audio.volume = 0.2;
            audio.play();
          }, 1000);

          // Avança para a próxima pergunta
          audioAtual++;
          perguntaAtual++;
          if (perguntaAtual < perguntas.length) {
            setTimeout(function () {
              acertou.style.display = "none";

              //cor do botão cinza novamente
              btnVerific.style.borderColor = "#5A7C90";
              btnVerific.style.backgroundColor = "#79A2BB";

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

              imgSilaba = "img/jogoFruta/silabas/A.svg";
              silaba4.src = imgSilaba;
              imgSilaba = "img/jogoFruta/silabas/ME.svg";
              silaba3.src = imgSilaba;
              imgSilaba = "img/jogoFruta/silabas/CI.svg";
              silaba2.src = imgSilaba;
              imgSilaba = "img/jogoFruta/silabas/LAN.svg";
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
            }, 2800);
          } else {
            setTimeout(function () {
              console.log("FIM!");
            }, 2500);
          }
        } else {
          console.log("Errada!");
          errou.style.display = "block";
          acertou.style.display = "flex";
          acerto.style.display = "none";
          // Limpar o array se a resposta estiver errada após ambas as sílabas serem informadas
          setTimeout(function () {
            errou.style.display = "none";
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
            }, 2000);

            silabasSelecionadas = [];
          }, 1000);
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
        silabaSrc = "Falas Jogo Silabas/melancia/lan.mp3";
        audio.src = silabaSrc;
        audio.play();
      } else if (silaba === silaba2) {
        silabaSrc = "Falas Jogo Silabas/melancia/ci.mp3";
        audio.src = silabaSrc;
        audio.play();
      } else if (silaba === silaba3) {
        silabaSrc = "Falas Jogo Silabas/melancia/me.mp3";
        audio.src = silabaSrc;
        audio.play();
      } else if (silaba === silaba4) {
        silabaSrc = "Falas Jogo Silabas/melancia/a.mp3";
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
      }

      // Verifica se há uma imagem para exibir no sil2
      if (areaSilabas[1]) {
        // Define a imagem e torna o campo de imagem visível
        sil2.src = areaSilabas[1];
        sil2.style.display = "block";
      }

      // Verifica se há uma imagem para exibir no sil3
      if (areaSilabas[2]) {
        // Define a imagem e torna o campo de imagem visível
        sil3.src = areaSilabas[2];
        sil3.style.display = "block";
      }

      // Verifica se há uma imagem para exibir no sil4
      if (areaSilabas[3]) {
        // Define a imagem e torna o campo de imagem visível
        sil4.src = areaSilabas[3];
        sil4.style.display = "block";
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

          //cor do botão por acertar novamente
          btnVerific.style.borderColor = "#15BE26";
          btnVerific.style.backgroundColor = "#9CFFA5";

          aumentarMoedas();

          console.log("Resposta correta!");
          silabasSelecionadas = [];

          setTimeout(function () {
            acertou.style.display = "flex";
            acerto.style.display = "block";

            frutaSrc = "Falas Jogo Silabas/acerto2.mp3";
            audio.src = frutaSrc;
            audio.volume = 0.2;
            audio.play();
          }, 1000);

          // Avança para a próxima pergunta
          audioAtual++;
          perguntaAtual++;
          if (perguntaAtual < perguntas.length) {
            setTimeout(function () {
              acertou.style.display = "none";

              //cor do botão cinza novamente
              btnVerific.style.borderColor = "#5A7C90";
              btnVerific.style.backgroundColor = "#79A2BB";

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

              imgSilaba = "img/jogoFruta/silabas/CE.svg";
              silaba3.src = imgSilaba;
              imgSilaba = "img/jogoFruta/silabas/JA.svg";
              silaba2.src = imgSilaba;
              imgSilaba = "img/jogoFruta/silabas/RE.svg";
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
            }, 2800);
          } else {
            setTimeout(function () {
              console.log("FIM!");
            }, 2500);
          }
        } else {
          console.log("Errada!");
          errou.style.display = "block";
          acertou.style.display = "flex";
          acerto.style.display = "none";
          // Limpar o array se a resposta estiver errada após ambas as sílabas serem informadas

          setTimeout(function () {
            errou.style.display = "none";
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
            }, 2000);

            silabasSelecionadas = [];
          }, 1000);

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
        silabaSrc = "Falas Jogo Silabas/cereja/re.mp3";
        audio.src = silabaSrc;
        audio.play();
      } else if (silaba === silaba2) {
        silabaSrc = "Falas Jogo Silabas/cereja/ja.mp3";
        audio.src = silabaSrc;
        audio.play();
      } else if (silaba === silaba3) {
        silabaSrc = "Falas Jogo Silabas/cereja/ce.mp3";
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
      }

      // Verifica se há uma imagem para exibir no sil2
      if (areaSilabas[1]) {
        // Define a imagem e torna o campo de imagem visível
        sil2.src = areaSilabas[1];
        sil2.style.display = "block";
      }

      // Verifica se há uma imagem para exibir no sil3
      if (areaSilabas[2]) {
        // Define a imagem e torna o campo de imagem visível
        sil3.src = areaSilabas[2];
        sil3.style.display = "block";
      }

      // Verifica se há uma imagem para exibir no sil4
      if (areaSilabas[3]) {
        // Define a imagem e torna o campo de imagem visível
        sil4.src = areaSilabas[3];
        sil4.style.display = "block";
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

          //cor do botão por acertar novamente
          btnVerific.style.borderColor = "#15BE26";
          btnVerific.style.backgroundColor = "#9CFFA5";

          aumentarMoedas();

          console.log("Resposta correta!");
          silabasSelecionadas = [];

          setTimeout(function () {
            acertou.style.display = "flex";
            acerto.style.display = "block";

            frutaSrc = "Falas Jogo Silabas/acerto2.mp3";
            audio.src = frutaSrc;
            audio.volume = 0.2;
            audio.play();
          }, 1000);

          // Avança para a próxima pergunta
          audioAtual++;
          perguntaAtual++;
          if (perguntaAtual < perguntas.length) {
            setTimeout(function () {
              acertou.style.display = "none";

              //cor do botão cinza novamente
              btnVerific.style.borderColor = "#5A7C90";
              btnVerific.style.backgroundColor = "#79A2BB";

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

              imgSilaba = "img/jogoFruta/silabas/GO.svg";
              silaba3.src = imgSilaba;
              imgSilaba = "img/jogoFruta/silabas/MO.svg";
              silaba2.src = imgSilaba;
              imgSilaba = "img/jogoFruta/silabas/RAN.svg";
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
            }, 2800);
          } else {
            setTimeout(function () {
              console.log("FIM!");
            }, 2500);
          }
        } else {
          console.log("Errada!");
          errou.style.display = "block";
          acertou.style.display = "flex";
          acerto.style.display = "none";
          // Limpar o array se a resposta estiver errada após ambas as sílabas serem informadas

          setTimeout(function () {
            errou.style.display = "none";
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
            }, 2000);

            silabasSelecionadas = [];
          }, 1000);
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
        silabaSrc = "Falas Jogo Silabas/morango/ran.mp3";
        audio.src = silabaSrc;
        audio.play();
      } else if (silaba === silaba2) {
        silabaSrc = "Falas Jogo Silabas/morango/mo.mp3";
        audio.src = silabaSrc;
        audio.play();
      } else if (silaba === silaba3) {
        silabaSrc = "Falas Jogo Silabas/morango/go.mp3";
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
      }

      // Verifica se há uma imagem para exibir no sil2
      if (areaSilabas[1]) {
        // Define a imagem e torna o campo de imagem visível
        sil2.src = areaSilabas[1];
        sil2.style.display = "block";
      }

      // Verifica se há uma imagem para exibir no sil3
      if (areaSilabas[2]) {
        // Define a imagem e torna o campo de imagem visível
        sil3.src = areaSilabas[2];
        sil3.style.display = "block";
      }

      // Verifica se há uma imagem para exibir no sil4
      if (areaSilabas[3]) {
        // Define a imagem e torna o campo de imagem visível
        sil4.src = areaSilabas[3];
        sil4.style.display = "block";
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

          //cor do botão por acertar novamente
          btnVerific.style.borderColor = "#15BE26";
          btnVerific.style.backgroundColor = "#9CFFA5";

          aumentarMoedas();

          console.log("Resposta correta!");
          silabasSelecionadas = [];
          setTimeout(function () {
            acertou.style.display = "flex";
            acerto.style.display = "block";

            frutaSrc = "Falas Jogo Silabas/acerto2.mp3";
            audio.src = frutaSrc;
            audio.volume = 0.2;
            audio.play();
          }, 1000);

          // Avança para a próxima pergunta
          audioAtual++;
          perguntaAtual++;
          if (perguntaAtual < perguntas.length) {
            setTimeout(function () {
              acertou.style.display = "none";

              //cor do botão cinza novamente
              btnVerific.style.borderColor = "#5A7C90";
              btnVerific.style.backgroundColor = "#79A2BB";

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

              imgSilaba = "img/jogoFruta/silabas/A.svg";
              silaba3.src = imgSilaba;
              imgSilaba = "img/jogoFruta/silabas/XI.svg";
              silaba2.src = imgSilaba;
              imgSilaba = "img/jogoFruta/silabas/BA.svg";
              silaba1.src = imgSilaba;
              imgSilaba = "img/jogoFruta/silabas/CA.svg";
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
            }, 2800);
          } else {
            setTimeout(function () {
              console.log("FIM!");
            }, 2500);
          }
        } else {
          console.log("Errada!");
          errou.style.display = "block";
          acertou.style.display = "flex";
          acerto.style.display = "none";
          // Limpar o array se a resposta estiver errada após ambas as sílabas serem informadas

          setTimeout(function () {
            errou.style.display = "none";
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
            }, 2000);

            silabasSelecionadas = [];
          }, 1000);
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
        silabaSrc = "Falas Jogo Silabas/abacaxi/ba.mp3";
        audio.src = silabaSrc;
        audio.play();
      } else if (silaba === silaba2) {
        silabaSrc = "Falas Jogo Silabas/abacaxi/xi.mp3";
        audio.src = silabaSrc;
        audio.play();
      } else if (silaba === silaba3) {
        silabaSrc = "Falas Jogo Silabas/abacaxi/a.mp3";
        audio.src = silabaSrc;
        audio.play();
      } else if (silaba === silaba4) {
        silabaSrc = "Falas Jogo Silabas/abacaxi/ca.mp3";
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
      }

      // Verifica se há uma imagem para exibir no sil2
      if (areaSilabas[1]) {
        // Define a imagem e torna o campo de imagem visível
        sil2.src = areaSilabas[1];
        sil2.style.display = "block";
      }

      // Verifica se há uma imagem para exibir no sil3
      if (areaSilabas[2]) {
        // Define a imagem e torna o campo de imagem visível
        sil3.src = areaSilabas[2];
        sil3.style.display = "block";
      }

      // Verifica se há uma imagem para exibir no sil4
      if (areaSilabas[3]) {
        // Define a imagem e torna o campo de imagem visível
        sil4.src = areaSilabas[3];
        sil4.style.display = "block";
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

          //cor do botão por acertar novamente
          btnVerific.style.borderColor = "#15BE26";
          btnVerific.style.backgroundColor = "#9CFFA5";

          aumentarMoedas();

          console.log("Resposta correta!");
          silabasSelecionadas = [];

          setTimeout(function () {
            acertou.style.display = "flex";
            acerto.style.display = "block";

            frutaSrc = "Falas Jogo Silabas/acerto2.mp3";
            audio.src = frutaSrc;
            audio.volume = 0.2;
            audio.play();
          }, 1000);

          // Avança para a próxima pergunta
          audioAtual++;
          perguntaAtual++;
          if (perguntaAtual < perguntas.length) {
            setTimeout(function () {
              acertou.style.display = "none";

              //cor do botão cinza novamente
              btnVerific.style.borderColor = "#5A7C90";
              btnVerific.style.backgroundColor = "#79A2BB";

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

              imgSilaba = "img/jogoFruta/silabas/RAN.svg";
              silaba3.src = imgSilaba;
              imgSilaba = "img/jogoFruta/silabas/JA.svg";
              silaba2.src = imgSilaba;
              imgSilaba = "img/jogoFruta/silabas/LA.svg";
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
            }, 2800);
          } else {
            setTimeout(function () {
              console.log("FIM!");
            }, 2500);
          }
        } else {
          console.log("Errada!");
          errou.style.display = "block";
          acertou.style.display = "flex";
          acerto.style.display = "none";
          // Limpar o array se a resposta estiver errada após ambas as sílabas serem informadas

          setTimeout(function () {
            errou.style.display = "none";
            acertou.style.display = "none";

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
            }, 2000);

            silabasSelecionadas = [];
          }, 1000);

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
        silabaSrc = "Falas Jogo Silabas/laranja/la.mp3";
        audio.src = silabaSrc;
        audio.play();
      } else if (silaba === silaba2) {
        silabaSrc = "Falas Jogo Silabas/laranja/ja.mp3";
        audio.src = silabaSrc;
        audio.play();
      } else if (silaba === silaba3) {
        silabaSrc = "Falas Jogo Silabas/laranja/ran.mp3";
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
      }

      // Verifica se há uma imagem para exibir no sil2
      if (areaSilabas[1]) {
        // Define a imagem e torna o campo de imagem visível
        sil2.src = areaSilabas[1];
        sil2.style.display = "block";
      }

      // Verifica se há uma imagem para exibir no sil3
      if (areaSilabas[2]) {
        // Define a imagem e torna o campo de imagem visível
        sil3.src = areaSilabas[2];
        sil3.style.display = "block";
      }

      // Verifica se há uma imagem para exibir no sil4
      if (areaSilabas[3]) {
        // Define a imagem e torna o campo de imagem visível
        sil4.src = areaSilabas[3];
        sil4.style.display = "block";
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

          //cor do botão por acertar novamente
          btnVerific.style.borderColor = "#15BE26";
          btnVerific.style.backgroundColor = "#9CFFA5";

          aumentarMoedas();

          console.log("Resposta correta!");
          silabasSelecionadas = [];

          setTimeout(function () {
            acertou.style.display = "flex";
            acerto.style.display = "block";

            frutaSrc = "Falas Jogo Silabas/acerto2.mp3";
            audio.src = frutaSrc;
            audio.volume = 0.2;
            audio.play();
          }, 1000);

          // Avança para a próxima pergunta
          audioAtual++;
          perguntaAtual++;
          if (perguntaAtual < perguntas.length) {
            setTimeout(function () {
              acertou.style.display = "none";

              //cor do botão cinza novamente
              btnVerific.style.borderColor = "#5A7C90";
              btnVerific.style.backgroundColor = "#79A2BB";

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
              imgSilaba = "img/jogoFruta/silabas/RA.svg";
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
            }, 2800);
          } else {
            setTimeout(function () {
              console.log("FIM!");
            }, 2500);
          }
        } else {
          console.log("Errada!");
          errou.style.display = "block";
          acertou.style.display = "flex";
          acerto.style.display = "none";
          // Limpar o array se a resposta estiver errada após ambas as sílabas serem informadas
          setTimeout(function () {
            errou.style.display = "none";
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
            }, 2000);

            silabasSelecionadas = [];
          }, 1000);
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
        silabaSrc = "Falas Jogo Silabas/pera/ra.mp3";
        audio.src = silabaSrc;
        audio.play();
      } else if (silaba === silaba2) {
        silabaSrc = "Falas Jogo Silabas/pera/pe.mp3";
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
      }

      // Verifica se há uma imagem para exibir no sil2
      if (areaSilabas[1]) {
        // Define a imagem e torna o campo de imagem visível
        sil2.src = areaSilabas[1];
        sil2.style.display = "block";
      }

      // Verifica se há uma imagem para exibir no sil3
      if (areaSilabas[2]) {
        // Define a imagem e torna o campo de imagem visível
        sil3.src = areaSilabas[2];
        sil3.style.display = "block";
      }

      // Verifica se há uma imagem para exibir no sil4
      if (areaSilabas[3]) {
        // Define a imagem e torna o campo de imagem visível
        sil4.src = areaSilabas[3];
        sil4.style.display = "block";
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

          //cor do botão por acertar novamente
          btnVerific.style.borderColor = "#15BE26";
          btnVerific.style.backgroundColor = "#9CFFA5";

          aumentarMoedas();

          console.log("Resposta correta!");
          silabasSelecionadas = [];
          setTimeout(function () {
            acertou.style.display = "flex";
            acerto.style.display = "block";

            frutaSrc = "Falas Jogo Silabas/acerto2.mp3";
            audio.src = frutaSrc;
            audio.volume = 0.2;
            audio.play();
          }, 1000);

          // Avança para a próxima pergunta
          audioAtual++;
          perguntaAtual++;
          if (perguntaAtual < perguntas.length) {
            setTimeout(function () {
              acertou.style.display = "none";

              //cor do botão cinza novamente
              btnVerific.style.borderColor = "#5A7C90";
              btnVerific.style.backgroundColor = "#79A2BB";

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
            }, 2800);
          } else {
            setTimeout(function () {
              console.log("FIM!");
              acertou.style.display = "none";
              fim.style.display = "block";

              silabaSrc = "Audios/Fim de Jogo.mp3";
              audio.src = silabaSrc;
              audio.play();

              pontos_fim.textContent = moedas += ",00";

              // lógica de inserção no banco
              const dados = {
                id: document.getElementById("id").value,
                money: moedas,
              };

              // Cria o objeto XMLHttpRequest
              const xhr = new XMLHttpRequest();

              // Define o método e a URL para a requisição
              xhr.open("POST", "../../controller/insertMoney.php", true);

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

            }, 3000);
          }
        } else {
          console.log("Errada!");
          errou.style.display = "block";
          acertou.style.display = "flex";
          acerto.style.display = "none";
          // Limpar o array se a resposta estiver errada após ambas as sílabas serem informadas

          setTimeout(function () {
            errou.style.display = "none";
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
            }, 2000);

            silabasSelecionadas = [];
          }, 1000);
          console.log(
            "Tentativa incorreta. Silabas selecionadas reiniciadas:",
            silabasSelecionadas
          );
          console.log(perguntas[perguntaAtual]);
        }
      }
    }
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
}

fazerPergunta();
