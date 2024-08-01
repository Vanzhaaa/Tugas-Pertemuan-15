<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbpro";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// SQL untuk menyisipkan data
$sql = "INSERT INTO participants (name, email) VALUES ('Vanzha', 'daniarfeby7@gmail.com'), ('Alvina Damayanti', 'damayanti@gmail.com')";

// Menjalankan query dan menangani hasil
if ($conn->query($sql) === TRUE) {
    echo "Record baru berhasil dibuat";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Menutup koneksi
$conn->close();
?>
