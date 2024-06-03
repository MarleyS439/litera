<?php

require_once "../dao/usuarioDao.php";
require_once "../dao/perfilDao.php";

?>

<nav class="navbar">
    <div class="logo-area">
        <img src="../assets/images/litera.png" alt="Litera">
        <span>Litera</span>
    </div>

    <div class="navigation">
        <ul>
            <li class="home-icon">
                <a href="../views/home.php">
                    <svg width="28" height="31">
                        <image href="../assets/images/icons/home-icon-desktop.svg" width="28" height="31" />
                    </svg>
                </a>
            </li>
            <li class="store-icon">
                <a href="../views/store.php">
                    <svg width="28" height="31">
                        <image href="../assets/images/icons/store-icon-desktop.svg" width="28" height="31" />
                    </svg>
                </a>
            </li>
            <li class="profile-icon">
                <a href="../views/perfil-profile.php">
                    <svg width="28" height="31">
                        <image href="../assets/images/icons/profile-icon-desktop.svg" width="28" height="31" />
                    </svg>
                </a>
            </li>
        </ul>
    </div>


    <div class="profile-info">
        <div class="name-user">
            <span><?php echo $perfilAutenticado['nomePerfil']; ?></span>
        </div>
        <div class="level">
            <span><?php echo $perfilAutenticado['nivel']; ?></span>
        </div>
        <div class="coin">
            <svg width="36" height="36">
                <image href="../assets/images/icons/coin2.svg" width="35" height="36" />
            </svg>
        </div>

        <div class="name-user">
            <span><?php echo $perfilAutenticado['dinheiroPerfil']; ?></span>
        </div>

        <div class="logout-area">
            <a href="../controller/logoutUser.php">
                <img src="../assets/images/icons/exitIcon.svg" alt="Logout">
            </a>
        </div>
    </div>

</nav>

