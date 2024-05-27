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

include_once('../controller/processingChart.php');
?>
<!-- pegar as informações do banco -->
<?php
require_once "../../dao/adminDao.php";
$infos = AdminDao::selectAllLitera();
?>
<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Illumi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador | Home</title>
    <link rel="stylesheet" href="../../admin/assets/css/sidebar-admin.css">
    <link rel="shortcut icon" href="../../assets/images/icons/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../admin/assets/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>

<body>
    <div class="sides">
        <?php include('../view/components/sidebar-admin.php'); ?>

        <div class="information-home">
            <div class="title">
                <h2>Dashboard</h2>
            </div>

            <div class="container animate__animated animate__fadeInDown">
                <div class="card-container">
                    <div class="card">
                        <img src="../assets/images/icons/Page-1.svg" alt="">
                        <div class="text-content">
                            <p class="font-card"><?php echo $infos['userCount'] ?></p>
                            <h4>Usuários cadastrados</h4>
                        </div>
                    </div>
                </div>
                <div class="card-container">
                    <div class="card">
                        <img src="../assets/images/icons/Dribbble-Light-Preview.svg" alt="">
                        <div class="text-content">
                            <p class="font-card"><?php echo $infos['countBuys'] ?></p>
                            <h4>Jogos nas ultimas 24h</h4>
                        </div>
                    </div>
                </div>
                <div class="card-container">
                    <div class="card">
                        <img src="../assets/images/icons/Group.svg" alt="">
                        <div class="text-content">
                            <p class="font-card"><?php echo $infos['activeUserCount'] ?></p>
                            <h4>Usuários logados</h4>
                        </div>
                    </div>
                </div>
                <div class="card-container">
                    <div class="card">
                        <img src="../assets/images/icons/Etiqueta.svg" alt="">
                        <div class="text-content">
                            <p class="font-card"><?php echo $infos['bannedUserCount'] ?></p>
                            <h4>Compras nas ultimas 24h</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class='chart-container'>
                <div class="charts">
                    <div class="chart-content">
                        <div class="chart-title">Pie Chart</div>
                        <div class="chart-subtitle">Overall Subtitle</div>
                        <div class="chart-width">
                            <canvas id="doughnutChart1" class="chart"></canvas>
                            <canvas id="doughnutChart2" class="chart"></canvas>
                            <canvas id="doughnutChart3" class="chart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="charts">
                    <div class="chart-content">
                        <div class="chart-title">Acessos</div>
                        <div class="chart-subtitle">Overall Subtitle</div>
                        <div class="chart-line-width">
                            <canvas id="lineChart" class="chart-line"></canvas>
                        </div>
                    </div>
                </div>
            </div>


            <input type="hidden" name="mes" id="mes" value="<?php echo date('n') ?>">
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script src="../assets/javascript/charts.js"></script>


        </div>
    </div>


</body>

</html>