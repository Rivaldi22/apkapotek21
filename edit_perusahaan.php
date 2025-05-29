<?php
include 'koneksi.php';

$id_perusahaan = $_GET['id_perusahaan'] ?? '';
$data = mysqli_query($conn, "SELECT * FROM perusahaan WHERE id_perusahaan='$id_perusahaan'");
$d = mysqli_fetch_assoc($data);

// Cek jika data tidak ditemukan
if (!$d) {
  echo "Data perusahaan tidak ditemukan.";
  exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id_perusahaan    = $_POST['id_perusahaan'];
  $nama_perusahaan  = $_POST['nama_perusahaan'];
  $alamat           = $_POST['alamat'];
  $no_telp          = $_POST['no_telp'];
  $fax              = $_POST['fax'];

  mysqli_query($conn, "UPDATE perusahaan SET 
    nama_perusahaan='$nama_perusahaan', 
    alamat='$alamat', 
    no_telp='$no_telp', 
    fax='$fax' 
    WHERE id_perusahaan='$id_perusahaan'");

  header("Location: perusahaan.php");
  exit;
}
?>          
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Data Perusahaan</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
  <h3>Edit Data Perusahaan</h3>
  <form method="POST">
    <!-- Tambahkan input hidden untuk id_perusahaan -->
    <input type="hidden" name="id_perusahaan" value="<?=$d['id_perusahaan']?>">

    <div class="mb-2">
      <label>Nama Perusahaan</label>
      <input type="text" name="nama_perusahaan" value="<?=$d['nama_perusahaan']?>" class="form-control" required>
    </div>
    <div class="mb-2">
      <label>Alamat</label>
      <input type="text" name="alamat" value="<?=$d['alamat']?>" class="form-control" required>
    </div>
    <div class="mb-2">
      <label>No. Telepon</label>
      <input type="text" name="no_telp" value="<?=$d['no_telp']?>" class="form-control" required>
    </div>
    <div class="mb-2">
      <label>Fax</label>
      <input type="text" name="fax" value="<?=$d['fax']?>" class="form-control" required>
    </div>
    
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="perusahaan.php" class="btn btn-secondary">Kembali</a>
  </form>
</div>
</body>
</html>
