<?php
include 'koneksi.php';
$id_perusahaan = $_GET['id_perusahaan'];
mysqli_query($conn, "DELETE FROM perusahaan WHERE id_perusahaan='$id_perusahaan'");
header("Location: perusahaan.php");
?>
