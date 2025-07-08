<?php
include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $stock = $_POST["stock"];
    $price = $_POST["price"];

    $insert = mysqli_query($conn, "INSERT INTO products (name, stock, price) VALUES ('$name', '$stock', '$price')");

    if ($insert) {
        header("Location: products.php?message=sukses");
    } else {
        echo "<script>alert('Gagal menambah produk.');</script>";
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="assets/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/dist/css/bootstrap-icons.min.css"> <!-- jika ingin pakai ikon -->
    <style>
        body {
            display: flex;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #212529;
            color: white;
            padding: 20px;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            margin-bottom: 15px;
        }
        .sidebar a:hover {
            text-decoration: underline;
        }
        .main-content {
            flex-grow: 1;
            padding: 40px;
            background-color: #f8f9fa;
        }
        .active {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h5>Maju Jaya Dashboard</h5>
        <p>pengguna : Budi</p>
        <hr>
        <a href="dashboard.php">📦 Pesanan</a>
        <a href="products.php" class="active">🛒 Produk</a>
        <a href="logout.php">🚪 Keluar</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <h3 class="mb-4">Tambah Produk Baru</h3>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="name" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stok</label>
                <input type="number" class="form-control" id="stock" name="stock" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Harga</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="products.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
