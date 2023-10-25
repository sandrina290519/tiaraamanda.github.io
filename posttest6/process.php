<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Komentar</title>
    <link rel="stylesheet" href="style.css"> <!-- Menghubungkan dengan file style.css -->
</head>

<body>
    <div class="proses"> <!-- Menggunakan class "proses" di sini -->
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Memeriksa apakah variabel-variabel telah diatur sebelum mencoba mencetaknya
            if (isset($_POST["nama"]) && isset($_POST["notelepon"]) && isset($_POST["email"]) && isset($_POST["komentar"])) {
                $nama = $_POST["nama"];
                $notelepon = $_POST["notelepon"];
                $email = $_POST["email"];
                $komentar = $_POST["komentar"];

                echo "<h2>Data komentar yang Diinput:</h2>";
                echo "<ul>";
                echo "<li>Nama: " . $nama . "</li>";
                echo "<li>Nomor Telepon: " . $notelepon . "</li>";
                echo "<li>Email: " . $email . "</li>";
                echo "<li>Komentar: " . $komentar . "</li>";
                echo "</ul>";
            } else {
                echo "<p>Ada kesalahan dalam pengiriman data formulir.</p>";
            }
        } else {
            echo "<p>Permintaan tidak valid.</p>";
        }
        ?>
        <a class="back-button" href="javascript:history.back()">Kembali</a>
    </div>
</body>

</html>
