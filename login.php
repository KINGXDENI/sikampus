<?php
session_start();
if (isset($_SESSION['user'])) {
  header("Location:index.php");
  exit;
}
// panggil file database.php untuk db ke database 
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1">
  <title>Login</title>

  <link rel="shortcut icon" href="assets/img/utm.png">



  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" type="text/css" href="assets/plugins/fontawesome-free-5.4.2-web/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/sweetalert2.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="assets/css/animate.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/animate.compat.css">
  <link rel="stylesheet" type="text/css" href="assets/css/passhide.css">



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
  <link href="assets/css/signinnnn.css" rel="stylesheet">
</head>
<?php
// fungsi untuk menampilkan pesan
// jika alert = "" (kosong)
// tampilkan pesan "" (kosong)

if (empty($_GET['alert'])) {
  echo "";
}
// jika alert = 1
// tampilkan pesan Sukses "Data guru berhasil disimpan"
elseif ($_GET['alert'] == 1) { ?>
  <div class="flash-data1" data-flashdata1="<?= $_GET['alert'] == 1; ?>"></div>
<?php
}
// jika alert = 2
// tampilkan pesan Sukses "Data guru berhasil diubah"
elseif ($_GET['alert'] == 2) { ?>
  <div class="flash-data2" data-flashdata2="<?= $_GET['alert'] == 2; ?>"></div>
<?php
}
// jika alert = 3
// tampilkan pesan Sukses "Data guru berhasil dihapus"
elseif ($_GET['alert'] == 3) { ?>
  <div class="flash-data3" data-flashdata3="<?= $_GET['alert'] == 3; ?>"></div>

<?php
}
// jika alert = 4
// tampilkan pesan Gagal "nip sudah ada"
elseif ($_GET['alert'] == 4) { ?>
  <div class="flash-data4" data-flashdata4="<?= $_GET['alert'] == 4; ?>"></div>
  </div>
<?php
}
?>

<body class="text-center bg-warning ">

  <div class="card border-bottom-warning shadow-lg  col-3 m-auto bg-dark animated bounceIn" style="display: block;">
    <div class="card-body bg-dark text-warning">
      <form class="form-signin" method="POST" action="ceklogin.php">
        <img class="mb-4" src="foto/undraw_profile.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-bold">LOGIN</h1>
        <div class="inputicon">
          <input type="text" name="user" class="form-control mb-3 col-12" placeholder="Username" required autofocus>
          <i class="fas fa-user"></i>
        </div>
        <div class="inputicon2">
          <input type="password" name="pass" class="form-control col-12" id="seepass" placeholder="Password" required>
          <i class="fas fa-lock"></i>
        </div>
        <div class="mb-3 mt-3 margr">
          <label>
            <input type="checkbox" name="ingataku" onclick="seepw()">
           Show pass
          </label>
        </div>

        <button class="btn btn-lg btn-warning btn-block font-weight-normal mt-2 mb-4" name="login" type="submit">MASUK</button>
        <!-- <div class="text-white">Belum Punya Akun ? <a class="text-warning" href="regist.php">Register</a></div> -->
        <div class="text-white"> <a class="text-warning" href="lupa_pass.php">Lupa Password ?</a></div>
        <p class="mt-5 mb-3 text-muted">&copy; 2021-2022</p>
      </form>
    </div>
  </div>



</body>
<script type="text/javascript" src="assets/js/jquery-3.3.1.js"></script>
<script type="text/javascript" src="assets/js/script.js"></script>
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<!-- sweetalert js -->
<script type="text/javascript" src="assets/js/sweetalert2.min.js"></script>
<script type="text/javascript" src="assets/js/sweetalert2.all.min.js"></script>

</html>
<script>
  const flashdata = $('.flash-data').data('flashdata')
  if (flashdata) {
    Swal.fire({
      icon: 'success',
      title: 'Berhasil',
      text: 'Data Berhasil Dihapus'
    })
  }

  const flashdata4 = $('.flash-data4').data('flashdata4')
  if (flashdata4) {
    Swal.fire({
      icon: 'error',
      title: 'Gagal',
      text: 'Tidak bisa login'
    })
  }
  const flashdata11 = $('.flash-data11').data('flashdata11')
  if (flashdata11) {
    Swal.fire({
      icon: 'success',
      title: 'Success',
      text: 'Berhasil Login'
    })
  }
  const flashdata3 = $('.flash-data3').data('flashdata3')
  if (flashdata3) {
    Swal.fire({
      icon: 'error',
      title: 'Gagal',
      text: 'Username Salah'
    })
  }

  const flashdata2 = $('.flash-data2').data('flashdata2')
  if (flashdata2) {
    Swal.fire({
      icon: 'error',
      title: 'Gagal',
      text: 'Password Salah'
    })
  }

  const passField = document.querySelector("input");
  const showBtn = document.querySelector("span i");
  showBtn.onclick = (() => {
    if (passField.type === "password") {
      passField.type = "text";
      showBtn.classList.add("hide-btn");
    } else {
      passField.type = "password";
      showBtn.classList.remove("hide-btn");
    }
  });

  function seepw() {
    var x = document.getElementById("seepass");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
</script>