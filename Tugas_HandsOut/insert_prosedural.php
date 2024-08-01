<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbpro";

// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Mengecek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// SQL untuk menyisipkan data
$sql = "INSERT INTO participants (name, email) VALUES ('Vanzha', 'daniarfeby7@gmail.com'), ('Alvina Damayanti', 'damayanti@gmail.com')";

// Menjalankan query dan menangani hasil
if (mysqli_query($conn, $sql)) {
    echo "Record baru berhasil dibuat";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Menutup koneksi
mysqli_close($conn);
?>
