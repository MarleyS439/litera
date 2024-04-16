<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Illumi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Litera | Login</title>
    <link rel="shortcut icon" href="../assets/images/litera.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/login-view.css">
    <!--<link rel="stylesheet" href="../assets/css/login.css"> -->
</head>

<body>

    <!-- Do not have more mobile-view div. Now is a unique div -->
    <div class="desktop-view">
        <div class="container-desktop">
            <div class="content">
                <div class="title">
                    <h1>Litera</h1>
                    <p>Alfabetizando novas gerações</p>
                </div>

                <div class="arara-imagem">
                    <img src="../assets/images/arara 2.svg" alt="">
                </div>
            </div>

            <div class="formu">
                <form action="../controller/processLogin.php" method="post">
                    <h2>Entrar</h2>
                    <div class="item">
                        <label for="nameUser">Nome de usuário ou e-mail</label>
                        <input type="text" name="login_user" id="nameUser" placeholder="" required>
                    </div>

                    <div class="item">
                        <label for="passwUser">Senha</label>
                        <input type="password" name="passwd_user" id="passwUser" required>
                    </div>

                    <div class="item">
                        <button type="submit">Continuar</button>
                    </div>

                    <div class="register">
                        <p>Não tem cadastro? <a href="../views/register.php">Cadastre-se</a></p>
                    </div>

                    <div class="return">
                        <a href="../index.php">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
<script src="../assets/javascript/emptyField.js"></script>

</html>