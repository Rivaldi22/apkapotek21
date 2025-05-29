<?php
include 'koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM produk");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Cetak Produk</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    th, td {
      border: 1px solid #000;
      padding: 8px;
      text-align: center;
    }

    .buttons {
      text-align: center;
      margin-top: 20px;
    }

    @media print {
      .buttons {
        display: none;
      }
    }

    button, a.btn {
      padding: 8px 16px;
      font-size: 14px;
      margin: 5px;
      text-decoration: none;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    button.print-btn {
      background-color: #0d6efd;
      color: white;
    }

    a.back-btn {
      background-color: #6c757d;
      color: white;
      display: inline-block;
    }

    a.back-btn:hover {
      background-color: #5a6268;
    }
  </style>
</head>
<body>

  <h2>Daftar Produk</h2>

  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>ID Produk</th>
        <th>Nama Produk</th>
        <th>Harga</th>
        <th>Jenis</th>
        <th>Stok</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; while ($d = mysqli_fetch_assoc($data)) : ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $d['id_produk'] ?></td>
          <td><?= $d['nama_produk'] ?></td>
          <td>Rp <?= number_format($d['price'], 0, ',', '.') ?></td>
          <td><?= $d['jenis'] ?></td>
          <td><?= $d['stock'] ?></td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>

  <div class="buttons">
    <button class="print-btn" onclick="window.print()">Cetak Sekarang</button>
    <a href="kelola_penjualan.php" class="btn back-btn">Kembali</a>
  </div>

</body>
</html>
