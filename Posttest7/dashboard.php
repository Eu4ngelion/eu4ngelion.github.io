<?php
  require 'koneksi.php';
  $query = "SELECT * FROM account";
  $result = mysqli_query($conn, $query);
  $account = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $account[] = $row;
  }

  $query = "SELECT * FROM iem";
  $result = mysqli_query($conn, $query);
  $iem = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $iem[] = $row;
  }


  session_start();  
  $id_akun = $_SESSION['id_akun'];

  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>POSTTEST 7</title>
  <link rel="stylesheet" href="style/home.css">
</head>

<body class>
  <!-- Navbar -->
   <?php require 'navbar.php'; ?>

  <!-- Intro Section -->
  <section class="intro" id="intro" style='background-image : url("assets/wallpaper3.jpg")'>
    <div class="title">
      <h2>BREAKING SOUND BARRIERS</h2>
      <h2>THE ULTIMATE IEM REVIEW</h2>  
    </div>
  </section>

  <!-- Review Gallery -->

  <!-- Live Search -->
  <?php include 'gallery.php'; ?>

  <!-- Footer -->
   <? include 'footer.php'; ?>

  <script src="scripts/home.js"></script>
</body>
</html>
