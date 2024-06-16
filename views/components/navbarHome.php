<?php
// Obtém o nome do script
$fileName = basename($_SERVER['PHP_SELF']);
?>

<nav class="navbar">
    <?php if ($fileName == 'home.php' || $fileName == 'store.php' || $fileName == 'perfil-profile.php') : ?>
        <div class="logo-area">
            <img src="../assets/images/litera.png" alt="Litera">
            <span>Litera</span>
        </div>
    <?php else : ?>
        <div class="logo-area">
            <img src="../../assets/images/litera.png" alt="Litera">
            <span>Litera</span>
        </div>
    <?php endif; ?>

    <div class="navigation">
        <?php if ($fileName == 'home.php' || $fileName == 'store.php' || $fileName == 'perfil-profile.php') : ?>
            <ul>
                <li class="home-icon">
                    <a href="./home.php" title="Início">
                        <svg width="28" height="31">
                            <image href="../assets/images/icons/home-icon-desktop.svg" width="28" height="31" />
                        </svg>
                    </a>
                </li>
                <?php if (!$codUser['isGuesty']) : ?>
                    <li class="store-icon">
                        <a href="./store.php" title="Loja de Itens">
                            <svg width="28" height="31">
                                <image href="../assets/images/icons/store-icon-desktop.svg" width="28" height="31" />
                            </svg>
                        </a>
                    </li>
                    <li class="profile-icon">
                        <a href="./perfil-profile.php" title="Meu Perfil">
                            <svg width="28" height="31">
                                <image href="../assets/images/icons/profile-icon-desktop.svg" width="28" height="31" />
                            </svg>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        <?php else : ?>
            <ul>
                <li class="home-icon">
                    <a href="./home.php" title="Início">
                        <svg width="28" height="31">
                            <image href="../../assets/images/icons/home-icon-desktop.svg" width="28" height="31" />
                        </svg>
                    </a>
                </li>
                <?php if (!$codUser['isGuesty']) : ?>
                    <li class="store-icon">
                        <a href="./store.php" title="Loja de Itens">
                            <svg width="28" height="31">
                                <image href="../../assets/images/icons/store-icon-desktop.svg" width="28" height="31" />
                            </svg>
                        </a>
                    </li>
                    <li class="profile-icon">
                        <a href="./perfil-profile.php" title="Meu Perfil">
                            <svg width="28" height="31">
                                <image href="../../assets/images/icons/profile-icon-desktop.svg" width="28" height="31" />
                            </svg>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        <?php endif; ?>
    </div>

    <div class="profile-info">
        <div class="name-user">
            <span><?php echo $perfilAutenticado['nomePerfil'] ?? $codUser['nomePerfil']; ?> a</span>
        </div>
        <div class="level">
            <span><?php echo $perfilAutenticado['nivel'] ?? $codUser['nivel']; ?></span>
        </div>
        <?php if ($fileName == 'home.php' || $fileName == 'store.php' || $fileName == 'perfil-profile.php') : ?>
            <div class="coin">
                <svg width="36" height="36">
                    <image href="../assets/images/icons/coin2.svg" width="35" height="36" />
                </svg>
            </div>
        <?php else : ?>
            <div class="coin">
                <svg width="36" height="36">
                    <image href="../../assets/images/icons/coin2.svg" width="35" height="36" />
                </svg>
            </div>
        <?php endif; ?>
        <div class="name-user">
            <span><?php echo $perfilAutenticado['dinheiroPerfil'] ?? $codUser['dinheiroPerfil']; ?></span>
        </div>

        <?php if ($fileName == 'home.php') : ?>
            <div class="logout-area">
                <a href="../controller/logoutUser.php" title="Sair da plataforma">
                    <img src="../assets/images/icons/exitIcon.svg" alt="Logout">
                </a>
            </div>
        <?php else : ?>
            <div class="logout-area">
                <a href="../controller/logoutUser.php" title="Sair da plataforma">
                    <img src="../assets/images/icons/exitIcon.svg" alt="Logout">
                </a>
            </div>
        <?php endif; ?>
    </div>
</nav>
