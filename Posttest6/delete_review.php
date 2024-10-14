<?php
    require 'koneksi.php';
    $id_rev = $_GET['id_review'];
    $id_earphone = null;

    $review = [];
    $query = "SELECT * FROM review";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $review[] = $row;
    }


    foreach ($review as $rev) {
        if ($rev['id_review'] == $id_rev) {
            $id_earphone = $rev['id_iem'];
            unlink ('images/' . $rev['foto']); // hapus file lama
        }
    }

    $query = "DELETE FROM review WHERE id_review = $id_rev";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "
            <script>
                alert('Berhasil menghapus review');
                document.location.href = 'review.php?id_iem=$id_earphone';
            </script>";
    } else {
        echo "
            <script>
                alert('Gagal menghapus review');
                document.location.href = 'review.php?id_iem=$id_earphone';
            </script>";
    }
?>