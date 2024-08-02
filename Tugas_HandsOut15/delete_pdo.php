<?php
require 'db_connect.php';

$id = 1;

$sql = "DELETE FROM users WHERE id = :id";
$stmt = $pdo->prepare($sql);

try {
    $stmt->execute(['id' => $id]);
    
    if ($stmt->rowCount() > 0) {
        echo "User dengan ID $id berhasil dihapus!";
    } else {
        echo "Tidak ada user dengan ID $id ditemukan.";
    }
} catch (PDOException $e) {
    echo "Gagal menghapus user: " . $e->getMessage();
}
?>
