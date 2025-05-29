<?php
include 'koneksi.php';

$id_customer = $_GET['id_customer'] ?? '';
$data = mysqli_query($conn, "SELECT * FROM customer WHERE id_customer='$id_customer'");
$d = mysqli_fetch_assoc($data);

// Cek jika data tidak ditemukan
if (!$d) {
  echo "Data perusahaan tidak ditemukan.";
  exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id_customer     = $_POST['id_customer'];
  $nama_customer   = $_POST['nama_customer'];
  $perusahaan_cust = $_POST['perusahaan_cust'];
  $alamat          = $_POST['alamat'];

  mysqli_query($conn, "UPDATE customer SET 
    nama_customer='$nama_customer',
    perusahaan_cust='$perusahaan_cust', 
    alamat='$alamat'
    WHERE id_customer='$id_customer'");

  header("Location: customer.php");
  exit;
}

?>          
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Data customer</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
  <h3>Edit Data customer</h3>
  <form method="POST">
    <!-- Tambahkan input hidden untuk id_perusahaan -->
    <input type="hidden" name="id_customer" value="<?=$d['id_customer']?>">

    <div class="mb-2">
      <label>Nama customer</label>
      <input type="text" name="nama_customer" value="<?=$d['nama_customer']?>" class="form-control" required>
    </div>
    <div class="mb-2">
      <label>perusahaan customer</label>
      <input type="text" name="perusahaan_cust" value="<?=$d['perusahaan_cust']?>" class="form-control" required>
    </div>
    <div class="mb-2">
      <label>Alamat</label>
      <input type="text" name="alamat" value="<?=$d['alamat']?>" class="form-control" required>
    </div>
    
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="customer.php" class="btn btn-secondary">Kembali</a>
  </form>
</div>
</body>
</html>
