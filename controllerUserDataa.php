<?php 
session_start();
require "config/database.php";
$email = "";
$user = "";
$errors = array();

//if user signup button
if(isset($_POST['signup'])){
    $user = mysqli_real_escape_string($db, $_POST['user']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $level = mysqli_real_escape_string($db, $_POST['level']);
    $pass = mysqli_real_escape_string($db, $_POST['pass']);
    $cpass = mysqli_real_escape_string($db, $_POST['cpass']);
    if($pass !== $cpass){
        $errors['pass'] = "Confirm password not matched!";
    }
    $email_check = "SELECT * FROM tbl_admin WHERE email = '$email'";
    $res = mysqli_query($db, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "Email that you have entered is already exist!";
    }
    else {
        $encpass = md5($pass);
        $code = rand(999999, 111111);
        $status = "notverified";
        $insert_data = "INSERT INTO tbl_admin (user, email, level, pass, code, status)
                        values('$user', '$email','$level', '$encpass', '$code', '$status')";
        $data_check = mysqli_query($db, $insert_data);
        if($data_check){
            $subject = "Email Verification Code";
            $message = "Your verification code is $code";
            $sender = "From: shahiprem7890@gmail.com";
            if(mail($email, $subject, $message, $sender)){
                $info = "We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['pass'] = $pass;
                header('location: user-otp.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while sending code!";
            }
        }else{
            $errors['db-error'] = "Failed while inserting data into database!";
        }
    }

}
    //if user click verification code submit button
    if(isset($_POST['check'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($db, $_POST['otp']);
        $check_code = "SELECT * FROM tbl_admin WHERE code = $otp_code";
        $code_res = mysqli_query($db, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['code'];
            $email = $fetch_data['email'];
            $code = 0;
            $status = 'verified';
            $update_otp = "UPDATE tbl_admin SET code = $code, status = '$status' WHERE code = $fetch_code";
            $update_res = mysqli_query($db, $update_otp);
            if($update_res){
                header('location: index.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while updating code!";
            }
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click login button
    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $check_email = "SELECT * FROM tbl_admin WHERE email = '$email'";
        $res = mysqli_query($db, $check_email);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            if(password_verify($password, $fetch_pass)){
                $_SESSION['email'] = $email;
                $status = $fetch['status'];
                if($status == 'verified'){
                  $_SESSION['email'] = $email;
                  $_SESSION['password'] = $password;
                    header('location: home.php');
                }else{
                    $info = "It's look like you haven't still verify your email - $email";
                    $_SESSION['info'] = $info;
                    header('location: user-otp.php');
                }
            }else{
                $errors['email'] = "Incorrect email or password!";
            }
        }else{
            $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
        }
    }

    //if user click continue button in forgot password form
    if(isset($_POST['check-email'])){
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $check_email = "SELECT * FROM tbl_admin WHERE email='$email'";
        $run_sql = mysqli_query($db, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE tbl_admin SET code = $code WHERE email = '$email'";
            $run_query =  mysqli_query($db, $insert_code);
            if($run_query){
                $subject = "Password Reset Code";
                $message = "Your password reset code is $code";
                $sender = "From: shahiprem7890@gmail.com";
                if(mail($email, $subject, $message, $sender)){
                    $info = "We've sent a passwrod reset otp to your email - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    header('location: reset-otpp.php');
                    exit();
                }else{
                    $errors['otp-error'] = "Failed while sending code!";
                }
            }else{
                $errors['db-error'] = "Something went wrong!";
            }
        }else{
            $errors['email'] = "This email address does not exist!";
        }
    }

    //if user click check reset otp button
    if(isset($_POST['check-reset'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($db, $_POST['otp']);
        $check_code = "SELECT * FROM tbl_admin WHERE code = $otp_code";
        $code_res = mysqli_query($db, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['email'];
            $_SESSION['email'] = $email;
            $info = "Please create a new password that you don't use on any other site.";
            $_SESSION['info'] = $info;
            header("location: ganti_pass.php");
            exit();
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click change password button
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $pass = mysqli_real_escape_string($db, $_POST['pass']);
        $cpass = mysqli_real_escape_string($db, $_POST['cpass']);
        if($pass !== $cpass){
            $errors['pass'] = "Confirm password not matched!";
        }else{
            $code = 0;
            $user = $_SESSION['user'];
            $level = $_SESSION['level'];
            $foto = $_SESSION['foto'];
            $id =$_SESSION['id'];
            $status = $_SESSION['status'];
            $email = $_SESSION['email']; //getting this email using session
            $encpass = md5($pass);
            $update_pass = "UPDATE tbl_admin SET code = '$code',
            user = '$user',
            level = '$level',
            foto = '$foto',
            id = '$id',
            status = '$status',
            pass = '$encpass' WHERE email = '$email'";
            $run_query = mysqli_query($db, $update_pass);
            if($run_query){
                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                header('Location: login.php');
            }else{
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    }
    
?>