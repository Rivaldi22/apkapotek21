<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
  $nama_produk     = $_POST['nama_produk'];
  $price     = $_POST['price'];
  $jenis    = $_POST['jenis'];
  $stock    = $_POST['stock'];

  mysqli_query($conn,"INSERT INTO `produk`(`id_produk`, `nama_produk`,`price`, `jenis`, `stock`) 
                    VALUES ('$id_produk','$nama_produk','$price','$jenis','$stock')");
header("location:kelola_penjualan.php");
}
?>          
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data produk</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
  
<div class="container mt-4">
  <h3>Tambah Data produk</h3>
  <form method="POST">
    <div class="mb-2">
      <label for="id_produk">ID produk</label>
      <input type="text" id="id_produk" name="id_produk" class="form-control" required>
    </div>
    <div class="mb-2">
      <label for="nama_produk">Nama produk</label>
      <input type="text" id="nama_produk" name="nama_produk" class="form-control" required>
    </div>
    <div class="mb-2">
      <label for="price">Price</label>
      <input type="text" id="price" name="price" class="form-control" required>
    </div>
    <div class="mb-2">
      <label for="jenis">jenis</label>
      <input type="tel" id="jenis" name="jenis" class="form-control" required>
    </div>
    <div class="mb-2">
      <label for="stock">stock</label>
      <input type="tel" id="stock" name="stock" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="kelola_penjualan.php" class="btn btn-secondary">Kembali</a>
  </form>
</div>


</body>
</html>     