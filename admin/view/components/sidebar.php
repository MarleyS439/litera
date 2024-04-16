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
    <div class="sidebar-menu">
        <div class="itens">
            <a class="item" href="home.php">
                <div class="icon">
                    <img src="../assets/images/icons/home-icon.png" alt="">
                </div>
                <div class="nameOption">
                    <span>Home</span>
                </div>
            </a>

            <a class="item" href="jogos.php">
                <div class="icon">
                    <img src="../assets/images/icons/play-icon.png" alt="">
                </div>
                <div class="nameOption">
                    <span>Jogos</span>
                </div>
            </a>

            <a class="item" href="loja.php">
                <div class="icon">
                    <img src="../assets/images/icons/store-icon.png" alt="">
                </div>
                <div class="nameOption">
                    <span>Loja</span>
                </div>
            </a>

            <a class="item" href="users.php">
                <div class="icon">
                    <img src="../assets/images/icons/user-icon.png" alt="">
                </div>
                <div class="nameOption">
                    <span>Usuários</span>
                </div>
            </a>
        </div>
    </div>
    <div class="search__wrapper">
      <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg" aria-labelledby="search-icon" role="img">
        <title id="search-icon">Search</title>
        <path
          d="M9 9L13 13M5.66667 10.3333C3.08934 10.3333 1 8.244 1 5.66667C1 3.08934 3.08934 1 5.66667 1C8.244 1 10.3333 3.08934 10.3333 5.66667C10.3333 8.244 8.244 10.3333 5.66667 10.3333Z"
          stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
      </svg>
      <input type="text" aria-labelledby="search-icon">
    </div>
    <div class="sidebar-links">
      <ul>
        <li>
          <a href="home.php" title="Dashboard" class="tooltip">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-layout-dashboard" width="24"
              height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
              stroke-linejoin="round" aria-hidden="true">
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
          <a href="jogos.php" class="tooltip">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chart-bar" width="24"
              height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
              stroke-linejoin="round" aria-hidden="true">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M3 12m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
              <path d="M9 8m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v10a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
              <path d="M15 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
              <path d="M4 20l14 0" />
            </svg>
            <span class="link hide">Jogos</span>
            <span class="tooltip__content">Jogos</span>
          </a>
        </li>
        <li>
          <a href="loja.php" title="Analytics" class="tooltip">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chart-pie" width="24"
              height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
              stroke-linejoin="round" aria-hidden="true">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M10 3.2a9 9 0 1 0 10.8 10.8a1 1 0 0 0 -1 -1h-6.8a2 2 0 0 1 -2 -2v-7a.9 .9 0 0 0 -1 -.8" />
              <path d="M15 3.5a9 9 0 0 1 5.5 5.5h-4.5a1 1 0 0 1 -1 -1v-4.5" />
            </svg>
            <span class="link hide">Loja</span>
            <span class="tooltip__content">Loja</span>
          </a>
        </li>

        <li>
          <a href="users.php" title="Reports" class="tooltip">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-report-analytics" width="24"
              height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
              stroke-linejoin="round" aria-hidden="true">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
              <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
              <path d="M9 17v-5" />
              <path d="M12 17v-1" />
              <path d="M15 17v-3" />
            </svg>
            <span class="link hide">Usuários</span>
            <span class="tooltip__content">Usuários</span>
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
        <div class="user-name">Joe Doe</div>
        <div class="email">joe.doe@atheros.ai</div>
      </div>
      <a href="#logout" class="logout hide">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout" width="24" height="24"
          viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
          stroke-linejoin="round" aria-labelledby="logout-icon" role="img">
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