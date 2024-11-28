<?php
require './config/db.php';

// Mendapatkan ID produk dari parameter URL
$id = $_GET['id'];

// Ambil data produk berdasarkan ID
$product = mysqli_query($db_connect, "SELECT * FROM products WHERE id = $id");
$row = mysqli_fetch_assoc($product);

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name']; // Nama gambar yang diupload
    $tempImage = $_FILES['image']['tmp_name']; // File gambar sementara

    // Jika ada gambar baru yang di-upload
    if ($image) {
        // Hapus gambar lama jika ada
        $oldImagePath = $_SERVER['DOCUMENT_ROOT'] . '/' . $row['image']; // Path gambar lama
        if (file_exists($oldImagePath)) {
            unlink($oldImagePath); // Hapus file gambar lama
        }

        // Tentukan folder upload
        $uploadDir = __DIR__ . '/upload/';
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true); // Buat folder jika belum ada
        }

        // Buat nama file unik untuk gambar baru
        $randomFilename = time() . '-' . uniqid() . '-' . $image;
        $uploadPath = $uploadDir . $randomFilename;

        // Pindahkan gambar ke folder upload
        move_uploaded_file($tempImage, $uploadPath);

        // Simpan path relatif gambar baru ke database
        $imagePath = 'upload/' . $randomFilename;
    } else {
        // Jika tidak ada gambar baru, gunakan gambar lama
        $imagePath = $row['image'];
    }

    // Update data produk di database
    $query = "UPDATE products SET name='$name', price='$price', image='$imagePath' WHERE id=$id";
    mysqli_query($db_connect, $query);

    // Redirect ke halaman data produk setelah update
    header("Location: show.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
</head>
<body>
    <h1>Edit Produk</h1>
    <form method="post" enctype="multipart/form-data">
        <label>Nama Produk:</label>
        <input type="text" name="name" value="<?= $row['name']; ?>" required><br><br>

        <label>Harga:</label>
        <input type="text" name="price" value="<?= $row['price']; ?>" required><br><br>

        <label>Gambar Produk:</label>
        <input type="file" name="image"><br><br>

        <button type="submit" name="update">Update</button>
    </form>
    <a href="show.php">Kembali ke Data Produk</a>
</body>
</html>
