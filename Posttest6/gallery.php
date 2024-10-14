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

<section class="gallery" id="gallery">
    <!-- Gallery -->
    <?php
      $i = 1;
      foreach($iem as $iem): ?>
      <?php if ($i = 2): ?>
        <div class="card">
          <div class="rating">
            <p><?= $iem['rank'] ?></p>
            <p>Rank</p>
          </div>
          <img src=<?php echo $iem['path']?>>
          <div class="info">
            <p><?= $iem['nama_iem'] ?></p>
            <p>$<?= $iem['harga'] ?></p>
          </div>
          <a href="review.php?id_iem=<?= $iem['id_iem'] ?>">
            <button class="review" id="review_button">Review</button>
          </a>
        </div>
      <?php endif ?>
    <?php $i++; endforeach?>
  </section>

  <script src="scripts/home.js"></script>