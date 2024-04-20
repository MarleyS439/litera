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
        for (var j = 1; j < cells.length; j++) {
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
