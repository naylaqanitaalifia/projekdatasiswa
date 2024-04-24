<?php

session_start();

    if (!isset($_SESSION["dataSiswa"])) {
        $_SESSION["dataSiswa"] = array();
    }

    if (isset($_POST["nama"]) && isset($_POST["nis"]) && isset($_POST["rombel"]) && isset($_POST["rayon"])) {
        $data = array(
            "nama" => $_POST["nama"],
            "nis" => $_POST["nis"],
            "rombel" => $_POST["rombel"],
            "rayon" => $_POST["rayon"]
        );
        array_push($_SESSION["dataSiswa"], $data);
        header("Location: https://naylaqanitaalifia.000webhostapp.com/session1.php");
        exit;
    }

    // proses hapus data
    if (isset($_GET["hapus"])) {
        $index = $_GET["hapus"];
        unset($_SESSION["dataSiswa"][$index]);
        header("Location: https://naylaqanitaalifia.000webhostapp.com/session2.php");
        exit;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- CSS -->
  <link rel="stylesheet" href="style.css">

  <title>Data Siswa</title>
</head>
<body>
<div class="container my-5">
    <h1 class="mt-4 mb-4 fw-bold">Data Siswa</h1>
    
    <!-- START PHP -->
    <?php

    echo "<table class='table' align='center'>
            <thead class='table-light'>
              <tr>
                <th scope='col'>NAMA</th>
                <th scope='col'>NIS</th>
                <th scope='col'>ROMBEL</th>
                <th scope='col'>RAYON</th>
                <th scope='col'>AKSI</th>
              </tr>
            </thead>
            <tbody>";
    
    if (!empty($_SESSION["dataSiswa"])) {
      foreach ($_SESSION["dataSiswa"] as $index => $value) {
        echo "<tr>
                <td>" . $value["nama"] . "</td>
                <td>" . $value["nis"] . "</td>
                <td>" . $value["rombel"] . "</td>
                <td>" . $value["rayon"] . "</td>
                <td><a href='?hapus=".$index."' class='btn btn-danger'><i class='bi bi-trash'></i> Hapus</a></td>
              </tr>";
      }
    }
    
    echo "</tbody></table>";
    ?>
    <!-- END PHP -->

    <a href="session1.php" class="btn btn-primary back mt-4 mb-3"><i class="bi bi-box-arrow-left"></i> Kembali</a>
  </div>

  <!-- Optional JavaScript -->
  <!-- Popper.js first, then Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js" integrity="sha384-cs/Kn5dr4H5A8ozg2M+OdCqVLvR/3fGmim/v4KgkxR0DS2LRQ/ZJSn0i+jdd5pXk3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-cdLknYM5ZVlo//fubJssFbFb39YNDrRftmXQuC41qUcb7wk5jok90Ks6voXxImFc" crossorigin="anonymous"></script>

  <script>
    // JavaScript code here
  </script>
</body>
</html>
