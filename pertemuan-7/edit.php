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
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-5">
        <div class="card p-4 shadow" style="max-width: 500px; margin: auto;">
            <h1 class="text-center mb-4">Edit Produk</h1>
            <form method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= $row['name']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Harga</label>
                    <input type="text" class="form-control" id="price" name="price" value="<?= $row['price']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Gambar Produk</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-success" name="update">Update</button>
                </div>
            </form>
            <div class="mt-3">
                <a href="show.php" class="btn btn-secondary btn-sm">Kembali ke Data Produk</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

