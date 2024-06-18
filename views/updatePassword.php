<?php
require_once "../dao/usuarioDao.php";

$dadosUsuario = $_POST;
$emailQuery = UsuarioDao::selectByEmail($dadosUsuario['email_user']);

if (!$emailQuery) {
    header('Location: login.php?');
}
?>

<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Illumi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Litera | Cadastro</title>
    <link rel="shortcut icon" href="../assets/images/icons/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/register.css">
</head>

<body>
    <div class="overlay"></div>
    <div class="container">
        <div class="arara">
            <img src="../assets/images/arara 2.svg" alt="">
            <h2>Litera</h2>
        </div>

        <div class="container-form input-cod">
            <div class="title-form">
                <h2>Digite sua nova senha!</h2>
                <p>Digite a sua nova senha para recuparar a sua conta Litera.</p>
            </div>

            <form action="../controller/processPassword.php" method="post">
                <input type="hidden" name="cod_user" id="passwd_user" value="<?php echo $emailQuery['codUsuario']; ?>">
                <div class="inputs">
                    <label for="">Senha</label>
                    <input type="password" name="passwd_user" id="passwd_user" placeholder="Digite sua senha" required>
                </div>
                <div class="inputs">
                    <label for="">Confirmar senha</label>
                    <input type="password" name="confirm_passwd_user" id="confirm_passwd_user" placeholder="Confirme sua senha" required>
                </div>

                <div class="inputs btn">
                    <button type="submit">Recuperar</button>
                </div>

                <div class="non">
                </div>

            </form>
            <script>
                document.getElementById('inputField').addEventListener('input', function() {
                    // Captura o valor atual do campo de entrada
                    let value = this.value;

                    // Remove qualquer não número do valor
                    let newValue = value.replace(/[^0-9]/g, '');

                    // Limita o valor para 6 caracteres
                    newValue = newValue.slice(0, 6);

                    // Atualiza o valor do campo de entrada com o novo valor filtrado
                    this.value = newValue;
                });

                document.getElementById('reenviarLink').addEventListener('click', function(event) {
                    // Evita que o link redirecione para outra página
                    event.preventDefault();

                    // Recarrega a página
                    location.reload(true);
                });
            </script>
        </div>
    </div>
</body>

</html>