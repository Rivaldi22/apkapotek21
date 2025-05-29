<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id_customer =$_POST['id_customer'];
  $nama_customer     = $_POST['nama_customer'];
  $perusahaan_cust     = $_POST['perusahaan_cust'];
  $alamat    = $_POST['alamat'];

  mysqli_query($conn,"INSERT INTO `customer`(`id_customer`, `nama_customer`,`perusahaan_cust`, `alamat`) 
                    VALUES ('$id_customer','$nama_customer','$perusahaan_cust','$alamat')");
header("location:customer.php");
}
?>          
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Customer</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
  
<div class="container mt-4">
  <h3>Tambah Data Customer</h3>
  <form method="POST">
    <div class="mb-2">
      <label for="id_customer">ID Customer</label>
      <input type="text" id="id_customer" name="id_customer" class="form-control" required>
    </div>
    <div class="mb-2">
      <label for="nama_customer">Nama Customer</label>
      <input type="text" id="nama_customer" name="nama_customer" class="form-control" required>
    </div>
    <div class="mb-2">
      <label for="perusahaan_cust">Perusahaan Customer</label>
      <input type="text" id="perusahaan_cust" name="perusahaan_cust" class="form-control" required>
    </div>
    <div class="mb-2">
      <label for="alamat">Alamat</label>
      <input type="tel" id="alamat" name="alamat" class="form-control" required>
    </div>
    
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="customer.php" class="btn btn-secondary">Kembali</a>
  </form>
</div>


</body>
</html>     