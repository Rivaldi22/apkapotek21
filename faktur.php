<?php
include 'koneksi.php';
$data = mysqli_query($conn, "
  SELECT f.no_faktur, f.tgl_faktur, f.grand_total, f.ppn, c.nama_customer, p.nama_perusahaan
  FROM faktur f
  JOIN customer c ON f.id_customer = c.id_customer
  JOIN perusahaan p ON f.id_perusahaan = p.id_perusahaan
");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Kelola Penjualan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <header class="bg-primary text-white text-center py-3">
    <h2>APOTEK21</h2>
  </header>
  <nav class="bg-secondary text-white text-center py-2">
    <a href="index.php" class="text-white mx-3 text-decoration-none"><strong>Beranda</strong></a>
  </nav>

  <div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h3>Data Faktur</h3>
      <a href="tambah_faktur.php" class="btn btn-success">+ Tambah Faktur</a>
    </div>

    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>No Faktur</th>
          <th>Tanggal</th>
          <th>Customer</th>
          <th>Perusahaan</th>
          <th>PPN</th>
          <th>Total Tanpa PPN</th>
          <th>Grand Total</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; while ($d = mysqli_fetch_assoc($data)) : ?>
        <?php
          $total_tanpa_ppn = $d['grand_total'] - $d['ppn'];
        ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $d['no_faktur'] ?></td>
          <td><?= $d['tgl_faktur'] ?></td>
          <td><?= $d['nama_customer'] ?></td>
          <td><?= $d['nama_perusahaan'] ?></td>
          <td>Rp <?= number_format($d['ppn']) ?></td>
          <td>Rp <?= number_format($total_tanpa_ppn) ?></td>
          <td>Rp <?= number_format($d['grand_total']) ?></td>
          <td>
            <a href="cetak_faktur.php?no_faktur=<?= $d['no_faktur'] ?>" target="_blank" class="btn btn-sm btn-primary">Cetak Faktur</a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>

  <footer class="bg-dark text-white text-center py-3 mt-4">
    <strong>FOOTER</strong>
    <p>Rivaldi Hidayatullah.ujikom.2025</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
