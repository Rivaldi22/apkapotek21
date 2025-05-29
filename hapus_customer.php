<?php
include 'koneksi.php';
$id_customer = $_GET['id_customer'];
mysqli_query($conn, "DELETE FROM customer WHERE id_customer='$id_customer'");
header("Location: customer.php");
?>
