<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form CRUD Mahasiswa</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>CRUD Mahasiswa</h1>
    </header>

    <div class="container">
        <?php
        if (isset($_GET['message'])) {
            echo "<p>" . htmlspecialchars($_GET['message']) . "</p>";
        }
        ?>

        <h2>Create Data Mahasiswa</h2>
        <form action="mahasiswa_controller.php?action=create" method="POST">
            <label for="nim">NIM:</label>
            <input type="text" id="nim" name="nim" required>

            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="tempat_lahir">Tempat Lahir:</label>
            <input type="text" id="tempat_lahir" name="tempat_lahir" required>

            <label for="tanggal_lahir">Tanggal Lahir:</label>
            <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>

            <label for="jurusan">Jurusan:</label>
            <input type="text" id="jurusan" name="jurusan" required>

            <label for="program_studi">Program Studi:</label>
            <input type="text" id="program_studi" name="program_studi" required>

            <label for="ipk">IPK:</label>
            <input type="text" id="ipk" name="ipk" required>

            <input type="submit" value="Create">
        </form>

        <h2>Read Data Mahasiswa</h2>
        <form action="mahasiswa_controller.php?action=read" method="GET">
            <input type="submit" value="Read All">
        </form>

        <h2>Update Data Mahasiswa</h2>
        <form action="mahasiswa_controller.php?action=update" method="POST">
            <label for="nim_update">NIM:</label>
            <input type="text" id="nim_update" name="nim" required>

            <label for="nama_update">Nama:</label>
            <input type="text" id="nama_update" name="nama" required>

            <label for="tempat_lahir_update">Tempat Lahir:</label>
            <input type="text" id="tempat_lahir_update" name="tempat_lahir" required>

            <label for="tanggal_lahir_update">Tanggal Lahir:</label>
            <input type="date" id="tanggal_lahir_update" name="tanggal_lahir" required>

            <label for="jurusan_update">Jurusan:</label>
            <input type="text" id="jurusan_update" name="jurusan" required>

            <label for="program_studi_update">Program Studi:</label>
            <input type="text" id="program_studi_update" name="program_studi" required>

            <label for="ipk_update">IPK:</label>
            <input type="text" id="ipk_update" name="ipk" required>

            <input type="submit" value="Update">
        </form>

        <h2>Delete Data Mahasiswa</h2>
        <form action="mahasiswa_controller.php?action=delete" method="GET">
            <label for="nim_delete">NIM:</label>
            <input type="text" id="nim_delete" name="nim" required>

            <input type="submit" value="Delete">
        </form>
    </div>
</body>
</html>
