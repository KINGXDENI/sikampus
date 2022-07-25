<?php
// panggil file database.php untuk koneksi ke database
require_once "../../config/database.php";
// jika tombol simpan diklik
if (isset($_POST['simpan'])) {
    // ambil data hasil submit dari form
    $nip = mysqli_real_escape_string($db, trim($_POST['nip']));
    $nama = mysqli_real_escape_string($db, trim($_POST['nama']));
    $tempat_lahir = mysqli_real_escape_string($db, trim($_POST['tempat_lahir']));
    $tanggal_lahir = mysqli_real_escape_string($db, trim(date(
        'Y-m-d',
        strtotime($_POST['tanggal_lahir'])
    )));
    $jenis_kelamin = mysqli_real_escape_string($db, trim($_POST['jenis_kelamin']));
    $status = mysqli_real_escape_string($db, trim($_POST['status']));
    $agama = mysqli_real_escape_string($db, trim($_POST['agama']));
    $email = mysqli_real_escape_string($db, trim($_POST['email']));
    $no_hp = mysqli_real_escape_string($db, trim($_POST['no_hp']));
    $nama_file = $_FILES['foto']['name'];
    $tmp_file = $_FILES['foto']['tmp_name'];
    // Set path folder tempat menyimpan filenya
    $path = "../../foto/" . $nama_file;

    // perintah query untuk menampilkan nip dari tabel guru berdasarkan nip dari hasil submit form
    $query = mysqli_query($db, "SELECT nip FROM tbl_guru WHERE nip='$nip'")
        or die('Ada kesalahan pada query tampil data nip: ' . mysqli_error($db));
    $rows = mysqli_num_rows($query);
    // jika nip sudah ada
    if ($rows > 0) {
        // tampilkan pesan gagal simpan data
        header("location: ../../index.php?alert=4&page=guru&nip=$nip");
    }
    // jika nip belum ada
    else {
        // upload file
        if (move_uploaded_file($tmp_file, $path)) {
            // Jika file berhasil diupload, Lakukan : 
            // perintah query untuk menyimpan data ke tabel guru
            $insert = mysqli_query($db, "INSERT INTO tbl_guru(nip,nama,tempat_lahir,tanggal_lahir,jenis_kelamin,status,agama,email,no_hp,foto)
VALUES('$nip','$nama','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$status','$agama','$email','$no_hp','$nama_file')")
                or die('Ada kesalahan pada query insert : ' . mysqli_error($db));
            // cek query
            if ($insert) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../index.php?alert=1&page=guru");
            }
        }
    }
}
// tutup koneksi
mysqli_close($db);
