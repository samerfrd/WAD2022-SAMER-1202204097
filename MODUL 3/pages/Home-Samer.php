<?php 
  require "config/connector.php";

  $result = mysqli_query($conn, "SELECT * FROM showroom_samer_table");
  if(mysqli_num_rows($result) == 0) {
    $url = "Add-Samer.php";
  } else {
    $url = "ListCar-Samer.php";
  }
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

    <nav class="navbar navbar-expand bg-primary navbar-dark">
      <div class="container">
        <div class="navbar-nav">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
          <a class="nav-link" href="pages/<?= $url; ?>">MyCar</a>
        </div>
      </div>
    </nav>

    <section id="home">
      <div class="container d-flex align-content-center welcome">
        <div class="row align-items-center">
          <div class="col-md-6">
            <h1>Selamat Datang di Showroom SAMER</h1>
            <p>At lacus vitae nulla sagittis scelerisque nisl. Pellentesque duis cursus vestibulum, facilisi ac, sed faucibus.</p>
            <a class="btn btn-primary" href="pages/<?= $url; ?>" role="button">MyCar</a>
            <div class="logo-ead d-flex align-items-center">
              <img src="C:\Users\LENOVO\OneDrive\Documents\GitHub\WAD2022-SAMER-1202204097\MODUL 3\assets\logo-ead.png" alt="Logo EAD" width="100">
              <span class="ms-5">FARID HERLANGGA SAMER_1202204097</span>
            </div>
          </div>
          <div class="col-md-6">
            <img class="rounded-4" src="assets\mazda.jpg" alt="Showroom">
          </div>
        </div>
      </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>