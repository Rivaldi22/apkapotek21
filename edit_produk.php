<?php
include 'koneksi.php';

$id_produk = $_GET['id_produk'] ?? '';
$data = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk='$id_produk'");
$d = mysqli_fetch_assoc($data);

// Cek jika data tidak ditemukan
if (!$d) {
  echo "Data perusahaan tidak ditemukan.";
  exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id_produk     = $_POST['id_produk'];
  $nama_produk   = $_POST['nama_produk'];
  $price         = $_POST['price'];
  $jenis       = $_POST['jenis'];
  $stock       = $_POST['stock'];

  mysqli_query($conn, "UPDATE produk SET 
    nama_produk='$nama_produk',
    price='$price', 
    jenis='$jenis',
    stock='$stock'
    WHERE id_produk='$id_produk'");

  header("Location: kelola_penjualan.php");
  exit;
}

?>          
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Data produk</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
  <h3>Edit Data produk</h3>
  <form method="POST">
    <!-- Tambahkan input hidden untuk id_perusahaan -->
    <input type="hidden" name="id_produk" value="<?=$d['id_produk']?>">

    <div class="mb-2">
      <label>Nama produk</label>
      <input type="text" name="nama_produk" value="<?=$d['nama_produk']?>" class="form-control" required>
    </div>
    <div class="mb-2">
      <label>price</label>
      <input type="text" name="price" value="<?=$d['price']?>" class="form-control" required>
    </div>
    <div class="mb-2">
      <label>jenis</label>
      <input type="text" name="jenis" value="<?=$d['jenis']?>" class="form-control" required>
    </div>
    <div class="mb-2">
      <label>stock</label>
      <input type="text" name="stock" value="<?=$d['stock']?>" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="kelola_penjualan.php" class="btn btn-secondary">Kembali</a>
  </form>
</div>
</body>
</html>
