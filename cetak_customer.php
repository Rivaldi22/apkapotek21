<?php
include 'koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM customer");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Cetak Data Customer</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    @media print {
      .no-print {
        display: none;
      }
    }
  </style>
</head>
<body onload="window.print()">

  <div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3 no-print">
      <h3>Daftar Customer</h3>
      <a href="customer.php" class="btn btn-secondary">Kembali</a>
    </div>

    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>ID Customer</th>
          <th>Nama Customer</th>
          <th>Perusahaan</th>
          <th>Alamat</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; while ($d = mysqli_fetch_assoc($data)) : ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= $d['id_customer'] ?></td>
            <td><?= $d['nama_customer'] ?></td>
            <td><?= $d['perusahaan_cust'] ?></td>
            <td><?= $d['alamat'] ?></td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>

</body>
</html>
