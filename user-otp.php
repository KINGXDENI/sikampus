<?php require_once "controllerUserDataa.php"; ?>
<?php
$email = $_SESSION['email'];
if ($email == false) {
  header('Location: login.php');
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
        <h1 class="h3 mb-3 font-weight-bold">OTP</h1>
        <?php
        if (isset($_SESSION['info'])) {
        ?>
          <div class="alert alert-success text-center" style="padding: 0.4rem 0.4rem">
            <?php echo $_SESSION['info']; ?>
          </div>
        <?php
        }
        ?>
        <?php
        if (count($errors) > 0) {
        ?>
          <div class="alert alert-danger text-center">
            <?php
            foreach ($errors as $showerror) {
              echo $showerror;
            }
            ?>
          </div>
        <?php
        }
        ?>
        <label class="sr-only">OTP</label>
        <input type="number" name="otp" class="form-control col-12" placeholder="Enter verification code" required>
        <button class="btn btn-lg btn-warning btn-block mt-2" name="check" type="submit">CEK</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2021-2022</p>
      </form>
    </div>
  </div>



</body>

</html>