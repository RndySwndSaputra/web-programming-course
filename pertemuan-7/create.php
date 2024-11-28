<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-5">
        <div class="card p-4 shadow">
            <h1 class="text-center mb-4">Tambah Produk</h1>
            <div class="mb-3">
                <a href="show.php" class="btn btn-secondary">Lihat Data Produk</a>
            </div>
            <form action="./backend/create.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Input nama produk" required>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Harga Produk</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="Input harga produk" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Gambar Produk</label>
                    <input type="file" class="form-control" id="image" name="image" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
