<?php 
  require "../config/connector.php";

  $id = $_GET["id"];
  $query = "SELECT * FROM showroom_samer_table WHERE id_mobil = $id";
  $result = mysqli_query($conn, $query);
  $data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
      </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Awal Item Detail -->
    <section id="item-detail">
      <div class="container">
        <div class="mt-4">
          <h2><?= $data["nama_mobil"]; ?></h2>
          <p>Detail Mobil <?= $data["nama_mobil"]; ?></p>
        </div>
        <div class="row mt-5 justify-content-between">
          <div class="col-md-5">
            <img src="../assets/images/<?= $data["foto_mobil"]; ?>" alt="" width="100%">
          </div>
          <div class="col-md-7">
            <form action="Edit-Samer.php" method="post" enctype="multipart/form-data">
              <input type="hidden" name="id_mobil" value="<?= $data["id_mobil"]; ?>">
              <div class="mb-3">
                <label for="nama_mobil" class="form-label fw-bold">Nama Mobil</label>
                <input type="text" name="nama_mobil" class="form-control" id="nama_mobil" value="<?= $data["nama_mobil"]; ?>" readonly>
              </div>
              <div class="mb-3">
                <label for="pemilik_mobil" class="form-label fw-bold">Nama Pemilik</label>
                <input type="text" name="pemilik_mobil" class="form-control" id="pemilik_mobil" value="<?= $data["pemilik_mobil"]; ?>" readonly>
              </div>
              <div class="mb-3">
                <label for="merk_mobil" class="form-label fw-bold">Merk</label>
                <input type="text" name="merk_mobil" class="form-control" id="merk_mobil" value="<?= $data["merk_mobil"]; ?>" readonly>
              </div>
              <div class="mb-3">
                <label for="tanggal_beli" class="form-label fw-bold">Tanggal Beli</label>
                <input type="date" name="tanggal_beli" class="form-control" id="tanggal_beli" value="<?= $data["tanggal_beli"]; ?>" readonly>
              </div>
              <div class="mb-3">
                <label for="deskripsi" class="form-label fw-bold">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" id="deskripsi" rows="4" placeholder="<?= $data["deskripsi"]; ?>" readonly></textarea>
              </div>
              <div class="mb-3 position-relative foto">
                <label for="foto_mobil" class="form-label fw-bold">Foto</label>
                <input class="form-control" name="foto_mobil" type="file" id="foto_mobil" style="color: transparent" value="<?= $data["foto_mobil"]; ?>" disabled>
                <span><?= $data["foto_mobil"]; ?></span>
              </div>
              <div class="mb-3">
                <span class="d-block mb-2 fw-bold">Status Pembayaran</span>
                <?php if($data["status_pembayaran"] === "Lunas") : ?>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status_pembayaran" id="lunas" value="Lunas" checked>
                    <label class="form-check-label" for="lunas">Lunas</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status_pembayaran" id="belumLunas" value="Belum Lunas" disabled>
                    <label class="form-check-label" for="belumLunas">Belum Lunas</label>
                  </div>
                <?php else : ?>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status_pembayaran" id="lunas" value="Lunas" disabled>
                    <label class="form-check-label" for="lunas">Lunas</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status_pembayaran" id="belumLunas" value="Belum Lunas" checked>
                    <label class="form-check-label" for="belumLunas">Belum Lunas</label>
                  </div>
                <?php endif; ?>
              </div>
              <button type="submit" class="btn btn-primary mb-5" name="edit">Edit</button>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- Akhir Item Detail -->

    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>