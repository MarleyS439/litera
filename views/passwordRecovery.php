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

        <div class="container-form">
            <div class="title-form">
                <h2>Seja bem-vindo(a)</h2>
                <p>Vamos recuperar sua conta</p>
            </div>

            <form action="./resetPassword.php" method="post">
                <div class="inputs">
                    <label for="">E-mail</label>
                    <input type="email" name="email_user" id="" placeholder="email@email.com" required>
                </div>

                <div class="inputs btn">
                    <button type="submit">recuperar a senha</button>
                </div>

                <div class="non">
                    <p>Lembrou a senha?</p>
                    <a href="login.php">Fazer login</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
