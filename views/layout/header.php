<header class="header" data-header>
    <div class="container">
      <div class="overlay" data-overlay></div>
      <a href="index.php" class="logo">
        <img style="height: 60px; width:92px" src="assets/images/galaxy-logo-mobile.png" alt="">
      </a>
      <div class="header-actions">
        <button class="search-btn">
          <ion-icon name="search-outline"></ion-icon>
        </button>
        <div class="lang-wrapper">
          <label for="language">
            <ion-icon name="globe-outline"></ion-icon>
          </label>
          <select name="language" id="language">
            <option value="vi">VI</option>
            <option value="en">EN</option>
          </select>
        </div>
        <!--<button class="btn btn-primary">Sign in</button>
        -->
      </div>

      <button class="menu-open-btn" data-menu-open-btn>
        <ion-icon name="reorder-two"></ion-icon>
      </button>

      <nav class="navbar" data-navbar>

        <div class="navbar-top">

          <a href="" class="logo">
            <img src="" alt="Filmlane logo">
          </a>

          <button class="menu-close-btn" data-menu-close-btn>
            <ion-icon name="close-outline"></ion-icon>
          </button>

        </div>

        <ul class="navbar-list">

          <li>
            <a href="index.php" class="navbar-link">Home</a>
          </li>

          <li>
            <a href="index.php" class="navbar-link">Movie</a>
          </li>

          <li>
            <?php               
                if(isset($_SESSION['email'])){
                echo '<a href="#" class="navbar-link">'.$_SESSION['fullName'] .'</a>';
                }else{
                  echo '<a href="?controller=user&action=login" class="navbar-link">Login</a>';
                }
             ?>
          </li>

          <li>
          <?php               
                if(isset($_SESSION['email'])){
                echo '<a href="?controller=user&action=logout" class="navbar-link">Đăng xuất</a>';
                }else{
                  echo '<a href="?controller=user&action=register" class="navbar-link">Register</a>';
                }
             ?>
          </li>

        </ul>

        <ul class="navbar-social-list">

          <li>
            <a href="#" class="navbar-social-link">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="navbar-social-link">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="navbar-social-link">
              <ion-icon name="logo-pinterest"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="navbar-social-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="navbar-social-link">
              <ion-icon name="logo-youtube"></ion-icon>
            </a>
          </li>

        </ul>

      </nav>

    </div>
  </header>