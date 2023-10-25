<?php
include "koneksi.php";

// Periksa apakah formulir telah disubmit
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];
    $pesanan = $_POST['pesanan'];
    $file = upload_file();

    // Query untuk menyimpan data ke dalam tabel nasipadang
    $sql = "INSERT INTO `nasipadang`(`nama`, `no_telp`, `alamat`, `pesanan`, `file`) 
            VALUES ('$nama', '$no_telp', '$alamat', '$pesanan', '$file')";

    // Eksekusi query
    $result = mysqli_query($conn, $sql);

    if($result) {
        header("location: table.php?msg=New record created successfully");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// fungsi upload file
function upload_file()
{
    $namafile = $_FILES['file']['name'];
    $ukuranfile = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];
    $tmpname = $_FILES['file']['tmp_name'];

    // cek file yang diupload
    $extensifilevalid = ['jpg', 'jpeg', 'png'];
    $extensifile = pathinfo($namafile, PATHINFO_EXTENSION);
    $extensifile = strtolower($extensifile);

    if (!in_array($extensifile, $extensifilevalid)) {
        // pesan gagal
        echo "<script>
                alert('Format file tidak valid');
                window.location.href='table.php';
            </script>";
        die();
    }

    // cek ukuran file (2 MB)
    if ($ukuranfile > 2048000) {
        // pesan gagal
        echo "<script>
                alert('Ukuran file maksimal 2 MB');
                window.location.href='index.php';
            </script>";
        die();
    }

    // generate nama file baru
    $namafilebaru = uniqid() . '.' . $extensifile;

    // pindahkan ke folder lokal
    move_uploaded_file($tmpname, 'foto/' . $namafilebaru);
    return $namafilebaru;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Table</title>
</head>

<body>
    <!-- Formulir untuk menambahkan data -->
    <div class="add-form-container">
        <h1>Silahkan Masukkan Pesanan Anda</h1>
        <hr><br>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="textfield">
            <label for="no_telp">No.Telp</label>
            <input type="text" name="no_telp" class="textfield">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" class="textfield">
            <label for="pesanan">Pesanan</label>
            <input type="text" name="pesanan" class="textfield">
            <label for="file">Silahkan Upload Bukti Pembayaran</label>
            <input type="file" name="file" class="textfield">
            <input type="submit" name="tambah" value="Tambah Data" class="login-btn">
        </form>
    </div>

    <!-- Isi tabel menggunakan data dari database -->
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Nama</th>
                <th>Nomor Telpon</th>
                <th>Alamat</th>
                <th>Pesanan</th>
                <th>Bukti Pembayaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Query untuk mendapatkan data dari database
            $sql = "SELECT * FROM nasipadang";
            $result = mysqli_query($conn, $sql);

            // Loop untuk menampilkan data dari database
            $i = 1;
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['no_telp']; ?></td>
                <td><?php echo $row['alamat']; ?></td>
                <td><?php echo $row['pesanan']; ?></td>
                <td><img src="foto/<?php echo $row['file']; ?>" alt="Foto" width="200" height="150"></td>
                <td class="action">
                    <a href="update.php?id=<?php echo $row["id"] ?>">
                        <button class="edit-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" fill="white">
                                <path d="M200-200h56l345-345-56-56-345 345v56Zm572-403L602-771l56-56q23-23 56.5-23t56.5 23l56 56q23 23 24 55.5T829-660l-57 57Zm-58 59L290-120H120v-170l424-424 170 170Zm-141-29-28-28 56 56-28-28Z"/>
                            </svg>
                        </button>
                    </a>
                    <a href="delete.php?id=<?php echo $row["id"] ?>">
                        <button name="hapus" class="delete-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" fill="white">
                                <path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/>
                            </svg>
                        </button>
                    </a>
                </td>
            </tr>
            <?php
                $i++;
            }
            ?>
        </tbody>
    </table>