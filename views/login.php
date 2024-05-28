<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Illumi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Litera | Login</title>
    <link rel="stylesheet" href="../assets/css/login-page.css">
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

                <div class="advisor">
                    <!-- Aqui vai as informações de autenticação de login -->
                    <?php if (isset($_GET['status'])) : ?>
                        <?php if ($_GET['status'] == 'sucess') : ?>
                            <div class="notification">
                                <div class="notification_body">
                                    <span> Conta Criada com Sucesso, realize login! &#128512</span>
                                </div>
                                <div class="notification_progress"></div>
                            </div>
                        <?php elseif ($_GET['status'] == 'erro2') : ?>
                            <div class="notification-erro2">
                                <div class="notification_body">
                                    <img class="icon-alert" width="25" src="../assets/images/icons/icon _ban_.svg" class="notification_icon" alt="block">
                                    <span> Realize login para ter acesso ao Litera</span>
                                </div>
                                <div class="notification_progress-erro2"></div>
                            </div>
                        <?php elseif ($_GET['status'] == 'erro3') : ?>
                            <div class="notification-erro3">
                                <div class="notification_body">
                                    <img class="icon-alert" src="../assets/images/icons/icon _warning triangle outline_.svg" class="notification_icon" alt="block">
                                    <span>Conta temporariamente suspensa</span>
                                </div>
                                <div class="notification_progress-erro3"></div>
                            </div>
                        <?php else : ?>
                            <p style="color: red;"></p>
                        <?php endif ?>
                    <?php endif ?>
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

    <!--   <div class="desktop-view">
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
                    <?php if (isset($_GET['status'])) : ?>
                        <?php if ($_GET['status'] == 'erro1') : ?>
                            <p style="color: red;">Credenciais inválidas ou incorretas</p>
                        <?php else : ?>
                            <p style="color: red;"></p>
                        <?php endif ?>
                    <?php endif ?>
                    <div class="item">
                        <button type="submit">Continuar</button>
                    </div>

                    <div class="register">
                        <p>Não tem cadastro? <a href="../views/register.php">Cadastre-se</a></p>
                    </div>

                    <div class="return">
                        <a href="./../index.php">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
        <?php if (isset($_GET['status'])) : ?>
            <?php if ($_GET['status'] == 'sucess') : ?>
                <div class="notification">
                    <div class="notification_body">
                        <span> Conta Criada com Sucesso, realize login! &#128512</span>
                    </div>
                    <div class="notification_progress"></div>
                </div>
            <?php elseif ($_GET['status'] == 'erro2') : ?>
                <div class="notification-erro2">
                    <div class="notification_body">
                        <img class="icon-alert"  src="../assets/images/icons/icon _warning triangle outline_.svg" class="notification_icon" alt="block">
                        <span> Realize login para ter acesso ao Litera</span>
                    </div>
                    <div class="notification_progress-erro2"></div>
                </div>
            <?php elseif ($_GET['status'] == 'erro3') : ?>
                <div class="notification-erro3">
                    <div class="notification_body">
                        <img class="icon-alert" width="25" src="../assets/images/icons/icon _ban_.svg" class="notification_icon" alt="block">
                        <span>Conta temporariamente suspensa</span>
                    </div>
                    <div class="notification_progress-erro3"></div>
                </div>
            <?php else : ?>
                <p style="color: red;"></p>
            <?php endif ?>
        <?php endif ?>
    </div> -->

</body>
<script src="../assets/javascript/emptyField.js"></script>

</html>