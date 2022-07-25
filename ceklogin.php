<?php
session_start();
require_once "config/database.php";
if (isset($_POST['login'])) {
    $epass = md5($_POST['pass']);
    $user = mysqli_escape_string($db, strtolower($_POST['user']));
    $pass = mysqli_escape_string($db, $epass);

    //cek user, terdaftar atau tidak
    $cek_user = mysqli_query($db, "SELECT * FROM tbl_admin WHERE user = '$user' ");
    $user_valid = mysqli_fetch_array($cek_user);
    $level = $user_valid['level'];
    //uji jika user terdaftar
    if ($user_valid) {
        //jika user terdaftar
        //cek pass sesuai atau tidak
        $cek_pass = mysqli_query($db, "SELECT * FROM tbl_admin WHERE pass='$pass' ");
        $pass_valid = mysqli_fetch_array($cek_pass);
        if ($pass_valid) {
            //jika password sesuai
            //buat session
            
            $_SESSION['login'] = true;
            $_SESSION['user'] = $user_valid['user'];
            $_SESSION['level'] = $user_valid['level'];
            $_SESSION['email'] = $user_valid['email'];
            $_SESSION['foto'] = $user_valid['foto'];
            $_SESSION['pass'] = $user_valid['pass'];
            $_SESSION['id'] = $user_valid['id_admin'];
            $_SESSION['status'] = $user_valid['status'];

            //uji level user
            if ($level == "Admin") {
                header('location:index.php?alert=11');
            } elseif ($level == "Siswa") {
                header('location:index.php?alert=11');
            }else {
                header('location: login.php?alert=2');
            }
        } else {
            header('location: login.php?alert=2');
        }
    } else {
        header('location: login.php?alert=3');
    }
}
?>