<?php 
  require "../config/connector.php";
  require "../config/insert.php";
  require "../config/edit.php";
  require "../config/delete.php";

  $query = "SELECT * FROM showroom_samer_table";
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ( $row = mysqli_fetch_assoc($result) ) {
    $rows[] = $row;
  }
  $jmlMobil = mysqli_num_rows($result);
  
  if(isset($_POST["add"])) {
    insert($_POST);
    echo "<meta http-equiv='refresh' content='3' />";
    echo "<div class='toast' role='alert' aria-live='assertive' aria-atomic='true' data-bs-autohide='false'>
            <div class='toast-header'>
              <div class='bg-primary rounded me-2' style='width: 20px; height: 20px'></div>
              <strong class='me-auto'>Alert</strong>
              <button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
            </div>
            <div class='toast-body'>
              Data berhasil ditambah
            </div>
          </div>";
  } elseif(isset($_POST["simpan"])) {
    edit($_POST);
    echo "<meta http-equiv='refresh' content='3' />";
    echo "<div class='toast' role='alert' aria-live='assertive' aria-atomic='true' data-bs-autohide='false'>
            <div class='toast-header'>
              <div class='bg-warning rounded me-2' style='width: 20px; height: 20px'></div>
              <strong class='me-auto'>Alert</strong>
              <button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
            </div>
            <div class='toast-body'>
              Data berhasil diupdate
            </div>
          </div>";
  } elseif(isset($_POST["hapus"])) {
    delete($_POST);
    echo "<meta http-equiv='refresh' content='3' />";
    echo "<div class='toast' role='alert' aria-live='assertive' aria-atomic='true' data-bs-autohide='false'>
            <div class='toast-header'>
              <div class='bg-danger rounded me-2' style='width: 20px; height: 20px'></div>
              <strong class='me-auto'>Alert</strong>
              <button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
            </div>
            <div class='toast-body'>
              Data berhasil dihapus
            </div>
          </div>";
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- My CSS -->
    <link rel="stylesheet" href="../assets/style/index.css">
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <!-- Awal Navbar -->
    <nav class="navbar navbar-expand bg-primary navbar-dark">
      <div class="container py-2">
        <div class="navbar-nav">
          <a class="nav-link" href="../index.php">Home</a>
          <a class="nav-link active" aria-current="page" href="#">MyCar</a>
        </div>
        <div class="add-button">
          <a href="Add-Samer.php" class="btn btn-light" role="button">Add Car</a>
        </div>
      </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Awal List Car -->
    <section id="list-car">
      <div class="container">
        <div class="mt-4">
          <h2>My Show Room</h2>
          <p>List Show Room SAMER - 1202200199</p>
        </div>
        <div class="row mt-5">
          <?php foreach($rows as $data) : ?>
            <div class="col-md-5 mb-5">
              <div class="card rounded-3 shadow" style="width: 28rem;">
                <img src="../assets/images/<?= $data["foto_mobil"]; ?>" class="card-img-top p-2 rounded-4" alt="...">
                <div class="card-body">
                  <h5 class="card-title"><?= $data["nama_mobil"]; ?></h5>
                  <p class="card-text"><?= $data["deskripsi"]; ?></p>
                  <div class="d-flex">
                    <a href="../pages/Detail-Samer.php?id=<?= $data["id_mobil"]; ?>" class="btn btn-primary rounded-5 px-5 me-3" role="button">Detail</a>
                    <form action="" method="post">
                      <input type="hidden" name="id_mobil" value="<?= $data["id_mobil"]; ?>">
                      <button type="submit" class="btn btn-danger rounded-5 px-5" role="button" name="hapus">Delete</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="pb-4">
          <p class="fw-bold">Jumlah Mobil: <?= $jmlMobil; ?></p>
        </div>
      </div>
    </section>
    <!-- Akhir List Car -->

    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script>
      const myToast = document.querySelector(".toast");
      const bsToast = new bootstrap.Toast(myToast);
      bsToast.show();
    </script>
  </body>
</html>