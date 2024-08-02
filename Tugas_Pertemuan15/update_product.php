<?php
require 'connect_and_create_table.php';
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    $productId = 1;
    $newPrice = 17500.00;
    $sql = "UPDATE products SET price = :price WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['price' => $newPrice, 'id' => $productId]);
    if ($stmt->rowCount() > 0) {
        echo "Harga produk dengan ID $productId berhasil diperbarui!";
    } else {
        echo "Gagal memperbarui harga produk. Mungkin produk dengan ID $productId tidak ditemukan.";
    }
} catch (\PDOException $e) {
    echo "Terjadi kesalahan: " . $e->getMessage();
}
?>
