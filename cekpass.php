<?php
require_once "config/database.php";

if (isset($_POST['change-password'])) {
    $_SESSION['info'] = "";
    $pass = mysqli_real_escape_string($db, $_POST['pass']);
    $cpass = mysqli_real_escape_string($db, $_POST['cpass']);
    if ($pass !== $cpass) {
        $errors['pass'] = "Confirm password not matched!";
    } else {
        $code = 0;
        $email = $_SESSION['email']; //getting this email using session
        $encpass = md5($pass);
        $update_pass = "UPDATE tbl_admin SET code = $code, pass = '$encpass' WHERE email = '$email'";
        $run_query = mysqli_query($db, $update_pass);
        if ($run_query) {
            $info = "Your password changed. Now you can login with your new password.";
            $_SESSION['info'] = $info;
            header('Location: login.php');
        } else {
            $errors['db-error'] = "Failed to change your password!";
        }
    }
}
?>
