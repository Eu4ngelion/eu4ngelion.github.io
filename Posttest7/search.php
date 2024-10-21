<?php
require 'koneksi.php';

if (isset($_GET['term'])) {
    $searched = mysqli_real_escape_string($conn, $_GET['term']);
    $query = "SELECT * FROM iem WHERE nama_iem LIKE '%$searched%'";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) > 0) {
        while ($earphone = mysqli_fetch_assoc($result)) {
            echo "<div class='card'>";
            echo "<div class='rating'><p>{$earphone['rank']}</p><p>Rank</p></div>";
            echo "<img src='{$earphone['path']}'>";
            echo "<div class='info'><p>{$earphone['nama_iem']}</p><p>{$earphone['harga']}</p></div>";
            echo "<a href='review.php?id_iem={$earphone['id_iem']}'>";
            echo "<button class='review' id='review_button'>Review</button>";
            echo "</a></div>";
        }
    } else {
        echo "<p>No results found.</p>";
    }
}
?>