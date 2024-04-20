<?php
$usuarioAutenticado = $_SESSION['authAdmin'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Sidebar</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./../../assets/css/sidebar.css">
</head>

<body>
  <nav class="sidebar">
    
    <div class="search__wrapper">
      <p class="title-sidebar">Litero</p>
    </div>
    <div class="sidebar-links">
      <ul>
        <li>
          <a href="home.php" title="Dashboard" class="tooltip">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-layout-dashboard" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M4 4h6v8h-6z" />
              <path d="M4 16h6v4h-6z" />
              <path d="M14 12h6v8h-6z" />
              <path d="M14 4h6v4h-6z" />
            </svg>
            <span class="link hide">Home</span>
            <span class="tooltip__content">Home</span>
          </a>
        </li>
        <li>
          <a href="loja.php" title="Analytics" class="tooltip">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" width="24" height="24" stroke-width="2" stroke="currentColor" fill="#fff">
              <path d="M36.8 192H603.2c20.3 0 36.8-16.5 36.8-36.8c0-7.3-2.2-14.4-6.2-20.4L558.2 21.4C549.3 8 534.4 0 518.3 0H121.7c-16 0-31 8-39.9 21.4L6.2 134.7c-4 6.1-6.2 13.2-6.2 20.4C0 175.5 16.5 192 36.8 192zM64 224V384v80c0 26.5 21.5 48 48 48H336c26.5 0 48-21.5 48-48V384 224H320V384H128V224H64zm448 0V480c0 17.7 14.3 32 32 32s32-14.3 32-32V224H512z" />
            </svg>
            <span class="link hide">Loja</span>
            <span class="tooltip__content">Loja</span>
          </a>
        </li>

        <li>
          <a href="conquista.php" title="Reports" class="tooltip">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="24" height="24" stroke-width="2" stroke="currentColor" fill="#fff">
              <path d="M4.1 38.2C1.4 34.2 0 29.4 0 24.6C0 11 11 0 24.6 0H133.9c11.2 0 21.7 5.9 27.4 15.5l68.5 114.1c-48.2 6.1-91.3 28.6-123.4 61.9L4.1 38.2zm503.7 0L405.6 191.5c-32.1-33.3-75.2-55.8-123.4-61.9L350.7 15.5C356.5 5.9 366.9 0 378.1 0H487.4C501 0 512 11 512 24.6c0 4.8-1.4 9.6-4.1 13.6zM80 336a176 176 0 1 1 352 0A176 176 0 1 1 80 336zm184.4-94.9c-3.4-7-13.3-7-16.8 0l-22.4 45.4c-1.4 2.8-4 4.7-7 5.1L168 298.9c-7.7 1.1-10.7 10.5-5.2 16l36.3 35.4c2.2 2.2 3.2 5.2 2.7 8.3l-8.6 49.9c-1.3 7.6 6.7 13.5 13.6 9.9l44.8-23.6c2.7-1.4 6-1.4 8.7 0l44.8 23.6c6.9 3.6 14.9-2.2 13.6-9.9l-8.6-49.9c-.5-3 .5-6.1 2.7-8.3l36.3-35.4c5.6-5.4 2.5-14.8-5.2-16l-50.1-7.3c-3-.4-5.7-2.4-7-5.1l-22.4-45.4z" />
            </svg>
            <span class="link hide">Conquistas</span>
            <span class="tooltip__content">Conquistas</span>
          </a>
        </li>

        <li>
          <a href="users.php" title="Reports" class="tooltip">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="icon icon-tabler icon-tabler-report-analytics" width="24" height="24" stroke-width="1" stroke="currentColor" fill="#fff" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <path d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z" />
            </svg>
            <span class="link hide">Usuarios</span>
            <span class="tooltip__content">Usuarios</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidebar__profile">
      <div class="avatar__wrapper">
        <img class="avatar" src="assets/profile.png" alt="Joe Doe Picture">
        <div class="online__status"></div>
      </div>
      <div class="avatar__name hide">
        <div class="user-name"> <?php echo $usuarioAutenticado['nome'] ?></div>
        <div class="email"> <?php echo $usuarioAutenticado['email'] ?></div>
      </div>
      <a href="../controller/logoutAdmin.php" class="logout hide">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" aria-labelledby="logout-icon" role="img">
          <title id="logout-icon">log out</title>
          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
          <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"></path>
          <path d="M9 12h12l-3 -3"></path>
          <path d="M18 15l3 -3"></path>
        </svg>
      </a>
    </div>
  </nav>

</body>

</html>