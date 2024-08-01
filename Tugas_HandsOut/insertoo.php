<?php
$servername = "localhost"; // Variabel $servername yang benar
$username = "root";
$password = "";
$dbname = "dboo";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
echo "Koneksi berhasil<br>";

// Buat tabel
$sql = "INSERT INTO participants (nama, email) VALUES ('Faisal',
'faisal@gmail.com'), ('Tata', 'tata@gmail.com')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
