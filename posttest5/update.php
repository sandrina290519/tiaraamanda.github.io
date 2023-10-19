<?php
include "koneksi.php";

// Periksa apakah $_GET['id'] telah diatur dan merupakan angka
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Menggunakan prepared statement untuk mencegah SQL Injection
    $stmt = $conn->prepare("SELECT * FROM nasipadang WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result) {
        $nasipadang = $result->fetch_assoc();

        if ($nasipadang) {
            // Data ditemukan, tampilkan formulir untuk mengedit data
            if (isset($_POST['update'])) {
                // Ambil data dari formulir
                $nama = $_POST['nama'];
                $no_telp = $_POST['no_telp'];
                $alamat = $_POST['alamat'];
                $pesanan = $_POST['pesanan'];

                // Query untuk update data
                $update_stmt = $conn->prepare("UPDATE nasipadang SET nama=?, no_telp=?, alamat=?, pesanan=? WHERE id=?");
                $update_stmt->bind_param("ssssi", $nama, $no_telp, $alamat, $pesanan, $id);

                // Eksekusi query update
                if ($update_stmt->execute()) {
                    // Data berhasil diupdate, tampilkan pesan sukses atau redirect ke halaman lain
                    echo "
                    <script>
                        alert('Data berhasil Diubah!');
                        document.location.href = 'table.php';
                    </script>";
                } else {
                    // Query update gagal dijalankan, tampilkan pesan error atau redirect ke halaman lain
                    echo "
                    <script>
                        alert('Data Gagal Diubah!');
                        document.location.href = 'update.php?id={$id}';
                    </script>";
                }

                $update_stmt->close();
            }
        } else {
            // Data tidak ditemukan, tampilkan pesan error atau redirect ke halaman lain
            echo "Data tidak ditemukan!";
        }
    } else {
        // Query gagal dijalankan, tampilkan pesan error atau redirect ke halaman lain
        echo "Error: " . $conn->error;
    }

    $stmt->close();
} else {
    // Jika $_GET['id'] tidak diatur atau tidak valid, mungkin tampilkan pesan kesalahan atau redirect ke halaman lain
    //echo "ID tidak valid!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Formulir untuk memperbarui data -->
    <div class="add-form-container">
        <h1>Update Data</h1>
        <hr><br>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $nasipadang['id']; ?>">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="textfield" value="<?php echo $nasipadang['nama']; ?>">
            <label for="no_telp">No.Telp</label>
            <input type="number" name="no_telp" class="textfield" value="<?php echo $nasipadang['no_telp']; ?>">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" class="textfield" value="<?php echo $nasipadang['alamat']; ?>">
            <label for="pesanan">Pesanan</label>
            <input type="text" name="pesanan" class="textfield" value="<?php echo $nasipadang['pesanan']; ?>">
            <input type="submit" name="update" value="Update Data" class="login-btn">
        </form>
    </div>
</body>
</html>
