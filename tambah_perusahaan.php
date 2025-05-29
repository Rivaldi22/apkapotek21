<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id_perusahaan =$_POST['id_perusahaan'];
  $nama_perusahaan     = $_POST['nama_perusahaan'];
  $alamat    = $_POST['alamat'];
  $no_telp = $_POST['no_telp'];
  $fax    = $_POST['fax'];

  mysqli_query($conn,"INSERT INTO `perusahaan`(`id_perusahaan`, `nama_perusahaan`, `alamat`, `no_telp`, `fax`) 
                    VALUES ('$id_perusahaan','$nama_perusahaan','$alamat','$no_telp','$fax')");
header("location:perusahaan.php");
}
?>          
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Perusahaan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
  
<div class="container mt-4">
  <h3>Tambah Data Perusahaan</h3>
  <form method="POST">
    <div class="mb-2">
      <label for="id_perusahaan">ID Perusahaan</label>
      <input type="text" id="id_perusahaan" name="id_perusahaan" class="form-control" required>
    </div>
    <div class="mb-2">
      <label for="nama_perusahaan">Nama Perusahaan</label>
      <input type="text" id="nama_perusahaan" name="nama_perusahaan" class="form-control" required>
    </div>
    <div class="mb-2">
      <label for="alamat">Alamat</label>
      <input type="text" id="alamat" name="alamat" class="form-control" required>
    </div>
    <div class="mb-2">
      <label for="no_telp">No. Telepon</label>
      <input type="tel" id="no_telp" name="no_telp" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="fax">Fax</label>
      <input type="text" id="fax" name="fax" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="perusahaan.php" class="btn btn-secondary">Kembali</a>
  </form>
</div>


</body>
</html>     