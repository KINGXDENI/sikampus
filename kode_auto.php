<?php
include "config/database.php";

$kauto = mysqli_query($db, "SELECT MAX(kode_kelas) as max_codek FROM tbl_kelass");
$data = mysqli_fetch_array($kauto);
$codek = $data['max_codek'];

$codek++;
$hurufk = "";
$kode_kat = $hurufk . sprintf("%03s", $codek);

//
$khauto = mysqli_query($db, "SELECT max(kode_hari) as max_codekh FROM tbl_hari");
$data = mysqli_fetch_array($khauto);
$codekh = $data['max_codekh'];

$codekh++;
$hurufkh = "";
$kh_kat = $hurufkh . sprintf("%03s", $codekh);

//

$jdauto = mysqli_query($db, "SELECT max(kode_jadwal) as max_codejd FROM tbl_jadwal");
$data = mysqli_fetch_array($jdauto);
$codejd = $data['max_codejd'];

$codejd++;
$hurufjd = "";
$jd_kat = $hurufjd . sprintf("%03s", $codejd);


//

$mauto = mysqli_query($db, "SELECT MAX(kode_mapel) as max_codem FROM tbl_matapelajaran");
$data = mysqli_fetch_array($mauto);
$codem = $data['max_codem'];

$codem++;
$hurufM = "";
$kodem_kat = $hurufM . sprintf("%03s", $codem);

//
$sauto = mysqli_query($db, "SELECT max(nim) as max_codes FROM tbl_siswa");
$data = mysqli_fetch_array($sauto);
$codes = $data['max_codes'];

$codes++;
$hurufs = "";
$nim_kat = $hurufs . sprintf("%03s", $codes);

$kjdauto = mysqli_query($db, "SELECT max(kode_jadwal) as max_codekjd FROM tbl_jadwaldetail");
$data = mysqli_fetch_array($kjdauto);
$codekjd = $data['max_codekjd'];

$codekjd++;
$hurufkjd = "";
$kjd_kat = $hurufkjd . sprintf("%03s", $codekjd);

?>