<!-- <?php
    session_start();

    session_destroy();
    header("Location: ../views/login.php")

?> -->
<!-- errado -->

<!-- arquivo esta com o nome invertido, devido a um cod anterior que prefiro n alterar -->
 <!-- logout do perfil em logoutUser -->
<?php
    session_start();
    // Verificar se a sessão authUser está definida
    if(isset($_SESSION['authUser'])) {
        // Destruir a sessão authUser
        unset($_SESSION['authUser']);
    }
    // Redirecionar para a página inicial
    header("location: ./../index.php");
    exit();
?>
