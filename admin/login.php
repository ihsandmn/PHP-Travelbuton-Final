<!-- Konfigurasi Database -->
<?php
include "config/config.php";

session_start();
if (isset($_SESSION["admin_username"]) != "") {
  header("location:index.php");
  exit();
}

$username = "";
$password = "";
$err = "";

if (isset($_POST["Login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  if ($username == "" or $password == "") {
    $err = "Silakan masukkan semua isi ya";
  } else {
    $sql1 = "select * from admin where username = '$username'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $n1 = mysqli_num_rows($q1);

    if ($n1 < 1) {
      $err = "Username tidak ditemukan";
    } elseif ($r1["password"] != md5($password)) {
      $err = "Password yang kamu masukkan tidak sesuai";
    } else {
      $_SESSION["admin_username"] = $username;
      header("location:index.php");
      exit();
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>

  <!-- Bootstrap Framework -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Rubik:wght@300;400;700&display=swap"
    rel="stylesheet" />

  <!-- Vanilla CSS -->
  <link rel="stylesheet" href="css/style.css" />
</head>

<!-- Form Login Start -->

<body style="width: 100%; max-width: 500px; margin: auto; margin-top: 12rem; padding: 15px">
  <form action="" method="POST">
    <h1>Login Admin</h1>
    <?php if ($err) { ?>
      <div class="alert alert-danger">
        <?php echo $err; ?>
      </div>
    <?php } ?>
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username Anda"
        value="<?php echo $username; ?>" />
    </div>
    <div class="form-group" style="margin-top: 20px">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" name="password" />
    </div>
    <button type="submit" class="btn btn-primary" name="Login" style="margin-top: 20px; padding:10px 60px">
      Login
    </button>
    <button type="button" onclick="location.href='../index.php'" class="btn btn-secondary" name="home"
      style="margin-top: 20px; margin-left: 110px; padding:10px 30px">
      Back to Home
    </button>
  </form>
  <!-- Form Login End -->

  <!-- Footer -->
  </main>
  <footer class="bg-light">
    <div class="text-center p-5 fixed-bottom" style="background:#42b883;">
      Muhammad Ihsan Daimun &copy; 2023
    </div>
  </footer>
</body>

</html>