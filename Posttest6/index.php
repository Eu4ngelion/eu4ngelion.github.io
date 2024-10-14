<?php 
    require ('koneksi.php');
    $query = "SELECT * FROM account";
    $result = mysqli_query($conn, $query);
  
    $account = [];
    while ($row = mysqli_fetch_assoc($result)) {
      $account[] = $row;
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
            WELCOME TO EARGENIUS
        </h1>
        <div class="container">
            <form id="login-form" action="index.php" method="post">
                <label for="username"><b>Username (user123):</b></label><br>
                <input type="text" id="username" name="username" required><br>
                <label for="password"><b>Password (pass123):</b></label><br>
                <input type="password" id="password" name="password" required><br><br>
                <button type="submit" style="margin-bottom: 10px">Login</button>

            </form>
            <a class="register-login-container"href="register.php">
                <button class="register-login">Register</button>
            </a> 

        </div>
  </body>
</html>

<!-- Login check -->
<?php
    $id_akun = 1;
    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $login_success = false;
        foreach($account as $akun){
            if($akun['username'] == $username && $akun['password'] == $password){
                $login_success = true;

                break;
            }
            $id_akun++;
        }
        if($login_success){
            echo "<script>alert('Login berhasil');</script>";
            echo "<script>document.location.href = 'dashboard.php';</script>";
            session_start();
            $_SESSION['id_akun'] = $id_akun;
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
        }
        else{
            echo "<script>
            alert('Login gagal');
            </script>";
        }
    }
?>