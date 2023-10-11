<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $notelepon = $_POST["notelepon"];
    $email = $_POST["email"];
    $komentar = $_POST["komentar"];

    // Di sini Anda dapat melakukan apa yang Anda inginkan dengan data yang dikirim dari formulir
    // Misalnya, menyimpannya dalam database atau menampilkan pesan

    echo "<h2>Data komentar yang Diinput:</h2>";
    echo "Nama: " . $nama . "<br>";
    echo "notelepon: " . $notelepon . "<br>";
    echo "email: " . $email . "<br>";
    echo "komentar: " . $komentar . "<br>";

}
?>