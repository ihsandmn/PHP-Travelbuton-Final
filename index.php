<!-- Import Fungsi Database -->
<?php
include_once "admin/include/inc_fungsi.php";
include_once "config/config.php";
?>

<!-- Konfigurasi Input Data Start-->
<?php if (isset($_POST["submit"])) {
  $nama = $_POST["nama"]; // Mendapatkan Nama dari form
  $telepon = $_POST["telepon"]; // Mendapatkan email dari form
  $isi = $_POST["isi"]; // Mendapatkan komentar dari form

  $sql = "INSERT INTO kontak_saya (nama, telepon, isi)
			VALUES ('$nama', '$telepon', '$isi')";
  $hasil = mysqli_query($koneksi, $sql);
  if ($hasil) {
    echo "<script>alert('Terima kasih atas feedbacknya :)')</script>";
  } else {
    echo "<script>alert('Maaf feedbacknya belum diterima :(')</script>";
  }
} ?>
<!-- Konfigurasi Input Data End -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Travel Buton</title>

  <!-- Feathers Icons -->
  <script src="https://unpkg.com/feather-icons"></script>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Rubik:wght@300;400;700&display=swap"
    rel="stylesheet" />

  <!-- CSS Punyaku -->
  <link rel="stylesheet" href="css/style.css" />

</head>

<body>
  <!-- Navbar Start -->
  <nav class="navbar">
    <a href="index.php" class="navbar-logo">Travel</a>

    <div class="navbar-nav">
      <a href="index.php">Home</a>
      <a href="destinasi.php">Destinasi</a>
      <a href="makanan.php">Makanan</a>
      <a href="adat.php">Adat</a>
    </div>

    <div class="navbar-extra">
      <a href="#" id="light-dark"><i data-feather="sun"></i></a>
      <a href="admin" id="login"><i data-feather="user"></i></a>
      <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
    </div>
  </nav>
  <!-- Navbar End -->

  <!-- Hero Start -->
  <section class="hero">
    <main class="content">
      <h1>Visit Buton Island</h1>
      <p>Information on one of the most beautiful island in Indonesia</p>
      <a href="destinasi.php" class="discover-more">Discover More</a>
    </main>
  </section>
  <!-- Hero End -->

  <!-- About Section Start -->
  <section id="about" class="about">
    <h2><span>Tentang</span> Saya</h2>

    <div class="row">
      <div class="about-img">
        <img src="asset/about-foto.jpg" alt="Tentang Saya" />
      </div>
      <div class="content">
        <h3>
          <?php echo ambil_judul("2"); ?>
        </h3>
        <p>
          <?php echo ambil_isi("2"); ?>
        </p>
      </div>
    </div>
  </section>
  <!-- About Section End -->

  <!-- Kontak Section Start -->
  <section class="contact">
    <h2><span>Kontak</span> Saya</h2>
    <p>
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi,
      quidem.
    </p>

    <div class="row">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126912.66982691502!2d106.83498004631922!3d-6.260972816057286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f2d148fbe713%3A0x6e667d52ebedf5a9!2sEast%20Jakarta%2C%20East%20Jakarta%20City%2C%20Jakarta!5e0!3m2!1sen!2sid!4v1678942706132!5m2!1sen!2sid"
        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>

      <form action="" method="POST">
        <div class="input-kontak">
          <i data-feather="user"></i>
          <input type="text" placeholder="Nama" name="nama" id="nama" required>
        </div>
        <div class="input-kontak">
          <i data-feather="phone"></i>
          <input type="text" placeholder="Phone" name="telepon" id="telepon" required>
        </div>
        <div class="input-kontak">
          <i data-feather="mail"></i>
          <input type="text" placeholder="Pesan" name="isi" id="isi" required>
        </div>
        <button type="submit" class="btn" name="submit">Kirim Pesan</button>
      </form>
    </div>
  </section>
  <!-- Kontak Section End -->

  <!-- Gallery Section Start -->
  <section class="gallery" id="gallery">
    <div><img src="asset/gallery/foto1.jpg" /></div>
    <div><img src="asset/gallery/foto2.jpeg" /></div>
    <div><img src="asset/gallery/foto3.jpg" /></div>
    <div><img src="asset/gallery/foto4.jpg" /></div>
    <div><img src="asset/gallery/foto5.jpg" /></div>
    <div><img src="asset/gallery/foto6.jpg" /></div>
  </section>
  <!-- Gallery Section End -->

  <!-- Footer Start -->
  <footer>
    <div class="socials">
      <a href="#"><i data-feather="instagram"></i></a>
      <a href="#"><i data-feather="facebook"></i></a>
      <a href="#"><i data-feather="twitter"></i></a>
    </div>

    <div class="links">
      <a href="index.php">Home</a>
      <a href="destinasi.php">Destinasi</a>
      <a href="makanan.php">Makanan</a>
      <a href="adat.php">Adat</a>
    </div>

    <div class="credit">
      <p>Created by <a href="">Muhammad Ihsan Daimun</a>. | &copy; 2023</p>
    </div>
  </footer>
  <!-- Footer End -->

  <!-- Feather Icons -->
  <script>
    feather.replace();
  </script>

  <!-- Javascript -->
  <script src="js/main.js"></script>
</body>

</html>