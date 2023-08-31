<!-- Session Login Admin -->
<?php
session_start();
if ($_SESSION["admin_username"] == "") {
  header("location:login.php");
  exit();
}
// Import Database & Function
include "../config/config.php";
include "inc_fungsi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Travel Buton</title>

  <!-- Import Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>

  <!-- Import CSS Punyaku -->
  <link rel="stylesheet" href="css/style.css">

  <!-- Import Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;700&display=swap" rel="stylesheet" />

  <!-- Import API Summernote -->
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

  <link href="../css/summernote-image-list.min.css" />
  <script src="../js/summernote-image-list.min.js"></script>

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

  <!-- Style Summernote -->
  <style>
    .image-list-content .col-lg-3 {
      width: 100%;
    }

    .image-list-content img {
      float: left;
      width: 20%;
    }

    .image-list-content p {
      float: left;
      padding-left: 20px;
    }

    .image-list-item {
      padding: 10px 0px 10px 0px;
    }
  </style>
</head>

<!-- Navbar Start -->

<body class="container-fluid">
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="padding:1.5rem">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">AdminCuy</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav" style="font-size:1.2rem; margin: 0 50px ">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="tentang_saya.php">Tentang Saya</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="destinasi_saya.php">Destinasi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="makanan_saya.php">Makanan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="adat_saya.php">Adat</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="kontak_saya.php">Feedback</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ganti_password.php">Password</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Navbar End -->
  </header>
  <main>