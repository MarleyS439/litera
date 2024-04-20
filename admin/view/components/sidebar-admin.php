<!-- inicio da session para pegar nome e email do user -->
<?php
$usuarioAutenticado = $_SESSION['authAdmin'];
?>
<!-- Component de sidebar -->
<div class="sidebar-component">
    <div class="container-options">

        <div class="title-admin">
            <h1>Litera</h1>
            <span>Administrador</span>
        </div>

        <div class="options">
            <a href="home.php" title="Home">
                <img src="../../admin/assets/images/icons/home.svg" alt="Home" class="icon">
                <span>Home</span>
            </a>

            <a href="jogos.php" title="Jogos">
                <img src="../../admin/assets/images/icons/play[.svg" alt="Jogos" class="icon">
                <span>Jogos</span>
            </a>

            <a href="loja.php" title="Loja">
                <img src="../../admin/assets/images/icons/store.svg" alt="Loja" class="icon">
                <span>Loja</span>
            </a>

            <a href="users.php" title="Usuários">
                <img src="../../admin/assets/images/icons/users.svg" alt="Usuários" class="icon">
                <span>Usuários</span>
            </a>
        </div>

        <div class="info-profile-admin">
            <div class="profile-pic-admin">
                <img src="../../assets/images/icons/profile.svg" alt="">
                <div class="info-profile-admin">    
                    <span class="name-admin"><?php echo $usuarioAutenticado['nome'] ?></span>
                    <span class="email-admin"><?php echo $usuarioAutenticado['email'] ?></span>
                </div>
                <a href="../controller/logoutAdmin.php" title="Encerrar sessão" id="logout">
                    <img src="../assets/images/icons/logout.png" alt="">
                </a>
            </div>
        </div>
    </div>
</div>