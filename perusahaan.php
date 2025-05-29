<?php
include 'koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM perusahaan");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Data Perusahaan</title>
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
      overflow-x: auto;
    }
    footer {
      margin-top: auto;
    }
    /* Nav link hover */
    .nav-link:hover, .nav-link:focus {
      color: #0d6efd;
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <!-- HEADER -->
  <header class="bg-primary text-white text-center py-3">
    <h2 class="m-0">APOTEK12</h2>
  </header>

  <!-- NAVBAR dengan tombol sidebar untuk mobile -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <div class="container">
      <button class="btn btn-outline-light d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar">
        ☰ Menu
      </button>
      <a class="navbar-brand d-none d-lg-block fw-bold" href="index.php">Beranda</a>
    </div>
  </nav>

  <!-- Sidebar offcanvas untuk mobile, sidebar tetap di desktop -->
  <div class="offcanvas offcanvas-start bg-white" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="sidebarLabel">Menu</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-0">
      <nav class="nav flex-column px-3">
        <a class="nav-link py-2 border-bottom" href="perusahaan.php">Kelola Data Perusahaan</a>
        <a class="nav-link py-2 border-bottom" href="customer.php">Kelola Data Customer</a>
        <a class="nav-link py-2" href="kelola_penjualan.php">Kelola Data Penjualan</a>
      </nav>
    </div>
  </div>

  <!-- Layout container -->
  <div class="container-lg d-flex mt-3" style="min-height: calc(100vh - 170px);">
    
    <!-- Sidebar permanen di desktop -->
    <aside class="d-none d-lg-block bg-white p-3 rounded shadow-sm" style="width: 250px; height: fit-content;">
      <h5>Menu</h5>
      <nav class="nav flex-column">
        <a class="nav-link py-2 border-bottom" href="perusahaan.php">Kelola Data Perusahaan</a>
        <a class="nav-link py-2 border-bottom" href="customer.php">Kelola Data Customer</a>
        <a class="nav-link py-2" href="kelola_penjualan.php">Kelola Data Penjualan</a>
      </nav>
    </aside>

    <!-- Content -->
    <main class="flex-grow-1 ms-lg-4">
      <h3>Data Perusahaan</h3>
      <a href="tambah_perusahaan.php" class="btn btn-success mb-3">Tambah Data</a>
      <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
          <thead class="table-primary">
            <tr>
              <th>No</th>
              <th>ID Perusahaan</th>
              <th>Nama Perusahaan</th>
              <th>Alamat</th>
              <th>No. Telp</th>
              <th>Fax</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; while ($d = mysqli_fetch_assoc($data)) : ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= htmlspecialchars($d['id_perusahaan']) ?></td>
              <td><?= htmlspecialchars($d['nama_perusahaan']) ?></td>
              <td><?= htmlspecialchars($d['alamat']) ?></td>
              <td><?= htmlspecialchars($d['no_telp']) ?></td>
              <td><?= htmlspecialchars($d['fax']) ?></td>
              <td>
                <a href="edit_perusahaan.php?id_perusahaan=<?= urlencode($d['id_perusahaan']) ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="hapus_perusahaan.php?id_perusahaan=<?= urlencode($d['id_perusahaan']) ?>" onclick="return confirm('Yakin ingin menghapus data ini?')" class="btn btn-sm btn-danger">Hapus</a>
              </td>
            </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>

  <!-- FOOTER -->
  <footer class="bg-dark text-white text-center py-3 mt-4">
    <p class="mb-0">Rivaldi Hidayatullah.ujikom.2025</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
