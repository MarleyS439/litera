<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Illumi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Litera | Administrador </title>
    <link rel="shortcut icon" href="../assets/images/icons/Litera Icon2.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <!-- Views de desktop -->
    <div class="desktop-screen">

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
                <div class="layer">
                    <img src="../assets/images/layer1.png" alt="">
                </div>
                <div class="right-i">
                    <h2>Entrar como Administrador</h2>
                    <div class="btns">
                        <form action="../controller/processingAdminLogin.php" method="POST">
                            <div class="item-form">
                                <label for="loginAdmin">E-mail</label>
                                <input type="email" name="email_admin" id="loginAdmin" required>
                            </div>

                            <div class="item-form">
                                <label for="passwd">Senha</label>
                                <input type="password" name="passwd_admin" id="passwd">
                            </div>

                            <div class="item-form">
                                <?php if (isset($_GET['status'])) : ?>
                                    <?php if ($_GET['status'] == 'erro1') : ?>
                                        <p style="color: red;">Credenciais inválidas ou incorretas</p>
                                    <?php elseif ($_GET['status'] == 'erro2') : ?>
                                        <p style="color: #FDA403;">Faça login</p>
                                    <?php else : ?>
                                        <p style="color: red;"></p>
                                    <?php endif ?>
                                <?php endif ?>
                            </div>

                            <div class="item-form">
                                <button type="submit">Continuar</button>
                            </div>

                        </form>
                    </div>
                </div>

                <div class="layer2">
                    <img src="../assets/images/layer2.png" alt="">
                </div>
            </div>
        </div>
    </div>

    <!-- View de tablet e mobile -->
    <div class="mobile-screen">
        <div class="logo">
            <img src="../assets/images/LOGOTIPO (cópia).png" alt="">
        </div>

        <div class="buttons">
            <form action="" method="">
                <div class="item-form-m">
                    <div class="title-login-admin-m">
                        <h3>Logar como Administrador</h3>
                    </div>

                    <label for="loginAdmin">E-mail</label>
                    <input type="email" name="email_admin" id="loginAdmin" required placeholder="email@email.com">
                </div>

                <div class="item-form-m">
                    <label for="passwd">Senha</label>
                    <input type="password" name="passwd_user" id="passwd">
                </div>

                <div class="item-form-m">
                    <button type="submit">Continuar</button>
                </div>

            </form>
        </div>
    </div>

</body>

</html>