<?php
include 'koneksi.php';
$id_produk = $_GET['id_produk'];
mysqli_query($conn, "DELETE FROM produk WHERE id_produk='$id_produk'");
header("Location: kelola_penjualan.php");
?>
