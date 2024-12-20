<?php 
session_start();
if($_SESSION['role'] !== 'user') {
    session_destroy();
    header('Location:index.php');
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-5">
        <h1 class="text-center mb-4">Dashboard User</h1>
        <p class="text-center">Selamat datang, <strong><?= htmlspecialchars($_SESSION['name'], ENT_QUOTES, 'UTF-8'); ?></strong></p>

        <div class="d-flex justify-content-center gap-3">
            <!-- Tombol Lihat Produk -->
            <a href="produk.php" class="btn btn-primary">Lihat Produk</a>

            <!-- Tombol Logout -->
            <a href="./backend/logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
