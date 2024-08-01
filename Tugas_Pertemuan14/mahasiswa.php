<?php
require_once 'db.php';

class Mahasiswa {
    private $conn;
    private $table = 'mahasiswa';

    public $nim;
    public $nama;
    public $tempat_lahir;
    public $tanggal_lahir;
    public $jurusan;
    public $program_studi;
    public $ipk;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table . " SET nim=?, nama=?, tempat_lahir=?, tanggal_lahir=?, jurusan=?, program_studi=?, ipk=?";
        $stmt = $this->conn->prepare($query);

        $stmt->bind_param('ssssssd', $this->nim, $this->nama, $this->tempat_lahir, $this->tanggal_lahir, $this->jurusan, $this->program_studi, $this->ipk);

        if ($stmt->execute()) {
            return "Record was created.";
        } else {
            return "Unable to create record.";
        }
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table;
        $result = $this->conn->query($query);
        return $result;
    }

    public function readOne() {
        $query = "SELECT * FROM " . $this->table . " WHERE nim = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $this->nim);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        $this->nama = $row['nama'];
        $this->tempat_lahir = $row['tempat_lahir'];
        $this->tanggal_lahir = $row['tanggal_lahir'];
        $this->jurusan = $row['jurusan'];
        $this->program_studi = $row['program_studi'];
        $this->ipk = $row['ipk'];
    }

    public function update() {
        $query = "UPDATE " . $this->table . " SET nama=?, tempat_lahir=?, tanggal_lahir=?, jurusan=?, program_studi=?, ipk=? WHERE nim=?";
        $stmt = $this->conn->prepare($query);

        $stmt->bind_param('ssssssd', $this->nama, $this->tempat_lahir, $this->tanggal_lahir, $this->jurusan, $this->program_studi, $this->ipk, $this->nim);

        if ($stmt->execute()) {
            return "Record was updated.";
        } else {
            return "Unable to update record.";
        }
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table . " WHERE nim=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $this->nim);

        if ($stmt->execute()) {
            return "Record was deleted.";
        } else {
            return "Unable to delete record.";
        }
    }
}
?>
