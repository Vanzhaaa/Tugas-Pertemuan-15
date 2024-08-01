<?php
require_once 'Mahasiswa.php';
require_once 'db.php';

$database = new Database();
$db = $database->conn;
$mahasiswa = new Mahasiswa($db);

$action = isset($_GET['action']) ? $_GET['action'] : '';
$message = '';

if ($action == 'create') {
    if ($_POST) {
        $mahasiswa->nim = $_POST['nim'];
        $mahasiswa->nama = $_POST['nama'];
        $mahasiswa->tempat_lahir = $_POST['tempat_lahir'];
        $mahasiswa->tanggal_lahir = $_POST['tanggal_lahir'];
        $mahasiswa->jurusan = $_POST['jurusan'];
        $mahasiswa->program_studi = $_POST['program_studi'];
        $mahasiswa->ipk = $_POST['ipk'];

        $message = $mahasiswa->create();
    }
} elseif ($action == 'read') {
    $result = $mahasiswa->read();
    while ($row = $result->fetch_assoc()) {
        echo $row['nim'] . " - " . $row['nama'] . "<br>";
    }
} elseif ($action == 'update') {
    if ($_POST) {
        $mahasiswa->nim = $_POST['nim'];
        $mahasiswa->nama = $_POST['nama'];
        $mahasiswa->tempat_lahir = $_POST['tempat_lahir'];
        $mahasiswa->tanggal_lahir = $_POST['tanggal_lahir'];
        $mahasiswa->jurusan = $_POST['jurusan'];
        $mahasiswa->program_studi = $_POST['program_studi'];
        $mahasiswa->ipk = $_POST['ipk'];

        $message = $mahasiswa->update();
    }
} elseif ($action == 'delete') {
    if (isset($_GET['nim'])) {
        $mahasiswa->nim = $_GET['nim'];
        $message = $mahasiswa->delete();
    }
}

echo $message;
?>
