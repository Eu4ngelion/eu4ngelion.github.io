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

    $query = "SELECT * FROM review";
    $result = mysqli_query($conn, $query);
    $review = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $review[] = $row;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Data</title>
    <link rel="stylesheet" href="style/home.css">
    <link rel="stylesheet" href="style/lihat_data.css">

</head>
<body>
    <?php require 'navbar.php'; ?>

    <main class="view-main">

        <h1 class="view-main-title">LIHAT DATA</h1>

        <h2 class="view-title">DATA AKUN</h2>
        <div class="view-tabel-akun">
            <table class="view-tabel">
                <tr>
                    <th>ID</th>
                    <th>USERNAME</th>
                    <th>PASSWORD</th>
                </tr>
                <?php foreach ($account as $acc): ?>
                    <tr>
                        <td><?php echo $acc['id_account']; ?></td>
                        <td><?php echo $acc['username']; ?></td>
                        <td><?php echo $acc['password']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            
        </div>
        <h2 class="view-title">DATA IEM</h2>
        <div class="view-tabel-iem">
            <table class="view-tabel">
                <tr>
                    <th>ID</th>
                    <th>RANK</th>
                    <th>NAMA</th>
                    <th>HARFA</th>
                    <th>PATH</th>
                </tr>
                <?php foreach ($iem as $earphone): ?>
                    <tr>
                        <td><?php echo $earphone['id_iem']; ?></td>
                        <td><?php echo $earphone['rank']; ?></td>
                        <td><?php echo $earphone['nama_iem']; ?></td>
                        <td><?php echo $earphone['harga']; ?></td>
                        <td><?php echo $earphone['path']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            
        </div>
        <h2 class="view-title">DATA REVIEW</h2>
        <div class="view-tabel-review">
            <table class="view-tabel">
                <tr>
                    <th>ID REVIEW</th>
                    <th>ID IEM</th>
                    <th>ID AKUN</th>
                    <th>REVIEW</th>
                </tr>
                <?php foreach ($review as $rev): ?>
                    <tr>
                        <td><?php echo $rev['id_review']; ?></td>
                        <td><?php echo $rev['id_iem']; ?></td>
                        <td><?php echo $rev['id_akun']; ?></td>
                        <td><?php echo $rev['review']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            
        </div>
    </main>




    <script src="scripts/home.js"></script>
</body>
</html>