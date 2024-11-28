<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Produk</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-5">
        <h1 class="text-center mb-4">Data Produk</h1>
        <div class="mb-3">
            <a href="create.php" class="btn btn-primary">Tambah Produk</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Gambar Produk</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require './config/db.php';

                        $products = mysqli_query($db_connect, "SELECT * FROM products");
                        $no = 1;

                        while ($row = mysqli_fetch_assoc($products)) {
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['name']; ?></td>
                        <td>Rp <?= number_format($row['price'], 0, ',', '.'); ?></td>
                        <!-- <td><img src="<?= $row['image']; ?>" width="100"></td> -->
                        <td><a href="<?= $row['image']; ?>" target="_blank" class="btn btn-link">Unduh</a></td>
                        <td>
                            <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
