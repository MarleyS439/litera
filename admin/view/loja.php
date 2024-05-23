<?php
// session
session_start();
// verificação se o user esta logado
if (!isset($_SESSION['authAdmin'])) {
    // caso não esteja, redirecione a login e indique que para realizar o login
    header("Location: ../view/index.php?status=erro2");
    exit();
}
// variavel para todas as informaçoes do usuario
$usuarioAutenticado = $_SESSION['authAdmin'];

require('../../dao/cabeloDao.php');
require('../../dao/generoDao.php');
require('../../dao/roupaDao.php');
$cabelo = CabeloDao::selectAll();
$roupa = RoupaDao::selectAll();
$genero = GeneroDao::selectAll();

?>
<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Illumi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../assets/images/icons/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../admin/assets/css/admin.css">
    <link rel="stylesheet" href="../../admin/assets/css/sidebar-admin.css">

    <title>Administrador | Loja</title>
</head>

<body>
    <div class="sides">
        <?php include('../view/components/sidebar-admin.php'); ?>

        <div class="information">
            <div class="information-home">
                <div class="flex-title">
                    <div class="btn-addArea">
                        <button type="button" class="btn-addItem" id="btnOpenModal">
                            <span>Adicionar novo item</span>
                        </button>
                        <script src="../assets/javascript/modalStore.js"></script>
                    </div>
                    <div class="title">
                        <h2>Itens Loja</h2>
                    </div>
                    <div class="select-container">
                        <select id="filtro-cards" onchange="mostrarOpcao()" class="selecao">
                            <option value="">Tudo</option>
                            <option value="cabelos">Cabelos</option>
                            <option value="roupas">Roupas</option>
                            <option value="peles">Peles</option>
                        </select>
                    </div>
                </div>
                <div class="modalAreaCenter">
                    <?php require_once('./components/modal.php'); ?>
                </div>

                <div class="container-loja">
                    <div class="container-cards">

                        <?php
                        foreach ($cabelo as $cabelos) : ?>
                            <div class="cards cardCabelos">
                                <img id="itemCabelo" src="../../assets/images/perfil/cabelo/<?php echo $cabelos["imgCabelo"] ?>" alt="cabelios salvos">
                                <div class="nomeItem">
                                    <p><?php echo $cabelos['nomeCabelo'] ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <?php
                        foreach ($roupa as $roupas) : ?>
                            <div class="cards cardRoupas">
                                <img id="itemCards" src="../../assets/images/perfil/roupa/<?php echo $roupas["imgRoupa"] ?>" alt="cabelios salvos">
                                <div class="nomeItem" >
                                    <p><?php echo $roupas['nomeRoupa'] ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <?php
                        foreach ($genero as $generos) : ?>
                            <div class="cards cardPeles">
                                <img id="itemCards" src="../../assets/images/perfil/genero/<?php echo $generos["imgGenero"] ?>" alt="cabelios salvos">
                                <div class="nomeItem">
                                    <p><?php echo $generos['nomeGenero'] ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>

<script>

    function mostrarOpcao() {
        // Obtém o elemento select pelo id
        var filtro = document.getElementById("filtro-cards");

        // Obtém os elementos cards pela classe
        let cabelos = document.querySelectorAll('.cardCabelos');
        let roupas = document.querySelectorAll('.cardRoupas');
        let peles = document.querySelectorAll('.cardPeles');

        // Obtém o valor da opção selecionada
        var valorFiltro = filtro.value;

        // Define todos os elementos como visíveis inicialmente
        cabelos.forEach(cabelo => cabelo.style.display = 'flex');
        roupas.forEach(roupa => roupa.style.display = 'flex');
        peles.forEach(pele => pele.style.display = 'flex');

        // Oculta os elementos baseado na seleção
        if (valorFiltro === 'cabelos') {
            roupas.forEach(roupa => roupa.style.display = 'none');
            peles.forEach(pele => pele.style.display = 'none');
        } else if (valorFiltro === 'roupas') {
            cabelos.forEach(cabelo => cabelo.style.display = 'none');
            peles.forEach(pele => pele.style.display = 'none');
        } else if (valorFiltro === 'peles') {
            cabelos.forEach(cabelo => cabelo.style.display = 'none');
            roupas.forEach(roupa => roupa.style.display = 'none');
        }

        
        
    }

</script>
</body>

</html>