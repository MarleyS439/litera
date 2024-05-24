<?php
    session_start();
    // Verificar se a sessão authAdmin está definida
    if(isset($_SESSION['authAdmin'])) {
        // Destruir a sessão authAdmin
        unset($_SESSION['authAdmin']);
    }
    // Redirecionar para a página inicial
    header("location: ../index.php");
    exit();
?>
