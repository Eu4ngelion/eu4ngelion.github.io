<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Page</title>
    <link rel="stylesheet" href="style/home.css">
    <link rel="stylesheet" href="style/about.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <!-- Navigation Bar -->
    <?php require 'navbar.php'; ?>

    <!-- About -->
    <section class="about">
        <h1>Tentang Saya</h1>
        <p>Nama: Injil Karepowan</p>
        <p>NIM: 2309106028</p>
        <p>Kelas: Informatika A2 2023</p>
        <p>Praktikum: <a href="https://classroom.google.com/u/1/c/NzEwMjM0NDcyMzE3/a/NzE3NTk1NzAwNTE4/details">Posttest 3</a></p>
    </section>

    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }
        .about {
            flex: 1;
        }
    </style>
    <!-- Footer -->
     <?php include 'footer.php'; ?>

    <script src="scripts/home.js"></script>
    <script src="scripts/about.js"></script>
</body>
</html>