<?php
// panggil file database.php untuk koneksi ke database
require_once "../../config/database.php";
// jika tombol simpan diklik
if (isset($_POST['simpan'])) {
    // ambil data hasil submit dari form
    $id_waktu = mysqli_real_escape_string($db, trim($_POST['id_waktu']));
    $jam_masuk = mysqli_real_escape_string($db, trim($_POST['jam_masuk']));
    $jam_keluar = mysqli_real_escape_string($db, trim($_POST['jam_keluar']));

    // perintah query untuk menampilkan id_waktu dari tabel siswa berdasarkan id_waktu dari hasil submit form
    $query = mysqli_query($db, "SELECT id_waktu FROM tbl_waktu WHERE id_waktu='$id_waktu'")
        or die('Ada kesalahan pada query tampil data id_waktu: ' . mysqli_error($db));
    $rows = mysqli_num_rows($query);
    // jika id_waktu sudah ada
    if ($rows > 0) {
        // tampilkan pesan gagal simpan data
        header("location: ../../index.php?alert=4&page=waktu&id_waktu=$id_waktu");
    }
    // jika id_waktu belum ada  
    else {
        // upload file
        // Jika file berhasil diupload, Lakukan : 
        // perintah query untuk menyimpan data ke tabel siswa
        $insert = mysqli_query($db, "INSERT INTO tbl_waktu(id_waktu,jam_masuk,jam_keluar)
VALUES('$id_waktu','$jam_masuk', '$jam_keluar')")
            or die('Ada kesalahan pada query insert : ' . mysqli_error($db));
        // cek query
        if ($insert) {
            // jika berhasil tampilkan pesan berhasil simpan data
            header("location: ../../index.php?alert=1&page=waktu");
        }
    }
}
// tutup koneksi
mysqli_close($db);
