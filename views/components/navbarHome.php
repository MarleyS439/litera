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
        </ul>
    </div>


    <!-- <div class="profile">
        <div class="profile-pic">
            <span><?php echo $usuarioAutenticado['nome']?></span>
            <img src="../assets/images/icons/profile.svg" alt="">
        </div>
    </div> -->
    <div>
        <a href="../controller/logoutUser.php" title="logout">
            <img class="img-logoff" src="../assets/images/icons/exit-svgrepo-com.svg" alt="exit">
        </a>

    </div>
</nav>
<script src="https://kit.fontawesome.com/a3e37e504d.js" crossorigin="anonymous"></script>