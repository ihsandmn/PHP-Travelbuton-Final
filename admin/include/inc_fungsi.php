<?php
function url_dasar()
{
  $url_dasar =
    "http://" . $_SERVER["SERVER_NAME"] . dirname($_SERVER["SCRIPT_NAME"]);
  return $url_dasar;
}

function ambil_judul($id_tulisan)
{
  global $koneksi;
  $sql1 = "select * from tentang_saya where id = '$id_tulisan'";
  $q1 = mysqli_query($koneksi, $sql1);
  $r1 = mysqli_fetch_array($q1);
  $text = $r1["judul"];
  return $text;
}

function ambil_isi($id_tulisan)
{
  global $koneksi;
  $sql1 = "select * from tentang_saya where id = '$id_tulisan'";
  $q1 = mysqli_query($koneksi, $sql1);
  $r1 = mysqli_fetch_array($q1);
  $text = $r1["isi"];
  return $text;
}

function dapatkan_id()
{
  $id = "";
  if (isset($_SERVER["PATH_INFO"])) {
    $id = dirname($_SERVER["PATH_INFO"]);
    $id = preg_replace("/[^0-9]/", "", $id);
  }
  return $id;
}

function bersihkan_judul($judul)
{
  $judul_baru = strtolower($judul);
  $judul_baru = preg_replace("/[^a-zA-Z0-9\s]/", "", $judul_baru);
  $judul_baru = str_replace(" ", "-", $judul_baru);
  return $judul_baru;
}

function destinasi_foto($id)
{
  global $koneksi;
  $sql1 = "select * from destinasi_saya where id = '$id'";
  $q1 = mysqli_query($koneksi, $sql1);
  $r1 = mysqli_fetch_array($q1);
  $foto = $r1["foto"];

  if ($foto) {
    return $foto;
  }
}

function buat_link_destinasi($id)
{
  global $koneksi;
  $sql1 = "select * from destinasi_saya where id = '$id'";
  $q1 = mysqli_query($koneksi, $sql1);
  $r1 = mysqli_fetch_array($q1);
  $nama = bersihkan_judul($r1["nama"]);
  // http://localhost/travel-buton/contoh.php/'id'/'judul'
  return url_dasar() . "/detail-destinasi.php/$id/$nama";
}

function makanan_foto($id)
{
  global $koneksi;
  $sql1 = "select * from makanan_saya where id = '$id'";
  $q1 = mysqli_query($koneksi, $sql1);
  $r1 = mysqli_fetch_array($q1);
  $foto = $r1["foto"];

  if ($foto) {
    return $foto;
  }
}

function buat_link_makanan($id)
{
  global $koneksi;
  $sql1 = "select * from makanan_saya where id = '$id'";
  $q1 = mysqli_query($koneksi, $sql1);
  $r1 = mysqli_fetch_array($q1);
  $nama = bersihkan_judul($r1["nama"]);
  // http://localhost/travel-buton/contoh.php/'id'/'judul'
  return url_dasar() . "/detail-makanan.php/$id/$nama";
}

function adat_foto($id)
{
  global $koneksi;
  $sql1 = "select * from adat_saya where id = '$id'";
  $q1 = mysqli_query($koneksi, $sql1);
  $r1 = mysqli_fetch_array($q1);
  $foto = $r1["foto"];

  if ($foto) {
    return $foto;
  }
}

function buat_link_adat($id)
{
  global $koneksi;
  $sql1 = "select * from adat_saya where id = '$id'";
  $q1 = mysqli_query($koneksi, $sql1);
  $r1 = mysqli_fetch_array($q1);
  $nama = bersihkan_judul($r1["nama"]);
  // http://localhost/travel-buton/contoh.php/'id'/'judul'
  return url_dasar() . "/detail-adat.php/$id/$nama";
}