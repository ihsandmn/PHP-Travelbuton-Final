<!-- Import Header -->
<?php include "include/inc_header.php"; ?>

<!-- Konfigurasi Search -->
<?php
$sukses = "";
$katakunci = isset($_GET["katakunci"]) ? $_GET["katakunci"] : "";
if (isset($_GET["op"])) {
  $op = $_GET["op"];
} else {
  $op = "";
}

// Konfigurasi Hapus Data
if ($op == "delete") {
  $id = $_GET["id"];
  $sql1 = "delete from tentang_saya where id = '$id'";
  $q1 = mysqli_query($koneksi, $sql1);
  if ($q1) {
    $sukses = "Berhasil hapus data";
  }
}
?>

<h1 style="text-align: center; padding: 2rem; font-weight: bold">Halaman Admin Home</h1>
<?php if ($sukses) { ?>
<div class="alert alert-primary" role="alert">
  <?php echo $sukses; ?>
</div>
<?php } ?>
<form class="row g-3" method="get">
  <div class="col-auto">
    <input
      type="text"
      class="form-control"
      placeholder="Masukkan Kata Kunci"
      name="katakunci"
      value="<?php echo $katakunci; ?>"
      style="width:500px"
    />
  </div>
  <div class="col-auto">
    <input
      type="submit"
      name="cari"
      value="Cari Tulisan"
      class="btn btn-secondary"
    />
  </div>
</form>
<table class="table table-striped" style="margin-top:3rem">
  <thead>
    <tr>
      <th class="col-1">#</th>
      <th>Judul</th>
      <th>Isi</th>
      <th class="col-2">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sqltambahan = "";
    $per_halaman = 2;
    if ($katakunci != "") {
      $array_katakunci = explode(" ", $katakunci);
      for ($x = 0; $x < count($array_katakunci); $x++) {
        $sqlcari[] =
          "(judul like '%" .
          $array_katakunci[$x] .
          "%' or isi like '%" .
          $array_katakunci[$x] .
          "%')";
      }
      $sqltambahan = " where " . implode(" or ", $sqlcari);
    }
    $sql1 = "select * from tentang_saya $sqltambahan";
    $page = isset($_GET["page"]) ? (int) $_GET["page"] : 1;
    $mulai = $page > 1 ? $page * $per_halaman - $per_halaman : 0;
    $q1 = mysqli_query($koneksi, $sql1);
    $total = mysqli_num_rows($q1);
    $pages = ceil($total / $per_halaman);
    $nomor = $mulai + 1;
    $sql1 =
      $sql1 .
      " order by
    id desc limit $mulai,$per_halaman";
    $q1 = mysqli_query($koneksi, $sql1);
    while ($r1 = mysqli_fetch_array($q1)) { ?>
    <tr>
      <td><?php echo $nomor++; ?></td>
      <td><?php echo $r1["judul"]; ?></td>
      <td><?php echo $r1["isi"]; ?></td>
      <td>
        <a href="tentang_input.php?id=<?php echo $r1["id"]; ?>">
          <span class="badge bg-warning text-dark">Edit</span>
        </a>
      </td>
    </tr>
    <?php }
    ?>
  </tbody>
</table>

<nav aria-label="Page navigation example">
  <ul class="pagination">
    <?php
    $cari = isset($_GET["cari"]) ? $_GET["cari"] : "";
    for ($i = 1; $i <= $pages; $i++) { ?>
    <li class="page-item">
      <a
        class="page-link"
        href="tentang_saya.php?katakunci=<?php echo $katakunci; ?>&cari=<?php echo $cari; ?>&page=<?php echo $i; ?>"
        ><?php echo $i; ?></a
      >
    </li>
    <?php }
    ?>
  </ul>
</nav>
<!-- Footer -->
</main>
<footer class="bg-light">
    <div class="text-center p-5 fixed-bottom" style="background:#42b883;">
        Muhammad Ihsan Daimun &copy; 2023
    </div>
</footer>
