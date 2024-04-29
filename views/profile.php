<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Illumi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Litera | Criar perfil</title>
    <link rel="shortcut icon" href="../assets/images/icons/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/register-child.css">
</head>

<body>

    <div class="overlay"></div>
    <div class="container">
        <div class="arara">
            <img src="../assets/images/arara 2.svg" alt="">
            <h2>Litera</h2>
        </div>

        <div class="container-add-profile">
            <div class="title-form">
                <h2 id="h2">Parece que ainda não há um perfil, vamos criar um?</h2>
            </div>

            <div class="add">
                <button type="submit" id="addProfile" title="Criar um novo perfil">
                    <img src="../assets/images/icons/addbtn.png" alt="">
                </button>
            </div>
        </div>


        <!-- Modal de adicionar perfil -->
        <div class="modal-add-profile" id="modalAddProfile">

            <div class="cancel">
                <button type="button" id="cancelAddProfile" title="Cancelar">
                    <img src="../assets/images/icons/cancel-img.png" alt="">
                </button>
            </div>

            <div class="title-modal">
                <p>Adicionar perfil</p>
            </div>

            <div class="">
                <form action="" method="post">
                    <div class="inputs-modal">
                        <label for="namechild">Nome</label>
                        <input type="text" name="" id="" placeholder="João">
                    </div>


                    <div class="two">
                        <div class="inpu">
                            <label for="namechild">Data de nascimento</label>
                            <input type="date" name="" id="">
                        </div>
                        <div class="inpu">
                            <label for="namechild">Gênero</label>
                            <select name="" id="">
                                <option value="Não definido">-</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Feminino">Feminino</option>
                            </select>
                        </div>
                    </div>

                    <div class="profile-select-icon">
                        <div class="title-profile-select">
                            <p>Selecione a foto de perfil</p>
                        </div>
                        <input type="hidden" name="imagem_perfil" id="imagem_perfil">


                        <div class="select-icon carrossel">

                            <div class="">
                                <img src="../assets/images/icons/Frame 190.png" alt="">
                            </div>

                            <div class="">
                                <img src="../assets/images/icons/Frame 196.png" alt="">
                            </div>

                            <div class="">
                                <img src="../assets/images/icons/Frame 197.png" alt="">
                            </div>

                            <div class="">
                                <img src="../assets/images/icons/Frame 198.png" alt="">
                            </div>
            
                        </div>
                    </div>

                    <div class="inputs-modal">
                        <button type="submit">Adicionar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../assets/javascript/modal-add-profile.js"></script>
</body>

</html>