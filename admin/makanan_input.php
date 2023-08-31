<!-- Import Header -->
<?php include "include/inc_header.php"; ?>

<?php
$nama = "";
$isi = "";
$foto = "";
$foto_name = "";
$maps = "";
$textmaps = "";
$youtube = "";
$textyoutube = "";

$error = "";
$sukses = "";

if (isset($_GET["id"])) {
  $id = $_GET["id"];
} else {
  $id = "";
}

if ($id != "") {
  $sql1 = "select * from makanan_saya where id = '$id'";
  $q1 = mysqli_query($koneksi, $sql1);
  $r1 = mysqli_fetch_array($q1);
  $nama = $r1["nama"];
  $isi = $r1["isi"];
  $foto = $r1["foto"];
  $maps = $r1["maps"];
  $textmaps = $r1["textmaps"];
  $youtube = $r1["youtube"];
  $textyoutube = $r1["textyoutube"];

  if ($nama == "" or $isi == "") {
    $error = "Data tidak ditemukan cuy";
  }
}

if (isset($_POST["simpan"])) {
  $nama = $_POST["nama"];
  $isi = $_POST["isi"];
  $maps = $_POST["maps"];
  $textmaps = $_POST["textmaps"];
  $youtube = $_POST["youtube"];
  $textyoutube = $_POST["textyoutube"];

  if ($nama == "" or $isi == "" or $youtube == "") {
    $error = "Silakan masukkan semua datanya cuy.";
  }

  if ($_FILES["foto"]["name"]) {
    $foto_name = $_FILES["foto"]["name"];
    $foto_file = $_FILES["foto"]["tmp_name"];

    $detail_file = pathinfo($foto_name);
    $foto_ekstensi = $detail_file["extension"];

    $ekstensi_yang_diperbolehkan = ["jpg", "jpeg", "png", "gif"];
    if (!in_array($foto_ekstensi, $ekstensi_yang_diperbolehkan)) {
      $error =
        "Ekstensi yang diperbolehkan adalah jpg, jpeg, png, dan gif aja ya cuy";
    }
  }

  if (empty($error)) {
    if ($foto_name) {
      $direktori = "asset/makanan";

      @unlink($direktori . "/$foto"); //delete data

      $foto_name = "makanan_" . time() . "_" . $foto_name;
      move_uploaded_file($foto_file, $direktori . "/" . $foto_name);

      $foto = $foto_name;
    } else {
      $foto_name = $foto; //memasukkan data dari data yang sebelumnya ada
    }

    if ($id != "") {
      $sql1 = "update makanan_saya set nama = '$nama',foto='$foto_name',isi='$isi',maps='$maps',textmaps='$textmaps',youtube='$youtube',textyoutube='$textyoutube',tgl_update=now() where id = '$id'";
    } else {
      $sql1 = "insert into makanan_saya(nama,foto,isi,youtube) values ('$nama','$foto_name','$isi','$maps','$textmaps','$youtube','$textyoutube')";
    }

    $q1 = mysqli_query($koneksi, $sql1);
    if ($q1) {
      $sukses = "Sukses cuy memasukkan data";
    } else {
      $error = "Gagal cuy masukkan data";
    }
  }
}
?>

<h1 style="text-align: center; padding: 2rem; font-weight: bold">Input Data Makanan</h1>
<div class="mb-3 row">
  <a href="makanan_saya.php">
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
<form action="" method="post" enctype="multipart/form-data">
  <div class="mb-3 row">
    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nama" value="<?php echo $nama; ?>" name="nama" />
    </div>
  </div>
  <div class="mb-3 row">
    <label for="foto" class="col-sm-2 col-form-label">Foto</label>
    <div class="col-sm-10">
      <?php if ($foto) {
        echo "<img src='asset/makanan/$foto' style='max-height:100px;max-width:100px'/>";
      } ?>
      <input type="file" class="form-control" id="foto" name="foto" />
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
    <label for="maps" class="col-sm-2 col-form-label">Link Maps</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="maps" value="<?php echo $maps; ?>" name="maps" />
    </div>
  </div>
  <div class="mb-3 row">
    <label for="textmaps" class="col-sm-2 col-form-label">Isi Section Maps</label>
    <div class="col-sm-10">
      <textarea name="textmaps" class="form-control" style="height: 150px">
      <?php echo $textmaps; ?></textarea>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="youtube" class="col-sm-2 col-form-label">Link Youtube</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="youtube" value="<?php echo $youtube; ?>" name="youtube" />
    </div>
  </div>
  <div class="mb-3 row">
    <label for="textyoutube" class="col-sm-2 col-form-label">Isi Section Youtube</label>
    <div class="col-sm-10">
      <textarea name="textyoutube" class="form-control" style="height: 150px">
      <?php echo $textyoutube; ?></textarea>
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