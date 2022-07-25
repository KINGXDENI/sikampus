<?php
// panggil file database.php untuk koneksi ke database
require_once "../../config/database.php";
// jika tombol hapus diklik
if (isset($_GET['id'])) {
    // ambil data get dari form
    $id = $_GET['id'];
    // perintah query untuk menampilkan data foto siswa berdasarkan nim
    $query = mysqli_query($db, "SELECT foto FROM tbl_admin WHERE id_admin='$id'")
        or die('Ada kesalahan pada query tampil data foto :' . mysqli_error($db));
    $data = mysqli_fetch_assoc($query);
    $foto = $data['foto'];
    if (file_exists("../../foto/$foto")) {
        $hapus_file = unlink("../../foto/$foto");
    }
    // hapus file foto dari folder foto
    
    // cek hapus file
    if ($hapus_file) {
        
            // jika berhasil tampilkan pesan berhasil delete data
            header("location: ../../index.php?alert=3&page=profile&id=$id");
        }
}
// tutup koneksi
mysqli_close($db);
