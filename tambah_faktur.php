<?php
include 'koneksi.php';

// Ambil data customer dan perusahaan untuk dropdown
$customer = mysqli_query($conn, "SELECT * FROM customer");
$perusahaan = mysqli_query($conn, "SELECT * FROM perusahaan");

if (isset($_POST['simpan'])) {
  $no_faktur     = $_POST['no_faktur'];
  $tgl_faktur    = $_POST['tgl_faktur'];
  $due_date      = $_POST['due_date'];
  $metode_bayar  = $_POST['metode_bayar'];
  $ppn           = $_POST['ppn'];
  $dp            = $_POST['dp'];
  $grand_total   = $_POST['grand_total'];
  $id_customer   = $_POST['id_customer'];
  $id_perusahaan = $_POST['id_perusahaan'];
  $user          = "admin"; // atau sesuaikan dengan session login jika ada

  $simpan = mysqli_query($conn, "INSERT INTO faktur 
    (no_faktur, tgl_faktur, due_date, metode_bayar, ppn, dp, grand_total, id_customer, id_perusahaan, user)
    VALUES (
      '$no_faktur', '$tgl_faktur', '$due_date', '$metode_bayar', 
      '$ppn', '$dp', '$grand_total', '$id_customer', '$id_perusahaan', '$user'
    )");

  if ($simpan) {
    echo "<script>alert('Data berhasil disimpan!');window.location='faktur.php';</script>";
  } else {
    echo "<script>alert('Gagal menyimpan data');</script>";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Tambah Faktur</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
  <h3>Tambah Data Faktur</h3>
  <form method="post">
    <div class="mb-3">
      <label>No Faktur</label>
      <input type="text" name="no_faktur" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Tanggal Faktur</label>
      <input type="date" name="tgl_faktur" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Jatuh Tempo</label>
      <input type="date" name="due_date" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Metode Bayar</label>
      <select name="metode_bayar" class="form-control" required>
        <option value="">-- Pilih --</option>
        <option value="Cash">Cash</option>
        <option value="Transfer">Transfer</option>
        <option value="Kredit">Kredit</option>
      </select>
    </div>
    <div class="mb-3">
      <label>PPN</label>
      <input type="number" name="ppn" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>DP</label>
      <input type="number" name="dp" class="form-control">
    </div>
    <div class="mb-3">
      <label>Grand Total</label>
      <input type="number" name="grand_total" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Customer</label>
      <select name="id_customer" class="form-control" required>
        <option value="">-- Pilih Customer --</option>
        <?php while ($c = mysqli_fetch_assoc($customer)) : ?>
          <option value="<?= $c['id_customer'] ?>"><?= $c['nama_customer'] ?></option>
        <?php endwhile; ?>
      </select>
    </div>
    <div class="mb-3">
      <label>Perusahaan</label>
      <select name="id_perusahaan" class="form-control" required>
        <option value="">-- Pilih Perusahaan --</option>
        <?php while ($p = mysqli_fetch_assoc($perusahaan)) : ?>
          <option value="<?= $p['id_perusahaan'] ?>"><?= $p['nama_perusahaan'] ?></option>
        <?php endwhile; ?>
      </select>
    </div>
    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
    <a href="faktur.php" class="btn btn-secondary">Kembali</a>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
