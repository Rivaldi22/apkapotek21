<?php
include 'koneksi.php';

if (!isset($_GET['no_faktur'])) {
    echo "No faktur tidak ditemukan.";
    exit;
}

$no_faktur = $_GET['no_faktur'];

$query = mysqli_query($conn, "
    SELECT f.no_faktur, f.tgl_faktur, f.grand_total, f.ppn, f.metode_bayar, f.dp, f.due_date,
           c.nama_customer, c.perusahaan_cust, c.alamat AS alamat_cust,
           p.nama_perusahaan, p.alamat AS alamat_perusahaan, p.no_telp, p.fax
    FROM faktur f
    JOIN customer c ON f.id_customer = c.id_customer
    JOIN perusahaan p ON f.id_perusahaan = p.id_perusahaan
    WHERE f.no_faktur = '$no_faktur'
");

$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "Data faktur tidak ditemukan.";
    exit;
}

$total_tanpa_ppn = $data['grand_total'] - $data['ppn'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cetak Faktur</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 700px; margin: 0 auto; padding: 20px; }
        h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        td, th { border: 1px solid #000; padding: 8px; }
        .no-border { border: none; }
        .text-right { text-align: right; }

        .no-print {
            margin-bottom: 20px;
        }

        .btn-kembali {
            padding: 8px 12px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body onload="window.print()">
    <div class="container">
        <!-- Tombol Kembali -->
        <div class="no-print">
            <a href="faktur.php" class="btn-kembali">&larr; Kembali</a>
        </div>

        <h2>Faktur Penjualan</h2>

        <table>
            <tr>
                <td><strong>No Faktur:</strong> <?= $data['no_faktur'] ?></td>
                <td><strong>Tanggal:</strong> <?= $data['tgl_faktur'] ?></td>
            </tr>
            <tr>
                <td><strong>Customer:</strong> <?= $data['nama_customer'] ?> (<?= $data['perusahaan_cust'] ?>)</td>
                <td><strong>Alamat:</strong> <?= $data['alamat_cust'] ?></td>
            </tr>
            <tr>
                <td><strong>Perusahaan:</strong> <?= $data['nama_perusahaan'] ?></td>
                <td><strong>Alamat:</strong> <?= $data['alamat_perusahaan'] ?></td>
            </tr>
        </table>

        <h4>Detail Pembayaran</h4>
        <table>
            <tr>
                <th>Metode Bayar</th>
                <th>DP</th>
                <th>Jatuh Tempo</th>
            </tr>
            <tr>
                <td><?= $data['metode_bayar'] ?></td>
                <td>Rp <?= number_format($data['dp']) ?></td>
                <td><?= $data['due_date'] ?></td>
            </tr>
        </table>

        <h4>Ringkasan Total</h4>
        <table>
            <tr>
                <th>Total Tanpa PPN</th>
                <th>PPN (10%)</th>
                <th>Grand Total</th>
            </tr>
            <tr>
                <td>Rp <?= number_format($total_tanpa_ppn) ?></td>
                <td>Rp <?= number_format($data['ppn']) ?></td>
                <td>Rp <?= number_format($data['grand_total']) ?></td>
            </tr>
        </table>

        <p style="margin-top:40px;">Tertanda,<br><br><strong>Bagian Keuangan</strong></p>
    </div>
</body>
</html>
