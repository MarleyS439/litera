<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Illumi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Litera | Finalizar cadastro</title>
    <link rel="shortcut icon" href="../assets/images/icons/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/register.css">
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
                <h2>Olá, $nome_responsavel</h2>
                <span>Precisamos de mais algumas informações</span>
            </div>

            <form action="" method="post">
                <div class="inputs">
                    <label for="crianca">Nome da criança</label>
                    <input type="text" name="nome_crianca" id="crianca" placeholder="Digite o nome do seu filho(a) ou tutelada" required>
                </div>

                <div class="t-inputs">
                    <div class="inputs">
                        <label for="idade">Nascimento</label>
                        <input type="date" name="idade_crianca" id="idade" placeholder="">
                    </div>

                    <div class="inputs">
                        <label for="genero">Gênero</label>
                        <select name="genero_crianca" id="genero">
                            <option value="">Não definido</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Feminino">Feminino</option>
                        </select>
                    </div>
                </div>

                <div class="advisor">
                    <!-- Aqui vai as informações de autenticação de login -->
                </div>

                <div class="send">
                    <button type="submit">
                        <span>Continuar</span>
                        <img src="../assets/images/icons/next-svgrepo-com.svg" alt="">
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- Do not have more mobile-view div. Now is a unique div -->
    <!-- <div class="desktop-view">
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
                <form action="../controller/processRegister.php" method="post">
                    <h2>Seja bem-vindo</h2>
                    <div class="create-acc">
                        <p>Vamos criar a sua conta</p>
                    </div>
                    <div class="item">
                        <label for="nameUser">Seu nome</label>
                        <input type="text" name="name_user" id="nameUser" placeholder="" required>
                    </div>

                    <div class="item">
                        <label for="nameUser">Seu nome de usuário</label>
                        <input type="text" name="login_user" id="nameUser" placeholder="" required>
                    </div>

                    <div class="item">
                        <label for="nameUser">E-mail</label>
                        <input type="text" name="email_user" id="nameUser" placeholder="" required>
                    </div>

                    <div class="item">
                        <label for="passwUser">Senha</label>
                        <input type="password" name="passwd_user" id="passwUser" required>
                    </div>

                    <div class="item">
                        <label for="passwUser">Confrimar senha</label>
                        <input type="password" name="confirm_passwd_user" id="passwUser" required>
                    </div>

                    <div class="item">
                        <button type="submit">Continuar</button>
                    </div>

                    <div class="register">
                        <p>Já tem cadastro? <a href="../views/login.php">Faça login</a></p>
                    </div>

                    <div class="return">
                        <a href="./../index.php">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- View de desktop -->
    <!-- <div class="desktop-screen">
travou kkkkk
        <div class="container-desktop">

            <div class="side1">
                <div class="title-desktop">
                    <h1>Litera</h1>
                    <p>Alfabetizando novas gerações</p>
                </div>
                <div class="arara-desktop">
                    <div class="arara-img">

                    </div>
                </div>
            </div>

            <div class="side2">
                <div class="right-i">
                    <h2>Seja bem-vindo</h2>
                    <div class="lets">
                        <p>Vamos criar a sua conta</p>
                    </div>
                    <div class="btns">
                        <form action="../controller/processRegister.php" method="POST">

                            <div class="item-form">
                                <label for="nameUser">Seu nome</label>
                                <input type="text" name="name_user" id="nameUser" required>
                            </div>

                            <div class="item-form">
                                <label for="loginUser">E-mail</label>
                                <input type="email" name="email_user" id="loginUser" required placeholder="email@email.com">
                            </div>

                            <div class="item-form">
                                <label for="passwd">Senha</label>
                                <input type="password" name="passwd_user" id="passwd" required>
                            </div>

                            <div class="item-form">
                                <label for="confirmation">Confirmar senha</label>
                                <input type="password" name="confirm_passwd_user" id="confirmation" required>
                            </div>

                            <div class="item-form">
                                <button type="submit">Continuar</button>
                            </div>

                            <div class="item-form">
                                <div class="link">
                                    <a href="../index.php" id="returns">Voltar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div> -->
    <!-- View de mobile e tablet -->


    <!--<div class="mobile-screen">
        <div class="logo">
            <img src="../assets/images/LOGOTIPO (cópia).png" alt="">
        </div>

        <div class="buttons">
            <form action="../controller/processRegister.php" method="POST">
                <div class="item-form-m">
                    <label for="nameUser">Seu nome</label>
                    <input type="text" name="name_user" id="nameUser" required>
                </div>

                <div class="item-form-m">
                    <label for="loginUser">E-mail</label>
                    <input type="text" name="email_user" id="loginUser" required placeholder="email@email.com">
                </div>

                <div class="item-form-m">
                    <label for="passwd">Senha</label>
                    <input type="password" name="passwd_user" id="passwd">
                </div>

                <div class="item-form-m">
                    <label for="confirmation">Confirmar senha</label>
                    <input type="password" name="confirm_passwd_user" id="confirmation" required>
                </div>

                <div class="item-form-m">
                    <button type="submit">Continuar</button>
                </div>

                <div class="item-form-m">
                    <a href="./index.php" id="return">Voltar</a>
                </div>
            </form>
        </div>
    </div> -->

</body>

</html>