<!-- Import Header -->
<?php include "include/inc_header.php"; ?>

<?php
$judul = "";
$isi = "";
$error = "";
$sukses = "";

if (isset($_GET["id"])) {
  $id = $_GET["id"];
} else {
  $id = "";
}

if ($id != "") {
  $sql1 = "select * from tentang_saya where id = '$id'";
  $q1 = mysqli_query($koneksi, $sql1);
  $r1 = mysqli_fetch_array($q1);
  $judul = $r1["judul"];
  $isi = $r1["isi"];

  if ($isi == "") {
    $error = "Data tidak ditemukan cuy";
  }
}

if (isset($_POST["simpan"])) {
  $judul = $_POST["judul"];
  $isi = $_POST["isi"];

  if ($judul == "") {
    $error =
      "Silakan masukkan semua data yakni adalah data judul dan isi ya cuy";
  }

  if (empty($error)) {
    if ($id != "") {
      $sql1 = "update tentang_saya set judul = '$judul',isi='$isi',tgl_update=now() where id = '$id'";
    } else {
      $sql1 = "insert into tentang_saya(judul,isi) values ('$judul','$isi')";
    }

    $q1 = mysqli_query($koneksi, $sql1);
    if ($q1) {
      $sukses = "Sukses memasukkan data cuy";
    } else {
      $error = "Gagal memasukkan data cuy";
    }
  }
}
?>
<h1 style="text-align: center; padding: 2rem; font-weight: bold">Input Data Tentang Saya</h1>
<div class="mb-3 row">
  <a href="tentang_saya.php">
    << Kembali ke halaman sebelumnya</a>
</div>
<?php if ($error) { ?>
  <div class="alert alert-danger" role="alert">
    <?php echo $error; ?>
  </div>
<?php } ?>
<?php if ($sukses) { ?>
  <div class="alert alert-primary" role="alert">
    <?php echo $sukses; ?>
  </div>
<?php } ?>
<form action="" method="post">
  <div class="mb-3 row">
    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="judul" value="<?php echo $judul; ?>" name="judul" />
    </div>
  </div>
  <div class="mb-3 row">
    <label for="isi" class="col-sm-2 col-form-label">Isi</label>
    <div class="col-sm-10">
      <textarea name="isi" class="form-control" id="summernote">
<?php echo $isi; ?></textarea>
    </div>
  </div>
  <div class="mb-3 row">
    <div class="col-sm-2"></div>
    <div class="col-sm-10">
      <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
    </div>
  </div>
</form>

<!-- Import Footer -->
<?php include "include/inc_footer.php"; ?>