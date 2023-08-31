<!-- Konfigurasi Koneksi -->
<?php
include_once "config/config.php";
include_once "admin/include/inc_fungsi.php";

$id = dapatkan_id();

$sql1 = "select * from adat_saya where id = '$id'";
$q1 = mysqli_query($koneksi, $sql1);
$n1 = mysqli_num_rows($q1);
$r1 = mysqli_fetch_array($q1);

$nama = $r1["nama"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Detail Adat</title>

  <!-- Feathers Icons -->
  <script src="https://unpkg.com/feather-icons"></script>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Rubik:wght@300;400;700&display=swap"
    rel="stylesheet" />

  <!-- CSS Punyaku -->
  <link rel="stylesheet" href="<?php echo url_dasar(); ?>/css/style.css" />
</head>

<body>
  <!-- Navbar Start -->
  <nav class="navbar">
    <a href="<?php echo url_dasar(); ?>/index.php" class="navbar-logo">Travel</a>

    <div class="navbar-nav">
      <a href="<?php echo url_dasar(); ?>/index.php">Home</a>
      <a href="<?php echo url_dasar(); ?>/destinasi.php">Destinasi</a>
      <a href="<?php echo url_dasar(); ?>/makanan.php">Makanan</a>
      <a href="<?php echo url_dasar(); ?>/adat.php">Adat</a>
    </div>

    <div class="navbar-extra">
      <a href="#" id="light-dark"><i data-feather="sun"></i></a>
      <a href="<?php echo url_dasar(); ?>/admin" id="login"><i data-feather="user"></i></a>
      <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
    </div>
  </nav>
  <!-- Navbar End -->

  <!-- Konfigurasi MySql -->
  <?php if ($nama == "") {
    echo "<div><p>Maaf data ditemukan</p></div>";
  } else {
    ?>

    <!-- Hero Start -->
    <section class="hero-adat">
      <main class="content">
        <h1>
          <?php echo $r1["nama"]; ?>
        </h1>
        <p>Scroll kebawah untuk melihat terlebih detail</p>
      </main>
    </section>
    <!-- Hero End -->

    <!-- Detail Section Start -->
    <section id="detail" class="detail">
      <h2><span>Tentang</span> Adat</h2>

      <div class="row-detail">
        <div class="detail-img">
          <img src="<?php echo url_dasar() .
            "/admin/asset/adat/" .
            adat_foto($r1["id"]); ?>" alt="Detail Adat" />
        </div>
        <div class="content">
          <h3>
            <?php echo $r1["nama"]; ?>
          </h3>
          <p>
            <?php echo $r1["isi"]; ?>
          </p>
        </div>
      </div>
    </section>
    <!-- Detail Section End -->

    <!-- Video Section Start -->
    <section class="youtube" id="youtube">
      <h2><span>Video</span> Adat</h2>
      <div class="row">
        <div class="content">
          <h3>Sebelum kebawah, yuk nonton dulu</h3>
          <p>
            <?php echo $r1["textyoutube"]; ?>
          </p>
        </div>
        <iframe src="<?php echo $r1["youtube"]; ?>" title="YouTube video player" frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
          allowfullscreen class="yt"></iframe>
      </div>
    </section>
    <!-- Video Section End -->

    <!-- Maps Section Start -->
    <section class="peta" id="peta">
      <h2><span>Letak</span> Adat</h2>
      <div class="row">
        <iframe src="<?php echo $r1["maps"]; ?>" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade" class="map-detail"></iframe>
        <div class="content">
          <h3>Selanjutnya adalah dimana adat ini sering diadakan</h3>
          <p>
            <?php echo $r1["textmaps"]; ?>
          </p>
        </div>
      </div>
    </section>
    <?php
  } ?>
  <!-- Maps Section End -->

  <!-- Gallery Section Start -->
  <section class="gallery" id="gallery">
    <div><img src="<?php echo url_dasar(); ?>/asset/gallery/foto1.jpg" /></div>
    <div><img src="<?php echo url_dasar(); ?>/asset/gallery/foto2.jpeg" /></div>
    <div><img src="<?php echo url_dasar(); ?>/asset/gallery/foto3.jpg" /></div>
    <div><img src="<?php echo url_dasar(); ?>/asset/gallery/foto4.jpg" /></div>
    <div><img src="<?php echo url_dasar(); ?>/asset/gallery/foto5.jpg" /></div>
    <div><img src="<?php echo url_dasar(); ?>/asset/gallery/foto6.jpg" /></div>
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
      <a href="<?php echo url_dasar(); ?>/index.php">Home</a>
      <a href="<?php echo url_dasar(); ?>/destinasi.php">Destinasi</a>
      <a href="<?php echo url_dasar(); ?>/makanan.php">Makanan</a>
      <a href="<?php echo url_dasar(); ?>/adat.php">Adat</a>
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
  <script src="<?php echo url_dasar(); ?>/js/main.js"></script>
</body>

</html>