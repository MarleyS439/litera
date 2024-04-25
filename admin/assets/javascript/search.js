function search() {
  const searchValue = document.getElementById("search_user").value;
  const selectValue = document.getElementById("selectJogo").value;

  if (searchValue.trim() !== "" || selectValue !== "0") {
    // lógica de inserção no banco
    const dados = {
      search: searchValue,
      selectJogo: selectValue,
    };

    let cards = [
      document.getElementById("card-1"),
      document.getElementById("card-2"),
      document.getElementById("card-3"),
      document.getElementById("card-4"),
    ];

  container.style.display = "flex";
    container.style.flexWrap = "wrap";
    container.classList.remove("animate__fadeOutUp");
    container.classList.add("animate__animated", "animate__fadeInDown");

    // Cria o objeto XMLHttpRequest
    const xhr = new XMLHttpRequest();

    // Define o método e a URL para a requisição
    xhr.open("POST", "../controller/processingSearchUser.php", true);

    // Define o cabeçalho da requisição
    xhr.setRequestHeader("Content-Type", "application/json");

    // Função de callback para quando a requisição estiver completa
    xhr.onload = function () {
      if (xhr.status >= 200 && xhr.status < 300) {
        // Requisição bem-sucedida, você pode lidar com a resposta aqui
        let response = JSON.parse(xhr.responseText);
        console.log(response);

        if (response !== "Usuário não encontrado") {
          cards[0].textContent = response.fasesConcluidas;
          cards[1].textContent = response.dadosJogo.maxPontuacao;
          cards[2].textContent = response.dadosJogo.qtndAcertos;
          cards[3].textContent = response.dadosJogo.qtndErros;
        } else {
          cards[0].textContent = "-";
          cards[1].textContent = "-";
          cards[2].textContent = "-";
          cards[3].textContent = "-";
        }
      } else {
        // Trate os erros de requisição aqui
        console.error("Erro ao enviar requisição");
      }
    };

    // Envia a requisição com os dados convertidos para JSON
    xhr.send(JSON.stringify(dados));
  } else {
    container.style.display = "none";
    container.classList.remove("animate__fadeInDown");
    container.classList.add("animate__fadeOutUp");
  }
}

// Adiciona ouvintes de evento para o evento 'input' do campo de pesquisa e 'change' do select
document.getElementById("search_user").addEventListener("input", search);
document.getElementById("selectJogo").addEventListener("change", search);



function filterUsers() {
  // Obtém o valor do filtro de status
  var status = document.getElementById("status").value.toUpperCase();

  // Seleciona a tabela
  var table = document.querySelector("table");

  // Seleciona todas as linhas da tabela
  var rows = table.querySelectorAll("tbody tr");

  // Itera sobre as linhas da tabela
  for (var i = 0; i < rows.length; i++) {
      var cells = rows[i].querySelectorAll("td");
      var cellStatus = cells[6].textContent.toUpperCase(); // Obtém o status da célula

      // Exibe ou oculta a linha da tabela com base no filtro selecionado
      if (status === "TODOS" || cellStatus === status) {
          rows[i].style.display = "";
      } else {
          rows[i].style.display = "none";
      }
  }
}



function searchUsers() {
  // Obtém o valor do campo de pesquisa
  var input = document.getElementById("searchInput");
  var filter = input.value.toUpperCase();

  // Seleciona a tabela
  var table = document.querySelector("table");

  // Seleciona todas as linhas da tabela
  var rows = table.querySelectorAll("tr");

  // Itera sobre as linhas da tabela (começando da segunda linha)
  for (var i = 1; i < rows.length; i++) {
    var cells = rows[i].querySelectorAll("td");
    var found = false;

    // Itera sobre as células da linha (começando da segunda célula)
    for (var j = 0; j < 3; j++) {
      // Limitando a pesquisa às três primeiras colunas
      var cell = cells[j];
      if (cell) {
        var txtValue = cell.textContent || cell.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          found = true;
          break;
        }
      }
    }

    // Exibe ou oculta a linha da tabela com base no resultado da pesquisa
    if (found) {
      rows[i].style.display = "";
    } else {
      rows[i].style.display = "none";
    }
  }
}
