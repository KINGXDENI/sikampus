<?php
require_once "config/database.php";
if (isset($_POST['check-reset-otp'])) {
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($db, $_POST['otp']);
    $check_code = "SELECT * FROM tbl_admin WHERE code = $otp_code";
    $code_res = mysqli_query($db, $check_code);
    if (mysqli_num_rows($code_res) > 0) {
        $fetch_data = mysqli_fetch_assoc($code_res);
        $email = $fetch_data['email'];
        $_SESSION['email'] = $email;
        $info = "Please create a new password that you don't use on any other site.";
        $_SESSION['info'] = $info;
        header('location: ganti_pass.php');
        exit();
    } else {
        $errors['otp-error'] = "You've entered incorrect code!";
    }
}
?>
