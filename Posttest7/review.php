<?php
  require 'koneksi.php';
  $id_iem = $_GET['id_iem'];
  $query = "SELECT * FROM account";
  $result = mysqli_query($conn, $query);
  $account = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $account[] = $row;
  }
  
  $query = "SELECT * FROM iem WHERE id_iem = $id_iem"; ;
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
    <title>Review</title>
    
    <link rel="stylesheet" href="style/home.css">
    <link rel="stylesheet" href="style/review.css">
    
  </head>
  <body>
    <?php require 'navbar.php';
    session_start();
    $id_user = $_SESSION['id_akun'];
    ?>
  <!-- Review Section -->
   <main class="review-section">
    <?php foreach ($iem as $earphone): ?>
      <?php if ($earphone['id_iem'] == $id_iem): ?>
        <h1 class="review-iem-title"> <?php echo $earphone['nama_iem']?> </h1>
        <img class="review-image" src=<?php echo $earphone['path']?>>
        <h3 class='review-subtitle'>REVIEW</h3>
        
        <!-- Kumpulan Review -->
          <div class="review-content">
            <?php foreach($review as $rev): ?>
              <?php if($rev['id_iem'] == $id_iem): ?>
                <div class="review-row">
                <?php foreach($account as $akun): ?>
                  <?php if($akun['id_account'] == $rev['id_akun']): ?>
                      <!-- Nama Pengirim -->
                      <div class="review-author">
                        <?php 
                          echo $akun['username'];
                          if ($id_user == $rev['id_akun']){
                            echo " (You)";
                          }
                        ?>
                      </div>
                    <?php endif; ?>
                  <?php endforeach; ?>
                  <!-- Isi Review -->
                  <div class="review-text">
                    <div >
                      <?php echo $rev['review']?> <br>
                      <!-- Gambar Barang Review -->
                      <img src="images/<?php echo $rev['foto']?>" alt="<?php echo $rev['foto']?>" class="review-image">

                    </div>
                      <?php if ($id_user == $rev['id_akun']): ?>
                        <div class="review-action">
                          <a href="edit_review.php?id_review=<?php echo $rev['id_review']?>">
                            <button>Edit</button>
                          </a>
                          <a href="delete_review.php?id_review=<?php echo $rev['id_review']?>" onclick="return confirm('Apakah anda yakin?')">
                            <button>Delete</button>
                          </a>
                        </div>
                      <?php endif; ?>
                </div>
              </div>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
      <?php endif;?>
    <?php endforeach; ?> 
  </main>

  <!-- Create Review -->
  <main class="add-review-container">
    <div class="review-create">
      <h3 class="review-subtitle">ADD REVIEW</h3>
      <form id="review-form" action="review.php?id_iem=<?php echo $id_iem?>" method="post" enctype="multipart/form-data">
        <textarea class="review-textarea" name="review" required></textarea><br>
        <!-- Input file image -->
          <label for="review-image"><b>Upload Image<b></label>
          <input type="file" class="image-box" name="review-image" id="review-image" required><br>
        <button class="review-submit" type="submit">Submit</button>
      </form>
    </div>
  </main>

  <!-- Add review to SQL -->
  <?php 
    if(isset ($_POST['review'])){
      $input_user = $_SESSION['id_akun'];
      $review = $_POST['review'];
      
      // Batas ukuran 1 mb
      $batas_ukuran = 1024 * 1024 * 1;
      $tmp_name = $_FILES['review-image']['tmp_name'];
      $file_name = $_FILES['review-image']['name'];
      $file_size = $_FILES['review-image']['size'];

      // Cek apakah yang diupload ada file image
      $validExtensions = ['png', 'jpg', 'jpeg', 'webp'];
      $fileExtension = explode('.', $file_name);
      $fileExtension = strtolower(end($fileExtension));
      if (!in_array($fileExtension, $validExtensions)){
        echo "<script>
          alert('File yang diupload bukan gambar');
          document.location.href = 'review.php?id_iem=$id_iem';
        </script>";
      } else if ($file_size > $batas_ukuran){
        echo "<script>
          alert('Ukuran file terlalu besar (1MB)');
          document.location.href = 'review.php?id_iem=$id_iem';
        </script>";
      }
      
      // Check if the user exists in the account table
      $user_check_query = "SELECT * FROM account WHERE id_account = $input_user";
      $user_check_result = mysqli_query($conn, $user_check_query);
      if (mysqli_num_rows($user_check_result) == 0) {
        echo "<script>
          alert('User <?php echo $input_user ?> tidak ditemukan');
          document.location.href = 'review.php?id_iem=$id_iem';
        </script>";
      }
      else {
        if (move_uploaded_file($tmp_name, 'images/'.$file_name)){
          $query = "INSERT INTO review VALUES ('',$id_iem, $input_user, '$review', '$file_name')";
          $result = mysqli_query($conn, $query);
          if($result){
            echo "<script>
              alert('Review berhasil ditambahkan');
              document.location.href = 'review.php?id_iem=$id_iem';
            </script>";
          } else {
            echo "<script>
              alert('Review gagal ditambahkan');
              document.location.href = 'review.php?id_iem=$id_iem';
            </script>";

          }
        }
      }
    }
  ?>


  <script src="scripts/home.js"></script>
</body>
</html>
