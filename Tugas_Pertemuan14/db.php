<?php
$host = 'localhost';
$db_name = 'mahasiswa';
$username = 'root';
$password = '';

$conn = new mysqli($host, $username, $password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Successfully connected to the database.";
}

$conn->close();
?>

