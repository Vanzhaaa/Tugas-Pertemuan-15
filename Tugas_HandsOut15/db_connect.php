<?php
$host = 'localhost';
$dbname = 'pdo';
$username = 'root';
$password = '';

try {
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Koneksi berhasil!";
} catch (PDOException $e) {
    // Menangani error koneksi
    echo "Koneksi gagal: " . $e->getMessage();
}
?>
