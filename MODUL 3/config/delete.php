<?php 
  require "connector.php";

  function delete($data) {
    global $conn;
    $id_mobil = $data["id_mobil"];
    $query = "DELETE FROM showroom_samer_table WHERE id_mobil = $id_mobil";
  
    mysqli_query($conn, $query);
  }

?>