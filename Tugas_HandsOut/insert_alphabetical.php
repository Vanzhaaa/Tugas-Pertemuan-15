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

// SQL untuk menghapus tabel jika sudah ada (opsional)
$sql = "DROP TABLE IF EXISTS participants";
if ($conn->query($sql) !== TRUE) {
    die("Error dropping table: " . $conn->error);
}

// SQL untuk membuat tabel
$sql = "CREATE TABLE participants (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50),
    tgl_registrasi TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if ($conn->query($sql) !== TRUE) {
    die("Error creating table: " . $conn->error);
}

// Menyisipkan data dari A-Z
for ($i = ord('A'); $i <= ord('Z'); $i++) {
    $name = chr($i);
    $email = strtolower($name) . "@example.com";
    $sql = "INSERT INTO participants (name, email) VALUES ('$name', '$email')";
    if ($conn->query($sql) !== TRUE) {
        echo "Error inserting record for $name: " . $conn->error . "<br>";
    }
}

echo "Data berhasil dibuat dan diurutkan dari A-Z";

$conn->close();
?>
