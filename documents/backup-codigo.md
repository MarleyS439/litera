
Esse é o backup do código da tela de login.

Precisei remodelar a página.

depois irei inserir o php na nova tela.

<!-- View de desktop -->
    <div class="desktop-screen">

        <div class="container-desktop">

            <div class="side1">
                <div class="title-desktop">
                    <h1>Litera</h1>
                    <p>Alfabetizando novas gerações</p>
                </div>

                <div class="arara-img">
                    <img src="../assets/images/arara 2.svg" alt="" class="">
                </div>
            </div>

            <div class="side2">
                <div class="right-i">
                    <h2>Entrar</h2>
                    <div class="btns">
                        <form action="../controller/processLogin.php" method="POST">
                            <div class="item-form">
                                <!-- Necessário validação regex para e-mail ou name_user-->
                                <label for="loginUser">Nome de usuário ou E-mail</label>
                                <input type="text" name="login_user" id="loginUser" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}|[a-zA-Z0-9_]{3,}" required title="Por favor, preencha este campo">
                                <span id="loginUserError" class="error"></span><br>
                            </div>

                            <div class="item-form">
                                <label for="passwd">Senha</label>
                                <input type="password" name="passwd_user" id="passwd" required title="Preencha este campo">
                                <span id="senhaError" class="error"></span><br>
                            </div>

                            <div class="item-form">
                                <?php if (isset($_GET['status'])) : ?>
                                    <?php if ($_GET['status'] == 'erro1') : ?>
                                        <p style="color: red;">Credenciais inválidas ou incorretas</p>
                                    <?php else : ?>
                                        <p style="color: red;"></p>
                                    <?php endif ?>
                                <?php endif ?>
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
                    <?php if (isset($_GET['status'])) : ?>
                        <?php if ($_GET['status'] == 'sucess') : ?>
                            <div class="notification">
                                <div class="notification_body">
                                    <!-- <img src="../assets/images/icons/ban-svgrepo-com 1.png" class="notification_icon" alt="block"> -->
                                    Conta Criada com Sucesso, realize login! &#128512
                                </div>
                                <div class="notification_progress"></div>
                            </div>
                        <?php elseif ($_GET['status'] == 'erro2') : ?>
                            <div class="notification-erro2">
                                <div class="notification_body">
                                    <img src="../assets/images/icons/ban-svgrepo-com 1.png" class="notification_icon" alt="block">
                                    Realize login para ter acesso ao Litera
                                </div>
                                <div class="notification_progress-erro2"></div>
                            </div>
                        <?php elseif ($_GET['status'] == 'erro3') : ?>
                            <div class="notification-erro3">
                                <div class="notification_body">
                                    <img src="../assets/images/icons/ban-svgrepo-com 1.png" class="notification_icon" alt="block">
                                    Conta temporariamente suspensa
                                </div>
                                <div class="notification_progress-erro3"></div>
                            </div>
                        <?php else : ?>
                            <p style="color: red;"></p>
                        <?php endif ?>
                    <?php endif ?>

                </div>
            </div>
        </div>

    </div>
    <!-- View de mobile e tablet -->
    <div class="mobile-screen">
        <div class="logo">
            <img src="../assets/images/LOGOTIPO (cópia).png" alt="">
        </div>

        <div class="buttons">
            <form action="" method="POST">
                <div class="item-form-m">
                    <label for="loginUser">Nome de usuário ou E-mail</label>
                    <input type="text" name="login_user" id="loginUser" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}|[a-zA-Z0-9_]{3,}" required>
                </div>

                <div class="item-form-m">
                    <label for="passwdUser">Senha</label>
                    <input type="password" name="passwd_User" id="passwdUser">
                </div>

                <div class="item-form-m">
                    <button type="submit">Continuar</button>
                </div>

                <div class="item-form-m">
                    <a href="./index.php" id="return">Voltar</a>
                </div>
            </form>
        </div>
    </div> 