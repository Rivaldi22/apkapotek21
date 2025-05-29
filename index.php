<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard</title>
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
      background-color: rgba(255, 255, 255, 0.9);
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
  <div class="container-lg d-flex mt-3" style="min-height: calc(100vh - 150px);">
    
    <!-- Sidebar permanen di desktop -->
    <aside class="d-none d-lg-block bg-white p-3 rounded shadow-sm" style="width: 250px; height: fit-content;">
      <h5>Menu</h5>
      <nav class="nav flex-column">
        <a class="nav-link py-2 border-bottom" href="perusahaan.php">Kelola Data Perusahaan</a>
        <a class="nav-link py-2 border-bottom" href="customer.php">Kelola Data Customer</a>
        <a class="nav-link py-2" href="kelola_penjualan.php">Kelola Data Penjualan</a>
        <a class="nav-link py-2" href="faktur.php">Faktur</a>
      </nav>
    </aside>

    <!-- Content -->
    <main class="flex-grow-1 ms-lg-4">
      <h4>Selamat Datang di Halaman Beranda</h4>
      <p>Silakan pilih menu di sebelah kiri untuk mengelola data.</p>
    </main>
  </div>

  <!-- FOOTER -->
  <footer class="bg-dark text-white text-center py-3 mt-4">
    <strong>FOOTER</strong>
    <p class="mb-0">Rivaldi Hidayatullah.ujikom.2025</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
