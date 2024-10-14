<?php 
    require ('koneksi.php');
    $query = "SELECT * FROM account";
    $result = mysqli_query($conn, $query);
  
    $earphone = [];
    while ($row = mysqli_fetch_assoc($result)) {
      $mahasiswa[] = $row;
    }
?>

<!-- 
    account:
    Primary: id_akun (int)
    username (varchar(50))
    password (varchar(50)) 
-->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EarGenius</title>
    <link rel="stylesheet" href="style/home.css">
    <link rel="stylesheet" href="style/login.css">
  </head>
  <body>
    <main class="login-section">
        <h1 class="login-title">
            REGISTER EARGENIUS
        </h1>
        <div class="container">
            <form id="login-form" action="register.php" method="post">
                <label for="username"><b>Username:</b></label><br>
                <input type="text" id="username" name="username" required><br>
                <label for="password"><b>Password:</b></label><br>
                <input type="password" id="password" name="password" required><br><br>
                <button type="submit">REGISTER</button>
            </form>
            <a class="register-login-container"href="index.php">
                <button class="register-login" type="button" id="go_to_login">LOGIN</button>
            </a>
        </div>
  </body>
</html>

<!-- Register check -->
<?php
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $query = "SELECT * FROM account WHERE username = '$username'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('Username sudah terdaftar!')</script>"; 
        } else {
            $query = "INSERT INTO account VALUES ('', '$username', '$password')";
            $result = mysqli_query($conn, $query);
            if ($result) {
                echo "<script>alert('Register berhasil!'); window.location.href='index.php';</script>";
            } else {
                echo "<script>alert('Register gagal!')";
            }
        }
    }
?>