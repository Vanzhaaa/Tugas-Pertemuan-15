<?php
require 'connect_and_create_table.php';
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    $productId = 3;
    $sql = "DELETE FROM products WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $productId]);
    if ($stmt->rowCount() > 0) {
        echo "Produk dengan ID $productId berhasil dihapus!";
    } else {
        echo "Gagal menghapus produk. Mungkin produk dengan ID $productId tidak ditemukan.";
    }
} catch (\PDOException $e) {
    echo "Terjadi kesalahan: " . $e->getMessage();
}
?>
