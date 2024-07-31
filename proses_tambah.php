<?php
include 'koneksi.php';

$merk_mobil = $_POST['merk_mobil'];
$warna = $_POST['warna'];
$plat = $_POST['plat'];
$cc = $_POST['cc'];
$tahun = $_POST['tahun'];
$id_jenis = $_POST['id_jenis'];

$sql = "INSERT INTO mobil (merk_mobil, warna, plat, cc, tahun, id_jenis) VALUES ('$merk_mobil', '$warna', '$plat', $cc, $tahun, $id_jenis)";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil ditambahkan. <a href='index.php'>Kembali</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
