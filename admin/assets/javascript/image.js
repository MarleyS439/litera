// para realizar a atualização da img na tela
document.getElementById("foto").addEventListener("change", readImage, false);

function readImage() {
    if (this.files && this.files[0]) {
        var fileReader = new FileReader();
        fileReader.onload = function(e) {
            document.getElementById("preview").src = e.target.result;
        };
        fileReader.readAsDataURL(this.files[0]);
    }
}

//***********************************
// Verificar Validações do form 
//***********************************

// Seleciona todos os formulários que precisam de validação
const forms = document.querySelectorAll('.needs-validation');

// Loop sobre eles e previne a submissão se houver campos inválidos
forms.forEach(form => {
    form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add('was-validated');
    }, false);
});



document.getElementById('foto').addEventListener('change', function() {
    var input = document.getElementById('foto');
    var nomeFoto = document.getElementById('nomeFoto');
    if (input.files.length > 0) {
        nomeFoto.value = input.files[0].name;
    }
});
