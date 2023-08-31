<!-- Import Fungsi Database -->
<?php
include_once "admin/include/inc_fungsi.php";
include_once "config/config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Adat</title>

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
  <section class="hero-adat">
    <main class="content">
      <h1>Adat</h1>
      <p>Kumpulan - Kumpulan Adat di Pulau Buton</p>
    </main>
  </section>
  <!-- Hero End -->

  <!-- Menu Section Start -->
  <section class="menu">
    <h2><span>Macam - Macam</span> Adat</h2>
    <p>Berikut adalah adat istiadat yang ada di pulau buton</p>

    <!-- Konfigurasi MySql Start-->
    <?php
    $sql1 = "select * from adat_saya order by id desc";
    $q1 = mysqli_query($koneksi, $sql1);
    while ($r1 = mysqli_fetch_array($q1)) { ?>
      <!-- Konfigurasi MySql End -->

      <div class="row">
        <div class="menu-card">
          <a href="<?php echo buat_link_adat($r1["id"]); ?>">
            <img src="<?php echo url_dasar() .
              "/admin/asset/adat/" .
              adat_foto($r1["id"]); ?>" alt="" class="menu-card-img" />
            <h3 class="menu-card-title">
              <?php echo $r1["nama"]; ?>
            </h3>
          </a>
        </div>
      </div>
    <?php }
    ?>
  </section>
  <!-- Menu Section End -->

  <!-- Footer Start -->
  <footer>
    <div class="socials">
      <a href="#"><i data-feather="instagram"></i></a>
      <a href="#"><i data-feather="facebook"></i></a>
      <a href="#"><i data-feather="twitter"></i></a>
    </div>

    <div class="links">
      <a href="#">Home</a>
      <a href="#">Destinasi</a>
      <a href="#">Makanan</a>
      <a href="#">Adat</a>
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