<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "travel_buton";

$koneksi = mysqli_connect($host, $user, $pass, $db);
//Cek Koneksi
if (!$koneksi) {
  die("Tidak bisa terkoneksi ke database");
}