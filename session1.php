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

 
    if (isset($_GET["hapus"])) {
        $index = $_GET["hapus"];
        unset($_SESSION["dataSiswa"][$index]);
        header("Location: https://naylaqanitaalifia.000webhostapp.com/session1.php");
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
    <h1 class="text-center mt-4 mb-4 fw-bold">Masukkan Data Siswa</h1>
    <form action="" method="post">
      <div class="form-group row justify-content-center mb-4">
        <label for="nama" class="col-sm-1 col-form-label text-start">Nama </label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="nama" id="nama" pattern="[A-Za-z]+" required autocomplete="off">
        </div>
      </div>

      <div class="form-group row justify-content-center mb-4">
        <label for="nis" class="col-sm-1 col-form-label text-start">NIS </label>
        <div class="col-sm-5">
          <input type="number" class="form-control" name="nis" id="nis" required autocomplete="off">
        </div>
      </div>

      <div class="form-group row justify-content-center mb-4">
        <label for="rombel" class="col-sm-1 col-form-label text-start">Rombel </label>
        <div class="col-sm-5">
          <select class="form-select" name="rombel" id="rombel" required>
            <option value="">Pilih Rombel</option>
            <option value="PPLG">PPLG</option>
            <option value="DKV">DKV</option>
            <option value="TJKT">TJKT</option>
            <option value="PMN">PMN</option>
            <option value="MPLB">MPLB</option>
            <option value="HTL">HTL</option>
            <option value="KLN">KLN</option>
          </select>
        </div>
      </div>

      <div class="form-group row justify-content-center mb-4">
        <label for="rayon" class="col-sm-1 col-form-label text-start">Rayon </label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="rayon" id="rayon" pattern="^[a-zA-Z0-9\s]+$" required autocomplete="off">
        </div>
      </div>

      <div class="form-group mb-4 justify-content-center">
        <button type="submit" class="btn btn-success mt-3 mb-4" name="kirim" value="kirim"><i class="bi bi-file-earmark-plus"></i> Tambah</button>
        <a href="session2.php" class="btn btn-primary mt-3 mb-4" target="_blank"><i class='bi bi-printer'></i> Cetak</a>
        <a href="session3.php" class="btn btn-danger mt-3 mb-4"><i class='bi bi-trash'></i> Hapus Semua</a>
      </div>
    </form>

   
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
  
  </div>

 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js" integrity="sha384-cs/Kn5dr4H5A8ozg2M+OdCqVLvR/3fGmim/v4KgkxR0DS2LRQ/ZJSn0i+jdd5pXk3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-cdLknYM5ZVlo//fubJssFbFb39YNDrRftmXQuC41qUcb7wk5jok90Ks6voXxImFc" crossorigin="anonymous"></script>

</body>
</html>
