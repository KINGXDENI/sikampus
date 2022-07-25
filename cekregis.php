<?php
// panggil file database.php untuk koneksi ke database
require_once "config/database.php";

if (isset($_POST['register'])) {
  // ambil data hasil submit dari form
  $user = mysqli_real_escape_string($db, trim($_POST['user']));
  $pass = mysqli_real_escape_string($db, trim(md5($_POST['pass'])));
  $level = mysqli_real_escape_string($db, trim($_POST['level']));
  $email = mysqli_real_escape_string($db, trim($_POST['email']));

  // perintah query untuk menampilkan kode_kelas dari tabel siswa berdasarkan kode_kelas dari hasil submit form
  $query = mysqli_query($db, "SELECT * FROM tbl_admin WHERE email='$email'")
    or die('Ada kesalahan pada query tampil data user: ' . mysqli_error($db));
  $rows = mysqli_num_rows($query);
  // jika kode_kelas sudah ada
  if ($rows > 0) {
    // tampilkan pesan gagal simpan data
    echo "<script>alert('Maaf, Email sudah ada!');document.location='regist.php'</script>";
  }
  // jika kode_kelas belum ada  
  else {
    $code = rand(999999, 111111);
    $status = "notverified";
    $insert_data = "INSERT INTO tbl_admin (user,pass,level,email,code,status)
                    VALUES('$user','$pass','$level','$email','$code', '$status')";  
    $data_check = mysqli_query($db, $insert_data);
    if ($data_check) {
      $subject = "Email Verification Code";
      $message = "Your verification code is $code";
      $sender = "From: shahiprem7890@gmail.com";
      if (mail($email, $subject, $message, $sender)) {
        $_SESSION['email'] = $email;
        $_SESSION['pass'] = $pass;
                header('location:user_otp.php');
        exit();
      } 
  }
}
}

?>