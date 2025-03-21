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
                <h2>Faça Login</h2>
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
                        <span>Entrar</span>
                        <img src="../assets/images/icons/enter-icon.svg" alt="">
                    </button>
                </div>

                <div class="reset-pwd">
                    <div class="reset">
                        <a href="./passwordRecovery.php">Esqueceu a senha?</a>
                    </div>
                    
                    <div class="reset">
                        <a href="../controller/conectionGuesty.php" onclick="document.getElementById('guestLoginForm').submit();">Faça login como convidado!</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php if (isset($_GET['status'])) : ?>
        <?php if ($_GET['status'] == 'erro1') : ?>

            <div class="notification-erro2">
                <div class="notification_body">
                    <span> Credenciais inválidas! <img class="icon-alert" src="../assets/images/icons/icon _warning triangle outline_.svg" class="notification_icon" alt="block">
                    </span>
                </div>

                <div class="notification_progress-erro2"></div>
            </div>

        <?php else : ?>
            <p style="color: red;"></p>
        <?php endif ?>
    <?php endif ?>
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
                    <img class="icon-alert" src="../assets/images/icons/icon _warning triangle outline_.svg" class="notification_icon" alt="block">
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
                <div class="notification_progress-erro4"></div>
            </div>
        <?php elseif ($_GET['status'] == 'erro5') : ?>
            <div class="notification-erro3">
                <div class="notification_body">
                    <img class="icon-alert" width="25" src="../assets/images/icons/icon _ban_.svg" class="notification_icon" alt="block">
                    <span>Erro ao entrar como convidado</span>
                </div>
                <div class="notification_progress-erro3"></div>
            </div>
        <?php else : ?>
            <p style="color: red;"></p>
        <?php endif ?>
    <?php endif ?>
    </div>

</body>
<script src="../assets/javascript/emptyField.js"></script>

</html>