<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Illumi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Litera | Login</title>
    <link rel="stylesheet" href="../assets/css/portal.css">
    <link rel="stylesheet" href="../assets/css/animations.css">
    <link rel="shortcut icon" href="../assets/images/icons/favicon.ico" type="image/x-icon">
</head>

<body>

    <div class="container-page">
        <div class="sidea">
            <div class="lit">
                <h2>Litera</h2>
                <span>Alfabetizando novas gerações</span>
                <div class="litera">
                    <img src="../assets/images/arara 2.svg" alt="">
                </div>
            </div>

        </div>

        <div class="sideb">
            <div class="title-form">
                <h2>Entrar</h2>
            </div>

            <form action="../controller/processLogin.php" method="post">
                <div class="inputs">
                    <label for="email">E-mail</label>
                    <input type="email" name="login_user" id="email" placeholder="E-mail do responsável" required>
                </div>

                <div class="inputs">
                    <label for="senha">Senha</label>
                    <input type="password" name="passwd_user" id="senha" placeholder="Palavra passe" required>
                </div>

                <div class="non">
                    <p>Não possui cadastro?</p>
                    <a href="register.php">Cadastre-se</a>
                </div>

                <div class="send">
                    <button type="submit">
                        <span>Continuar</span>
                        <img src="../assets/images/icons/enter-icon.svg" alt="">
                    </button>
                </div>
            </form>
        </div>
    </div>


</body>
<script src="../assets/javascript/emptyField.js"></script>

</html>
