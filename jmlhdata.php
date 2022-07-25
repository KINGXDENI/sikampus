<?php
require_once "config/database.php";

$getguru = mysqli_query($db, "SELECT * FROM tbl_guru");
$countguru = mysqli_num_rows($getguru);

$getsiswa = mysqli_query($db, "SELECT * FROM tbl_siswa");
$countsiswa = mysqli_num_rows($getsiswa);

$getmapel = mysqli_query($db, "SELECT * FROM tbl_matapelajaran");
$countmapel = mysqli_num_rows($getmapel);

$getkelas = mysqli_query($db, "SELECT * FROM tbl_kelas");
$countkelas = mysqli_num_rows($getkelas);

$getjurusan = mysqli_query($db, "SELECT * FROM tbl_jurusan");
$countjurusan = mysqli_num_rows($getjurusan);

$getwaktu = mysqli_query($db, "SELECT * FROM tbl_waktu");
$countwaktu = mysqli_num_rows($getwaktu);

$getjadwal = mysqli_query($db, "SELECT * FROM tbl_jadwal");
$countjadwal = mysqli_num_rows($getjadwal);

$gethari = mysqli_query($db, "SELECT * FROM tbl_hari");
$counthari = mysqli_num_rows($gethari);
