<?php
include "connection.php";

$products = mysqli_query($conn, "SELECT * FROM products");
$productsArr = [];

while ($row = mysqli_fetch_assoc($products)) {
    $productsArr[] = $row;
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Kelola Produk</title>
    <link rel="stylesheet" href="assets/dist/css/bootstrap.min.css">
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
    <h3 class="mb-4">Daftar Produk</h3>
    <a href="tambahProduk.php" class="btn btn-success mb-3">Tambah Produk</a>

    <table class="table table-bordered table-striped">
        <thead class="table-light">
            <tr>
                <th>ID Produk</th>
                <th>Nama</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productsArr as $prod): ?>
            <tr>
                <td><?= $prod["id"] ?></td>
                <td><?= $prod["name"] ?></td>
                <td><?= $prod["stock"] ?></td>
                <td><?= number_format($prod["price"], 0, ',', '.') ?></td>
                <td>
                    <a href="editProduk.php?id=<?= $prod["id"] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="hapusProduk.php?id=<?= $prod["id"] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus produk ini?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

</body>
</html>
