let imgFruta = ''
let imgSilaba = ''
let imgSil = '' 

// BOX DAS SILABAS AO REMOVER SOME TODAS AS SILABAS.... {SILABA1} etc.. e {sil1}.
let box1= document.getElementById('bx1')
let box2= document.getElementById('bx2')
let box3= document.getElementById('bx3')
let box4= document.getElementById('bx4')

//SILABAS SELECIONADAS
let sil1= document.getElementById('sil1')
let sil2= document.getElementById('sil2')
let sil3= document.getElementById('sil3')
let sil4= document.getElementById('sil4')

// FRUTAS IMAGEM
const fruta = document.getElementById('fruta')

// SILABAS IMG
const silaba1 = document.getElementById('silaba1')
const silaba2 = document.getElementById('silaba2')
const silaba3 = document.getElementById('silaba3')
const silaba4 = document.getElementById('silaba4')

// BUTTONS...
const btnAudio = document.getElementById('repetir')
const btnVerific = document.getElementById('verific')


let audio = new Audio()



// Atribui as imagens das sílabas e da fruta aos elementos correspondentes

// imgSilaba = 'img/jogoFruta/silabas/MA.svg'
// silaba3.src = imgSilaba

// Adiciona evento de clique ao botão de áudio


function fazerPergunta() {
    // Array de perguntas com as fontes de áudio correspondentes
    var perguntas = ['img/jogoFruta/figuras-frutas/maça.svg', 'img/jogoFruta/figuras-frutas/banana.svg', 
    'img/jogoFruta/figuras-frutas/melancia.svg', 'img/jogoFruta/figuras-frutas/cereja.svg', 'img/jogoFruta/figuras-frutas/morango.svg',
     'img/jogoFruta/figuras-frutas/abacaxi.svg', 'img/jogoFruta/figuras-frutas/laranja.svg', 'img/jogoFruta/figuras-frutas/pera.svg']

    // Reproduz o áudio da primeira pergunta
    var perguntaAtual = 0

    setTimeout(function () {
        console.log(perguntas[perguntaAtual])
        imgFruta = perguntas[perguntaAtual]
        fruta.src =  imgFruta 
        
        imgSilaba  = 'img/jogoFruta/silabas/MA.svg'
        silaba2.src = imgSilaba

        imgSilaba  = 'img/jogoFruta/silabas/ÇA.svg'
        silaba1.src = imgSilaba

        box3.style.display = 'none'
        box4.style.display = 'none'

        sil1.style.display = 'none'
        sil2.style.display = 'none'
        sil3.style.display = 'none'
        sil4.style.display = 'none'
    }, 400)

    let silabasSelecionadas = [];
    let areaSilabas = [];

    // Função para responder à pergunta
    function responderPergunta(silaba) {
        if (perguntaAtual === 0) {
            
            // Adiciona a sílaba selecionada ao array
            silabasSelecionadas.push(silaba.id);
            console.log('Silabas selecionadas:', silabasSelecionadas);

            areaSilabas.push(silaba.src.substring(silaba.src.indexOf('img')));
            console.log('Area Silabas:', areaSilabas);

            //limpa o campo da silaba selecionada
            silaba.style.display = 'none' 




            // Verifica se há uma imagem para exibir no sil1
            if (areaSilabas[0] && silabasSelecionadas[0]) {
                // Define a imagem e torna o campo de imagem visível
                sil1.src = areaSilabas[0];
                sil1.style.display = 'block';
            }

            // Verifica se há uma imagem para exibir no sil2
            if (areaSilabas[1]) {
                // Define a imagem e torna o campo de imagem visível
                sil2.src = areaSilabas[1];
                sil2.style.display = 'block';
             
                
            }

            // Verifica se há uma imagem para exibir no sil3
            if (areaSilabas[2]) {
                // Define a imagem e torna o campo de imagem visível
                sil3.src = areaSilabas[2];
                sil3.style.display = 'block';
              
                
            }

            // Verifica se há uma imagem para exibir no sil4
            if (areaSilabas[3]) {
                // Define a imagem e torna o campo de imagem visível
                sil4.src = areaSilabas[3];
                sil4.style.display = 'block';
               
                
            }
           

            
        
            
            
            // Verifica se todas as sílabas foram selecionadas
            if (silabasSelecionadas.length === 2) {
                // Verifica se a resposta está correta
                if (silabasSelecionadas[0] === 'silaba2' && silabasSelecionadas[1] === 'silaba1') {
                    console.log('Resposta correta!');

                    //cor do botão por acertar novamente
                    btnVerific.style.borderColor = '#15BE26'
                    btnVerific.style.backgroundColor = '#9CFFA5'

                    setTimeout(function () {
                        console.log('uhul vc acertou!!!');
                    }, 1000);



                   
    
                    // Avança para a próxima pergunta
                    perguntaAtual++;
                    if (perguntaAtual < perguntas.length) {
                        setTimeout(function () {

                            //cor do botão cinza novamente
                            btnVerific.style.borderColor = '#5A7C90'
                            btnVerific.style.backgroundColor = '#79A2BB'


                            console.log(perguntas[perguntaAtual]);
                            silabasSelecionadas = [];
                            imgFruta = perguntas[perguntaAtual]
                            fruta.src =  imgFruta 

                            // SILABAS BANANA

                            box3.style.display = 'block'

                            imgSilaba  = 'img/jogoFruta/silabas/MA.svg'
                            silaba3.src = imgSilaba
                            imgSilaba  = 'img/jogoFruta/silabas/ÇA.svg'
                            silaba2.src = imgSilaba
                            imgSilaba  = 'img/jogoFruta/silabas/MA.svg'
                            silaba1.src = imgSilaba


                            areaSilabas = [];
                            sil1.src = ''
                            sil2.src = ''
                            sil1.style.display = 'none'
                            sil2.style.display = 'none'
                            sil3.style.display = 'none'
                            sil4.style.display = 'none'
                            silaba1.style.display = 'block'
                            silaba2.style.display = 'block'
                            silaba3.style.display = 'block'
                            silaba4.style.display = 'block'

                        }, 2000);
                    } else {
                        setTimeout(function () {
                            console.log('FIM!');
                        }, 2500);
                    }
                } else {
                    console.log('Errada!');

                    
                    setTimeout(function () {
                        areaSilabas = [];
                            sil1.src = ''
                            sil2.src = ''
                            sil1.style.display = 'none'
                            sil2.style.display = 'none'
                            sil3.style.display = 'none'
                            sil4.style.display = 'none'
                            silaba1.style.display = 'block'
                            silaba2.style.display = 'block'
                            silaba3.style.display = 'block'
                            silaba4.style.display = 'block'

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
                    
                    console.log('Tentativa incorreta. Silabas selecionadas reiniciadas:', silabasSelecionadas);
                    console.log(perguntas[perguntaAtual])

                }
            }
        } 
        // BANANA
        else if (perguntaAtual === 1) {
            // Lógica similar à pergunta atual 0
            silabasSelecionadas.push(silaba.id);
            console.log('Silabas selecionadas:', silabasSelecionadas);


            areaSilabas.push(silaba.src.substring(silaba.src.indexOf('img')));
            console.log('Area Silabas:', areaSilabas);

            //limpa o campo da silaba selecionada
            silaba.style.display = 'none' 

            // Verifica se há uma imagem para exibir no sil1
            if (areaSilabas[0]) {
                // Define a imagem e torna o campo de imagem visível
                sil1.src = areaSilabas[0];
                sil1.style.display = 'block';
            }

            // Verifica se há uma imagem para exibir no sil2
            if (areaSilabas[1]) {
                // Define a imagem e torna o campo de imagem visível
                sil2.src = areaSilabas[1];
                sil2.style.display = 'block';
            }

            // Verifica se há uma imagem para exibir no sil3
            if (areaSilabas[2]) {
                // Define a imagem e torna o campo de imagem visível
                sil3.src = areaSilabas[2];
                sil3.style.display = 'block';
            }

            // Verifica se há uma imagem para exibir no sil4
            if (areaSilabas[3]) {
                // Define a imagem e torna o campo de imagem visível
                sil4.src = areaSilabas[3];
                sil4.style.display = 'block';
            }







            
            if (silabasSelecionadas.length === 3) {
                if (silabasSelecionadas[0] === 'silaba1' && silabasSelecionadas[1] === 'silaba2' && silabasSelecionadas[2] === 'silaba3') {
                     //cor do botão por acertar novamente
                     btnVerific.style.borderColor = '#15BE26'
                     btnVerific.style.backgroundColor = '#9CFFA5'

                    console.log('Resposta correta!');
                    silabasSelecionadas = [];
                    setTimeout(function () {
                        console.log('uhul vc acertou!!!');
                    }, 1000);
    
                    // Avança para a próxima pergunta
                    perguntaAtual++;
                    if (perguntaAtual < perguntas.length) {
                        setTimeout(function () {

                            //cor do botão cinza novamente
                            btnVerific.style.borderColor = '#5A7C90'
                            btnVerific.style.backgroundColor = '#79A2BB'

                            console.log(perguntas[perguntaAtual]);
                            imgFruta = perguntas[perguntaAtual]
                            fruta.src =  imgFruta


                            // SILABAS MELANCIA

                            box3.style.display = 'block'

                            imgSilaba  = 'img/jogoFruta/silabas/ÇA.svg'
                            silaba3.src = imgSilaba
                            imgSilaba  = 'img/jogoFruta/silabas/ÇA.svg'
                            silaba2.src = imgSilaba
                            imgSilaba  = 'img/jogoFruta/silabas/MA.svg'
                            silaba1.src = imgSilaba


                            areaSilabas = [];
                            sil1.src = ''
                            sil2.src = ''
                            sil3.src = ''
                            sil1.style.display = 'none'
                            sil2.style.display = 'none'
                            sil3.style.display = 'none'
                            sil4.style.display = 'none'
                            silaba1.style.display = 'block'
                            silaba2.style.display = 'block'
                            silaba3.style.display = 'block'
                            silaba4.style.display = 'block'

                        }, 2000);
                    } else {
                        setTimeout(function () {
                            console.log('FIM!');
                        }, 2500);
                    }
                } else {
                    console.log('Errada!');
                    // Limpar o array se a resposta estiver errada após ambas as sílabas serem informadas
                        setTimeout(function () {
                            areaSilabas = [];
                                sil1.src = ''
                                sil2.src = ''
                                sil3.src = ''
                                sil1.style.display = 'none'
                                sil2.style.display = 'none'
                                sil3.style.display = 'none'
                                sil4.style.display = 'none'
                                silaba1.style.display = 'block'
                                silaba2.style.display = 'block'
                                silaba3.style.display = 'block'
                                silaba4.style.display = 'block'

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
                    console.log('Tentativa incorreta. Silabas selecionadas reiniciadas:', silabasSelecionadas);
                    console.log(perguntas[perguntaAtual])
                }
            }
        } 
        // MELANCIA
        else if (perguntaAtual === 2) {
            // Lógica similar à pergunta atual 0
            silabasSelecionadas.push(silaba.id);
            console.log('Silabas selecionadas:', silabasSelecionadas);


            areaSilabas.push(silaba.src.substring(silaba.src.indexOf('img')));
            console.log('Area Silabas:', areaSilabas);

            //limpa o campo da silaba selecionada
            silaba.style.display = 'none' 

            // Verifica se há uma imagem para exibir no sil1
            if (areaSilabas[0]) {
                // Define a imagem e torna o campo de imagem visível
                sil1.src = areaSilabas[0];
                sil1.style.display = 'block';
            }

            // Verifica se há uma imagem para exibir no sil2
            if (areaSilabas[1]) {
                // Define a imagem e torna o campo de imagem visível
                sil2.src = areaSilabas[1];
                sil2.style.display = 'block';
            }

            // Verifica se há uma imagem para exibir no sil3
            if (areaSilabas[2]) {
                // Define a imagem e torna o campo de imagem visível
                sil3.src = areaSilabas[2];
                sil3.style.display = 'block';
            }

            // Verifica se há uma imagem para exibir no sil4
            if (areaSilabas[3]) {
                // Define a imagem e torna o campo de imagem visível
                sil4.src = areaSilabas[3];
                sil4.style.display = 'block';
            }
            
            if (silabasSelecionadas.length === 3) {
                if (silabasSelecionadas[0] === 'silaba1' && silabasSelecionadas[1] === 'silaba2' && silabasSelecionadas[2] === 'silaba3') {
                    
                    //cor do botão por acertar novamente
                    btnVerific.style.borderColor = '#15BE26'
                    btnVerific.style.backgroundColor = '#9CFFA5'

                    console.log('Resposta correta!');
                    silabasSelecionadas = [];
                    setTimeout(function () {
                        console.log('uhul vc acertou!!!');
                    }, 1000);
    
                    // Avança para a próxima pergunta
                    perguntaAtual++;
                    if (perguntaAtual < perguntas.length) {
                        setTimeout(function () {

                            //cor do botão cinza novamente
                            btnVerific.style.borderColor = '#5A7C90'
                            btnVerific.style.backgroundColor = '#79A2BB'

                            console.log(perguntas[perguntaAtual]);
                            silabasSelecionadas = [];
                            imgFruta = perguntas[perguntaAtual]
                            fruta.src =  imgFruta 

                            // SILABAS CEREJA
        
                            box3.style.display = 'block'

                            imgSilaba  = 'img/jogoFruta/silabas/ÇA.svg'
                            silaba3.src = imgSilaba
                            imgSilaba  = 'img/jogoFruta/silabas/ÇA.svg'
                            silaba2.src = imgSilaba
                            imgSilaba  = 'img/jogoFruta/silabas/ÇA.svg'
                            silaba1.src = imgSilaba

                            areaSilabas = [];
                            sil1.src = ''
                            sil2.src = ''
                            sil3.src = ''
                            sil1.style.display = 'none'
                            sil2.style.display = 'none'
                            sil3.style.display = 'none'
                            sil4.style.display = 'none'
                            silaba1.style.display = 'block'
                            silaba2.style.display = 'block'
                            silaba3.style.display = 'block'
                            silaba4.style.display = 'block'

                        }, 2000);
                    } else {
                        setTimeout(function () {
                            console.log('FIM!');
                        }, 2500);
                    }
                } else {
                    console.log('Errada!');
                    // Limpar o array se a resposta estiver errada após ambas as sílabas serem informadas
                    
                    setTimeout(function () {
                        areaSilabas = [];
                            sil1.src = ''
                            sil2.src = ''
                            sil3.src = ''
                            sil1.style.display = 'none'
                            sil2.style.display = 'none'
                            sil3.style.display = 'none'
                            sil4.style.display = 'none'
                            silaba1.style.display = 'block'
                            silaba2.style.display = 'block'
                            silaba3.style.display = 'block'
                            silaba4.style.display = 'block'

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
                    
                    console.log('Tentativa incorreta. Silabas selecionadas reiniciadas:', silabasSelecionadas);
                    console.log(perguntas[perguntaAtual])
                }
            }
        } 
        // CEREJA
        else if (perguntaAtual === 3) {
            // Lógica similar à pergunta atual 0
            silabasSelecionadas.push(silaba.id);
            console.log('Silabas selecionadas:', silabasSelecionadas);

            areaSilabas.push(silaba.src.substring(silaba.src.indexOf('img')));
            console.log('Area Silabas:', areaSilabas);

            //limpa o campo da silaba selecionada
            silaba.style.display = 'none' 

            // Verifica se há uma imagem para exibir no sil1
            if (areaSilabas[0]) {
                // Define a imagem e torna o campo de imagem visível
                sil1.src = areaSilabas[0];
                sil1.style.display = 'block';
            }

            // Verifica se há uma imagem para exibir no sil2
            if (areaSilabas[1]) {
                // Define a imagem e torna o campo de imagem visível
                sil2.src = areaSilabas[1];
                sil2.style.display = 'block';
            }

            // Verifica se há uma imagem para exibir no sil3
            if (areaSilabas[2]) {
                // Define a imagem e torna o campo de imagem visível
                sil3.src = areaSilabas[2];
                sil3.style.display = 'block';
            }

            // Verifica se há uma imagem para exibir no sil4
            if (areaSilabas[3]) {
                // Define a imagem e torna o campo de imagem visível
                sil4.src = areaSilabas[3];
                sil4.style.display = 'block';
            }
            
            if (silabasSelecionadas.length === 3) {
                if (silabasSelecionadas[0] === 'silaba1' && silabasSelecionadas[1] === 'silaba2' && silabasSelecionadas[2] === 'silaba3') {
                    
                     //cor do botão por acertar novamente
                     btnVerific.style.borderColor = '#15BE26'
                     btnVerific.style.backgroundColor = '#9CFFA5'

                    console.log('Resposta correta!');
                    silabasSelecionadas = [];
                    setTimeout(function () {
                        console.log('uhul vc acertou!!!');
                    }, 1000);
    
                    // Avança para a próxima pergunta
                    perguntaAtual++;
                    if (perguntaAtual < perguntas.length) {
                        setTimeout(function () {

                            //cor do botão cinza novamente
                            btnVerific.style.borderColor = '#5A7C90'
                            btnVerific.style.backgroundColor = '#79A2BB'

                            console.log(perguntas[perguntaAtual]);
                            silabasSelecionadas = [];
                            imgFruta = perguntas[perguntaAtual]
                            fruta.src =  imgFruta 


                            // SILABAS MORANGO

                            box3.style.display = 'block'

                            imgSilaba  = 'img/jogoFruta/silabas/ÇA.svg'
                            silaba3.src = imgSilaba
                            imgSilaba  = 'img/jogoFruta/silabas/ÇA.svg'
                            silaba2.src = imgSilaba
                            imgSilaba  = 'img/jogoFruta/silabas/ÇA.svg'
                            silaba1.src = imgSilaba

                            areaSilabas = [];
                            sil1.src = ''
                            sil2.src = ''
                            sil3.src = ''
                            sil1.style.display = 'none'
                            sil2.style.display = 'none'
                            sil3.style.display = 'none'
                            sil4.style.display = 'none'
                            silaba1.style.display = 'block'
                            silaba2.style.display = 'block'
                            silaba3.style.display = 'block'
                            silaba4.style.display = 'block'
                            
                        }, 2000);
                    } else {
                        setTimeout(function () {
                            console.log('FIM!');
                        }, 2500);
                    }
                } else {
                    console.log('Errada!');
                    // Limpar o array se a resposta estiver errada após ambas as sílabas serem informadas
                    
                    setTimeout(function () {
                        areaSilabas = [];
                            sil1.src = ''
                            sil2.src = ''
                            sil3.src = ''
                            sil1.style.display = 'none'
                            sil2.style.display = 'none'
                            sil3.style.display = 'none'
                            sil4.style.display = 'none'
                            silaba1.style.display = 'block'
                            silaba2.style.display = 'block'
                            silaba3.style.display = 'block'
                            silaba4.style.display = 'block'

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
                    console.log('Tentativa incorreta. Silabas selecionadas reiniciadas:', silabasSelecionadas);
                    console.log(perguntas[perguntaAtual])
                }
            }
        }
        // MORANGO
         else if (perguntaAtual === 4) {
            // Lógica similar à pergunta atual 0
            silabasSelecionadas.push(silaba.id);
            console.log('Silabas selecionadas:', silabasSelecionadas);

            areaSilabas.push(silaba.src.substring(silaba.src.indexOf('img')));
            console.log('Area Silabas:', areaSilabas);

            //limpa o campo da silaba selecionada
            silaba.style.display = 'none' 

            // Verifica se há uma imagem para exibir no sil1
            if (areaSilabas[0]) {
                // Define a imagem e torna o campo de imagem visível
                sil1.src = areaSilabas[0];
                sil1.style.display = 'block';
            }

            // Verifica se há uma imagem para exibir no sil2
            if (areaSilabas[1]) {
                // Define a imagem e torna o campo de imagem visível
                sil2.src = areaSilabas[1];
                sil2.style.display = 'block';
            }

            // Verifica se há uma imagem para exibir no sil3
            if (areaSilabas[2]) {
                // Define a imagem e torna o campo de imagem visível
                sil3.src = areaSilabas[2];
                sil3.style.display = 'block';
            }

            // Verifica se há uma imagem para exibir no sil4
            if (areaSilabas[3]) {
                // Define a imagem e torna o campo de imagem visível
                sil4.src = areaSilabas[3];
                sil4.style.display = 'block';
            }
            
            if (silabasSelecionadas.length === 3) {
                if (silabasSelecionadas[0] === 'silaba1' && silabasSelecionadas[1] === 'silaba2' && silabasSelecionadas[2] === 'silaba3') {
                    
                     //cor do botão por acertar novamente
                     btnVerific.style.borderColor = '#15BE26'
                     btnVerific.style.backgroundColor = '#9CFFA5'
                    
                    console.log('Resposta correta!');
                    silabasSelecionadas = [];
                    setTimeout(function () {
                        console.log('uhul vc acertou!!!');
                    }, 1000);
    
                    // Avança para a próxima pergunta
                    perguntaAtual++;
                    if (perguntaAtual < perguntas.length) {
                        setTimeout(function () {

                            //cor do botão cinza novamente
                            btnVerific.style.borderColor = '#5A7C90'
                            btnVerific.style.backgroundColor = '#79A2BB'

                            console.log(perguntas[perguntaAtual]);
                            silabasSelecionadas = [];
                            imgFruta = perguntas[perguntaAtual]
                            fruta.src =  imgFruta 


                            // SILABAS ABACAXI

                            box3.style.display = 'block'
                            box4.style.display = 'block'

                            imgSilaba  = 'img/jogoFruta/silabas/ÇA.svg'
                            silaba3.src = imgSilaba
                            imgSilaba  = 'img/jogoFruta/silabas/ÇA.svg'
                            silaba2.src = imgSilaba
                            imgSilaba  = 'img/jogoFruta/silabas/ÇA.svg'
                            silaba1.src = imgSilaba
                            imgSilaba  = 'img/jogoFruta/silabas/MA.svg'
                            silaba4.src = imgSilaba

                            areaSilabas = [];
                            sil1.src = ''
                            sil2.src = ''
                            sil3.src = ''
                            sil1.style.display = 'none'
                            sil2.style.display = 'none'
                            sil3.style.display = 'none'
                            sil4.style.display = 'none'
                            silaba1.style.display = 'block'
                            silaba2.style.display = 'block'
                            silaba3.style.display = 'block'
                            silaba4.style.display = 'block'
                            
                        }, 2000);
                    } else {
                        setTimeout(function () {
                            console.log('FIM!');
                        }, 2500);
                    }
                } else {
                    console.log('Errada!');
                    // Limpar o array se a resposta estiver errada após ambas as sílabas serem informadas
                    
                    setTimeout(function () {
                        areaSilabas = [];
                            sil1.src = ''
                            sil2.src = ''
                            sil3.src = ''
                            sil1.style.display = 'none'
                            sil2.style.display = 'none'
                            sil3.style.display = 'none'
                            sil4.style.display = 'none'
                            silaba1.style.display = 'block'
                            silaba2.style.display = 'block'
                            silaba3.style.display = 'block'
                            silaba4.style.display = 'block'

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
                    console.log('Tentativa incorreta. Silabas selecionadas reiniciadas:', silabasSelecionadas);
                    console.log(perguntas[perguntaAtual])
                }
            }
        } 
        // ABACAXI
        else if (perguntaAtual === 5) {
            // Lógica similar à pergunta atual 0
            silabasSelecionadas.push(silaba.id);
            console.log('Silabas selecionadas:', silabasSelecionadas);

            areaSilabas.push(silaba.src.substring(silaba.src.indexOf('img')));
            console.log('Area Silabas:', areaSilabas);

            //limpa o campo da silaba selecionada
            silaba.style.display = 'none' 

            // Verifica se há uma imagem para exibir no sil1
            if (areaSilabas[0]) {
                // Define a imagem e torna o campo de imagem visível
                sil1.src = areaSilabas[0];
                sil1.style.display = 'block';
            }

            // Verifica se há uma imagem para exibir no sil2
            if (areaSilabas[1]) {
                // Define a imagem e torna o campo de imagem visível
                sil2.src = areaSilabas[1];
                sil2.style.display = 'block';
            }

            // Verifica se há uma imagem para exibir no sil3
            if (areaSilabas[2]) {
                // Define a imagem e torna o campo de imagem visível
                sil3.src = areaSilabas[2];
                sil3.style.display = 'block';
            }

            // Verifica se há uma imagem para exibir no sil4
            if (areaSilabas[3]) {
                // Define a imagem e torna o campo de imagem visível
                sil4.src = areaSilabas[3];
                sil4.style.display = 'block';
            }
            
            if (silabasSelecionadas.length === 4) {
                if (silabasSelecionadas[0] === 'silaba1' && silabasSelecionadas[1] === 'silaba2' && silabasSelecionadas[2] === 'silaba3' && silabasSelecionadas[3] === 'silaba4') {
                   
                    //cor do botão por acertar novamente
                    btnVerific.style.borderColor = '#15BE26'
                    btnVerific.style.backgroundColor = '#9CFFA5'
                   
                    console.log('Resposta correta!');
                    silabasSelecionadas = [];
                    setTimeout(function () {
                        console.log('uhul vc acertou!!!');
                    }, 1000);
    
                    // Avança para a próxima pergunta
                    perguntaAtual++;
                    if (perguntaAtual < perguntas.length) {
                        setTimeout(function () {

                            //cor do botão cinza novamente
                            btnVerific.style.borderColor = '#5A7C90'
                            btnVerific.style.backgroundColor = '#79A2BB'

                            console.log(perguntas[perguntaAtual]);
                            silabasSelecionadas = [];
                            imgFruta = perguntas[perguntaAtual]
                            fruta.src =  imgFruta 

                            // SILABAS LARANJA

                            box3.style.display = 'block'
                            box4.style.display = 'none'

                            imgSilaba  = 'img/jogoFruta/silabas/ÇA.svg'
                            silaba3.src = imgSilaba
                            imgSilaba  = 'img/jogoFruta/silabas/ÇA.svg'
                            silaba2.src = imgSilaba
                            imgSilaba  = 'img/jogoFruta/silabas/ÇA.svg'
                            silaba1.src = imgSilaba


                            areaSilabas = [];
                            sil1.src = ''
                            sil2.src = ''
                            sil3.src = ''
                            sil4.src = ''
                            sil1.style.display = 'none'
                            sil2.style.display = 'none'
                            sil3.style.display = 'none'
                            sil4.style.display = 'none'
                            silaba1.style.display = 'block'
                            silaba2.style.display = 'block'
                            silaba3.style.display = 'block'
                            silaba4.style.display = 'block'

                        }, 2000);
                    } else {
                        setTimeout(function () {
                            console.log('FIM!');
                        }, 2500);
                    }
                } else {
                    console.log('Errada!');
                    // Limpar o array se a resposta estiver errada após ambas as sílabas serem informadas

                    setTimeout(function () {
                        areaSilabas = [];
                            sil1.src = ''
                            sil2.src = ''
                            sil3.src = ''
                            sil4.src = ''
                            sil1.style.display = 'none'
                            sil2.style.display = 'none'
                            sil3.style.display = 'none'
                            sil4.style.display = 'none'
                            silaba1.style.display = 'block'
                            silaba2.style.display = 'block'
                            silaba3.style.display = 'block'
                            silaba4.style.display = 'block'

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

                    console.log('Tentativa incorreta. Silabas selecionadas reiniciadas:', silabasSelecionadas);
                    console.log(perguntas[perguntaAtual])
                }
            }
        } 
        // LARANJA
        else if (perguntaAtual === 6) {
            // Lógica similar à pergunta atual 0
            silabasSelecionadas.push(silaba.id);
            console.log('Silabas selecionadas:', silabasSelecionadas);

            areaSilabas.push(silaba.src.substring(silaba.src.indexOf('img')));
            console.log('Area Silabas:', areaSilabas);

            //limpa o campo da silaba selecionada
            silaba.style.display = 'none' 

            // Verifica se há uma imagem para exibir no sil1
            if (areaSilabas[0]) {
                // Define a imagem e torna o campo de imagem visível
                sil1.src = areaSilabas[0];
                sil1.style.display = 'block';
            }

            // Verifica se há uma imagem para exibir no sil2
            if (areaSilabas[1]) {
                // Define a imagem e torna o campo de imagem visível
                sil2.src = areaSilabas[1];
                sil2.style.display = 'block';
            }

            // Verifica se há uma imagem para exibir no sil3
            if (areaSilabas[2]) {
                // Define a imagem e torna o campo de imagem visível
                sil3.src = areaSilabas[2];
                sil3.style.display = 'block';
            }

            // Verifica se há uma imagem para exibir no sil4
            if (areaSilabas[3]) {
                // Define a imagem e torna o campo de imagem visível
                sil4.src = areaSilabas[3];
                sil4.style.display = 'block';
            }
            
            if (silabasSelecionadas.length === 3) {
                if (silabasSelecionadas[0] === 'silaba1' && silabasSelecionadas[1] === 'silaba2' && silabasSelecionadas[2] === 'silaba3') {
                   
                    //cor do botão por acertar novamente
                    btnVerific.style.borderColor = '#15BE26'
                    btnVerific.style.backgroundColor = '#9CFFA5'
                   
                    console.log('Resposta correta!');
                    silabasSelecionadas = [];
                    setTimeout(function () {
                        console.log('uhul vc acertou!!!');
                    }, 1000);
    
                    // Avança para a próxima pergunta
                    perguntaAtual++;
                    if (perguntaAtual < perguntas.length) {
                        setTimeout(function () {

                            //cor do botão cinza novamente
                            btnVerific.style.borderColor = '#5A7C90'
                            btnVerific.style.backgroundColor = '#79A2BB'

                            console.log(perguntas[perguntaAtual]);
                            silabasSelecionadas = [];
                            imgFruta = perguntas[perguntaAtual]
                            fruta.src =  imgFruta 


                            // SILABAS PERA

                            box3.style.display = 'none'
                            box4.style.display = 'none'

                            imgSilaba  = 'img/jogoFruta/silabas/MA.svg'
                            silaba2.src = imgSilaba
                            imgSilaba  = 'img/jogoFruta/silabas/ÇA.svg'
                            silaba1.src = imgSilaba

                            areaSilabas = [];
                            sil1.src = ''
                            sil2.src = ''
                            sil3.src = ''
                            sil1.style.display = 'none'
                            sil2.style.display = 'none'
                            sil3.style.display = 'none'
                            sil4.style.display = 'none'
                            silaba1.style.display = 'block'
                            silaba2.style.display = 'block'
                            silaba3.style.display = 'block'
                            silaba4.style.display = 'block'
                        }, 2000);
                    } else {
                        setTimeout(function () {
                            console.log('FIM!');
                        }, 2500);
                    }
                } else {
                    console.log('Errada!');
                    // Limpar o array se a resposta estiver errada após ambas as sílabas serem informadas
                    setTimeout(function () {
                        areaSilabas = [];
                            sil1.src = ''
                            sil2.src = ''
                            sil3.src = ''
                            sil1.style.display = 'none'
                            sil2.style.display = 'none'
                            sil3.style.display = 'none'
                            sil4.style.display = 'none'
                            silaba1.style.display = 'block'
                            silaba2.style.display = 'block'
                            silaba3.style.display = 'block'
                            silaba4.style.display = 'block'

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
                    console.log('Tentativa incorreta. Silabas selecionadas reiniciadas:', silabasSelecionadas);
                    console.log(perguntas[perguntaAtual])
                }
            }
        } 
        // FIM -> RESPONDER PERA!
        else if (perguntaAtual === 7) {
            // Lógica similar à pergunta atual 0
            silabasSelecionadas.push(silaba.id);
            console.log('Silabas selecionadas:', silabasSelecionadas);

            areaSilabas.push(silaba.src.substring(silaba.src.indexOf('img')));
            console.log('Area Silabas:', areaSilabas);

            //limpa o campo da silaba selecionada
            silaba.style.display = 'none' 

            // Verifica se há uma imagem para exibir no sil1
            if (areaSilabas[0]) {
                // Define a imagem e torna o campo de imagem visível
                sil1.src = areaSilabas[0];
                sil1.style.display = 'block';
            }

            // Verifica se há uma imagem para exibir no sil2
            if (areaSilabas[1]) {
                // Define a imagem e torna o campo de imagem visível
                sil2.src = areaSilabas[1];
                sil2.style.display = 'block';
            }

            // Verifica se há uma imagem para exibir no sil3
            if (areaSilabas[2]) {
                // Define a imagem e torna o campo de imagem visível
                sil3.src = areaSilabas[2];
                sil3.style.display = 'block';
            }

            // Verifica se há uma imagem para exibir no sil4
            if (areaSilabas[3]) {
                // Define a imagem e torna o campo de imagem visível
                sil4.src = areaSilabas[3];
                sil4.style.display = 'block';
            }
            
            if (silabasSelecionadas.length === 2) {
                if (silabasSelecionadas[0] === 'silaba1' && silabasSelecionadas[1] === 'silaba2') {
                    
                     //cor do botão por acertar novamente
                     btnVerific.style.borderColor = '#15BE26'
                     btnVerific.style.backgroundColor = '#9CFFA5'
                    
                    console.log('Resposta correta!');
                    silabasSelecionadas = [];
                    setTimeout(function () {
                        console.log('uhul vc acertou!!!');
                    }, 1000);
    
                    // Avança para a próxima pergunta
                    perguntaAtual++;
                    if (perguntaAtual < perguntas.length) {
                        setTimeout(function () {

                            //cor do botão cinza novamente
                            btnVerific.style.borderColor = '#5A7C90'
                            btnVerific.style.backgroundColor = '#79A2BB'

                            console.log(perguntas[perguntaAtual]);
                            silabasSelecionadas = [];
                            imgFruta = perguntas[perguntaAtual]
                            fruta.src =  imgFruta 

                            areaSilabas = [];
                            sil1.src = ''
                            sil2.src = ''
                            sil1.style.display = 'none'
                            sil2.style.display = 'none'
                            sil3.style.display = 'none'
                            sil4.style.display = 'none'
                            silaba1.style.display = 'block'
                            silaba2.style.display = 'block'
                            silaba3.style.display = 'block'
                            silaba4.style.display = 'block'
                        
                        }, 2000);
                    } else {
                        setTimeout(function () {
                            console.log('FIM!');
                            
                            alert('FIM!!!!')
                        }, 2500);
                    }
                } else {
                    console.log('Errada!');
                    // Limpar o array se a resposta estiver errada após ambas as sílabas serem informadas

                    setTimeout(function () {
                        areaSilabas = [];
                            sil1.src = ''
                            sil2.src = ''
                            sil3.src = ''
                            sil1.style.display = 'none'
                            sil2.style.display = 'none'
                            sil3.style.display = 'none'
                            sil4.style.display = 'none'
                            silaba1.style.display = 'block'
                            silaba2.style.display = 'block'
                            silaba3.style.display = 'block'
                            silaba4.style.display = 'block'

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
                    console.log('Tentativa incorreta. Silabas selecionadas reiniciadas:', silabasSelecionadas);
                    console.log(perguntas[perguntaAtual])
                }
            }
        }
    }
    
    // Adiciona event listener aos elementos das sílabas
    silaba1.addEventListener('click', function () {
        responderPergunta(this)
    })
    silaba2.addEventListener('click', function () {
        responderPergunta(this)
    })
    silaba3.addEventListener('click', function () {
        responderPergunta(this)
    })
    silaba4.addEventListener('click', function () {
        responderPergunta(this)
    })


    // BUTTON PARA REPETIR PERGUNTA
    btnAudio.addEventListener('click', function () {
        console.log('REPETINDO PERGUNTA: ' + perguntas[perguntaAtual])
    })
}


fazerPergunta()
