<?php
include "koneksi.php";

  // buat sambungin ke form pesanan
  if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];
    $pesanan = $_POST['pesanan'];

    $sql ="INSERT INTO `nasipadang`(`id`, `nama`, `no_telp`, `alamat`, `pesanan`) 
    VALUES (NULL,'$nama','$no_telp','$alamat','$pesanan')";

    $result = mysqli_query($conn, $sql);

    if($result) {
        header("location: index.php?msg=New record created succesfully");
    }
    else {
        echo "failed: " . mysqli_error($conn);
    }

}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    
    
    <!-- my css -->
    <link rel="stylesheet" href="style.css">

    <link rel="ikon" href="foto/dp_1.jpeg">
    <title>Dapoer Ampera</title>
  </head>

  <body id="Home">

    <!-- popup -->
    <script>
      alert("SELAMAT DATANG DI WEBSITE DAPOER AMPERA");
    </script>
    <!-- akhir popup -->

    

    <!-- navbar -->
    <!-- <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #d86100"> -->
      <div class="navbar">
        <a class="navbar-brand" href="#">Masakan Padang</a>                        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- <div class="collapse navbar-collapse" id="navbarNavDropdown"> -->
          <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#About">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#Menu">Menu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#komentar">Komentar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#owner">Owner</a>
            </li>
        </ul>
        
        </div>
      </div>    
    </nav>
    <!-- akhir navbar -->



    <!-- Jumbotron -->
    <section class="jumbotron text-center">
      <!-- darkmode -->
      <div class="container" style="text-align: right;">
        <button id="toggleBtn">Dark Mode</button>
      </div> 
      <div class="image-container">
        <img src="foto/dp_1.jpeg" alt="Dapoer Ampera" class="rounded-circle img-thumbnail" />
      </div>    
      <h1 class="display-4 text-center centered-content">Dapoer Ampera</h1>
      <p class="lead text-center centered-content">Masakan Padang</p>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#d86100" fill-opacity="1" d="M0,96L1440,160L1440,320L0,320Z"></path></svg>
    </section>
    <!-- akhir jumbotron -->

    <!-- about -->
    <section id="About">
      <div class="container">
        <div class="row text-center mb-3">
          <div class="col">
            <h2>Tentang Kami</h2>
          </div>
        </div>
        <div class="row justify-content-center fs-5 text-center">
          <div class="col-md-6">
            <p>
              Selamat datang di website "DAPOER AMPERA. berisikan menu makanan yang kami sediakan :>"
            </p>
          </div>
        </div>
      </div>
      
      <!-- AddEventListener -->
      <div class="centered-content">
        <button id="btn-info">Pelajari Lebih Lanjut</button>
        <p id="info" style="display: none;">Silahkan kontak langsung di Instagram kita @dapoer_ampera dan WhatsApp 086725326278</p>
    </div>    
      <!-- akhir AddEventListener -->

      <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#d86100" fill-opacity="1" d="M0,160L120,149.3C240,139,480,117,720,133.3C960,149,1200,203,1320,229.3L1440,256L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path></svg> -->
    </section>

    <!-- akhir about -->





    <!-- MENU -->
    <section id="Menu">
      <div class="container">
        <div class="row text-center">
          <div class="col">
            <h2>MENU</h2>
          </div>
        </div>
        <div class="row">
          <div class="card-container">
            <div class="card">
                <img src="foto/nasiayam.jpeg" class="rounded mx-auto d-block" alt="nasiayam" />
                <div class="card-body">
                    <p class="card-text">Nasi Ayam goreng khas Dapoer Ampera.</p>
                </div>
            </div>
            <div class="card">
                <img src="foto/nasirendang.jpeg" class="rounded mx-auto d-block" alt="nasirendang" />
                <div class="card-body">
                    <p class="card-text">Nasi Rendang Khas dapoer Ampera.</p>
                </div>
            </div>
            <div class="card">
                <img src="foto/nasitelur.jpeg" class="rounded mx-auto d-block" alt="nasitelur" />
                <div class="card-body">
                    <p class="card-text">Nasi Telur Khas dapoer Ampera.</p>
                </div>
            </div>
            <div class="card">
              <img src="foto/nasitb.jpeg" class="rounded mx-auto d-block" alt="nasitelur" />
              <div class="card-body">
                  <p class="card-text">Nasi Telur Khas dapoer Ampera.</p>
              </div>
          </div>
          <div class="card">
            <img src="foto/ayamgoreng.jpeg" class="rounded mx-auto d-block" alt="nasitelur" />
            <div class="card-body">
                <p class="card-text">Nasi Telur Khas dapoer Ampera.</p>
            </div>
          </div>
        </div>
      </div>
      

      <!-- manipulasi dom -->
      <div class="center-container">
        <div id="elemen">menu dapat berubah sewaktu waktu</div>
        <button onclick="toggleElemen()">sembunyikan</button>
      </div>
    
  
      <script>
          function toggleElemen() {
              // Mengambil elemen dengan ID 'elemen'
              var elemen = document.getElementById('elemen');
  
              // Memeriksa apakah elemen saat ini tersembunyi atau ditampilkan
              if (elemen.style.display === 'none') {
                  // Jika tersembunyi, tampilkan elemen
                  elemen.style.display = 'block';
              } else {
                  // Jika ditampilkan, sembunyikan elemen
                  elemen.style.display = 'none';
          }
        }
      </script>
      <!-- akhir manipulasi dom -->
    </section>
  </section>
    <!-- akhir Menu -->


    <!-- awal owner  -->
    <section id="owner">
        <div class="mydiv">
          <div class="row text-center mb-3">
            <div class="col text-center">
              <h2>owner</h2>
              <img src="foto/fototiram.jpeg" alt="Dapoer Ampera" width="200" class="rounded-circle img-thumbnail" />
            </div>          
          </div>
          <div class="row justify-content-center fs-5 text-center">
            <div class="col-md-6">
              <p>Halo nama saya Tiara Amanda Zachri dengan NIM 2209106104 dari kelas Informatika C1 2022 Fakultas Teknik Universitas Mulawarman</p>
            </div>
          </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,160L120,149.3C240,139,480,117,720,133.3C960,149,1200,203,1320,229.3L1440,256L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path></svg>
      </section>
  

    <!-- akhir owner -->

    <!-- Komentar -->
    <section id="komentar">
      <form method="post" action="process.php" class="form">
        <div class="form-group">
          <label for="nama">Nama :</label>
            <div class="input-icon">
                <input type="text" id="nama" name="nama" required>
                <i class="fas fa-user"></i>
              </div>
        </div>
  
        <div class="form-group">
          <label for="notelepon">notelepon:</label>
          <div class="input-icon">
              <input type="text" id="notelepon" name="notelepon" required>
              <i class="fas fa-money"></i>
          </div>
        </div>
  
        <div class="form-group">
          <label for="email">email:</label>
          <div class="input-icon">
              <input type="email" id="email" name="email" required>
              <i class="fas fa-lock"></i>
          </div>
        </div>
        <div class="form-group">
          <label for="komentar">komentar:</label>
          <div class="input-icon">
              <input type="komentar" id="komentar" name="komentar" required>
              <i class="fas fa-lock"></i>
          </div>
        </div>
  
        <button type="submit" class="btn-submit">Submit</button>
      </form>
    </section>
    <!-- akhir Komentar -->

    <!-- form pesanan -->
    <section class="add-data">
      <h1>Pesan Nasi Padang</h1><hr><br>
      <div class="leading-btn">
        <a href = "table.php"><button class="add-btn">Tekan tombol ini untuk memesan</button></a>
      </div><br>
    </section>
    <!-- akhir form pesanan -->

    <!-- footer -->
    <footer class="bg-dark text-white text-center p-3">
      <p>Created by <a href="https://www.instagram.com/tyramfoodjourney/" class="text-white fw-bold"></a>Tiara Amanda Zachri</p>
    </footer>
    <!-- akhir footer -->
    <script src="javascript.js"></script>
   
  </body>
</html>
