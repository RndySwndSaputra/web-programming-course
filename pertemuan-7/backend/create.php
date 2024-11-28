<?php

require './../config/db.php';

if (isset($_POST['submit'])) {
    global $db_connect;

    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $tempImage = $_FILES['image']['tmp_name'];

    // Tentukan folder upload di luar folder backend
    $uploadDir = dirname(__DIR__) . '/upload/';
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true); // Buat folder jika belum ada
    }

    // Buat nama file unik
    $randomFilename = time() . '-' . uniqid() . '-' . $image;
    $uploadPath = $uploadDir . $randomFilename;

    // Pindahkan file ke folder upload
    $upload = move_uploaded_file($tempImage, $uploadPath);

    if ($upload) {
        // Simpan path relatif ke database
        $imagePath = 'upload/' . $randomFilename;
        $query = "INSERT INTO products (name, price, image) VALUES ('$name', '$price', '$imagePath')";
        mysqli_query($db_connect, $query);

        echo "Produk berhasil ditambahkan.";
    } else {
        echo "Gagal mengunggah file.";
    }
}
?>
