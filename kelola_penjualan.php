<?php
include 'koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM produk");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Kelola Data Penjualan</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

  <style>
    body {
      background-image: url('gambar/image1.jpeg');
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-position: center;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    main {
      background-color: rgba(255, 255, 255, 0.95);
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      padding: 2rem;
      margin-top: 1rem;
    }

    footer {
      margin-top: auto;
    }
  </style>
</head>
<body>

  <!-- HEADER -->
  <header class="bg-primary text-white text-center py-3">
    <h2>APOTEK12</h2>
  </header>

  <!-- NAVIGATION -->
  <nav class="bg-secondary text-white text-center py-2">
    <a href="index.php" class="text-white mx-3 text-decoration-none fw-bold">Beranda</a>
  </nav>

  <!-- MAIN CONTENT -->
  <div class="container my-4">
    <main>
      <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
        <h4 class="mb-0">Data Produk</h4>
        <div class="d-flex flex-wrap gap-2">
          <a href="tambah_produk.php" class="btn btn-success btn-sm">Tambah Data</a>
          <a href="cetak_produk.php" class="btn btn-primary btn-sm" target="_blank">Cetak Daftar Produk</a>
          
        </div>
      </div>

      <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
          <thead class="table-dark text-center">
            <tr>
              <th>No</th>
              <th>ID Produk</th>
              <th>Nama Produk</th>
              <th>Harga</th>
              <th>Jenis</th>
              <th>Stok</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; while ($d = mysqli_fetch_assoc($data)) : ?>
              <tr>
                <td class="text-center"><?= $no++ ?></td>
                <td><?= $d['id_produk'] ?></td>
                <td><?= $d['nama_produk'] ?></td>
                <td>Rp <?= number_format($d['price'], 0, ',', '.') ?></td>
                <td><?= $d['jenis'] ?></td>
                <td class="text-center"><?= $d['stock'] ?></td>
                <td class="text-center">
                  <a href="edit_produk.php?id_produk=<?= $d['id_produk'] ?>" class="btn btn-sm btn-warning">Edit</a>
                  <a href="hapus_produk.php?id_produk=<?= $d['id_produk'] ?>" onclick="return confirm('Yakin ingin menghapus data ini?')" class="btn btn-sm btn-danger">Hapus</a>
                </td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>

  <!-- FOOTER -->
  <footer class="bg-dark text-white text-center py-3">
    <strong>FOOTER</strong>
    <p class="mb-0">Rivaldi Hidayatullah.ujikom.2025</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
