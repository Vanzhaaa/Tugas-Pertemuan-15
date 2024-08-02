<?php
require 'connect_and_create_table.php';
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    if (isset($_POST['submit'])) {
        $minPrice = $_POST['min_price'];
        $sql = "SELECT name, price FROM products WHERE price > :min_price";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['min_price' => $minPrice]);
        $products = $stmt->fetchAll();
        echo "<h1>Daftar Produk dengan Harga di Atas $minPrice</h1>";
        if ($products) {
            echo "<table border='1'>";
            echo "<tr><th>Name</th><th>Price</th></tr>";

            foreach ($products as $product) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($product['name']) . "</td>";
                echo "<td>" . htmlspecialchars($product['price']) . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Tidak ada produk yang memenuhi kriteria.";
        }
    }
} catch (\PDOException $e) {
    echo "Terjadi kesalahan: " . $e->getMessage();
}
?>
<h2>Filter Produk Berdasarkan Harga</h2>
<form method="post">
    <label>Harga Minimum: <input type="number" step="0.01" name="min_price" required></label><br>
    <input type="submit" name="submit" value="Tampilkan Produk">
</form>
