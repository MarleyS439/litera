<?php
$dadosUsuario = $_POST;
require_once('../controller/processingVerificationEmail.php');
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
                <h2>Varifique seu e-mail</h2>
                <p>Um código de verificação foi enviado ao seu email. Digite e envie ele abaixo para ter sua conta validada.</p>
            </div>

            <form action="../controller/processRegister.php" method="post">
                <div class="inputs">
                    <label for="">Código</label>
                    <input type="text" name="cod-input" id="inputField" placeholder="000000" maxlength="6" required>
                </div>

                <input type="hidden" name="cod" value="<?php echo $numero_aleatorio ?>">
                <input type="hidden" name="name_user" value="<?php echo $dadosUsuario['name_user']  ?>">
                <input type="hidden" name="email_user" value="<?php echo $dadosUsuario['email_user']  ?>">
                <input type="hidden" name="passwd_u ser" value="<?php echo $dadosUsuario['passwd_user']  ?>">
                <input type="hidden" name="confirm_passwd_user" value="<?php echo $dadosUsuario['confirm_passwd_user']  ?>">
                <div class="inputs btn">
                    <button type="submit">Criar</button>
                </div>

                <div class="non">
                    <a id="reenviarLink">Reenviar código</a>
                </div>

            </form>
            <script>
                document.getElementById('inputField').addEventListener('input', function() {
                    // Captura o valor atual do campo de entrada
                    let value = this.value;

                    // Remove qualquer não número do valor
                    let newValue = value.replace(/[^0-9]/g, '');

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