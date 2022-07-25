<?php
// panggil file database.php untuk koneksi ke database
require_once "../../config/database.php";
// jika tombol hapus diklik
if (isset($_GET['nim'])) {
    // ambil data get dari form
    $nim = $_GET['nim'];
    $user = $_GET['nim'];
    // perintah query untuk menampilkan data foto siswa berdasarkan nim
    $query = mysqli_query($db, "SELECT foto FROM tbl_siswa WHERE nim='$nim'")
        or die('Ada kesalahan pada query tampil data foto :' . mysqli_error($db));
    $data = mysqli_fetch_assoc($query);
    $foto = $data['foto'];
    // hapus file foto dari folder foto
    $hapus_file = unlink("../../foto/$foto");
    // cek hapus file
    if ($hapus_file) {
        // jika file berhasil dihapus jalankan perintah query untuk menghapus data pada tabel siswa
        $delete = mysqli_query($db, "DELETE FROM tbl_admin WHERE user='$user'");
        $delete .= mysqli_query($db, "DELETE FROM tbl_siswa WHERE nim='$nim'")
            or die('Ada kesalahan pada query delete :' . mysqli_error($db));
        // cek hasil query
        if ($delete) {
            // jika berhasil tampilkan pesan berhasil delete data
            header("location: ../../index.php?alert=3&page=siswa&nim=$nim");
        }
    }
}
// tutup koneksi
mysqli_close($db);
?>