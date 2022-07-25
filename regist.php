<?php
// panggil file database.php untuk koneksi ke database
require_once "config/database.php";
session_start();
if (isset($_POST['register'])) {
  // ambil data hasil submit dari form
  $user = mysqli_real_escape_string($db, trim($_POST['user']));
  $pass = mysqli_real_escape_string($db, trim(md5($_POST['pass'])));
  $level = mysqli_real_escape_string($db, trim($_POST['level']));
  $email = mysqli_real_escape_string($db, trim($_POST['email']));

  // perintah query untuk menampilkan kode_kelas dari tabel siswa berdasarkan kode_kelas dari hasil submit form
  $query = mysqli_query($db, "SELECT user FROM tbl_admin WHERE email='$email' ")
    or die('Ada kesalahan pada query tampil data user: ' . mysqli_error($db));
  $rows = mysqli_num_rows($query);
  // jika kode_kelas sudah ada
  if ($rows > 0) {
    // tampilkan pesan gagal simpan data
    echo "<script>alert('Maaf, email sudah ada!');document.location='regist.php'</script>";
  }
  // jika kode_kelas belum ada  
  else {
    $code = rand(999999, 111111);
    $status = "notverified";
    $foto = "";
    $insert = mysqli_query($db, "INSERT INTO tbl_admin(user, email, level, foto, pass, code, status)
VALUES('$user', '$email','$level','$foto', '$pass', '$code', '$status')")
      or die('Ada kesalahan pada query insert : ' . mysqli_error($db));
    // cek query
    if ($insert) {
      $subject = "Email Verification Code";
      $message = "Your verification code is $code";
      $sender = "From: shahiprem7890@gmail.com";
      if (mail($email, $subject, $message, $sender)) {
        $_SESSION['email'] = $email;
        $_SESSION['pass'] = $pass;
        header("location: user-otp.php");
        exit();
      }
    }
  }
}

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1">
  <title>Register</title>

  <link rel="shortcut icon" href="assets/img/utm.png">



  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="assets/css/animate.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/animate.compat.css">



  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="assets/css/signinnnnn.css" rel="stylesheet">
</head>

<body class="text-center bg-warning">
  <div class="card border-bottom-warning shadow-lg  col-3 m-auto bg-dark animated bounceIn">
    <div class="card-body bg-dark text-warning">
      <form class="form-signin" method="POST">
        <img class="mb-4" src="foto/undraw_profile.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-bold">REGISTER</h1>
        <label class="sr-only">Email</label>
        <input type="email" name="email" class="form-control mb-2 col-12" placeholder="Email" required autofocus>
        <label class="sr-only">Username</label>
        <input type="text" name="user" class="form-control col-12" placeholder="Username" required>
        <label class="sr-only">Password</label>
        <input type="password" name="pass" class="form-control mt-2 col-12" placeholder="Password" required>
        <label class="sr-only"></label>
        <input type="hidden" name="level" class="form-control mt-2" value="Siswa">
        <span class="text-white">Sudah Punya Akun ? <a class="text-warning" href="login.php">Login</a></span>
        <button class="btn btn-lg btn-warning btn-block mt-2" name="register" type="submit">Register</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2021-2022</p>
      </form>
    </div>
  </div>



</body>

</html>