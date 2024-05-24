console.log("Teste");
document.querySelector('form').addEventListener('submit', function(event) {
    var loginInput = document.getElementById('loginUser');
    var senhaInput = document.getElementById('passwd');
    var loginError = document.getElementById('loginUserError');
    var senhaError = document.getElementById('senhaError');
    var isValid = true;

    loginError.textContent = '';
    senhaError.textContent = '';

    if (!loginInput.value) {
        loginError.textContent = 'Por favor, preencha este campo';
        isValid = false;
    }

    if (!senhaInput.value) {
        senhaError.textContent = 'Por favor, preencha este campo';
        isValid = false;
    }

    if (!isValid) {
        event.preventDefault(); // Evita que o formulário seja enviado se houver erros
    }
});
