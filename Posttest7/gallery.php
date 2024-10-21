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

<!-- Search Bar -->
<search class="search_gallery_container">
    <div class="search-bar">
      <form action="" method="POST">
        <input type="text" id="search" name="search" placeholder="Search IEM">
      </form> 
    </div>
    <?php
      if (isset ($_POST["search"])) {
        $searched = $_POST['search'];
        $query = "SELECT * FROM iem WHERE nama_iem LIKE '%$searched%'";
        $result = mysqli_query($conn, $query);
        $iem = [];
        while ($row = mysqli_fetch_assoc($result)) {
          $iem[] = $row;
        }
      }
    ?>
</search>

<script>
  const search = document.getElementById('search');
  search.addEventListener('input', function() {
    const term = search.value;
    const xhr = new XMLHttpRequest();
    xhr.open('GET', `search.php?term=${term}`, true);
    xhr.onload = function() {
      if (xhr.status === 200) {
        const gallery = document.getElementById('gallery');
        gallery.innerHTML = xhr.responseText;
      }
    }
    xhr.send();
  });
</script>

<section class="gallery" id="gallery">     
    <!-- Gallery -->
    <?php
      $i = 1;
      foreach($iem as $earphone): ?>
      <?php if ($i = 2): ?>
        <div class="card">
          <div class="rating">
            <p><?= $earphone['rank'] ?></p>
            <p>Rank</p>
          </div>
          <img src=<?php echo $earphone['path']?>>
          <div class="info">
            <p><?= $earphone['nama_iem'] ?></p>
            <p>$<?= $earphone['harga'] ?></p>
          </div>
          <a href="review.php?id_iem=<?= $earphone['id_iem'] ?>">
            <button class="review" id="review_button">Review</button>
          </a>
        </div>
      <?php endif ?>
    <?php $i++; endforeach?>
  </section>

  <script src="scripts/home.js"></script>