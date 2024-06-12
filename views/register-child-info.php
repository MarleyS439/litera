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

</body>

</html>
