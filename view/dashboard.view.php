
<?php 
$username = isset($_GET["username"]) ? base64_decode($_GET["username"]) : "";
$emailUser = isset($_GET["email"]) ? base64_decode($_GET["email"]) : "";
?>


<!DOCTYPE html>
<!-- Coding by CodingNepal || www.codingnepalweb.com -->
<html lang="en">
  <head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hayde | Dashboard</title>
    <!-- botstraplink -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="css/dashboard-style.css" />
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/member.css">
    <?php require "view/partials/meta.php"; ?>
    <!-- Boxicons CSS -->
    <link flex href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <script src="js/dashboard.js" defer></script>
  </head>
  <body>
    <nav class="sidebar locked">
      <div class="logo_items flex">
        <a href="index.php">
        <span class="nav_image"> <img src="img/favicon-hayde-berita.png" alt="logo_img" /> </span>
        <span class="logo_name">Hayde News</span>
        </a>
        <i class="bx bx-lock-alt" id="lock-icon" title="Unlock Sidebar"></i>
        <i class="bx bx-x" id="sidebar-close"></i>
      </div>
      

      <div class="menu_container">
        <div class="menu_items">
          <ul class="menu_item">
            <div class="menu_title flex">
              <span class="title">Dashboard</span>
              <span class="line"></span>
            </div>
            <li class="item">
              <a href="#" class="link flex" id="overview-link">
                <i class="bx bx-home-alt"></i>
                <span>Overview</span>
              </a>
            </li>

            <li class="item">
              <a href="#" class="link flex" id="all-projects-link">
                <i class="bx bx-grid-alt"></i>
                <span>All Projects</span>
              </a>
            </li>
          </ul>

          <ul class="menu_item">
            <div class="menu_title flex">
              <span class="title">Editor</span>
              <span class="line"></span>
            </div>

            <li class="item">
              <a href="#" class="link flex" id="new-project-link">
                <i class="bx bx-folder"></i>
                <span>New Projects</span>
              </a>
            </li>
          </ul>

          <ul class="menu_item">
            <div class="menu_title flex">
              <span class="title">Setting</span>
              <span class="line"></span>
            </div>
            <li class="item">
              <a href="#" class="link flex" id="member-link">
                <i class='bx bx-user-circle'></i>
                <span>User Member</span>
              </a>
            </li>
            <li class="item">
              <a href="#" class="link flex" id="setting-link">
                <i class="bx bx-cog"></i>
                <span>Setting</span>
              </a>
            </li>
            <li class="item">
              <a href="logout.php" class="link flex" id="setting-link">
              <i class='bx bx-caret-left-square'></i>
                <span>Logout</span>
              </a>
            </li>
          </ul>
          
</div>

        <div class="sidebar-profile flex">
          <span class="nav_image">
            <img src="img/user.svg" alt="logo_img" />
          </span>
          <div class="data-user">
            <span class="name"><?= $username; ?></span>
            <span class="user-email"> <?= $emailUser; ?></span>
          </div>
        </div>
      </div>
    </nav>

    <!-- Navbar -->
    <nav class="navbar flex">
      <i class="bx bx-menu" id="sidebar-open"></i>
      <input type="text" placeholder="Search..." class="search_box" />
      <span class="nav_image">
        <img src="images/profile.jpg" alt="logo_img" />
      </span>
    </nav>
<!-- partials page -->
<?php 
require("view/partials/dashboard.php");
require("view/partials/overview.php");
require("view/partials/allproject.php");
require("view/partials/newproject.php");
require("view/partials/member.php");
require("view/partials/setting.php");
?>
  </body>
</html>