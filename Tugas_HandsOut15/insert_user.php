<?php
require 'db_connect.php'; // Pastikan file ini berisi konfigurasi PDO Anda

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil data dari form dan melakukan sanitasi input
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    
    // Validasi input
    if (empty($username) || empty($email)) {
        echo "Semua field harus diisi!";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Alamat email tidak valid!";
        exit;
    }

    // Query SQL untuk memasukkan data
    $sql = "INSERT INTO users (username, email) VALUES (:username, :email)";
    $stmt = $pdo->prepare($sql);

    try {
        // Menjalankan query
        $stmt->execute([
            'username' => $username,
            'email' => $email
        ]);

        echo "Pengguna berhasil ditambahkan!";
    } catch (PDOException $e) {
        echo "Gagal menambahkan pengguna: " . $e->getMessage();
    }
} else {
    echo "Metode permintaan tidak valid.";
}
?>
