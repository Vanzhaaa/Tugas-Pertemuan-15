<?php
require 'connect_and_create_table.php';
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    $sql = "INSERT INTO products (name, price) VALUES (:name, :price)";
    $stmt = $pdo->prepare($sql);
    $name = "Laptop";
    $price = 15000.00;
    $stmt->execute(['name' => $name, 'price' => $price]);
    echo "Data berhasil ditambahkan!";
} catch (\PDOException $e) {
    echo "Terjadi kesalahan: " . $e->getMessage();
}
?>
