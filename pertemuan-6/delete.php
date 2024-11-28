<?php
require './config/db.php';

// Mendapatkan ID produk dari parameter URL
$id = $_GET['id'];

// Ambil data produk berdasarkan ID untuk mendapatkan path gambar
$product = mysqli_query($db_connect, "SELECT * FROM products WHERE id = $id");
$row = mysqli_fetch_assoc($product);

// Path gambar yang akan dihapus
$imagePath = $_SERVER['DOCUMENT_ROOT'] . '/' . $row['image']; // Path lengkap ke file gambar

// Hapus file gambar dari folder upload
if (file_exists($imagePath)) {
    unlink($imagePath); // Hapus file gambar
}

// Hapus data produk dari database
mysqli_query($db_connect, "DELETE FROM products WHERE id = $id");

// Redirect ke halaman data produk
header("Location: show.php");
exit();
?>
