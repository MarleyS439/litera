<?php
// session
session_start();
// verificação se o user esta logado
if(!isset($_SESSION['authUser'])){
    // caso não esteja, redirecione a login e indique que para realizar o login
    header("Location: ./login.php?status=erro2");
    exit();
}
// variavel para todas as informaçoes do usuario
$usuarioAutenticado = $_SESSION['authUser'];
// verificar se o user esta banido
if($usuarioAutenticado['banido']!=0){
    // caso não esteja, redirecionar a login e indique que o user foi banido
    header("Location: ./login.php?status=erro3");
    exit();
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/store.css">
    <link rel="shortcut icon" href="../assets/images/icons/Litera Icon2.ico" type="image/x-icon">
    <title>Loja | Litera</title>
</head>

<body>
    <?php
    include('../views/components/topbar.php');
    ?>

    <div class="title-container">
        <h2>Loja de produtos</h2>
    </div>

    <div class="contain">

        <div class="cards">
            <a href="" class="access-card">
                <div class="name-card">
                    <p>Roupas</p>
                </div>
                <div class="figure-card">
                    <img src="../assets/images/icons/shirt-icon.png" alt="Roupas">
                </div>
            </a>
        </div>

        <div class="cards">
            <a href="" class="access-card">
                <div class="name-card">
                    <p>Chapéus</p>
                </div>
                <div class="figure-card">
                    <img src="../assets/images/icons/hat-icon.png" alt="Chápeus">
                </div>
            </a>
        </div>

        <div class="cards">
            <a href="" class="access-card">
                <div class="name-card">
                    <p>Acessórios</p>
                </div>
                <div class="figure-card">
                    <img src="../assets/images/icons/glass-icon.png" alt="Acessórios">
                </div>
            </a>
        </div>
    </div>
</body>

</html>