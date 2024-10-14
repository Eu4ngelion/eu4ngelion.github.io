<!-- NAVBAR -->
<nav>
    <!-- Home & Logo -->
    <div class="logo">
        <a href="dashboard.php">
        <h4 id="logo">EAR <br> GENIUS</h4>
        </a>
    </div>

    <!-- Navigation Links -->
    <div class="show nav-links" id="nav-links">
        <a href="about.php">About</a>
        <a href="#category">Category</a>
        <a href="#contact">Contact</a>
    </div>

    <!-- Hamburger Menu -->
    <div class="hamburger" id="hamburger">
        <div class="line"></div>
        <div class="line"></div>    
        <div class="line"></div>
    </div>

    <!-- Right Upper Navbar -->
    <div class="navbar-right">
        <!-- Username -->  
        <?php
            $username = 'Guest';
            if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
            }
        ?>
        <div class="username">
            <p id="username"> Welcome, <?php echo $username; ?></p>
        </div>

        <!-- Lihat Data -->
        <a href="lihat_data.php">
            <button class="lihat-data">Lihat Data</button>
        </a>

        <!-- Login -->
        <a href="index.php">
            <button class="lihat-data">Log Out</button>
        </a>

        <!-- Light & Dark mode -->
        <img id="theme-toggle" src="assets/dark_light.png"> </img>  
    </div>
</nav>