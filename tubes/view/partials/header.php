

<body>
    <div class="container-header">
      <header>
        <div class="header">
          <a href="index.php">
            <img src="img/logo.svg" alt="Hayde Berita" />
          </a>

          <h3>Selamat Datang di Hayde Berita, <br />Sebelum Masuk Hayde Bismillah Dulu!,</h3>
          <nav class="menu-login">
            <ul class="menu">
              <li><a href="index.php">Bisnis</a></li>
              <li><a href="index.php">Politik</a></li>
              <li><a href="index.php">Ekonomi</a></li>
              <li><a href="index.php">Teknologi</a></li>
              <li><a href="index.php">Kecantikan</a></li>
              <li><a href="index.php">Kesehatan</a></li>
              <li><a href="index.php">Olahraga</a></li>
              <li><a href="index.php">Hiburan</a></li>
            </ul>
            <div class="button">
            <button class="signin">
              <a href="<?= $buttonLink ?>" class="login-register"><?= $buttonText ?></a>
            </button>
            </div>
            <a href="#" onclick="document.documentElement.scrollTop += 5; return false;" class="scroll">
              <i class="bi bi-chevron-double-down"></i>
            </a>
          </nav>
        </div>
        <form action="" method="post" class="search-header">
          <input type="search" name="search" placeholder="Nyari Berita Apa Bro!" class="header-search" />
          <button type="submit" name="btn-search" class="button-header"><i class="bi bi-search"></i></button>
        </form>
        <button class="menu-togel">
          <i class="bi bi-list"></i>
        </button>
      </header>
