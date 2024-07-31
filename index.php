<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mobil</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      font-family: Arial, Helvetica, sans-serif;
    }

    .column {
      float: left;
      width: 25%;
      padding: 0 10px;
      margin-top: 20px;
    }

    .btn {
      padding: 10px 15px;
      background-color: #b6895b;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
      transition: background-color 0.3s;
      text-decoration: none;
    }

    .row {
      margin: 0 -5px;
    }

    .row:after {
      content: "";
      display: table;
      clear: both;
    }

    @media screen and (max-width: 600px) {
      .column {
        width: 100%;
        display: block;
        margin-bottom: 20px;
      }
    }

    .card {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      padding: 16px;
      text-align: center;
      background-color: #f1f1f1;
    }

    .card img {
      width: 100%;
      height: auto;
    }

    .btn-add {
      background-color: #4CAF50;
      color: white;
      padding: 10px 15px;
      text-decoration: none;
      border-radius: 4px;
      display: inline-block;
      margin-bottom: 20px;
    }
  </style>
</head>

<body>
  <div class="container">
    <a class="btn-add" href="tambah.php">Tambah Mobil</a>
  </div>
  <div class="row">
    <?php
    include 'koneksi.php';

    $sql = "SELECT m.id_mobil, m.merk_mobil, m.warna, m.plat, m.cc, m.tahun, j.nama_jenis 
            FROM mobil m 
            JOIN jenis j ON m.id_jenis = j.id_jenis";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<div class="column">';
            echo '<div class="card">';
            echo '<img src="#" alt="' . $row["merk_mobil"] . '">';
            echo '<div class="container">';
            echo '<h4><b>' . $row["merk_mobil"] . '</b></h4>';
            echo '<p>Warna: ' . $row["warna"] . '</p>';
            echo '<p>Plat: ' . $row["plat"] . '</p>';
            echo '<p>CC: ' . $row["cc"] . '</p>';
            echo '<p>Tahun: ' . $row["tahun"] . '</p>';
            echo '<p>Jenis: ' . $row["nama_jenis"] . '</p>';
            echo '<a class="btn" href="detail.php?id=' . $row["id_mobil"] . '">Detail Mobil</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "Tidak ada data yang ditemukan.";
    }
    $conn->close();
    ?>
  </div>
</body>

</html>
