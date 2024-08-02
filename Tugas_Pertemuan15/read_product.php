<?php
require 'connect_and_create_table.php';
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    $sql = "SELECT name, price FROM products";
    $stmt = $pdo->query($sql);
    $products = $stmt->fetchAll();
    echo "<h1>Daftar Produk</h1>";
    echo "<table border='1'>";
    echo "<tr><th>Name</th><th>Price</th></tr>";
    foreach ($products as $product) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($product['name']) . "</td>";
        echo "<td>" . htmlspecialchars($product['price']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} catch (\PDOException $e) {
    echo "Terjadi kesalahan: " . $e->getMessage();
}
?>
